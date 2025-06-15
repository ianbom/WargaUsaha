<x-customer.app>
    @php
        $maxVisible = 5;
    @endphp
    <div class="min-h-screen bg-gray-50">
        <!-- Breadcrumb -->
        <div class="bg-white border-b">
            <div class="container px-4 py-4 mx-auto">
                <nav class="flex items-center space-x-2 text-sm text-gray-600">
                    <a href="{{ route('customer.home.index') }}" class="transition-colors hover:text-blue-600">Home</a>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <a href="#"
                        class="transition-colors hover:text-blue-600">{{ $service->serviceCategory->name ?? 'Layanan' }}</a>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span class="font-medium text-gray-800">{{ $service->title }}</span>
                </nav>
            </div>
        </div>

        <div class="container px-4 py-8 mx-auto" x-data="{ showModal: false }">
            <div class="grid grid-cols-1 gap-12 mb-12 lg:grid-cols-2">
                <!-- Service Image -->
                <div class="space-y-4">
                    <div class="relative overflow-hidden bg-white shadow-lg rounded-xl">
                        <img src="{{ asset('storage/' . $service->image_url) }}" alt="{{ $service->title }}"
                            class="w-full h-96 lg:h-[500px] object-cover">

                        <!-- Availability Badge -->
                        @if (!$service->is_available)
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 text-sm text-white bg-red-500 rounded-full">
                                    Tidak Tersedia
                                </span>
                            </div>
                        @else
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 text-sm text-white bg-green-500 rounded-full">
                                    Tersedia
                                </span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Service Info -->
                <div class="space-y-6">
                    <div>
                        <h1 class="mb-4 text-3xl font-bold text-gray-800 lg:text-4xl">
                            {{ $service->title }}
                        </h1>

                        <!-- Rating -->
                        @if ($review && count($review) > 0)
                            @php
                                $averageRating = collect($review)->avg('rating');
                                $totalReviews = count($review);
                            @endphp
                            <div class="flex items-center gap-2 mb-4">
                                <div class="flex items-center">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <svg class="w-5 h-5 {{ $i <= round($averageRating) ? 'text-yellow-400' : 'text-gray-300' }}"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>
                                    @endfor
                                </div>
                                <span class="font-medium text-gray-700">{{ number_format($averageRating, 1) }}</span>
                                <span class="text-gray-500">({{ $totalReviews }}
                                    review{{ $totalReviews > 1 ? 's' : '' }})</span>
                            </div>
                        @endif

                        <!-- Category -->
                        @if ($service->serviceCategory)
                            <div class="mb-4">
                                <span class="inline-block px-3 py-1 text-sm text-blue-800 bg-blue-100 rounded-full">
                                    {{ $service->serviceCategory->name }}
                                </span>
                            </div>
                        @endif

                        <!-- Price -->
                        <div class="mb-6">
                            <span class="text-4xl font-bold text-blue-600">
                                Rp {{ number_format($service->price, 0, ',', '.') }}
                            </span>
                            <span class="ml-2 text-gray-600">/ layanan</span>
                        </div>

                        <!-- Availability Info -->
                        <div class="mb-6">
                            <div class="flex items-center gap-2">
                                <span class="text-gray-600">Status:</span>
                                <span
                                    class="font-semibold {{ $service->is_available ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $service->is_available ? 'Tersedia' : 'Tidak Tersedia' }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="p-6 bg-white shadow-md rounded-xl">
                        <div class="space-y-4">
                            <div class="flex gap-3">
                                <button
                                    class="flex items-center justify-center flex-1 gap-2 px-6 py-3 font-medium text-white transition-colors duration-200 bg-blue-600 rounded-lg hover:bg-blue-700"
                                    :class="{
                                        'opacity-50 cursor-not-allowed': !
                                            {{ $service->is_available ? 'true' : 'false' }}
                                    }"
                                    :disabled="!{{ $service->is_available ? 'true' : 'false' }}">
                                    <span>{{ !$service->is_available ? 'Tidak Tersedia' : 'Pesan Layanan' }}</span>
                                </button>

                                <button @click="showModal = true"
                                    class="px-6 py-3 font-medium text-blue-600 transition-colors duration-200 border-2 border-blue-600 rounded-lg hover:bg-blue-50"
                                    :class="{
                                        'opacity-50 cursor-not-allowed': !
                                            {{ $service->is_available ? 'true' : 'false' }}
                                    }"
                                    :disabled="!{{ $service->is_available ? 'true' : 'false' }}">
                                    Konsultasi
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Provider Info -->
                    @if ($service->user)
                        <div class="p-6 bg-white shadow-md rounded-xl">
                            <h3 class="mb-3 font-semibold text-gray-800">Informasi Penyedia Layanan</h3>
                            <div class="flex items-center gap-3">
                                <div class="flex items-center justify-center w-12 h-12 bg-blue-100 rounded-full">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800">{{ $service->user->name }}</p>
                                    <p class="text-sm text-gray-600">Penyedia Layanan</p>
                                    <a href="{{ route('customer.home.showSeller', $service->user->id) }}"
                                        class="text-sm font-semibold text-blue-600 hover:text-blue-900">Lihat
                                        Penyedia</a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>


            <!-- Consultation Modal -->
            <div x-show="showModal" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 z-50 flex items-center justify-center px-4 py-8 bg-black/60 backdrop-blur-sm"
                style="display: none;">
                <div @click.outside="showModal = false" x-show="showModal"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                    x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                    x-transition:leave-end="opacity-0 scale-95 translate-y-4"
                    class="w-full max-w-lg bg-white rounded-3xl shadow-2xl overflow-hidden max-h-[90vh] overflow-y-auto">
                    <!-- Header dengan gradient -->
                    <div class="relative px-6 py-8 bg-gradient-to-r from-blue-600 to-blue-700">
                        <div class="absolute inset-0 bg-black/5"></div>
                        <div class="relative flex items-center justify-between">
                            <div>
                                <h2 class="text-xl font-bold text-white">Konsultasi Layanan</h2>
                                <p class="mt-1 text-sm text-blue-100">Pesan layanan sekarang</p>
                            </div>
                            <button @click="showModal = false"
                                class="flex items-center justify-center w-8 h-8 text-white transition-colors rounded-full bg-white/20 hover:bg-white/30">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Form Content -->
                    <form action="{{ route('customer.checkout.service', $service) }}" method="POST"
                        class="p-6 space-y-6">
                        @csrf

                        <!-- Service Summary Card -->
                        <div class="p-4 border border-gray-100 bg-gray-50 rounded-2xl">
                            <div class="flex items-center gap-4">
                                <div
                                    class="flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-100 to-blue-200 rounded-xl">
                                    <svg class="w-8 h-8 text-blue-600" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.1497 8.80219L9.70794 9.40825L10.1497 8.80219ZM12 3.10615L11.4925 3.65833C11.7794 3.9221 12.2206 3.9221 12.5075 3.65833L12 3.10615ZM13.8503 8.8022L14.2921 9.40826L13.8503 8.8022ZM12 9.67598L12 10.426H12L12 9.67598ZM10.5915 8.19612C9.90132 7.69298 9.16512 7.08112 8.60883 6.43627C8.03452 5.77053 7.75 5.18233 7.75 4.71476H6.25C6.25 5.73229 6.82845 6.66885 7.47305 7.41607C8.13569 8.18419 8.97435 8.87349 9.70794 9.40825L10.5915 8.19612ZM7.75 4.71476C7.75 3.65612 8.27002 3.05231 8.8955 2.84182C9.54754 2.62238 10.5199 2.76435 11.4925 3.65833L12.5075 2.55398C11.2302 1.37988 9.70254 0.987559 8.41707 1.42016C7.10502 1.8617 6.25 3.09623 6.25 4.71476H7.75ZM14.2921 9.40826C15.0257 8.8735 15.8643 8.18421 16.527 7.41608C17.1716 6.66886 17.75 5.73229 17.75 4.71475H16.25C16.25 5.18234 15.9655 5.77055 15.3912 6.43629C14.8349 7.08113 14.0987 7.69299 13.4085 8.19613L14.2921 9.40826ZM17.75 4.71475C17.75 3.09622 16.895 1.8617 15.5829 1.42016C14.2975 0.987559 12.7698 1.37988 11.4925 2.55398L12.5075 3.65833C13.4801 2.76435 14.4525 2.62238 15.1045 2.84181C15.73 3.0523 16.25 3.65612 16.25 4.71475H17.75ZM9.70794 9.40825C10.463 9.95869 11.0618 10.426 12 10.426L12 8.92598C11.635 8.92598 11.4347 8.81074 10.5915 8.19612L9.70794 9.40825ZM13.4085 8.19613C12.5653 8.81074 12.365 8.92598 12 8.92598L12 10.426C12.9382 10.426 13.537 9.9587 14.2921 9.40826L13.4085 8.19613Z"
                                            fill="currentColor" />
                                        <path
                                            d="M4 21.3884H6.25993C7.27079 21.3884 8.29253 21.4937 9.27633 21.6964C11.0166 22.0549 12.8488 22.0983 14.6069 21.8138C15.4738 21.6734 16.326 21.4589 17.0975 21.0865C17.7939 20.7504 18.6469 20.2766 19.2199 19.7459C19.7921 19.216 20.388 18.3487 20.8109 17.6707C21.1736 17.0894 20.9982 16.3762 20.4245 15.943C19.7873 15.4619 18.8417 15.462 18.2046 15.9433L16.3974 17.3084C15.697 17.8375 14.932 18.3245 14.0206 18.4699C13.911 18.4874 13.7962 18.5033 13.6764 18.5172M13.6764 18.5172C13.6403 18.5214 13.6038 18.5254 13.5668 18.5292M13.6764 18.5172C13.8222 18.486 13.9669 18.396 14.1028 18.2775C14.746 17.7161 14.7866 16.77 14.2285 16.1431C14.0991 15.9977 13.9475 15.8764 13.7791 15.7759C10.9817 14.1074 6.62942 15.3782 4 17.2429M13.6764 18.5172C13.6399 18.525 13.6033 18.5292 13.5668 18.5292M13.5668 18.5292C13.0434 18.5829 12.4312 18.5968 11.7518 18.5326"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    </svg>

                                </div>
                                <div class="flex-1">
                                    <h3 class="font-semibold text-gray-900 line-clamp-2">{{ $service->title }}</h3>
                                    <div class="flex items-center justify-between mt-2">
                                        <span
                                            class="text-sm text-gray-500">{{ $service->serviceCategory->name ?? 'Layanan' }}</span>
                                        <span class="font-bold text-blue-600">Rp
                                            {{ number_format($service->price, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <!-- Provider Info -->
                        @if ($service->user)
                        <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl">
                            <div class="flex items-center justify-center w-8 h-8 bg-blue-100 rounded-full">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">{{ $service->user->name }}</p>
                                <p class="text-xs text-gray-500">Penyedia Layanan</p>
                            </div>
                        </div>
                        @endif

                        <!-- Customer Info -->
                        <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl">
                            <div class="flex items-center justify-center w-8 h-8 bg-green-100 rounded-full">
                                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">{{ auth()->user()->name ?? 'Nama Customer' }}</p>
                                <p class="text-xs text-gray-500">Customer</p>
                            </div>
                        </div> --}}

                        <!-- Note Input Field -->
                        <div class="space-y-2">
                            <label for="note" class="block text-sm font-medium text-gray-700">
                                Catatan Tambahan
                            </label>
                            <textarea id="note" name="note" rows="4"
                                class="w-full px-4 py-3 transition-colors border border-gray-300 resize-none rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Tulis catatan atau permintaan khusus untuk layanan ini..."></textarea>
                            <p class="text-xs text-gray-500">
                                Catatan ini akan dikirim kepada penyedia layanan untuk membantu mereka memahami
                                kebutuhan Anda.
                            </p>
                        </div>

                        <!-- Contact Information -->
                        <div class="p-4 border border-blue-100 bg-blue-50 rounded-xl">
                            <div class="flex items-start gap-3">
                                <div
                                    class="w-6 h-6 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <svg class="w-3 h-3 text-blue-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="text-sm">
                                    <p class="mb-1 font-medium text-blue-900">Informasi Kontak</p>
                                    <p class="text-xs leading-relaxed text-blue-700">
                                        Setelah checkout, Anda dapat menghubungi penyedia layanan melalui:
                                    </p>
                                    <div class="mt-2 space-y-1">
                                        @if ($service->user->phone)
                                            <div class="flex items-center gap-2 text-xs text-blue-700">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                                </svg>
                                                Telefon: {{ $service->user->phone }}
                                            </div>
                                        @endif
                                        @if ($service->user->email)
                                            <div class="flex items-center gap-2 text-xs text-blue-700">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                                </svg>
                                                Email: {{ $service->user->email }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col gap-3 pt-2 sm:flex-row">
                            <button type="button" @click="showModal = false"
                                class="flex-1 py-3 text-sm font-medium text-gray-700 transition-all duration-200 bg-gray-100 hover:bg-gray-200 rounded-xl">
                                Batal
                            </button>
                            <button type="submit"
                                class="flex-1 py-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white rounded-xl font-medium transition-all duration-200 text-sm shadow-lg hover:shadow-xl transform hover:scale-[1.02]">
                                <div class="flex items-center justify-center gap-2">
                                    Checkout Sekarang
                                </div>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Service Description -->
            <div class="p-8 mb-8 bg-white shadow-md rounded-xl">
                <h2 class="mb-6 text-2xl font-bold text-gray-800">Deskripsi Layanan</h2>
                <div class="leading-relaxed prose text-gray-700 max-w-none">
                    {{ $service->description }}
                </div>
            </div>

            <!-- Reviews Section -->
            <div class="p-8 bg-white shadow-md rounded-xl">
                <div class="flex items-center justify-between mb-8">
                    <h2 class="text-2xl font-bold text-gray-800">Review Customer</h2>
                    @if ($review && count($review) > 0)
                        <div class="text-right">
                            <div class="text-sm text-gray-600">
                                {{ count($review) }} review{{ count($review) > 1 ? 's' : '' }}
                            </div>
                        </div>
                    @endif
                </div>

                @if ($review && count($review) > 0)
                    <!-- Rating Summary -->
                    <div class="p-6 mb-8 bg-gray-50 rounded-xl">
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            <div class="text-center">
                                <div class="mb-2 text-4xl font-bold text-blue-600">
                                    {{ number_format(collect($review)->avg('rating'), 1) }}
                                </div>
                                <div class="flex items-center justify-center mb-2">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <svg class="w-6 h-6 {{ $i <= round(collect($review)->avg('rating')) ? 'text-yellow-400' : 'text-gray-300' }}"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>
                                    @endfor
                                </div>
                                <div class="text-gray-600">dari {{ count($review) }} review</div>
                            </div>

                            <div class="space-y-2">
                                @for ($rating = 5; $rating >= 1; $rating--)
                                    @php
                                        $countForRating = collect($review)->where('rating', $rating)->count();
                                        $percentage = count($review) > 0 ? ($countForRating / count($review)) * 100 : 0;
                                    @endphp
                                    <div class="flex items-center gap-2">
                                        <span class="w-8 text-sm">{{ $rating }}★</span>
                                        <div class="flex-1 h-2 bg-gray-200 rounded-full">
                                            <div class="h-2 bg-yellow-400 rounded-full"
                                                style="width: {{ $percentage }}%"></div>
                                        </div>
                                        <span class="w-8 text-sm text-gray-600">{{ $countForRating }}</span>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>

                    <!-- Individual Reviews -->
                    <div class="space-y-6" x-data="{ showAll: false }">
                        @foreach ($review as $index => $rev)
                            <div class="pb-6 border-b border-gray-100 last:border-b-0"
                                x-show="showAll || {{ $index }} < {{ $maxVisible }}">
                                <div class="flex items-start gap-4">
                                    <div class="w-12 h-12 overflow-hidden rounded-full">
                                        <img class="object-cover w-full h-full saturate-50 group-hover:saturate-100"
                                            src="{{ asset('storage/' . $rev->order->buyer->profile_pic) }}"
                                            alt="Profile Picture" />
                                    </div>

                                    <div class="flex-1">
                                        <div class="flex items-center gap-2 mb-2">
                                            <h4 class="font-semibold text-gray-800">
                                                {{ $rev->order->buyer->name ?? 'Anonymous User' }}
                                            </h4>
                                            <div class="flex items-center">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <svg class="w-4 h-4 {{ $i <= $rev->rating ? 'text-yellow-400' : 'text-gray-300' }}"
                                                        fill="currentColor" viewBox="0 0 20 20">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                        </path>
                                                    </svg>
                                                @endfor
                                            </div>
                                        </div>
                                        @if ($rev->comment)
                                            <p class="mb-2 text-gray-700">{{ $rev->comment }}</p>
                                        @endif
                                        <p class="text-sm text-gray-500">
                                            {{ $rev->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @if (count($review) > $maxVisible)
                            <div class="pt-4 text-center">
                                <button @click="showAll = !showAll"
                                    class="px-4 py-2 text-sm font-medium text-blue-600 transition-all duration-200 bg-white border border-blue-600 rounded hover:bg-blue-600 hover:text-white">
                                    <span x-text="showAll ? 'Tampilkan Lebih Sedikit' : 'Tampilkan Semua'"></span>
                                </button>
                            </div>
                        @endif
                    </div>
                @else
                    <!-- No Reviews -->
                    <div class="py-12 text-center">
                        <div class="flex items-center justify-center w-24 h-24 mx-auto mb-4 bg-gray-100 rounded-full">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="mb-2 text-xl font-semibold text-gray-700">Belum Ada Review</h3>
                        <p class="text-gray-500">Jadilah yang pertama memberikan review untuk layanan ini</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-customer.app>
