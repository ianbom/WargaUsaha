<x-admin.app>
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">Detail Withdraw</h1>
                        <p class="mt-2 text-gray-600">Informasi lengkap transaksi withdraw</p>
                    </div>
                    <a href="{{ route('admin.withdraw.index') }}"
                       class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Withdraw Information Card -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h2 class="text-xl font-semibold text-gray-900 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v2a2 2 0 002 2z"></path>
                                </svg>
                                Informasi Withdraw
                            </h2>
                        </div>
                        <div class="px-6 py-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">ID Transaksi</label>
                                    <p class="text-gray-900 font-mono">#{{ str_pad($withdraw->id, 6, '0', STR_PAD_LEFT) }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Status</label>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                        @if($withdraw->status === 'Pending') bg-yellow-100 text-yellow-800
                                        @elseif($withdraw->status === 'Accepted') bg-green-100 text-green-800
                                        @else bg-red-100 text-red-800 @endif">
                                        @if($withdraw->status === 'Pending')
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                            </svg>
                                        @elseif($withdraw->status === 'Accepted')
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                        @else
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                            </svg>
                                        @endif
                                        {{ $withdraw->status }}
                                    </span>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Jumlah Withdraw</label>
                                    <p class="text-2xl font-bold text-green-600">Rp {{ number_format($withdraw->amount, 0, ',', '.') }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Tanggal Pengajuan</label>
                                    <p class="text-gray-900">{{ $withdraw->created_at->format('d F Y, H:i') }}</p>
                                </div>
                                @if($withdraw->withdraw_accepted_date)
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Tanggal Diterima</label>
                                    <p class="text-gray-900">{{ \Carbon\Carbon::parse($withdraw->withdraw_accepted_date)->format('d F Y, H:i') }}</p>
                                </div>
                                @endif
                                @if($withdraw->withdraw_rejected_date)
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Tanggal Ditolak</label>
                                    <p class="text-gray-900">{{ \Carbon\Carbon::parse($withdraw->withdraw_rejected_date)->format('d F Y, H:i') }}</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Bank Information Card -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h2 class="text-xl font-semibold text-gray-900 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                </svg>
                                Informasi Bank
                            </h2>
                        </div>
                        <div class="px-6 py-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Nama Bank</label>
                                    <p class="text-gray-900 font-semibold">{{ $withdraw->bank_name ?? '-' }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Nomor Rekening</label>
                                    <p class="text-gray-900 font-mono">{{ $withdraw->account_number ?? '-' }}</p>
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Nama Pemilik Rekening</label>
                                    <p class="text-gray-900 font-semibold">{{ $withdraw->account_name ?? '-' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Reason Card (if rejected) -->
                    @if($withdraw->status === 'Rejected' && $withdraw->reason)
                    <div class="bg-red-50 rounded-xl border border-red-200">
                        <div class="px-6 py-4 border-b border-red-200">
                            <h2 class="text-xl font-semibold text-red-900 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                </svg>
                                Alasan Penolakan
                            </h2>
                        </div>
                        <div class="px-6 py-4">
                            <p class="text-gray-700">{{ $withdraw->reason }}</p>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1 space-y-6">
                    <!-- User Information Card -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h2 class="text-xl font-semibold text-gray-900 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Informasi User
                            </h2>
                        </div>
                        <div class="px-6 py-4">
                            <div class="text-center mb-4">
                                @if($user->profile_pic)
                                    <img src="{{ asset('storage/' . $user->profile_pic) }}"
                                         alt="{{ $user->name }}"
                                         class="w-20 h-20 rounded-full mx-auto object-cover border-4 border-gray-100">
                                @else
                                    <div class="w-20 h-20 rounded-full mx-auto bg-gray-200 flex items-center justify-center border-4 border-gray-100">
                                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="space-y-3">
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Nama Lengkap</label>
                                    <p class="text-gray-900 font-semibold">{{ $user->name }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Email</label>
                                    <p class="text-gray-900">{{ $user->email }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Telepon</label>
                                    <p class="text-gray-900">{{ $user->phone ?? '-' }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Role</label>
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        {{ $user->role }}
                                    </span>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Status Verifikasi</label>
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium
                                        {{ $user->is_verified ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                        @if($user->is_verified)
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                            Terverifikasi
                                        @else
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                            </svg>
                                            Belum Terverifikasi
                                        @endif
                                    </span>
                                </div>
                                @if($user->address)
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Alamat</label>
                                    <p class="text-gray-900 text-sm">{{ $user->address }}</p>
                                </div>
                                @endif
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Bergabung Sejak</label>
                                    <p class="text-gray-900 text-sm">{{ $user->created_at->format('d F Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons (if pending) -->
                    @if($withdraw->status === 'Pending')
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h2 class="text-xl font-semibold text-gray-900">Aksi</h2>
                        </div>
                        <div class="px-6 py-4 space-y-3">
                            <form action="{{ route('admin.withdraw.update', $withdraw) }}" method="POST" class="w-full">
                                @csrf
                                @method('PUT')
                                <input type="text" name="status" value="Accepted" hidden >
                                <button type="submit"
                                        class="w-full bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors flex items-center justify-center"
                                        onclick="return confirm('Apakah Anda yakin ingin menerima withdraw ini?')">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Terima Withdraw
                                </button>
                            </form>

                            <form action="{{ route('admin.withdraw.update', $withdraw) }}" method="POST" class="w-full">
                                @csrf
                                @method('PUT')
                                <input type="text" name="status" value="Rejected" hidden >
                                <button type="submit"
                                        class="w-full bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors flex items-center justify-center"
                                        onclick="return confirm('Apakah Anda yakin ingin menolak withdraw ini?')">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    Tolak Withdraw
                                </button>
                            </form>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Reject Modal -->
    @if($withdraw->status === 'Pending')
    <div id="rejectModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-xl bg-white">
            <div class="mt-3">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-medium text-gray-900">Tolak Withdraw</h3>
                    <button onclick="closeRejectModal()" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <form action="/" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-4">
                        <label for="reason" class="block text-sm font-medium text-gray-700 mb-2">
                            Alasan Penolakan <span class="text-red-500">*</span>
                        </label>
                        <textarea name="reason" id="reason" rows="4" required
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"
                                  placeholder="Masukkan alasan penolakan withdraw..."></textarea>
                    </div>
                    <div class="flex gap-3">
                        <button type="button" onclick="closeRejectModal()"
                                class="flex-1 px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition-colors">
                            Batal
                        </button>
                        <button type="submit"
                                class="flex-1 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                            Tolak
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif

    <script>
        function openRejectModal() {
            document.getElementById('rejectModal').classList.remove('hidden');
        }

        function closeRejectModal() {
            document.getElementById('rejectModal').classList.add('hidden');
        }

        // Close modal when clicking outside
        document.getElementById('rejectModal')?.addEventListener('click', function(e) {
            if (e.target === this) {
                closeRejectModal();
            }
        });
    </script>
</x-admin.app>
