<x-customer.app>
    <div class="min-h-screen bg-gray-50">
        <!-- Hero Section -->
        {{-- <div class="relative overflow-hidden text-white bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700">
            <!-- Background Pattern -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60"
                    height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none"
                    fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Ccircle cx="30"
                    cy="30" r="4" /%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
            </div>
            <div class="container relative z-10 px-4 py-20 mx-auto">
                <div class="text-center">
                    <h1
                        class="mb-6 text-5xl font-bold leading-tight text-transparent md:text-7xl bg-gradient-to-r from-white via-blue-100 to-purple-100 bg-clip-text">
                        Selamat Datang di WargaUsaha
                    </h1>
                    <p class="mb-4 text-xl font-light md:text-2xl opacity-90">
                        Kecamatan Srengat, Kelurahan Kauman, Blitar
                    </p>
                    <p class="max-w-2xl mx-auto mb-12 text-base opacity-75 md:text-lg">
                        Temukan produk berkualitas dengan harga terbaik untuk kebutuhan Anda
                    </p>

                    <!-- Enhanced Search Bar -->
                    <div class="relative max-w-lg mx-auto mb-8">
                        <form method="GET" action="{{ route('customer.home.indexProduct') }}">
                            <input type="text" name="name" value="{{ request('name') }}"
                                placeholder="Cari produk favorit Anda..."
                                class="w-full px-6 py-4 text-gray-800 transition-all duration-300 shadow-xl pr-14 rounded-2xl focus:outline-none focus:ring-4 focus:ring-white/30 backdrop-blur-sm bg-white/95">
                            <button
                                class="absolute p-2 text-gray-600 transition-all duration-200 right-3 top-3 hover:text-gray-800 hover:bg-gray-100 rounded-xl">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="m21 21-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                    <!-- Quick Stats -->
                    <div class="grid max-w-2xl grid-cols-2 gap-4 mx-auto md:grid-cols-4">
                        <div class="p-4 text-center bg-white/10 backdrop-blur-sm rounded-xl">
                            <div class="text-2xl font-bold">500+</div>
                            <div class="text-sm opacity-80">Produk</div>
                        </div>
                        <div class="p-4 text-center bg-white/10 backdrop-blur-sm rounded-xl">
                            <div class="text-2xl font-bold">1000+</div>
                            <div class="text-sm opacity-80">Pelanggan</div>
                        </div>
                        <div class="p-4 text-center bg-white/10 backdrop-blur-sm rounded-xl">
                            <div class="text-2xl font-bold">24/7</div>
                            <div class="text-sm opacity-80">Support</div>
                        </div>
                        <div class="p-4 text-center bg-white/10 backdrop-blur-sm rounded-xl">
                            <div class="text-2xl font-bold">⭐ 4.9</div>
                            <div class="text-sm opacity-80">Rating</div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="relative overflow-hidden text-black gradient-bg-hero">
            <div class="container relative z-10 px-12 pt-10 mx-auto">
                <div class="grid items-center grid-cols-1 gap-10 md:grid-cols-2">
                    <!-- Left (Text) -->
                    <div>
                        <div
                            class="inline-block px-4 py-2 mb-6 font-semibold text-white bg-indigo-500 rounded-lg text-md">
                            Solusi Terbaik untuk Anda
                        </div>
                        <h1 class="mb-6 text-5xl font-bold leading-tight text-indigo-900 md:text-6xl ">
                            Selamat Datang di <span class="text-gradient">WargaUsaha</span>
                        </h1>
                        <p class="flex items-center gap-2 mb-4 text-xl font-light md:text-2xl opacity-90">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4 10.1433C4 5.64588 7.58172 2 12 2C16.4183 2 20 5.64588 20 10.1433C20 14.6055 17.4467 19.8124 13.4629 21.6744C12.5343 22.1085 11.4657 22.1085 10.5371 21.6744C6.55332 19.8124 4 14.6055 4 10.1433Z"
                                    stroke="currentColor" stroke-width="1.5" />
                                <circle cx="12" cy="10" r="3" stroke="currentColor" stroke-width="1.5" />
                            </svg>
                            Kabupaten Sidoarjo, Jawa Timur
                        </p>
                        <p class="max-w-xl mb-8 tex-black md:text-lg">
                            Dukung usaha lokal dan temukan berbagai produk, layanan serta lowongan pekerjaan terbaik
                            dari Sidoarjo
                            untuk kebutuhan Anda. </p>

                        <!-- Search -->
                        <div class="relative max-w-xl mb-8">
                            <form method="GET" action="{{ route('customer.home.indexProduct') }}">
                                <input type="text" name="name" value="{{ request('name') }}"
                                    placeholder="Cari produk favorit Anda..."
                                    class="w-full px-6 py-4 text-gray-800 transition-all duration-300 border border-gray-100 shadow-xl pr-14 rounded-2xl focus:outline-none focus:ring-4 focus:ring-white/30 backdrop-blur-sm bg-white/95">
                                <button
                                    class="absolute p-2 text-gray-500 transition-all duration-200 right-3 top-3 hover:text-gray-800 hover:bg-gray-100 rounded-xl">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="m21 21-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>

                        <!-- Stats -->
                        <div class="grid max-w-xl grid-cols-2 gap-4 py-5 sm:grid-cols-4">
                            <div class="p-4 text-center bg-white/50 backdrop-blur-sm rounded-xl">
                                <div class="text-2xl font-bold text-primary">500+</div>
                                <div class="text-sm opacity-80 text-primary">Produk</div>
                            </div>
                            <div class="p-4 text-center bg-white/50 backdrop-blur-sm rounded-xl">
                                <div class="text-2xl font-bold text-primary">1000+</div>
                                <div class="text-sm opacity-80 text-primary">Pelanggan</div>
                            </div>
                            <div class="p-4 text-center bg-white/50 backdrop-blur-sm rounded-xl">
                                <div class="text-2xl font-bold text-primary">24/7</div>
                                <div class="text-sm opacity-80 text-primary">Support</div>
                            </div>
                            <div class="p-4 text-center bg-white/50 backdrop-blur-sm rounded-xl">
                                <div class="text-2xl font-bold text-primary">⭐ 4.9</div>
                                <div class="text-sm opacity-80 text-primary">Rating</div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center hidden sm:flex">
                        <img src="{{ asset('assets/images/hero-section1.png') }}" alt="Hero Image"
                            class="h-auto max-w-full drop-shadow-xl rounded-3xl">
                    </div>
                </div>
            </div>
        </div>

        <!-- Portal Section -->
        <div class="container relative px-10 py-16 mx-auto lg:px-10">
            <!-- Header Section -->
            <div class="mb-16 text-center">
                <div class="inline-block px-4 py-2 mb-6 text-sm font-medium text-purple-600 bg-purple-100 rounded-full">
                    ✨ Layanan Terbaik Kami
                </div>
                <h2 class="mb-6 text-4xl font-bold text-gray-900 lg:text-5xl">
                    Temukan
                    <span class="text-gradient">Layanan</span>
                    <br>yang Anda Butuhkan
                </h2>
                <p class="max-w-3xl mx-auto text-lg leading-relaxed text-gray-600">
                    Jelajahi berbagai layanan berkualitas tinggi yang dirancang khusus untuk memenuhi kebutuhan Anda di
                    daerah setempat
                </p>
            </div>
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                <!-- product -->
                <div class="service-card floating group">
                    <div class="relative overflow-hidden bg-white shadow-lg rounded-2xl glow">
                        <div class="shimmer">
                            <div class="relative overflow-hidden h-1/2">
                                {{-- <div class="absolute inset-0 bg-gradient-to-r from-green-400 to-blue-500 opacity-90">
                                </div> --}}
                                <div class="flex items-center justify-center h-full">
                                    <div class="p-4 icon-container rounded-2xl">
                                        <img src="{{ asset('assets/images/product-section.png') }}" alt="Gambar Servis"
                                            class="object-contain text-white " />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-6 text-center">
                            <h3
                                class="mb-3 text-2xl font-bold text-center text-gray-900 transition-colors duration-300 group-hover:text-purple-600">
                                Produk Lokal
                            </h3>
                            <p class="mb-4 text-lg leading-relaxed text-center text-gray-600">
                                Jelajahi berbagai produk berkualitas dari UMKM dan produsen lokal di sekitar Anda
                            </p>
                            <a href="{{ route('customer.home.indexProduct') }}"
                                class="inline-flex items-center gap-2 px-6 py-2 mb-4 text-lg font-medium text-purple-600 transition duration-300 bg-purple-100 rounded-full hover:bg-purple-500 hover:text-purple-100">
                                Jelajahi Sekarang
                                <svg class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0L17 8.586a1 1 0 010 1.414l-5.293 5.293a1 1 0 01-1.414-1.414L14.586 10H4a1 1 0 110-2h10.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Job -->
                <div class="service-card floating group">
                    <div class="relative overflow-hidden bg-white shadow-lg rounded-2xl glow">
                        <div class="shimmer">
                            <div class="relative overflow-hidden h-1/2">
                                <div class="flex items-center justify-center h-full">
                                    <div class="p-4 icon-container rounded-2xl">
                                        <img src="{{ asset('assets/images/job-section.png') }}" alt="Gambar Servis"
                                            class="object-contain text-white" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-6 text-center">
                            <h3
                                class="mb-3 text-2xl font-bold text-center text-gray-900 transition-colors duration-300 group-hover:text-purple-600">
                                Lowongan Pekerjaan
                            </h3>
                            <p class="mb-4 text-lg leading-relaxed text-center text-gray-600">
                                Temukan peluang karir menarik dan proyek freelance berkualitas di daerah tinggal Anda
                            </p>
                            <a href="{{ route('customer.home.indexService') }}"
                                class="inline-flex items-center gap-2 px-6 py-2 mb-4 text-lg font-medium text-purple-600 transition duration-300 bg-purple-100 rounded-full hover:bg-purple-500 hover:text-purple-100">
                                Jelajahi Sekarang
                                <svg class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0L17 8.586a1 1 0 010 1.414l-5.293 5.293a1 1 0 01-1.414-1.414L14.586 10H4a1 1 0 110-2h10.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Service -->
                <div class="service-card floating group">
                    <div class="relative overflow-hidden bg-white shadow-lg rounded-2xl glow">
                        <div class="shimmer">
                            <div class="relative overflow-hidden h-1/2">
                                <div class="flex items-center justify-center h-full">
                                    <div class="p-4 icon-container rounded-2xl">
                                        <img src="{{ asset('assets/images/service-section.png') }}"
                                            alt="Gambar Servis" class="object-contain text-white" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-6 text-center">
                            <h3
                                class="mb-3 text-2xl font-bold text-gray-900 transition-colors duration-300 group-hover:text-purple-600">
                                Layanan Jasa
                            </h3>
                            <p class="mb-4 text-lg leading-relaxed text-gray-600">
                                Dapatkan layanan jasa profesional terpercaya dari ahli berpengalaman di wilayah Anda
                            </p>
                            <a href="{{ route('customer.home.indexService') }}"
                                class="inline-flex items-center gap-2 px-6 py-2 mb-4 text-lg font-medium text-purple-600 transition duration-300 bg-purple-100 rounded-full hover:bg-purple-500 hover:text-purple-100">
                                Jelajahi Sekarang
                                <svg class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0L17 8.586a1 1 0 010 1.414l-5.293 5.293a1 1 0 01-1.414-1.414L14.586 10H4a1 1 0 110-2h10.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="relative w-full bg-gradient-to-br from-blue-100 via-purple-100 to-indigo-100">

            <div class="container relative px-10 py-16 mx-auto lg:px-10">

                <div class="mb-16 text-center">
                    <h2 class="mb-6 text-4xl font-bold text-gray-900 lg:text-5xl">
                        Keunggulan
                        <span class="text-gradient">Layanan</span>
                        <br>yang Kami Tawarkan
                    </h2>
                    <p class="max-w-3xl mx-auto text-lg leading-relaxed text-gray-600">
                        Kami berkomitmen memberikan pengalaman terbaik dengan jaminan kualitas dan kepercayaan yang
                        telah
                        terbukti
                    </p>
                </div>
                <!-- Features Grid -->
                <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                    <div class="feature-card floating group">
                        <div class="relative p-8 bg-white shadow-lg rounded-2xl hover:shadow-xl">
                            <div
                                class="flex items-center justify-center w-16 h-16 mx-auto mb-6 feature-icon rounded-2xl">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="mb-4 text-xl font-bold text-center text-gray-900 group-hover:text-purple-600">
                                100% Barang Asli
                            </h3>
                            <p class="leading-relaxed text-center text-gray-600">
                                Semua produk dijamin original dengan sertifikat keaslian. Tidak ada barang palsu atau
                                tiruan.
                            </p>
                        </div>
                    </div>
                    <div class="feature-card floating group">
                        <div class="relative p-8 bg-white shadow-lg rounded-2xl hover:shadow-xl">
                            <div
                                class="flex items-center justify-center w-16 h-16 mx-auto mb-6 feature-icon rounded-2xl">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="mb-4 text-xl font-bold text-center text-gray-900 group-hover:text-purple-600">
                                Penjual Terpercaya
                            </h3>
                            <p class="leading-relaxed text-center text-gray-600">
                                Semua penjual telah terverifikasi dan memiliki rating tinggi dengan track record yang
                                terbukti.
                            </p>
                        </div>
                    </div>
                    <div class="feature-card floating group">
                        <div class="relative p-8 bg-white shadow-lg rounded-2xl hover:shadow-xl">
                            <div
                                class="flex items-center justify-center w-16 h-16 mx-auto mb-6 feature-icon rounded-2xl">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <h3 class="mb-4 text-xl font-bold text-center text-gray-900 group-hover:text-purple-600">
                                Pengiriman Cepat
                            </h3>
                            <p class="leading-relaxed text-center text-gray-600">
                                Layanan pengiriman express dengan estimasi waktu yang akurat dan tracking real-time.
                            </p>
                        </div>
                    </div>
                    <div class="feature-card floating group">
                        <div class="relative p-8 bg-white shadow-lg rounded-2xl hover:shadow-xl">
                            <div
                                class="flex items-center justify-center w-16 h-16 mx-auto mb-6 feature-icon rounded-2xl">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="mb-4 text-xl font-bold text-center text-gray-900 group-hover:text-purple-600">
                                Dukungan 24/7
                            </h3>
                            <p class="leading-relaxed text-center text-gray-600">
                                Tim customer service siap membantu Anda kapan saja, 24 jam sehari 7 hari seminggu.
                            </p>
                        </div>
                    </div>
                    <div class="feature-card floating group">
                        <div class="relative p-8 bg-white shadow-lg rounded-2xl hover:shadow-xl">
                            <div
                                class="flex items-center justify-center w-16 h-16 mx-auto mb-6 feature-icon rounded-2xl">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="mb-4 text-xl font-bold text-center text-gray-900 group-hover:text-purple-600">
                                Garansi Uang Kembali
                            </h3>
                            <p class="leading-relaxed text-center text-gray-600">
                                Jaminan 100% uang kembali jika tidak puas dengan produk atau layanan yang diterima.
                            </p>
                        </div>
                    </div>
                    <div class="feature-card floating group">
                        <div class="relative p-8 bg-white shadow-lg rounded-2xl hover:shadow-xl">
                            <div
                                class="flex items-center justify-center w-16 h-16 mx-auto mb-6 feature-icon rounded-2xl">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="mb-4 text-xl font-bold text-center text-gray-900 group-hover:text-purple-600">
                                Komunitas Lokal
                            </h3>
                            <p class="leading-relaxed text-center text-gray-600">
                                Mendukung UMKM Lokal dan masyarakat di daerah Anda.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container relative px-10 py-16 mx-auto lg:px-10">
            <!-- Header Section -->
            <div class="mb-16 text-center">
                <div
                    class="inline-block px-4 py-2 mb-6 text-sm font-medium text-purple-600 bg-purple-100 rounded-full">
                    Butuh Bantuan ❓
                </div>
                <h2 class="mb-6 text-4xl font-bold text-gray-900 lg:text-5xl">
                    <span class="text-gradient">Pertanyaan</span> yang Sering Diajukan
                </h2>
                <p class="max-w-3xl mx-auto text-lg leading-relaxed text-gray-600">
                    Temukan jawaban atas pertanyaan umum tentang layanan kami. Jika tidak menemukan jawaban yang dicari,
                    silakan hubungi tim support kami.
                </p>
            </div>

            <div class="max-w-4xl mx-auto">
                <div class="space-y-6">
                    <!-- FAQ 1 -->
                    <div class="overflow-hidden bg-white shadow-lg faq-item floating rounded-2xl">
                        <button class="w-full px-8 py-6 text-left focus:outline-none" onclick="toggleFAQ(this)">
                            <div class="flex items-center justify-between">
                                <h3 class="pr-4 text-xl font-bold text-gray-900">
                                    Bagaimana cara mendaftar sebagai penjual di platform ini?
                                </h3>
                                <svg class="flex-shrink-0 w-6 h-6 text-black faq-toggle" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="px-8 text-lg leading-relaxed text-gray-600 faq-content bg-blue-50">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                                sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                                est laborum.</p>
                        </div>
                    </div>
                    <!-- FAQ 2 -->
                    <div class="overflow-hidden bg-white shadow-lg faq-item floating rounded-2xl">
                        <button class="w-full px-8 py-6 text-left focus:outline-none" onclick="toggleFAQ(this)">
                            <div class="flex items-center justify-between">
                                <h3 class="pr-4 text-xl font-bold text-gray-900">
                                    Bagaimana sistem pembayaran dan keamanannya?
                                </h3>
                                <svg class="flex-shrink-0 w-6 h-6 text-black faq-toggle" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="px-8 text-lg leading-relaxed text-gray-600 faq-content bg-blue-50">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                                sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                                est laborum.</p>
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="overflow-hidden bg-white shadow-lg faq-item floating rounded-2xl">
                        <button class="w-full px-8 py-6 text-left focus:outline-none" onclick="toggleFAQ(this)">
                            <div class="flex items-center justify-between">
                                <h3 class="pr-4 text-xl font-bold text-gray-900">
                                    Berapa lama waktu pengiriman untuk produk lokal?
                                </h3>
                                <svg class="flex-shrink-0 w-6 h-6 text-black faq-toggle" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="px-8 text-lg leading-relaxed text-gray-600 faq-content bg-blue-50">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                                sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                                est laborum.</p>
                        </div>
                    </div>

                    <!-- FAQ 4 -->
                    <div class="overflow-hidden bg-white shadow-lg faq-item floating rounded-2xl">
                        <button class="w-full px-8 py-6 text-left focus:outline-none " onclick="toggleFAQ(this)">
                            <div class="flex items-center justify-between">
                                <h3 class="pr-4 text-xl font-bold text-gray-900">
                                    Bagaimana jika saya tidak puas dengan produk/jasa yang diterima?
                                </h3>
                                <svg class="flex-shrink-0 w-6 h-6 text-black faq-toggle" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="px-8 text-lg leading-relaxed text-gray-600 faq-content bg-blue-50">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                                sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                                est laborum.</p>
                        </div>
                    </div>
                    <!-- FAQ 5 -->
                    <div class="overflow-hidden bg-white shadow-lg faq-item floating rounded-2xl">
                        <button class="w-full px-8 py-6 text-left focus:outline-none" onclick="toggleFAQ(this)">
                            <div class="flex items-center justify-between">
                                <h3 class="pr-4 text-xl font-bold text-gray-900">
                                    Apakah bisa melakukan pemesanan dalam jumlah besar (grosir)?
                                </h3>
                                <svg class="flex-shrink-0 w-6 h-6 text-black faq-toggle" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </button>
                        <div class="px-8 text-lg leading-relaxed text-gray-600 faq-content bg-blue-50">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                                reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                                sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
                                est laborum.</p>
                        </div>
                    </div>

                </div>

                <!-- Contact Support Section -->
                <div class="mt-16 text-center">
                    <div class="p-8 shadow-lg gradient-bg rounded-2xl">
                        <h3 class="mb-4 text-3xl font-bold text-white">
                            Masih Ada Pertanyaan?
                        </h3>
                        <p class="mb-6 leading-relaxed text-white">
                            Tim customer service kami siap membantu Anda 24/7
                        </p>
                        <div class="flex flex-col items-center justify-center gap-4 sm:flex-row">
                            <a href="https://wa.me/6285607543537?text=Halo%20Admin%2C%20saya%20ingin%20bertanya%20tentang%20layanan%20Anda."
                                target="_blank" rel="noopener noreferrer"
                                class="inline-flex items-center gap-2 px-6 py-3 font-medium text-white transition-all duration-300 rounded-full hover:border hover:scale-105">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5">
                                    <path
                                        d="M13.0867 21.3877L13.7321 21.7697L13.0867 21.3877ZM13.6288 20.4718L12.9833 20.0898L13.6288 20.4718ZM10.3712 20.4718L9.72579 20.8539H9.72579L10.3712 20.4718ZM10.9133 21.3877L11.5587 21.0057L10.9133 21.3877ZM2.3806 15.9134L3.07351 15.6264V15.6264L2.3806 15.9134ZM7.78958 18.9915L7.77666 19.7413L7.78958 18.9915ZM5.08658 18.6194L4.79957 19.3123H4.79957L5.08658 18.6194ZM21.6194 15.9134L22.3123 16.2004V16.2004L21.6194 15.9134ZM16.2104 18.9915L16.1975 18.2416L16.2104 18.9915ZM18.9134 18.6194L19.2004 19.3123H19.2004L18.9134 18.6194ZM19.6125 2.7368L19.2206 3.37628L19.6125 2.7368ZM21.2632 4.38751L21.9027 3.99563V3.99563L21.2632 4.38751ZM4.38751 2.7368L3.99563 2.09732V2.09732L4.38751 2.7368ZM2.7368 4.38751L2.09732 3.99563H2.09732L2.7368 4.38751ZM9.40279 19.2098L9.77986 18.5615L9.77986 18.5615L9.40279 19.2098ZM13.7321 21.7697L14.2742 20.8539L12.9833 20.0898L12.4412 21.0057L13.7321 21.7697ZM9.72579 20.8539L10.2679 21.7697L11.5587 21.0057L11.0166 20.0898L9.72579 20.8539ZM12.4412 21.0057C12.2485 21.3313 11.7515 21.3313 11.5587 21.0057L10.2679 21.7697C11.0415 23.0767 12.9585 23.0767 13.7321 21.7697L12.4412 21.0057ZM10.5 2.75H13.5V1.25H10.5V2.75ZM21.25 10.5V11.5H22.75V10.5H21.25ZM2.75 11.5V10.5H1.25V11.5H2.75ZM1.25 11.5C1.25 12.6546 1.24959 13.5581 1.29931 14.2868C1.3495 15.0223 1.45323 15.6344 1.68769 16.2004L3.07351 15.6264C2.92737 15.2736 2.84081 14.8438 2.79584 14.1847C2.75041 13.5189 2.75 12.6751 2.75 11.5H1.25ZM7.8025 18.2416C6.54706 18.2199 5.88923 18.1401 5.37359 17.9265L4.79957 19.3123C5.60454 19.6457 6.52138 19.7197 7.77666 19.7413L7.8025 18.2416ZM1.68769 16.2004C2.27128 17.6093 3.39066 18.7287 4.79957 19.3123L5.3736 17.9265C4.33223 17.4951 3.50486 16.6678 3.07351 15.6264L1.68769 16.2004ZM21.25 11.5C21.25 12.6751 21.2496 13.5189 21.2042 14.1847C21.1592 14.8438 21.0726 15.2736 20.9265 15.6264L22.3123 16.2004C22.5468 15.6344 22.6505 15.0223 22.7007 14.2868C22.7504 13.5581 22.75 12.6546 22.75 11.5H21.25ZM16.2233 19.7413C17.4786 19.7197 18.3955 19.6457 19.2004 19.3123L18.6264 17.9265C18.1108 18.1401 17.4529 18.2199 16.1975 18.2416L16.2233 19.7413ZM20.9265 15.6264C20.4951 16.6678 19.6678 17.4951 18.6264 17.9265L19.2004 19.3123C20.6093 18.7287 21.7287 17.6093 22.3123 16.2004L20.9265 15.6264ZM13.5 2.75C15.1512 2.75 16.337 2.75079 17.2619 2.83873C18.1757 2.92561 18.7571 3.09223 19.2206 3.37628L20.0044 2.09732C19.2655 1.64457 18.4274 1.44279 17.4039 1.34547C16.3915 1.24921 15.1222 1.25 13.5 1.25V2.75ZM22.75 10.5C22.75 8.87781 22.7508 7.6085 22.6545 6.59611C22.5572 5.57256 22.3554 4.73445 21.9027 3.99563L20.6237 4.77938C20.9078 5.24291 21.0744 5.82434 21.1613 6.73809C21.2492 7.663 21.25 8.84876 21.25 10.5H22.75ZM19.2206 3.37628C19.7925 3.72672 20.2733 4.20752 20.6237 4.77938L21.9027 3.99563C21.4286 3.22194 20.7781 2.57144 20.0044 2.09732L19.2206 3.37628ZM10.5 1.25C8.87781 1.25 7.6085 1.24921 6.59611 1.34547C5.57256 1.44279 4.73445 1.64457 3.99563 2.09732L4.77938 3.37628C5.24291 3.09223 5.82434 2.92561 6.73809 2.83873C7.663 2.75079 8.84876 2.75 10.5 2.75V1.25ZM2.75 10.5C2.75 8.84876 2.75079 7.663 2.83873 6.73809C2.92561 5.82434 3.09223 5.24291 3.37628 4.77938L2.09732 3.99563C1.64457 4.73445 1.44279 5.57256 1.34547 6.59611C1.24921 7.6085 1.25 8.87781 1.25 10.5H2.75ZM3.99563 2.09732C3.22194 2.57144 2.57144 3.22194 2.09732 3.99563L3.37628 4.77938C3.72672 4.20752 4.20752 3.72672 4.77938 3.37628L3.99563 2.09732ZM11.0166 20.0898C10.8136 19.7468 10.6354 19.4441 10.4621 19.2063C10.2795 18.9559 10.0702 18.7304 9.77986 18.5615L9.02572 19.8582C9.07313 19.8857 9.13772 19.936 9.24985 20.0898C9.37122 20.2564 9.50835 20.4865 9.72579 20.8539L11.0166 20.0898ZM7.77666 19.7413C8.21575 19.7489 8.49387 19.7545 8.70588 19.7779C8.90399 19.7999 8.98078 19.832 9.02572 19.8582L9.77986 18.5615C9.4871 18.3912 9.18246 18.3215 8.87097 18.287C8.57339 18.2541 8.21375 18.2487 7.8025 18.2416L7.77666 19.7413ZM14.2742 20.8539C14.4916 20.4865 14.6287 20.2564 14.7501 20.0898C14.8622 19.936 14.9268 19.8857 14.9742 19.8582L14.2201 18.5615C13.9298 18.7304 13.7204 18.9559 13.5379 19.2063C13.3646 19.4441 13.1864 19.7468 12.9833 20.0898L14.2742 20.8539ZM16.1975 18.2416C15.7862 18.2487 15.4266 18.2541 15.129 18.287C14.8175 18.3215 14.5129 18.3912 14.2201 18.5615L14.9742 19.8582C15.0192 19.832 15.096 19.7999 15.2941 19.7779C15.5061 19.7545 15.7842 19.7489 16.2233 19.7413L16.1975 18.2416Z"
                                        fill="#fff" />
                                    <path
                                        d="M9 11C9 11.5523 8.55228 12 8 12C7.44772 12 7 11.5523 7 11C7 10.4477 7.44772 10 8 10C8.55228 10 9 10.4477 9 11Z"
                                        fill="#fff" />
                                    <path
                                        d="M13 11C13 11.5523 12.5523 12 12 12C11.4477 12 11 11.5523 11 11C11 10.4477 11.4477 10 12 10C12.5523 10 13 10.4477 13 11Z"
                                        fill="#fff" />
                                    <path
                                        d="M17 11C17 11.5523 16.5523 12 16 12C15.4477 12 15 11.5523 15 11C15 10.4477 15.4477 10 16 10C16.5523 10 17 10.4477 17 11Z"
                                        fill="#fff" />
                                </svg>

                                WA Admin
                            </a>

                            <a href="#"
                                class="inline-flex items-center gap-2 px-6 py-3 font-medium text-purple-700 transition-all duration-300 bg-white rounded-full hover:border hover:scale-105">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                                Email Kami
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Custom Styles for line-clamp -->
    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .gradient-bg-hero {
            background: linear-gradient(135deg, #b1cff8 0%, #e7cffd 70%, #e7e9f5 100%);
        }


        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .service-card {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .service-card:hover {
            transform: translateY(-15px) scale(1.02);
        }

        .glow {
            box-shadow: 0 0 30px rgba(102, 126, 234, 0.3);
        }

        .text-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* .shimmer {
            position: relative;
            overflow: hidden;
        }

        .shimmer::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: left 0.6s;
        }

        .shimmer:hover::before {
            left: 100%;
        } */

        .feature-card {
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .feature-icon {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
        }

        .feature-card:hover .feature-icon {
            transform: scale(1.1);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        .faq-item {
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .faq-item:hover {
            border-color: #e5e7eb;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .faq-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out, padding 0.3s ease-out;
        }

        .faq-content.active {
            max-height: 200px;
            padding-top: 1rem;
            padding-bottom: 1rem;
        }

        .faq-toggle {
            transition: transform 0.3s ease;
        }

        .faq-toggle.active {
            transform: rotate(180deg);
        }
    </style>
    <script>
        // function buat toggle
        function toggleFAQ(button) {
            const faqItem = button.parentElement;
            const content = faqItem.querySelector('.faq-content');
            const toggle = button.querySelector('.faq-toggle');
            // Nutup
            const allFaqItems = document.querySelectorAll('.faq-item');
            allFaqItems.forEach(item => {
                if (item !== faqItem) {
                    const otherContent = item.querySelector('.faq-content');
                    const otherToggle = item.querySelector('.faq-toggle');
                    otherContent.classList.remove('active');
                    otherToggle.classList.remove('active');
                }
            });
            // Toggle
            content.classList.toggle('active');
            toggle.classList.toggle('active');
        }
    </script>
</x-customer.app>
