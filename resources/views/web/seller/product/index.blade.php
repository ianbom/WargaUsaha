<x-seller.app>
    <script src="/assets/js/simple-datatables.js"></script>
    <div class="flex items-center justify-between ">
        <div class="text-xl font-semibold text-gray-800">
            Product
        </div>
        <nav class="flex items-center space-x-2 text-sm text-gray-600">
            <a href="#" class="transition-colors text-primary hover:underline">Dashboard</a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            <span class="text-gray-800">Product</span>
        </nav>
    </div>
    <div class="mb-5">
        @include('web.seller.alert.success')
    </div>
    <div x-data="productsTable">
        <div class="flex items-center justify-between p-3 overflow-x-auto panel whitespace-nowrap text-primary">
            <div class="flex items-center">
                <div class="rounded-full bg-primary p-1.5 text-white ring-2 ring-primary/30 ltr:mr-3 rtl:ml-3">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="h-3.5 w-3.5"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 7L4 7" stroke="#fff" stroke-width="1.5" stroke-linecap="round" />
                        <path d="M15 12L4 12" stroke="#fff" stroke-width="1.5" stroke-linecap="round" />
                        <path d="M9 17H4" stroke="#fff" stroke-width="1.5" stroke-linecap="round" />
                    </svg>
                </div>
                <h5 class="text-lg font-semibold">Daftar Produk</h5>
            </div>

            <a href="{{ route('seller.product.create') }}" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Produk Baru
            </a>
        </div>

        <div class="mt-6 panel">
            <table id="productsTable" class="table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $key => $product)
                        <tr>
                            <td>
                                {{ $key + 1 }}
                            </td>
                            <td>
                                <div class="flex">
                                    <img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}"
                                        class="object-cover w-12 h-12 rounded">
                                </div>
                            </td>
                            <td>
                                <div class="font-semibold">{{ $product->name }}</div>
                                <div class="mt-1 text-xs text-gray-500 line-clamp-2">{{ $product->description }}</div>
                            </td>
                            <td>
                                {{ $product->category->name }}
                            </td>
                            <td>
                                <span class="badge {{ $product->stock > 0 ? 'bg-success' : 'bg-danger' }}">
                                    {{ $product->stock }}
                                </span>
                            </td>
                            <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td>{{ $product->created_at->format('d M Y') }}</td>
                            <td>
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('seller.product.edit', $product->id) }}"
                                        class="p-2 rounded-full btn btn-sm btn-outline-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('seller.product.destroy', $product->id) }}" method="POST"
                                        class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                            class="p-2 rounded-full btn btn-sm btn-outline-danger delete-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("productsTable", () => ({
                init() {
                    const tableOptions = {
                        searchable: true,
                        perPage: 10,
                        perPageSelect: [5, 10, 20, 50],
                        labels: {
                            placeholder: "Cari produk...",
                            perPage: "{select} produk per halaman",
                            noRows: "Tidak ada produk ditemukan",
                            info: "Menampilkan {start} hingga {end} dari {rows} produk"
                        },
                        columns: [{
                                select: 0,
                            },
                            {
                                select: 1,
                                sortable: false
                            },
                            {
                                select: 2
                            },
                            {
                                select: 3
                            },
                            {
                                select: 4
                            },
                            {
                                select: 5
                            },
                            {
                                select: 6
                            },
                            {
                                select: 7,
                                sortable: false
                            }
                        ]
                    };

                    const productsTable = new simpleDatatables.DataTable('#productsTable',
                        tableOptions);

                    // Konfirmasi hapus produk
                    document.querySelectorAll('.delete-btn').forEach(button => {
                        button.addEventListener('click', function(e) {
                            e.preventDefault();
                            const form = this.closest('form');

                            Swal.fire({
                                title: 'Hapus Produk?',
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


</x-seller.app>
