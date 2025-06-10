<x-customer.app>
    <div class="min-h-screen py-4 bg-gray-50">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-5">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">Detail Transaksi</h1>
                        <p class="mt-1 text-gray-600">Kode Transaksi: <span
                                class="font-semibold text-blue-600">{{ $transaction->transaction_code }}</span></p>
                    </div>
                    <div class="text-right">
                        <div
                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                            @if ($transaction->payment_status === 'Paid') bg-green-100 text-green-800
                            @elseif($transaction->payment_status === 'Pending') bg-yellow-100 text-yellow-800
                            @elseif($transaction->payment_status === 'Failed') bg-red-100 text-red-800
                            @else bg-gray-100 text-gray-800 @endif">
                            @if ($transaction->payment_status === 'Paid')
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                Sudah Dibayar
                            @elseif($transaction->payment_status === 'Pending')
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                        clip-rule="evenodd" />
                                </svg>
                                Menunggu Pembayaran
                            @elseif($transaction->payment_status === 'Failed')
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                                Pembayaran Gagal
                            @else
                                Belum Dibayar
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
                <!-- Main Content -->
                <div class="space-y-6 lg:col-span-2">
                    @foreach ($transaction->groupOrders as $groupOrder)
                        <!-- Group Order Card -->
                        <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm">
                            <!-- Group Order Header -->
                            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <div
                                            class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full">
                                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-2m-2 0H7m5 0v-5a2 2 0 00-2-2H8a2 2 0 00-2 2v5m5 0V9a2 2 0 012-2h2a2 2 0 012 2v12M7 7h10" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="font-semibold text-gray-900">{{ $groupOrder->mart->name }}</h3>
                                            <p class="text-sm text-gray-600">
                                                {{ $groupOrder->mart->address ?? 'Alamat tidak tersedia' }}</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <div
                                            class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium
                                            @if ($groupOrder->order_status === 'Completed') bg-green-100 text-green-800
                                            @elseif($groupOrder->order_status === 'Paid') bg-blue-100 text-blue-800
                                            @elseif($groupOrder->order_status === 'Shipped') bg-purple-100 text-purple-800
                                            @elseif($groupOrder->order_status === 'On-Proses') bg-yellow-100 text-yellow-800
                                            @elseif($groupOrder->order_status === 'Cancelled') bg-red-100 text-red-800
                                            @else bg-gray-100 text-gray-800 @endif">
                                            {{ $groupOrder->order_status }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Orders List -->
                            <div class="p-6">
                                <div class="space-y-4">
                                    @foreach ($groupOrder->orders as $order)
                                        <div
                                            class="flex items-start p-4 space-x-4 transition-colors border border-gray-100 rounded-lg hover:bg-gray-50">
                                            <!-- Product/Service Image Placeholder -->
                                            <div
                                                class="flex items-center justify-center flex-shrink-0 w-16 h-16 bg-gray-200 rounded-lg">
                                                @if ($order->type === 'Product')
                                                    <svg class="w-8 h-8 text-gray-400" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                                    </svg>
                                                @else
                                                    <svg class="w-8 h-8 text-gray-400" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6M8 8v10l4 4 4-4V8" />
                                                    </svg>
                                                @endif
                                            </div>

                                            <!-- Product/Service Details -->
                                            <div class="flex-1 min-w-0">
                                                <div class="flex items-start justify-between">
                                                    <div>
                                                        <h4 class="font-medium text-gray-900 truncate">
                                                            {{ $order->product_name }}</h4>
                                                        <div class="flex items-center mt-1 space-x-2">
                                                            <span
                                                                class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium
                                                                @if ($order->type === 'Product') bg-blue-100 text-blue-800
                                                                @else bg-green-100 text-green-800 @endif">
                                                                {{ $order->type === 'Product' ? 'Produk' : 'Layanan' }}
                                                            </span>
                                                            @if ($order->quantity)
                                                                <span class="text-sm text-gray-600">Qty:
                                                                    {{ $order->quantity }}</span>
                                                            @endif
                                                        </div>
                                                        @if ($order->note)
                                                            <p class="mt-2 text-sm text-gray-600">
                                                                <span class="font-medium">Catatan:</span>
                                                                {{ $order->note }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                    <div class="ml-4 text-right">
                                                        <p class="text-sm text-gray-600">Rp
                                                            {{ number_format($order->product_price, 0, ',', '.') }}</p>
                                                        <p class="font-semibold text-gray-900">Rp
                                                            {{ number_format($order->total_price, 0, ',', '.') }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Group Order Summary -->
                                <div class="pt-4 mt-6 border-t border-gray-200">
                                    <div class="space-y-2">
                                        <div class="flex justify-between text-sm">
                                            <span class="text-gray-600">Subtotal</span>
                                            <span class="text-gray-900">Rp
                                                {{ number_format($groupOrder->sub_total, 0, ',', '.') }}</span>
                                        </div>
                                        @if ($groupOrder->shipping_cost)
                                            <div class="flex justify-between text-sm">
                                                <span class="text-gray-600">
                                                    Biaya Pengiriman
                                                    @if ($groupOrder->shipping_method)
                                                        <span
                                                            class="text-xs text-gray-500">({{ $groupOrder->shipping_method }})</span>
                                                    @endif
                                                </span>
                                                <span class="text-gray-900">Rp
                                                    {{ number_format($groupOrder->shipping_cost, 0, ',', '.') }}</span>
                                            </div>
                                        @endif
                                        <div class="flex justify-between pt-2 font-semibold border-t border-gray-100">
                                            <span class="text-gray-900">Total</span>
                                            <span class="text-blue-600">Rp
                                                {{ number_format($groupOrder->total_price, 0, ',', '.') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <div class="sticky bg-white border border-gray-200 rounded-lg shadow-sm top-8">
                        <div class="p-6">
                            <h3 class="mb-4 text-lg font-semibold text-gray-900">Ringkasan Pembayaran</h3>

                            <div class="mb-6 space-y-3">
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-600">Total Pesanan</span>
                                    <span class="text-gray-900">Rp
                                        {{ number_format($transaction->groupOrders->sum('sub_total'), 0, ',', '.') }}</span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-600">Biaya Pengiriman</span>
                                    <span class="text-gray-900">Rp
                                        {{ number_format($transaction->groupOrders->sum('shipping_cost'), 0, ',', '.') }}</span>
                                </div>
                                <div class="pt-3 border-t border-gray-200">
                                    <div class="flex justify-between">
                                        <span class="text-base font-semibold text-gray-900">Total Pembayaran</span>
                                        <span class="text-lg font-bold text-blue-600">Rp
                                            {{ number_format($transaction->paid_amount, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Payment Method -->
                            @if ($transaction->payment_method)
                                <div class="p-4 mb-6 rounded-lg bg-gray-50">
                                    <h4 class="mb-2 font-medium text-gray-900">Metode Pembayaran</h4>
                                    <div class="flex items-center space-x-2">
                                        <div class="flex items-center justify-center w-8 h-8 bg-blue-100 rounded">
                                            <svg class="w-4 h-4 text-blue-600" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4zM18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" />
                                            </svg>
                                        </div>
                                        <span
                                            class="text-sm font-medium text-gray-900">{{ ucfirst($transaction->payment_method) }}</span>
                                    </div>
                                </div>
                            @endif

                            <!-- Action Buttons -->
                            @if ($transaction->payment_status === 'Pending')
                                <div class="space-y-3">
                                    <!-- Pay Button -->
                                    <form action="{{ route('customer.transaction.pay', $transaction) }}"
                                        method="POST" class="w-full">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"
                                            class="flex items-center justify-center w-full px-4 py-3 font-medium text-white transition-colors bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                            </svg>
                                            Bayar Sekarang
                                        </button>
                                    </form>

                                    <!-- Cancel Button -->
                                    <form action="{{ route('customer.transaction.cancel', $transaction) }}"
                                        method="POST" class="w-full">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"
                                            class="flex items-center justify-center w-full px-4 py-3 font-medium text-red-600 transition-colors bg-white border border-red-300 rounded-lg hover:bg-red-50 hover:border-red-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                            Batalkan Pesanan
                                        </button>
                                    </form>
                                </div>
                            @elseif($transaction->payment_status === 'paid')
                                <div class="p-4 text-center rounded-lg bg-green-50">
                                    <svg class="w-12 h-12 mx-auto mb-2 text-green-500" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <p class="text-sm font-medium text-green-800">Pembayaran Berhasil</p>
                                </div>
                            @elseif($transaction->payment_status === 'cancelled')
                                <div class="p-4 text-center rounded-lg bg-red-50">
                                    <svg class="w-12 h-12 mx-auto mb-2 text-red-500" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <p class="text-sm font-medium text-red-800">Transaksi Dibatalkan</p>
                                </div>
                            @else
                                <button
                                    class="w-full px-4 py-3 font-medium text-white bg-gray-400 rounded-lg cursor-not-allowed"
                                    disabled>
                                    Tidak Tersedia
                                </button>
                            @endif

                            <!-- Transaction Info -->
                            <div class="pt-6 mt-6 border-t border-gray-200">
                                <div class="space-y-2 text-xs text-gray-500">
                                    <div class="flex justify-between">
                                        <span>Dibuat:</span>
                                        <span>{{ $transaction->created_at->format('d M Y, H:i') }}</span>
                                    </div>
                                    @if ($transaction->updated_at != $transaction->created_at)
                                        <div class="flex justify-between">
                                            <span>Diperbarui:</span>
                                            <span>{{ $transaction->updated_at->format('d M Y, H:i') }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Back Button -->
                    <div class="mt-6">
                        <a href="/"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 transition-colors bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Kembali ke Daftar Transaksi
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cancel Confirmation Modal -->
    <div id="cancelModal" class="fixed inset-0 z-50 items-center justify-center hidden bg-gray-600 bg-opacity-50">
        <div class="w-full max-w-md mx-4 bg-white rounded-lg shadow-xl">
            <div class="p-6">
                <div class="flex items-center mb-4">
                    <div class="flex items-center justify-center w-12 h-12 mr-4 bg-red-100 rounded-full">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.5 0L4.232 15.5c-.77.833.192 2.5 1.732 2.5z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Konfirmasi Pembatalan</h3>
                        <p class="text-sm text-gray-600">Apakah Anda yakin ingin membatalkan transaksi ini?</p>
                    </div>
                </div>

                <div class="p-4 mb-6 border border-yellow-200 rounded-lg bg-yellow-50">
                    <div class="flex">
                        <svg class="w-5 h-5 text-yellow-400 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                        <div class="text-sm">
                            <p class="font-medium text-yellow-800">Perhatian!</p>
                            <p class="mt-1 text-yellow-700">Setelah dibatalkan, transaksi ini tidak dapat dikembalikan
                                dan Anda perlu membuat pesanan baru.</p>
                        </div>
                    </div>
                </div>

                <div class="flex space-x-3">
                    <button onclick="hideCancelModal()"
                        class="flex-1 px-4 py-2 font-medium text-gray-800 transition-colors bg-gray-200 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                        Batal
                    </button>
                    <form action="/" method="POST" class="flex-1">
                        @csrf
                        @method('PATCH')
                        <button type="submit"
                            class="w-full px-4 py-2 font-medium text-white transition-colors bg-red-600 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                            Ya, Batalkan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showCancelModal() {
            document.getElementById('cancelModal').classList.remove('hidden');
            document.getElementById('cancelModal').classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function hideCancelModal() {
            document.getElementById('cancelModal').classList.add('hidden');
            document.getElementById('cancelModal').classList.remove('flex');
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside
        document.getElementById('cancelModal').addEventListener('click', function(e) {
            if (e.target === this) {
                hideCancelModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                hideCancelModal();
            }
        });
    </script>
</x-customer.app>
