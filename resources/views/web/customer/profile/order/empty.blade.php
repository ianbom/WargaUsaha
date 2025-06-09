<div class="bg-white rounded-lg shadow-sm border border-gray-200 p-12 text-center">
                    <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Belum Ada Pesanan</h3>
                    <p class="text-gray-600 mb-6">
                        @if(request('status'))
                            Tidak ada pesanan dengan status "{{ request('status') }}" ditemukan.
                        @elseif(request('search'))
                            Tidak ada pesanan ditemukan untuk pencarian "{{ request('search') }}".
                        @else
                            Anda belum memiliki pesanan. Mulai berbelanja sekarang!
                        @endif
                    </p>
                    <div class="flex justify-center gap-3">
                        <a href="/"
                           class="px-6 py-3 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                            Mulai Belanja
                        </a>
                        @if(request()->hasAny(['status', 'search', 'type', 'date_range']))
                            <a href="{{ route('customer.order.index') }}"
                               class="px-6 py-3 bg-gray-100 text-gray-700 font-medium rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors">
                                Lihat Semua Pesanan
                            </a>
                        @endif
                    </div>
                </div>
