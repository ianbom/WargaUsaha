<x-seller.app>
    <div class=" bg-gray-50">
        <div class="flex items-center justify-between ">
            <div class="text-xl font-semibold text-gray-800">
                Detail Transaction
            </div>
            <nav class="flex items-center space-x-2 text-sm text-gray-600">
                <a href="#" class="transition-colors text-primary hover:underline">Dashboard</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="text-gray-800"> Detail Transaction</span>
            </nav>
        </div>
        <div class="mx-auto ">
            <!-- Header -->
            <div class="mb-8">
                <div class="flex items-center justify-between">
                    <div>
                        @if ($order->type == 'Product')
                            <a href="{{ route('seller.transaction.product') }}"
                                class="inline-flex items-center mb-2 text-sm text-gray-500 hover:text-gray-700">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7"></path>
                                </svg>
                                Kembali ke Daftar Transaksi
                            </a>
                        @else
                            <a href="{{ route('seller.transaction.service') }}"
                                class="inline-flex items-center mb-2 text-sm text-gray-500 hover:text-gray-700">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7"></path>
                                </svg>
                                Kembali ke Daftar Transaksi
                            </a>
                        @endif

                        <h1 class="text-3xl font-bold text-gray-900">Detail Pesanan</h1>
                        <p class="mt-2 text-gray-600">{{ $order->order_code }}</p>
                    </div>

                    <!-- Status Badge -->
                    <div class="text-right">
                        @switch($order->order_status)
                            @case('Pending')
                                <span
                                    class="inline-flex items-center px-3 py-1 text-sm font-medium text-yellow-800 bg-yellow-100 rounded-full">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Menunggu Pembayaran
                                </span>
                            @break

                            @case('On-Proses')
                                <span
                                    class="inline-flex items-center px-3 py-1 text-sm font-medium text-blue-800 bg-blue-100 rounded-full">
                                    <svg class="w-4 h-4 mr-2 animate-spin" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v1m6.364 1.636l-.707.707M20 12h-1M18.364 18.364l-.707-.707M12 20v-1m-6.364-1.636l.707-.707M4 12h1m1.636-6.364l.707.707" />
                                    </svg>
                                    Sedang Diproses
                                </span>
                            @break

                            @case('Paid')
                                <span
                                    class="inline-flex items-center px-3 py-1 text-sm font-medium text-blue-800 bg-blue-100 rounded-full">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Sudah Dibayar
                                </span>
                            @break

                            @case('Completed')
                                <span
                                    class="inline-flex items-center px-3 py-1 text-sm font-medium text-green-800 bg-green-100 rounded-full">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Selesai
                                </span>
                            @break

                            @case('Cancelled')
                                <span
                                    class="inline-flex items-center px-3 py-1 text-sm font-medium text-red-700 border border-red-200 rounded-full bg-red-50">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    Dibatalkan
                                </span>
                            @break
                        @endswitch
                        <div class="mt-1 text-sm text-gray-500">
                            Dipesan: {{ $order->created_at->format('d M Y, H:i') }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
                <!-- Main Content -->
                <div class="space-y-6 lg:col-span-2">
                    <!-- Order Information -->
                    <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="flex items-center text-lg font-semibold text-gray-900">
                                @if ($order->type == 'Product')
                                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                    </svg>
                                @else
                                    <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                @endif
                                Informasi {{ $order->type == 'Product' ? 'Produk' : 'Layanan' }}
                            </h3>
                        </div>
                        <div class="p-6">
                            <div class="flex items-start space-x-4">
                                @if ($order->type == 'Product' && $order->product)
                                    <!-- Product Image Placeholder -->
                                    <div class="flex-shrink-0">
                                        <div class="flex items-center justify-center w-20 h-20 bg-gray-200 rounded-lg">
                                            <img src="{{ asset('storage/' . $order->product->image_url) }}"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="text-lg font-medium text-gray-900">{{ $order->product->name }}</h4>
                                        <p class="mt-1 text-sm text-gray-600">
                                            {{ $order->product->description ?? 'Tidak ada deskripsi' }}</p>
                                        <div class="grid grid-cols-1 gap-4 mt-3 text-sm sm:grid-cols-2">
                                            <div>
                                                <span class="font-medium text-gray-700">Kategori:</span>
                                                <span
                                                    class="text-gray-600">{{ $order->product->category->name ?? 'Tidak dikategorikan' }}</span>
                                            </div>
                                            <div>
                                                <span class="font-medium text-gray-700">SKU:</span>
                                                <span class="text-gray-600">{{ $order->product->sku ?? 'N/A' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @elseif($order->type == 'Service' && $order->service)
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
                                        <h4 class="text-lg font-medium text-gray-900">{{ $order->service->title }}
                                        </h4>
                                        <p class="mt-1 text-sm text-gray-600">
                                            {{ $order->service->description ?? 'Tidak ada deskripsi' }}</p>
                                        <div class="grid grid-cols-1 gap-4 mt-3 text-sm sm:grid-cols-2">
                                            <div>
                                                <span class="font-medium text-gray-700">Durasi:</span>
                                                <span
                                                    class="text-gray-600">{{ $order->service->duration ?? 'Tidak ditentukan' }}</span>
                                            </div>
                                            <div>
                                                <span class="font-medium text-gray-700">Kategori:</span>
                                                <span
                                                    class="text-gray-600">{{ $order->service->category->name ?? 'Tidak dikategorikan' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="flex-1">
                                        <div class="py-8 text-center">
                                            <svg class="w-12 h-12 mx-auto text-gray-400" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.664-.833-2.464 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z">
                                                </path>
                                            </svg>
                                            <p class="mt-2 text-sm text-gray-500">Data {{ strtolower($order->type) }}
                                                tidak tersedia</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Seller Information -->
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
                                    @if ($order->buyer->profile_pic)
                                        <!-- Tampilkan gambar profil jika ada -->
                                        <img class="object-cover w-12 h-12 border border-gray-200 rounded-full"
                                            src="{{ asset('storage/' . $order->buyer->profile_pic) }}"
                                            alt="{{ $order->buyer->name }}">
                                    @else
                                        <!-- Tampilkan inisial jika tidak ada gambar profil -->
                                        <div
                                            class="flex items-center justify-center w-12 h-12 bg-gray-300 rounded-full">
                                            <span class="text-sm font-medium text-gray-700">
                                                {{ strtoupper(substr($order->buyer->name, 0, 2)) }}
                                            </span>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-lg font-medium text-gray-900">{{ $order->buyer->name }}</h4>
                                    <p class="text-sm text-gray-600">{{ $order->buyer->email }}</p>
                                    @if ($order->buyer->phone)
                                        <p class="text-sm text-gray-600">{{ $order->buyer->phone }}</p>
                                    @endif
                                    @if ($order->note)
                                        <div class="mt-4">
                                            <h5 class="text-sm font-semibold text-gray-800">Catatan dari Pembeli:</h5>
                                            <p
                                                class="p-3 mt-1 text-sm text-gray-700 border border-gray-200 rounded bg-gray-50">
                                                {{ $order->note }}
                                            </p>
                                        </div>
                                    @else
                                        <p
                                            class="p-3 mt-1 text-sm text-gray-700 border border-gray-200 rounded bg-gray-50">
                                            Tidak ada catatan
                                        </p>
                                    @endif
                                </div>
                                <div>
                                    <button
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-700 transition-colors bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                            </path>
                                        </svg>
                                        Hubungi
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Review Section - Only show if order is completed -->
                    @if ($order->order_status == 'Completed')
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

                            @if ($order->review)
                                <!-- Show existing review -->
                                <div class="p-6">
                                    <div class="p-4 rounded-lg bg-gray-50">
                                        <div class="flex items-center mb-3">
                                            <div class="flex items-center">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <svg class="w-5 h-5 {{ $i <= $order->review->rating ? 'text-yellow-400' : 'text-gray-300' }}"
                                                        fill="currentColor" viewBox="0 0 20 20">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                        </path>
                                                    </svg>
                                                @endfor
                                            </div>
                                            <span
                                                class="ml-2 text-sm text-gray-600">{{ $order->review->rating }}/5</span>
                                        </div>
                                        @if ($order->review->comment)
                                            <p class="text-gray-700">{{ $order->review->comment }}</p>
                                        @endif
                                        <p class="mt-2 text-xs text-gray-500">
                                            Diberikan pada {{ $order->review->created_at->format('d M Y, H:i') }}
                                        </p>
                                    </div>
                                </div>
                            @else
                                <!-- Show message when no review exists -->
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
                            @endif
                        </div>
                    @endif


                </div>



                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- Order Summary -->
                    <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900">Ringkasan Pesanan</h3>
                        </div>
                        <div class="p-6 space-y-4">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Kode Pesanan:</span>
                                <span class="font-medium text-gray-900">{{ $order->order_code }}</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Tipe:</span>
                                <span
                                    class="font-medium text-gray-900">{{ $order->type == 'Product' ? 'Produk' : 'Layanan' }}</span>
                            </div>
                            @if ($order->type == 'Product')
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-600">Kuantitas:</span>
                                    <span
                                        class="font-medium text-gray-900">{{ number_format($order->quantity) }}</span>
                                </div>

                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-600">Harga per Unit:</span>
                                    <span class="font-medium text-gray-900">
                                        Rp {{ number_format($order->total_price / $order->quantity, 0, ',', '.') }}
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

                            <hr class="border-gray-200">
                            <div class="flex justify-between">
                                <span class="text-base font-medium text-gray-900">Total:</span>
                                <span class="text-xl font-bold text-green-600">
                                    Rp {{ number_format($order->total_price, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    @if ($order->order_status != 'Cancelled')
                        <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm">
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-900">Aksi</h3>
                            </div>
                            <div class="p-6 space-y-3">
                                @if ($order->order_status == 'Pending')
                                    <form action="{{ route('seller.transaction.serviceAccept', $order) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menyetujui pesanan ini?')">
                                        @csrf
                                        @method('PUT')

                                        <button type="submit"
                                            class="inline-flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-blue-700 transition-colors bg-white border border-blue-300 rounded-md shadow-sm hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                                stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 12l2 2l4 -4m5 2a9 9 0 11-18 0a9 9 0 0118 0z" />
                                            </svg>
                                            Setujui Pesanan
                                        </button>
                                    </form>

                                    <form action="{{ route('seller.transaction.serviceReject', $order) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin membatalkan pesanan ini?')">
                                        @csrf
                                        @method('PUT')

                                        <button type="submit"
                                            class="inline-flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-red-700 transition-colors bg-white border border-red-300 rounded-md shadow-sm hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                            Batalkan Pesanan
                                        </button>
                                    </form>
                                @endif

                                <button
                                    class="inline-flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 transition-colors bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                    Unduh Invoice
                                </button>
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
                                                        <svg class="w-4 h-4 text-white" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                                    <div>
                                                        <p class="text-sm text-gray-500">Pesanan dibuat</p>
                                                    </div>
                                                    <div class="text-sm text-right text-gray-500 whitespace-nowrap">
                                                        <time datetime="{{ $order->created_at->toIso8601String() }}">
                                                            {{ $order->created_at->format('d M Y, H:i') }}
                                                        </time>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    @if ($order->type == 'Product')
                                        @if ($order->order_status == 'Paid' || $order->order_status == 'Completed')
                                            <!-- Payment Received -->
                                            <li>
                                                <div class="relative pb-8">
                                                    <div class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200">
                                                    </div>
                                                    <div class="relative flex space-x-3">
                                                        <div>
                                                            <span
                                                                class="flex items-center justify-center w-8 h-8 bg-green-500 rounded-full ring-8 ring-white">
                                                                <svg class="w-4 h-4 text-white" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M5 13l4 4L19 7"></path>
                                                                </svg>
                                                            </span>
                                                        </div>
                                                        <div
                                                            class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                                            <div>
                                                                <p class="text-sm text-gray-500">Pembayaran diterima
                                                                </p>
                                                            </div>
                                                            <div
                                                                class="text-sm text-right text-gray-500 whitespace-nowrap">
                                                                @if ($order->paid_at)
                                                                    {{ $order->paid_at ? \Carbon\Carbon::parse($order->completed_at)->format('d M Y, H:i') : '-' }}
                                                                @else
                                                                    <span class="text-yellow-600">Menunggu
                                                                        konfirmasi</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif

                                        @if ($order->order_status == 'Cancelled')
                                            <li>
                                                <div class="relative pb-8">
                                                    <!-- Garis vertikal diubah menjadi abu-abu lebih muda -->
                                                    <div class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-100">
                                                    </div>

                                                    <div class="relative flex space-x-3">
                                                        <div>
                                                            <!-- Ikon silang dengan latar abu-abu -->
                                                            <span
                                                                class="flex items-center justify-center w-8 h-8 bg-gray-300 rounded-full ring-8 ring-white">
                                                                <svg class="w-4 h-4 text-gray-600" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                                    stroke-width="2">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        d="M6 18L18 6M6 6l12 12"></path>
                                                                </svg>
                                                            </span>
                                                        </div>
                                                        <div
                                                            class="flex justify-between flex-1 min-w-0 pt-1 space-x-4">
                                                            <div>
                                                                <!-- Teks status dengan warna abu-abu -->
                                                                <p class="text-sm font-medium text-gray-500">Pesanan
                                                                    Dibatalkan</p>
                                                                <!-- Alasan pembatalan jika ada -->
                                                                @if ($order->cancellation_reason)
                                                                    <p class="mt-1 text-xs text-gray-400">
                                                                        Alasan: {{ $order->cancellation_reason }}
                                                                    </p>
                                                                @endif
                                                            </div>
                                                            <div
                                                                class="text-sm text-right text-gray-500 whitespace-nowrap">
                                                                @if ($order->cancelled_at)
                                                                    <!-- Perbaikan: gunakan cancelled_at bukan completed_at -->
                                                                    {{ \Carbon\Carbon::parse($order->cancelled_at)->format('d M Y, H:i') }}
                                                                @else
                                                                    <span class="text-gray-400">Tanpa tanggal</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif

                                        @if ($order->order_status === 'Completed')
                                            <!-- Order Completed -->
                                            <li>
                                                <div class="relative pb-8">
                                                    <div class="relative flex space-x-3">
                                                        <div>
                                                            <span
                                                                class="flex items-center justify-center w-8 h-8 bg-green-500 rounded-full ring-8 ring-white">
                                                                <svg class="w-4 h-4 text-white" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                                                    </path>
                                                                </svg>
                                                            </span>
                                                        </div>
                                                        <div
                                                            class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                                            <div>
                                                                <p class="text-sm text-gray-500">Pesanan selesai</p>
                                                            </div>
                                                            <div
                                                                class="text-sm text-right text-gray-500 whitespace-nowrap">
                                                                @if ($order->completed_at)
                                                                    {{ $order->completed_at ? \Carbon\Carbon::parse($order->completed_at)->format('d M Y, H:i') : '-' }}
                                                                @else
                                                                    {{ $order->updated_at->format('d M Y, H:i') }}
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                    @else
                                        @if ($order->order_status === 'On-Proses')
                                            <!-- Order in Process -->
                                            <li>
                                                <div class="relative pb-8">
                                                    <div class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200">
                                                    </div>
                                                    <div class="relative flex space-x-3">
                                                        <div>
                                                            <span
                                                                class="flex items-center justify-center w-8 h-8 bg-blue-500 rounded-full ring-8 ring-white">
                                                                <svg class="w-4 h-4 text-white" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M8 17l4 4 8-8"></path>
                                                                </svg>
                                                            </span>
                                                        </div>
                                                        <div
                                                            class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                                            <div>
                                                                <p class="text-sm text-gray-500">Pesanan sedang
                                                                    diproses</p>
                                                            </div>
                                                            <div
                                                                class="text-sm text-right text-gray-500 whitespace-nowrap">
                                                                {{ $order->updaton_processed_ated_at ? \Carbon\Carbon::parse($order->on_processed_at)->format('d M Y, H:i') : '-' }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif

                                        @if ($order->order_status == 'Cancelled')
                                            <li>
                                                <div class="relative pb-8">
                                                    <!-- Garis vertikal diubah menjadi abu-abu lebih muda -->
                                                    <div class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-100">
                                                    </div>

                                                    <div class="relative flex space-x-3">
                                                        <div>
                                                            <!-- Ikon silang dengan latar abu-abu -->
                                                            <span
                                                                class="flex items-center justify-center w-8 h-8 bg-gray-300 rounded-full ring-8 ring-white">
                                                                <svg class="w-4 h-4 text-gray-600" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                                    stroke-width="2">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        d="M6 18L18 6M6 6l12 12"></path>
                                                                </svg>
                                                            </span>
                                                        </div>
                                                        <div
                                                            class="flex justify-between flex-1 min-w-0 pt-1 space-x-4">
                                                            <div>
                                                                <!-- Teks status dengan warna abu-abu -->
                                                                <p class="text-sm font-medium text-gray-500">Pesanan
                                                                    Dibatalkan</p>
                                                                <!-- Alasan pembatalan jika ada -->
                                                                @if ($order->cancellation_reason)
                                                                    <p class="mt-1 text-xs text-gray-400">
                                                                        Alasan: {{ $order->cancellation_reason }}
                                                                    </p>
                                                                @endif
                                                            </div>
                                                            <div
                                                                class="text-sm text-right text-gray-500 whitespace-nowrap">
                                                                @if ($order->cancelled_at)
                                                                    <!-- Perbaikan: gunakan cancelled_at bukan completed_at -->
                                                                    {{ \Carbon\Carbon::parse($order->cancelled_at)->format('d M Y, H:i') }}
                                                                @else
                                                                    <span class="text-gray-400">Tanpa tanggal</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif

                                        @if ($order->order_status === 'Completed')
                                            <li>
                                                <div class="relative pb-8">
                                                    <div class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200">
                                                    </div>
                                                    <div class="relative flex space-x-3">
                                                        <div>
                                                            <span
                                                                class="flex items-center justify-center w-8 h-8 bg-blue-500 rounded-full ring-8 ring-white">
                                                                <svg class="w-4 h-4 text-white" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M8 17l4 4 8-8"></path>
                                                                </svg>
                                                            </span>
                                                        </div>
                                                        <div
                                                            class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                                            <div>
                                                                <p class="text-sm text-gray-500">Pesanan diproses</p>
                                                            </div>
                                                            <div
                                                                class="text-sm text-right text-gray-500 whitespace-nowrap">
                                                                {{ $order->on_processed_at ? \Carbon\Carbon::parse($order->on_processed_at)->format('d M Y, H:i') : '-' }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <!-- Order Completed -->
                                            <li>
                                                <div class="relative pb-8">
                                                    <div class="relative flex space-x-3">
                                                        <div>
                                                            <span
                                                                class="flex items-center justify-center w-8 h-8 bg-green-500 rounded-full ring-8 ring-white">
                                                                <svg class="w-4 h-4 text-white" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                                                    </path>
                                                                </svg>
                                                            </span>
                                                        </div>
                                                        <div
                                                            class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                                            <div>
                                                                <p class="text-sm text-gray-500">Pesanan selesai</p>
                                                            </div>
                                                            <div
                                                                class="text-sm text-right text-gray-500 whitespace-nowrap">
                                                                @if ($order->completed_at)
                                                                    {{ $order->completed_at ? \Carbon\Carbon::parse($order->completed_at)->format('d M Y, H:i') : '-' }}
                                                                @else
                                                                    {{ $order->updated_at->format('d M Y, H:i') }}
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-seller.app>

<script>
    // Rating stars functionality
    document.addEventListener('DOMContentLoaded', function() {
        const stars = document.querySelectorAll('.star-btn');
        const ratingInput = document.getElementById('rating-input');
        let selectedRating = 0;

        stars.forEach((star, index) => {
            star.addEventListener('click', function() {
                selectedRating = index + 1;
                ratingInput.value = selectedRating;
                updateStars(selectedRating);
            });

            star.addEventListener('mouseenter', function() {
                updateStars(index + 1);
            });
        });

        document.getElementById('rating-stars').addEventListener('mouseleave', function() {
            updateStars(selectedRating);
        });

        function updateStars(rating) {
            stars.forEach((star, index) => {
                const svg = star.querySelector('svg');
                if (index < rating) {
                    svg.classList.remove('text-gray-300');
                    svg.classList.add('text-yellow-400');
                } else {
                    svg.classList.remove('text-yellow-400');
                    svg.classList.add('text-gray-300');
                }
            });
        }
    });
</script>
