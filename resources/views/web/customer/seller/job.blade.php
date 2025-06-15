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
                            <span class="font-medium text-gray-900">Lowongan</span>
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
                        <h1 class="text-3xl font-bold text-gray-900">Lowongan</h1>
                        <p class="text-gray-600">Oleh {{ $seller->name }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- jobs Grid -->
        <div class="px-6 py-8 mx-auto max-w-7xl">
            @if ($jobs->count() > 0)
                <div class="mb-6 text-sm text-gray-600">
                    {{-- Menampilkan {{ $jobs->count() }} dari {{ $jobs->total() }} layanan --}}
                </div>

                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($jobs as $job)
                        <div
                            class="transition-all duration-300 bg-white border border-gray-200 shadow-sm rounded-xl hover:shadow-lg hover:border-blue-200 group">
                            <!-- Job Info -->
                            <div class="p-5">
                                <!-- Job Title & Category -->
                                <div class="mb-4">
                                    <h3
                                        class="mb-2 text-lg font-bold text-gray-900 transition-colors duration-200 group-hover:text-blue-600 line-clamp-2">
                                        {{ $job->job_title }}
                                    </h3>
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                        <svg class="w-3 h-3 mr-1" aria-hidden="true" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12.052 1.25H11.948C11.0495 1.24997 10.3003 1.24995 9.70552 1.32991C9.07773 1.41432 8.51093 1.59999 8.05546 2.05546C7.59999 2.51093 7.41432 3.07773 7.32991 3.70552C7.24995 4.3003 7.24997 5.04951 7.25 5.94799V6.02572C5.22882 6.09185 4.01511 6.32803 3.17157 7.17157C2 8.34315 2 10.2288 2 14C2 17.7712 2 19.6569 3.17157 20.8284C4.34315 22 6.22876 22 10 22H14C17.7712 22 19.6569 22 20.8284 20.8284C22 19.6569 22 17.7712 22 14C22 10.2288 22 8.34315 20.8284 7.17157C19.9849 6.32803 18.7712 6.09185 16.75 6.02572V5.94801C16.75 5.04954 16.7501 4.3003 16.6701 3.70552C16.5857 3.07773 16.4 2.51093 15.9445 2.05546C15.4891 1.59999 14.9223 1.41432 14.2945 1.32991C13.6997 1.24995 12.9505 1.24997 12.052 1.25ZM15.25 6.00189V6C15.25 5.03599 15.2484 4.38843 15.1835 3.9054C15.1214 3.44393 15.0142 3.24644 14.8839 3.11612C14.7536 2.9858 14.5561 2.87858 14.0946 2.81654C13.6116 2.7516 12.964 2.75 12 2.75C11.036 2.75 10.3884 2.7516 9.90539 2.81654C9.44393 2.87858 9.24644 2.9858 9.11612 3.11612C8.9858 3.24644 8.87858 3.44393 8.81654 3.9054C8.7516 4.38843 8.75 5.03599 8.75 6V6.00189C9.14203 6 9.55807 6 10 6H14C14.4419 6 14.858 6 15.25 6.00189ZM17 9C17 9.55229 16.5523 10 16 10C15.4477 10 15 9.55229 15 9C15 8.44772 15.4477 8 16 8C16.5523 8 17 8.44772 17 9ZM8 10C8.55228 10 9 9.55229 9 9C9 8.44772 8.55228 8 8 8C7.44772 8 7 8.44772 7 9C7 9.55229 7.44772 10 8 10Z"
                                                fill="currentColor" />
                                        </svg>


                                        {{ $job->category_name ?? 'Tanpa Kategori' }}
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
                                                Rp {{ number_format($job->salary_min, 0, ',', '.') }} - Rp
                                                {{ number_format($job->salary_max, 0, ',', '.') }}
                                            </span>
                                        </div>
                                        <div class="p-2 border rounded-md border-sky-200 bg-sky-100">
                                            <svg class="w-5 h-5 text-sky-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
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
                                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <span class="truncate">{{ $job->location_detail ?? 'Remote' }}</span>
                                    </div>

                                    <!-- Timeline -->
                                    <div class="flex items-center text-sm text-gray-600">
                                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <span>{{ \Carbon\Carbon::parse($job->start_date)->format('d M') }} -
                                            {{ \Carbon\Carbon::parse($job->end_date)->format('d M Y') }}</span>
                                    </div>
                                </div>
                                <!-- Status & Duration -->
                                <div class="flex items-center justify-between mb-4">
                                    <span
                                        class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium
                        {{ $job->job_status == 'Open'
                            ? 'bg-green-100 text-green-800'
                            : ($job->job_status == 'Closed'
                                ? 'bg-red-100 text-red-800'
                                : 'bg-yellow-100 text-yellow-800') }}">
                                        <span
                                            class="w-1.5 h-1.5 mr-1.5 rounded-full
                            {{ $job->job_status == 'Open'
                                ? 'bg-green-400'
                                : ($job->job_status == 'Closed'
                                    ? 'bg-red-400'
                                    : 'bg-yellow-400') }}">
                                        </span>
                                        {{ ucfirst($job->job_status ?? 'Draft') }}
                                    </span>
                                    <span
                                        class="flex items-center gap-2 px-2 py-1 text-xs text-indigo-500 rounded-full bg-indigo-50">
                                        <svg viewBox="0 0 24 24" class="w-4 h-4" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="12" cy="12" r="10" stroke="currentColor"
                                                stroke-width="1.5" />
                                            <path d="M12 8V12L14.5 14.5" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>

                                        {{ \Carbon\Carbon::parse($job->start_date)->diffInDays(\Carbon\Carbon::parse($job->end_date)) }}
                                        hari
                                    </span>
                                </div>

                                <!-- Actions -->
                                <div class="flex space-x-2">
                                    <a href="{{ route('customer.home.showJobVacancy', $job) }}"
                                        class="flex items-center flex-1 gap-2 px-4 py-2 text-sm font-medium text-center text-white transition duration-200 rounded-lg bg-primary hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        Lihat Selengkapnya
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                {{-- <div class="mt-8">
                    {{ $jobs->links() }}
                </div> --}}
            @else
                <div class="py-12 text-center">
                    <div class="flex items-center justify-center w-24 h-24 mx-auto mb-4 bg-gray-200 rounded-full">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m8 0H8m8 0v6.5c0 .621-.504 1.125-1.125 1.125H9.125C8.504 12.625 8 12.121 8 11.5V6m8 0V4.5c0-.621-.504-1.125-1.125-1.125H9.125C8.504 3.375 8 3.879 8 4.5V6">
                            </path>
                        </svg>
                    </div>
                    <h3 class="mb-2 text-lg font-medium text-gray-900">Belum Ada Layanan</h3>
                    <p class="text-gray-600">Penjual belum menambahkan layanan apapun.</p>
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

        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</x-customer.app>
