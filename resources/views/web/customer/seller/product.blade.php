<x-customer.app>
    <div class="min-h-screen bg-gray-50">
        <!-- Breadcrumb -->
        <div class="bg-white border-b">
            <div class="px-6 py-4 mx-auto max-w-7xl">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="flex items-center space-x-2">
                        <li>
                            <a href="{{ route('customer.home.showSeller', $seller) }}"
                                class="text-gray-500 hover:text-gray-700">
                                {{ $seller->name }}
                            </a>
                        </li>
                        <li>
                            <span class="text-gray-400">/</span>
                        </li>
                        <li>
                            <span class="font-medium text-gray-900">Produk</span>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Header -->
        <div class="bg-white">
            <div class="px-6 py-8 mx-auto max-w-7xl">
                <div class="flex items-center space-x-6">
                    <div class="flex items-center justify-center w-16 h-16 bg-gray-200 rounded-full">
                        <span class="text-xl font-bold text-gray-600">
                            {{ strtoupper(substr($seller->name, 0, 1)) }}
                        </span>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">Produk</h1>
                        <p class="text-gray-600">Oleh {{ $seller->name }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="px-6 py-8 mx-auto max-w-7xl">
            @if ($products->count() > 0)
                <div class="mb-6 text-sm text-gray-600">
                    {{-- Menampilkan {{ $products->count() }} dari {{ $products->total() }} produk --}}
                </div>

                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    @foreach ($products as $product)
                        <div class="overflow-hidden transition-shadow bg-white rounded-lg shadow hover:shadow-lg">
                            <div class="aspect-square">
                                <img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}"
                                    class="object-cover w-full h-full">
                            </div>

                            <div class="p-4">
                                <h3 class="mb-2 font-semibold text-gray-900 line-clamp-2">{{ $product->name }}</h3>

                                @if ($product->productCategory)
                                    <span class="inline-block px-2 py-1 mb-2 text-xs text-gray-600 bg-gray-100 rounded">
                                        {{ $product->productCategory->name }}
                                    </span>
                                @endif

                                <p class="mb-3 text-sm text-gray-600 line-clamp-2">{{ $product->description }}</p>

                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-2xl font-bold text-blue-600">
                                            Rp {{ number_format($product->price, 0, ',', '.') }}
                                        </p>
                                        <p class="text-sm text-gray-500">Stok: {{ $product->stock }}</p>
                                    </div>
                                    <a href="{{ route('customer.home.showProduct', $product) }}"
                                        class=" bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200 text-sm font-medium  }}">
                                        Lihat Detail

                                    </a>
                                </div>


                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                {{-- <div class="mt-8">
                    {{ $products->links() }}
                </div> --}}
            @else
                <div class="py-12 text-center">
                    <div class="flex items-center justify-center w-24 h-24 mx-auto mb-4 bg-gray-200 rounded-full">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <h3 class="mb-2 text-lg font-medium text-gray-900">Belum Ada Produk</h3>
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
