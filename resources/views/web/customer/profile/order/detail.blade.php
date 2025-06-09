<x-customer.app>
    <div class="min-h-screen py-4 bg-gray-50">
        <div class="max-w-6xl px-10 mx-auto sm:px-6 lg:px-8 ">
            <!-- Header -->
            <div class="mb-8">
                <div class="flex items-center justify-between">
                    <div>
                        <a href="/"
                            class="inline-flex items-center mb-2 text-sm text-gray-500 hover:text-gray-700">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7"></path>
                            </svg>
                            Kembali ke Riwayat Group Order
                        </a>
                        <h1 class="text-3xl font-bold text-gray-900">Detail Group Order</h1>
                        <p class="mt-2 text-gray-600">{{ $groupOrder->group_code }}</p>
                    </div>

                    <!-- Status Badge -->
                    <div class="text-right">
                        @switch($groupOrder->status)
                            @case('Pending')
                                <span
                                    class="inline-flex items-center px-3 py-1 text-sm font-medium text-yellow-800 bg-yellow-100 rounded-full">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Menunggu Pembayaran
                                </span>
                            @break

                            @case('Paid')
                                <span
                                    class="inline-flex items-center px-3 py-1 text-sm font-medium text-blue-800 bg-blue-100 rounded-full">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Sudah Dibayar
                                </span>
                            @break

                            @case('Processing')
                                <span
                                    class="inline-flex items-center px-3 py-1 text-sm font-medium text-blue-800 bg-blue-100 rounded-full">
                                    <svg class="w-4 h-4 mr-2 animate-spin" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v1m6.364 1.636l-.707.707M20 12h-1M18.364 18.364l-.707-.707M12 20v-1m-6.364-1.636l.707-.707M4 12h1m1.636-6.364l.707.707" />
                                    </svg>
                                    Sedang Diproses
                                </span>
                            @break

                            @case('Completed')
                                <span
                                    class="inline-flex items-center px-3 py-1 text-sm font-medium text-green-800 bg-green-100 rounded-full">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Selesai
                                </span>
                            @break

                            @case('Cancelled')
                                <span
                                    class="inline-flex items-center px-3 py-1 text-sm font-medium text-red-700 border border-red-200 rounded-full bg-red-50">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    Dibatalkan
                                </span>
                            @break
                        @endswitch
                        <div class="mt-1 text-sm text-gray-500">
                            Dibuat: {{ $groupOrder->created_at->format('d M Y, H:i') }}
                        </div>
                        <div class="text-sm text-gray-500">
                            {{ $groupOrder->orders->count() }} Pesanan
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
                <!-- Main Content -->
                <div class="space-y-6 lg:col-span-2">
                    <!-- Group Order Summary -->
                   <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="flex items-center text-lg font-semibold text-gray-900">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Informasi Penjual
                            </h3>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    @if ($groupOrder->mart->user->profile_pic)
                                        <!-- Tampilkan gambar profil jika ada -->
                                        <img class="object-cover w-12 h-12 border border-gray-200 rounded-full"
                                            src="{{ asset('storage/' . $groupOrder->mart->user->profile_pic) }}"
                                            alt="{{ $groupOrder->mart->user->name }}">
                                    @else
                                        <!-- Tampilkan inisial jika tidak ada gambar profil -->
                                        <div
                                            class="flex items-center justify-center w-12 h-12 bg-gray-300 rounded-full">
                                            <span class="text-sm font-medium text-gray-700">
                                                {{ strtoupper(substr($groupOrder->mart->user->name, 0, 2)) }}
                                            </span>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-lg font-medium text-gray-900">{{ $groupOrder->mart->user->name }}</h4>
                                    <p class="text-sm text-gray-600">{{ $groupOrder->mart->user->email }}</p>
                                    @if ($groupOrder->mart->user->phone)
                                        <p class="text-sm text-gray-600">{{ $groupOrder->mart->user->phone }}</p>
                                    @endif

                                </div>
                                <div>
                                    <a href="{{ route('customer.chat.detail', $groupOrder->mart->user->id) }}"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-700 transition-colors bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                            </path>
                                        </svg>
                                        Hubungi
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Orders List -->
                    <div class="space-y-4">
                        <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm">
                            <div class="px-6 py-4 border-b border-gray-200">
                               <h3 class="flex items-center text-lg font-semibold text-gray-900">
                                       <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor"
                                           viewBox="0 0 24 24">
                                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                               d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                       </svg>
                                   Informasi Produk
                               </h3>
                            </div>

                            @foreach($groupOrder->orders as $order)
                            <div class="p-6 border-b border-gray-100 last:border-b-0">
                                <div class="flex items-start space-x-4">
                                        <!-- Product Image -->
                                        <div class="flex-shrink-0">
                                            <div class="flex items-center justify-center w-20 h-20 bg-gray-200 rounded-lg overflow-hidden">
                                                <img src="{{ asset('storage/' . $order->product->image_url) }}"
                                                    alt="{{ $order->product->name }}"
                                                    class="w-full h-full object-cover">
                                            </div>
                                        </div>

                                        <!-- Product Details -->
                                        <div class="flex-1">
                                            <div class="flex justify-between items-start">
                                                <div class="flex-1 pr-4">
                                                    <h4 class="text-lg font-medium text-gray-900">{{ $order->product->name }}</h4>
                                                    <p class="mt-1 text-sm text-gray-600">
                                                        {{ $order->product->description ?? 'Tidak ada deskripsi' }}</p>

                                                    <div class="grid grid-cols-1 gap-4 mt-3 text-sm sm:grid-cols-2">
                                                        <div>
                                                            <span class="font-medium text-gray-700">Kategori:</span>
                                                            <span class="text-gray-600">{{ $order->product->category->name ?? 'Tidak dikategorikan' }}</span>
                                                        </div>
                                                        <div>
                                                            <span class="font-medium text-gray-700">SKU:</span>
                                                            <span class="text-gray-600">{{ $order->product->sku ?? 'N/A' }}</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Pricing Information -->
                                                <div class="flex-shrink-0 text-right">
                                                    <div class="space-y-2">
                                                        <div class="text-sm text-gray-600">
                                                            <span class="font-medium">Qty:</span>
                                                            <span class="ml-1 font-semibold text-gray-900">{{ $order->quantity ?? 1 }}</span>
                                                        </div>
                                                        <div class="text-sm text-gray-600">
                                                            <span class="font-medium">Harga Satuan:</span>
                                                            <div class="font-semibold text-gray-900">
                                                                Rp {{ number_format($order->unit_price ?? $order->product->price ?? 0, 0, ',', '.') }}
                                                            </div>
                                                        </div>
                                                        <div class="pt-2 border-t border-gray-200">
                                                            <div class="text-sm font-medium text-gray-700">Total:</div>
                                                            <div class="text-lg font-bold text-blue-600">
                                                                Rp {{ number_format(($order->quantity ?? 1) * ($order->unit_price ?? $order->product->price ?? 0), 0, ',', '.') }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                </div>
                            </div>
                            @endforeach

                            <!-- Grand Total Section -->
                            @if($groupOrder->orders->count() > 1)
                            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                                <div class="flex justify-between items-center">
                                    <div class="text-lg font-semibold text-gray-900">Grand Total:</div>
                                    <div class="text-xl font-bold text-blue-600">
                                        Rp {{ number_format($groupOrder->orders->sum(function($order) {
                                            return ($order->quantity ?? 1) * ($order->unit_price ??
                                                ($order->type == 'Product' ? ($order->product->price ?? 0) : ($order->service->price ?? 0))
                                            );
                                        }), 0, ',', '.') }}
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- Group Review Section - Only show if all orders are completed -->
                   @if ($groupOrder->order_status == 'Completed')
    <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="flex items-center text-lg font-semibold text-gray-900">
                <svg class="w-5 h-5 mr-2 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                </svg>
                Review Orders
            </h3>
        </div>

        <div class="p-6 space-y-6">
            @foreach ($groupOrder->orders as $order)
                <div class="p-4 border border-gray-200 rounded-lg">
                    <!-- Order Info -->
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <h4 class="font-medium text-gray-900">{{ $order->product_name }}</h4>
                            <p class="text-sm text-gray-600">
                                Quantity: {{ $order->quantity }} |
                                Price: Rp {{ number_format($order->total_price, 0, ',', '.') }}
                            </p>
                            @if ($order->note)
                                <p class="text-sm text-gray-500 mt-1">Note: {{ $order->note }}</p>
                            @endif
                        </div>
                    </div>

                    @if ($order->review)
                        <!-- Show existing review -->
                        <div class="p-4 rounded-lg bg-gray-50">
                            <div class="flex items-center mb-3">
                                <div class="flex items-center">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <svg class="w-4 h-4 {{ $i <= $order->review->rating ? 'text-yellow-400' : 'text-gray-300' }}"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                    @endfor
                                </div>
                                <span class="ml-2 text-sm text-gray-600">{{ $order->review->rating }}/5</span>
                            </div>
                            @if ($order->review->comment)
                                <p class="text-gray-700">{{ $order->review->comment }}</p>
                            @endif
                            <p class="mt-2 text-xs text-gray-500">
                                Diberikan pada {{ $order->review->created_at->format('d M Y, H:i') }}
                            </p>
                        </div>
                    @else
                        <!-- Show review form -->
                        <form action="{{ route('customer.review.store') }}" method="POST" class="space-y-4">
                            @csrf
                            <input type="hidden" name="order_id" value="{{ $order->id }}">

                            <!-- Rating Stars -->
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-700">Rating</label>
                                <div class="flex items-center space-x-1 rating-stars" data-order-id="{{ $order->id }}">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <button type="button" class="star-btn focus:outline-none" data-rating="{{ $i }}" data-order-id="{{ $order->id }}">
                                            <svg class="w-6 h-6 text-gray-300 transition-colors cursor-pointer hover:text-yellow-400"
                                                fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                        </button>
                                    @endfor
                                </div>
                                <input type="hidden" name="rating" id="rating-input-{{ $order->id }}" required>
                                @error('rating')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Comment -->
                            <div>
                                <label for="comment-{{ $order->id }}" class="block mb-2 text-sm font-medium text-gray-700">
                                    Komentar (Opsional)
                                </label>
                                <textarea name="comment" id="comment-{{ $order->id }}" rows="3"
                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    placeholder="Bagikan pengalaman Anda tentang produk/layanan ini...">{{ old('comment') }}</textarea>
                                @error('comment')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="flex justify-end">
                                <button type="submit"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-white transition-colors bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                    </svg>
                                    Kirim Review
                                </button>
                            </div>
                        </form>
                    @endif
                </div>
            @endforeach
        </div>
    </div>


@endif
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- Group Order Summary -->
                    <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900">Ringkasan Pembayaran</h3>
                        </div>
                        <div class="p-6 space-y-4">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Kode Group:</span>
                                <span class="font-medium text-gray-900">{{ $groupOrder->group_code }}</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Total Pesanan:</span>
                                <span class="font-medium text-gray-900">{{ $groupOrder->orders->count() }} item</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Subtotal:</span>
                                <span class="font-medium text-gray-900">
                                    Rp {{ number_format($groupOrder->orders->sum('total_price'), 0, ',', '.') }}
                                </span>
                            </div>
                            @if($groupOrder->discount_amount > 0)
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-600">Diskon:</span>
                                    <span class="font-medium text-red-600">
                                        -Rp {{ number_format($groupOrder->discount_amount, 0, ',', '.') }}
                                    </span>
                                </div>
                            @endif
                            <hr class="border-gray-200">
                            <div class="flex justify-between">
                                <span class="text-base font-medium text-gray-900">Total Akhir:</span>
                                <span class="text-xl font-bold text-green-600">
                                    Rp {{ number_format($groupOrder->total_amount, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    @if ($groupOrder->status != 'Cancelled')
                        <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm">
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-900">Aksi</h3>
                            </div>
                            <div class="p-6 space-y-3">
                                @if ($groupOrder->status == 'Pending')
                                    <form action="/" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin membayar semua pesanan dalam group ini?')">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" name="status" value="Paid" hidden>
                                        <button type="submit"
                                            class="inline-flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-white transition-colors bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                            </svg>
                                            Bayar Semua (Rp {{ number_format($groupOrder->total_amount, 0, ',', '.') }})
                                        </button>
                                    </form>

                                    <form action="/" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin membatalkan semua pesanan dalam group ini?')">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" name="status" value="Cancelled" hidden>
                                        <button type="submit"
                                            class="inline-flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-red-700 transition-colors bg-red-100 border border-red-200 rounded-md hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                            Batalkan Group Order
                                        </button>
                                    </form>
                                @endif

                                @if ($groupOrder->status == 'Paid' || $groupOrder->status == 'Processing')
                                    <a href="/"
                                        class="inline-flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-blue-700 transition-colors bg-blue-100 border border-blue-200 rounded-md hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.997 1.997 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        Lacak Pesanan
                                    </a>
                                @endif

                                <a href="/" target="_blank"
                                    class="inline-flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 transition-colors bg-gray-100 border border-gray-200 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    Download Invoice
                                </a>

                                <button onclick="shareGroupOrder()"
                                    class="inline-flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-green-700 transition-colors bg-green-100 border border-green-200 rounded-md hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
                                    </svg>
                                    Bagikan Group Order
                                </button>
                            </div>
                        </div>
                    @endif

                    <!-- Contact Support -->
                    <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900">Bantuan</h3>
                        </div>
                        <div class="p-6">
                            <p class="mb-4 text-sm text-gray-600">
                                Butuh bantuan dengan group order ini? Hubungi tim support kami.
                            </p>
                            <a href="/"
                                class="inline-flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-indigo-700 transition-colors bg-indigo-100 border border-indigo-200 rounded-md hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                                Chat dengan Support
                            </a>
                        </div>
                    </div>

                    <!-- Order Timeline -->
                    <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900">Timeline</h3>
                        </div>
                        <div class="p-6">
                            <div class="flow-root">
                                <ul class="-mb-8">
                                    <li>
                                        <div class="relative pb-8">
                                            <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                            <div class="relative flex space-x-3">
                                                <div>
                                                    <span class="flex items-center justify-center w-8 h-8 bg-green-500 rounded-full ring-8 ring-white">
                                                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="flex justify-between flex-1 min-w-0 space-x-4 pt-1.5">
                                                    <div>
                                                        <p class="text-sm text-gray-500">Group Order dibuat</p>
                                                    </div>
                                                    <div class="text-sm text-gray-500 text-right whitespace-nowrap">
                                                        {{ $groupOrder->created_at->format('d M Y, H:i') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    @if ($groupOrder->status != 'Pending')
                                    <li>
                                        <div class="relative pb-8">
                                            @if ($groupOrder->status != 'Cancelled')
                                                <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                            @endif
                                            <div class="relative flex space-x-3">
                                                <div>
                                                    <span class="flex items-center justify-center w-8 h-8 {{ $groupOrder->status == 'Cancelled' ? 'bg-red-500' : 'bg-blue-500' }} rounded-full ring-8 ring-white">
                                                        @if ($groupOrder->status == 'Cancelled')
                                                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                            </svg>
                                                        @else
                                                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                                            </svg>
                                                        @endif
                                                    </span>
                                                </div>
                                                <div class="flex justify-between flex-1 min-w-0 space-x-4 pt-1.5">
                                                    <div>
                                                        <p class="text-sm text-gray-500">
                                                            {{ $groupOrder->status == 'Cancelled' ? 'Group Order dibatalkan' : 'Pembayaran dikonfirmasi' }}
                                                        </p>
                                                    </div>
                                                    <div class="text-sm text-gray-500 text-right whitespace-nowrap">
                                                        {{ $groupOrder->updated_at->format('d M Y, H:i') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endif

                                    @if ($groupOrder->status == 'Processing')
                                    <li>
                                        <div class="relative pb-8">
                                            <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                            <div class="relative flex space-x-3">
                                                <div>
                                                    <span class="flex items-center justify-center w-8 h-8 bg-yellow-500 rounded-full ring-8 ring-white">
                                                        <svg class="w-5 h-5 text-white animate-spin" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6.364 1.636l-.707.707M20 12h-1M18.364 18.364l-.707-.707M12 20v-1m-6.364-1.636l.707-.707M4 12h1m1.636-6.364l.707.707" />
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="flex justify-between flex-1 min-w-0 space-x-4 pt-1.5">
                                                    <div>
                                                        <p class="text-sm text-gray-500">Pesanan sedang diproses</p>
                                                    </div>
                                                    <div class="text-sm text-gray-500 text-right whitespace-nowrap">
                                                        Sedang berlangsung
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endif

                                    @if ($groupOrder->status == 'Completed')
                                    <li>
                                        <div class="relative">
                                            <div class="relative flex space-x-3">
                                                <div>
                                                    <span class="flex items-center justify-center w-8 h-8 bg-green-500 rounded-full ring-8 ring-white">
                                                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="flex justify-between flex-1 min-w-0 space-x-4 pt-1.5">
                                                    <div>
                                                        <p class="text-sm text-gray-500">Group Order selesai</p>
                                                    </div>
                                                    <div class="text-sm text-gray-500 text-right whitespace-nowrap">
                                                        {{ $groupOrder->updated_at->format('d M Y, H:i') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Rating Stars -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize rating for each order
            document.querySelectorAll('.rating-stars').forEach(function(ratingContainer) {
                const orderId = ratingContainer.dataset.orderId;
                const stars = ratingContainer.querySelectorAll('.star-btn');
                const ratingInput = document.getElementById('rating-input-' + orderId);

                stars.forEach(function(star, index) {
                    star.addEventListener('click', function() {
                        const rating = parseInt(this.dataset.rating);
                        ratingInput.value = rating;

                        // Update star colors for this specific order
                        stars.forEach(function(s, i) {
                            const svg = s.querySelector('svg');
                            if (i < rating) {
                                svg.classList.remove('text-gray-300');
                                svg.classList.add('text-yellow-400');
                            } else {
                                svg.classList.remove('text-yellow-400');
                                svg.classList.add('text-gray-300');
                            }
                        });
                    });

                    star.addEventListener('mouseenter', function() {
                        const rating = parseInt(this.dataset.rating);
                        stars.forEach(function(s, i) {
                            const svg = s.querySelector('svg');
                            if (i < rating) {
                                svg.classList.remove('text-gray-300');
                                svg.classList.add('text-yellow-400');
                            } else {
                                svg.classList.remove('text-yellow-400');
                                svg.classList.add('text-gray-300');
                            }
                        });
                    });
                });

                ratingContainer.addEventListener('mouseleave', function() {
                    const currentRating = parseInt(ratingInput.value) || 0;
                    stars.forEach(function(s, i) {
                        const svg = s.querySelector('svg');
                        if (i < currentRating) {
                            svg.classList.remove('text-gray-300');
                            svg.classList.add('text-yellow-400');
                        } else {
                            svg.classList.remove('text-yellow-400');
                            svg.classList.add('text-gray-300');
                        }
                    });
                });
            });
        });
    </script>
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const stars = document.querySelectorAll('.star-btn');
            const ratingInput = document.getElementById('rating-input');
            let selectedRating = 0;

            stars.forEach((star, index) => {
                star.addEventListener('click', function() {
                    selectedRating = index + 1;
                    ratingInput.value = selectedRating;
                    updateStars();
                });

                star.addEventListener('mouseenter', function() {
                    highlightStars(index + 1);
                });

                star.addEventListener('mouseleave', function() {
                    updateStars();
                });
            });

            function updateStars() {
                stars.forEach((star, index) => {
                    const svg = star.querySelector('svg');
                    if (index < selectedRating) {
                        svg.classList.remove('text-gray-300');
                        svg.classList.add('text-yellow-400');
                    } else {
                        svg.classList.remove('text-yellow-400');
                        svg.classList.add('text-gray-300');
                    }
                });
            }

            function highlightStars(rating) {
                stars.forEach((star, index) => {
                    const svg = star.querySelector('svg');
                    if (index < rating) {
                        svg.classList.remove('text-gray-300');
                        svg.classList.add('text-yellow-400');
                    } else {
                        svg.classList.remove('text-yellow-400');
                        svg.classList.add('text-gray-300');
                    }
                });
            }
        });

        // Share Group Order function
        function shareGroupOrder() {
            const groupCode = '{{ $groupOrder->group_code }}';
            const url = window.location.href;
            const text = `Lihat detail Group Order ${groupCode} saya`;

            if (navigator.share) {
                navigator.share({
                    title: 'Group Order Detail',
                    text: text,
                    url: url
                }).catch(console.error);
            } else {
                // Fallback - copy to clipboard
                navigator.clipboard.writeText(url).then(() => {
                    alert('Link berhasil disalin ke clipboard!');
                }).catch(() => {
                    // Fallback for older browsers
                    const textArea = document.createElement('textarea');
                    textArea.value = url;
                    document.body.appendChild(textArea);
                    textArea.select();
                    document.execCommand('copy');
                    document.body.removeChild(textArea);
                    alert('Link berhasil disalin ke clipboard!');
                });
            }
        }
    </script> --}}
</x-customer.app>
