<x-admin.app>

    <script src="/assets/js/simple-datatables.js"></script>

    <div class="mb-2">
         @include('web.admin.alert.success')
    </div>

    <div x-data="userDetail">
        <!-- User Profile Card -->
        <div class="panel mb-6">
            <div class="mb-5 flex items-center justify-between">
                <h5 class="text-lg font-semibold">Detail User</h5>
                <a href="{{ route('admin.user.index') }}" class="btn btn-outline-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Profile Picture -->
                <div class="flex flex-col items-center">
                    @if($user->profile_pic)
                        <img src="{{ asset('storage/' . $user->profile_pic) }}"
                             alt="{{ $user->name }}"
                             class="w-32 h-32 rounded-full object-cover border-4 border-primary/20">
                    @else
                        <div class="w-32 h-32 rounded-full bg-gray-200 flex items-center justify-center border-4 border-primary/20">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    @endif
                    <h3 class="text-xl font-bold mt-4">{{ $user->name }}</h3>
                    <div class="flex gap-2 mt-2">
                        <span class="badge {{ $user->role === 'Seller' ? 'bg-blue-500' : 'bg-green-500' }} text-white">
                            {{ $user->role }}
                        </span>
                        <span class="badge {{ $user->is_verified ? 'bg-success' : 'bg-warning' }}">
                            {{ $user->is_verified ? 'Terverifikasi' : 'Belum Verifikasi' }}
                        </span>
                        @if($user->is_admin)
                            <span class="badge bg-purple-500 text-white">Admin</span>
                        @endif
                    </div>
                </div>

                <!-- User Information -->
                <div class="lg:col-span-2">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="text-sm font-medium text-gray-600">Email</label>
                            <p class="text-sm mt-1">{{ $user->email }}</p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-600">No. Telepon</label>
                            <p class="text-sm mt-1">{{ $user->phone ?? 'Tidak tersedia' }}</p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-600">Role</label>
                            <p class="text-sm mt-1">{{ $user->role }}</p>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-600">Bergabung</label>
                            <p class="text-sm mt-1">{{ $user->created_at->format('d M Y H:i') }}</p>
                        </div>
                        @if($user->ward)
                        <div>
                            <label class="text-sm font-medium text-gray-600">Kelurahan</label>
                            <p class="text-sm mt-1">{{ $user->ward->name }}</p>
                        </div>
                        @endif
                        <div>
                            <label class="text-sm font-medium text-gray-600">Lokasi</label>
                            <p class="text-sm mt-1">
                                @if($user->location_lat && $user->location_long)
                                    {{ $user->location_lat }}, {{ $user->location_long }}
                                @else
                                    Tidak tersedia
                                @endif
                            </p>
                        </div>
                        @if($user->address)
                        <div class="md:col-span-2">
                            <label class="text-sm font-medium text-gray-600">Alamat</label>
                            <p class="text-sm mt-1">{{ $user->address }}</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
            <div class="panel bg-gradient-to-r from-blue-500 to-blue-600 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <h5 class="text-sm font-medium opacity-90">Total Pesanan</h5>
                        <h3 class="text-2xl font-bold">{{ $user->orders->count() + $user->sales->count() }}</h3>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                </div>
            </div>

            <div class="panel bg-gradient-to-r from-green-500 to-green-600 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <h5 class="text-sm font-medium opacity-90">Sebagai Pembeli</h5>
                        <h3 class="text-2xl font-bold">{{ $user->orders->count() }}</h3>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m-2.4 0L3 3H1m6 14a1 1 0 100 2 1 1 0 000-2zm10 0a1 1 0 100 2 1 1 0 000-2z" />
                    </svg>
                </div>
            </div>

            <div class="panel bg-gradient-to-r from-purple-500 to-purple-600 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <h5 class="text-sm font-medium opacity-90">Sebagai Penjual</h5>
                        <h3 class="text-2xl font-bold">{{ $user->sales->count() }}</h3>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                    </svg>
                </div>
            </div>

            @if($user->sellerWallet)
            <div class="panel bg-gradient-to-r from-yellow-500 to-yellow-600 text-white">
                <div class="flex items-center justify-between">
                    <div>
                        <h5 class="text-sm font-medium opacity-90">Saldo Wallet</h5>
                        <h3 class="text-2xl font-bold">Rp {{ number_format($user->sellerWallet->amount, 0, ',', '.') }}</h3>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 opacity-80" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                    </svg>
                </div>
            </div>
            @endif
        </div>

        <!-- Tabs -->
        <div class="panel">
            <div class="mb-5">
                <div class="border-b border-gray-200">
                    <nav class="-mb-px flex space-x-8">
                        <button @click="switchTab('orders')"
                                :class="activeTab === 'orders' ? 'border-primary text-primary' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                                class="py-2 px-1 border-b-2 font-medium text-sm whitespace-nowrap">
                            Riwayat Pesanan
                        </button>
                        @if($user->sellerWallet)
                        <button @click="switchTab('wallet')"
                                :class="activeTab === 'wallet' ? 'border-primary text-primary' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                                class="py-2 px-1 border-b-2 font-medium text-sm whitespace-nowrap">
                            Transaksi Wallet
                        </button>
                        @endif
                    </nav>
                </div>
            </div>

            <!-- Orders Tab -->
            <div x-show="activeTab === 'orders'" class="space-y-4">
                @php
                    $allOrders = $user->orders->merge($user->sales)->sortByDesc('created_at');
                @endphp

                @if($allOrders->count() > 0)
                    <div class="overflow-x-auto">
                        <table id="ordersTable" class="table-striped table-hover w-full">
                            <thead>
                                <tr>
                                    <th>Kode Pesanan</th>
                                    <th>Jenis</th>
                                    <th>Produk/Layanan</th>
                                    <th>Peran</th>
                                    <th>Kuantitas</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($allOrders as $order)
                                <tr>
                                    <td>
                                        <span class="font-mono text-sm">{{ $order->order_code }}</span>
                                    </td>
                                    <td>
                                        <span class="badge {{ $order->type === 'Product' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                                            {{ $order->type }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($order->type === 'Product' && $order->product)
                                            {{ $order->product->name }}
                                        @elseif($order->type === 'Service' && $order->service)
                                            {{ $order->service->name }}
                                        @else
                                            <span class="text-gray-500">Data tidak tersedia</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge {{ $order->buyer_id === $user->id ? 'bg-green-500' : 'bg-blue-500' }} text-white">
                                            {{ $order->buyer_id === $user->id ? 'Pembeli' : 'Penjual' }}
                                        </span>
                                    </td>
                                    <td>{{ $order->quantity ?? '-' }}</td>
                                    <td class="font-semibold">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                                    <td>
                                        @php
                                            $statusClass = match($order->order_status) {
                                                'Pending' => 'bg-yellow-500',
                                                'Paid' => 'bg-blue-500',
                                                'Completed' => 'bg-green-500',
                                                'Cancelled' => 'bg-red-500',
                                                default => 'bg-gray-500'
                                            };
                                        @endphp
                                        <span class="badge {{ $statusClass }} text-white">{{ $order->order_status }}</span>
                                    </td>
                                    <td data-sort="{{ $order->created_at->timestamp }}">{{ $order->created_at->format('d M Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-8">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada pesanan</h3>
                        <p class="text-gray-500">User ini belum memiliki riwayat pesanan.</p>
                    </div>
                @endif
            </div>

            <!-- Wallet Tab -->
            @if($user->sellerWallet)
            <div x-show="activeTab === 'wallet'" class="space-y-6">
                <!-- Wallet Info -->
                <div class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg p-6 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-semibold mb-2">Informasi Wallet</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                                <div>
                                    <span class="opacity-90">Bank:</span>
                                    <p class="font-semibold">{{ $user->sellerWallet->bank_name ?? 'Belum diatur' }}</p>
                                </div>
                                <div>
                                    <span class="opacity-90">No. Rekening:</span>
                                    <p class="font-semibold">{{ $user->sellerWallet->account_number ?? 'Belum diatur' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="opacity-90 text-sm">Saldo Tersedia</p>
                            <p class="text-3xl font-bold">Rp {{ number_format($user->sellerWallet->amount, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Wallet Transactions -->
                @if($user->sellerWallet->transactions->count() > 0)
                    <div class="overflow-x-auto">
                        <table id="walletTable" class="table-striped table-hover w-full">
                            <thead>
                                <tr>
                                    <th>ID Transaksi</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Tanggal Diproses</th>
                                    <th>Alasan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user->sellerWallet->transactions->sortByDesc('created_at') as $transaction)
                                <tr>
                                    <td>
                                        <span class="font-mono text-sm">#{{ $transaction->id }}</span>
                                    </td>
                                    <td class="font-semibold">Rp {{ number_format($transaction->amount, 0, ',', '.') }}</td>
                                    <td>
                                        @php
                                            $statusClass = match($transaction->status) {
                                                'Pending' => 'bg-yellow-500',
                                                'Accepted' => 'bg-green-500',
                                                'Rejected' => 'bg-red-500',
                                                default => 'bg-gray-500'
                                            };
                                        @endphp
                                        <span class="badge {{ $statusClass }} text-white">{{ $transaction->status }}</span>
                                    </td>
                                    <td data-sort="{{ $transaction->created_at->timestamp }}">{{ $transaction->created_at->format('d M Y H:i') }}</td>
                                    <td data-sort="{{ $transaction->withdraw_accepted_date ? \Carbon\Carbon::parse($transaction->withdraw_accepted_date)->timestamp : ($transaction->withdraw_rejected_date ? \Carbon\Carbon::parse($transaction->withdraw_rejected_date)->timestamp : 0) }}">
                                        @if($transaction->withdraw_accepted_date)
                                            {{ \Carbon\Carbon::parse($transaction->withdraw_accepted_date)->format('d M Y H:i') }}
                                        @elseif($transaction->withdraw_rejected_date)
                                            {{ \Carbon\Carbon::parse($transaction->withdraw_rejected_date)->format('d M Y H:i') }}
                                        @else
                                            <span class="text-gray-500">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($transaction->reason)
                                            <span class="text-sm">{{ $transaction->reason }}</span>
                                        @else
                                            <span class="text-gray-500">-</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-8">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada transaksi</h3>
                        <p class="text-gray-500">User ini belum memiliki riwayat transaksi wallet.</p>
                    </div>
                @endif
            </div>
            @endif
        </div>
    </div>

    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("userDetail", () => ({
                activeTab: 'orders',
                ordersDataTable: null,
                walletDataTable: null,

                init() {
                    // Initialize orders table if it exists
                    this.$nextTick(() => {
                        if (document.getElementById('ordersTable')) {
                            this.initOrdersTable();
                        }
                    });
                },

                switchTab(tab) {
                    this.activeTab = tab;

                    // Initialize wallet table when switching to wallet tab
                    if (tab === 'wallet') {
                        this.$nextTick(() => {
                            if (document.getElementById('walletTable') && !this.walletDataTable) {
                                this.initWalletTable();
                            }
                        });
                    }
                },

                initOrdersTable() {
                    if (this.ordersDataTable) {
                        this.ordersDataTable.destroy();
                    }

                    try {
                        this.ordersDataTable = new simpleDatatables.DataTable("#ordersTable", {
                            searchable: true,
                            sortable: true,
                            perPage: 10,
                            perPageSelect: [5, 10, 20, 50],
                            labels: {
                                placeholder: "Cari dalam tabel...",
                                perPage: "Tampilkan {select} data per halaman",
                                noRows: "Tidak ada data yang ditemukan",
                                info: "Menampilkan {start} sampai {end} dari {rows} data",
                                noResults: "Tidak ada hasil yang cocok dengan pencarian Anda"
                            },
                            layout: {
                                top: "{select}{search}",
                                bottom: "{info}{pager}"
                            }
                        });
                    } catch (error) {
                        console.error('Error initializing orders table:', error);
                    }
                },

                initWalletTable() {
                    if (this.walletDataTable) {
                        this.walletDataTable.destroy();
                    }

                    try {
                        this.walletDataTable = new simpleDatatables.DataTable("#walletTable", {
                            searchable: true,
                            sortable: true,
                            perPage: 10,
                            perPageSelect: [5, 10, 20, 50],
                            labels: {
                                placeholder: "Cari dalam tabel...",
                                perPage: "Tampilkan {select} data per halaman",
                                noRows: "Tidak ada data yang ditemukan",
                                info: "Menampilkan {start} sampai {end} dari {rows} data",
                                noResults: "Tidak ada hasil yang cocok dengan pencarian Anda"
                            },
                            layout: {
                                top: "{select}{search}",
                                bottom: "{info}{pager}"
                            }
                        });
                    } catch (error) {
                        console.error('Error initializing wallet table:', error);
                    }
                }
            }));
        });
    </script>



</x-admin.app>
