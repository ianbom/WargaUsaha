<x-seller.app>
    <script src="/assets/js/simple-datatables.js"></script>

    <div class="mb-2">
         @include('web.seller.alert.success')
    </div>

    <div x-data="ordersTable">
        <div class="panel flex items-center justify-between overflow-x-auto whitespace-nowrap p-3 text-primary">
            <div class="flex items-center">
                <div class="rounded-full bg-primary p-1.5 text-white ring-2 ring-primary/30 ltr:mr-3 rtl:ml-3">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5">
                        <path
                            d="M3 7V17C3 18.1046 3.89543 19 5 19H19C20.1046 19 21 18.1046 21 17V7M3 7L12 13L21 7M3 7L5 5H19L21 7"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h5 class="font-semibold text-lg">Daftar Order Layanan</h5>
            </div>

            <div class="flex items-center space-x-2">
                <select class="form-select" id="statusFilter">
                    <option value="">Semua Status</option>
                    <option value="Pending">Pending</option>
                    <option value="Paid">Paid</option>
                    <option value="Completed">Completed</option>
                    <option value="Cancelled">Cancelled</option>
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
                        <th>Layanan</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $key => $order)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            <div class="font-semibold text-primary">{{ $order->order_code }}</div>
                        </td>
                        <td>
                            <div class="font-medium">{{ $order->buyer->name ?? 'N/A' }}</div>
                            <div class="text-xs text-gray-500">{{ $order->buyer->email ?? '' }}</div>
                        </td>

                        <td>
                            <div class="font-medium">
                                @if($order->type === 'Product' && $order->product)
                                    {{ $order->product->name }}
                                @elseif($order->type === 'Service' && $order->service)
                                    {{ $order->service->title }}
                                @else
                                    N/A
                                @endif
                            </div>
                            @if($order->note)
                                <div class="text-xs text-gray-500 mt-1 line-clamp-2">{{ $order->note }}</div>
                            @endif
                        </td>

                        <td>
                            <div class="font-semibold text-green-600">
                                Rp {{ number_format($order->total_price, 0, ',', '.') }}
                            </div>
                        </td>
                        <td>
                            @php
                                $statusClasses = [
                                    'Pending' => 'bg-yellow-100 text-yellow-800',
                                    'Paid' => 'bg-blue-100 text-blue-800',
                                    'Completed' => 'bg-green-100 text-green-800',
                                    'Cancelled' => 'bg-red-100 text-red-800'
                                ];
                            @endphp
                            <span class="badge {{ $statusClasses[$order->order_status] ?? 'bg-gray-100 text-gray-800' }}">
                                {{ $order->order_status }}
                            </span>
                        </td>
                        <td>
                            <div class="text-sm">{{ $order->created_at->format('d M Y') }}</div>
                            <div class="text-xs text-gray-500">{{ $order->created_at->format('H:i') }}</div>
                        </td>
                        <td>
                            <div class="flex items-center space-x-2">

                                 <a href="{{ route('seller.transaction.show', $order) }}" class="btn btn-sm btn-outline-info p-2 rounded-full detail-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
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
                init() {
                    const tableOptions = {
                        searchable: true,
                        perPage: 10,
                        perPageSelect: [5, 10, 20, 50],
                        labels: {
                            placeholder: "Cari order...",
                            perPage: "{select} order per halaman",
                            noRows: "Tidak ada order ditemukan",
                            info: "Menampilkan {start} hingga {end} dari {rows} order"
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

                    const ordersTable = new simpleDatatables.DataTable('#ordersTable', tableOptions);

                }
            }));
        });


    </script>

</x-seller.app>
