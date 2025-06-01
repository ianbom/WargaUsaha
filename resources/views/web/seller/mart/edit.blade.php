<x-seller.app>

    <div>
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Pengaturan Toko</span>
            </li>
        </ul>
        <div class="pt-5">
            <div class="flex items-center justify-between mb-5">
                <h5 class="font-semibold text-lg dark:text-white-light">Pengaturan Toko UMKM</h5>
            </div>

            <!-- Alert Section -->
            @if (session('success'))
            <div class="alert alert-success mb-5">
                <strong>Sukses!</strong> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            @if (session('error'))
            <div class="alert alert-danger mb-5">
                <strong>Error!</strong> {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <div>
                <form method="POST" action="{{ route('seller.mart.update') }}" enctype="multipart/form-data"
                    class="border border-[#ebedf2] dark:border-[#191e3a] rounded-md p-4 mb-5 bg-white dark:bg-[#0e1726]">
                    @csrf
                    @method('PUT')

                    <h6 class="text-lg font-bold mb-5">Informasi Toko</h6>

                    <!-- Banner Toko -->
                    <div class="mb-5">
                        <label class="block mb-2 font-medium">Banner Toko</label>
                        <div class="relative group">
                            @if($mart->banner_url)
                                <img id="banner-preview"
                                     src="{{ asset('storage/' . $mart->banner_url) }}"
                                     alt="Banner Toko"
                                     class="w-full h-48 object-cover rounded-lg">
                            @else
                                <div class="bg-gray-200 border-2 border-dashed rounded-xl w-full h-48 flex items-center justify-center">
                                    <span class="text-gray-500">Belum ada banner</span>
                                </div>
                            @endif

                            <label for="banner_url" class="absolute bottom-4 right-4 bg-gray-200 rounded-full p-2 cursor-pointer group-hover:bg-primary transition">
                                <i class="ri-camera-line"></i>
                                <input type="file" id="banner_url" name="banner_url" class="hidden" accept="image/*">
                            </label>
                        </div>
                        @error('banner_url')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <!-- Nama Toko -->
                        <div>
                            <label for="name">Nama Toko</label>
                            <input id="name" name="name" type="text"
                                   value="{{ old('name', $mart->name) }}"
                                   class="form-input @error('name') border-danger @enderror" />
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Kategori Toko -->
                        <div>
                            <label for="mart_category_id">Kategori Toko</label>
                            <select name="mart_category_id" required class="form-select @error('mart_category_id') border-danger @enderror">
                                <option value="">Pilih Kategori</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('mart_category_id', $mart->mart_category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                            @error('mart_category_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Deskripsi Toko -->
                        <div class="sm:col-span-2">
                            <label for="description">Deskripsi Toko</label>
                            <textarea id="description" name="description" rows="3"
                                class="form-textarea @error('description') border-danger @enderror">{{ old('description', $mart->description) }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status Toko -->
                        <div class="mt-2">
                            <label class="block mb-2">Status Toko</label>
                            <div class="flex items-center space-x-4">
                                <label class="inline-flex items-center">
                                    <input type="radio" name="is_active" value="1"
                                        class="form-radio text-primary"
                                        {{ old('is_active', $mart->is_active) == 1 ? 'checked' : '' }}>
                                    <span class="ml-2">Aktif</span>
                                </label>
                                <label class="inline-flex items-center">
                                    <input type="radio" name="is_active" value="0"
                                        class="form-radio text-primary"
                                        {{ old('is_active', $mart->is_active) == 0 ? 'checked' : '' }}>
                                    <span class="ml-2">Tidak Aktif</span>
                                </label>
                            </div>
                            @error('is_active')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-8">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Preview image saat memilih file baru
        document.getElementById('banner_url').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('banner-preview');
                    if (preview) {
                        preview.src = e.target.result;
                    } else {
                        // Buat elemen gambar baru jika belum ada
                        const container = document.querySelector('.relative.group');
                        const img = document.createElement('img');
                        img.id = 'banner-preview';
                        img.src = e.target.result;
                        img.alt = 'Banner Preview';
                        img.className = 'w-full h-48 object-cover rounded-lg';
                        container.insertBefore(img, container.firstChild);
                    }
                }
                reader.readAsDataURL(file);
            }
        });
    </script>

</x-seller.app>
