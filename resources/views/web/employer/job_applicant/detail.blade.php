<x-employer.app>
    <div x-data="form">
        <!-- Header Section -->
        <div class="flex items-center justify-between ">
            <div class="text-xl font-semibold text-gray-800">
                Detail Pelamar
            </div>
            <nav class="flex items-center space-x-2 text-sm text-gray-600">
                <a href="#" class="transition-colors text-primary hover:underline">Dashboard</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <a href="{{ route('seller.product.index') }}"
                    class="transition-colors text-primary hover:underline">Pelamar</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="text-gray-800">{{ $jobApplicant->user->name }}</span>
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
        <div class="overflow-hidden bg-white shadow dark:bg-[#0e1726] rounded-2xl">
            <div class="p-6 text-white gradient-bg">
                <div class="flex items-center space-x-4">
                    <div
                        class="flex items-center justify-center w-16 h-16 overflow-hidden bg-white rounded-full bg-opacity-20">
                        <img class="object-cover w-full h-full rounded-full saturate-50 group-hover:saturate-100"
                            src="{{ asset('storage/' . $jobApplicant->user->profile_pic) }}" alt="image" />
                    </div>

                    <div>
                        <h1 class="text-2xl font-bold">{{ $jobApplicant->user->name }}</h1>
                        <p class="text-blue-100">Pelamar Kerja</p>
                    </div>
                </div>
            </div>
            <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                <h2 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">Informasi Kontak</h2>
                <div class="space-y-3">
                    <div class="flex items-center space-x-3">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span class="text-gray-700 dark:text-gray-300">{{ $jobApplicant->user->email }}</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <span class="text-gray-700 dark:text-gray-300">{{ $jobApplicant->user->phone }}</span>
                    </div>
                    <div class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-gray-500 mt-0.5" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="text-gray-700 dark:text-gray-300">{{ $jobApplicant->user->address }}</span>
                    </div>
                </div>
            </div>
            <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                <h2 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">Informasi Pekerjaan</h2>
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                    <div class="p-4 bg-white border rounded-lg border-bg-blue-50 dark:bg-blue-900/20">
                        <h3 class="mb-1 font-medium text-blue-900 dark:text-blue-300">Posisi yang Dilamar</h3>
                        <p class="text-blue-700 dark:text-blue-400">{{ $jobApplicant->jobVacancy->job_title }}</p>
                    </div>
                    <div class="p-4 bg-white border rounded-lg border-bg-green-50 dark:bg-green-900/20">
                        <h3 class="mb-1 font-medium text-green-900 dark:text-green-300">Kategori</h3>
                        <p class="text-green-700 dark:text-green-400">
                            {{ $jobApplicant->jobVacancy->jobCategory->category_name }}</p>
                    </div>
                    <div class="p-4 bg-white border rounded-lg border-bg-purple-50 dark:bg-purple-900/20">
                        <h3 class="mb-1 font-medium text-purple-900 dark:text-purple-300">Gaji yang Diajukan</h3>
                        <p class="text-purple-700 dark:text-purple-400">{{ $jobApplicant->proposed_salary }}</p>
                    </div>
                    <div class="p-4 bg-white border rounded-lg border-bg-orange-50 dark:bg-orange-900/20">
                        <h3 class="mb-1 font-medium text-orange-900 dark:text-orange-300">Status</h3>
                        <span class="inline-flex items-center px-2.5 py-0.5 ">
                            {{ $jobApplicant->status }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                <h2 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">Dokumen</h2>
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-4 rounded-lg bg-gray-50 dark:bg-gray-800">
                        <div class="flex items-center space-x-3">
                            <div
                                class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-lg dark:bg-blue-900">
                                <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h8.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-medium text-gray-900 dark:text-white">Curriculum Vitae</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Dokumen CV pelamar</p>
                            </div>
                        </div>
                        @if ($jobApplicant->cv_document)
                            <a href="{{ asset('storage/' . $jobApplicant->cv_document) }}" target="_blank"
                                class="inline-flex items-center px-4 py-2 text-blue-600 transition-colors duration-200 border border-blue-600 rounded-lg hover:bg-blue-600 hover:text-white">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                Lihat CV
                            </a>
                        @else
                            <div class="flex items-center text-gray-500">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                <span class="text-sm">Tidak ada CV</span>
                            </div>
                        @endif
                    </div>
                    <div class="flex items-center justify-between p-4 rounded-lg bg-gray-50 dark:bg-gray-800">
                        <div class="flex items-center space-x-3">
                            <div
                                class="flex items-center justify-center w-10 h-10 bg-purple-100 rounded-lg dark:bg-purple-900">
                                <svg class="w-5 h-5 text-purple-600 dark:text-purple-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-medium text-gray-900 dark:text-white">Portfolio</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Dokumen portfolio pelamar</p>
                            </div>
                        </div>
                        @if ($jobApplicant->portfolio_document)
                            <a href="{{ asset('storage/' . $jobApplicant->portfolio_document) }}" target="_blank"
                                class="inline-flex items-center px-4 py-2 text-purple-600 transition-colors duration-200 border border-purple-600 rounded-lg hover:bg-purple-600 hover:text-white">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                Lihat Portfolio
                            </a>
                        @else
                            <div class="flex items-center text-gray-500">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                <span class="text-sm">Tidak ada Portfolio</span>
                            </div>
                        @endif
                    </div>
                    <div class="flex items-center justify-between p-4 rounded-lg bg-gray-50 dark:bg-gray-800">
                        <div class="flex items-center space-x-3">
                            <div
                                class="flex items-center justify-center w-10 h-10 bg-green-100 rounded-lg dark:bg-green-900">
                                <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-medium text-gray-900 dark:text-white">Dokumen Pendukung</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Dokumen tambahan pelamar</p>
                            </div>
                        </div>
                        @if ($jobApplicant->supporting_document)
                            <a href="{{ asset('storage/' . $jobApplicant->supporting_document) }}" target="_blank"
                                class="inline-flex items-center px-4 py-2 text-green-600 transition-colors duration-200 border border-green-600 rounded-lg hover:bg-green-600 hover:text-white">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                Lihat Dokumen Pendukung
                            </a>
                        @else
                            <div class="flex items-center text-gray-500">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                <span class="text-sm">Tidak ada Dokumen Pendukung</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="p-6">
                <h2 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">Timeline</h2>
                <div class="space-y-4">
                    <div class="flex items-center space-x-4">
                        <div
                            class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full dark:bg-blue-900">
                            <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-medium text-gray-900 dark:text-white">Tanggal Melamar</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                {{ \Carbon\Carbon::parse($jobApplicant->created_at)->format('M d, Y H:i') }}</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div
                            class="flex items-center justify-center w-10 h-10 bg-green-100 rounded-full dark:bg-green-900">
                            <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-medium text-gray-900 dark:text-white">Terakhir Diperbarui</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                {{ \Carbon\Carbon::parse($jobApplicant->updated_at)->format('M d, Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #7891ff 0%, #dcefff 100%);
        }
    </style>
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
