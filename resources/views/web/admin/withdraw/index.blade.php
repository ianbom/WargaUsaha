<x-admin.app>
    <script src="/assets/js/simple-datatables.js"></script>

    <div class="mb-2">
         @include('web.seller.alert.success')
    </div>

    <div x-data="withdrawTable">
        <div class="panel flex items-center justify-between overflow-x-auto whitespace-nowrap p-3 text-primary">
            <div class="flex items-center">
                <div class="rounded-full bg-primary p-1.5 text-white ring-2 ring-primary/30 ltr:mr-3 rtl:ml-3">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5">
                        <path
                            d="M12 2L3 7L12 12L21 7L12 2Z"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path
                            d="M3 17L12 22L21 17"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path
                            d="M3 12L12 17L21 12"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h5 class="font-semibold text-lg">Daftar Transaksi Withdraw</h5>
            </div>

            <div class="flex items-center space-x-2">
                <select class="form-select" id="statusFilter">
                    <option value="">Semua Status</option>
                    <option value="Pending">Pending</option>
                    <option value="Accepted">Accepted</option>
                    <option value="Rejected">Rejected</option>
                </select>
            </div>
        </div>

        <div class="panel mt-6">
            <table id="withdrawTable" class="table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jumlah</th>
                        <th>Bank</th>
                        <th>Rekening</th>
                        <th>Status</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Tanggal Proses</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($withdrawTransaction as $key => $transaction)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            <div class="font-semibold text-green-600">
                                Rp {{ number_format($transaction->amount, 0, ',', '.') }}
                            </div>
                        </td>
                        <td>
                            <div class="font-medium">{{ $transaction->bank_name ?? 'N/A' }}</div>
                        </td>
                        <td>
                            <div class="font-medium">{{ $transaction->account_number ?? 'N/A' }}</div>
                            <div class="text-xs text-gray-500">{{ $transaction->account_name ?? '' }}</div>
                        </td>
                        <td>
                            @php
                                $statusClasses = [
                                    'Pending' => 'bg-yellow-100 text-yellow-800',
                                    'Accepted' => 'bg-green-100 text-green-800',
                                    'Rejected' => 'bg-red-100 text-red-800'
                                ];
                            @endphp
                            <span class="badge {{ $statusClasses[$transaction->status] ?? 'bg-gray-100 text-gray-800' }}">
                                {{ $transaction->status }}
                            </span>
                        </td>
                        <td>
                            <div class="text-sm">{{ $transaction->created_at->format('d M Y') }}</div>
                            <div class="text-xs text-gray-500">{{ $transaction->created_at->format('H:i') }}</div>
                        </td>
                        <td>
                            @if($transaction->withdraw_accepted_date)
                                <div class="text-sm text-green-600">{{ \Carbon\Carbon::parse($transaction->withdraw_accepted_date)->format('d M Y') }}</div>
                                <div class="text-xs text-green-500">{{ \Carbon\Carbon::parse($transaction->withdraw_accepted_date)->format('H:i') }}</div>
                            @elseif($transaction->withdraw_rejected_date)
                                <div class="text-sm text-red-600">{{ \Carbon\Carbon::parse($transaction->withdraw_rejected_date)->format('d M Y') }}</div>
                                <div class="text-xs text-red-500">{{ \Carbon\Carbon::parse($transaction->withdraw_rejected_date)->format('H:i') }}</div>
                            @else
                                <div class="text-sm text-gray-400">Belum diproses</div>
                            @endif
                        </td>
                        <td>
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('admin.withdraw.show', $transaction) }}"  class="btn btn-sm btn-outline-info p-2 rounded-full detail-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>

                                @if($transaction->status === 'Pending')
                                <button @click="cancelWithdraw({{ $transaction->id }})" class="btn btn-sm btn-outline-danger p-2 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>



    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("withdrawTable", () => ({
                showDetailModal: false,
                selectedTransaction: null,

                init() {
                    const tableOptions = {
                        searchable: true,
                        perPage: 10,
                        perPageSelect: [5, 10, 20, 50],
                        labels: {
                            placeholder: "Cari transaksi...",
                            perPage: "{select} transaksi per halaman",
                            noRows: "Tidak ada transaksi ditemukan",
                            info: "Menampilkan {start} hingga {end} dari {rows} transaksi"
                        },
                        columns: [
                            { select: 0 },
                            { select: 1 },
                            { select: 2 },
                            { select: 3 },
                            { select: 4 },
                            { select: 5 },
                            { select: 6 },
                            { select: 7, sortable: false },
                        ]
                    };

                    const withdrawTable = new simpleDatatables.DataTable('#withdrawTable', tableOptions);

                    // Status filter
                    document.getElementById('statusFilter').addEventListener('change', (e) => {
                        const status = e.target.value;
                        if (status) {
                            withdrawTable.search(status);
                        } else {
                            withdrawTable.search('');
                        }
                    });
                },

                cancelWithdraw(transactionId) {
                    if (confirm('Apakah Anda yakin ingin membatalkan withdraw ini?')) {
                        // Handle cancel withdraw - make AJAX call to your controller
                        window.location.href = `/seller/withdraw/${transactionId}/cancel`;
                    }
                }
            }));
        });
    </script>

</x-admin.app>
