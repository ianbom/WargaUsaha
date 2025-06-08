<x-seller.app>
    <script src="/assets/js/simple-datatables.js"></script>
    <div class="flex items-center justify-between ">
        <div class="text-xl font-semibold text-gray-800">
            Product Transaction
        </div>
        <nav class="flex items-center space-x-2 text-sm text-gray-600">
            <a href="#" class="transition-colors text-primary hover:underline">Dashboard</a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            <span class="text-gray-800"> Product Transaction</span>
        </nav>
    </div>
    <div class="mb-5">
        @include('web.seller.alert.success')
    </div>

    <div x-data="ordersTable">
        <div class="flex items-center justify-between p-3 overflow-x-auto panel whitespace-nowrap text-primary">
            <div class="flex items-center">
                <div class="rounded-full bg-primary p-1.5 text-white ring-2 ring-primary/30 ltr:mr-3 rtl:ml-3">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="h-3.5 w-3.5"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 7L4 7" stroke="#fff" stroke-width="1.5" stroke-linecap="round" />
                        <path d="M15 12L4 12" stroke="#fff" stroke-width="1.5" stroke-linecap="round" />
                        <path d="M9 17H4" stroke="#fff" stroke-width="1.5" stroke-linecap="round" />
                    </svg>
                </div>
                <h5 class="text-lg font-semibold">Daftar Order Produk</h5>
            </div>

            <div class="flex items-center space-x-2">
                <select
                    class="form-select appearance-none pr-10 pl-4 py-2 min-w-[150px] border rounded-md text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-primary"
                    id="statusFilter">
                    <option value="">Semua Status</option>
                    <option value="Pending">Pending</option>
                    <option value="Paid">Paid</option>
                    <option value="Completed">Completed</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
            </div>
        </div>

        <div class="mt-6 panel">
            <table id="ordersTable" class="table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Order</th>
                        <th>Pembeli</th>
                        <th>Tipe</th>
                        <th>Produk/Layanan</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $key => $order)
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
                                <span
                                    class="badge {{ $order->type === 'Product' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                                    {{ $order->type }}
                                </span>
                            </td>
                            <td>
                                <div class="font-medium">
                                    @if ($order->type === 'Product' && $order->product)
                                        {{ $order->product->name }}
                                    @elseif($order->type === 'Service' && $order->service)
                                        {{ $order->service->title }}
                                    @else
                                        N/A
                                    @endif
                                </div>
                                @if ($order->note)
                                    <div class="mt-1 text-xs text-gray-500 line-clamp-2">{{ $order->note }}</div>
                                @endif
                            </td>
                            <td>
                                @if ($order->quantity)
                                    <span class="font-medium">{{ $order->quantity }}</span>
                                @else
                                    <span class="text-gray-400">-</span>
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
                                        'Cancelled' => 'bg-red-100 text-red-800',
                                    ];
                                @endphp
                                <span
                                    class="badge {{ $statusClasses[$order->order_status] ?? 'bg-gray-100 text-gray-800' }}">
                                    {{ $order->order_status }}
                                </span>
                            </td>
                            <td>
                                <div class="text-sm">{{ $order->created_at->format('d M Y') }}</div>
                                <div class="text-xs text-gray-500">{{ $order->created_at->format('H:i') }}</div>
                            </td>
                            <td>
                                <div class="flex items-center space-x-2">

                                    <a href="{{ route('seller.transaction.show', $order) }}"
                                        class="p-2 rounded-full btn btn-sm btn-outline-info detail-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
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
                        columns: [{
                                select: 0
                            },
                            {
                                select: 1
                            },
                            {
                                select: 2
                            },
                            {
                                select: 3,
                                sortable: false
                            },
                            {
                                select: 4
                            },
                            {
                                select: 5
                            },
                            {
                                select: 6
                            },
                            {
                                select: 7,
                                sortable: false
                            },
                            {
                                select: 8
                            },
                            {
                                select: 9,
                                sortable: false
                            }
                        ]
                    };

                    const ordersTable = new simpleDatatables.DataTable('#ordersTable', tableOptions);

                }
            }));
        });
    </script>

</x-seller.app>
