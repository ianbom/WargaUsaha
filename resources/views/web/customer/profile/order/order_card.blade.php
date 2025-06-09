
    @foreach($orders as $groupOrder)
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow">
            <div class="p-6">
                <!-- Group Order Header -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4 pb-4 border-b border-gray-100">
                    <div class="flex items-center gap-3 mb-2 sm:mb-0">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Pesanan #{{ $groupOrder->id }}</h3>
                            <p class="text-sm text-gray-500">{{ $groupOrder->created_at->format('d M Y, H:i') }}</p>
                            <p class="text-sm font-medium text-blue-600">{{ $groupOrder->mart->name }}</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <!-- Status Badge -->
                        @switch($groupOrder->order_status)
                            @case('Pending')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                    </svg>
                                    Pending
                                </span>
                                @break
                            @case('Paid')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                    </svg>
                                    Dibayar
                                </span>
                                @break
                            @case('Shipped')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-indigo-100 text-indigo-800">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                    </svg>
                                    Dikirim
                                </span>
                                @break
                            @case('On-Proses')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-800">
                                    <svg class="w-4 h-4 mr-1 animate-spin" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6.364 1.636l-.707.707M20 12h-1M18.364 18.364l-.707-.707M12 20v-1m-6.364-1.636l.707-.707M4 12h1m1.636-6.364l.707.707" />
                                    </svg>
                                    Sedang Diproses
                                </span>
                                @break
                            @case('Completed')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                    Selesai
                                </span>
                                @break
                            @case('Cancelled')
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    Dibatalkan
                                </span>
                                @break
                        @endswitch

                        <!-- Total Price -->
                        <div class="text-right">
                            <p class="text-sm text-gray-500">Total</p>
                            <p class="text-lg font-bold text-green-600">Rp {{ number_format($groupOrder->total_price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Order Items List -->
                <div class="space-y-3 mb-4">
                    @foreach($groupOrder->orders as $order)
                        <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-lg">
                            <div class="flex-shrink-0">
                                @if($order->type == 'Product')
                                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                        </svg>
                                    </div>
                                @else
                                    <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    </div>
                                @endif
                            </div>

                            <div class="flex-1 min-w-0">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-gray-900 truncate">
                                            {{ $order->product_name }}
                                        </p>
                                        <div class="flex items-center gap-2 mt-1">
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium {{ $order->type == 'Product' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                                                {{ $order->type == 'Product' ? 'Produk' : 'Layanan' }}
                                            </span>
                                            @if($order->type == 'Product' && $order->quantity)
                                                <span class="text-xs text-gray-500">
                                                    Qty: {{ number_format($order->quantity) }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-sm font-medium text-gray-900">
                                            Rp {{ number_format($order->total_price, 0, ',', '.') }}
                                        </p>
                                        @if($order->type == 'Product' && $order->quantity)
                                            <p class="text-xs text-gray-500">
                                                @ Rp {{ number_format($order->product_price, 0, ',', '.') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Shipping Info -->
                @if($groupOrder->shipping_method || $groupOrder->shipping_cost)
                    <div class="flex items-center justify-between p-3 bg-blue-50 rounded-lg mb-4">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                            </svg>
                            <span class="text-sm text-blue-700 font-medium">
                                {{ $groupOrder->shipping_method }}
                            </span>
                        </div>
                        @if($groupOrder->shipping_cost)
                            <span class="text-sm font-medium text-blue-800">
                                + Rp {{ number_format($groupOrder->shipping_cost, 0, ',', '.') }}
                            </span>
                        @endif
                    </div>
                @endif

                <!-- Order Actions -->
                <div class="flex flex-wrap items-center justify-between gap-3 pt-4 border-t border-gray-100">
                    <div class="flex items-center gap-3">
                        <!-- View Details Button -->
                        <button onclick="toggleOrderDetails({{ $groupOrder->id }})"
                                class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center gap-1 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            Lihat Detail
                        </button>

                        <!-- Order Number -->
                        <span class="text-sm text-gray-500">
                            {{ $groupOrder->orders->count() }} item{{ $groupOrder->orders->count() > 1 ? 's' : '' }}
                        </span>
                    </div>

                    <div class="flex items-center gap-2">
                        <!-- Action Buttons based on Status -->
                        @switch($groupOrder->order_status)
                            @case('Pending')
                                <a href="/"
                                   class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                                    Bayar Sekarang
                                </a>
                                <button onclick="cancelOrder({{ $groupOrder->id }})"
                                        class="px-4 py-2 bg-red-100 text-red-700 text-sm font-medium rounded-md hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-colors">
                                    Batalkan
                                </button>
                                @break

                            @case('Shipped')
                                <button onclick="confirmReceived({{ $groupOrder->id }})"
                                        class="px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-colors">
                                    Terima Pesanan
                                </button>
                                <button onclick="trackOrder({{ $groupOrder->id }})"
                                        class="px-4 py-2 bg-indigo-100 text-indigo-700 text-sm font-medium rounded-md hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors">
                                    Lacak Pesanan
                                </button>
                                @break

                            @case('Completed')
                                <a href="/"
                                   class="px-4 py-2 bg-yellow-100 text-yellow-700 text-sm font-medium rounded-md hover:bg-yellow-200 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition-colors">
                                    Beri Ulasan
                                </a>
                                <button onclick="reorder({{ $groupOrder->id }})"
                                        class="px-4 py-2 bg-blue-100 text-blue-700 text-sm font-medium rounded-md hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                                    Pesan Lagi
                                </button>
                                @break
                        @endswitch

                        <!-- Download Invoice (for all paid orders) -->
                        @if(in_array($groupOrder->order_status, ['Paid', 'On-Proses', 'Shipped', 'Completed']))
                            <a href="/"
                               class="px-4 py-2 bg-gray-100 text-gray-700 text-sm font-medium rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors">
                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Invoice
                            </a>
                        @endif
                    </div>
                </div>

                <!-- Expandable Order Details (Hidden by default) -->
                <div id="orderDetails-{{ $groupOrder->id }}" class="hidden mt-4 pt-4 border-t border-gray-100">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Order Information -->
                        <div class="space-y-4">
                            <h4 class="font-medium text-gray-900">Informasi Pesanan</h4>
                            <div class="space-y-2 text-sm">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">ID Pesanan:</span>
                                    <span class="font-medium">#{{ $groupOrder->id }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Tanggal Pesan:</span>
                                    <span class="font-medium">{{ $groupOrder->created_at->format('d M Y, H:i') }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Status:</span>
                                    <span class="font-medium">
                                        @switch($groupOrder->order_status)
                                            @case('Pending') Menunggu Pembayaran @break
                                            @case('Paid') Sudah Dibayar @break
                                            @case('On-Proses') Sedang Diproses @break
                                            @case('Shipped') Dalam Pengiriman @break
                                            @case('Completed') Pesanan Selesai @break
                                            @case('Cancelled') Pesanan Dibatalkan @break
                                            @default {{ $groupOrder->order_status }}
                                        @endswitch
                                    </span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Toko:</span>
                                    <span class="font-medium">{{ $groupOrder->mart->name }}</span>
                                </div>
                                @if($groupOrder->payment_method)
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Metode Pembayaran:</span>
                                        <span class="font-medium">{{ $groupOrder->payment_method }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Shipping Information -->
                        <div class="space-y-4">
                            <h4 class="font-medium text-gray-900">Informasi Pengiriman</h4>
                            <div class="space-y-2 text-sm">
                                @if($groupOrder->recipient_name)
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Penerima:</span>
                                        <span class="font-medium">{{ $groupOrder->recipient_name }}</span>
                                    </div>
                                @endif
                                @if($groupOrder->recipient_phone)
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">No. Telepon:</span>
                                        <span class="font-medium">{{ $groupOrder->recipient_phone }}</span>
                                    </div>
                                @endif
                                @if($groupOrder->shipping_address)
                                    <div>
                                        <span class="text-gray-600">Alamat:</span>
                                        <p class="font-medium mt-1">{{ $groupOrder->shipping_address }}</p>
                                    </div>
                                @endif
                                @if($groupOrder->shipping_method)
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Metode Pengiriman:</span>
                                        <span class="font-medium">{{ $groupOrder->shipping_method }}</span>
                                    </div>
                                @endif
                                @if($groupOrder->tracking_number)
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">No. Resi:</span>
                                        <span class="font-medium font-mono">{{ $groupOrder->tracking_number }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Price Breakdown -->
                    <div class="mt-6 pt-4 border-t border-gray-100">
                        <h4 class="font-medium text-gray-900 mb-3">Rincian Harga</h4>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Subtotal ({{ $groupOrder->orders->count() }} item):</span>
                                <span>Rp {{ number_format($groupOrder->orders->sum('total_price'), 0, ',', '.') }}</span>
                            </div>
                            @if($groupOrder->shipping_cost)
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Ongkos Kirim:</span>
                                    <span>Rp {{ number_format($groupOrder->shipping_cost, 0, ',', '.') }}</span>
                                </div>
                            @endif
                            @if($groupOrder->tax_amount)
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Pajak:</span>
                                    <span>Rp {{ number_format($groupOrder->tax_amount, 0, ',', '.') }}</span>
                                </div>
                            @endif
                            @if($groupOrder->discount_amount)
                                <div class="flex justify-between text-green-600">
                                    <span>Diskon:</span>
                                    <span>-Rp {{ number_format($groupOrder->discount_amount, 0, ',', '.') }}</span>
                                </div>
                            @endif
                            <div class="flex justify-between font-semibold text-lg pt-2 border-t border-gray-200">
                                <span>Total:</span>
                                <span class="text-green-600">Rp {{ number_format($groupOrder->total_price, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

