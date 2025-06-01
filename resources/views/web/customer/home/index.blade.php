<x-customer.app>
    <div class="min-h-screen bg-gray-50">
        <!-- Hero Section -->
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white">
            <div class="container mx-auto px-4 py-16">
                <div class="text-center">
                    <h1 class="text-4xl md:text-6xl font-bold mb-4">
                        Selamat Datang di Toko Kami
                    </h1>
                    <p class="text-xl md:text-2xl mb-8 opacity-90">
                        Kecamatan Srengat, Kelurahan Kauman. Blitar
                    </p>
                    <div class="relative max-w-md mx-auto">
                        <input type="text"
                               placeholder="Cari produk..."
                               class="w-full px-4 py-3 rounded-lg text-gray-800 focus:outline-none focus:ring-2 focus:ring-white">
                        <button class="absolute right-2 top-2 p-2 text-gray-600 hover:text-gray-800">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products Section -->
        <div class="container mx-auto px-4 py-12">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Produk Terbaru</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Jelajahi koleksi produk berkualitas tinggi dari berbagai kategori
                </p>
            </div>

            @if($products && count($products) > 0)
                <!-- Products Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($products as $product)
                        <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 overflow-hidden">
                            <!-- Product Image -->
                            <div class="relative overflow-hidden">
                                <img src="{{ asset('storage/' . $product->image_url) }}"
                                     alt="{{ $product->name }}"
                                     class="w-full h-48 object-cover transition-transform duration-300 hover:scale-110">

                                <!-- Stock Badge -->
                                @if($product->stock <= 5)
                                    <div class="absolute top-2 left-2">
                                        <span class="bg-red-500 text-white text-xs px-2 py-1 rounded-full">
                                            Stok Terbatas
                                        </span>
                                    </div>
                                @endif

                                <!-- Wishlist Button -->
                                <button class="absolute top-2 right-2 p-2 bg-white/80 hover:bg-white rounded-full transition-colors duration-200">
                                    <svg class="w-5 h-5 text-gray-600 hover:text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </button>
                            </div>

                            <!-- Product Info -->
                            <div class="p-4">
                                <h3 class="font-semibold text-gray-800 text-lg mb-2 line-clamp-2">
                                    {{ $product->name }}
                                </h3>

                                <p class="text-gray-600 text-sm mb-3 line-clamp-2">
                                    {{ $product->description }}
                                </p>

                                <!-- Price and Stock -->
                                <div class="flex items-center justify-between mb-4">
                                    <div>
                                        <span class="text-2xl font-bold text-blue-600">
                                            Rp {{ number_format($product->price, 0, ',', '.') }}
                                        </span>
                                    </div>
                                    <div class="text-right">
                                        <span class="text-sm text-gray-500">Stok: {{ $product->stock }}</span>
                                    </div>
                                </div>

                                <!-- Category Badge -->
                                @if($product->productCategory)
                                    <div class="mb-3">
                                        <span class="inline-block bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded-full">
                                            {{ $product->productCategory->name }}
                                        </span>
                                    </div>
                                @endif

                                <!-- Action Buttons -->
                                <div class="flex gap-2">
                                    <button class="flex-1 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors duration-200 flex items-center justify-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13v6a2 2 0 002 2h6a2 2 0 002-2v-6m-8 0V9a2 2 0 012-2h4a2 2 0 012 2v4"></path>
                                        </svg>
                                        Keranjang
                                    </button>
                                    <a href="{{ route('customer.home.showProduct', $product) }}" class="px-4 py-2 border border-blue-600 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                                        Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Load More Button -->
                <div class="text-center mt-12">
                    <button class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-8 py-3 rounded-lg transition-all duration-200 transform hover:scale-105">
                        Muat Lebih Banyak
                    </button>
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-16">
                    <div class="max-w-md mx-auto">
                        <svg class="w-24 h-24 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                        <h3 class="text-xl font-semibold text-gray-700 mb-2">
                            Belum Ada Produk
                        </h3>
                        <p class="text-gray-500">
                            Produk akan segera ditambahkan. Silakan kembali lagi nanti.
                        </p>
                    </div>
                </div>
            @endif
        </div>


    </div>

    <!-- Custom Styles for line-clamp -->
    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</x-customer.app>
