<x-admin.app>

    <script src="/assets/js/simple-datatables.js"></script>

    <div class="mb-2">
         @include('web.admin.alert.success')
    </div>

    <div x-data="ordersTable">
        <div class="panel flex items-center justify-between overflow-x-auto whitespace-nowrap p-3 text-primary">
            <div class="flex items-center">
                <div class="rounded-full bg-primary p-1.5 text-white ring-2 ring-primary/30 ltr:mr-3 rtl:ml-3">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5">
                        <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h5 class="font-semibold text-lg">Daftar Transaksi</h5>
            </div>

            <div class="flex items-center space-x-2">
                <select class="form-select form-select-sm" x-model="statusFilter" @change="filterByStatus()">
                    <option value="">Semua Status</option>
                    <option value="Pending">Pending</option>
                    <option value="Paid">Paid</option>
                    <option value="Completed">Completed</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
                <select class="form-select form-select-sm" x-model="typeFilter" @change="filterByType()">
                    <option value="">Semua Tipe</option>
                    <option value="Product">Product</option>
                    <option value="Service">Service</option>
                </select>
            </div>
        </div>

        <div class="panel mt-6">
            <table id="ordersTable" class="table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Order</th>
                        <th>Pembeli</th>
                        <th>Penjual</th>
                        <th>Tipe</th>
                        <th>Item</th>
                        <th>Qty</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Tanggal Order</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            <div class="font-semibold text-primary">{{ $item->order_code }}</div>
                        </td>
                        <td>
                            <div class="flex items-center space-x-2">
                                <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
                                    <span class="text-xs font-semibold text-blue-600">
                                        {{ substr($item->buyer->name ?? 'U', 0, 2) }}
                                    </span>
                                </div>
                                <div>
                                    <div class="font-medium text-sm">{{ $item->buyer->name ?? 'Pembeli tidak diketahui' }}</div>
                                    <div class="text-xs text-gray-500">{{ $item->buyer->email ?? '' }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="flex items-center space-x-2">
                                <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center">
                                    <span class="text-xs font-semibold text-green-600">
                                        {{ substr($item->seller->name ?? 'S', 0, 2) }}
                                    </span>
                                </div>
                                <div>
                                    <div class="font-medium text-sm">{{ $item->seller->name ?? 'Penjual tidak diketahui' }}</div>
                                    <div class="text-xs text-gray-500">{{ $item->seller->email ?? '' }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="px-2 py-1 text-xs rounded-full {{ $item->type == 'Product' ? 'bg-blue-100 text-blue-800' : 'bg-purple-100 text-purple-800' }}">
                                {{ $item->type }}
                            </span>
                        </td>
                        <td>
                            @if($item->type == 'Product' && $item->product)
                                <div class="flex items-center space-x-2">
                                    @if($item->product->image_url)
                                        <img src="{{ asset('storage/' . $item->product->image_url) }}"
                                             alt="{{ $item->product->name }}"
                                             class="w-8 h-8 rounded object-cover">
                                    @else
                                        <div class="w-8 h-8 rounded bg-gray-200 flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7L12 3L4 7L12 11L20 7Z"/>
                                            </svg>
                                        </div>
                                    @endif
                                    <div>
                                        <div class="font-medium text-sm">{{ $item->product->name }}</div>
                                        <div class="text-xs text-gray-500">{{ $item->product->category->name ?? '' }}</div>
                                    </div>
                                </div>
                            @elseif($item->type == 'Service' && $item->service)
                                <div class="flex items-center space-x-2">
                                    @if($item->service->image_url)
                                        <img src="{{ asset('storage/' . $item->service->image_url) }}"
                                             alt="{{ $item->service->name }}"
                                             class="w-8 h-8 rounded object-cover">
                                    @else
                                        <div class="w-8 h-8 rounded bg-gray-200 flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                                            </svg>
                                        </div>
                                    @endif
                                    <div>
                                        <div class="font-medium text-sm">{{ $item->service->name }}</div>
                                        <div class="text-xs text-gray-500">{{ $item->service->category->name ?? '' }}</div>
                                    </div>
                                </div>
                            @else
                                <span class="text-gray-400 text-sm">Item tidak tersedia</span>
                            @endif
                        </td>
                        <td>
                            <span class="text-sm">{{ $item->quantity ?? '-' }}</span>
                        </td>
                        <td>
                            <div class="font-semibold text-green-600">
                                Rp {{ number_format($item->total_price ?? 0, 0, ',', '.') }}
                            </div>
                        </td>
                        <td>
                            @php
                                $statusClass = match($item->order_status) {
                                    'Pending' => 'bg-yellow-100 text-yellow-800',
                                    'Paid' => 'bg-blue-100 text-blue-800',
                                    'Completed' => 'bg-green-100 text-green-800',
                                    'Cancelled' => 'bg-red-100 text-red-800',
                                    default => 'bg-gray-100 text-gray-800'
                                };
                            @endphp
                            <span class="px-2 py-1 text-xs rounded-full {{ $statusClass }}">
                                {{ $item->order_status }}
                            </span>

                            {{-- @if($item->paid_at)
                                <div class="text-xs text-gray-500 mt-1">
                                    Paid:  {{ $item->paid_at ? \Carbon\Carbon::parse($item->paid_at)->format('d M Y, H:i') : '-' }}
                                </div>
                            @endif

                            @if($item->completed_at)
                                <div class="text-xs text-gray-500 mt-1">
                                     Paid:  {{ $item->completed_at ? \Carbon\Carbon::parse($item->completed_at)->format('d M Y, H:i') : '-' }}
                                </div>
                            @endif

                            @if($item->cancelled_at)
                                <div class="text-xs text-gray-500 mt-1">
                                     Paid:  {{ $item->cancelled_at ? \Carbon\Carbon::parse($item->cancelled_at)->format('d M Y, H:i') : '-' }}
                                </div>
                            @endif --}}
                        </td>
                        <td>{{ $item->created_at->format('d M Y H:i') }}</td>
                        <td>
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('admin.transaction.show', $item) }}"
                                   class="btn btn-sm btn-outline-info p-2 rounded-full"
                                   title="Lihat Detail">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </a>


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
            Alpine.data("ordersTable", () => ({
                statusFilter: '',
                typeFilter: '',
                dataTable: null,

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
                            { select: 7 },
                            { select: 8 },
                            { select: 9 },
                            { select: 10, sortable: false },
                        ]
                    };

                    this.dataTable = new simpleDatatables.DataTable('#ordersTable', tableOptions);
                },

                filterByStatus() {
                    // Implementasi filter berdasarkan status
                    this.applyFilters();
                },

                filterByType() {
                    // Implementasi filter berdasarkan tipe
                    this.applyFilters();
                },

                applyFilters() {
                    if (this.dataTable) {
                        let searchTerm = '';
                        if (this.statusFilter) searchTerm += this.statusFilter + ' ';
                        if (this.typeFilter) searchTerm += this.typeFilter + ' ';
                        this.dataTable.search(searchTerm.trim());
                    }
                },

            }));
        });
    </script>

</x-admin.app>
