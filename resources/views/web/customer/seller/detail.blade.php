<x-customer.app>
    <div class="min-h-screen bg-gray-50">
        <!-- Header Banner -->
        <div class="relative h-64 bg-gradient-to-r from-blue-600 to-purple-600">
            @if ($mart && $mart->banner_url)
                <img src="{{ asset('storage/' . $mart->banner_url) }}" alt="Banner Toko"
                    class="object-cover w-full h-full">
                <div class="absolute inset-0 bg-black bg-opacity-40"></div>
            @endif

            <div class="absolute bottom-0 left-0 right-0 p-6">
                <div class="mx-auto max-w-7xl">
                    <div class="flex items-end space-x-6">
                        <!-- Avatar Penjual -->
                        <div class="flex-shrink-0">
                            <div
                                class="flex items-center justify-center w-24 h-24 border-2 rounded-full shadow-lg border-gray-50">
                                <img src="{{ asset('storage/' . $seller->profile_pic) }}"
                                    class="object-cover w-full h-full rounded-full" />
                            </div>
                        </div>

                        <!-- Info Penjual -->
                        <div class="text-white">
                            <h1 class="text-3xl font-bold">{{ $seller->name }}</h1>
                            @if ($mart)
                                <p class="text-xl opacity-90">{{ $mart->name }}</p>
                                @if ($mart->martCategory)
                                    <span
                                        class="inline-block px-3 py-1 mt-2 text-sm bg-white rounded-full bg-opacity-20">
                                        {{ $mart->martCategory->name }}
                                    </span>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <!-- Navigation Tabs -->
        <div class="sticky top-0 z-10 bg-white border-b">
            <div class="px-6 mx-auto max-w-7xl">
                <nav class="flex space-x-8">
                    <a href="#overview" class="px-2 py-4 font-medium text-blue-600 border-b-2 border-blue-500 tab-link">
                        Overview
                    </a>
                    @if ($products->count() > 0)
                        <a href="{{ route('customer.home.showSeller.product', $seller) }}"
                            class="px-2 py-4 text-gray-500 border-b-2 border-transparent tab-link hover:text-gray-700">
                            Produk ({{ $products->count() }})
                        </a>
                    @endif
                    @if ($services->count() > 0)
                        <a href="{{ route('customer.home.showSeller.service', $seller) }}"
                            class="px-2 py-4 text-gray-500 border-b-2 border-transparent tab-link hover:text-gray-700">
                            Layanan ({{ $services->count() }})
                        </a>
                    @endif
                    @if ($jobs->count() > 0)
                        <a href="{{ route('customer.home.showSeller.job', $seller) }}"
                            class="px-2 py-4 text-gray-500 border-b-2 border-transparent tab-link hover:text-gray-700">
                            Lowongan Pekerjaan ({{ $jobs->count() }})
                        </a>
                    @endif
                </nav>
            </div>
        </div> --}}

        <div class="px-6 py-8 mx-auto max-w-7xl">
            <!-- Overview Section -->
            <div id="overview" class="tab-content">
                <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
                    <!-- Informasi Toko -->
                    <div class="space-y-8 lg:col-span-2">
                        @if ($mart)
                            <div class="p-6 bg-white rounded-lg shadow">
                                <h2 class="mb-4 text-2xl font-bold text-gray-900">Tentang Toko</h2>
                                <div class="space-y-4">
                                    <div>
                                        <h3 class="font-semibold text-gray-900">{{ $mart->name }}</h3>
                                        @if ($mart->description)
                                            <p class="mt-2 text-gray-600">{{ $mart->description }}</p>
                                        @else
                                            <p class="mt-2 italic text-gray-400">Belum ada deskripsi toko.</p>
                                        @endif
                                    </div>

                                    @if ($mart->martCategory)
                                        <div>
                                            <span class="text-sm text-gray-500">Kategori:</span>
                                            <span class="px-2 py-1 ml-2 text-sm text-blue-800 bg-blue-100 rounded">
                                                {{ $mart->martCategory->name }}
                                            </span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif

                        <!-- Produk Terbaru -->
                        @if ($products->count() > 0)
                            <div class="p-6 bg-white rounded-lg shadow">
                                <div class="flex items-center justify-between mb-6">
                                    <h2 class="text-2xl font-bold text-gray-900">Produk</h2>
                                    <a href="{{ route('customer.home.showSeller.product', $seller) }}"
                                        class="font-semibold text-blue-600 hover:text-blue-700">
                                        Lihat Semua
                                    </a>
                                </div>

                                <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
                                    @foreach ($products->take(4) as $product)
                                        <div
                                            class="overflow-hidden transition-shadow border rounded-lg hover:shadow-md">
                                            <img src="{{ asset('storage/' . $product->image_url) }}"
                                                alt="{{ $product->name }}" class="object-cover w-full h-32">
                                            <div class="p-3">
                                                <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                                    {{ $product->name }}</h3>
                                                <p class="mt-1 text-lg font-bold text-blue-600">
                                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                                </p>
                                                <p class="mt-1 text-xs text-gray-500">Stok: {{ $product->stock }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Layanan -->
                        @if ($services->count() > 0)
                            <div class="p-6 bg-white rounded-lg shadow">
                                <div class="flex items-center justify-between mb-6">
                                    <h2 class="text-2xl font-bold text-gray-900">Layanan</h2>
                                    <a href="{{ route('customer.home.showSeller.service', $seller) }}"
                                        class="font-semibold text-blue-600 hover:text-blue-700">
                                        Lihat Semua
                                    </a>
                                </div>

                                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                    @foreach ($services->take(4) as $service)
                                        <div class="p-4 transition-shadow border rounded-lg hover:shadow-md">
                                            <div class="flex space-x-4">
                                                <img src="{{ asset('storage/' . $service->image_url) }}"
                                                    alt="{{ $service->title }}"
                                                    class="flex-shrink-0 object-cover w-16 h-16 rounded-lg">
                                                <div class="flex-1">
                                                    <h3 class="font-medium text-gray-900">{{ $service->title }}</h3>
                                                    <p class="mt-1 text-sm text-gray-600 line-clamp-2">
                                                        {{ Str::limit($service->description, 100) }}</p>
                                                    <p class="mt-2 font-bold text-blue-600">
                                                        Rp {{ number_format($service->price, 0, ',', '.') }}
                                                    </p>
                                                    @if ($service->serviceCategory)
                                                        <span
                                                            class="inline-block px-2 py-1 mt-1 text-xs text-gray-600 bg-gray-100 rounded">
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
                        <!-- Pekerjaan -->
                        @if ($jobs->count() > 0)
                            <div class="p-6 bg-white rounded-lg shadow">
                                <div class="flex items-center justify-between mb-6">
                                    <h2 class="text-2xl font-bold text-gray-900">Lowongan Pekerjaan</h2>
                                    <a href="{{ route('customer.home.showSeller.job', $seller) }}"
                                        class="font-semibold text-blue-600 hover:text-blue-700">
                                        Lihat Semua
                                    </a>
                                </div>

                                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                    @foreach ($jobs->take(4) as $job)
                                        <div class="p-4 transition-shadow border rounded-lg hover:shadow-md">
                                            <div class="flex space-x-4">
                                                <div class="flex-1">
                                                    <h3 class="font-medium text-gray-900">{{ $job->job_title }}</h3>
                                                    <p class="mt-1 text-sm text-gray-600 line-clamp-2">
                                                        {{ Str::limit($job->job_description, 100) }}</p>
                                                    <p class="mt-2 font-bold text-blue-600">
                                                        Rp
                                                        {{ number_format($job->salary_min, 0, ',', '.') }} - Rp
                                                        {{ number_format($job->salary_max, 0, ',', '.') }}
                                                    </p>
                                                    @if ($job->jobCategory)
                                                        <span
                                                            class="inline-block px-2 py-1 mt-1 text-xs text-gray-600 bg-gray-100 rounded">
                                                            {{ $job->jobCategory->category_name }}
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
                        <div class="p-6 bg-white rounded-lg shadow">
                            <h3 class="mb-4 text-lg font-bold text-gray-900">Statistik</h3>
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Total Produk</span>
                                    <span class="font-semibold">{{ $products->count() }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Total Layanan</span>
                                    <span class="font-semibold">{{ $services->count() }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Total Lowongan Pekerjaan</span>
                                    <span class="font-semibold">{{ $jobs->count() }}</span>
                                </div>
                                @if ($mart)
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Status Toko</span>
                                        <span class="font-semibold text-green-600">Aktif</span>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Kontak -->
                        <div class="p-6 bg-white rounded-lg shadow">
                            <h3 class="mb-4 text-lg font-bold text-gray-900">Kontak Penjual</h3>
                            <div class="space-y-3">
                                <div>
                                    <span class="text-gray-600">Nama:</span>
                                    <p class="font-medium">{{ $seller->name }}</p>
                                </div>
                                @if ($seller->email)
                                    <div>
                                        <span class="text-gray-600">Email:</span>
                                        <p class="font-medium">{{ $seller->email }}</p>
                                    </div>
                                @endif
                            </div>

                            <button
                                class="w-full py-2 mt-4 text-white transition-colors bg-blue-600 rounded-lg hover:bg-blue-700">
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
