<x-admin.app>

    <script src="/assets/js/simple-datatables.js"></script>

    <div class="mb-2">
         @include('web.seller.alert.success')
    </div>

    <div x-data="serviceDetail">
        <!-- Header -->
        <div class="panel flex items-center justify-between overflow-x-auto whitespace-nowrap p-3 text-primary">
            <div class="flex items-center">
                <div class="rounded-full bg-primary p-1.5 text-white ring-2 ring-primary/30 ltr:mr-3 rtl:ml-3">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5">
                        <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                        <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                        <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h5 class="font-semibold text-lg">Detail Service</h5>
            </div>

            <div class="flex items-center space-x-2">
                <a href="{{ route('admin.service.index') }}" class="btn btn-outline-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali
                </a>
            </div>
        </div>

        <!-- Service Information -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
            <!-- Service Image & Basic Info -->
            <div class="lg:col-span-1">
                <div class="panel">
                    <div class="mb-5">
                        <h6 class="text-lg font-semibold mb-3">Gambar Service</h6>
                        <div class="text-center">
                            @if($service->image_url)
                                <img src="{{ asset('storage/' . $service->image_url) }}"
                                     alt="{{ $service->title }}"
                                     class="w-full max-w-sm mx-auto rounded-lg object-cover shadow-lg">
                            @else
                                <div class="w-full max-w-sm mx-auto h-64 rounded-lg bg-gray-200 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Status Badge -->
                    <div class="text-center">
                        <span class="badge {{ $service->is_available ? 'bg-success' : 'bg-danger' }} text-lg px-4 py-2">
                            {{ $service->is_available ? 'Tersedia' : 'Tidak Tersedia' }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Service Details -->
            <div class="lg:col-span-2">
                <div class="panel">
                    <div class="mb-5">
                        <h6 class="text-lg font-semibold mb-3">Informasi Service</h6>

                        <div class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="font-semibold text-gray-700">Judul Service:</label>
                                    <p class="text-gray-900 mt-1">{{ $service->title ?? 'Tidak tersedia' }}</p>
                                </div>
                                <div>
                                    <label class="font-semibold text-gray-700">Kategori:</label>
                                    <p class="text-gray-900 mt-1">{{ $service->serviceCategory->name ?? 'Tidak ada kategori' }}</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="font-semibold text-gray-700">Harga:</label>
                                    <p class="text-green-600 font-bold text-xl mt-1">
                                        Rp {{ number_format($service->price ?? 0, 0, ',', '.') }}
                                    </p>
                                </div>
                                <div>
                                    <label class="font-semibold text-gray-700">Rating:</label>
                                    <div class="flex items-center space-x-1 mt-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                        <span class="font-semibold">{{ number_format($service->average_rating ?? 0, 1) }}</span>
                                        <span class="text-gray-500">({{ $service->review_count ?? 0 }} ulasan)</span>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="font-semibold text-gray-700">Deskripsi:</label>
                                <p class="text-gray-900 mt-1 leading-relaxed">
                                    {{ $service->description ?? 'Tidak ada deskripsi' }}
                                </p>
                            </div>

                            <div class="border-t pt-4">
                                <h6 class="font-semibold text-gray-700 mb-2">Informasi Penyedia</h6>
                                <div class="flex items-center space-x-3">
                                    @if($service->user && $service->user->profile_pic)
                                        <img src="{{ asset('storage/' . $service->user->profile_pic) }}"
                                             alt="{{ $service->user->name }}"
                                             class="w-12 h-12 rounded-full object-cover">
                                    @else
                                        <div class="w-12 h-12 rounded-full bg-gray-300 flex items-center justify-center text-gray-600 font-semibold">
                                            {{ substr($service->user->name ?? 'U', 0, 1) }}
                                        </div>
                                    @endif
                                    <div>
                                        <p class="font-semibold">{{ $service->user->name ?? 'Penyedia tidak diketahui' }}</p>
                                        <p class="text-gray-600 text-sm">{{ $service->user->email ?? 'Email tidak tersedia' }}</p>
                                        @if($service->mart)
                                            <p class="text-blue-600 text-sm font-medium">{{ $service->mart->name }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-4 text-sm text-gray-600 border-t pt-4">
                                <div>
                                    <label class="font-semibold">Dibuat:</label>
                                    <p>{{ $service->created_at->format('d M Y H:i') }}</p>
                                </div>
                                <div>
                                    <label class="font-semibold">Diperbarui:</label>
                                    <p>{{ $service->updated_at->format('d M Y H:i') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs for Reviews and Bookings -->
        <div class="panel mt-6">
            <div class="mb-5">
                <div class="border-b border-gray-200">
                    <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                        <button @click="activeTab = 'reviews'"
                                :class="activeTab === 'reviews' ? 'border-primary text-primary' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                                class="whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm">
                            Ulasan Service
                            @if($service->reviews && $service->reviews->count() > 0)
                                <span class="ml-2 bg-gray-100 text-gray-900 py-0.5 px-2.5 rounded-full text-xs">{{ $service->reviews->count() }}</span>
                            @endif
                        </button>
                        <button @click="activeTab = 'bookings'"
                                :class="activeTab === 'bookings' ? 'border-primary text-primary' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                                class="whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm">
                            Booking Service
                            @if($service->bookings && $service->bookings->count() > 0)
                                <span class="ml-2 bg-gray-100 text-gray-900 py-0.5 px-2.5 rounded-full text-xs">{{ $service->bookings->count() }}</span>
                            @endif
                        </button>
                    </nav>
                </div>
            </div>

            <!-- Reviews Tab Content -->
            <div x-show="activeTab === 'reviews'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                <table id="reviewsTable" class="table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Booking ID</th>
                            <th>Pelanggan</th>
                            <th>Rating</th>
                            <th>Komentar</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($service->reviews && $service->reviews->count() > 0)
                            @foreach($service->reviews as $key => $review)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    <span class="font-mono text-sm bg-gray-100 px-2 py-1 rounded">
                                        {{ $review->booking->booking_code ?? 'N/A' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="flex items-center space-x-2">
                                        <div class="w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center text-sm font-semibold overflow-hidden">
                                            @if ($review->user && $review->user->profile_pic)
                                                <img src="{{ asset('storage/' . $review->user->profile_pic) }}" alt="Foto Profil" class="w-full h-full object-cover">
                                            @else
                                                {{ substr($review->user->name ?? 'U', 0, 1) }}
                                            @endif
                                        </div>
                                        <div>
                                            <div class="font-medium">{{ $review->user->name ?? 'Unknown' }}</div>
                                            <div class="text-xs text-gray-500">{{ $review->user->email ?? '' }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="flex items-center space-x-1">
                                        @for($i = 1; $i <= 5; $i++)
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300' }}" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                        @endfor
                                        <span class="ml-1 text-sm font-semibold">{{ $review->rating }}/5</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="max-w-xs">
                                        <p class="text-sm text-gray-900 line-clamp-3">
                                            {{ $review->comment ?? 'Tidak ada komentar' }}
                                        </p>
                                    </div>
                                </td>
                                <td>{{ $review->created_at->format('d M Y H:i') }}</td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-center text-gray-500 py-8">
                                    <div class="flex flex-col items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-300 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                                        </svg>
                                        Belum ada ulasan untuk service ini
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <!-- Bookings Tab Content -->
            <div x-show="activeTab === 'bookings'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                <table id="bookingsTable" class="table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Booking</th>
                            <th>Pelanggan</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>Tanggal Booking</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($service->bookings && $service->bookings->count() > 0)
                            @foreach($service->bookings as $key => $booking)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    <span class="font-mono text-sm bg-blue-100 text-blue-800 px-2 py-1 rounded">
                                        {{ $booking->booking_code }}
                                    </span>
                                </td>
                                <td>
                                    <div class="flex items-center space-x-2">
                                        <div class="w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center text-sm font-semibold overflow-hidden">
                                            @if ($booking->user && $booking->user->profile_pic)
                                                <img src="{{ asset('storage/' . $booking->user->profile_pic) }}" alt="Foto Profil" class="w-full h-full object-cover">
                                            @else
                                                {{ substr($booking->user->name ?? 'U', 0, 1) }}
                                            @endif
                                        </div>
                                        <div>
                                            <div class="font-medium">{{ $booking->user->name ?? 'Unknown' }}</div>
                                            <div class="text-xs text-gray-500">{{ $booking->user->email ?? '' }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="font-semibold text-green-600">
                                        Rp {{ number_format($booking->total_price, 0, ',', '.') }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge
                                        {{ $booking->status == 'pending' ? 'bg-warning' : '' }}
                                        {{ $booking->status == 'confirmed' ? 'bg-info' : '' }}
                                        {{ $booking->status == 'completed' ? 'bg-success' : '' }}
                                        {{ $booking->status == 'cancelled' ? 'bg-danger' : '' }}">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                </td>
                                <td>{{ $booking->created_at->format('d M Y H:i') }}</td>
                                <td>
                                    <a href="#"
                                       class="btn btn-sm btn-outline-info p-2 rounded-full"
                                       title="Lihat Detail Booking">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" class="text-center text-gray-500 py-8">
                                    <div class="flex flex-col items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-300 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 8h6m-6 4h6m2-14a2 2 0 012 2v14a2 2 0 01-2 2H6a2 2 0 01-2-2V5a2 2 0 012-2z" />
                                        </svg>
                                        Belum ada booking untuk service ini
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("serviceDetail", () => ({
                activeTab: 'reviews',

                init() {
                    // Initialize DataTables after Alpine is ready
                    this.$nextTick(() => {
                        // Reviews Table
                        if (document.getElementById('reviewsTable')) {
                            const reviewsTable = new simpleDatatables.DataTable('#reviewsTable', {
                                searchable: true,
                                perPage: 10,
                                perPageSelect: [5, 10, 20],
                                labels: {
                                    placeholder: "Cari ulasan...",
                                    perPage: "{select} ulasan per halaman",
                                    noRows: "Tidak ada ulasan ditemukan",
                                    info: "Menampilkan {start} hingga {end} dari {rows} ulasan"
                                },
                                columns: [
                                    { select: 0 },
                                    { select: 1 },
                                    { select: 2 },
                                    { select: 3 },
                                    { select: 4, sortable: false },
                                    { select: 5 }
                                ]
                            });
                        }

                        // Bookings Table
                        if (document.getElementById('bookingsTable')) {
                            const bookingsTable = new simpleDatatables.DataTable('#bookingsTable', {
                                searchable: true,
                                perPage: 10,
                                perPageSelect: [5, 10, 20],
                                labels: {
                                    placeholder: "Cari booking...",
                                    perPage: "{select} booking per halaman",
                                    noRows: "Tidak ada booking ditemukan",
                                    info: "Menampilkan {start} hingga {end} dari {rows} booking"
                                },
                                columns: [
                                    { select: 0 },
                                    { select: 1 },
                                    { select: 2 },
                                    { select: 3 },
                                    { select: 4 },
                                    { select: 5 },
                                    { select: 6, sortable: false }
                                ]
                            });
                        }
                    });
                }
            }));
        });
    </script>

</x-admin.app>
