<x-customer.app>

    <div>
        <div class="flex items-center justify-between ">
            <div class="text-xl font-semibold text-gray-800">
                Registrasi Toko Baru
            </div>
            <nav class="flex items-center space-x-2 text-sm text-gray-600">
                <a href="#"
                    class="transition-colors text-primary hover:underline">Dashboard</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <a href="{{ route('customer.home.index') }}"
                    class="transition-colors text-primary hover:underline">Toko Saya</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="text-gray-800">Registrasi Toko Baru</span>
            </nav>
        </div>

        <div class="pt-5">
            <!-- Alert Section -->
            <div class="mb-0">
                @include('web.seller.alert.success')

            </div>

            <div>
                <form method="POST" action="{{ route('customer.mart-registration.store') }}" enctype="multipart/form-data"
                    class="border border-[#ebedf2] dark:border-[#191e3a] rounded-md p-4 mb-5 bg-white dark:bg-[#0e1726]">
                    @csrf
                    <h6 class="mb-5 text-lg font-bold">Informasi Toko</h6>

                    <!-- Banner Toko -->
                    <div class="mb-5">
                        <label class="block mb-2 font-medium">Banner Toko <span class="text-red-500">*</span></label>
                        <div class="relative group">
                            <div id="banner-container" class="w-full h-48 overflow-hidden rounded-lg">
                                <div id="banner-preview"
                                    class="flex items-center justify-center w-full h-full text-gray-500 bg-gray-200 border-2 border-dashed rounded-xl">
                                    <div class="text-center">
                                        <svg class="w-12 h-12 mx-auto mb-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                        </svg>
                                        <p class="text-sm">Klik untuk upload banner toko</p>
                                        <p class="text-xs text-gray-400">Format: JPG, PNG, max 2MB</p>
                                    </div>
                                </div>
                            </div>
                            <label for="banner_url"
                                class="absolute flex items-center gap-2 p-2 transition bg-blue-100 rounded-full shadow-md cursor-pointer bottom-4 right-4 group-hover:bg-blue-500 group-hover:text-white"
                                aria-label="Pilih gambar banner">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    <path
                                        d="M2 12.5001L3.75159 10.9675C4.66286 10.1702 6.03628 10.2159 6.89249 11.0721L11.1822 15.3618C11.8694 16.0491 12.9512 16.1428 13.7464 15.5839L14.0446 15.3744C15.1888 14.5702 16.7369 14.6634 17.7765 15.599L21 18.5001"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    <path
                                        d="M18.562 2.9354L18.9791 2.5183C19.6702 1.82723 20.7906 1.82723 21.4817 2.5183C22.1728 3.20937 22.1728 4.32981 21.4817 5.02087L21.0646 5.43797M18.562 2.9354C18.562 2.9354 18.6142 3.82172 19.3962 4.60378C20.1783 5.38583 21.0646 5.43797 21.0646 5.43797M18.562 2.9354L14.7275 6.76995C14.4677 7.02968 14.3379 7.15954 14.2262 7.30273C14.0945 7.47163 13.9815 7.65439 13.8894 7.84776C13.8112 8.01169 13.7532 8.18591 13.637 8.53437L13.2651 9.65M21.0646 5.43797L17.23 9.27253C16.9703 9.53225 16.8405 9.66211 16.6973 9.7738C16.5284 9.90554 16.3456 10.0185 16.1522 10.1106C15.9883 10.1888 15.8141 10.2468 15.4656 10.363L14.35 10.7349M14.35 10.7349L13.6281 10.9755C13.4567 11.0327 13.2676 10.988 13.1398 10.8602C13.012 10.7324 12.9673 10.5433 13.0245 10.3719L13.2651 9.65M14.35 10.7349L13.2651 9.65"
                                        stroke="currentColor" stroke-width="1.5" />
                                </svg>
                                <span>Pilih Gambar</span>
                            </label>
                            <input type="file" id="banner_url" name="banner_url" class="hidden" accept="image/*" required>
                        </div>
                        @error('banner_url')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                        <!-- Nama Toko -->
                        <div>
                            <label for="name">Nama Toko <span class="text-red-500">*</span></label>
                            <input id="name" name="name" type="text" value="{{ old('name') }}"
                                class="form-input @error('name') border-danger @enderror"
                                placeholder="Masukkan nama toko Anda" required />
                            @error('name')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Kategori Toko -->
                        <div>
                            <label for="mart_category_id">Kategori Toko <span class="text-red-500">*</span></label>
                            <select name="mart_category_id" required
                                class="form-select @error('mart_category_id') border-danger @enderror">
                                <option value="">Pilih Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('mart_category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('mart_category_id')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Deskripsi Toko -->
                        <div class="sm:col-span-2">
                            <label for="description">Deskripsi Toko <span class="text-red-500">*</span></label>
                            <textarea id="description" name="description" rows="4"
                                class="form-textarea @error('description') border-danger @enderror"
                                placeholder="Deskripsikan toko Anda, produk yang dijual, keunggulan, dll." required>{{ old('description') }}</textarea>
                            <p class="mt-1 text-xs text-gray-500">Minimal 50 karakter. Jelaskan dengan detail tentang toko dan produk Anda.</p>
                            @error('description')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Informasi Tambahan -->
                    <div class="p-4 mt-6 bg-blue-50 border border-blue-200 rounded-lg">
                        <h6 class="mb-2 font-semibold text-blue-800">Informasi Penting</h6>
                        <ul class="text-sm text-blue-700 list-disc list-inside space-y-1">
                            <li>Toko akan diaktifkan setelah verifikasi oleh admin</li>
                            <li>Pastikan informasi yang dimasukkan sudah benar</li>
                            <li>Banner toko akan ditampilkan di halaman utama setelah disetujui</li>
                            <li>Anda akan mendapat notifikasi melalui email setelah toko disetujui</li>
                        </ul>
                    </div>

                    <div class="flex items-center justify-between mt-8">
                        <a href="{{ route('customer.home.index') }}"
                           class="px-6 py-2 text-gray-600 transition-colors border border-gray-300 rounded-md hover:bg-gray-50">
                            Batal
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Daftarkan Toko
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('banner_url').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                // Validasi ukuran file (max 2MB)
                if (file.size > 2 * 1024 * 1024) {
                    alert('Ukuran file terlalu besar. Maksimal 2MB.');
                    this.value = '';
                    return;
                }

                // Validasi tipe file
                const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];
                if (!allowedTypes.includes(file.type)) {
                    alert('Format file tidak didukung. Gunakan JPG atau PNG.');
                    this.value = '';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewContainer = document.getElementById('banner-container');
                    let preview = document.getElementById('banner-preview');

                    // Hapus konten placeholder dan buat img element
                    preview.innerHTML = '';
                    preview.className = 'w-full h-48 overflow-hidden rounded-lg';

                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'object-cover w-full h-48 rounded-lg';
                    img.alt = 'Preview Banner Toko';

                    preview.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        });

        // Validasi form sebelum submit
        document.querySelector('form').addEventListener('submit', function(e) {
            const description = document.getElementById('description').value;
            if (description.length < 50) {
                e.preventDefault();
                alert('Deskripsi toko minimal 50 karakter.');
                document.getElementById('description').focus();
                return false;
            }
        });

        // Counter karakter untuk deskripsi
        document.getElementById('description').addEventListener('input', function() {
            const length = this.value.length;
            const parent = this.parentElement;
            let counter = parent.querySelector('.char-counter');

            if (!counter) {
                counter = document.createElement('p');
                counter.className = 'char-counter mt-1 text-xs text-gray-500';
                parent.appendChild(counter);
            }

            counter.textContent = `${length}/500 karakter`;

            if (length < 50) {
                counter.className = 'char-counter mt-1 text-xs text-red-500';
            } else {
                counter.className = 'char-counter mt-1 text-xs text-gray-500';
            }
        });
    </script>

</x-customer.app>
