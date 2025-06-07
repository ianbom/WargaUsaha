<x-admin.app>

    <script src="/assets/js/simple-datatables.js"></script>

    <div class="mb-2">
         @include('web.admin.alert.success')
    </div>

    <div x-data="usersTable">
        <div class="panel flex items-center justify-between overflow-x-auto whitespace-nowrap p-3 text-primary">
            <div class="flex items-center">
                <div class="rounded-full bg-primary p-1.5 text-white ring-2 ring-primary/30 ltr:mr-3 rtl:ml-3">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5">
                        <path d="M20 21V19C20 17.9391 19.5786 16.9217 18.8284 16.1716C18.0783 15.4214 17.0609 15 16 15H8C6.93913 15 5.92172 15.4214 5.17157 16.1716C4.42143 16.9217 4 17.9391 4 19V21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <circle cx="12" cy="7" r="4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h5 class="font-semibold text-lg">Daftar User</h5>
            </div>

            <a href="{{ route('admin.user.create') }}" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Tambah User Baru
            </a>
        </div>

        <div class="panel mt-6">
            <table id="usersTable" class="table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto Profil</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No. Telepon</th>

                        <th>Status</th>
                        <th>Admin</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key => $user)
                    <tr>
                        <td>
                            {{ $key + 1 }}
                        </td>
                        <td>
                            <div class="flex">
                                @if($user->profile_pic)
                                    <img src="{{ asset('storage/' . $user->profile_pic) }}"
                                         alt="{{ $user->name }}"
                                         class="w-12 h-12 rounded-full object-cover">
                                @else
                                    <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                        </td>
                        <td>
                            <div class="font-semibold">{{ $user->name ?? 'Nama tidak tersedia' }}</div>
                            @if($user->address)
                                <div class="text-xs text-gray-500 mt-1 line-clamp-2">{{ $user->address }}</div>
                            @endif
                        </td>
                        <td>
                            <div class="text-sm">{{ $user->email }}</div>
                            @if($user->ward && $user->ward->name)
                                <div class="text-xs text-gray-500 mt-1">{{ $user->ward->name }}</div>
                            @endif
                        </td>
                        <td>
                            {{ $user->phone ?? 'Tidak tersedia' }}
                        </td>

                        <td>
                            <span class="badge {{ $user->is_verified ? 'bg-success' : 'bg-warning' }}">
                                {{ $user->is_verified ? 'Terverifikasi' : 'Belum Verifikasi' }}
                            </span>
                        </td>
                        <td>
                            <span class="badge {{ $user->is_admin ? 'bg-purple-500' : 'bg-gray-500' }} text-white">
                                {{ $user->is_admin ? 'Admin' : 'User' }}
                            </span>
                        </td>
                        <td>{{ $user->created_at->format('d M Y') }}</td>
                        <td>
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('admin.user.show', $user) }}"
                                   class="btn btn-sm btn-outline-info p-2 rounded-full"
                                   title="Lihat Detail">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("usersTable", () => ({
                init() {
                    const tableOptions = {
                        searchable: true,
                        perPage: 10,
                        perPageSelect: [5, 10, 20, 50],
                        labels: {
                            placeholder: "Cari user...",
                            perPage: "{select} user per halaman",
                            noRows: "Tidak ada user ditemukan",
                            info: "Menampilkan {start} hingga {end} dari {rows} user"
                        },

                    };

                    const usersTable = new simpleDatatables.DataTable('#usersTable', tableOptions);
                }
            }));
        });
    </script>

</x-admin.app>
