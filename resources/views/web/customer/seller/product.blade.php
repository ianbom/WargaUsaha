<x-customer.app>
    <div class="min-h-screen bg-gray-50">
        <!-- Breadcrumb -->
        <div class="bg-white border-b">
            <div class="max-w-7xl mx-auto px-6 py-4">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="flex items-center space-x-2">
                        <li>
                            <a href="{{ route('customer.home.showSeller', $seller) }}" class="text-gray-500 hover:text-gray-700">
                                {{ $seller->name }}
                            </a>
                        </li>
                        <li>
                            <span class="text-gray-400">/</span>
                        </li>
                        <li>
                            <span class="text-gray-900 font-medium">Produk</span>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Header -->
        <div class="bg-white">
            <div class="max-w-7xl mx-auto px-6 py-8">
                <div class="flex items-center space-x-6">
                    <div class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center">
                        <span class="text-xl font-bold text-gray-600">
                            {{ strtoupper(substr($seller->name, 0, 1)) }}
                        </span>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">Produk {{ $mart->name }}</h1>
                        <p class="text-gray-600">Oleh {{ $seller->name }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="max-w-7xl mx-auto px-6 py-8">
            @if($products->count() > 0)
                <div class="mb-6 text-sm text-gray-600">
                    {{-- Menampilkan {{ $products->count() }} dari {{ $products->total() }} produk --}}
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($products as $product)
                        <div class="bg-white rounded-lg shadow hover:shadow-lg transition-shadow overflow-hidden">
                            <div class="aspect-square">
                                <img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}"
                                     class="w-full h-full object-cover">
                            </div>

                            <div class="p-4">
                                <h3 class="font-semibold text-gray-900 mb-2 line-clamp-2">{{ $product->name }}</h3>

                                @if($product->productCategory)
                                    <span class="inline-block bg-gray-100 text-gray-600 px-2 py-1 rounded text-xs mb-2">
                                        {{ $product->productCategory->name }}
                                    </span>
                                @endif

                                <p class="text-sm text-gray-600 mb-3 line-clamp-2">{{ $product->description }}</p>

                                <div class="flex justify-between items-center">
                                    <div>
                                        <p class="text-2xl font-bold text-blue-600">
                                            Rp {{ number_format($product->price, 0, ',', '.') }}
                                        </p>
                                        <p class="text-sm text-gray-500">Stok: {{ $product->stock }}</p>
                                    </div>
                                </div>

                                <button class="w-full bg-blue-600 text-white py-2 rounded-lg mt-4 hover:bg-blue-700 transition-colors">
                                    Lihat Detail
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                {{-- <div class="mt-8">
                    {{ $products->links() }}
                </div> --}}
            @else
                <div class="text-center py-12">
                    <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Belum Ada Produk</h3>
                    <p class="text-gray-600">Penjual belum menambahkan produk apapun.</p>
                </div>
            @endif
        </div>
    </div>

    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</x-customer.app>
