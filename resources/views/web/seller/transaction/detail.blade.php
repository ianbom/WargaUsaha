<x-seller.app>
    <div class="bg-gray-50">
        <div class="flex items-center justify-between">
            <div class="text-xl font-semibold text-gray-800">
                Detail Transaksi Product
            </div>
            <nav class="flex items-center space-x-2 text-sm text-gray-600">
                <a href="#" class="transition-colors text-primary hover:underline">Dashboard</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="text-gray-800">Detail Transaksi Product</span>
            </nav>
        </div>
        <div class="mx-auto">
            <!-- Header -->
            <div class="mb-8">
                <div class="flex items-center justify-between">
                    <div>
                        <a href="{{ route('seller.transaction.product') }}"
                            class="inline-flex items-center mb-2 text-sm text-gray-500 hover:text-gray-700">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7"></path>
                            </svg>
                            Kembali ke Daftar Transaksi Product
                        </a>

                        <h1 class="text-3xl font-bold text-gray-900">Detail Pesanan</h1>
                        <p class="mt-2 text-gray-600">Group Order Code {{ $groupOrder->code_group_order }}</p>
                        @if($groupOrder->transaction)
                            <p class="text-sm text-gray-500">Transaction Code : {{ $groupOrder->transaction->transaction_code }}</p>
                        @endif
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

                            @case('On-Proses')
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
                                    class="inline-flex items-center px-3 py-1 text-sm font-medium text-purple-800 bg-purple-100 rounded-full">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"></path>
                                        <path d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1V8a1 1 0 00-.293-.707L15 4.586A1 1 0 0014.414 4H14v3z"></path>
                                    </svg>
                                    Dikirim
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
                            Dipesan: {{ $groupOrder->created_at->format('d M Y, H:i') }}
                        </div>
                    </div>
                </div>
            </div>


            @include('web.seller.transaction.detail_content')

        </div>
    </div>
</x-seller.app>

<script>
    // Rating stars functionality
    document.addEventListener('DOMContentLoaded', function() {
        const stars = document.querySelectorAll('.star-btn');
        const ratingInput = document.getElementById('rating-input');
        let selectedRating = 0;

        if (stars.length > 0 && ratingInput) {
            stars.forEach((star, index) => {
                star.addEventListener('click', function() {
                    selectedRating = index + 1;
                    ratingInput.value = selectedRating;
                    updateStars(selectedRating);
                });

                star.addEventListener('mouseenter', function() {
                    updateStars(index + 1);
                });
            });

            const ratingContainer = document.getElementById('rating-stars');
            if (ratingContainer) {
                ratingContainer.addEventListener('mouseleave', function() {
                    updateStars(selectedRating);
                });
            }

            function updateStars(rating) {
                stars.forEach((star, index) => {
                    const svg = star.querySelector('svg');
                    if (svg) {
                        if (index < rating) {
                            svg.classList.remove('text-gray-300');
                            svg.classList.add('text-yellow-400');
                        } else {
                            svg.classList.remove('text-yellow-400');
                            svg.classList.add('text-gray-300');
                        }
                    }
                });
            }
        }
    });
</script>
