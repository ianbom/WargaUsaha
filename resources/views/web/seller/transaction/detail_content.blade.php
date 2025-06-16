<div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
                <!-- Main Content -->
                <div class="space-y-6 lg:col-span-2">
                   <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="flex items-center text-lg font-semibold text-gray-900">
                            <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                            Informasi Produk
                        </h3>
                    </div>
                        @foreach($groupOrder->orders as $order)
                            <!-- Order Information -->

                                <div class="p-6">
                                    <div class="flex items-start space-x-4">
                                        @if ($order->type == 'Product' && $order->product)
                                            <!-- Product Image -->
                                            <div class="flex-shrink-0">
                                                <div class="flex items-center justify-center w-20 h-20 bg-gray-200 rounded-lg">
                                                    @if($order->product->image_url)
                                                        <img src="{{ asset('storage/' . $order->product->image_url) }}"
                                                            alt="{{ $order->product->name }}" class="w-full h-full object-cover rounded-lg">
                                                    @else
                                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                                        </svg>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="flex-1">
                                                <h4 class="text-lg font-medium text-gray-900">{{ $order->product->name }}</h4>
                                                <p class="mt-1 text-sm text-gray-600">
                                                    {{ $order->product->description ?? 'Tidak ada deskripsi' }}
                                                </p>
                                                <div class="grid grid-cols-1 gap-4 mt-3 text-sm sm:grid-cols-2">
                                                    <div>
                                                        <span class="font-medium text-gray-700">Kategori:</span>
                                                        <span class="text-gray-600">{{ $order->product->category->name ?? 'Tidak dikategorikan' }}</span>
                                                    </div>
                                                    <div>
                                                        <span class="font-medium text-gray-700">Order Code:</span>
                                                        <span class="text-gray-600">{{ $order->order_code }}</span>
                                                    </div>
                                                    <div>
                                                        <span class="font-medium text-gray-700">Kuantitas:</span>
                                                        <span class="text-gray-600">{{ $order->quantity ?? 1 }}</span>
                                                    </div>
                                                    <div>
                                                        <span class="font-medium text-gray-700">Harga Saat Order:</span>
                                                        <span class="text-gray-600">Rp {{ number_format($order->product_price, 0, ',', '.') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif($order->type == 'Service' && $order->service)
                                            <!-- Service Icon -->
                                            <div class="flex-shrink-0">
                                                <div class="flex items-center justify-center w-20 h-20 bg-gray-200 rounded-lg">
                                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z">
                                                        </path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="flex-1">
                                                <h4 class="text-lg font-medium text-gray-900">{{ $order->service->title }}</h4>
                                                <p class="mt-1 text-sm text-gray-600">
                                                    {{ $order->service->description ?? 'Tidak ada deskripsi' }}
                                                </p>
                                                <div class="grid grid-cols-1 gap-4 mt-3 text-sm sm:grid-cols-2">

                                                    <div>
                                                        <span class="font-medium text-gray-700">Kategori:</span>
                                                        <span class="text-gray-600">{{ $order->service->category->name ?? 'Tidak dikategorikan' }}</span>
                                                    </div>
                                                    <div>
                                                        <span class="font-medium text-gray-700">Kuantitas:</span>
                                                        <span class="text-gray-600">{{ $order->quantity ?? 1 }}</span>
                                                    </div>
                                                    <div>
                                                        <span class="font-medium text-gray-700">Harga Saat Order:</span>
                                                        <span class="text-gray-600">Rp {{ number_format($order->product_price, 0, ',', '.') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <!-- Fallback when product/service data is not available -->
                                            <div class="flex-1">
                                                <h4 class="text-lg font-medium text-gray-900">{{ $order->product_name }}</h4>
                                                <p class="mt-1 text-sm text-gray-600">Data {{ strtolower($order->type) }} tidak tersedia</p>
                                                <div class="grid grid-cols-1 gap-4 mt-3 text-sm sm:grid-cols-2">
                                                    <div>
                                                        <span class="font-medium text-gray-700">Tipe:</span>
                                                        <span class="text-gray-600">{{ $order->type }}</span>
                                                    </div>
                                                    <div>
                                                        <span class="font-medium text-gray-700">Kuantitas:</span>
                                                        <span class="text-gray-600">{{ $order->quantity ?? 1 }}</span>
                                                    </div>
                                                    <div>
                                                        <span class="font-medium text-gray-700">Harga:</span>
                                                        <span class="text-gray-600">Rp {{ number_format($order->product_price, 0, ',', '.') }}</span>
                                                    </div>
                                                    <div>
                                                        <span class="font-medium text-gray-700">Total:</span>
                                                        <span class="text-gray-600">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Order Note if exists -->
                                    @if ($order->note)
                                        <div class="mt-4 pt-4 border-t border-gray-200">
                                            <h5 class="text-sm font-semibold text-gray-800">Catatan Pesanan:</h5>
                                            <p class="p-3 mt-1 text-sm text-gray-700 border border-gray-200 rounded bg-gray-50">
                                                {{ $order->note }}
                                            </p>
                                        </div>
                                    @endif
                                </div>

                        @endforeach
                 </div>

    <!-- Buyer Information -->
    <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="flex items-center text-lg font-semibold text-gray-900">
                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                Informasi Pembeli
            </h3>
        </div>
        <div class="p-6">
            <div class="flex items-center space-x-4">
                <div class="flex-shrink-0">
                    @if ($groupOrder->user->profile_pic)
                        <!-- Display profile picture if exists -->
                        <img class="object-cover w-12 h-12 border border-gray-200 rounded-full"
                            src="{{ asset('storage/' . $groupOrder->user->profile_pic) }}"
                            alt="{{ $groupOrder->user->name }}">
                    @else
                        <!-- Display initials if no profile picture -->
                        <div class="flex items-center justify-center w-12 h-12 bg-gray-300 rounded-full">
                            <span class="text-sm font-medium text-gray-700">
                                {{ strtoupper(substr($groupOrder->user->name, 0, 2)) }}
                            </span>
                        </div>
                    @endif
                </div>
                <div class="flex-1">
                    <h4 class="text-lg font-medium text-gray-900">{{ $groupOrder->user->name }}</h4>
                    <p class="text-sm text-gray-600">{{ $groupOrder->user->email }}</p>
                    @if ($groupOrder->user->phone)
                        <p class="text-sm text-gray-600">{{ $groupOrder->user->phone }}</p>
                    @endif
                </div>
                <div>
                    <a href="{{ route('customer.chat.detail', $groupOrder->user->id) }}"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-700 transition-colors bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                            </path>
                        </svg>
                        Hubungi
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Alamat Pembeli --}}
    <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="flex items-center text-lg font-semibold text-gray-900">
                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                Alamat Pembeli
            </h3>
        </div>
        <div class="p-6">
            <div class="flex items-start space-x-4">

                <div class="flex-1">

                    <div class="space-y-2">
                        @if ($groupOrder->user->address)
                            <div class="flex items-start">
                                <svg class="w-4 h-4 mr-2 mt-0.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                <p class="text-sm text-gray-700">{{ $groupOrder->user->address }}</p>
                            </div>
                        @endif

                        @if ($groupOrder->user->ward && $groupOrder->user->ward->name)
                            <div class="flex items-start">
                                <svg class="w-4 h-4 mr-2 mt-0.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <p class="text-sm text-gray-700">
                                   Kelurahan {{ $groupOrder->user->ward->name }}
                                    @if ($groupOrder->user->ward->subdistrict)
                                        , Kecamatan {{ $groupOrder->user->ward->subdistrict->name }}
                                    @endif
                                    @if ($groupOrder->user->ward->district && $groupOrder->user->ward->district->city)
                                        , {{ $groupOrder->user->ward->district->city->name }}
                                    @endif
                                    @if ($groupOrder->user->ward->district && $groupOrder->user->ward->district->city && $groupOrder->user->ward->district->city->province)
                                        , {{ $groupOrder->user->ward->district->city->province->name }}
                                    @endif
                                </p>
                            </div>
                        @endif

                        @if ($groupOrder->user->location_lat && $groupOrder->user->location_long)
                            <div class="flex items-start">
                                <svg class="w-4 h-4 mr-2 mt-0.5 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                                </svg>
                                <p class="text-sm text-gray-600">
                                    Koordinat: {{ number_format($groupOrder->user->location_lat, 6) }}, {{ number_format($groupOrder->user->location_long, 6) }}
                                </p>
                            </div>
                        @endif
                    </div>

                    @if (!$groupOrder->user->address && !$groupOrder->user->ward)
                        <div class="flex items-center p-3 mt-3 bg-yellow-50 border border-yellow-200 rounded-md">
                            <svg class="w-5 h-5 mr-2 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            <p class="text-sm text-yellow-700">Alamat belum dilengkapi</p>
                        </div>
                    @endif
                </div>
                <div class="flex-shrink-0">
                    @if ($groupOrder->user->location_lat && $groupOrder->user->location_long)
                        <a href="https://maps.google.com/maps?q={{ $groupOrder->user->location_lat }},{{ $groupOrder->user->location_long }}"
                           target="_blank"
                           class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-white transition-colors bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Lihat Peta
                        </a>
                    @else
                        <button
                            class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-700 transition-colors bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                </path>
                            </svg>
                            Hubungi
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Review Section - Only show if order is completed -->
    @if ($groupOrder->order_status == 'Completed')
        <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="flex items-center text-lg font-semibold text-gray-900">
                    <svg class="w-5 h-5 mr-2 text-yellow-500" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                    </svg>
                    Review dan Komentar
                </h3>
            </div>

            {{-- Note: You'll need to add review relationship to GroupOrder model or modify this section based on your review system --}}
            <div class="p-6">
                <div class="p-6 text-center rounded-lg bg-gray-50">
                    <div class="flex justify-center mb-3">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.5"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                            </path>
                        </svg>
                    </div>
                    <h4 class="mb-2 text-lg font-medium text-gray-900">Belum Ada Review</h4>
                    <p class="mb-4 text-gray-600">Customer belum memberikan review dan penilaian
                        untuk pesanan ini.</p>
                    <div class="flex items-center justify-center text-sm text-gray-500">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Review dapat diberikan setelah pesanan selesai
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>



<div class="space-y-6">
    <!-- Order Summary -->
    <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Ringkasan Pesanan</h3>
        </div>
        <div class="p-6 space-y-4">
            @foreach ($groupOrder->orders as $order)
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Kode Pesanan:</span>
                    <span class="font-medium text-gray-900">{{ $order->order_code }}</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Tipe:</span>
                    <span class="font-medium text-gray-900">{{ $order->type == 'Product' ? 'Produk' : 'Layanan' }}</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span class="text-gray-600">Nama:</span>
                    <span class="font-medium text-gray-900">{{ $order->product_name }}</span>
                </div>
                @if ($order->type == 'Product')
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Kuantitas:</span>
                        <span class="font-medium text-gray-900">{{ number_format($order->quantity, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Harga per Unit:</span>
                        <span class="font-medium text-gray-900">
                            Rp {{ number_format($order->product_price, 0, ',', '.') }}
                        </span>
                    </div>
                @else
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Harga:</span>
                        <span class="font-medium text-gray-900">
                            Rp {{ number_format($order->total_price, 0, ',', '.') }}
                        </span>
                    </div>
                @endif
            @endforeach
            <hr class="border-gray-200">
            <div class="flex justify-between text-sm">
                <span class="text-gray-600">Subtotal:</span>
                <span class="font-medium text-gray-900">
                    Rp {{ number_format($groupOrder->sub_total, 0, ',', '.') }}
                </span>
            </div>
            <div class="flex justify-between text-sm">
                <span class="text-gray-600">Biaya Pengiriman:</span>
                <span class="font-medium text-gray-900">
                    Rp {{ number_format($groupOrder->shipping_cost ?? 0, 0, ',', '.') }}
                </span>
            </div>
            <hr class="border-gray-200">
            <div class="flex justify-between">
                <span class="text-base font-medium text-gray-900">Total:</span>
                <span class="text-xl font-bold text-green-600">
                    Rp {{ number_format($groupOrder->total_price, 0, ',', '.') }}
                </span>
            </div>
        </div>
    </div>

    <!-- Actions -->
    @if ($groupOrder->order_status != 'Cancelled')
        <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">Aksi</h3>
            </div>
            <div class="p-6 space-y-3">
                @if ($groupOrder->order_status == 'Paid')
                   <form action="{{ route('seller.order.ship', $groupOrder) }}" method="POST"
                          onsubmit="return confirm('Apakah Anda yakin ingin mengirim pesanan ini?')">
                        @csrf
                        @method('PUT')
                        <input type="text" name="order_status" value="Shipped" hidden>
                        <button type="submit"
                            class="inline-flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-white transition-colors bg-green-600 border border-green-600 rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8 7l4-4m0 0l4 4m-4-4v18M3 17l3 3 3-3m0 0V7" />
                            </svg>
                            Antarkan Pesanan
                        </button>
                    </form>

                @endif

                {{-- <button
                    class="inline-flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 transition-colors bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                    Unduh Invoice
                </button> --}}
            </div>
        </div>
    @endif

    <!-- Order Timeline -->
    <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Timeline Pesanan</h3>
        </div>
        <div class="p-6">
            <div class="flow-root">
                <ul class="-mb-8">
                    <!-- Order Created -->
                    <li>
                        <div class="relative pb-8">
                            <div class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200"></div>
                            <div class="relative flex space-x-3">
                                <div>
                                    <span
                                        class="flex items-center justify-center w-8 h-8 bg-blue-500 rounded-full ring-8 ring-white">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </span>
                                </div>
                                <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                    <div>
                                        <p class="text-sm text-gray-500">Pesanan dibuat</p>
                                    </div>
                                    <div class="text-sm text-right text-gray-500 whitespace-nowrap">
                                        <time datetime="{{ $groupOrder->created_at->toIso8601String() }}">
                                            {{ $groupOrder->created_at->format('d M Y, H:i') }}
                                        </time>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    @if ($groupOrder->order_status == 'Paid' || $groupOrder->order_status == 'Shipped' || $groupOrder->order_status == 'Completed')
                        <!-- Payment Received -->
                        <li>
                            <div class="relative pb-8">
                                <div class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200"></div>
                                <div class="relative flex space-x-3">
                                    <div>
                                        <span
                                            class="flex items-center justify-center w-8 h-8 bg-green-500 rounded-full ring-8 ring-white">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-gray-500">Pembayaran diterima</p>
                                        </div>
                                        <div class="text-sm text-right text-gray-500 whitespace-nowrap">
                                            @if ($groupOrder->paid_at)
                                                {{ \Carbon\Carbon::parse($groupOrder->paid_at)->format('d M Y, H:i') }}
                                            @else
                                                <span class="text-yellow-600">Menunggu konfirmasi</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endif

                    @if ($groupOrder->order_status == 'On-Proses')
                        <!-- Order in Process -->
                        <li>
                            <div class="relative pb-8">
                                <div class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200"></div>
                                <div class="relative flex space-x-3">
                                    <div>
                                        <span
                                            class="flex items-center justify-center w-8 h-8 bg-blue-500 rounded-full ring-8 ring-white">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 17l4 4 8-8"></path>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-gray-500">Pesanan sedang diproses</p>
                                        </div>
                                        <div class="text-sm text-right text-gray-500 whitespace-nowrap">
                                            {{ $groupOrder->on_processed_at ? \Carbon\Carbon::parse($groupOrder->on_processed_at)->format('d M Y, H:i') : '-' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endif

                    @if ($groupOrder->order_status == 'Shipped')
                        <!-- Order Shipped -->
                        <li>
                            <div class="relative pb-8">
                                <div class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200"></div>
                                <div class="relative flex space-x-3">
                                    <div>
                                        <span
                                            class="flex items-center justify-center w-8 h-8 bg-blue-500 rounded-full ring-8 ring-white">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M20 7l-8-4-8 4m16 0v10a2 2 0 01-2 2H6a2 2 0 01-2-2V7m16 0H4"></path>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-gray-500">Pesanan dikirim</p>
                                        </div>
                                        <div class="text-sm text-right text-gray-500 whitespace-nowrap">
                                            {{ $groupOrder->shipped_at ? \Carbon\Carbon::parse($groupOrder->shipped_at)->format('d M Y, H:i') : '-' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endif

                    @if ($groupOrder->order_status == 'Completed')
                        <!-- Order Completed -->
                        <li>
                            <div class="relative pb-8">
                                <div class="relative flex space-x-3">
                                    <div>
                                        <span
                                            class="flex items-center justify-center w-8 h-8 bg-green-500 rounded-full ring-8 ring-white">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-gray-500">Pesanan selesai</p>
                                        </div>
                                        <div class="text-sm text-right text-gray-500 whitespace-nowrap">
                                            {{ $groupOrder->completed_at ? \Carbon\Carbon::parse($groupOrder->completed_at)->format('d M Y, H:i') : '-' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endif

                    @if ($groupOrder->order_status == 'Cancelled')
                        <!-- Order Cancelled -->
                        <li>
                            <div class="relative pb-8">
                                <div class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-100"></div>
                                <div class="relative flex space-x-3">
                                    <div>
                                        <span
                                            class="flex items-center justify-center w-8 h-8 bg-gray-300 rounded-full ring-8 ring-white">
                                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="flex justify-between flex-1 min-w-0 pt-1 space-x-4">
                                        <div>
                                            <p class="text-sm font-medium text-gray-500">Pesanan Dibatalkan</p>
                                            @if ($groupOrder->cancellation_reason)
                                                <p class="mt-1 text-xs text-gray-400">
                                                    Alasan: {{ $groupOrder->cancellation_reason }}
                                                </p>
                                            @endif
                                        </div>
                                        <div class="text-sm text-right text-gray-500 whitespace-nowrap">
                                            {{ $groupOrder->cancelled_at ? \Carbon\Carbon::parse($groupOrder->cancelled_at)->format('d M Y, H:i') : 'Tanpa tanggal' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
            </div>
