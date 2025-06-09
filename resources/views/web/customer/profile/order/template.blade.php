<x-customer.app>
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Riwayat Pesanan</h1>
                <p class="mt-2 text-gray-600">Kelola dan pantau semua pesanan Anda</p>
            </div>

            <!-- Status Tabs -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-6">
                <div class="border-b border-gray-200">
                    <nav class="-mb-px flex space-x-8 px-6" aria-label="Tabs">
                        <a href="{{ route('customer.order.index', array_merge(request()->except('status'), ['status' => ''])) }}"
                           class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors {{ request('status', 'all') == 'all' || request('status') == '' ? 'border-blue-500 text-blue-600' : '' }}">
                            Semua
                            <span class="bg-gray-100 text-gray-900 ml-2 py-0.5 px-2.5 rounded-full text-xs font-medium {{ request('status', 'all') == 'all' || request('status') == '' ? 'bg-blue-100 text-blue-600' : '' }}">
                                {{ $statusCounts['all'] ?? 0 }}
                            </span>
                        </a>

                        <a href="{{ route('customer.order.index', array_merge(request()->except('status'), ['status' => 'Pending'])) }}"
                           class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors {{ request('status') == 'Pending' ? 'border-yellow-500 text-yellow-600' : '' }}">
                            <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                            </svg>
                            Pending
                            <span class="bg-yellow-100 text-yellow-800 ml-2 py-0.5 px-2.5 rounded-full text-xs font-medium">
                                {{ $statusCounts['Pending'] ?? 0 }}
                            </span>
                        </a>

                        <a href="{{ route('customer.order.index', array_merge(request()->except('status'), ['status' => 'Paid'])) }}"
                           class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors {{ request('status') == 'Paid' ? 'border-blue-500 text-blue-600' : '' }}">
                            <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                            </svg>
                            Dibayar
                            <span class="bg-blue-100 text-blue-800 ml-2 py-0.5 px-2.5 rounded-full text-xs font-medium">
                                {{ $statusCounts['Paid'] ?? 0 }}
                            </span>
                        </a>

                        <a href="{{ route('customer.order.index', array_merge(request()->except('status'), ['status' => 'On-Proses'])) }}"
                           class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors {{ request('status') == 'On-Proses' ? 'border-purple-500 text-purple-600' : '' }}">
                            <svg class="w-4 h-4 inline mr-1 animate-spin" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6.364 1.636l-.707.707M20 12h-1M18.364 18.364l-.707-.707M12 20v-1m-6.364-1.636l.707-.707M4 12h1m1.636-6.364l.707.707" />
                            </svg>
                            Diproses
                            <span class="bg-purple-100 text-purple-800 ml-2 py-0.5 px-2.5 rounded-full text-xs font-medium">
                                {{ $statusCounts['On-Proses'] ?? 0 }}
                            </span>
                        </a>

                        <a href="{{ route('customer.order.index', array_merge(request()->except('status'), ['status' => 'Shipped'])) }}"
                           class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors {{ request('status') == 'Shipped' ? 'border-indigo-500 text-indigo-600' : '' }}">
                            <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                            </svg>
                            Dikirim
                            <span class="bg-indigo-100 text-indigo-800 ml-2 py-0.5 px-2.5 rounded-full text-xs font-medium">
                                {{ $statusCounts['Shipped'] ?? 0 }}
                            </span>
                        </a>

                        <a href="{{ route('customer.order.index', array_merge(request()->except('status'), ['status' => 'Completed'])) }}"
                           class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors {{ request('status') == 'Completed' ? 'border-green-500 text-green-600' : '' }}">
                            <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            Selesai
                            <span class="bg-green-100 text-green-800 ml-2 py-0.5 px-2.5 rounded-full text-xs font-medium">
                                {{ $statusCounts['Completed'] ?? 0 }}
                            </span>
                        </a>

                        <a href="{{ route('customer.order.index', array_merge(request()->except('status'), ['status' => 'Cancelled'])) }}"
                           class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors {{ request('status') == 'Cancelled' ? 'border-red-500 text-red-600' : '' }}">
                            <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Dibatalkan
                            <span class="bg-red-100 text-red-800 ml-2 py-0.5 px-2.5 rounded-full text-xs font-medium">
                                {{ $statusCounts['Cancelled'] ?? 0 }}
                            </span>
                        </a>
                    </nav>
                </div>
            </div>

            <!-- Filter Section (Collapsed by default, can be expanded) -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-6" x-data="{ showFilters: false }">
                <div class="px-6 py-4 border-b border-gray-200">
                    <button @click="showFilters = !showFilters"
                            class="flex items-center justify-between w-full text-left">
                        <h3 class="text-lg font-medium text-gray-900">Filter Pencarian</h3>
                        <svg class="w-5 h-5 text-gray-500 transform transition-transform"
                             :class="{ 'rotate-180': showFilters }"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                </div>

                <div x-show="showFilters" x-transition class="p-6">
                    <form method="GET" action="{{ route('customer.order.index') }}" class="flex flex-wrap gap-4">
                        <!-- Preserve current status -->
                        <input type="hidden" name="status" value="{{ request('status') }}">

                        <div class="flex-1 min-w-48">
                            <label for="search" class="block text-sm font-medium text-gray-700 mb-2">
                                Cari Pesanan
                            </label>
                            <input type="text" name="search" id="search" value="{{ request('search') }}"
                                   placeholder="Nama produk, layanan, atau toko..."
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div class="min-w-40">
                            <label for="type" class="block text-sm font-medium text-gray-700 mb-2">
                                Tipe
                            </label>
                            <select name="type" id="type" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Semua</option>
                                <option value="Product" {{ request('type') == 'Product' ? 'selected' : '' }}>Produk</option>
                                <option value="Service" {{ request('type') == 'Service' ? 'selected' : '' }}>Layanan</option>
                            </select>
                        </div>

                        <div class="min-w-40">
                            <label for="date_range" class="block text-sm font-medium text-gray-700 mb-2">
                                Periode
                            </label>
                            <select name="date_range" id="date_range" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Semua Waktu</option>
                                <option value="today" {{ request('date_range') == 'today' ? 'selected' : '' }}>Hari Ini</option>
                                <option value="week" {{ request('date_range') == 'week' ? 'selected' : '' }}>7 Hari Terakhir</option>
                                <option value="month" {{ request('date_range') == 'month' ? 'selected' : '' }}>30 Hari Terakhir</option>
                                <option value="3month" {{ request('date_range') == '3month' ? 'selected' : '' }}>3 Bulan Terakhir</option>
                            </select>
                        </div>

                        <div class="flex items-end gap-2">
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                Cari
                            </button>
                            <a href="{{ route('customer.order.index', ['status' => request('status')]) }}"
                               class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors">
                                Reset
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Status Indicator -->
            @if(request('status'))
                <div class="mb-6">
                    <div class="bg-blue-50 border border-blue-200 rounded-md p-4">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-blue-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                            </svg>
                            <p class="text-sm text-blue-800">
                                Menampilkan pesanan dengan status:
                                <span class="font-semibold">
                                    @switch(request('status'))
                                        @case('Pending') Pending @break
                                        @case('Paid') Dibayar @break
                                        @case('On-Proses') Sedang Diproses @break
                                        @case('Shipped') Dikirim @break
                                        @case('Completed') Selesai @break
                                        @case('Cancelled') Dibatalkan @break
                                        @default {{ request('status') }}
                                    @endswitch
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            @endif

                    <!-- Group Orders Grid -->
                    @if($orders->count() > 0)
                        <div class="grid gap-6">
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
                                                    </svg><span class="text-sm text-blue-700 font-medium">
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
                        </div>

                    <!-- Pagination -->
                    <div class="mt-8">
                        {{ $orders->appends(request()->query())->links('pagination::tailwind') }}
                    </div>
                    @else
                <!-- Empty State -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-12 text-center">
                    <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Belum Ada Pesanan</h3>
                    <p class="text-gray-600 mb-6">
                        @if(request('status'))
                            Tidak ada pesanan dengan status "{{ request('status') }}" ditemukan.
                        @elseif(request('search'))
                            Tidak ada pesanan ditemukan untuk pencarian "{{ request('search') }}".
                        @else
                            Anda belum memiliki pesanan. Mulai berbelanja sekarang!
                        @endif
                    </p>
                    <div class="flex justify-center gap-3">
                        <a href="/"
                           class="px-6 py-3 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                            Mulai Belanja
                        </a>
                        @if(request()->hasAny(['status', 'search', 'type', 'date_range']))
                            <a href="{{ route('customer.order.index') }}"
                               class="px-6 py-3 bg-gray-100 text-gray-700 font-medium rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors">
                                Lihat Semua Pesanan
                            </a>
                        @endif
                    </div>
                </div>
            @endif
