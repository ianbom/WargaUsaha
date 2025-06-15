<x-seller.app>
    <div class="min-h-screen py-8 bg-gray-50">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Riwayat Pesanan Layanan</h1>
                <p class="mt-1 text-gray-600">Kelola dan pantau semua pesanan Anda</p>
            </div>

            <!-- Filter Section -->
            <div class="p-6 mb-6 bg-white border border-gray-200 rounded-lg shadow-sm">
                <form method="GET" action="{{ route('customer.service.index') }}" class="flex flex-wrap gap-4">
                    <div class="flex-1 min-w-48">
                        <label for="search" class="block mb-2 text-sm font-medium text-gray-700">
                            Cari Pesanan
                        </label>
                        <input type="text" name="search" id="search" value="{{ request('search') }}"
                            placeholder="Kode pesanan atau nama layanan..."
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
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
                        <a href="{{ route('customer.service.index') }}"
                            class="px-4 py-2 text-gray-700 transition-colors bg-gray-300 rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                            Reset
                        </a>
                    </div>
                </form>
            </div>

            <!-- Orders Grid -->
            @if ($orders->count() > 0)
                <div class="grid gap-6">
                    @foreach ($orders as $order)
                        <div
                            class="overflow-hidden transition-shadow bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md">
                            <div class="p-6">
                                <!-- Order Header -->
                                <div class="flex flex-col mb-4 sm:flex-row sm:items-center sm:justify-between">
                                    <div class="flex items-center gap-3 mb-2 sm:mb-0">
                                        <div class="flex-shrink-0">
                                            @if ($order->type == 'Product')
                                                <div
                                                    class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full">
                                                    <svg class="w-5 h-5 text-blue-600" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4">
                                                        </path>
                                                    </svg>
                                                </div>
                                            @else
                                                <div
                                                    class="flex items-center justify-center w-10 h-10 bg-green-100 rounded-full">
                                                    <svg class="w-5 h-5 text-green-600" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                                        </path>
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                                                        </path>
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-900">{{ $order->order_code }}
                                            </h3>
                                            <p class="text-sm text-gray-500">
                                                {{ $order->created_at->format('d M Y, H:i') }}</p>
                                        </div>
                                    </div>

                                    <div class="flex items-center gap-3">
                                        <!-- Status Badge -->
                                        @switch($order->order_status)
                                            @case('Pending')
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    Pending
                                                </span>
                                            @break

                                            @case('Paid')
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    Dibayar
                                                </span>
                                            @break

                                            @case('On-Proses')
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                    <svg class="w-3 h-3 mr-1 animate-spin" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M12 4v1m6.364 1.636l-.707.707M20 12h-1M18.364 18.364l-.707-.707M12 20v-1m-6.364-1.636l.707-.707M4 12h1m1.636-6.364l.707.707" />
                                                    </svg>
                                                    Sedang Diproses
                                                </span>
                                            @break

                                            @case('Cancelled')
                                                <span
                                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    Dibatalkan
                                                </span>
                                            @break
                                        @endswitch

                                        <!-- Type Badge -->
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $order->type == 'Product' ? 'bg-purple-100 text-purple-800' : 'bg-indigo-100 text-indigo-800' }}">
                                            {{ $order->type == 'Product' ? 'Produk' : 'Layanan' }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Order Details -->
                                <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-2 lg:grid-cols-4">
                                    <div>
                                        <label
                                            class="block mb-1 text-xs font-medium tracking-wide text-gray-500 uppercase">
                                            {{ $order->type == 'Product' ? 'Produk' : 'Layanan' }}
                                        </label>
                                        <p class="text-sm font-medium text-gray-900">
                                            @if ($order->type == 'Product' && $order->product)
                                                {{ $order->product->name }}
                                            @elseif($order->type == 'Service' && $order->service)
                                                {{ $order->service->title }}
                                            @else
                                                <span class="text-gray-400">Data tidak tersedia</span>
                                            @endif
                                        </p>
                                    </div>

                                    <div>
                                        <label
                                            class="block mb-1 text-xs font-medium tracking-wide text-gray-500 uppercase">
                                            Penjual
                                        </label>
                                        <p class="text-sm font-medium text-gray-900">{{ $order->seller->name }}</p>
                                    </div>

                                    <div>
                                        @if ($order->type == 'Product')
                                            <label
                                                class="block mb-1 text-xs font-medium tracking-wide text-gray-500 uppercase">
                                                Kuantitas
                                            </label>
                                            <p class="text-sm font-medium text-gray-900">
                                                {{ number_format($order->quantity) }}</p>
                                        @endif

                                    </div>

                                    <div>
                                        <label
                                            class="block mb-1 text-xs font-medium tracking-wide text-gray-500 uppercase">
                                            Total Harga
                                        </label>
                                        <p class="text-lg font-bold text-green-600">Rp
                                            {{ number_format($order->total_price, 0, ',', '.') }}</p>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="flex flex-wrap gap-2 pt-4 border-t border-gray-200">
                                    <a href="{{ route('customer.service.show', $order) }}"
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

                                    @if ($order->order_status == 'Pending')
                                        <a href="/"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-white transition-colors bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                                                </path>
                                            </svg>
                                            Bayar Sekarang
                                        </a>
                                    @elseif($order->order_status == 'Paid')
                                        <button
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-white transition-colors bg-green-600 border border-transparent rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            Konfirmasi Selesai
                                        </button>
                                    @endif

                                    <a href="{{ route('customer.chat.detail', $order->seller_id) }}"
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
                    <svg class="w-12 h-12 mx-auto mb-4 text-gray-400" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.1497 8.80219L9.70794 9.40825L10.1497 8.80219ZM12 3.10615L11.4925 3.65833C11.7794 3.9221 12.2206 3.9221 12.5075 3.65833L12 3.10615ZM13.8503 8.8022L14.2921 9.40826L13.8503 8.8022ZM12 9.67598L12 10.426H12L12 9.67598ZM10.5915 8.19612C9.90132 7.69298 9.16512 7.08112 8.60883 6.43627C8.03452 5.77053 7.75 5.18233 7.75 4.71476H6.25C6.25 5.73229 6.82845 6.66885 7.47305 7.41607C8.13569 8.18419 8.97435 8.87349 9.70794 9.40825L10.5915 8.19612ZM7.75 4.71476C7.75 3.65612 8.27002 3.05231 8.8955 2.84182C9.54754 2.62238 10.5199 2.76435 11.4925 3.65833L12.5075 2.55398C11.2302 1.37988 9.70254 0.987559 8.41707 1.42016C7.10502 1.8617 6.25 3.09623 6.25 4.71476H7.75ZM14.2921 9.40826C15.0257 8.8735 15.8643 8.18421 16.527 7.41608C17.1716 6.66886 17.75 5.73229 17.75 4.71475H16.25C16.25 5.18234 15.9655 5.77055 15.3912 6.43629C14.8349 7.08113 14.0987 7.69299 13.4085 8.19613L14.2921 9.40826ZM17.75 4.71475C17.75 3.09622 16.895 1.8617 15.5829 1.42016C14.2975 0.987559 12.7698 1.37988 11.4925 2.55398L12.5075 3.65833C13.4801 2.76435 14.4525 2.62238 15.1045 2.84181C15.73 3.0523 16.25 3.65612 16.25 4.71475H17.75ZM9.70794 9.40825C10.463 9.95869 11.0618 10.426 12 10.426L12 8.92598C11.635 8.92598 11.4347 8.81074 10.5915 8.19612L9.70794 9.40825ZM13.4085 8.19613C12.5653 8.81074 12.365 8.92598 12 8.92598L12 10.426C12.9382 10.426 13.537 9.9587 14.2921 9.40826L13.4085 8.19613Z"
                            fill="currentColor" />
                        <path
                            d="M4 21.3884H6.25993C7.27079 21.3884 8.29253 21.4937 9.27633 21.6964C11.0166 22.0549 12.8488 22.0983 14.6069 21.8138C15.4738 21.6734 16.326 21.4589 17.0975 21.0865C17.7939 20.7504 18.6469 20.2766 19.2199 19.7459C19.7921 19.216 20.388 18.3487 20.8109 17.6707C21.1736 17.0894 20.9982 16.3762 20.4245 15.943C19.7873 15.4619 18.8417 15.462 18.2046 15.9433L16.3974 17.3084C15.697 17.8375 14.932 18.3245 14.0206 18.4699C13.911 18.4874 13.7962 18.5033 13.6764 18.5172M13.6764 18.5172C13.6403 18.5214 13.6038 18.5254 13.5668 18.5292M13.6764 18.5172C13.8222 18.486 13.9669 18.396 14.1028 18.2775C14.746 17.7161 14.7866 16.77 14.2285 16.1431C14.0991 15.9977 13.9475 15.8764 13.7791 15.7759C10.9817 14.1074 6.62942 15.3782 4 17.2429M13.6764 18.5172C13.6399 18.525 13.6033 18.5292 13.5668 18.5292M13.5668 18.5292C13.0434 18.5829 12.4312 18.5968 11.7518 18.5326"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                    </svg>
                    <h3 class="mb-2 text-lg font-medium text-gray-900">Belum Ada Pesanan</h3>
                    <p class="mb-6 text-gray-500">Anda belum memiliki riwayat pesanan apapun.</p>
                    <a href="{{ route('customer.home.index') }}"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white transition-colors bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Cari  Layanan
                    </a>
                </div>
            @endif
        </div>
    </div>
    </x-customer.app>
