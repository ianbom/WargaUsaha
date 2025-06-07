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
                                    stroke="#000" stroke-width="1.5" />
                                <circle cx="12" cy="10" r="3" stroke="#000" stroke-width="1.5" />
                            </svg>
                            Kecamatan Srengat, Kelurahan Kauman, Blitar
                        </p>
                        <p class="max-w-xl mb-8 !text-red-900 md:text-lg">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua. </p>

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
                        <div class="grid max-w-xl grid-cols-2 gap-4 sm:grid-cols-4">
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
                    <div class="flex justify-center">
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
                                <div class="absolute inset-0 bg-gradient-to-r from-green-400 to-blue-500 opacity-90">
                                </div>
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
                                class="mb-3 text-2xl font-bold text-center text-gray-900 transition-colors duration-300 group-hover:text-green-600">
                                Produk Lokal
                            </h3>
                            <p class="mb-4 text-lg leading-relaxed text-center text-gray-600">
                                Jelajahi berbagai produk berkualitas dari UMKM dan produsen lokal di sekitar Anda
                            </p>
                            <a href="{{ route('customer.home.indexProduct') }}"
                                class="inline-flex items-center gap-2 px-6 py-2 mb-4 text-lg font-medium text-purple-600 transition duration-300 bg-purple-100 rounded-full hover:bg-purple-900 hover:text-purple-900">
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
                                Lowongan Pekerjaan Freelance
                            </h3>
                            <p class="mb-4 text-lg leading-relaxed text-center text-gray-600">
                                Temukan peluang karir menarik dan proyek freelance berkualitas di daerah tinggal Anda
                            </p>
                            <a href="{{ route('customer.home.indexService') }}"
                                class="inline-flex items-center gap-2 px-6 py-2 mb-4 text-lg font-medium text-purple-600 transition duration-300 bg-purple-100 rounded-full hover:bg-purple-900 hover:text-purple-900">
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
                                Layanan Jasa Profesional
                            </h3>
                            <p class="mb-4 text-lg leading-relaxed text-gray-600">
                                Dapatkan layanan jasa profesional terpercaya dari ahli berpengalaman di wilayah Anda
                            </p>
                            <a href="{{ route('customer.home.indexService') }}"
                                class="inline-flex items-center gap-2 px-6 py-2 mb-4 text-lg font-medium text-purple-600 transition duration-300 bg-purple-100 rounded-full hover:bg-purple-900 hover:text-purple-900">
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
                        Kami berkomitmen memberikan pengalaman terbaik dengan jaminan kualitas dan kepercayaan yang telah
                        terbukti
                    </p>
                </div>
                <!-- Features Grid -->
                <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                    <div class="feature-card floating group">
                        <div class="relative p-8 bg-white shadow-lg rounded-2xl hover:shadow-xl">
                            <div class="flex items-center justify-center w-16 h-16 mx-auto mb-6 feature-icon rounded-2xl">
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
                            <div class="flex items-center justify-center w-16 h-16 mx-auto mb-6 feature-icon rounded-2xl">
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
                            <div class="flex items-center justify-center w-16 h-16 mx-auto mb-6 feature-icon rounded-2xl">
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
                            <div class="flex items-center justify-center w-16 h-16 mx-auto mb-6 feature-icon rounded-2xl">
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
                            <div class="flex items-center justify-center w-16 h-16 mx-auto mb-6 feature-icon rounded-2xl">
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
                            <div class="flex items-center justify-center w-16 h-16 mx-auto mb-6 feature-icon rounded-2xl">
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
                                Mendukung ekonomi lokal dengan menghubungkan UMKM dan masyarakat di daerah Anda.
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
                    Pertanyaan yang
                    <span class="text-gradient">Sering Diajukan</span>
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
                        <button
                            class="w-full px-8 py-6 text-left focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-inset"
                            onclick="toggleFAQ(this)">
                            <div class="flex items-center justify-between">
                                <h3 class="pr-4 text-xl font-bold text-gray-900">
                                    Bagaimana cara mendaftar sebagai penjual di platform ini?
                                </h3>
                                <svg class="flex-shrink-0 w-6 h-6 text-purple-600 faq-toggle" fill="none"
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
                        <button
                            class="w-full px-8 py-6 text-left focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-inset"
                            onclick="toggleFAQ(this)">
                            <div class="flex items-center justify-between">
                                <h3 class="pr-4 text-xl font-bold text-gray-900">
                                    Bagaimana sistem pembayaran dan keamanannya?
                                </h3>
                                <svg class="flex-shrink-0 w-6 h-6 text-purple-600 faq-toggle" fill="none"
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
                        <button
                            class="w-full px-8 py-6 text-left focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-inset"
                            onclick="toggleFAQ(this)">
                            <div class="flex items-center justify-between">
                                <h3 class="pr-4 text-xl font-bold text-gray-900">
                                    Berapa lama waktu pengiriman untuk produk lokal?
                                </h3>
                                <svg class="flex-shrink-0 w-6 h-6 text-purple-600 faq-toggle" fill="none"
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
                        <button
                            class="w-full px-8 py-6 text-left focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-inset"
                            onclick="toggleFAQ(this)">
                            <div class="flex items-center justify-between">
                                <h3 class="pr-4 text-xl font-bold text-gray-900">
                                    Bagaimana jika saya tidak puas dengan produk/jasa yang diterima?
                                </h3>
                                <svg class="flex-shrink-0 w-6 h-6 text-purple-600 faq-toggle" fill="none"
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
                        <button
                            class="w-full px-8 py-6 text-left focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-inset"
                            onclick="toggleFAQ(this)">
                            <div class="flex items-center justify-between">
                                <h3 class="pr-4 text-xl font-bold text-gray-900">
                                    Apakah bisa melakukan pemesanan dalam jumlah besar (grosir)?
                                </h3>
                                <svg class="flex-shrink-0 w-6 h-6 text-purple-600 faq-toggle" fill="none"
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
                            <a href="#"
                                class="inline-flex items-center gap-2 px-6 py-3 font-medium text-white transition-all duration-300 rounded-full bg-gradient-to-r from-purple-600 to-blue-600 hover:shadow-lg hover:scale-105">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                    </path>
                                </svg>
                                Live Chat
                            </a>
                            <a href="#"
                                class="inline-flex items-center gap-2 px-6 py-3 font-medium text-purple-600 transition-all duration-300 bg-white border-2 border-purple-600 rounded-full hover:bg-purple-50">
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