</div>
</div>
</x-customer.app>

<!-- Alpine.js for interactive components -->
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<!-- Custom JavaScript -->
<script>
// Toggle order details
function toggleOrderDetails(orderId) {
    const detailsElement = document.getElementById(`orderDetails-${orderId}`);
    if (detailsElement.classList.contains('hidden')) {
        detailsElement.classList.remove('hidden');
        detailsElement.classList.add('block');
    } else {
        detailsElement.classList.add('hidden');
        detailsElement.classList.remove('block');
    }
}

// Cancel order function
function cancelOrder(orderId) {
    if (confirm('Apakah Anda yakin ingin membatalkan pesanan ini?')) {
        // Send AJAX request to cancel order
        fetch(`/customer/orders/${orderId}/cancel`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Gagal membatalkan pesanan. Silakan coba lagi.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan. Silakan coba lagi.');
        });
    }
}

// Confirm received function
function confirmReceived(orderId) {
    if (confirm('Konfirmasi bahwa Anda telah menerima pesanan ini?')) {
        fetch(`/customer/orders/${orderId}/confirm-received`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Gagal mengkonfirmasi penerimaan. Silakan coba lagi.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan. Silakan coba lagi.');
        });
    }
}

// Track order function
function trackOrder(orderId) {
    // Open tracking modal or redirect to tracking page
    window.open(`/customer/orders/${orderId}/track`, '_blank');
}

