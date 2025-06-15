<x-customer.app>
    <div class="min-h-screen py-8 bg-gray-50">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    Riwayat Lamaran
                </h2>
                <p class="mt-1 text-sm text-gray-600">
                    Pantau lowongan yang pernah anda lamar di sini
                </p>
            </div>
            <div x-data="jobsTable">
                <div class="mt-6 panel">
                    <table id="jobsTableElement" class="table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lowongan</th>
                                <th>Kategori</th>
                                <th>Gaji Atas</th>
                                <th>Gaji Bawah</th>
                                <th>Gaji diinginkan</th>
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
                                        <div class="font-semibold">{{ $job->jobVacancy?->job_title }}</div>
                                        {{-- <div class="mt-1 text-xs text-gray-500 line-clamp-2">{{ $product->description }}</div> --}}
                                    </td>
                                    <td>
                                        {{ $job->jobVacancy->jobCategory?->category_name ?? '-' }}
                                    </td>
                                    <td>Rp {{ number_format($job->jobVacancy?->salary_min, 0, ',', '.' ?? '-') }}</td>
                                    <td>Rp {{ number_format($job->jobVacancy?->salary_max, 0, ',', '.' ?? '-') }}</td>
                                    <td>Rp {{ number_format($job->proposed_salary, 0, ',', '.') }}</td>
                                    <td>
                                        @if ($job->status == 'Accepted')
                                            <span
                                                class="px-2 py-1 text-sm text-green-600 bg-green-100 rounded-full">{{ $job->status }}</span>
                                        @else
                                            <span
                                                class="px-2 py-1 text-sm text-red-600 bg-red-100 rounded-full">{{ $job->status }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $job->created_at->format('d M Y') }}</td>
                                    <td>
                                        <div class="flex items-center space-x-2">
                                            <a href="{{ route('customer.jobApply.show', $job->id) }}"
                                                class="p-2 rounded-full btn btn-sm btn-outline-info detail-btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
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
                    const jobsTable = new simpleDatatables.DataTable('#jobsTableElement', tableOptions);


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
</x-customer.app>
