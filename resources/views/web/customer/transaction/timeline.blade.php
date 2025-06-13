<div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900">Timeline Pesanan</h3>
                        </div>
                        <div class="p-6">
                            <div class="flow-root">
                                <ul class="-mb-8">
                                    <!-- Created -->
                                    <li>
                                        <div class="relative pb-8">
                                            <div class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200"></div>
                                            <div class="relative flex space-x-3">
                                                <div>
                                                    <span
                                                        class="flex items-center justify-center w-8 h-8 bg-blue-500 rounded-full ring-8 ring-white">
                                                        <svg class="w-4 h-4 text-white" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                                    <div>
                                                        <p class="text-sm text-gray-500">Pesanan dibuat</p>
                                                    </div>
                                                    <div class="text-sm text-right text-gray-500 whitespace-nowrap">
                                                        <time datetime="{{ $order->created_at->toIso8601String() }}">
                                                            {{ $order->created_at->format('d M Y, H:i') }}
                                                        </time>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    @if ($order->type == 'Product')
                                        @if ($order->order_status == 'Paid' || $order->order_status == 'Completed')
                                            <!-- Payment Received -->
                                            <li>
                                                <div class="relative pb-8">
                                                    <div class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200">
                                                    </div>
                                                    <div class="relative flex space-x-3">
                                                        <div>
                                                            <span
                                                                class="flex items-center justify-center w-8 h-8 bg-green-500 rounded-full ring-8 ring-white">
                                                                <svg class="w-4 h-4 text-white" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M5 13l4 4L19 7"></path>
                                                                </svg>
                                                            </span>
                                                        </div>
                                                        <div
                                                            class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                                            <div>
                                                                <p class="text-sm text-gray-500">Pembayaran diterima
                                                                </p>
                                                            </div>
                                                            <div
                                                                class="text-sm text-right text-gray-500 whitespace-nowrap">
                                                                @if ($order->paid_at)
                                                                    {{ $order->paid_at ? \Carbon\Carbon::parse($order->completed_at)->format('d M Y, H:i') : '-' }}
                                                                @else
                                                                    <span class="text-yellow-600">Menunggu
                                                                        konfirmasi</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif

                                        @if ($order->order_status == 'Cancelled')
                                            <li>
                                                <div class="relative pb-8">
                                                    <!-- Garis vertikal diubah menjadi abu-abu lebih muda -->
                                                    <div class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-100">
                                                    </div>

                                                    <div class="relative flex space-x-3">
                                                        <div>
                                                            <!-- Ikon silang dengan latar abu-abu -->
                                                            <span
                                                                class="flex items-center justify-center w-8 h-8 bg-gray-300 rounded-full ring-8 ring-white">
                                                                <svg class="w-4 h-4 text-gray-600" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                                    stroke-width="2">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        d="M6 18L18 6M6 6l12 12"></path>
                                                                </svg>
                                                            </span>
                                                        </div>
                                                        <div
                                                            class="flex justify-between flex-1 min-w-0 pt-1 space-x-4">
                                                            <div>
                                                                <!-- Teks status dengan warna abu-abu -->
                                                                <p class="text-sm font-medium text-gray-500">Pesanan
                                                                    Dibatalkan</p>
                                                                <!-- Alasan pembatalan jika ada -->
                                                                @if ($order->cancellation_reason)
                                                                    <p class="mt-1 text-xs text-gray-400">
                                                                        Alasan: {{ $order->cancellation_reason }}
                                                                    </p>
                                                                @endif
                                                            </div>
                                                            <div
                                                                class="text-sm text-right text-gray-500 whitespace-nowrap">
                                                                @if ($order->cancelled_at)
                                                                    <!-- Perbaikan: gunakan cancelled_at bukan completed_at -->
                                                                    {{ \Carbon\Carbon::parse($order->cancelled_at)->format('d M Y, H:i') }}
                                                                @else
                                                                    <span class="text-gray-400">Tanpa tanggal</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif

                                        @if ($order->order_status === 'Completed')
                                            <!-- Order Completed -->
                                            <li>
                                                <div class="relative pb-8">
                                                    <div class="relative flex space-x-3">
                                                        <div>
                                                            <span
                                                                class="flex items-center justify-center w-8 h-8 bg-green-500 rounded-full ring-8 ring-white">
                                                                <svg class="w-4 h-4 text-white" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                                                    </path>
                                                                </svg>
                                                            </span>
                                                        </div>
                                                        <div
                                                            class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                                            <div>
                                                                <p class="text-sm text-gray-500">Pesanan selesai</p>
                                                            </div>
                                                            <div
                                                                class="text-sm text-right text-gray-500 whitespace-nowrap">
                                                                @if ($order->completed_at)
                                                                    {{ $order->completed_at ? \Carbon\Carbon::parse($order->completed_at)->format('d M Y, H:i') : '-' }}
                                                                @else
                                                                    {{ $order->updated_at->format('d M Y, H:i') }}
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                    @else
                                        @if ($order->order_status === 'On-Proses')
                                            <!-- Order in Process -->
                                            <li>
                                                <div class="relative pb-8">
                                                    <div class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200">
                                                    </div>
                                                    <div class="relative flex space-x-3">
                                                        <div>
                                                            <span
                                                                class="flex items-center justify-center w-8 h-8 bg-blue-500 rounded-full ring-8 ring-white">
                                                                <svg class="w-4 h-4 text-white" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M8 17l4 4 8-8"></path>
                                                                </svg>
                                                            </span>
                                                        </div>
                                                        <div
                                                            class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                                            <div>
                                                                <p class="text-sm text-gray-500">Pesanan sedang
                                                                    diproses</p>
                                                            </div>
                                                            <div
                                                                class="text-sm text-right text-gray-500 whitespace-nowrap">
                                                                {{ $order->updaton_processed_ated_at ? \Carbon\Carbon::parse($order->on_processed_at)->format('d M Y, H:i') : '-' }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif

                                        @if ($order->order_status == 'Cancelled')
                                            <li>
                                                <div class="relative pb-8">
                                                    <!-- Garis vertikal diubah menjadi abu-abu lebih muda -->
                                                    <div class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-100">
                                                    </div>

                                                    <div class="relative flex space-x-3">
                                                        <div>
                                                            <!-- Ikon silang dengan latar abu-abu -->
                                                            <span
                                                                class="flex items-center justify-center w-8 h-8 bg-gray-300 rounded-full ring-8 ring-white">
                                                                <svg class="w-4 h-4 text-gray-600" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                                    stroke-width="2">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round"
                                                                        d="M6 18L18 6M6 6l12 12"></path>
                                                                </svg>
                                                            </span>
                                                        </div>
                                                        <div
                                                            class="flex justify-between flex-1 min-w-0 pt-1 space-x-4">
                                                            <div>
                                                                <!-- Teks status dengan warna abu-abu -->
                                                                <p class="text-sm font-medium text-gray-500">Pesanan
                                                                    Dibatalkan</p>
                                                                <!-- Alasan pembatalan jika ada -->
                                                                @if ($order->cancellation_reason)
                                                                    <p class="mt-1 text-xs text-gray-400">
                                                                        Alasan: {{ $order->cancellation_reason }}
                                                                    </p>
                                                                @endif
                                                            </div>
                                                            <div
                                                                class="text-sm text-right text-gray-500 whitespace-nowrap">
                                                                @if ($order->cancelled_at)
                                                                    <!-- Perbaikan: gunakan cancelled_at bukan completed_at -->
                                                                    {{ \Carbon\Carbon::parse($order->cancelled_at)->format('d M Y, H:i') }}
                                                                @else
                                                                    <span class="text-gray-400">Tanpa tanggal</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif

                                        @if ($order->order_status === 'Completed')
                                            <li>
                                                <div class="relative pb-8">
                                                    <div class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200">
                                                    </div>
                                                    <div class="relative flex space-x-3">
                                                        <div>
                                                            <span
                                                                class="flex items-center justify-center w-8 h-8 bg-blue-500 rounded-full ring-8 ring-white">
                                                                <svg class="w-4 h-4 text-white" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M8 17l4 4 8-8"></path>
                                                                </svg>
                                                            </span>
                                                        </div>
                                                        <div
                                                            class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                                            <div>
                                                                <p class="text-sm text-gray-500">Pesanan diproses</p>
                                                            </div>
                                                            <div
                                                                class="text-sm text-right text-gray-500 whitespace-nowrap">
                                                                {{ $order->on_processed_at ? \Carbon\Carbon::parse($order->on_processed_at)->format('d M Y, H:i') : '-' }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <!-- Order Completed -->
                                            <li>
                                                <div class="relative pb-8">
                                                    <div class="relative flex space-x-3">
                                                        <div>
                                                            <span
                                                                class="flex items-center justify-center w-8 h-8 bg-green-500 rounded-full ring-8 ring-white">
                                                                <svg class="w-4 h-4 text-white" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                                                    </path>
                                                                </svg>
                                                            </span>
                                                        </div>
                                                        <div
                                                            class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                                            <div>
                                                                <p class="text-sm text-gray-500">Pesanan selesai</p>
                                                            </div>
                                                            <div
                                                                class="text-sm text-right text-gray-500 whitespace-nowrap">
                                                                @if ($order->completed_at)
                                                                    {{ $order->completed_at ? \Carbon\Carbon::parse($order->completed_at)->format('d M Y, H:i') : '-' }}
                                                                @else
                                                                    {{ $order->updated_at->format('d M Y, H:i') }}
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                    @endif


                                </ul>
                            </div>
                        </div>
                    </div>
