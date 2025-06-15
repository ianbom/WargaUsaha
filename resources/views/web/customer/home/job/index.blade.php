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
                            {{ $job->total() }} Pekerjaan Tersedia
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

                            {{-- <!-- Salary Range -->
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
                            </div> --}}

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
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                    class="w-full h-full">
                                    <path
                                        d="M2 14C2 10.2288 2 8.34315 3.17157 7.17157C4.34315 6 6.22876 6 10 6H14C17.7712 6 19.6569 6 20.8284 7.17157C22 8.34315 22 10.2288 22 14C22 17.7712 22 19.6569 20.8284 20.8284C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14Z"
                                        stroke="currentColor" stroke-width="1.5" />
                                    <path
                                        d="M16 6C16 4.11438 16 3.17157 15.4142 2.58579C14.8284 2 13.8856 2 12 2C10.1144 2 9.17157 2 8.58579 2.58579C8 3.17157 8 4.11438 8 6"
                                        stroke="currentColor" stroke-width="1.5" />
                                    <path
                                        d="M17 9C17 9.55228 16.5523 10 16 10C15.4477 10 15 9.55228 15 9C15 8.44772 15.4477 8 16 8C16.5523 8 17 8.44772 17 9Z"
                                        fill="currentColor" />
                                    <path
                                        d="M9 9C9 9.55228 8.55228 10 8 10C7.44772 10 7 9.55228 7 9C7 8.44772 7.44772 8 8 8C8.55228 8 9 8.44772 9 9Z"
                                        fill="currentColor" />
                                </svg>
                            </div>
                            <h3 class="mb-3 text-2xl font-bold text-gray-800">Oops! Tidak ada lowongan pekerjaan
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
                                    class="transition-all duration-300 bg-white border border-gray-200 shadow-sm rounded-xl hover:shadow-lg hover:border-blue-200 group">
                                    <!-- Job Info -->
                                    <div class="p-5">
                                        <!-- Job Title & Category -->
                                        <div class="mb-4">
                                            <h3
                                                class="mb-2 text-lg font-bold text-gray-900 transition-colors duration-200 group-hover:text-blue-600 line-clamp-2">
                                                {{ $data->job_title }}
                                            </h3>
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                                <svg class="w-3 h-3 mr-1" aria-hidden="true" viewBox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12.052 1.25H11.948C11.0495 1.24997 10.3003 1.24995 9.70552 1.32991C9.07773 1.41432 8.51093 1.59999 8.05546 2.05546C7.59999 2.51093 7.41432 3.07773 7.32991 3.70552C7.24995 4.3003 7.24997 5.04951 7.25 5.94799V6.02572C5.22882 6.09185 4.01511 6.32803 3.17157 7.17157C2 8.34315 2 10.2288 2 14C2 17.7712 2 19.6569 3.17157 20.8284C4.34315 22 6.22876 22 10 22H14C17.7712 22 19.6569 22 20.8284 20.8284C22 19.6569 22 17.7712 22 14C22 10.2288 22 8.34315 20.8284 7.17157C19.9849 6.32803 18.7712 6.09185 16.75 6.02572V5.94801C16.75 5.04954 16.7501 4.3003 16.6701 3.70552C16.5857 3.07773 16.4 2.51093 15.9445 2.05546C15.4891 1.59999 14.9223 1.41432 14.2945 1.32991C13.6997 1.24995 12.9505 1.24997 12.052 1.25ZM15.25 6.00189V6C15.25 5.03599 15.2484 4.38843 15.1835 3.9054C15.1214 3.44393 15.0142 3.24644 14.8839 3.11612C14.7536 2.9858 14.5561 2.87858 14.0946 2.81654C13.6116 2.7516 12.964 2.75 12 2.75C11.036 2.75 10.3884 2.7516 9.90539 2.81654C9.44393 2.87858 9.24644 2.9858 9.11612 3.11612C8.9858 3.24644 8.87858 3.44393 8.81654 3.9054C8.7516 4.38843 8.75 5.03599 8.75 6V6.00189C9.14203 6 9.55807 6 10 6H14C14.4419 6 14.858 6 15.25 6.00189ZM17 9C17 9.55229 16.5523 10 16 10C15.4477 10 15 9.55229 15 9C15 8.44772 15.4477 8 16 8C16.5523 8 17 8.44772 17 9ZM8 10C8.55228 10 9 9.55229 9 9C9 8.44772 8.55228 8 8 8C7.44772 8 7 8.44772 7 9C7 9.55229 7.44772 10 8 10Z"
                                                        fill="currentColor" />
                                                </svg>


                                                {{ $data->category_name ?? 'Tanpa Kategori' }}
                                            </span>
                                        </div>

                                        <!-- Salary Range -->
                                        <div
                                            class="p-3 mb-4 border rounded-lg border-sky-100 bg-gradient-to-r from-white to-sky-50">
                                            <div class="flex items-center justify-between">
                                                <div>
                                                    <p class="mb-1 text-xs font-semibold text-sky-600">Rentang Gaji
                                                    </p>
                                                    <span class="text-base font-bold text-sky-700">
                                                        Rp {{ number_format($data->salary_min, 0, ',', '.') }} - Rp
                                                        {{ number_format($data->salary_max, 0, ',', '.') }}
                                                    </span>
                                                </div>
                                                <div class="p-2 border rounded-md border-sky-200 bg-sky-100">
                                                    <svg class="w-5 h-5 text-sky-600" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1">
                                                        </path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Job Meta Info -->
                                        <div class="mb-4 space-y-2">
                                            <!-- Location -->
                                            <div class="flex items-center text-sm text-gray-600">
                                                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                    </path>
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                                <span class="truncate">{{ $data->location_detail ?? 'Remote' }}</span>
                                            </div>

                                            <!-- Timeline -->
                                            <div class="flex items-center text-sm text-gray-600">
                                                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                                <span>{{ \Carbon\Carbon::parse($data->start_date)->format('d M') }} -
                                                    {{ \Carbon\Carbon::parse($data->end_date)->format('d M Y') }}</span>
                                            </div>
                                        </div>
                                        <!-- Status & Duration -->
                                        <div class="flex items-center justify-between mb-4">
                                            <span
                                                class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium
                        {{ $data->job_status == 'Open'
                            ? 'bg-green-100 text-green-800'
                            : ($data->job_status == 'Closed'
                                ? 'bg-red-100 text-red-800'
                                : 'bg-yellow-100 text-yellow-800') }}">
                                                <span
                                                    class="w-1.5 h-1.5 mr-1.5 rounded-full
                            {{ $data->job_status == 'Open'
                                ? 'bg-green-400'
                                : ($data->job_status == 'Closed'
                                    ? 'bg-red-400'
                                    : 'bg-yellow-400') }}">
                                                </span>
                                                {{ ucfirst($data->job_status ?? 'Draft') }}
                                            </span>
                                            <span
                                                class="flex items-center gap-2 px-2 py-1 text-xs text-indigo-500 rounded-full bg-indigo-50">
                                                <svg viewBox="0 0 24 24" class="w-4 h-4" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="12" cy="12" r="10"
                                                        stroke="currentColor" stroke-width="1.5" />
                                                    <path d="M12 8V12L14.5 14.5" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>

                                                {{ \Carbon\Carbon::parse($data->start_date)->diffInDays(\Carbon\Carbon::parse($data->end_date)) }}
                                                hari
                                            </span>
                                        </div>

                                        <!-- Actions -->
                                        <div class="flex space-x-2">
                                            <a href="{{ route('customer.home.showJobVacancy', $data) }}"
                                                class="flex items-center px-4 py-2 text-sm font-medium text-center text-white transition duration-200 rounded-lg bg-primary hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                                Lihat Detail
                                            </a>
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
