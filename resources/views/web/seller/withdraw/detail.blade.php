<x-seller.app>
    <div class="mb-2">
        @include('web.seller.alert.success')
    </div>

    <!-- Header -->
    <div class="panel">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <div class="rounded-full bg-primary p-1.5 text-white ring-2 ring-primary/30 ltr:mr-3 rtl:ml-3">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5">
                        <path d="M12 2L3 7L12 12L21 7L12 2Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M3 17L12 22L21 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M3 12L12 17L21 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h5 class="font-semibold text-lg">Detail Transaksi Withdraw</h5>
            </div>

            <a href="{{ route('seller.withdraw.index') }}" class="btn btn-outline-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
        <!-- Main Information -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Transaction Details -->
            <div class="panel">
                <div class="mb-5">
                    <h5 class="font-semibold text-lg mb-4">Informasi Transaksi</h5>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="text-sm font-medium text-gray-700 mb-1 block">ID Transaksi</label>
                        <p class="text-lg font-mono bg-gray-50 px-3 py-2 rounded">#{{ $withdraw->id }}</p>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-gray-700 mb-1 block">Jumlah Withdraw</label>
                        <p class="text-2xl font-bold text-green-600">Rp {{ number_format($withdraw->amount, 0, ',', '.') }}</p>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-gray-700 mb-1 block">Status</label>
                        @php
                            $statusClasses = [
                                'Pending' => 'bg-yellow-100 text-yellow-800 border-yellow-200',
                                'Accepted' => 'bg-green-100 text-green-800 border-green-200',
                                'Rejected' => 'bg-red-100 text-red-800 border-red-200'
                            ];
                            $statusIcons = [
                                'Pending' => '<svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/></svg>',
                                'Accepted' => '<svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>',
                                'Rejected' => '<svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>'
                            ];
                        @endphp
                        <div class="inline-flex items-center px-3 py-2 rounded-lg border {{ $statusClasses[$withdraw->status] ?? 'bg-gray-100 text-gray-800 border-gray-200' }}">
                            {!! $statusIcons[$withdraw->status] ?? '' !!}
                            <span class="ml-2 font-medium">{{ $withdraw->status }}</span>
                        </div>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-gray-700 mb-1 block">Tanggal Pengajuan</label>
                        <p class="text-sm">{{ $withdraw->created_at->format('d F Y, H:i') }} WIB</p>
                        <p class="text-xs text-gray-500">{{ $withdraw->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            </div>

            <!-- Bank Information -->
            <div class="panel">
                <div class="mb-5">
                    <h5 class="font-semibold text-lg mb-4">Informasi Rekening Bank</h5>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="text-sm font-medium text-gray-700 mb-1 block">Nama Bank</label>
                        <div class="flex items-center p-3 bg-blue-50 rounded-lg">
                            <div class="rounded-full bg-blue-500 p-2 mr-3">
                                <svg class="h-5 w-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4zM18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-blue-900">{{ $withdraw->bank_name ?? 'Tidak tersedia' }}</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-gray-700 mb-1 block">Nomor Rekening</label>
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg border border-dashed border-gray-300">
                            <span class="font-mono text-lg font-semibold">{{ $withdraw->account_number ?? 'Tidak tersedia' }}</span>
                            @if($withdraw->account_number)
                            <button onclick="copyToClipboard('{{ $withdraw->account_number }}')" class="text-blue-600 hover:text-blue-800 p-1">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                </svg>
                            </button>
                            @endif
                        </div>
                    </div>

                    <div class="md:col-span-2">
                        <label class="text-sm font-medium text-gray-700 mb-1 block">Nama Pemilik Rekening</label>
                        <p class="text-lg font-medium p-3 bg-gray-50 rounded-lg">{{ $withdraw->account_name ?? 'Tidak tersedia' }}</p>
                    </div>
                </div>
            </div>

            <!-- Reason (if rejected) -->
            @if($withdraw->status === 'Rejected' && $withdraw->reason)
            <div class="panel border-l-4 border-red-500">
                <div class="mb-3">
                    <h5 class="font-semibold text-lg text-red-700 mb-2 flex items-center">
                        <svg class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                        Alasan Penolakan
                    </h5>
                </div>
                <div class="bg-red-50 p-4 rounded-lg">
                    <p class="text-red-800">{{ $withdraw->reason }}</p>
                </div>
            </div>
            @endif
        </div>

        <!-- Timeline & Actions -->
        <div class="space-y-6">
            <!-- Timeline -->
            <div class="panel">
                <div class="mb-5">
                    <h5 class="font-semibold text-lg mb-4">Timeline Transaksi</h5>
                </div>

                <div class="space-y-4">
                    <!-- Created -->
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                            <svg class="h-4 w-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="font-medium text-gray-900">Withdraw Diajukan</p>
                            <p class="text-sm text-gray-500">{{ $withdraw->created_at->format('d F Y, H:i') }} WIB</p>
                        </div>
                    </div>

                    @if($withdraw->withdraw_accepted_date)
                    <!-- Accepted -->
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                            <svg class="h-4 w-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="font-medium text-green-700">Withdraw Disetujui</p>
                            <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($withdraw->withdraw_accepted_date)->format('d F Y, H:i') }} WIB</p>
                        </div>
                    </div>
                    @elseif($withdraw->withdraw_rejected_date)
                    <!-- Rejected -->
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-8 h-8 bg-red-500 rounded-full flex items-center justify-center">
                            <svg class="h-4 w-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="font-medium text-red-700">Withdraw Ditolak</p>
                            <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($withdraw->withdraw_rejected_date)->format('d F Y, H:i') }} WIB</p>
                        </div>
                    </div>
                    @else
                    <!-- Pending -->
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center animate-pulse">
                            <svg class="h-4 w-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="font-medium text-yellow-700">Menunggu Persetujuan</p>
                            <p class="text-sm text-gray-500">Sedang diproses...</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Action Buttons -->
            @if($withdraw->status === 'Pending')
            <div class="panel">
                <div class="mb-3">
                    <h5 class="font-semibold text-lg mb-4">Aksi</h5>
                </div>

                <div class="space-y-3">
                    <button onclick="cancelWithdraw({{ $withdraw->id }})" class="w-full btn btn-outline-danger">
                        <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        Batalkan Withdraw
                    </button>
                </div>
            </div>
            @endif

            <!-- Wallet Info -->
            <div class="panel">
                <div class="mb-3">
                    <h5 class="font-semibold text-lg mb-4">Informasi Wallet</h5>
                </div>

                <div class="bg-gradient-to-r from-blue-500 to-purple-600 p-4 rounded-lg text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm opacity-90">Wallet ID</p>
                            <p class="font-mono">#{{ $withdraw->seller_wallet_id }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm opacity-90">Tanggal Update</p>
                            <p class="text-sm">{{ $withdraw->updated_at->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function() {
                // You can add a toast notification here
                alert('Nomor rekening berhasil disalin!');
            });
        }

        function cancelWithdraw(withdrawId) {
            if (confirm('Apakah Anda yakin ingin membatalkan withdraw ini?')) {
                // Handle cancel withdraw - make AJAX call to your controller
                window.location.href = `/seller/withdraw/${withdrawId}/cancel`;
            }
        }
    </script>

</x-seller.app>
