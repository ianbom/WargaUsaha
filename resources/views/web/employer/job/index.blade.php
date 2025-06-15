<x-employer.app>
    <script src="/assets/js/simple-datatables.js"></script>
    <div class="flex items-center justify-between ">
        <div class="text-xl font-semibold text-gray-800">
            Job
        </div>
        <nav class="flex items-center space-x-2 text-sm text-gray-600">
            <span class="text-gray-800">Job</span>
        </nav>
    </div>
    <div class="mb-5">
        @include('web.seller.alert.success')
    </div>
    <div x-data="jobsTable">
        <div class="flex items-center justify-between p-3 overflow-x-auto panel whitespace-nowrap text-primary">
            <div class="flex items-center">
                <div class="rounded-full bg-primary p-1.5 text-white ring-2 ring-primary/30 ltr:mr-3 rtl:ml-3">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="h-3.5 w-3.5"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 7L4 7" stroke="#fff" stroke-width="1.5" stroke-linecap="round" />
                        <path d="M15 12L4 12" stroke="#fff" stroke-width="1.5" stroke-linecap="round" />
                        <path d="M9 17H4" stroke="#fff" stroke-width="1.5" stroke-linecap="round" />
                    </svg>
                </div>
                <h5 class="text-lg font-semibold">Daftar Pekerjaan</h5>
            </div>
            <a href="{{ route('employer.job.create') }}" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Lowongan Pekerjaan Baru
            </a>
        </div>

        <div class="mt-6 panel">
            <table id="jobsTable" class="table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lowongan</th>
                        <th>Kategori</th>
                        <th>Gaji Atas</th>
                        <th>Gaji Bawah</th>
                        <th>Status</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($job_vacancies as $key => $job)
                        <tr>
                            <td>
                                {{ $key + 1 }}
                            </td>
                            <td>
                                <div class="font-semibold">{{ $job->job_title }}</div>
                                {{-- <div class="mt-1 text-xs text-gray-500 line-clamp-2">{{ $product->description }}</div> --}}
                            </td>
                            <td>
                                {{ $job->jobCategory?->category_name ?? '-' }}
                            </td>
                            <td>Rp {{ number_format($job->salary_min, 0, ',', '.' ?? '-') }}</td>
                            <td>Rp {{ number_format($job->salary_max, 0, ',', '.' ?? '-') }}</td>
                            <td>
                                @if ($job->job_status == 'Open')
                                    <span
                                        class="px-2 py-1 text-sm text-green-600 bg-green-100 rounded-full">{{ $job->job_status }}</span>
                                @else
                                    <span
                                        class="px-2 py-1 text-sm text-red-600 bg-red-100 rounded-full">{{ $job->job_status }}</span>
                                @endif
                            </td>
                            <td>{{ $job->created_at->format('d M Y') }}</td>
                            <td>
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('employer.job.show', $job) }}"
                                        class="p-2 rounded-full btn btn-sm btn-outline-info detail-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </a>
                                    <div x-data="{ showModal: false }">
                                        <button @click="showModal = true"
                                            class="flex items-center justify-center p-2 rounded-full btn btn-sm btn-outline-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </button>
                                        <!-- Modal -->
                                        <div x-show="showModal" x-cloak
                                            class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                                            <div @click.away="showModal = false"
                                                class="w-full max-w-md p-6 bg-white rounded-lg shadow-xl">
                                                <h2 class="mb-4 text-lg font-semibold text-center">Status Pekerjaan
                                                </h2>
                                                <form action="{{ route('employer.job.updateStatus', $job->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <label class="block mb-2 text-sm">Pilih Status:</label>
                                                    <select name="job_status" class="w-full p-2 mb-4 border rounded">
                                                        <option value="Open">Open</option>
                                                        <option value="Closed">Closed</option>
                                                    </select>

                                                    <div class="flex justify-end gap-2">
                                                        <button type="button" @click="showModal = false"
                                                            class="px-4 py-2 text-sm bg-gray-200 rounded">Batal</button>
                                                        <button type="submit"
                                                            class="px-4 py-2 text-sm text-white bg-blue-600 rounded hover:bg-blue-700">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                if (!confirm('Apakah kamu yakin ingin menghapus data ini?')) {
                    e.preventDefault();
                } else {
                    this.closest('form').submit();
                }
            });
        });

        document.addEventListener("alpine:init", () => {
            Alpine.data("jobsTable", () => ({
                init() {
                    const tableOptions = {
                        searchable: true,
                        perPage: 10,
                        perPageSelect: [5, 10, 20, 50],
                        labels: {
                            placeholder: "Cari pekerjaan...",
                            perPage: "{select} pekerjaan per halaman",
                            noRows: "Tidak ada pekerjaan ditemukan",
                            info: "Menampilkan {start} hingga {end} dari {rows} pekerjaan"
                        },
                        columns: [{
                                select: 0,
                            },
                            {
                                select: 1,
                                sortable: false
                            },
                            {
                                select: 2
                            },
                            {
                                select: 3
                            },
                            {
                                select: 4
                            },
                            {
                                select: 5
                            },
                            {
                                select: 6
                            },
                            {
                                select: 7,
                                sortable: false
                            }
                        ]
                    };

                    const jobsTable = new simpleDatatables.DataTable('#jobsTable',
                        tableOptions);

                    // Konfirmasi hapus produk
                    document.querySelectorAll('.delete-btn').forEach(button => {
                        button.addEventListener('click', function(e) {
                            e.preventDefault();
                            const form = this.closest('form');

                            Swal.fire({
                                title: 'Hapus Produk?',
                                text: "Anda tidak akan dapat mengembalikan ini!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonText: 'Ya, Hapus!',
                                cancelButtonText: 'Batal',
                                customClass: {
                                    confirmButton: 'btn btn-danger',
                                    cancelButton: 'btn btn-outline-secondary ml-2'
                                },
                                buttonsStyling: false
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    form.submit();
                                }
                            });
                        });
                    });
                }
            }));
        });
    </script>
</x-employer.app>
