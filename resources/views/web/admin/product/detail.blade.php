<x-admin.app>

    <script src="/assets/js/simple-datatables.js"></script>

    <div class="mb-2">
         @include('web.seller.alert.success')
    </div>

    <div x-data="productDetail">
        <!-- Header -->
        <div class="panel flex items-center justify-between overflow-x-auto whitespace-nowrap p-3 text-primary">
            <div class="flex items-center">
                <div class="rounded-full bg-primary p-1.5 text-white ring-2 ring-primary/30 ltr:mr-3 rtl:ml-3">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5">
                        <path d="M20 7L12 3L4 7L12 11L20 7Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                        <path d="M4 7V17L12 21L20 17V7" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                        <path d="M12 11V21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </div>
                <h5 class="font-semibold text-lg">Detail Produk</h5>
            </div>

            <div class="flex items-center space-x-2">

                <a href="{{ route('admin.product.index') }}" class="btn btn-outline-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali
                </a>
            </div>
        </div>

        <!-- Product Information -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
            <!-- Product Image & Basic Info -->
            <div class="lg:col-span-1">
                <div class="panel">
                    <div class="mb-5">
                        <h6 class="text-lg font-semibold mb-3">Gambar Produk</h6>
                        <div class="text-center">
                            @if($product->image_url)
                                <img src="{{ asset('storage/' . $product->image_url) }}"
                                     alt="{{ $product->name }}"
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
                        <span class="badge {{ $product->is_published ? 'bg-success' : 'bg-danger' }} text-lg px-4 py-2">
                            {{ $product->is_published ? 'Published' : 'Not-Published' }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Product Details -->
            <div class="lg:col-span-2">
                <div class="panel">
                    <div class="mb-5">
                        <h6 class="text-lg font-semibold mb-3">Informasi Produk</h6>

                        <div class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="font-semibold text-gray-700">Nama Produk:</label>
                                    <p class="text-gray-900 mt-1">{{ $product->name ?? 'Tidak tersedia' }}</p>
                                </div>
                                <div>
                                    <label class="font-semibold text-gray-700">Kategori:</label>
                                    <p class="text-gray-900 mt-1">{{ $product->category->name ?? 'Tidak ada kategori' }}</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <label class="font-semibold text-gray-700">Harga:</label>
                                    <p class="text-green-600 font-bold text-xl mt-1">
                                        Rp {{ number_format($product->price ?? 0, 0, ',', '.') }}
                                    </p>
                                    @if($product->discount_price && $product->discount_price < $product->price)
                                        <p class="text-gray-500 line-through text-sm">
                                            Rp {{ number_format($product->discount_price, 0, ',', '.') }}
                                        </p>
                                    @endif
                                </div>
                                <div>
                                    <label class="font-semibold text-gray-700">Stok:</label>
                                    <p class="mt-1">
                                        <span class="px-3 py-1 text-sm rounded-full {{ ($product->stock ?? 0) > 10 ? 'bg-green-100 text-green-800' : (($product->stock ?? 0) > 0 ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                            {{ $product->stock ?? 0 }} unit
                                        </span>
                                    </p>
                                </div>
                                <div>
                                    <label class="font-semibold text-gray-700">Rating:</label>
                                    <div class="flex items-center space-x-1 mt-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                        <span class="font-semibold">{{ number_format($product->average_rating ?? 0, 1) }}</span>
                                        <span class="text-gray-500">({{ $product->review_count ?? 0 }} ulasan)</span>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="font-semibold text-gray-700">Deskripsi:</label>
                                <p class="text-gray-900 mt-1 leading-relaxed">
                                    {{ $product->description ?? 'Tidak ada deskripsi' }}
                                </p>
                            </div>

                            <div class="border-t pt-4">
                                <h6 class="font-semibold text-gray-700 mb-2">Informasi Toko</h6>
                                <div class="flex items-center space-x-3">
                                    @if($product->mart && $product->mart->banner_url)
                                        <img src="{{ asset('storage/' . $product->mart->banner_url) }}"
                                             alt="{{ $product->mart->name }}"
                                             class="w-12 h-12 rounded-full object-cover">
                                    @endif
                                    <div>
                                        <p class="font-semibold">{{ $product->mart->name ?? 'Toko tidak diketahui' }}</p>
                                        <p class="text-gray-600 text-sm">{{ $product->mart->user->name ?? 'Pemilik tidak diketahui' }}</p>
                                        @if($product->mart)
                                            <div class="flex items-center space-x-1 mt-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                </svg>
                                                <span class="text-sm">{{ number_format($product->mart->average_rating ?? 0, 1) }}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-4 text-sm text-gray-600 border-t pt-4">
                                <div>
                                    <label class="font-semibold">Dibuat:</label>
                                    <p>{{ $product->created_at->format('d M Y H:i') }}</p>
                                </div>
                                <div>
                                    <label class="font-semibold">Diperbarui:</label>
                                    <p>{{ $product->updated_at->format('d M Y H:i') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs for Reviews and Orders -->
        <div class="panel mt-6">
            <div class="mb-5">
                <div class="border-b border-gray-200">
                    <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                        <button @click="activeTab = 'reviews'"
                                :class="activeTab === 'reviews' ? 'border-primary text-primary' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                                class="whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm">
                            Ulasan Produk
                            @if($reviews && $reviews->count() > 0)
                                <span class="ml-2 bg-gray-100 text-gray-900 py-0.5 px-2.5 rounded-full text-xs">{{ $reviews->count() }}</span>
                            @endif
                        </button>
                        <button @click="activeTab = 'orders'"
                                :class="activeTab === 'orders' ? 'border-primary text-primary' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                                class="whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm">
                            Pesanan Produk
                            @if($product->orders && $product->orders->count() > 0)
                                <span class="ml-2 bg-gray-100 text-gray-900 py-0.5 px-2.5 rounded-full text-xs">{{ $product->orders->count() }}</span>
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
                            <th>Order ID</th>
                            <th>Pembeli</th>
                            <th>Rating</th>
                            <th>Komentar</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($reviews && $reviews->count() > 0)
                            @foreach($reviews as $key => $review)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    <span class="font-mono text-sm bg-gray-100 px-2 py-1 rounded">
                                        {{ $review->order->order_code ?? 'N/A' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="flex items-center space-x-2">
                                        <div class="w-8 h-8 rounded-full border border-black text-white flex items-center justify-center text-sm font-semibold overflow-hidden">
                                            @if ($review->order->buyer->profile_pic)
                                                <img src="{{ asset('storage/' . $review->order->buyer->profile_pic) }}" alt="Foto Profil" class="w-full h-full object-cover">
                                            @else
                                                {{ substr($review->order->buyer->name ?? 'U', 0, 1) }}
                                            @endif
                                        </div>

                                        <div>
                                            <div class="font-medium">{{ $review->order->buyer->name ?? 'Unknown' }}</div>
                                            <div class="text-xs text-gray-500">{{ $review->order->buyer->email ?? '' }}</div>
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
                                        Belum ada ulasan untuk produk ini
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <!-- Orders Tab Content -->
            <div x-show="activeTab === 'orders'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                <table id="ordersTable" class="table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Order</th>
                            <th>Pembeli</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>Tanggal Order</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($product->orders && $product->orders->count() > 0)
                            @foreach($product->orders as $key => $order)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    <span class="font-mono text-sm bg-blue-100 text-blue-800 px-2 py-1 rounded">
                                        {{ $order->order_code }}
                                    </span>
                                </td>
                                <td>
                                    <div class="flex items-center space-x-2">
                                        <div class="w-8 h-8 rounded-full border border-black text-white flex items-center justify-center text-sm font-semibold overflow-hidden">
                                            @if ($review->order->buyer->profile_pic)
                                                <img src="{{ asset('storage/' . $review->order->buyer->profile_pic) }}" alt="Foto Profil" class="w-full h-full object-cover">
                                            @else
                                                {{ substr($review->order->buyer->name ?? 'U', 0, 1) }}
                                            @endif
                                        </div>
                                        <div>
                                            <div class="font-medium">{{ $order->buyer->name ?? 'Unknown' }}</div>
                                            <div class="text-xs text-gray-500">{{ $order->buyer->email ?? '' }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="font-semibold">{{ $order->quantity ?? 1 }} unit</span>
                                </td>
                                <td>
                                    <span class="font-semibold text-green-600">
                                        Rp {{ number_format($order->total_price, 0, ',', '.') }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge
                                        {{ $order->order_status == 'Pending' ? 'bg-warning' : '' }}
                                        {{ $order->order_status == 'Paid' ? 'bg-info' : '' }}
                                        {{ $order->order_status == 'Completed' ? 'bg-success' : '' }}
                                        {{ $order->order_status == 'Cancelled' ? 'bg-danger' : '' }}">
                                        {{ $order->order_status }}
                                    </span>
                                </td>
                                <td>{{ $order->created_at->format('d M Y H:i') }}</td>
                                <td>
                                    <a href="/"
                                       class="btn btn-sm btn-outline-info p-2 rounded-full"
                                       title="Lihat Detail Order">
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
                                <td colspan="8" class="text-center text-gray-500 py-8">
                                    <div class="flex flex-col items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-300 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                        </svg>
                                        Belum ada pesanan untuk produk ini
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
            Alpine.data("productDetail", () => ({
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

                        // Orders Table
                        if (document.getElementById('ordersTable')) {
                            const ordersTable = new simpleDatatables.DataTable('#ordersTable', {
                                searchable: true,
                                perPage: 10,
                                perPageSelect: [5, 10, 20],
                                labels: {
                                    placeholder: "Cari pesanan...",
                                    perPage: "{select} pesanan per halaman",
                                    noRows: "Tidak ada pesanan ditemukan",
                                    info: "Menampilkan {start} hingga {end} dari {rows} pesanan"
                                },
                                columns: [
                                    { select: 0 },
                                    { select: 1 },
                                    { select: 2 },
                                    { select: 3 },
                                    { select: 4 },
                                    { select: 5 },
                                    { select: 6 },
                                    { select: 7, sortable: false }
                                ]
                            });
                        }
                    });
                }
            }));
        });
    </script>

</x-admin.app>
