<x-customer.app>
    <div class="min-h-screen bg-gray-50">
        <!-- Header Section -->

        @include('web.seller.alert.success')

        <div class="bg-white border-b shadow-sm">
            <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">Semua Produk</h1>
                        <p class="mt-2 text-sm text-gray-600">Temukan produk terbaik untuk kebutuhan Anda</p>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <span
                            class="inline-flex items-center px-3 py-1 text-sm font-medium text-blue-800 bg-blue-100 rounded-full">
                            {{ $products->total() }} Produk Tersedia
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="px-4 py-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-4 lg:gap-8">
                <!-- Filter Sidebar -->
                <div class="lg:col-span-1">
                    <div class="sticky p-6 bg-white border rounded-lg shadow-sm top-8">
                        <h3 class="mb-6 text-lg font-semibold text-gray-900">Filter Produk</h3>

                        <form method="GET" action="{{ route('customer.home.indexProduct') }}" id="filterForm">
                            <!-- Search -->
                            <div class="mb-6">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-700">
                                    Cari Produk
                                </label>
                                <div class="relative">
                                    <input type="text" id="name" name="name" value="{{ request('name') }}"
                                        placeholder="Nama produk..."
                                        class="w-full py-2 pl-10 pr-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Category Filter -->
                            <div class="mb-6">
                                <label for="product_category_id" class="block mb-2 text-sm font-medium text-gray-700">
                                    Kategori
                                </label>
                                <select id="product_category_id" name="product_category_id"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Semua Kategori</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ request('product_category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Price Range -->
                            <div class="mb-6">
                                <label class="block mb-2 text-sm font-medium text-gray-700">
                                    Range Harga
                                </label>
                                <div class="grid grid-cols-2 gap-2">
                                    <input type="number" name="price_min" value="{{ request('price_min') }}"
                                        placeholder="Min"
                                        class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <input type="number" name="price_max" value="{{ request('price_max') }}"
                                        placeholder="Max"
                                        class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="space-y-3">
                                <button type="submit"
                                    class="w-full px-4 py-2 text-white transition duration-200 bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    Terapkan Filter
                                </button>
                                <a href="{{ route('customer.home.indexProduct') }}"
                                    class="block w-full px-4 py-2 text-center text-gray-700 transition duration-200 bg-gray-100 rounded-lg hover:bg-gray-200 focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                    Reset Filter
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="mt-8 lg:col-span-3 lg:mt-0">
                    @if ($products->isEmpty())
                        <!-- Empty State -->
                        <div
                            class="p-16 text-center border border-gray-100 shadow-xl bg-white/70 backdrop-blur-sm rounded-2xl">
                            <div class="w-32 h-32 mx-auto mb-6 text-gray-300 animate-bounce">
                                <svg class="w-full h-full" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.5777 3.38197L17.5777 4.43152C19.7294 5.56066 20.8052 6.12523 21.4026 7.13974C22 8.15425 22 9.41667 22 11.9415V12.0585C22 14.5833 22 15.8458 21.4026 16.8603C20.8052 17.8748 19.7294 18.4393 17.5777 19.5685L15.5777 20.618C13.8221 21.5393 12.9443 22 12 22C11.0557 22 10.1779 21.5393 8.42229 20.618L6.42229 19.5685C4.27063 18.4393 3.19479 17.8748 2.5974 16.8603C2 15.8458 2 14.5833 2 12.0585V11.9415C2 9.41667 2 8.15425 2.5974 7.13974C3.19479 6.12523 4.27063 5.56066 6.42229 4.43152L8.42229 3.38197C10.1779 2.46066 11.0557 2 12 2C12.9443 2 13.8221 2.46066 15.5777 3.38197Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    <path
                                        d="M21 7.5L17 9.5M12 12L3 7.5M12 12V21.5M12 12C12 12 14.7426 10.6287 16.5 9.75C16.6953 9.65237 17 9.5 17 9.5M17 9.5V13M17 9.5L7.5 4.5"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                            </div>
                            <h3 class="mb-3 text-2xl font-bold text-gray-800">Oops! Tidak ada produk ditemukan</h3>
                            <p class="mb-6 text-lg text-gray-600">Coba ubah filter pencarian Anda atau lihat semua
                                produk</p>
                            <a href="{{ route('customer.home.indexProduct') }}"
                                class="inline-flex items-center px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                                Lihat Semua Produk
                            </a>
                        </div>
                    @else
                        <!-- Products Grid -->
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                            @foreach ($products as $product)
                                <div
                                    class="transition-shadow duration-200 bg-white border rounded-lg shadow-sm hover:shadow-md">
                                    <!-- Product Image -->
                                    <div class="w-full overflow-hidden bg-gray-200 rounded-t-lg aspect-w-1 aspect-h-1">
                                        <img src="{{ asset('storage/' . $product->image_url) }}"
                                            alt="{{ $product->name }}"
                                            class="object-cover object-center w-full h-48 group-hover:opacity-75">
                                    </div>

                                    <!-- Product Info -->
                                    <div class="p-4">
                                        <div class="mb-2">
                                            <h3 class="mb-1 text-lg font-semibold text-gray-900">{{ $product->name }}
                                            </h3>
                                            <p class="text-sm text-gray-600 line-clamp-2">{{ $product->description }}
                                            </p>
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
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                {{ $product->category->name ?? ($product->category_name ?? 'Tanpa Kategori') }}
                                            </span>
                                            <span class="text-xs font-medium text-gray-500">
                                                🏪 {{ $product->mart->name ?? 'Unknown Store' }}
                                            </span>
                                        </div>

                                        <!-- Actions -->
                                        <div class="flex space-x-2">
                                            <a href="{{ route('customer.home.showProduct', $product) }}"
                                                class=" bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200 text-sm font-medium {{ $product->stock <= 0 ? 'opacity-50 cursor-not-allowed' : '' }}"
                                                {{ $product->stock <= 0 ? 'disabled' : '' }}>
                                                {{ $product->stock <= 0 ? 'Stok Habis' : 'Lihat' }}
                                            </a>
                                            <form action="{{ route('customer.cart.store') }}" method="POST">
                                                @csrf
                                                <input type="number" name="quantity" value="1" hidden>
                                                <input type="number" name="product_id" value="{{ $product->id }}"
                                                    hidden>
                                                <button type="submit"
                                                    class="px-4 py-2 text-gray-700 transition duration-200 bg-gray-100 rounded-lg hover:bg-gray-200 focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path
                                                            d="M2 3h2l.4 2M7 13h10l4-8H6.4M7 13L5.4 5M7 13l-2 4h13M10 21a1 1 0 100-2 1 1 0 000 2zm7 0a1 1 0 100-2 1 1 0 000 2z"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" />
                                                    </svg>
                                                </button>
                                            </form>

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
