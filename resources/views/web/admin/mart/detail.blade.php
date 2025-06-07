<x-admin.app>
    <div class="container mx-auto px-4 py-6">
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center space-x-4">
                <a href="{{ route('admin.mart.index') }}" class="text-gray-600 hover:text-gray-800">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </a>
                <h1 class="text-3xl font-bold text-gray-900">Detail Mart</h1>
            </div>
            <div class="flex space-x-2">
                <span class="px-3 py-1 text-sm rounded-full {{ $mart->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                    {{ $mart->is_active ? 'Aktif' : 'Tidak Aktif' }}
                </span>
            </div>
        </div>

        <!-- Mart Banner -->
        @if($mart->banner_url)
        <div class="mb-6">
            <img src=" {{ asset('storage/' . $mart->banner_url)  }}" alt="{{ $mart->name }}" class="w-full h-64 object-cover rounded-lg shadow-lg">
        </div>
        @endif

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Left Column - Mart & Owner Info -->
            <div class="lg:col-span-1 space-y-6">
                <!-- Mart Information -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Informasi Mart</h2>
                    <div class="space-y-3">
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Nama Mart</label>
                            <p class="text-gray-900 font-medium">{{ $mart->name ?? 'Belum diatur' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Kategori</label>
                            <p class="text-gray-900">{{ $mart->martCategory->name ?? 'Belum dikategorikan' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Deskripsi</label>
                            <p class="text-gray-900">{{ $mart->description ?? 'Tidak ada deskripsi' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Rating</label>
                            <div class="flex items-center space-x-2">
                                <div class="flex text-yellow-400">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= floor($mart->average_rating))
                                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                            </svg>
                                        @else
                                            <svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                            </svg>
                                        @endif
                                    @endfor
                                </div>
                                <span class="text-sm text-gray-600">{{ number_format($mart->average_rating, 1) }} ({{ $mart->review_count }} ulasan)</span>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Tanggal Dibuat</label>
                            <p class="text-gray-900">{{ $mart->created_at->format('d F Y H:i') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Owner Information -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Informasi Pemilik</h2>
                    <div class="space-y-3">
                        <div class="flex items-center space-x-3">
                            @if($mart->user->profile_pic)
                                <img src="{{ asset('storage/' . $mart->user->profile_pic) }} " alt="{{ $mart->user->name }}" class="w-12 h-12 rounded-full object-cover">
                            @else
                                <div class="w-12 h-12 bg-gray-300 rounded-full flex items-center justify-center">
                                    <span class="text-gray-600 font-medium">{{ substr($mart->user->name, 0, 2) }}</span>
                                </div>
                            @endif
                            <div>
                                <p class="font-medium text-gray-900">{{ $mart->user->name }}</p>
                                <p class="text-sm text-gray-600">{{ $mart->user->role }}</p>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Email</label>
                            <p class="text-gray-900">{{ $mart->user->email }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Nomor Telepon</label>
                            <p class="text-gray-900">{{ $mart->user->phone ?? 'Belum diatur' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600">Alamat</label>
                            <p class="text-gray-900">{{ $mart->user->address ?? 'Belum diatur' }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6 border border-blue-100">
                    <div class="flex justify-between items-start mb-4">
                        <h2 class="text-xl font-semibold text-gray-800 flex items-center">
                            <i class="fas fa-clipboard-check text-blue-500 mr-2"></i> Verifikasi Toko
                        </h2>
                        <span class="px-3 py-1 text-xs rounded-full {{ $mart->is_active ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                            {{ $mart->is_active ? 'Terverifikasi' : 'Belum Diverifikasi' }}
                        </span>
                    </div>

                    <div class="space-y-4">
                        <!-- Tombol Aksi -->
                        <div class="flex flex-col sm:flex-row gap-3 mt-6 pt-4 border-t border-gray-200">
                            <button

                                class="flex-1 bg-emerald-500 hover:bg-emerald-600 active:bg-emerald-700 text-white py-3 px-4 rounded-lg flex items-center justify-center transition-all duration-200 transform hover:scale-[1.02] active:scale-[0.98] shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-opacity-50">
                                <i class="fas fa-check-circle mr-2"></i> Terima Verifikasi
                            </button>
                            <button

                                class="flex-1 bg-rose-500 hover:bg-rose-600 active:bg-rose-700 text-white py-3 px-4 rounded-lg flex items-center justify-center transition-all duration-200 transform hover:scale-[1.02] active:scale-[0.98] shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-opacity-50">
                                <i class="fas fa-times-circle mr-2"></i> Tolak Verifikasi
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Products & Services -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Products Table -->
            <div x-data="productTable">

                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-semibold text-gray-800">Produk</h2>
                        <span class="text-sm text-gray-600">{{ $mart->products->count() }} produk</span>
                    </div>
                    @if($mart->products->count() > 0)
                        <div class="overflow-x-auto">
                            <table id="productTable" class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Produk</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stok</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rating</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($mart->products as $product)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}" class="w-10 h-10 rounded-lg object-cover mr-3">
                                                <div>
                                                    <div class="text-sm font-medium text-gray-900">{{ $product->name }}</div>
                                                    <div class="text-sm text-gray-500 truncate max-w-xs">{{ $product->description }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 text-xs bg-blue-100 text-blue-800 rounded-full">
                                                {{ $product->productCategory->name ?? 'Tidak ada kategori' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="text-sm text-gray-900 {{ $product->stock < 10 ? 'text-red-600 font-medium' : '' }}">
                                                {{ $product->stock }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            Rp {{ number_format($product->price, 0, ',', '.') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <svg class="w-4 h-4 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                                </svg>
                                                <span class="text-sm text-gray-600">{{ number_format($product->average_rating, 1) }}</span>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-8">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">Tidak ada produk</h3>
                            <p class="mt-1 text-sm text-gray-500">Mart ini belum memiliki produk.</p>
                        </div>
                    @endif
                </div>

            </div>
                <!-- Services Table -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-semibold text-gray-800">Layanan</h2>
                        <span class="text-sm text-gray-600">{{ $mart->user->services->count() }} layanan</span>
                    </div>

                    @if($mart->user->services->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Layanan</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rating</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($mart->user->services as $service)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <img src="{{ asset('storage/' . $service->image_url) }}" alt="{{ $service->title }}" class="w-10 h-10 rounded-lg object-cover mr-3">
                                                <div>
                                                    <div class="text-sm font-medium text-gray-900">{{ $service->title }}</div>
                                                    <div class="text-sm text-gray-500 truncate max-w-xs">{{ $service->description }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 text-xs bg-purple-100 text-purple-800 rounded-full">
                                                {{ $service->serviceCategory->name ?? 'Tidak ada kategori' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            Rp {{ number_format($service->price, 0, ',', '.') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 text-xs rounded-full {{ $service->is_available ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                {{ $service->is_available ? 'Tersedia' : 'Tidak Tersedia' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <svg class="w-4 h-4 text-yellow-400 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                                </svg>
                                                <span class="text-sm text-gray-600">{{ number_format($service->average_rating, 1) }}</span>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-8">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m8 0H8m8 0v2a2 2 0 01-2 2H10a2 2 0 01-2-2V8m8 0V6a2 2 0 00-2-2H10a2 2 0 00-2 2v2m0 0h8m-8 0v8a2 2 0 002 2h4a2 2 0 002-2V8"/>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">Tidak ada layanan</h3>
                            <p class="mt-1 text-sm text-gray-500">Pemilik mart ini belum menyediakan layanan.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


     <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("productTable", () => ({
                init() {
                    const tableOptions = {
                        searchable: true,
                        perPage: 10,
                        perPageSelect: [5, 10, 20, 50],
                        labels: {
                            placeholder: "Cari mart...",
                            perPage: "{select} mart per halaman",
                            noRows: "Tidak ada mart ditemukan",
                            info: "Menampilkan {start} hingga {end} dari {rows} mart"
                        },
                        columns: [
                            { select: 0 },
                            { select: 1, sortable: false },
                            { select: 2 },
                            { select: 3 },
                            { select: 4 },
                            { select: 5 },
                            { select: 6 },
                            { select: 7 },
                            { select: 8, sortable: false }
                        ]
                    };

                    const productTable = new simpleDatatables.DataTable('#productTable', tableOptions);

                    // Konfirmasi hapus mart
                    document.querySelectorAll('.delete-btn').forEach(button => {
                        button.addEventListener('click', function(e) {
                            e.preventDefault();
                            const form = this.closest('form');

                            Swal.fire({
                                title: 'Hapus Mart?',
                                text: "Anda tidak akan dapat mengembalikan ini!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonText: 'Ya, Hapus!',
                                cancelButtonText: 'Batal',
                                customClass: {
                                    confirmButton: 'btn btn-danger',
                                    cancelButton: 'btn btn-outline-secondary ml-2'
                                },
                                buttonsStyling: false
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    form.submit();
                                }
                            });
                        });
                    });
                }
            }));
        });
    </script>

</x-admin.app>
