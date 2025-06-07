<x-admin.app>

    <script src="/assets/js/simple-datatables.js"></script>

    <div class="mb-2">
         @include('web.admin.alert.success')
    </div>

    <div x-data="productsTable">
        <div class="panel flex items-center justify-between overflow-x-auto whitespace-nowrap p-3 text-primary">
            <div class="flex items-center">
                <div class="rounded-full bg-primary p-1.5 text-white ring-2 ring-primary/30 ltr:mr-3 rtl:ml-3">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5">
                        <path d="M20 7L12 3L4 7L12 11L20 7Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                        <path d="M4 7V17L12 21L20 17V7" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                        <path d="M12 11V21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </div>
                <h5 class="font-semibold text-lg">Daftar Produk</h5>
            </div>

            <a href="{{ route('admin.product.create') }}" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Produk Baru
            </a>
        </div>

        <div class="panel mt-6">
            <table id="productsTable" class="table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>Toko</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Rating</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $key => $item)
                    <tr>
                        <td>
                            {{ $key + 1 }}
                        </td>
                        <td>
                            <div class="flex">
                                @if($item->image_url)
                                    <img src="{{ asset('storage/' . $item->image_url) }}"
                                         alt="{{ $item->name }}"
                                         class="w-12 h-12 rounded object-cover">
                                @else
                                    <div class="w-12 h-12 rounded bg-gray-200 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                        </td>
                        <td>
                            <div class="font-semibold">{{ $item->name ?? 'Nama tidak tersedia' }}</div>
                            @if($item->description)
                                <div class="text-xs text-gray-500 mt-1 line-clamp-2">{{ Str::limit($item->description, 50) }}</div>
                            @endif
                        </td>
                        <td>
                            <div class="flex items-center space-x-2">
                                @if($item->mart && $item->mart->banner_url)
                                    <img src="{{ asset('storage/' . $item->mart->banner_url) }}"
                                         alt="{{ $item->mart->name }}"
                                         class="w-8 h-8 rounded-full object-cover">
                                @endif
                                <div>
                                    <div class="font-medium text-sm">{{ $item->mart->name ?? 'Toko tidak diketahui' }}</div>
                                    @if($item->mart && $item->mart->user)
                                        <div class="text-xs text-gray-500">{{ $item->mart->user->name }}</div>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td>
                            {{ $item->category->name ?? 'Tidak ada kategori' }}
                        </td>
                        <td>
                            <div class="font-semibold text-green-600">
                                Rp {{ number_format($item->price ?? 0, 0, ',', '.') }}
                            </div>
                        </td>
                        <td>
                            <span class="px-2 py-1 text-xs rounded-full {{ ($item->stock ?? 0) > 10 ? 'bg-green-100 text-green-800' : (($item->stock ?? 0) > 0 ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                {{ $item->stock ?? 0 }} unit
                            </span>
                        </td>
                        <td>
                            <div class="flex items-center space-x-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <span class="text-sm">{{ number_format($item->average_rating ?? 0, 1) }}</span>
                                <span class="text-xs text-gray-500">({{ $item->review_count ?? 0 }})</span>
                            </div>
                        </td>

                        <td>{{ $item->created_at->format('d M Y') }}</td>
                        <td>
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('admin.product.show', $item) }}"
                                   class="btn btn-sm btn-outline-info p-2 rounded-full"
                                   title="Lihat Detail">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </a>
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
                        columns: [
                            { select: 0 },
                            { select: 1, sortable: false },
                            { select: 2 },
                            { select: 3 },
                            { select: 4 },
                            { select: 5 },
                            { select: 6 },
                            { select: 7 },
                            { select: 8 },
                            { select: 9, sortable: false },

                        ]
                    };

                    const productsTable = new simpleDatatables.DataTable('#productsTable', tableOptions);


                }
            }));
        });
    </script>

</x-admin.app>
