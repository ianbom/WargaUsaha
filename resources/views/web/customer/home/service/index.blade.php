<x-customer.app>
    <div class="min-h-screen bg-gray-50">
        <!-- Header Section -->
        <div class="bg-white border-b shadow-sm">
            <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">Semua Layanan</h1>
                        <p class="mt-2 text-sm text-gray-600">Temukan layanan terbaik untuk kebutuhan Anda</p>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <span
                            class="inline-flex items-center px-3 py-1 text-sm font-medium text-blue-800 bg-blue-100 rounded-full">
                            {{ $services->total() }} Layanan Tersedia
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
                        <h3 class="mb-6 text-lg font-semibold text-gray-900">Filter Layanan</h3>

                        <form method="GET" action="{{ route('customer.home.indexService') }}" id="filterForm">
                            <!-- Search -->
                            <div class="mb-6">
                                <label for="title" class="block mb-2 text-sm font-medium text-gray-700">
                                    Cari Layanan
                                </label>
                                <div class="relative">
                                    <input type="text" id="title" name="title" value="{{ request('title') }}"
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
                                <label for="service_category_id" class="block mb-2 text-sm font-medium text-gray-700">
                                    Kategori
                                </label>
                                <select id="service_category_id" name="service_category_id"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Semua Kategori</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ request('service_category_id') == $category->id ? 'selected' : '' }}>
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
                                <a href="{{ route('customer.home.indexService') }}"
                                    class="block w-full px-4 py-2 text-center text-gray-700 transition duration-200 bg-gray-100 rounded-lg hover:bg-gray-200 focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                    Reset Filter
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="mt-8 lg:col-span-3 lg:mt-0">
                    @if ($services->isEmpty())
                        <!-- Empty State -->
                        <div
                            class="p-16 text-center border border-gray-100 shadow-xl bg-white/70 backdrop-blur-sm rounded-2xl">
                            <div class="w-32 h-32 mx-auto mb-6 text-gray-300 animate-bounce">
                                <svg class="w-full h-full" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.1497 8.80219L9.70794 9.40825L10.1497 8.80219ZM12 3.10615L11.4925 3.65833C11.7794 3.9221 12.2206 3.9221 12.5075 3.65833L12 3.10615ZM13.8503 8.8022L14.2921 9.40826L13.8503 8.8022ZM12 9.67598L12 10.426H12L12 9.67598ZM10.5915 8.19612C9.90132 7.69298 9.16512 7.08112 8.60883 6.43627C8.03452 5.77053 7.75 5.18233 7.75 4.71476H6.25C6.25 5.73229 6.82845 6.66885 7.47305 7.41607C8.13569 8.18419 8.97435 8.87349 9.70794 9.40825L10.5915 8.19612ZM7.75 4.71476C7.75 3.65612 8.27002 3.05231 8.8955 2.84182C9.54754 2.62238 10.5199 2.76435 11.4925 3.65833L12.5075 2.55398C11.2302 1.37988 9.70254 0.987559 8.41707 1.42016C7.10502 1.8617 6.25 3.09623 6.25 4.71476H7.75ZM14.2921 9.40826C15.0257 8.8735 15.8643 8.18421 16.527 7.41608C17.1716 6.66886 17.75 5.73229 17.75 4.71475H16.25C16.25 5.18234 15.9655 5.77055 15.3912 6.43629C14.8349 7.08113 14.0987 7.69299 13.4085 8.19613L14.2921 9.40826ZM17.75 4.71475C17.75 3.09622 16.895 1.8617 15.5829 1.42016C14.2975 0.987559 12.7698 1.37988 11.4925 2.55398L12.5075 3.65833C13.4801 2.76435 14.4525 2.62238 15.1045 2.84181C15.73 3.0523 16.25 3.65612 16.25 4.71475H17.75ZM9.70794 9.40825C10.463 9.95869 11.0618 10.426 12 10.426L12 8.92598C11.635 8.92598 11.4347 8.81074 10.5915 8.19612L9.70794 9.40825ZM13.4085 8.19613C12.5653 8.81074 12.365 8.92598 12 8.92598L12 10.426C12.9382 10.426 13.537 9.9587 14.2921 9.40826L13.4085 8.19613Z"
                                        fill="currentColor" />
                                    <path
                                        d="M4 21.3884H6.25993C7.27079 21.3884 8.29253 21.4937 9.27633 21.6964C11.0166 22.0549 12.8488 22.0983 14.6069 21.8138C15.4738 21.6734 16.326 21.4589 17.0975 21.0865C17.7939 20.7504 18.6469 20.2766 19.2199 19.7459C19.7921 19.216 20.388 18.3487 20.8109 17.6707C21.1736 17.0894 20.9982 16.3762 20.4245 15.943C19.7873 15.4619 18.8417 15.462 18.2046 15.9433L16.3974 17.3084C15.697 17.8375 14.932 18.3245 14.0206 18.4699C13.911 18.4874 13.7962 18.5033 13.6764 18.5172M13.6764 18.5172C13.6403 18.5214 13.6038 18.5254 13.5668 18.5292M13.6764 18.5172C13.8222 18.486 13.9669 18.396 14.1028 18.2775C14.746 17.7161 14.7866 16.77 14.2285 16.1431C14.0991 15.9977 13.9475 15.8764 13.7791 15.7759C10.9817 14.1074 6.62942 15.3782 4 17.2429M13.6764 18.5172C13.6399 18.525 13.6033 18.5292 13.5668 18.5292M13.5668 18.5292C13.0434 18.5829 12.4312 18.5968 11.7518 18.5326"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                            </div>
                            <h3 class="mb-3 text-2xl font-bold text-gray-800">Oops! Tidak ada layanan ditemukan</h3>
                            <p class="mb-6 text-lg text-gray-600">Coba ubah filter pencarian Anda atau lihat semua
                                layanan</p>
                            <a href="{{ route('customer.home.indexService') }}"
                                class="inline-flex items-center px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                                Lihat Semua Layanan
                            </a>
                        </div>
                    @else
                        <!-- Products Grid -->
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                            @foreach ($services as $service)
                                <div
                                    class="transition-shadow duration-200 bg-white border rounded-lg shadow-sm hover:shadow-md">
                                    <!-- Product Image -->
                                    <div class="w-full overflow-hidden bg-gray-200 rounded-t-lg aspect-w-1 aspect-h-1">
                                        <img src="{{ asset('storage/' . $service->image_url) }}"
                                            alt="{{ $service->name }}"
                                            class="object-cover object-center w-full h-48 group-hover:opacity-75">
                                    </div>

                                    <!-- Product Info -->
                                    <div class="p-4">
                                        <div class="mb-2">
                                            <h3 class="mb-1 text-lg font-semibold text-gray-900">{{ $service->title }}
                                            </h3>
                                            <p class="text-sm text-gray-600 line-clamp-2">{{ $service->description }}
                                            </p>
                                        </div>

                                        <!-- Price and Stock -->
                                        <div class="flex items-center justify-between mb-3">
                                            <span class="text-2xl font-bold text-blue-600">
                                                Rp {{ number_format($service->price, 0, ',', '.') }}
                                            </span>

                                        </div>
                                        <!-- Category and Mart -->
                                        <div class="flex items-center justify-between mb-4">
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-sky-100 text-sky-800">
                                                {{ $service->category->name ?? ($service->category_name ?? 'Tanpa Kategori') }}
                                            </span>
                                            <span class="text-xs font-medium text-gray-500">
                                                🏪 {{ $service->user->name ?? 'Unknown User' }}
                                            </span>
                                        </div>
                                        <div class="flex space-x-2">
                                            <a href="{{ route('customer.home.showService', $service) }}"
                                                class=" bg-primary text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200 text-sm font-medium  }}">
                                                Lihat Detail

                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        <div class="mt-8">
                            {{ $services->appends(request()->query())->links() }}
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
