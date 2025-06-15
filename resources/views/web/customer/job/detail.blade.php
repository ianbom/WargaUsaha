<x-customer.app>
    <div class="min-h-screen py-8 bg-gray-50">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    Riwayat Lamaran
                </h2>
                <p class="mt-1 text-sm text-gray-600">
                    Pantau lowongan yang pernah anda lamar di sini
                </p>
            </div>
            <div class="overflow-hidden bg-white shadow dark:bg-[#0e1726] rounded-2xl">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">Informasi Pekerjaan</h2>
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div class="p-4 bg-white border rounded-lg border-bg-blue-50 dark:bg-blue-900/20">
                            <h3 class="mb-1 font-medium text-blue-900 dark:text-blue-300">Posisi yang Dilamar</h3>
                            <p class="text-blue-700 dark:text-blue-400">{{ $job->jobVacancy?->job_title }}</p>
                        </div>
                        <div class="p-4 bg-white border rounded-lg border-bg-green-50 dark:bg-green-900/20">
                            <h3 class="mb-1 font-medium text-green-900 dark:text-green-300">Kategori</h3>
                            <p class="text-green-700 dark:text-green-400">
                                {{ $job->jobVacancy->jobCategory?->category_name }}</p>
                        </div>
                        <div class="p-4 bg-white border rounded-lg border-bg-purple-50 dark:bg-purple-900/20">
                            <h3 class="mb-1 font-medium text-purple-900 dark:text-purple-300">Gaji yang Diajukan</h3>
                            <p class="text-purple-700 dark:text-purple-400">{{ $job->proposed_salary }}</p>
                        </div>
                        <div class="p-4 bg-white border rounded-lg border-bg-orange-50 dark:bg-orange-900/20">
                            <h3 class="mb-1 font-medium text-orange-900 dark:text-orange-300">Status</h3>
                            <span class="inline-flex items-center">
                                @if ($job->status == 'Pending')
                                    <div class="px-2 py-1 text-center text-yellow-600 bg-yellow-100 rounded-lg">
                                        {{ $job->status }}</div>
                                @elseif ($job->status == 'Accepted')
                                    <div class="px-2 py-1 text-center text-green-600 bg-green-100 rounded-lg">
                                        {{ $job->status }}</div>
                                @else
                                    <div class="px-2 py-1 text-center text-red-600 bg-red-100 rounded-lg">
                                        {{ $job->status }}</div>
                                @endif
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
                            @if ($job->cv_document)
                                <a href="{{ asset('storage/' . $job->cv_document) }}" target="_blank"
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
                            @if ($job->portfolio_document)
                                <a href="{{ asset('storage/' . $job->portfolio_document) }}" target="_blank"
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
                            @if ($job->supporting_document)
                                <a href="{{ asset('storage/' . $job->supporting_document) }}" target="_blank"
                                    class="inline-flex items-center px-4 py-2 text-green-600 transition-colors duration-200 border border-green-600 rounded-lg hover:bg-green-600 hover:text-white">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    Lihat Dokumen Pendukung
                                </a>
                            @else
                                <div class="flex items-center text-gray-500">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
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
                                    {{ \Carbon\Carbon::parse($job->created_at)->format('M d, Y H:i') }}</p>
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
                                    {{ \Carbon\Carbon::parse($job->updated_at)->format('M d, Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-customer.app>
