<x-admin.app>

    <script src="/assets/js/simple-datatables.js"></script>

    <div class="mb-2">
         @include('web.admin.alert.success')
    </div>

    <div x-data="martsTable">
        <div class="panel flex items-center justify-between overflow-x-auto whitespace-nowrap p-3 text-primary">
            <div class="flex items-center">
                <div class="rounded-full bg-primary p-1.5 text-white ring-2 ring-primary/30 ltr:mr-3 rtl:ml-3">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5">
                        <path d="M3 7V17C3 18.1046 3.89543 19 5 19H19C20.1046 19 21 18.1046 21 17V7M3 7L12 2L21 7M3 7L12 12L21 7" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                        <path d="M12 12V19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </div>
                <h5 class="font-semibold text-lg">Daftar Toko</h5>
            </div>

            <a href="{{ route('admin.mart.create') }}" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Mart Baru
            </a>
        </div>

        <div class="panel mt-6">
            <table id="martsTable" class="table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Banner</th>
                        <th>Nama Mart</th>
                        <th>Kategori</th>
                        <th>Pemilik</th>
                        <th>Rating</th>
                        <th>Status Toko</th>
                        {{-- <th>Dibuat</th> --}}
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($marts as $key => $item)
                    <tr>
                        <td>
                            {{ $key + 1 }}
                        </td>
                        <td>
                            <div class="flex">
                                @if($item->banner_url)
                                    <img src="{{ asset('storage/' . $item->banner_url) }}"
                                         alt="{{ $item->name }}"
                                         class="w-12 h-12 rounded object-cover">
                                @else
                                    <div class="w-12 h-12 rounded bg-gray-200 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                        </td>
                        <td>
                            <div class="font-semibold">{{ $item->name ?? 'Nama tidak tersedia' }}</div>
                            @if($item->description)
                                <div class="text-xs text-gray-500 mt-1 line-clamp-2">{{ $item->description }}</div>
                            @endif
                        </td>
                        <td>
                            {{ $item->martCategory->name ?? 'Tidak ada kategori' }}
                        </td>
                        <td>
                            {{ $item->user->name ?? 'Tidak diketahui' }}
                        </td>
                        <td>
                            <div class="flex items-center space-x-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <span class="text-sm">{{ number_format($item->average_rating, 1) }}</span>
                                <span class="text-xs text-gray-500">({{ $item->review_count }})</span>
                            </div>
                        </td>
                        <td>
                            <span class="badge {{ $item->is_active ? 'bg-success' : 'bg-danger' }}">
                                {{ $item->is_active ? 'Aktif' : 'Non-Aktif' }}
                            </span>
                        </td>
                        {{-- <td>{{ $item->created_at->format('d M Y') }}</td> --}}
                        <td>
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('admin.mart.show', $item) }}"
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
            Alpine.data("martsTable", () => ({
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

                    const martsTable = new simpleDatatables.DataTable('#martsTable', tableOptions);

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
