<x-customer.app>
    <div class="min-h-screen bg-gray-50">
        <!-- Header Banner -->
        <div class="relative h-64 bg-gradient-to-r from-blue-600 to-purple-600">
            @if($mart && $mart->banner_url)
                <img src="{{ asset('storage/' . $mart->banner_url) }}" alt="Banner Toko" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            @endif

            <div class="absolute bottom-0 left-0 right-0 p-6">
                <div class="max-w-7xl mx-auto">
                    <div class="flex items-end space-x-6">
                        <!-- Avatar Penjual -->
                        <div class="flex-shrink-0">
                            <div class="w-24 h-24 rounded-full flex items-center justify-center border-2 border-gray-50 shadow-lg">
                                <img

                                            src="{{ asset('storage/' . $seller->profile_pic) }}"

                                        >
                            </div>
                        </div>

                        <!-- Info Penjual -->
                        <div class="text-white">
                            <h1 class="text-3xl font-bold">{{ $seller->name }}</h1>
                            @if($mart)
                                <p class="text-xl opacity-90">{{ $mart->name }}</p>
                                @if($mart->martCategory)
                                    <span class="inline-block bg-white bg-opacity-20 px-3 py-1 rounded-full text-sm mt-2">
                                        {{ $mart->martCategory->name }}
                                    </span>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation Tabs -->
        <div class="bg-white border-b sticky top-0 z-10">
            <div class="max-w-7xl mx-auto px-6">
                <nav class="flex space-x-8">
                    <a href="#overview" class="tab-link py-4 px-2 border-b-2 border-blue-500 text-blue-600 font-medium">
                        Overview
                    </a>
                    @if($products->count() > 0)
                        <a href="{{ route('customer.home.showSeller.product', $seller) }}" class="tab-link py-4 px-2 border-b-2 border-transparent text-gray-500 hover:text-gray-700">
                            Produk ({{ $products->count() }})
                        </a>
                    @endif
                    @if($services->count() > 0)
                        <a href="{{ route('customer.home.showSeller.service', $seller) }}" class="tab-link py-4 px-2 border-b-2 border-transparent text-gray-500 hover:text-gray-700">
                            Layanan ({{ $services->count() }})
                        </a>
                    @endif
                </nav>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-6 py-8">
            <!-- Overview Section -->
            <div id="overview" class="tab-content">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Informasi Toko -->
                    <div class="lg:col-span-2 space-y-8">
                        @if($mart)
                            <div class="bg-white rounded-lg shadow p-6">
                                <h2 class="text-2xl font-bold text-gray-900 mb-4">Tentang Toko</h2>
                                <div class="space-y-4">
                                    <div>
                                        <h3 class="font-semibold text-gray-900">{{ $mart->name }}</h3>
                                        @if($mart->description)
                                            <p class="text-gray-600 mt-2">{{ $mart->description }}</p>
                                        @else
                                            <p class="text-gray-400 mt-2 italic">Belum ada deskripsi toko.</p>
                                        @endif
                                    </div>

                                    @if($mart->martCategory)
                                        <div>
                                            <span class="text-sm text-gray-500">Kategori:</span>
                                            <span class="ml-2 bg-blue-100 text-blue-800 px-2 py-1 rounded text-sm">
                                                {{ $mart->martCategory->name }}
                                            </span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif

                        <!-- Produk Terbaru -->
                        @if($products->count() > 0)
                            <div class="bg-white rounded-lg shadow p-6">
                                <div class="flex justify-between items-center mb-6">
                                    <h2 class="text-2xl font-bold text-gray-900">Produk Terbaru</h2>
                                    <a href="{{ route('customer.home.showSeller.product', $seller) }}"
                                       class="text-blue-600 hover:text-blue-700 font-medium">
                                        Lihat Semua →
                                    </a>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                                    @foreach($products->take(4) as $product)
                                        <div class="border rounded-lg overflow-hidden hover:shadow-md transition-shadow">
                                            <img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}"
                                                 class="w-full h-32 object-cover">
                                            <div class="p-3">
                                                <h3 class="font-medium text-gray-900 text-sm line-clamp-2">{{ $product->name }}</h3>
                                                <p class="text-blue-600 font-bold text-lg mt-1">
                                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                                </p>
                                                <p class="text-xs text-gray-500 mt-1">Stok: {{ $product->stock }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Layanan -->
                        @if($services->count() > 0)
                            <div class="bg-white rounded-lg shadow p-6">
                                <div class="flex justify-between items-center mb-6">
                                    <h2 class="text-2xl font-bold text-gray-900">Layanan</h2>
                                    <a href="{{ route('customer.home.showSeller.service', $seller) }}"
                                       class="text-blue-600 hover:text-blue-700 font-medium">
                                        Lihat Semua →
                                    </a>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    @foreach($services->take(4) as $service)
                                        <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                                            <div class="flex space-x-4">
                                                <img src="{{  asset('storage/' . $service->image_url)}}" alt="{{ $service->title }}"
                                                     class="w-16 h-16 object-cover rounded-lg flex-shrink-0">
                                                <div class="flex-1">
                                                    <h3 class="font-medium text-gray-900">{{ $service->title }}</h3>
                                                    <p class="text-sm text-gray-600 mt-1 line-clamp-2">{{ Str::limit($service->description, 100) }}</p>
                                                    <p class="text-blue-600 font-bold mt-2">
                                                        Rp {{ number_format($service->price, 0, ',', '.') }}
                                                    </p>
                                                    @if($service->serviceCategory)
                                                        <span class="inline-block bg-gray-100 text-gray-600 px-2 py-1 rounded text-xs mt-1">
                                                            {{ $service->serviceCategory->name }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Sidebar -->
                    <div class="space-y-6">
                        <!-- Statistik -->
                        <div class="bg-white rounded-lg shadow p-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Statistik</h3>
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Total Produk</span>
                                    <span class="font-semibold">{{ $products->count() }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Total Layanan</span>
                                    <span class="font-semibold">{{ $services->count() }}</span>
                                </div>
                                @if($mart)
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Status Toko</span>
                                        <span class="text-green-600 font-semibold">Aktif</span>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Kontak -->
                        <div class="bg-white rounded-lg shadow p-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Kontak Penjual</h3>
                            <div class="space-y-3">
                                <div>
                                    <span class="text-gray-600">Nama:</span>
                                    <p class="font-medium">{{ $seller->name }}</p>
                                </div>
                                @if($seller->email)
                                    <div>
                                        <span class="text-gray-600">Email:</span>
                                        <p class="font-medium">{{ $seller->email }}</p>
                                    </div>
                                @endif
                            </div>

                            <button class="w-full bg-blue-600 text-white py-2 rounded-lg mt-4 hover:bg-blue-700 transition-colors">
                                <a href="{{ route('customer.chat.detail', $seller->id) }}">Hubungi Penjual</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .tab-link.active {
            border-color: #3B82EF;
            color: #3B82EF;
        }
    </style>

    <script>
        // Tab functionality
        document.addEventListener('DOMContentLoaded', function() {
            const tabLinks = document.querySelectorAll('.tab-link');

            tabLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Remove active class from all tabs
                    tabLinks.forEach(tab => {
                        tab.classList.remove('border-blue-500', 'text-blue-600');
                        tab.classList.add('border-transparent', 'text-gray-500');
                    });

                    // Add active class to clicked tab
                    this.classList.remove('border-transparent', 'text-gray-500');
                    this.classList.add('border-blue-500', 'text-blue-600');
                });
            });
        });
    </script>
</x-customer.app>
