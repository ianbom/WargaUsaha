<x-customer.app>
    <div class="min-h-screen bg-gray-50">

        <!-- Hero Section -->
        <div class="relative overflow-hidden text-white bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700">
            <!-- Background Pattern -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60"
                    height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none"
                    fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="30"
                    cy="30" r="4" /%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
            </div>

            <div class="container relative z-10 px-4 py-20 mx-auto">
                <div class="text-center">
                    <h1
                        class="mb-6 text-5xl font-bold leading-tight text-transparent md:text-7xl bg-gradient-to-r from-white via-blue-100 to-purple-100 bg-clip-text">
                        Selamat Datang di WargaUsaha
                    </h1>
                    <p class="mb-4 text-xl font-light md:text-2xl opacity-90">
                        Kecamatan Srengat, Kelurahan Kauman, Blitar
                    </p>
                    <p class="max-w-2xl mx-auto mb-12 text-base opacity-75 md:text-lg">
                        Temukan produk berkualitas dengan harga terbaik untuk kebutuhan Anda
                    </p>

                    <!-- Enhanced Search Bar -->
                    <div class="relative max-w-lg mx-auto mb-8">
                        <form method="GET" action="{{ route('customer.home.indexProduct') }}">
                            <input type="text" name="name" value="{{ request('name') }}"
                                placeholder="Cari produk favorit Anda..."
                                class="w-full px-6 py-4 text-gray-800 transition-all duration-300 shadow-xl pr-14 rounded-2xl focus:outline-none focus:ring-4 focus:ring-white/30 backdrop-blur-sm bg-white/95">
                            <button
                                class="absolute p-2 text-gray-600 transition-all duration-200 right-3 top-3 hover:text-gray-800 hover:bg-gray-100 rounded-xl">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="m21 21-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                        </form>
                    </div>

                    <!-- Quick Stats -->
                    <div class="grid max-w-2xl grid-cols-2 gap-4 mx-auto md:grid-cols-4">
                        <div class="p-4 text-center bg-white/10 backdrop-blur-sm rounded-xl">
                            <div class="text-2xl font-bold">500+</div>
                            <div class="text-sm opacity-80">Produk</div>
                        </div>
                        <div class="p-4 text-center bg-white/10 backdrop-blur-sm rounded-xl">
                            <div class="text-2xl font-bold">1000+</div>
                            <div class="text-sm opacity-80">Pelanggan</div>
                        </div>
                        <div class="p-4 text-center bg-white/10 backdrop-blur-sm rounded-xl">
                            <div class="text-2xl font-bold">24/7</div>
                            <div class="text-sm opacity-80">Support</div>
                        </div>
                        <div class="p-4 text-center bg-white/10 backdrop-blur-sm rounded-xl">
                            <div class="text-2xl font-bold">⭐ 4.9</div>
                            <div class="text-sm opacity-80">Rating</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Portal Section -->
        <div class="container relative px-10 py-16 mx-auto lg:px-10">
            <!-- Header Section -->
            <div class="mb-16 text-center">
                <div class="inline-block px-4 py-2 mb-6 text-sm font-medium text-purple-600 bg-purple-100 rounded-full">
                    ✨ Layanan Terbaik Kami
                </div>
                <h2 class="mb-6 text-4xl font-bold text-gray-900 lg:text-5xl">
                    Temukan
                    <span class="text-gradient">Layanan</span>
                    <br>yang Anda Butuhkan
                </h2>
                <p class="max-w-3xl mx-auto text-lg leading-relaxed text-gray-600">
                    Jelajahi berbagai layanan berkualitas tinggi yang dirancang khusus untuk memenuhi kebutuhan Anda di
                    daerah setempat
                </p>
            </div>
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">

                <!-- product -->
                <div class="service-card floating group">
                    <div class="relative overflow-hidden bg-white shadow-lg rounded-2xl glow">
                        <div class="shimmer">
                            <div class="relative overflow-hidden h-1/2">
                                <div class="absolute inset-0 bg-gradient-to-r from-green-400 to-blue-500 opacity-90">
                                </div>
                                <div class="flex items-center justify-center h-full">
                                    <div class="p-4 icon-container rounded-2xl">
                                        <img src="{{ asset('assets/images/product-section.png') }}" alt="Gambar Servis"
                                            class="object-contain text-white " />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3
                                class="mb-3 text-2xl font-bold text-center text-gray-900 transition-colors duration-300 group-hover:text-green-600">
                                Produk Lokal
                            </h3>
                            <p class="mb-4 text-lg leading-relaxed text-center text-gray-600">
                                Jelajahi berbagai produk berkualitas dari UMKM dan produsen lokal di sekitar Anda
                            </p>
                            {{-- <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-2">

                                    <span class="text-sm text-gray-500">500+ produk</span>
                                </div>
                                <button
                                    class="p-2 text-green-600 transition-all duration-300 rounded-full hover:bg-green-100 group-hover:scale-110">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </button>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <!-- Job -->
                <div class="service-card floating group">
                    <div class="relative overflow-hidden bg-white shadow-lg rounded-2xl glow">
                        <div class="shimmer">
                            <div class="relative overflow-hidden h-1/2">
                                <div class="flex items-center justify-center h-full">
                                    <div class="p-4 icon-container rounded-2xl">
                                        <img src="{{ asset('assets/images/job-section.png') }}" alt="Gambar Servis"
                                            class="object-contain text-white" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-6">
                            <h3
                                class="mb-3 text-2xl font-bold text-center text-gray-900 transition-colors duration-300 group-hover:text-purple-600">
                                Lowongan Pekerjaan Freelance
                            </h3>
                            <p class="mb-4 text-lg leading-relaxed text-center text-gray-600">
                                Temukan peluang karir menarik dan proyek freelance berkualitas di daerah tinggal Anda
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Service -->
                <div class="service-card floating group">
                    <div class="relative overflow-hidden bg-white shadow-lg rounded-2xl glow">
                        <div class="shimmer">
                            <div class="relative overflow-hidden h-1/2">
                                <div class="flex items-center justify-center h-full">
                                    <div class="p-4 icon-container rounded-2xl">
                                        <img src="{{ asset('assets/images/service-section.png') }}" alt="Gambar Servis"
                                            class="object-contain text-white" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-6">
                            <h3
                                class="mb-3 text-2xl font-bold text-center text-gray-900 transition-colors duration-300 group-hover:text-purple-600">
                                Layanan Jasa Profesional
                            </h3>
                            <p class="mb-4 text-lg leading-relaxed text-center text-gray-600">
                                Dapatkan layanan jasa profesional terpercaya dari ahli berpengalaman di wilayah Anda
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Products Section -->
        {{-- <div class="container px-4 py-12 mx-auto">
            <div class="mb-12 text-center">
                <h2 class="mb-4 text-3xl font-bold text-gray-800">Produk Terbaru</h2>
                <p class="max-w-2xl mx-auto text-gray-600">
                    Jelajahi koleksi produk berkualitas tinggi dari berbagai kategori
                </p>
            </div>

            @if ($products && count($products) > 0)
                <!-- Products Grid -->
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    @foreach ($products as $product)
                        <div
                            class="overflow-hidden transition-all duration-300 transform bg-white shadow-md rounded-xl hover:shadow-xl hover:-translate-y-1">
                            <!-- Product Image -->
                            <div class="relative overflow-hidden">
                                <img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}"
                                    class="object-cover w-full h-48 transition-transform duration-300 hover:scale-110">

                                <!-- Stock Badge -->
                                @if ($product->stock <= 5)
                                    <div class="absolute top-2 left-2">
                                        <span class="px-2 py-1 text-xs text-white bg-red-500 rounded-full">
                                            Stok Terbatas
                                        </span>
                                    </div>
                                @endif

                                <!-- Wishlist Button -->
                                <button
                                    class="absolute p-2 transition-colors duration-200 rounded-full top-2 right-2 bg-white/80 hover:bg-white">
                                    <svg class="w-5 h-5 text-gray-600 hover:text-red-500" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                        </path>
                                    </svg>
                                </button>
                            </div>

                            <!-- Product Info -->
                            <div class="p-4">
                                <h3 class="mb-2 text-lg font-semibold text-gray-800 line-clamp-2">
                                    {{ $product->name }}
                                </h3>

                                <p class="mb-3 text-sm text-gray-600 line-clamp-2">
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
                                @if ($product->productCategory)
                                    <div class="mb-3">
                                        <span
                                            class="inline-block px-2 py-1 text-xs text-gray-700 bg-gray-100 rounded-full">
                                            {{ $product->productCategory->name }}
                                        </span>
                                    </div>
                                @endif

                                <!-- Action Buttons -->
                                <div class="flex gap-2">
                                    <button
                                        class="flex items-center justify-center flex-1 gap-2 px-4 py-2 text-white transition-colors duration-200 bg-blue-600 rounded-lg hover:bg-blue-700">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13v6a2 2 0 002 2h6a2 2 0 002-2v-6m-8 0V9a2 2 0 012-2h4a2 2 0 012 2v4">
                                            </path>
                                        </svg>
                                        Keranjang
                                    </button>
                                    <a href="{{ route('customer.home.showProduct', $product) }}"
                                        class="px-4 py-2 text-blue-600 transition-colors duration-200 border border-blue-600 rounded-lg hover:bg-blue-50">
                                        Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Load More Button -->
                <div class="mt-12 text-center">
                    <button
                        class="px-8 py-3 text-white transition-all duration-200 transform rounded-lg bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 hover:scale-105">
                        Muat Lebih Banyak
                    </button>
                </div>
            @else
                <!-- Empty State -->
                <div class="py-16 text-center">
                    <div class="max-w-md mx-auto">
                        <svg class="w-24 h-24 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                        <h3 class="mb-2 text-xl font-semibold text-gray-700">
                            Belum Ada Produk
                        </h3>
                        <p class="text-gray-500">
                            Produk akan segera ditambahkan. Silakan kembali lagi nanti.
                        </p>
                    </div>
                </div>
            @endif
        </div> --}}


    </div>

    <!-- Custom Styles for line-clamp -->
    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .service-card {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .service-card:hover {
            transform: translateY(-15px) scale(1.02);
        }

        .glow {
            box-shadow: 0 0 30px rgba(102, 126, 234, 0.3);
        }

        .text-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* .shimmer {
            position: relative;
            overflow: hidden;
        }

        .shimmer::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: left 0.6s;
        }

        .shimmer:hover::before {
            left: 100%;
        } */
    </style>
</x-customer.app>
