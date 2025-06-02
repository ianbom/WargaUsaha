<x-customer.app>
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50">
        <!-- Header Section with Enhanced Design -->
        <div class="bg-white/80 backdrop-blur-sm shadow-lg border-b border-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <div class="relative">
                        <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg blur opacity-25"></div>
                        <div class="relative">
                            <h1 class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                                Semua Produk
                            </h1>
                            <p class="mt-3 text-gray-600 font-medium">Temukan produk terbaik untuk kebutuhan Anda</p>
                        </div>
                    </div>
                    <div class="mt-6 md:mt-0">
                        <div class="flex items-center space-x-2">
                            <div class="flex -space-x-1">
                                <div class="w-3 h-3 bg-blue-500 rounded-full animate-pulse"></div>
                                <div class="w-3 h-3 bg-purple-500 rounded-full animate-pulse" style="animation-delay: 0.2s"></div>
                                <div class="w-3 h-3 bg-indigo-500 rounded-full animate-pulse" style="animation-delay: 0.4s"></div>
                            </div>
                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-gradient-to-r from-blue-500 to-purple-600 text-white shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                                {{ $products->total() }} Produk Tersedia
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="lg:grid lg:grid-cols-4 lg:gap-8">
                <!-- Enhanced Filter Sidebar -->
                <div class="lg:col-span-1">
                    <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-xl border border-gray-100 p-6 sticky top-8 hover:shadow-2xl transition-all duration-300">
                        <div class="flex items-center mb-6">
                            <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg flex items-center justify-center mr-3">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800">Filter Produk</h3>
                        </div>

                        <form method="GET" action="{{ route('customer.home.indexProduct') }}" id="filterForm">
                            <!-- Enhanced Search -->
                            <div class="mb-6">
                                <label for="name" class="block text-sm font-semibold text-gray-700 mb-3">
                                    🔍 Cari Produk
                                </label>
                                <div class="relative group">
                                    <input type="text"
                                           id="name"
                                           name="name"
                                           value="{{ request('name') }}"
                                           placeholder="Cari produk favorit Anda..."
                                           class="w-full pl-12 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 group-hover:border-blue-300 bg-gray-50 focus:bg-white">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400 group-hover:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Enhanced Category Filter -->
                            <div class="mb-6">
                                <label for="product_category_id" class="block text-sm font-semibold text-gray-700 mb-3">
                                    📂 Kategori
                                </label>
                                <select id="product_category_id"
                                        name="product_category_id"
                                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-blue-300 bg-gray-50 focus:bg-white">
                                    <option value="">✨ Semua Kategori</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                                {{ request('product_category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Enhanced Price Range -->
                            <div class="mb-6">
                                <label class="block text-sm font-semibold text-gray-700 mb-3">
                                    💰 Range Harga
                                </label>
                                <div class="grid grid-cols-2 gap-3">
                                    <div class="relative">
                                        <input type="number"
                                               name="price_min"
                                               value="{{ request('price_min') }}"
                                               placeholder="Min"
                                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-blue-300 bg-gray-50 focus:bg-white">
                                        <span class="absolute top-1 right-2 text-xs text-gray-400">Rp</span>
                                    </div>
                                    <div class="relative">
                                        <input type="number"
                                               name="price_max"
                                               value="{{ request('price_max') }}"
                                               placeholder="Max"
                                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-blue-300 bg-gray-50 focus:bg-white">
                                        <span class="absolute top-1 right-2 text-xs text-gray-400">Rp</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Enhanced Action Buttons -->
                            <div class="space-y-3">
                                <button type="submit"
                                        class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-3 px-6 rounded-xl hover:from-blue-700 hover:to-purple-700 focus:ring-4 focus:ring-blue-200 transition-all duration-200 font-semibold shadow-lg hover:shadow-xl transform hover:scale-105">
                                    ✨ Terapkan Filter
                                </button>
                                <a href="{{ route('customer.home.indexProduct') }}"
                                   class="w-full bg-gradient-to-r from-gray-100 to-gray-200 text-gray-700 py-3 px-6 rounded-xl hover:from-gray-200 hover:to-gray-300 focus:ring-4 focus:ring-gray-200 transition-all duration-200 text-center block font-semibold shadow-md hover:shadow-lg transform hover:scale-105">
                                    🔄 Reset Filter
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Enhanced Products Grid -->
                <div class="lg:col-span-3 mt-8 lg:mt-0">
                    @if($products->isEmpty())
                        <!-- Enhanced Empty State -->
                        <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-xl border border-gray-100 p-16 text-center">
                            <div class="w-32 h-32 mx-auto mb-6 text-gray-300 animate-bounce">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" class="w-full h-full">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800 mb-3">Oops! Tidak ada produk ditemukan</h3>
                            <p class="text-gray-600 mb-6 text-lg">Coba ubah filter pencarian Anda atau lihat semua produk</p>
                            <a href="{{ route('customer.home.indexProduct') }}"
                               class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl hover:from-blue-700 hover:to-purple-700 font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                Lihat Semua Produk
                            </a>
                        </div>
                    @else
                        <!-- Enhanced Products Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                            @foreach($products as $product)
                                <div class="group bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg border border-gray-100 hover:shadow-2xl transition-all duration-300 transform hover:scale-105 overflow-hidden">
                                    <!-- Enhanced Product Image -->
                                    <div class="relative aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-t-2xl bg-gradient-to-br from-gray-100 to-gray-200">
                                        <img src="{{ asset('storage/' . $product->image_url) }}"
                                             alt="{{ $product->name }}"
                                             class="h-56 w-full object-cover object-center group-hover:scale-110 transition-transform duration-500">
                                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-all duration-300"></div>

                                        <!-- Stock Badge -->
                                        <div class="absolute top-4 right-4">
                                            @if($product->stock > 0)
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800 border border-green-200">
                                                    <div class="w-2 h-2 bg-green-500 rounded-full mr-1 animate-pulse"></div>
                                                    Tersedia
                                                </span>
                                            @else
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-800 border border-red-200">
                                                    <div class="w-2 h-2 bg-red-500 rounded-full mr-1"></div>
                                                    Habis
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Enhanced Product Info -->
                                    <div class="p-6">
                                        <div class="mb-4">
                                            <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">
                                                {{ $product->name }}
                                            </h3>
                                            <p class="text-gray-600 line-clamp-2 leading-relaxed">{{ $product->description }}</p>
                                        </div>

                                        <!-- Enhanced Price and Stock -->
                                        <div class="flex items-center justify-between mb-4">
                                            <div class="flex items-center">
                                                <span class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                                </span>
                                            </div>
                                            <div class="flex items-center text-sm text-gray-500">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                                </svg>
                                                Stok: {{ $product->stock }}
                                            </div>
                                        </div>

                                        <!-- Enhanced Category and Mart -->
                                        <div class="flex items-center justify-between mb-6">
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-gradient-to-r from-green-100 to-emerald-100 text-green-800 border border-green-200">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                                </svg>
                                                {{ $product->category->name ?? $product->category_name ?? 'Tanpa Kategori' }}
                                            </span>
                                            <span class="text-xs text-gray-500 font-medium">
                                                🏪 {{ $product->mart->name ?? 'Unknown Store' }}
                                            </span>
                                        </div>

                                        <!-- Enhanced Actions -->
                                        <div class="flex space-x-3">
                                            <a href="{{ route('customer.home.showProduct', $product) }}"
                                               class="flex-1 bg-gradient-to-r from-blue-600 to-purple-600 text-white py-3 px-4 rounded-xl hover:from-blue-700 hover:to-purple-700 focus:ring-4 focus:ring-blue-200 transition-all duration-200 text-sm font-semibold text-center shadow-lg hover:shadow-xl transform hover:scale-105 {{ $product->stock <= 0 ? 'opacity-50 cursor-not-allowed' : '' }}"
                                               {{ $product->stock <= 0 ? 'onclick="return false;"' : '' }}>
                                                {{ $product->stock <= 0 ? '❌ Stok Habis' : '👁️ Lihat Detail' }}
                                            </a>
                                            <button class="bg-gradient-to-r from-gray-100 to-gray-200 text-gray-700 py-3 px-4 rounded-xl hover:from-gray-200 hover:to-gray-300 focus:ring-4 focus:ring-gray-200 transition-all duration-200 shadow-md hover:shadow-lg transform hover:scale-105">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Enhanced Pagination -->
                        <div class="mt-12 flex justify-center">
                            <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-lg border border-gray-100 p-4">
                                {{ $products->appends(request()->query())->links() }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced Auto-submit script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('filterForm');
            const autoSubmitElements = form.querySelectorAll('select, input[type="checkbox"]');

            // Add loading state
            function showLoading() {
                const submitBtn = form.querySelector('button[type="submit"]');
                if (submitBtn) {
                    submitBtn.innerHTML = '⏳ Memuat...';
                    submitBtn.disabled = true;
                }
            }

            autoSubmitElements.forEach(element => {
                element.addEventListener('change', function() {
                    showLoading();
                    form.submit();
                });
            });

            // Enhanced search with debounce
            const searchInput = document.getElementById('name');
            let searchTimeout;

            searchInput.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                const value = this.value.trim();

                searchTimeout = setTimeout(() => {
                    if (value !== '') {
                        showLoading();
                        form.submit();
                    }
                }, 800);
            });

            // Add smooth scrolling and animations
            const productCards = document.querySelectorAll('.group');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, {
                threshold: 0.1
            });

            productCards.forEach((card) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(card);
            });
        });
    </script>
</x-customer.app>
