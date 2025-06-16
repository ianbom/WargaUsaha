<x-admin.app>

    <script src="/assets/js/simple-datatables.js"></script>

    <div class="mb-2">
         @include('web.admin.alert.success')
    </div>

    <div x-data="servicesTable">
        <div class="panel flex items-center justify-between overflow-x-auto whitespace-nowrap p-3 text-primary">
            <div class="flex items-center">
                <div class="rounded-full bg-primary p-1.5 text-white ring-2 ring-primary/30 ltr:mr-3 rtl:ml-3">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h5 class="font-semibold text-lg">Daftar Layanan</h5>
            </div>
        </div>

        <div class="panel mt-6">
            <table id="servicesTable" class="table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Judul Layanan</th>
                        <th>Penyedia</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Rating</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $key => $item)
                    <tr>
                        <td>
                            {{ $key + 1 }}
                        </td>
                        <td>
                            <div class="flex">
                                @if($item->image_url)
                                    <img src="{{ asset('storage/' . $item->image_url) }}"
                                         alt="{{ $item->title }}"
                                         class="w-12 h-12 rounded object-cover">
                                @else
                                    <div class="w-12 h-12 rounded bg-gray-200 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                        </td>
                        <td>
                            <div class="font-semibold">{{ $item->title ?? 'Judul tidak tersedia' }}</div>
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
                                    @if($item->mart)
                                        <div class="font-medium text-sm">{{ $item->mart->name }}</div>
                                        @if($item->mart->user)
                                            <div class="text-xs text-gray-500">{{ $item->mart->user->name }}</div>
                                        @endif
                                    @elseif($item->user)
                                        <div class="font-medium text-sm">{{ $item->user->name }}</div>
                                        <div class="text-xs text-gray-500">Individu</div>
                                    @else
                                        <div class="text-sm text-gray-500">Penyedia tidak diketahui</div>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td>
                            {{ $item->serviceCategory->name ?? 'Tidak ada kategori' }}
                        </td>
                        <td>
                            <div class="font-semibold text-green-600">
                                Rp {{ number_format($item->price ?? 0, 0, ',', '.') }}
                            </div>
                        </td>
                        <td>
                            <span class="px-2 py-1 text-xs rounded-full {{ $item->is_available ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $item->is_available ? 'Tersedia' : 'Tidak Tersedia' }}
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
                                <a href="{{ route('admin.service.show', $item) }}"
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
            Alpine.data("servicesTable", () => ({
                init() {
                    const tableOptions = {
                        searchable: true,
                        perPage: 10,
                        perPageSelect: [5, 10, 20, 50],
                        labels: {
                            placeholder: "Cari layanan...",
                            perPage: "{select} layanan per halaman",
                            noRows: "Tidak ada layanan ditemukan",
                            info: "Menampilkan {start} hingga {end} dari {rows} layanan"
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

                    const servicesTable = new simpleDatatables.DataTable('#servicesTable', tableOptions);
                }
            }));
        });
    </script>

</x-admin.app>
