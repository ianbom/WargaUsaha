<x-customer.app>
    <div class="min-h-screen bg-gray-50">
        <!-- Header Section -->
        <div class="bg-white border-b shadow-sm">
            <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">Semua Lowongan Pekerjaan</h1>
                        <p class="mt-2 text-sm text-gray-600">Temukan lowongan pekerjaan terbaik untuk kebutuhan Anda</p>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <span
                            class="inline-flex items-center px-3 py-1 text-sm font-medium text-blue-800 bg-blue-100 rounded-full">
                            {{ $job->total() }} Produk Tersedia
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
                        <h3 class="mb-6 text-lg font-semibold text-gray-900">Filter Pekerjaan</h3>
                        <form method="GET" action="{{ route('customer.home.indexJobVacancy') }}" id="filterForm">
                            <!-- Search -->
                            <div class="mb-6">
                                <label for="job_title" class="block mb-2 text-sm font-medium text-gray-700">
                                    Cari Pekerjaan
                                </label>
                                <div class="relative">
                                    <input type="text" id="job_title" name="job_title"
                                        value="{{ request('job_title') }}" placeholder="Nama Pekerjaan..."
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
                                <label for="job_category_id" class="block mb-2 text-sm font-medium text-gray-700">
                                    Kategori Pekerjaan
                                </label>
                                <select id="job_category_id" name="job_category_id"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Semua Kategori</option>
                                    @foreach ($job_categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ request('job_category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Salary Range -->
                            <div class="mb-6">
                                <label class="block mb-2 text-sm font-medium text-gray-700">
                                    Rentang Gaji yang Diinginkan
                                </label>
                                <div class="grid grid-cols-2 gap-2">
                                    <input type="number" name="salary_min" value="{{ request('salary_min') }}"
                                        placeholder="Gaji Minimum"
                                        class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <input type="number" name="salary_max" value="{{ request('salary_max') }}"
                                        placeholder="Gaji Maksimum"
                                        class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="space-y-3">
                                <button type="submit"
                                    class="w-full px-4 py-2 text-white transition duration-200 bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    Terapkan Filter
                                </button>
                                <a href="{{ route('customer.home.indexJobVacancy') }}"
                                    class="block w-full px-4 py-2 text-center text-gray-700 transition duration-200 bg-gray-100 rounded-lg hover:bg-gray-200 focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                    Reset Filter
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Jobs Grid -->
                <div class="mt-8 lg:col-span-3 lg:mt-0">
                    @if ($job->isEmpty())
                        <!-- Empty State -->
                        <div
                            class="p-16 text-center border border-gray-100 shadow-xl bg-white/70 backdrop-blur-sm rounded-2xl">
                            <div class="w-32 h-32 mx-auto mb-6 text-gray-300 animate-bounce">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" class="w-full h-full">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                            </div>
                            <h3 class="mb-3 text-2xl font-bold text-gray-800">Oops! Tidak ada lowingan pekerjaan
                                ditemukan</h3>
                            <p class="mb-6 text-lg text-gray-600">Coba ubah filter pencarian Anda atau lihat semua
                                lowongan pekerjaan</p>
                            <a href="{{ route('customer.home.indexJobVacancy') }}"
                                class="inline-flex items-center px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                                Lihat Semua Lowongan Pekerjaan
                            </a>
                        </div>
                    @else
                        <!-- Products Grid -->
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                            @foreach ($job as $data)
                                <div
                                    class="transition-shadow duration-200 bg-white border rounded-lg shadow-sm hover:shadow-md">
                                    <!-- Product Info -->
                                    <div class="p-4">
                                        <div class="mb-2">
                                            <h3 class="mb-1 text-lg font-semibold text-gray-900">{{ $data->job_title }}
                                            </h3>
                                            {{-- <p class="text-sm text-gray-600 line-clamp-2">{{ $product->description }}
                                            </p> --}}
                                        </div>
                                        @foreach ($job as $datas)
                                            <div class="flex items-center justify-between mb-3">
                                                <span class="font-bold text-blue-600 text-md">
                                                    Rp {{ number_format($datas->salary_min, 0, ',', '.') }} - Rp
                                                    {{ number_format($datas->salary_max, 0, ',', '.') }}
                                                </span>
                                            </div>
                                        @endforeach
                                        <div class="flex items-center justify-between mb-4">
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                {{ $job->category_name ?? 'Tanpa Kategori' }}
                                            </span>
                                        </div>
                                        <!-- Actions -->
                                        <div class="flex space-x-2">
                                            <a href="{{ route('customer.home.showProduct', $job) }}"
                                                class="px-4 py-2 text-sm font-medium text-white transition duration-200 bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Lihat
                                            </a>
                                            {{-- <button
                                                class="px-4 py-2 text-gray-700 transition duration-200 bg-gray-100 rounded-lg hover:bg-gray-200 focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                                    </path>
                                                </svg>
                                            </button> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- Pagination -->
                        <div class="mt-8">
                            {{ $job->appends(request()->query())->links() }}
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
            const searchInput = document.getElementById('job_title');
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
