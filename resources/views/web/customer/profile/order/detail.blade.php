<x-seller.app>
    <div class="min-h-screen py-1 bg-gray-50">
        @include('web.seller.alert.success')
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8">
                <div class="flex items-center justify-between">
                    <div>
                        <a href="{{ route('customer.order.index') }}"
                            class="inline-flex items-center text-sm text-gray-500 hover:text-gray-700">
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
                        @switch($groupOrder->order_status)
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

                            @case('Shipped')
                                <span
                                    class="inline-flex items-center px-3 py-1 text-sm font-medium text-blue-800 bg-blue-100 rounded-full">
                                    <!-- Heroicon: Truck -->
                                    <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 17h6M3 13V6a1 1 0 011-1h10a1 1 0 011 1v7h3.586a1 1 0 01.707.293l1.414 1.414a1 1 0 01.293.707V18a1 1 0 01-1 1h-1a2 2 0 11-4 0H9a2 2 0 11-4 0H4a1 1 0 01-1-1v-5z" />
                                    </svg>
                                    Dikirim
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
                        <div class="text-sm text-gray-500">
                            {{ $groupOrder->orders->count() }} Pesanan
                        </div>
                        <div class="mt-1 text-sm text-gray-500">
                            Dibuat: {{ $groupOrder->created_at->format('d M Y, H:i') }}
                        </div>

                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
                <!-- Main Content -->
                <div class="space-y-6 lg:col-span-2">
                    <!-- Group Order Summary -->
                    <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm">
                        <div class="px-4 py-4 border-b border-gray-200 sm:px-6">
                            <h3 class="flex items-center text-base font-semibold text-gray-900 sm:text-lg">
                                <svg class="flex-shrink-0 w-4 h-4 mr-2 text-blue-600 sm:w-5 sm:h-5" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                    </path>
                                </svg>
                                Informasi Penjual
                            </h3>
                        </div>
                        <div class="p-4 sm:p-6">
                            <div class="flex flex-col space-y-4 sm:flex-row sm:items-center sm:space-y-0 sm:space-x-4">
                                <div class="flex items-center space-x-4 sm:space-x-0">
                                    <div class="flex-shrink-0">
                                        @if ($groupOrder->mart->user->profile_pic)
                                            <img class="object-cover w-12 h-12 border border-gray-200 rounded-full"
                                                src="{{ asset('storage/' . $groupOrder->mart->user->profile_pic) }}"
                                                alt="{{ $groupOrder->mart->user->name }}">
                                        @else
                                            <div
                                                class="flex items-center justify-center w-12 h-12 bg-gray-300 rounded-full">
                                                <span class="text-sm font-medium text-gray-700">
                                                    {{ strtoupper(substr($groupOrder->mart->user->name, 0, 1)) }}
                                                </span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex-1 sm:ml-4">
                                        <h4 class="text-base font-medium text-gray-900 sm:text-lg">
                                            {{ $groupOrder->mart->user->name }}</h4>
                                        <p class="text-xs text-gray-600 break-all sm:text-sm">
                                            {{ $groupOrder->mart->user->email }}</p>
                                        @if ($groupOrder->mart->user->phone)
                                            <p class="text-sm text-gray-600">{{ $groupOrder->mart->user->phone }}
                                            </p>
                                        @endif
                                        <a href="{{ route('customer.home.showSeller', $groupOrder->mart->user->id) }}"
                                            class="inline-block mt-1 text-xs font-semibold text-blue-600 sm:text-sm hover:text-blue-900">
                                            Lihat Profil
                                        </a>
                                    </div>
                                </div>
                                <div class="flex justify-end w-full sm:justify-start sm:flex-shrink-0 sm:w-auto">
                                    <a href="{{ route('customer.chat.detail', $groupOrder->mart->user->id) }}"
                                        class="inline-flex items-center justify-center w-full px-3 py-2 text-xs font-medium leading-4 text-gray-700 transition-colors bg-white border border-gray-300 rounded-md shadow-sm sm:text-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:w-auto">
                                        <svg class="flex-shrink-0 w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                            </path>
                                        </svg>
                                        <span class="truncate">Hubungi</span>
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

                            @foreach ($groupOrder->orders as $order)
                                <div class="p-6 border-b border-gray-100 last:border-b-0">
                                    {{-- <div class="flex items-start space-x-4"> --}}
                                    <div class="flex max-w-full space-x-4 overflow-x-auto">
                                        <div class="flex-1">
                                            <div
                                                class="flex items-start justify-between p-6 transition-all duration-200 bg-white border border-gray-200 shadow-sm rounded-xl hover:shadow-md">
                                                <!-- Product Information Section -->
                                                <div
                                                    class="flex items-center justify-center w-20 h-20 overflow-hidden bg-gray-200 rounded-lg">
                                                    <img src="{{ asset('storage/' . $order->product->image_url) }}"
                                                        alt="{{ $order->product->name }}"
                                                        class="object-cover w-full h-full border border-gray-200 rounded-lg">
                                                </div>
                                                <div class="flex-1 px-6">
                                                    <div class="mb-4">
                                                        <h4 class="mb-2 text-xl font-bold text-gray-900">
                                                            {{ $order->product->name }}
                                                        </h4>
                                                        <p class="text-sm leading-relaxed text-gray-600">
                                                            {{ $order->product->description ?? 'Tidak ada deskripsi' }}
                                                        </p>
                                                    </div>
                                                    <!-- Product Details Grid -->
                                                    {{-- <div class="grid grid-cols-1 gap-4 sm:grid-cols-2"> --}}
                                                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 min-w-[200px]">
                                                        <div class="flex items-center gap-3 p-3 rounded-lg bg-gray-50">
                                                            <div class="flex-shrink-0">
                                                                <svg class="w-4 h-4 text-gray-500" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                                                    </path>
                                                                </svg>
                                                            </div>
                                                            <div class="flex-1 min-w-0">
                                                                <span
                                                                    class="text-xs font-medium tracking-wide text-gray-500 uppercase">Kategori</span>
                                                                <p class="text-sm font-medium text-gray-900 break-words">
                                                                    {{ $order->product->category->name ?? 'Tidak dikategorikan' }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Pricing Information Section -->
                                                <div class="flex-shrink-0 text-right">
                                                    <div
                                                        class="p-5 border border-blue-200 bg-gradient-to-br from-gray-50 to-sky-50 rounded-xl">
                                                        <!-- Quantity -->
                                                        <div class="flex items-center justify-end gap-2 mb-4">
                                                            <div
                                                                class="flex items-center gap-2 px-3 py-1.5 bg-white rounded-lg shadow-sm border">
                                                                <svg class="w-4 h-4 text-gray-500" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                                                    </path>
                                                                </svg>
                                                                <span
                                                                    class="text-xs font-medium text-gray-600">Qty</span>
                                                                <span
                                                                    class="text-sm font-bold text-gray-900">{{ $order->quantity ?? 1 }}</span>
                                                            </div>
                                                        </div>

                                                        <!-- Unit Price -->
                                                        <div class="mb-4">
                                                            <div class="mb-1 text-xs font-medium text-gray-600">Harga
                                                                Satuan</div>
                                                            <div class="text-base font-semibold text-gray-900">
                                                                Rp
                                                                {{ number_format($order->unit_price ?? ($order->product->price ?? 0), 0, ',', '.') }}
                                                            </div>
                                                        </div>

                                                        <!-- Total Price -->
                                                        <div class="pt-4 border-t border-blue-200">
                                                            <div class="mb-2 text-xs font-medium text-gray-600">Total
                                                                Harga</div>
                                                            <div class="text-2xl font-bold text-blue-600">
                                                                Rp
                                                                {{ number_format(($order->quantity ?? 1) * ($order->unit_price ?? ($order->product->price ?? 0)), 0, ',', '.') }}
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
                            @if ($groupOrder->orders->count() > 1)
                                <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                                    <div class="flex items-center justify-between">
                                        <div class="text-lg font-semibold text-gray-900">Grand Total:</div>
                                        <div class="text-xl font-bold text-blue-600">
                                            Rp
                                            {{ number_format(
                                                $groupOrder->orders->sum(function ($order) {
                                                    return ($order->quantity ?? 1) *
                                                        ($order->unit_price ??
                                                            ($order->type == 'Product' ? $order->product->price ?? 0 : $order->service->price ?? 0));
                                                }),
                                                0,
                                                ',',
                                                '.',
                                            ) }}
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
                                    <svg class="w-5 h-5 mr-2 text-yellow-500" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
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
                                                    <p class="mt-1 text-sm text-gray-500">Note: {{ $order->note }}
                                                    </p>
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
                                                                <path
                                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                                </path>
                                                            </svg>
                                                        @endfor
                                                    </div>
                                                    <span
                                                        class="ml-2 text-sm text-gray-600">{{ $order->review->rating }}/5</span>
                                                </div>
                                                @if ($order->review->comment)
                                                    <p class="text-gray-700">{{ $order->review->comment }}</p>
                                                @endif
                                                <p class="mt-2 text-xs text-gray-500">
                                                    Diberikan pada
                                                    {{ $order->review->created_at->format('d M Y, H:i') }}
                                                </p>
                                            </div>
                                        @else
                                            <!-- Show review form -->
                                            <form action="{{ route('customer.review.store') }}" method="POST"
                                                class="space-y-4">
                                                @csrf
                                                <input type="hidden" name="order_id" value="{{ $order->id }}">

                                                <!-- Rating Stars -->
                                                <div>
                                                    <label
                                                        class="block mb-2 text-sm font-medium text-gray-700">Rating</label>
                                                    <div class="flex items-center space-x-1 rating-stars"
                                                        data-order-id="{{ $order->id }}">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            <button type="button" class="star-btn focus:outline-none"
                                                                data-rating="{{ $i }}"
                                                                data-order-id="{{ $order->id }}">
                                                                <svg class="w-6 h-6 text-gray-300 transition-colors cursor-pointer hover:text-yellow-400"
                                                                    fill="currentColor" viewBox="0 0 20 20">
                                                                    <path
                                                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                                    </path>
                                                                </svg>
                                                            </button>
                                                        @endfor
                                                    </div>
                                                    <input type="hidden" name="rating"
                                                        id="rating-input-{{ $order->id }}" required>
                                                    @error('rating')
                                                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <!-- Comment -->
                                                <div>
                                                    <label for="comment-{{ $order->id }}"
                                                        class="block mb-2 text-sm font-medium text-gray-700">
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
                                                        <svg class="w-4 h-4 mr-2" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8">
                                                            </path>
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
                <div class="pb-8 mb-8 space-y-6">
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
                                    Rp {{ number_format($groupOrder->sub_total, 0, ',', '.') }}
                                </span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Ongkos Kirim:</span>
                                <span class="font-medium text-gray-900">
                                    Rp {{ number_format($groupOrder->shipping_cost, 0, ',', '.') }}
                                </span>
                            </div>
                            @if ($groupOrder->discount_amount > 0)
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
                                    Rp {{ number_format($groupOrder->total_price, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    @if ($groupOrder->order_status != 'Completed' && $groupOrder->order_status != 'Cancelled')

                        <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm">
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-900">Aksi</h3>
                            </div>
                            <div class="p-6 space-y-3">
                                @if ($groupOrder->order_status == 'Paid' || $groupOrder->order_status == 'On-Proses' || $groupOrder->order_status == 'Shipped')
                                    <form action="{{ route('customer.order.complete', $groupOrder) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menyelesaikan pesanan ini?')">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" name="status" value="Paid" hidden>
                                        <button type="submit"
                                            class="inline-flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-white transition-colors bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                                                </path>
                                            </svg>
                                            Selesaikan Pesanan
                                        </button>
                                    </form>
                                @endif

                                {{-- <a href="" target="_blank"
                                    class="inline-flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 transition-colors bg-gray-100 border border-gray-200 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                    Download Invoice
                                </a> --}}

                                {{-- <button onclick="shareGroupOrder()"
                                    class="inline-flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-green-700 transition-colors bg-green-100 border border-green-200 rounded-md hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z">
                                        </path>
                                    </svg>
                                    Bagikan Group Order
                                </button> --}}
                            </div>
                        </div>
                    @else
                    @endif



                    <!-- Order Timeline -->
                    <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900">Timeline</h3>
                        </div>
                        <div class="p-6">
                            <div class="flow-root">
                                <ul class="space-y-0">
                                    <li>
                                        <div class="relative pb-8">
                                            <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200"
                                                aria-hidden="true"></span>
                                            <div class="relative flex space-x-3">
                                                <div>
                                                    <span
                                                        class="flex items-center justify-center w-8 h-8 bg-green-500 rounded-full ring-8 ring-white">
                                                        <svg class="w-5 h-5 text-white" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path fill-rule="evenodd"
                                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="flex justify-between flex-1 min-w-0 space-x-4 pt-1.5">
                                                    <div>
                                                        <p class="text-sm text-gray-500"> Order dibuat</p>
                                                    </div>
                                                    <div class="text-sm text-right text-gray-500 whitespace-nowrap">
                                                        {{ $groupOrder->created_at->format('d M Y, H:i') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    @if ($groupOrder->order_status != 'Pending')
                                        <li>
                                            <div class="relative pb-8">
                                                @if ($groupOrder->order_status != 'Cancelled')
                                                    <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200"
                                                        aria-hidden="true"></span>
                                                @endif
                                                <div class="relative flex space-x-3">
                                                    <div>
                                                        <span
                                                            class="flex items-center justify-center w-8 h-8 {{ $groupOrder->order_status == 'Cancelled' ? 'bg-red-500' : 'bg-blue-500' }} rounded-full ring-8 ring-white">
                                                            @if ($groupOrder->order_status == 'Cancelled')
                                                                <svg class="w-5 h-5 text-white" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M6 18L18 6M6 6l12 12"></path>
                                                                </svg>
                                                            @else
                                                                <svg class="w-5 h-5 text-white" fill="currentColor"
                                                                    viewBox="0 0 20 20">
                                                                    <path fill-rule="evenodd"
                                                                        d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                                                        clip-rule="evenodd"></path>
                                                                </svg>
                                                            @endif
                                                        </span>
                                                    </div>
                                                    <div class="flex justify-between flex-1 min-w-0 space-x-4 pt-1.5">
                                                        <div>
                                                            <p class="text-sm text-gray-500">
                                                                {{ $groupOrder->order_status == 'Cancelled' ? 'Group Order dibatalkan' : 'Pembayaran dikonfirmasi' }}
                                                            </p>
                                                        </div>
                                                        <div
                                                            class="text-sm text-right text-gray-500 whitespace-nowrap">
                                                            {{ $groupOrder->updated_at->format('d M Y, H:i') }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endif

                                    @if (in_array($groupOrder->order_status, ['Shipped', 'Completed']))
                                        <li>
                                            <div
                                                class="relative {{ $groupOrder->order_status == 'Completed' ? 'pb-8' : '' }}">
                                                @if ($groupOrder->order_status == 'Completed')
                                                    <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200"
                                                        aria-hidden="true"></span>
                                                @endif
                                                <div class="relative flex space-x-3">
                                                    <div>
                                                        <span
                                                            class="flex items-center justify-center w-8 h-8 bg-purple-500 rounded-full ring-8 ring-white">
                                                            <svg class="w-5 h-5 text-white" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M8 7l4-4m0 0l4 4m-4-4v18M3 17l3 3 3-3m0 0V7" />
                                                            </svg>
                                                        </span>
                                                    </div>
                                                    <div class="flex justify-between flex-1 min-w-0 space-x-4 pt-1.5">
                                                        <div>
                                                            <p class="text-sm text-gray-500">Pesanan dikirim</p>

                                                        </div>
                                                        <div
                                                            class="text-sm text-right text-gray-500 whitespace-nowrap">
                                                            @if ($groupOrder->shipped_at)
                                                                {{ \Carbon\Carbon::parse($groupOrder->shipped_at)->translatedFormat('d F Y, H:i') }}
                                                            @else
                                                                {{ $groupOrder->updated_at->format('d M Y, H:i') }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endif

                                    @if ($groupOrder->order_status == 'Completed')
                                        <li>
                                            <div class="relative pb-4">
                                                <div class="relative flex space-x-3">
                                                    <div>
                                                        <span
                                                            class="flex items-center justify-center w-8 h-8 bg-green-500 rounded-full ring-8 ring-white">
                                                            <svg class="w-5 h-5 text-white" fill="currentColor"
                                                                viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd"
                                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                    <div class="flex justify-between flex-1 min-w-0 space-x-4 pt-1.5">
                                                        <div>
                                                            <p class="text-sm text-gray-500"> Order selesai</p>

                                                        </div>
                                                        <div
                                                            class="text-sm text-right text-gray-500 whitespace-nowrap">
                                                            @if ($groupOrder->completed_at)
                                                                {{ \Carbon\Carbon::parse($groupOrder->completed_at)->translatedFormat('d F Y, H:i') }}
                                                            @else
                                                                {{ $groupOrder->updated_at->format('d M Y, H:i') }}
                                                            @endif
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

                    <!-- Spacer untuk memastikan konten tidak terpotong -->
                    <div class="h-4"></div>
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
