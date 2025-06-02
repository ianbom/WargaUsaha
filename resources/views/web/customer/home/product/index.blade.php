<x-customer.app>
    <div class="min-h-screen bg-gray-50">
        <!-- Header Section -->
        <div class="bg-white shadow-sm border-b">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">Semua Produk</h1>
                        <p class="mt-2 text-sm text-gray-600">Temukan produk terbaik untuk kebutuhan Anda</p>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                            {{ $products->total() }} Produk Tersedia
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="lg:grid lg:grid-cols-4 lg:gap-8">
                <!-- Filter Sidebar -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-lg shadow-sm border p-6 sticky top-8">
                        <h3 class="text-lg font-semibold text-gray-900 mb-6">Filter Produk</h3>

                        <form method="GET" action="{{ route('customer.home.indexProduct') }}" id="filterForm">
                            <!-- Search -->
                            <div class="mb-6">
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                    Cari Produk
                                </label>
                                <div class="relative">
                                    <input type="text"
                                           id="name"
                                           name="name"
                                           value="{{ request('name') }}"
                                           placeholder="Nama produk..."
                                           class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Category Filter -->
                            <div class="mb-6">
                                <label for="product_category_id" class="block text-sm font-medium text-gray-700 mb-2">
                                    Kategori
                                </label>
                                <select id="product_category_id"
                                        name="product_category_id"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Semua Kategori</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                                {{ request('product_category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Price Range -->
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Range Harga
                                </label>
                                <div class="grid grid-cols-2 gap-2">
                                    <input type="number"
                                           name="price_min"
                                           value="{{ request('price_min') }}"
                                           placeholder="Min"
                                           class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <input type="number"
                                           name="price_max"
                                           value="{{ request('price_max') }}"
                                           placeholder="Max"
                                           class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="space-y-3">
                                <button type="submit"
                                        class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200">
                                    Terapkan Filter
                                </button>
                                <a href="{{ route('customer.home.indexProduct') }}"
                                   class="w-full bg-gray-100 text-gray-700 py-2 px-4 rounded-lg hover:bg-gray-200 focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition duration-200 text-center block">
                                    Reset Filter
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="lg:col-span-3 mt-8 lg:mt-0">
                    @if($products->isEmpty())
                        <!-- Empty State -->
                         <div class="bg-white/70 backdrop-blur-sm rounded-2xl shadow-xl border border-gray-100 p-16 text-center">
                            <div class="w-32 h-32 mx-auto mb-6 text-gray-300 animate-bounce">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" class="w-full h-full">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800 mb-3">Oops! Tidak ada produk ditemukan</h3>
                            <p class="text-gray-600 mb-6 text-lg">Coba ubah filter pencarian Anda atau lihat semua produk</p>
                            <a href="{{ route('customer.home.indexProduct') }}"
                               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                Lihat Semua Produk
                            </a>
                        </div>
                    @else
                        <!-- Products Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($products as $product)
                                <div class="bg-white rounded-lg shadow-sm border hover:shadow-md transition-shadow duration-200">
                                    <!-- Product Image -->
                                    <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-t-lg bg-gray-200">
                                        <img src="{{ asset('storage/' . $product->image_url) }}"
                                             alt="{{ $product->name }}"
                                             class="h-48 w-full object-cover object-center group-hover:opacity-75"
                                             >
                                    </div>

                                    <!-- Product Info -->
                                    <div class="p-4">
                                        <div class="mb-2">
                                            <h3 class="text-lg font-semibold text-gray-900 mb-1">{{ $product->name }}</h3>
                                            <p class="text-sm text-gray-600 line-clamp-2">{{ $product->description }}</p>
                                        </div>

                                        <!-- Price and Stock -->
                                        <div class="flex items-center justify-between mb-3">
                                            <span class="text-2xl font-bold text-blue-600">
                                                Rp {{ number_format($product->price, 0, ',', '.') }}
                                            </span>
                                            <span class="text-sm text-gray-500">
                                                Stok: {{ $product->stock }}
                                            </span>
                                        </div>

                                        <!-- Category and Mart -->
                                        <div class="flex items-center justify-between mb-4">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                {{ $product->category->name ?? $product->category_name ?? 'Tanpa Kategori' }}
                                            </span>
                                            <span class="text-xs text-gray-500 font-medium">
                                                🏪 {{ $product->mart->name ?? 'Unknown Store' }}
                                            </span>
                                        </div>

                                        <!-- Actions -->
                                        <div class="flex space-x-2">
                                            <a href="{{ route('customer.home.showProduct', $product) }}" class=" bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200 text-sm font-medium {{ $product->stock <= 0 ? 'opacity-50 cursor-not-allowed' : '' }}"
                                                    {{ $product->stock <= 0 ? 'disabled' : '' }}>
                                                {{ $product->stock <= 0 ? 'Stok Habis' : 'Lihat' }}
                                            </a>
                                            <button class="bg-gray-100 text-gray-700 py-2 px-4 rounded-lg hover:bg-gray-200 focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition duration-200">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        <div class="mt-8">
                            {{ $products->appends(request()->query())->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Auto-submit filter form on change -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('filterForm');
            const autoSubmitElements = form.querySelectorAll('select, input[type="checkbox"]');

            autoSubmitElements.forEach(element => {
                element.addEventListener('change', function() {
                    form.submit();
                });
            });

            // Optional: Auto-submit untuk search input setelah user berhenti mengetik
            const searchInput = document.getElementById('name');
            let searchTimeout;

            searchInput.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(() => {
                    form.submit();
                }, 1000); // Submit setelah 1 detik user berhenti mengetik
            });
        });
    </script>
</x-customer.app>