// Reorder function
function reorder(orderId) {
    if (confirm('Tambahkan semua item dari pesanan ini ke keranjang?')) {
        fetch(`/customer/orders/${orderId}/reorder`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Item berhasil ditambahkan ke keranjang!');
                // Optionally redirect to cart
                window.location.href = '/customer/cart';
            } else {
                alert('Gagal menambahkan item ke keranjang. Silakan coba lagi.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan. Silakan coba lagi.');
        });
    }
}

// Auto-refresh for pending orders every 30 seconds
if (document.querySelector('[class*="animate-spin"]')) {
    setInterval(() => {
        // Only refresh if there are processing orders
        const processingOrders = document.querySelectorAll('[class*="bg-purple-100"]');
        if (processingOrders.length > 0) {
            fetch(window.location.href, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.text())
            .then(html => {
                // Update only the orders container
                const parser = new DOMParser();
                const newDoc = parser.parseFromString(html, 'text/html');
                const newOrdersContainer = newDoc.querySelector('.grid.gap-6');
                const currentOrdersContainer = document.querySelector('.grid.gap-6');

                if (newOrdersContainer && currentOrdersContainer) {
                    currentOrdersContainer.innerHTML = newOrdersContainer.innerHTML;
                }
            })
            .catch(error => console.log('Auto-refresh failed:', error));
        }
    }, 30000); // 30 seconds
}
</script>

<style>
/* Custom styles for better visual appeal */
.animate-pulse-slow {
    animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}

/* Smooth transitions for all interactive elements */
.transition-all {
    transition: all 0.3s ease;
}

/* Custom scrollbar for better UX */
.overflow-auto::-webkit-scrollbar {
    width: 6px;
}

.overflow-auto::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 3px;
}

.overflow-auto::-webkit-scrollbar-thumb {
    background: #cbd5e0;
    border-radius: 3px;
}

.overflow-auto::-webkit-scrollbar-thumb:hover {
    background: #a0aec0;
}

/* Print styles for invoice */
@media print {
    .no-print {
        display: none !important;
    }

    .print-full-width {
        width: 100% !important;
        margin: 0 !important;
        padding: 0 !important;
    }
}
</style>
