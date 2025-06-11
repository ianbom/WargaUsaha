<x-customer.app>
    <div class="min-h-screen py-8 bg-gray-50">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Riwayat Pesanan</h1>
                <p class="mt-1 text-gray-600">Kelola dan pantau semua pesanan Anda</p>
            </div>

            <!-- Filter Section -->
            <div class="p-6 mb-6 bg-white border border-gray-200 rounded-lg shadow-sm">
                <form method="GET" action="{{ route('customer.order.index') }}" class="flex flex-wrap gap-4">
                    <div class="flex-1 min-w-48">
                        <label for="search" class="block mb-2 text-sm font-medium text-gray-700">
                            Cari Pesanan
                        </label>
                        <input type="text" name="search" id="search" value="{{ request('search') }}"
                            placeholder="Nama produk, layanan, atau toko..."
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div class="min-w-40">
                        <label for="type" class="block mb-2 text-sm font-medium text-gray-700">
                            Tipe
                        </label>
                        <select name="type" id="type"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Semua</option>
                            <option value="Product" {{ request('type') == 'Product' ? 'selected' : '' }}>Produk</option>
                            <option value="Service" {{ request('type') == 'Service' ? 'selected' : '' }}>Layanan
                            </option>
                        </select>
                    </div>

                    <div class="min-w-40">
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-700">
                            Status
                        </label>
                        <select name="status" id="status"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Semua</option>
                            <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending
                            </option>
                            <option value="Paid" {{ request('status') == 'Paid' ? 'selected' : '' }}>Dibayar</option>
                            <option value="Shipped" {{ request('status') == 'Shipped' ? 'selected' : '' }}>Dikirim
                            </option>
                            <option value="Completed" {{ request('status') == 'Completed' ? 'selected' : '' }}>Selesai
                            </option>
                            <option value="Cancelled" {{ request('status') == 'Cancelled' ? 'selected' : '' }}>
                                Dibatalkan</option>
                            <option value="On-Proses" {{ request('status') == 'On-Proses' ? 'selected' : '' }}>Dalam
                                Proses</option>
                        </select>
                    </div>

                    <div class="flex items-end gap-2">
                        <button type="submit"
                            class="px-4 py-2 text-white transition-colors bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            <svg class="inline w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            Cari
                        </button>
                        <a href="{{ route('customer.order.index') }}"
                            class="px-4 py-2 text-gray-700 transition-colors bg-gray-300 rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                            Reset
                        </a>
                    </div>
                </form>
            </div>

            <!-- Group Orders Grid -->
            @if ($orders->count() > 0)
                <div class="grid gap-6">
                    @foreach ($orders as $groupOrder)
                        <div
                            class="overflow-hidden transition-shadow bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md">
                            <div class="p-6">
                                <!-- Group Order Header -->
                                <div
                                    class="flex flex-col pb-4 mb-4 border-b border-gray-100 sm:flex-row sm:items-center sm:justify-between">
                                    <div class="flex items-center gap-3 mb-2 sm:mb-0">
                                        <div class="flex-shrink-0">
                                            <div
                                                class="flex items-center justify-center w-12 h-12 rounded-full bg-gradient-to-br from-blue-400 to-sky-200">
                                                <svg class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.79424 12.0291C4.33141 9.34329 4.59999 8.00036 5.48746 7.13543C5.65149 6.97557 5.82894 6.8301 6.01786 6.70061C7.04004 6 8.40956 6 11.1486 6H12.8515C15.5906 6 16.9601 6 17.9823 6.70061C18.1712 6.8301 18.3486 6.97557 18.5127 7.13543C19.4001 8.00036 19.6687 9.34329 20.2059 12.0291C20.9771 15.8851 21.3627 17.8131 20.475 19.1793C20.3143 19.4267 20.1267 19.6555 19.9157 19.8616C18.7501 21 16.7839 21 12.8515 21H11.1486C7.21622 21 5.25004 21 4.08447 19.8616C3.87342 19.6555 3.68582 19.4267 3.5251 19.1793C2.63744 17.8131 3.02304 15.8851 3.79424 12.0291Z"
                                                        stroke="currentColor" stroke-width="1.5" />
                                                    <circle cx="15" cy="9" r="1" fill="currentColor" />
                                                    <circle cx="9" cy="9" r="1" fill="currentColor" />
                                                    <path
                                                        d="M9 6V5C9 3.34315 10.3431 2 12 2C13.6569 2 15 3.34315 15 5V6"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-900">
                                                {{ $groupOrder->mart->name }}</h3>
                                            <p class="text-sm font-medium text-blue-600">
                                                {{ $groupOrder->mart->user->name }}
                                            </p>
                                            <p class="text-sm text-gray-500">
                                                {{ $groupOrder->created_at->format('d M Y, H:i') }}</p>

                                        </div>
                                    </div>

                                    <div class="flex items-center gap-10">
                                        <!-- Status Badge -->
                                        @switch($groupOrder->order_status)
                                            @case('Pending')
                                                <span
                                                    class="inline-flex items-center px-3 py-1 text-sm font-medium text-yellow-800 bg-yellow-100 rounded-full">
                                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    Pending
                                                </span>
                                            @break

                                            @case('Paid')
                                                <span
                                                    class="inline-flex items-center px-3 py-1 text-sm font-medium text-blue-800 bg-blue-100 rounded-full">
                                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    Dibayar
                                                </span>
                                            @break

                                            @case('Shipped')
                                                <span
                                                    class="inline-flex items-center px-3 py-1 text-sm font-medium text-indigo-800 bg-indigo-100 rounded-full">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                                    </svg>
                                                    Dikirim
                                                </span>
                                            @break

                                            @case('On-Proses')
                                                <span
                                                    class="inline-flex items-center px-3 py-1 text-sm font-medium text-purple-800 bg-purple-100 rounded-full">
                                                    <svg class="w-4 h-4 mr-1 animate-spin" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M12 4v1m6.364 1.636l-.707.707M20 12h-1M18.364 18.364l-.707-.707M12 20v-1m-6.364-1.636l.707-.707M4 12h1m1.636-6.364l.707.707" />
                                                    </svg>
                                                    Sedang Diproses
                                                </span>
                                            @break

                                            @case('Completed')
                                                <span
                                                    class="inline-flex items-center px-3 py-1 text-sm font-medium text-green-800 bg-green-100 rounded-full">
                                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    Selesai
                                                </span>
                                            @break

                                            @case('Cancelled')
                                                <span
                                                    class="inline-flex items-center px-3 py-1 text-sm font-medium text-red-800 bg-red-100 rounded-full">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg>
                                                    Dibatalkan
                                                </span>
                                            @break
                                        @endswitch

                                        <!-- Total Price -->
                                        <div class="text-right">
                                            <p class="text-sm text-gray-500">Total</p>
                                            <p class="text-lg font-bold text-black">Rp
                                                {{ number_format($groupOrder->total_price, 0, ',', '.') }}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Order Items List -->
                                <div class="mb-4 space-y-3">
                                    @foreach ($groupOrder->orders as $order)
                                        <div class="flex items-center gap-4 p-3 rounded-lg bg-gray-50">
                                            <div class="flex-shrink-0">
                                                @if ($order->type == 'Product')
                                                    <div
                                                        class="flex items-center justify-center w-8 h-8 bg-blue-100 rounded-full">
                                                        <img src="{{ asset('storage/' . $order->product->image_url) }}"
                                                            alt="{{ $order->product->name }}"
                                                            class="object-cover w-full h-full border rounded-md">
                                                    </div>
                                                @else
                                                    <div
                                                        class="flex items-center justify-center w-8 h-8 bg-green-100 rounded-full">
                                                        <img src="{{ asset('storage/' . $order->service->image_url) }}"
                                                            alt="{{ $order->service->name }}"
                                                            class="object-cover w-full h-full border rounded-md">
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
                                                            <span
                                                                class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium {{ $order->type == 'Product' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                                                                {{ $order->type == 'Product' ? 'Produk' : 'Layanan' }}
                                                            </span>
                                                            @if ($order->type == 'Product' && $order->quantity)
                                                                <span class="text-xs text-gray-500">
                                                                    Qty: {{ number_format($order->quantity) }}
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="text-right">
                                                        @if ($order->type == 'Product' && $order->quantity)
                                                            <p class="text-xs text-gray-500">
                                                                Per unit Rp
                                                                {{ number_format($order->product_price, 0, ',', '.') }}
                                                            </p>
                                                        @endif
                                                        <p class="font-semibold text-gray-900 text-md">
                                                            Rp {{ number_format($order->total_price, 0, ',', '.') }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Shipping Info -->
                                @if ($groupOrder->shipping_method || $groupOrder->shipping_cost)
                                    <div class="flex items-center justify-between p-3 mb-4 rounded-lg bg-blue-50">
                                        <div class="flex items-center gap-2">
                                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                            </svg>
                                            <span class="text-sm font-medium text-blue-800">
                                                {{ $groupOrder->shipping_method ?? 'Pengiriman' }}
                                            </span>
                                        </div>
                                        @if ($groupOrder->shipping_cost)
                                            <span class="text-sm font-medium text-blue-800">
                                                Rp {{ number_format($groupOrder->shipping_cost, 0, ',', '.') }}
                                            </span>
                                        @endif
                                    </div>
                                @endif

                                <!-- Action Buttons -->
                                <div class="flex flex-wrap gap-2 pt-4 border-t border-gray-200">
                                    <a href="{{ route('customer.order.show', $groupOrder) }}"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-700 transition-colors bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                            </path>
                                        </svg>
                                        Detail
                                    </a>

                                    @if ($groupOrder->order_status == 'Pending')
                                        {{-- <a href="/"
                                           class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-white transition-colors bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                            </svg>
                                            Bayar Sekarang
                                        </a> --}}
                                    @elseif($groupOrder->order_status == 'Shipped')
                                        <button
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-white transition-colors bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            Konfirmasi Terima
                                        </button>
                                    @endif

                                    <a href="{{ route('customer.chat.detail', $groupOrder->mart->user->id) }}"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-700 transition-colors bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                            </path>
                                        </svg>
                                        Hubungi Penjual
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $orders->appends(request()->query())->links() }}
                </div>
            @else
                <!-- Empty State -->
                <div class="p-12 text-center bg-white border border-gray-200 rounded-lg shadow-sm">
                    <svg class="w-12 h-12 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                    <h3 class="mb-2 text-lg font-medium text-gray-900">Belum Ada Pesanan</h3>
                    <p class="mb-6 text-gray-500">Anda belum memiliki riwayat pesanan apapun.</p>
                    <a href="{{ route('customer.home.index') }}"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white transition-colors bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                        Mulai Berbelanja
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-customer.app>
