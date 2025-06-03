<x-customer.app>
    <div class="min-h-screen bg-gray-50">
        <!-- Hero Section with Enhanced Gradient -->
        <div class="relative bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700 text-white overflow-hidden">
            <!-- Background Pattern -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="30" cy="30" r="4"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
            </div>

            <div class="container mx-auto px-4 py-20 relative z-10">
                <div class="text-center">
                    <h1 class="text-5xl md:text-7xl font-bold mb-6 bg-gradient-to-r from-white via-blue-100 to-purple-100 bg-clip-text text-transparent leading-tight">
                        Selamat Datang di Toko Kami
                    </h1>
                    <p class="text-xl md:text-2xl mb-4 opacity-90 font-light">
                        Kecamatan Srengat, Kelurahan Kauman, Blitar
                    </p>
                    <p class="text-base md:text-lg mb-12 opacity-75 max-w-2xl mx-auto">
                        Temukan produk berkualitas dengan harga terbaik untuk kebutuhan Anda
                    </p>

                    <!-- Enhanced Search Bar -->
                    <div class="relative max-w-lg mx-auto mb-8">
                        <input type="text"
                               placeholder="Cari produk favorit Anda..."
                               class="w-full px-6 py-4 pr-14 rounded-2xl text-gray-800 focus:outline-none focus:ring-4 focus:ring-white/30 shadow-xl backdrop-blur-sm bg-white/95 transition-all duration-300">
                        <button class="absolute right-3 top-3 p-2 text-gray-600 hover:text-gray-800 hover:bg-gray-100 rounded-xl transition-all duration-200">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Quick Stats -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-2xl mx-auto">
                        <div class="text-center p-4 bg-white/10 backdrop-blur-sm rounded-xl">
                            <div class="text-2xl font-bold">500+</div>
                            <div class="text-sm opacity-80">Produk</div>
                        </div>
                        <div class="text-center p-4 bg-white/10 backdrop-blur-sm rounded-xl">
                            <div class="text-2xl font-bold">1000+</div>
                            <div class="text-sm opacity-80">Pelanggan</div>
                        </div>
                        <div class="text-center p-4 bg-white/10 backdrop-blur-sm rounded-xl">
                            <div class="text-2xl font-bold">24/7</div>
                            <div class="text-sm opacity-80">Support</div>
                        </div>
                        <div class="text-center p-4 bg-white/10 backdrop-blur-sm rounded-xl">
                            <div class="text-2xl font-bold">⭐ 4.9</div>
                            <div class="text-sm opacity-80">Rating</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if($products && count($products) > 0)
            <!-- Featured Products Carousel -->
            <div class="container mx-auto px-4 py-16">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-800 mb-4 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                        Produk Unggulan
                    </h2>
                    <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                        Produk terpilih dengan kualitas terbaik dan harga bersahabat
                    </p>
                </div>

                <!-- Carousel Container -->
                <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-gray-50 to-gray-100 p-8">
                    <div id="carousel" class="flex transition-transform duration-700 ease-in-out">
                        @foreach($products->take(6) as $index => $product)
                            <div class="w-full flex-shrink-0 px-2">
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                    @for($i = 0; $i < 3 && isset($products[$index * 3 + $i]); $i++)
                                        @php $carouselProduct = $products[$index * 3 + $i]; @endphp
                                        <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 overflow-hidden group">
                                            <!-- Product Image -->
                                            <div class="relative overflow-hidden">
                                                <img src="{{ asset('storage/' . $carouselProduct->image_url) }}"
                                                     alt="{{ $carouselProduct->name }}"
                                                     class="w-full h-56 object-cover transition-all duration-500 group-hover:scale-110">

                                                <!-- Gradient Overlay -->
                                                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                                                <!-- Stock Badge -->
                                                @if($carouselProduct->stock <= 5)
                                                    <div class="absolute top-3 left-3">
                                                        <span class="bg-gradient-to-r from-red-500 to-pink-500 text-white text-xs px-3 py-1 rounded-full font-semibold shadow-lg">
                                                            🔥 Stok Terbatas
                                                        </span>
                                                    </div>
                                                @endif

                                                <!-- Wishlist Button -->
                                                <button class="absolute top-3 right-3 p-2 bg-white/90 hover:bg-white rounded-full transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-110">
                                                    <svg class="w-5 h-5 text-gray-600 hover:text-red-500 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                                    </svg>
                                                </button>
                                            </div>

                                            <!-- Product Info -->
                                            <div class="p-6">
                                                <h3 class="font-bold text-gray-800 text-xl mb-3 line-clamp-2 group-hover:text-blue-600 transition-colors duration-200">
                                                    {{ $carouselProduct->name }}
                                                </h3>

                                                <p class="text-gray-600 text-sm mb-4 line-clamp-2 leading-relaxed">
                                                    {{ $carouselProduct->description }}
                                                </p>

                                                <!-- Price and Stock -->
                                                <div class="flex items-center justify-between mb-4">
                                                    <div>
                                                        <span class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                                                            Rp {{ number_format($carouselProduct->price, 0, ',', '.') }}
                                                        </span>
                                                    </div>
                                                    <div class="text-right">
                                                        <span class="text-sm text-gray-500 bg-gray-100 px-2 py-1 rounded-full">
                                                            Stok: {{ $carouselProduct->stock }}
                                                        </span>
                                                    </div>
                                                </div>

                                                <!-- Category Badge -->
                                                @if($carouselProduct->productCategory)
                                                    <div class="mb-4">
                                                        <span class="inline-block bg-gradient-to-r from-blue-100 to-purple-100 text-blue-700 text-xs px-3 py-1 rounded-full font-medium">
                                                            {{ $carouselProduct->productCategory->name }}
                                                        </span>
                                                    </div>
                                                @endif

                                                <!-- Action Buttons -->
                                                <div class="flex gap-3">
                                                    <button class="flex-1 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-4 py-3 rounded-xl transition-all duration-200 flex items-center justify-center gap-2 shadow-lg hover:shadow-xl transform hover:scale-105">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13v6a2 2 0 002 2h6a2 2 0 002-2v-6m-8 0V9a2 2 0 012-2h4a2 2 0 012 2v4"></path>
                                                        </svg>
                                                        Keranjang
                                                    </button>
                                                    <a href="{{ route('customer.home.showProduct', $carouselProduct) }}" class="px-4 py-3 border-2 border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white rounded-xl transition-all duration-200 hover:shadow-lg transform hover:scale-105">
                                                        Detail
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Carousel Navigation -->
                    <button id="prevBtn" class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white text-gray-800 p-3 rounded-full shadow-lg hover:shadow-xl transition-all duration-200 transform hover:scale-110">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                    <button id="nextBtn" class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white text-gray-800 p-3 rounded-full shadow-lg hover:shadow-xl transition-all duration-200 transform hover:scale-110">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>

                    <!-- Carousel Indicators -->
                    <div id="indicators" class="absolute bottom-4 left-1/2 -translate-x-1/2 flex space-x-2">
                        @for($i = 0; $i < ceil($products->count() / 3); $i++)
                            <button class="carousel-indicator w-3 h-3 rounded-full bg-white/50 hover:bg-white/80 transition-all duration-200 {{ $i === 0 ? 'bg-white' : '' }}" data-slide="{{ $i }}"></button>
                        @endfor
                    </div>
                </div>
            </div>

            <!-- All Products Section -->
            <div class="container mx-auto px-4 py-12">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-800 mb-4">Semua Produk</h2>
                    <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                        Jelajahi koleksi lengkap produk berkualitas tinggi dari berbagai kategori
                    </p>
                </div>

                <!-- Products Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                    @foreach($products as $product)
                        <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 overflow-hidden group">
                            <!-- Product Image -->
                            <div class="relative overflow-hidden">
                                <img src="{{ asset('storage/' . $product->image_url) }}"
                                     alt="{{ $product->name }}"
                                     class="w-full h-56 object-cover transition-all duration-500 group-hover:scale-110">

                                <!-- Gradient Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                                <!-- Stock Badge -->
                                @if($product->stock <= 5)
                                    <div class="absolute top-3 left-3">
                                        <span class="bg-gradient-to-r from-red-500 to-pink-500 text-white text-xs px-3 py-1 rounded-full font-semibold shadow-lg animate-pulse">
                                            🔥 Stok Terbatas
                                        </span>
                                    </div>
                                @endif

                                <!-- Wishlist Button -->
                                <button class="absolute top-3 right-3 p-2 bg-white/90 hover:bg-white rounded-full transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-110">
                                    <svg class="w-5 h-5 text-gray-600 hover:text-red-500 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                </button>
                            </div>

                            <!-- Product Info -->
                            <div class="p-6">
                                <h3 class="font-bold text-gray-800 text-xl mb-3 line-clamp-2 group-hover:text-blue-600 transition-colors duration-200">
                                    {{ $product->name }}
                                </h3>

                                <p class="text-gray-600 text-sm mb-4 line-clamp-2 leading-relaxed">
                                    {{ $product->description }}
                                </p>

                                <!-- Price and Stock -->
                                <div class="flex items-center justify-between mb-4">
                                    <div>
                                        <span class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                                            Rp {{ number_format($product->price, 0, ',', '.') }}
                                        </span>
                                    </div>
                                    <div class="text-right">
                                        <span class="text-sm text-gray-500 bg-gray-100 px-2 py-1 rounded-full">
                                            Stok: {{ $product->stock }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Category Badge -->
                                @if($product->productCategory)
                                    <div class="mb-4">
                                        <span class="inline-block bg-gradient-to-r from-blue-100 to-purple-100 text-blue-700 text-xs px-3 py-1 rounded-full font-medium">
                                            {{ $product->productCategory->name }}
                                        </span>
                                    </div>
                                @endif

                                <!-- Action Buttons -->
                                <div class="flex gap-3">
                                    <button class="flex-1 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-4 py-3 rounded-xl transition-all duration-200 flex items-center justify-center gap-2 shadow-lg hover:shadow-xl transform hover:scale-105">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13v6a2 2 0 002 2h6a2 2 0 002-2v-6m-8 0V9a2 2 0 012-2h4a2 2 0 012 2v4"></path>
                                        </svg>
                                        Keranjang
                                    </button>
                                    <a href="{{ route('customer.home.showProduct', $product) }}" class="px-4 py-3 border-2 border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white rounded-xl transition-all duration-200 hover:shadow-lg transform hover:scale-105">
                                        Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Load More Button -->
                <div class="text-center mt-16">
                    <button class="bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600 hover:from-blue-700 hover:via-purple-700 hover:to-indigo-700 text-white px-12 py-4 rounded-2xl transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-2xl font-semibold text-lg">
                        <span class="flex items-center gap-2">
                            Muat Lebih Banyak
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                            </svg>
                        </span>
                    </button>
                </div>
            </div>
        @else
            <!-- Enhanced Empty State -->
            <div class="container mx-auto px-4 py-20">
                <div class="text-center">
                    <div class="max-w-md mx-auto bg-white rounded-2xl shadow-lg p-12">
                        <div class="mb-6">
                            <svg class="w-32 h-32 text-gray-300 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-700 mb-4">
                            Belum Ada Produk
                        </h3>
                        <p class="text-gray-500 mb-8 leading-relaxed">
                            Produk amazing akan segera ditambahkan. Silakan kembali lagi nanti untuk melihat koleksi terbaru kami.
                        </p>
                        <button class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-8 py-3 rounded-xl hover:shadow-lg transition-all duration-200 transform hover:scale-105">
                            Notify Me
                        </button>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Custom Styles and JavaScript -->
    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Custom animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.6s ease-out;
        }

        /* Hover effects */
        .group:hover .group-hover\:scale-110 {
            transform: scale(1.1);
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const carousel = document.getElementById('carousel');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const indicators = document.querySelectorAll('.carousel-indicator');

            if (!carousel || !prevBtn || !nextBtn) return;

            let currentSlide = 0;
            const totalSlides = Math.ceil({{ $products ? $products->count() : 0 }} / 3);
            let autoplayInterval;

            // Update carousel position
            function updateCarousel() {
                const translateX = -currentSlide * 100;
                carousel.style.transform = `translateX(${translateX}%)`;

                // Update indicators
                indicators.forEach((indicator, index) => {
                    indicator.classList.toggle('bg-white', index === currentSlide);
                    indicator.classList.toggle('bg-white/50', index !== currentSlide);
                });
            }

            // Next slide
            function nextSlide() {
                currentSlide = (currentSlide + 1) % totalSlides;
                updateCarousel();
            }

            // Previous slide
            function prevSlide() {
                currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
                updateCarousel();
            }

            // Start autoplay
            function startAutoplay() {
                autoplayInterval = setInterval(nextSlide, 5000); // 5 seconds
            }

            // Stop autoplay
            function stopAutoplay() {
                clearInterval(autoplayInterval);
            }

            // Event listeners
            nextBtn.addEventListener('click', () => {
                nextSlide();
                stopAutoplay();
                setTimeout(startAutoplay, 10000); // Restart after 10 seconds
            });

            prevBtn.addEventListener('click', () => {
                prevSlide();
                stopAutoplay();
                setTimeout(startAutoplay, 10000); // Restart after 10 seconds
            });

            // Indicator clicks
            indicators.forEach((indicator, index) => {
                indicator.addEventListener('click', () => {
                    currentSlide = index;
                    updateCarousel();
                    stopAutoplay();
                    setTimeout(startAutoplay, 10000); // Restart after 10 seconds
                });
            });

            // Pause on hover
            carousel.addEventListener('mouseenter', stopAutoplay);
            carousel.addEventListener('mouseleave', startAutoplay);

            // Start autoplay
            if (totalSlides > 1) {
                startAutoplay();
            }

            // Smooth scroll for load more button
            const loadMoreBtn = document.querySelector('button:contains("Muat Lebih Banyak")');
            if (loadMoreBtn) {
                loadMoreBtn.addEventListener('click', function() {
                    // Add your load more logic here
                    console.log('Load more products...');
                });
            }

            // Add intersection observer for animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-fadeInUp');
                    }
                });
            }, observerOptions);

            // Observe product cards
            document.querySelectorAll('.bg-white.rounded-2xl').forEach(card => {
                observer.observe(card);
            });
        });
    </script>
</x-customer.app>
