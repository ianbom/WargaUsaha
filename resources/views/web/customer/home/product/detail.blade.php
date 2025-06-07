<x-customer.app>
    <div class="min-h-screen bg-gray-50">
        <!-- Breadcrumb -->
        <div class="bg-white border-b">
            <div class="container mx-auto px-4 py-4">
                <nav class="flex items-center space-x-2 text-sm text-gray-600">
                    <a href="{{ route('customer.home.index') }}" class="hover:text-blue-600 transition-colors">Home</a>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <a href="#" class="hover:text-blue-600 transition-colors">{{ $product->productCategory->name ?? 'Produk' }}</a>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span class="text-gray-800 font-medium">{{ $product->name }}</span>
                </nav>
            </div>
        </div>

        <div class="container mx-auto px-4 py-8" x-data="{ showModal: false, quantity: 1 }">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-12">
                <!-- Product Image -->
                <div class="space-y-4">
                    <div class="relative bg-white rounded-xl overflow-hidden shadow-lg">
                        <img src="{{ asset('storage/' . $product->image_url) }}"
                             alt="{{ $product->name }}"
                             class="w-full h-96 lg:h-[500px] object-cover">

                        <!-- Stock Badge -->
                        @if($product->stock <= 5 && $product->stock > 0)
                            <div class="absolute top-4 left-4">
                                <span class="bg-red-500 text-white text-sm px-3 py-1 rounded-full">
                                    Stok Terbatas
                                </span>
                            </div>
                        @elseif($product->stock == 0)
                            <div class="absolute top-4 left-4">
                                <span class="bg-gray-500 text-white text-sm px-3 py-1 rounded-full">
                                    Habis
                                </span>
                            </div>
                        @endif

                        <!-- Wishlist Button -->
                        <button class="absolute top-4 right-4 p-3 bg-white/90 hover:bg-white rounded-full shadow-md transition-all duration-200">
                            <svg class="w-6 h-6 text-gray-600 hover:text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Product Info -->
                <div class="space-y-6">
                    <div>
                        <h1 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">
                            {{ $product->name }}
                        </h1>

                        <!-- Rating -->
                        @if($review && count($review) > 0)
                            @php
                                $averageRating = collect($review)->avg('rating');
                                $totalReviews = count($review);
                            @endphp
                            <div class="flex items-center gap-2 mb-4">
                                <div class="flex items-center">
                                    @for($i = 1; $i <= 5; $i++)
                                        <svg class="w-5 h-5 {{ $i <= round($averageRating) ? 'text-yellow-400' : 'text-gray-300' }}"
                                             fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                    @endfor
                                </div>
                                <span class="text-gray-700 font-medium">{{ number_format($averageRating, 1) }}</span>
                                <span class="text-gray-500">({{ $totalReviews }} review{{ $totalReviews > 1 ? 's' : '' }})</span>
                            </div>
                        @endif

                        <!-- Category -->
                        @if($product->productCategory)
                            <div class="mb-4">
                                <span class="inline-block bg-blue-100 text-blue-800 text-sm px-3 py-1 rounded-full">
                                    {{ $product->productCategory->name }}
                                </span>
                            </div>
                        @endif

                        <!-- Price -->
                        <div class="mb-6">
                            <span class="text-4xl font-bold text-blue-600">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </span>
                        </div>

                        <!-- Stock Info -->
                        <div class="mb-6">
                            <div class="flex items-center gap-2">
                                <span class="text-gray-600">Stok tersedia:</span>
                                <span class="font-semibold {{ $product->stock <= 5 ? 'text-red-600' : 'text-green-600' }}">
                                    {{ $product->stock }} unit
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Quantity and Add to Cart -->
                    <div class="bg-white p-6 rounded-xl shadow-md">
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah</label>
                                <div class="flex items-center gap-3">
                                    <button
                                        type="button"
                                        class="w-10 h-10 border border-gray-300 rounded-lg flex items-center justify-center hover:bg-gray-50 transition-colors"
                                        :class="{ 'opacity-50 cursor-not-allowed': quantity <= 1 }"
                                        :disabled="quantity <= 1"
                                        @click="if (quantity > 1) quantity--"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                        </svg>
                                    </button>

                                    <input
                                        type="number"
                                        x-model="quantity"
                                        min="1"
                                        max="{{ $product->stock }}"
                                        class="w-20 h-10 text-center border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    >

                                    <button
                                        type="button"
                                        class="w-10 h-10 border border-gray-300 rounded-lg flex items-center justify-center hover:bg-gray-50 transition-colors"
                                        :class="{ 'opacity-50 cursor-not-allowed': quantity >= {{ $product->stock }} }"
                                        :disabled="quantity >= {{ $product->stock }}"
                                        @click="if (quantity < {{ $product->stock }}) quantity++"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="flex gap-3">
                                <button
                                    class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-3 px-6 rounded-lg font-medium transition-colors duration-200 flex items-center justify-center gap-2"
                                    :class="{ 'opacity-50 cursor-not-allowed': {{ $product->stock }} == 0 }"
                                    :disabled="{{ $product->stock }} == 0"
                                >
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13v6a2 2 0 002 2h6a2 2 0 002-2v-6m-8 0V9a2 2 0 012-2h4a2 2 0 012 2v4"></path>
                                    </svg>
                                    <span x-text="{{ $product->stock }} == 0 ? 'Habis' : 'Tambah ke Keranjang'"></span>
                                </button>

                                <button
                                    @click="showModal = true"
                                    class="px-6 py-3 border-2 border-blue-600 text-blue-600 hover:bg-blue-50 rounded-lg font-medium transition-colors duration-200"
                                    :class="{ 'opacity-50 cursor-not-allowed': {{ $product->stock }} == 0 }"
                                    :disabled="{{ $product->stock }} == 0"
                                >
                                    Beli Sekarang
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Store Info -->
                    @if($product->mart)
                        <div class="bg-white p-6 rounded-xl shadow-md">
                            <h3 class="font-semibold text-gray-800 mb-3">Informasi Toko</h3>
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-4m-5 0H9m11 0v-4a2 2 0 00-2-2h-2m-3-4V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4h4z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800">{{ $product->mart->name }}</p>
                                    <p class="text-sm text-gray-600">Pemilik : {{ $product->mart->user->name }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>


<!-- Buy Now Modal -->
<div
    x-show="showModal"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-50 flex items-center justify-center px-4 py-8 bg-black/60 backdrop-blur-sm"
    style="display: none;"
>
    <div
        @click.outside="showModal = false"
        x-show="showModal"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95 translate-y-4"
        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
        x-transition:leave-end="opacity-0 scale-95 translate-y-4"
        class="w-full max-w-md bg-white rounded-3xl shadow-2xl overflow-hidden"
    >
        <!-- Header dengan gradient -->
        <div class="relative bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-8">
            <div class="absolute inset-0 bg-black/5"></div>
            <div class="relative flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-bold text-white">Konfirmasi Pembelian</h2>
                    <p class="text-blue-100 text-sm mt-1">Periksa detail sebelum melanjutkan</p>
                </div>
                <button
                    @click="showModal = false"
                    type="button"
                    class="w-8 h-8 flex items-center justify-center rounded-full bg-white/20 hover:bg-white/30 text-white transition-colors"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Form Content -->
        <form action="{{ route('customer.checkout.product', $product) }}" method="POST">
            @csrf
            <div class="p-6 space-y-6">
                <!-- Product Summary Card -->
                <div class="bg-gray-50 rounded-2xl p-4 border border-gray-100">
                    <div class="flex items-center gap-4">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-100 to-blue-200 rounded-xl flex items-center justify-center">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-semibold text-gray-900 line-clamp-2">{{ $product->name }}</h3>
                            <div class="flex items-center justify-between mt-2">
                                <span class="text-sm text-gray-500" x-text="quantity + ' unit'"></span>
                                <span class="font-bold text-blue-600">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Note Input Section -->
                <div class="space-y-3">
                    <label for="note" class="block text-sm font-medium text-gray-700">
                        <svg class="w-4 h-4 inline mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Catatan Tambahan
                    </label>
                    <textarea
                        id="note"
                        name="note"
                        rows="3"
                        maxlength="200"
                        class="w-full px-4 py-3 border border-gray-200 rounded-xl resize-none focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-gray-50 text-sm transition-colors"
                        placeholder="Tulis catatan atau permintaan khusus untuk layanan ini..."

                    ></textarea>
                    <div class="flex justify-between items-center text-xs">
                        <span class="text-gray-500">Catatan ini akan dikirim kepada penyedia layanan</span>
                    </div>
                </div>

                <!-- Total Section -->
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl p-4 border border-blue-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600">Total Pembayaran</p>
                            {{-- <p class="text-xs text-gray-500 mt-1">Sudah termasuk pajak</p> --}}
                        </div>
                        <div class="text-right">
                            <p class="text-2xl font-bold text-gray-900" x-text="'Rp ' + ({{ $product->price }} * quantity).toLocaleString('id-ID')"></p>
                        </div>
                    </div>
                </div>


            </div>

            <!-- Action Buttons -->
            <div class="p-6 pt-0">
                <div class="flex gap-3">
                    <button
                        @click="showModal = false"
                        type="button"
                        class="flex-1 py-3 text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-xl font-medium transition-all duration-200 text-sm"
                    >
                        Batal
                    </button>

                    <input type="hidden" name="quantity" x-model="quantity">
                    <button
                        type="submit"
                        class="flex-2 py-3 px-6 text-white bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 rounded-xl font-medium transition-all duration-200 shadow-lg hover:shadow-xl text-sm flex items-center justify-center gap-2"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        Lanjut Bayar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>



            <!-- Product Description -->
            <div class="bg-white rounded-xl shadow-md p-8 mb-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Deskripsi Produk</h2>
                <div class="prose max-w-none text-gray-700 leading-relaxed">
                    {{ $product->description }}
                </div>
            </div>

            <!-- Reviews Section -->
            <div class="bg-white rounded-xl shadow-md p-8">
                <div class="flex items-center justify-between mb-8">
                    <h2 class="text-2xl font-bold text-gray-800">Review Customer</h2>
                    @if($review && count($review) > 0)
                        <div class="text-right">
                            <div class="text-sm text-gray-600">
                                {{ count($review) }} review{{ count($review) > 1 ? 's' : '' }}
                            </div>
                        </div>
                    @endif
                </div>

                @if($review && count($review) > 0)
                    <!-- Rating Summary -->
                    <div class="mb-8 p-6 bg-gray-50 rounded-xl">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="text-center">
                                <div class="text-4xl font-bold text-blue-600 mb-2">
                                    {{ number_format(collect($review)->avg('rating'), 1) }}
                                </div>
                                <div class="flex items-center justify-center mb-2">
                                    @for($i = 1; $i <= 5; $i++)
                                        <svg class="w-6 h-6 {{ $i <= round(collect($review)->avg('rating')) ? 'text-yellow-400' : 'text-gray-300' }}"
                                             fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                    @endfor
                                </div>
                                <div class="text-gray-600">dari {{ count($review) }} review</div>
                            </div>

                            <div class="space-y-2">
                                @for($rating = 5; $rating >= 1; $rating--)
                                    @php
                                        $countForRating = collect($review)->where('rating', $rating)->count();
                                        $percentage = count($review) > 0 ? ($countForRating / count($review)) * 100 : 0;
                                    @endphp
                                    <div class="flex items-center gap-2">
                                        <span class="text-sm w-8">{{ $rating }}★</span>
                                        <div class="flex-1 bg-gray-200 rounded-full h-2">
                                            <div class="bg-yellow-400 h-2 rounded-full" style="width: {{ $percentage }}%"></div>
                                        </div>
                                        <span class="text-sm text-gray-600 w-8">{{ $countForRating }}</span>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>

                    <!-- Individual Reviews -->
                    <div class="space-y-6">
                        @foreach($review as $rev)
                            <div class="border-b border-gray-100 pb-6 last:border-b-0">
                                <div class="flex items-start gap-4">
                                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-semibold">
                                        {{ substr($rev->order->user->name ?? 'U', 0, 1) }}
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex items-center gap-2 mb-2">
                                            <h4 class="font-semibold text-gray-800">
                                                {{ $rev->order->buyer->name ?? 'Anonymous User' }}
                                            </h4>
                                            <div class="flex items-center">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <svg class="w-4 h-4 {{ $i <= $rev->rating ? 'text-yellow-400' : 'text-gray-300' }}"
                                                         fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                                    </svg>
                                                @endfor
                                            </div>
                                        </div>
                                        @if($rev->comment)
                                            <p class="text-gray-700 mb-2">{{ $rev->comment }}</p>
                                        @endif
                                        <p class="text-sm text-gray-500">
                                            {{ $rev->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <!-- No Reviews -->
                    <div class="text-center py-12">
                        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-700 mb-2">Belum Ada Review</h3>
                        <p class="text-gray-500">Jadilah yang pertama memberikan review untuk produk ini</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-customer.app>
