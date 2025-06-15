<x-customer.app>
    @php
        $alreadyApplied = $job->jobApplications->contains('user_id', auth()->id());
    @endphp

    <div class="min-h-screen bg-gray-50">
        <!-- Header Section -->
        <div class="bg-white border-b shadow-sm">
            <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">Detail Lowongan Pekerjaan</h1>
                        <p class="mt-2 text-sm text-gray-600">Informasi Lowongan Pekerjaan</p>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <span class="inline-flex items-center px-3 py-1 text-sm font-medium text-blue-800 ">
                            {{ $job->job_title }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-5">
            @include('web.seller.alert.success')
        </div>
        <div class="px-4 py-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if ($errors->any())
                <div id="error-alert"
                    class="p-4 my-4 transition-opacity duration-500 border border-red-200 bg-red-50 rounded-xl">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-red-400 mt-0.5 mr-3 flex-shrink-0" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <div class="flex-1">
                            <h3 class="mb-2 text-sm font-medium text-red-800">Terdapat beberapa kesalahan:</h3>
                            <ul class="space-y-1 text-sm text-red-700">
                                @foreach ($errors->all() as $error)
                                    <li class="flex items-center">
                                        <span class="w-1 h-1 mr-2 bg-red-400 rounded-full"></span>
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <script>
                    setTimeout(() => {
                        const alert = document.getElementById('error-alert');
                        if (alert) {
                            alert.style.opacity = '0';
                            setTimeout(() => alert.remove(), 500);
                        }
                    }, 2000);
                </script>
            @endif

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
                                            {{ $job->jobCategory->category_name }}
                                        </span>
                                    </div>
                                    <span class="mt-2 text-xs">Dibuat oleh: {{ $job->user->name }} Pada:
                                        {{ \Carbon\Carbon::parse($job->created_at)->format('d F Y, H:i') }}</span>
                                </div>
                            </div>
                        </div>
                        <div x-data="{ showApply: false }" class="relative">
                            <div class="flex items-center mt-6 space-x-3 lg:mt-0">
                                @if ($alreadyApplied)
                                    <button disabled
                                        class="flex items-center h-10 px-4 text-sm font-medium text-black transition-all duration-200 bg-green-400 rounded-md">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7 12.9L10.1429 16.5L18 7.5" stroke="#1C274C" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        Sudah Apply
                                    </button>
                                @else
                                    <button @click="showApply = true"
                                        class="flex items-center h-10 px-4 text-sm font-medium text-white transition-all duration-200 rounded-md bg-white/20 hover:bg-white/30 backdrop-blur-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none"
                                            stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        Apply Sekarang
                                    </button>
                                @endif
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
                            <!-- Modal -->
                            <div x-show="showApply" x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                x-transition:leave="transition ease-in duration-200"
                                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                class="fixed inset-0 z-50 flex items-center justify-center p-4 overflow-y-auto bg-black/60 backdrop-blur-sm">

                                <div @click.away="showApply = false"
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 scale-95"
                                    x-transition:enter-end="opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-200"
                                    x-transition:leave-start="opacity-100 scale-100"
                                    x-transition:leave-end="opacity-0 scale-95"
                                    class="relative w-full max-w-lg my-8 overflow-hidden bg-white shadow-2xl rounded-2xl ring-1 ring-gray-900/5">

                                    <!-- Header -->
                                    <div class="relative px-6 py-8 bg-gradient-to-r from-blue-600 to-blue-700">
                                        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60"
                                            height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg
                                            fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff"
                                            fill-opacity="0.05"%3E%3Ccircle cx="30" cy="30" r="2"
                                            /%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-30"></div>
                                        {{-- <button @click="showApply = false"
                                            class="absolute p-2 rounded-full top-4 right-4 text-white/80 hover:text-white hover:bg-white/10">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button> --}}
                                        <div class="relative">
                                            <div class="flex items-center space-x-3">
                                                <div class="p-3 bg-white/20 rounded-xl backdrop-blur-sm">
                                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h2 class="text-xl font-bold text-white">Form Lamaran</h2>
                                                    <p class="mt-1 text-sm text-blue-100">Lengkapi data untuk melamar
                                                        posisi ini</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <!-- Form Content -->
                                    <div class="px-6 py-6 max-h-[100vh] overflow-y-auto">
                                        <form action="{{ route('customer.jobApply.store') }}" method="POST"
                                            enctype="multipart/form-data" class="space-y-1">
                                            @csrf
                                            <!-- Salary Input -->
                                            <div class="space-y-2">
                                                <label for="proposed_salary"
                                                    class="flex items-center text-sm font-semibold text-gray-900">
                                                    <svg class="w-4 h-4 mr-2 text-green-600" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1">
                                                        </path>
                                                    </svg>
                                                    Gaji yang Diharapkan
                                                    <span class="ml-1 text-red-500">*</span>
                                                </label>
                                                <div class="relative">
                                                    <input type="number" name="proposed_salary" id="proposed_salary"
                                                        min="{{ $job->salary_min }}" max="{{ $job->salary_max }}"
                                                        required step="any"
                                                        class="block w-full px-4 py-3 text-gray-900 placeholder-gray-500 transition-all duration-200 border border-gray-300 shadow-sm rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent hover:border-gray-400"
                                                        placeholder="Masukkan nominal gaji Rp.">
                                                </div>
                                                <div class="flex items-center space-x-2 text-xs">
                                                    <div class="flex items-center px-2 py-1 rounded-md bg-green-50">
                                                        <span class="text-green-600">Range:
                                                            {{ number_format($job->salary_min) }} -
                                                            {{ number_format($job->salary_max) }}</span>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="job_vacancy_id"
                                                    value="{{ $job->id }}">
                                                @error('proposed_salary')
                                                    <p class="flex items-center mt-1 text-xs text-red-600">
                                                        <svg class="w-3 h-3 mr-1" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        {{ $message }}
                                                    </p>
                                                @enderror
                                            </div>

                                            <!-- CV Upload -->
                                            <div class="space-y-2">
                                                <label for="cv_document"
                                                    class="flex items-center text-sm font-semibold text-gray-900">
                                                    <svg class="w-4 h-4 mr-2 text-blue-600" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                                        </path>
                                                    </svg>
                                                    Upload CV
                                                    <span class="ml-1 text-red-500">*</span>
                                                </label>
                                                <div class="relative">
                                                    <input type="file" name="cv_document" id="cv_document"
                                                        required accept=".pdf,.doc,.docx"
                                                        class="block w-full text-sm text-gray-900 transition-all duration-200 border border-gray-300 cursor-pointer file:mr-4 file:py-3 file:px-4 file:rounded-l-xl file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 file:cursor-pointer rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                                </div>
                                                <p class="text-xs text-gray-500">Format: PDF (Max: 2MB)</p>
                                            </div>

                                            <!-- Portfolio Upload -->
                                            <div class="space-y-2">
                                                <label for="portfolio_document"
                                                    class="flex items-center text-sm font-semibold text-gray-900">
                                                    <svg class="w-4 h-4 mr-2 text-purple-600" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                                        </path>
                                                    </svg>
                                                    Upload Portofolio
                                                    <span class="ml-1 text-red-500">*</span>
                                                </label>
                                                <div class="relative">
                                                    <input type="file" name="portfolio_document"
                                                        id="portfolio_document" required
                                                        accept=".pdf,.doc,.docx,.zip,.rar"
                                                        class="block w-full text-sm text-gray-900 transition-all duration-200 border border-gray-300 cursor-pointer file:mr-4 file:py-3 file:px-4 file:rounded-l-xl file:border-0 file:text-sm file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100 file:cursor-pointer rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                                </div>
                                                <p class="text-xs text-gray-500">Format: PDF (Max:
                                                    2MB)</p>
                                            </div>

                                            <!-- Supporting Document Upload -->
                                            <div class="space-y-2">
                                                <label for="supporting_document"
                                                    class="flex items-center text-sm font-semibold text-gray-900">
                                                    <svg class="w-4 h-4 mr-2 text-gray-600" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                                        </path>
                                                    </svg>
                                                    Upload Dokumen Pendukung
                                                    <span
                                                        class="px-2 py-1 ml-2 text-xs text-gray-500 bg-gray-100 rounded-full">Opsional</span>
                                                </label>
                                                <div class="relative">
                                                    <input type="file" name="supporting_document"
                                                        id="supporting_document" accept=".pdf,.doc,.docx,.zip,.rar"
                                                        class="block w-full text-sm text-gray-900 transition-all duration-200 border border-gray-300 cursor-pointer file:mr-4 file:py-3 file:px-4 file:rounded-l-xl file:border-0 file:text-sm file:font-semibold file:bg-gray-50 file:text-gray-700 hover:file:bg-gray-100 file:cursor-pointer rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                                </div>
                                                <p class="text-xs text-gray-500">Sertifikat, ijazah, atau dokumen
                                                    lainnya Format:(Max: 2MB)</p>
                                            </div>

                                            <!-- Action Buttons -->
                                            <div class="flex flex-col gap-3 pt-6 sm:flex-row">
                                                <button type="button" @click="showApply = false"
                                                    class="flex items-center justify-center flex-1 px-6 py-3 font-semibold text-gray-700 transition-all duration-200 bg-white border-2 border-gray-300 rounded-xl hover:bg-gray-50 hover:border-gray-400 focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg>
                                                    Batal
                                                </button>
                                                <button type="submit"
                                                    class="flex items-center justify-center flex-1 px-6 py-3 font-semibold text-white transition-all duration-200 shadow-lg bg-gradient-to-r from-blue-600 to-blue-700 rounded-xl hover:from-blue-700 hover:to-blue-800 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 hover:shadow-xl">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8">
                                                        </path>
                                                    </svg>
                                                    Kirim Lamaran
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
                            <div class="p-6 border border-gray-200 rounded-xl">
                                <h3 class="flex items-center mb-4 text-lg font-semibold text-gray-900">
                                    <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1">
                                        </path>
                                    </svg>
                                    Rentang Gaji
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
                                        <span class="text-sm font-medium text-gray-900">{{ $job->jobApplications->count() }}</span>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm text-gray-600">Status</span>
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            {{ $job->job_status }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
