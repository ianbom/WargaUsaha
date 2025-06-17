<!-- Footer -->
<footer class="mt-auto text-black bg-white border-t dark:bg-gray-900 dark:text-gray-300">
    <div class="px-4 py-10 mx-auto max-w-7xl">
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-4">
            <div>
                <h2 class="mb-2 text-xl font-semibold">WargaUsaha</h2>
                <p class="text-sm">Platform kolaborasi warga dan UMKM Kabupaten Sidoarjo.</p>
            </div>
            <div>
                <h3 class="mb-2 font-semibold">Navigasi</h3>
                <ul class="space-y-1 text-sm">
                    <li><a href="/customer/home" class="hover:underline">Beranda</a></li>
                    <li><a href="{{ route('customer.home.indexProduct') }}" class="hover:underline">Produk</a></li>
                    <li><a href="{{ route('customer.home.indexJobVacancy') }}" class="hover:underline">Lowongan
                            Pekerjaan</a></li>
                    <li><a href="{{ route('customer.home.indexService') }}" class="hover:underline">Layanan Jasa</a>
                    </li>
                </ul>
            </div>
            <div>
                <h3 class="mb-2 font-semibold">Bantuan</h3>
                <ul class="space-y-1 text-sm">
                    <li><a href="https://wa.me/6285607543537?text=Halo%20Admin%2C%20saya%20ingin%20bertanya%20tentang%20layanan%20Anda."
                            class="hover:underline">Kontak Kami</a></li>
                    <li><a href="https://drive.google.com/drive/folders/1qSCtt9eavxfuOMYa0meUT_9qWHQI3DZk?usp=drive_link"
                            target="_blank" rel="noopener noreferrer" class="hover:underline">Panduan Pengguna</a></li>
                </ul>
            </div>
            <div>
                <h3 class="mb-2 font-semibold">Ikuti Kami</h3>
                <div class="flex space-x-4">
                    <a href="#" class="hover:text-blue-500" aria-label="Facebook">
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M22 12a10 10 0 10-11.6 9.9v-7h-2v-3h2v-2c0-2 1.2-3.1 3-3.1.9 0 1.8.2 1.8.2v2h-1c-1 0-1.3.6-1.3 1.2v1.8h2.4l-.4 3H13v7A10 10 0 0022 12z" />
                        </svg>
                    </a>
                    <a href="#" class="hover:text-blue-400" aria-label="Twitter">
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M22.46 6c-.77.35-1.6.58-2.46.69a4.26 4.26 0 001.88-2.35 8.55 8.55 0 01-2.7 1.03 4.26 4.26 0 00-7.3 3.88A12.09 12.09 0 013 4.8a4.26 4.26 0 001.32 5.68 4.2 4.2 0 01-1.93-.53v.05a4.26 4.26 0 003.42 4.18 4.3 4.3 0 01-1.92.07 4.26 4.26 0 003.98 2.96A8.57 8.57 0 012 19.54a12.09 12.09 0 006.56 1.92c7.88 0 12.2-6.54 12.2-12.21 0-.19 0-.38-.01-.57A8.7 8.7 0 0024 5.1a8.53 8.53 0 01-2.54.7z" />
                        </svg>
                    </a>
                    <a href="#" class="hover:text-pink-500" aria-label="Instagram">
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M7.75 2h8.5A5.75 5.75 0 0122 7.75v8.5A5.75 5.75 0 0116.25 22h-8.5A5.75 5.75 0 012 16.25v-8.5A5.75 5.75 0 017.75 2zm0 1.5A4.25 4.25 0 003.5 7.75v8.5A4.25 4.25 0 007.75 20.5h8.5a4.25 4.25 0 004.25-4.25v-8.5A4.25 4.25 0 0016.25 3.5h-8.5zM12 7a5 5 0 110 10 5 5 0 010-10zm0 1.5a3.5 3.5 0 100 7 3.5 3.5 0 000-7zm5.25-.75a1 1 0 110 2 1 1 0 010-2z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="pt-6 mt-10 text-sm text-center border-t border-gray-400">
            © <span id="footer-year">{{ date('Y') }}</span> WargaUsaha. All rights reserved.
        </div>
    </div>
</footer>
