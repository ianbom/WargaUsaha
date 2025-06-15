<x-seller.app>
    <div class="min-h-screen py-8 bg-gray-50">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    Riwayat Transaksi
                </h2>
                <p class="mt-1 text-sm text-gray-600">
                    Kelola dan pantau semua transaksi Anda di sini
                </p>
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

            <!-- Transaction Table -->
            @if ($transaction->count() > 0)
                <div class="grid gap-6">
                    @foreach ($transaction as $item)
                        <div
                            class="overflow-hidden transition-shadow bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md">
                            <div class="p-6">
                                <!-- Group Order Header -->
                                <div
                                    class="flex flex-col pb-4 mb-4 border-b border-gray-100 sm:flex-row sm:items-center sm:justify-between">
                                    <div class="flex items-center gap-3 mb-2 sm:mb-0">
                                        <div class="flex-shrink-0">
                                            @if ($item->payment_status == 'Paid')
                                                <div
                                                    class="flex items-center justify-center w-10 h-10 bg-green-100 rounded-full">
                                                    <svg class="w-6 h-6 text-green-600" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                    </svg>
                                                </div>
                                            @elseif($item->payment_status == 'Pending')
                                                <div
                                                    class="flex items-center justify-center w-10 h-10 bg-yellow-100 rounded-full">
                                                    <svg class="w-6 h-6 text-yellow-600" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                </div>
                                            @else
                                                <div
                                                    class="flex items-center justify-center w-10 h-10 bg-red-100 rounded-full">
                                                    <svg class="w-6 h-6 text-red-600" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-900">
                                                #{{ $item->transaction_code ?? $item->id }}</h3>
                                            <p class="text-sm font-medium text-blue-600">
                                                {{ $item->description ?? 'Transaksi pembayaran' }}
                                            </p>
                                            <p class="text-sm text-gray-500">
                                                {{ $item->created_at->format('d M Y, H:i') }}</p>

                                        </div>
                                    </div>

                                    <div class="flex items-center gap-10">
                                        <!-- Status Badge -->
                                        {{-- @if ($item->payment_status == 'Paid')
                                            <div
                                                class="flex items-center justify-center w-10 h-10 bg-green-100 rounded-full">
                                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </div>
                                        @elseif($item->status == 'Pending')
                                            <div
                                                class="flex items-center justify-center w-10 h-10 bg-yellow-100 rounded-full">
                                                <svg class="w-6 h-6 text-yellow-600" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            </div>
                                        @else
                                            <div
                                                class="flex items-center justify-center w-10 h-10 bg-red-100 rounded-full">
                                                <svg class="w-6 h-6 text-red-600" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            </div>
                                        @endif --}}
                                        <span
                                            class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                                    @if ($item->payment_status == 'Completed') bg-green-100 text-green-800
                                                    @elseif($item->payment_status == 'Paid') bg-blue-100 text-blue-800
                                                    @elseif($item->payment_status == 'Pending') bg-yellow-100 text-yellow-800
                                                    @else bg-red-100 text-red-800 @endif">
                                            {{ ucfirst($item->payment_status) }}
                                        </span>

                                        <!-- Total Price -->
                                        <div class="text-right">
                                            <p class="text-sm text-gray-500">
                                                {{ $item->payment_method ?? 'Transfer Bank' }}</p>
                                            <p class="text-lg font-bold text-black"> Rp
                                                {{ number_format($item->amount ?? 0, 0, ',', '.') }}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Order Items List -->
                                {{-- <div class="mb-4 space-y-3">
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
                                                                Rp
                                                                {{ number_format($order->total_price, 0, ',', '.') }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div> --}}

                                <!-- Shipping Info -->
                                {{-- @if ($groupOrder->shipping_method || $groupOrder->shipping_cost)
                                        <div class="flex items-center justify-between p-3 mb-4 rounded-lg bg-blue-50">
                                            <div class="flex items-center gap-2">
                                                <svg class="w-5 h-5 text-blue-600" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
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
                                    @endif --}}

                                <!-- Action Buttons -->
                                <div class="flex flex-wrap gap-2 pt-4 border-t border-gray-200">
                                    <a href="{{ route('customer.transaction.show', $item->id) }}"
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
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- <ul class="divide-y divide-gray-200">
                    @foreach ($transaction as $item)
                        <li class="px-4 py-4 transition-colors duration-150 sm:px-6 hover:bg-gray-50">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        @if ($item->payment_status == 'Paid')
                                            <div
                                                class="flex items-center justify-center w-10 h-10 bg-green-100 rounded-full">
                                                <svg class="w-6 h-6 text-green-600" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </div>
                                        @elseif($item->status == 'Pending')
                                            <div
                                                class="flex items-center justify-center w-10 h-10 bg-yellow-100 rounded-full">
                                                <svg class="w-6 h-6 text-yellow-600" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            </div>
                                        @else
                                            <div
                                                class="flex items-center justify-center w-10 h-10 bg-red-100 rounded-full">
                                                <svg class="w-6 h-6 text-red-600" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="ml-4">
                                        <div class="flex items-center">
                                            <p class="text-sm font-medium text-gray-900">
                                                #{{ $item->transaction_code ?? $item->id }}
                                            </p>
                                            <span
                                                class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                                    @if ($item->payment_status == 'Completed') bg-green-100 text-green-800
                                                    @elseif($item->payment_status == 'Pending') bg-yellow-100 text-yellow-800
                                                    @else bg-red-100 text-red-800 @endif">
                                                {{ ucfirst($item->payment_status) }}
                                            </span>
                                        </div>
                                        <p class="text-sm text-gray-600">
                                            {{ $item->description ?? 'Transaksi pembayaran' }}
                                        </p>
                                        <p class="text-xs text-gray-500">
                                            {{ $item->created_at->format('d M Y, H:i') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-4">
                                    <div class="text-right">
                                        <p class="text-sm font-medium text-gray-900">
                                            Rp {{ number_format($item->amount ?? 0, 0, ',', '.') }}
                                        </p>
                                        <p class="text-xs text-gray-500">
                                            {{ $item->payment_method ?? 'Transfer Bank' }}
                                        </p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <a href="{{ route('customer.transaction.show', $item->id) }}"
                                            class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-md text-blue-700 bg-blue-100 hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-150">
                                            Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul> --}}

                <!-- Pagination -->
                {{-- <div class="px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
                        {{ $transaction->links() }}
                    </div> --}}
            @else
                <!-- Empty State -->
                <div class="py-12 text-center">
                    <svg class="w-12 h-12 mx-auto text-gray-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada transaksi</h3>
                    <p class="mt-1 text-sm text-gray-500">Mulai berbelanja untuk melihat riwayat transaksi Anda.
                    </p>
                    <div class="mt-6">
                        <a href="/"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Mulai Belanja
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-customer.app>
