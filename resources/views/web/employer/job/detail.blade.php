<x-employer.app>
    <div x-data="form">
        <!-- Header Section -->
        <div class="flex items-center justify-between ">
            <div class="text-xl font-semibold text-gray-800">
                Detail Job
            </div>
            <nav class="flex items-center space-x-2 text-sm text-gray-600">
                <a href="#" class="transition-colors text-primary hover:underline">Dashboard</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <a href="{{ route('seller.product.index') }}"
                    class="transition-colors text-primary hover:underline">Job</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="text-gray-800">{{ $job->job_title }}</span>
            </nav>
        </div>
        <!-- Alert Messages -->
        <div class="mb-6 space-y-4">
            @include('web.seller.alert.success')
            @include('web.seller.alert.error')
            @if ($errors->any())
                <div class="p-4 border-l-4 border-red-400 rounded-md bg-red-50">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="w-5 h-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800">There were errors with your submission</h3>
                            <div class="mt-2 text-sm text-red-700">
                                <ul class="pl-5 space-y-1 list-disc">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Main Content -->
        <div class="overflow-hidden bg-white shadow dark:bg-[#0e1726] rounded-2xl">
            <!-- Job Header -->

            <div class="px-8 py-8 text-white bg-primary">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
                    <div class="flex-1">
                        <div class="flex items-center mb-4">
                            <div>
                                <h2 class="mb-2 text-3xl font-bold">{{ $job->job_title }}</h2>
                                <div class="flex items-center space-x-4 text-blue-100">
                                    <span class="flex items-center">
                                        {{ $job->jobCategory?->category_name }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tombol Edit & Share -->
                    <div class="flex items-center mt-6 space-x-3 lg:mt-0">
                        <a href="{{ route('employer.job.edit', $job->id) }}"
                            class="flex items-center h-10 px-4 text-sm font-medium text-white transition-all duration-200 rounded-md bg-white/20 hover:bg-white/30 backdrop-blur-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none"
                                stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit Job
                        </a>
                        <button
                            class="flex items-center h-10 px-4 text-sm font-medium text-blue-600 transition-all duration-200 bg-white rounded-md hover:bg-gray-50">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z">
                                </path>
                            </svg>
                            Share
                        </button>
                    </div>
                </div>
            </div>

            <!-- Job Details Content -->
            <div class="p-8">
                <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
                    <!-- Main Content -->
                    <div class="space-y-8 lg:col-span-2">
                        <!-- Job Description -->
                        <div class="p-6 border border-gray-200 bg-gray-50 rounded-xl">
                            <h3 class="flex items-center mb-4 text-xl font-semibold text-gray-900">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                                Job Description
                            </h3>
                            <div class="prose prose-gray max-w-none">
                                <p class="leading-relaxed text-gray-700">{{ $job->job_description }}</p>
                            </div>

                        </div>

                        <!-- Skills & Requirements -->
                        <div class="p-6 border border-gray-200 bg-gray-50 rounded-xl">
                            <h3 class="flex items-center mb-4 text-xl font-semibold text-gray-900">
                                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z">
                                    </path>
                                </svg>
                                Skills & Requirements
                            </h3>
                            <div class="prose prose-gray max-w-none">
                                <p class="leading-relaxed text-gray-700">{{ $job->skill_requirement }}</p>
                            </div>
                        </div>

                        <!-- Location Details -->
                        <div class="p-6 border border-gray-200 bg-gray-50 rounded-xl">
                            <h3 class="flex items-center mb-4 text-xl font-semibold text-gray-900">
                                <svg class="w-5 h-5 mr-2 text-red-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                Location Details
                            </h3>
                            <p class="text-gray-700">{{ $job->location_detail }}</p>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="space-y-6">
                        <!-- Document Information -->
                        <div class="p-6 border border-gray-200 rounded-xl">
                            <h3 class="flex items-center mb-4 text-lg font-semibold text-gray-900">
                                <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                                Dokumen
                            </h3>
                            <div class="space-y-3">
                                @if ($job->job_document)
                                    <a href="{{ asset('storage/' . $job->job_document) }}" target="_blank"
                                        class="inline-flex items-center px-4 py-2 text-blue-600 transition-colors duration-200 border border-blue-600 rounded-lg bir hover:bg-blue-700 hover:text-white">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                            </path>
                                        </svg>
                                        Lihat Dokumen
                                    </a>
                                @else
                                    <div class="flex items-center text-gray-500">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        No document attached
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- Salary Information -->
                        <div class="p-6 border border-gray-200 to-emerald-50 rounded-xl">
                            <h3 class="flex items-center mb-4 text-lg font-semibold text-gray-900">
                                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1">
                                    </path>
                                </svg>
                                Salary Range
                            </h3>
                            <div class="space-y-3">
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-600">Minimum</span>
                                    <span class="text-lg font-bold text-green-600">Rp
                                        {{ number_format($job->salary_min, 0, ',', '.') }}</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-600">Maximum</span>
                                    <span class="text-lg font-bold text-green-600">Rp
                                        {{ number_format($job->salary_max, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Timeline -->
                        <div class="p-6 bg-white border border-gray-200 shadow-sm rounded-xl">
                            <h3 class="flex items-center mb-4 text-lg font-semibold text-gray-900">
                                <svg viewBox="0 0 24 24" fill="none" class="w-5 h-5 mr-2 text-blue-600"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12V14C22 17.7712 22 19.6569 20.8284 20.8284C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14V12Z"
                                        stroke="currentColor" stroke-width="1.5" />
                                    <path d="M7 4V2.5" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" />
                                    <path d="M17 4V2.5" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" />
                                    <path d="M2.5 9H21.5" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" />
                                    <path
                                        d="M18 17C18 17.5523 17.5523 18 17 18C16.4477 18 16 17.5523 16 17C16 16.4477 16.4477 16 17 16C17.5523 16 18 16.4477 18 17Z"
                                        fill="currentColor" />
                                    <path
                                        d="M18 13C18 13.5523 17.5523 14 17 14C16.4477 14 16 13.5523 16 13C16 12.4477 16.4477 12 17 12C17.5523 12 18 12.4477 18 13Z"
                                        fill="currentColor" />
                                    <path
                                        d="M13 17C13 17.5523 12.5523 18 12 18C11.4477 18 11 17.5523 11 17C11 16.4477 11.4477 16 12 16C12.5523 16 13 16.4477 13 17Z"
                                        fill="currentColor" />
                                    <path
                                        d="M13 13C13 13.5523 12.5523 14 12 14C11.4477 14 11 13.5523 11 13C11 12.4477 11.4477 12 12 12C12.5523 12 13 12.4477 13 13Z"
                                        fill="currentColor" />
                                    <path
                                        d="M8 17C8 17.5523 7.55228 18 7 18C6.44772 18 6 17.5523 6 17C6 16.4477 6.44772 16 7 16C7.55228 16 8 16.4477 8 17Z"
                                        fill="currentColor" />
                                    <path
                                        d="M8 13C8 13.5523 7.55228 14 7 14C6.44772 14 6 13.5523 6 13C6 12.4477 6.44772 12 7 12C7.55228 12 8 12.4477 8 13Z"
                                        fill="currentColor" />
                                </svg>

                                Job Timeline
                            </h3>
                            <div class="space-y-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-2 h-2 bg-green-500 rounded-full"></div>
                                    <div class="flex-1 ml-3">
                                        <p class="text-sm font-medium text-gray-900">Start Date</p>
                                        <p class="text-sm text-gray-600">
                                            {{ \Carbon\Carbon::parse($job->start_date)->format('M d, Y') }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-2 h-2 bg-red-500 rounded-full"></div>
                                    <div class="flex-1 ml-3">
                                        <p class="text-sm font-medium text-gray-900">End Date</p>
                                        <p class="text-sm text-gray-600">
                                            {{ \Carbon\Carbon::parse($job->end_date)->format('M d, Y') }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center pt-4 mt-4 border-t border-gray-200">
                                    <div class="flex-shrink-0">
                                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900">Duration</p>
                                        <p class="text-sm text-gray-600">
                                            {{ \Carbon\Carbon::parse($job->start_date)->diffInDays(\Carbon\Carbon::parse($job->end_date)) }}
                                            days</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-6 bg-white border border-gray-200 shadow-sm rounded-xl">
                            <h3 class="mb-4 text-lg font-semibold text-gray-900">Quick Stats</h3>
                            <div class="space-y-3">
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-600">Pelamar</span>
                                    <span
                                        class="text-sm font-medium text-gray-900">{{ $job->jobApplications->count() }}</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-600">Status</span>
                                    @if ($job->job_status == 'Open')
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            {{ $job->job_status }}
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                            {{ $job->job_status }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Scripts -->
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/highlight.min.css') }}">
    <script src="/assets/js/highlight.min.js"></script>

    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("form", () => ({
                // highlightjs
                codeArr: [],
                toggleCode(name) {
                    if (this.codeArr.includes(name)) {
                        this.codeArr = this.codeArr.filter((d) => d != name);
                    } else {
                        this.codeArr.push(name);
                        setTimeout(() => {
                            document.querySelectorAll('pre.code').forEach(el => {
                                hljs.highlightElement(el);
                            });
                        });
                    }
                }
            }));
        });
    </script>
</x-employer.app>
