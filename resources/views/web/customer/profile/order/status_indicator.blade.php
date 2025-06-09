 @if(request('status'))
                <div class="mb-6">
                    <div class="bg-blue-50 border border-blue-200 rounded-md p-4">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-blue-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                            </svg>
                            <p class="text-sm text-blue-800">
                                Menampilkan pesanan dengan status:
                                <span class="font-semibold">
                                    @switch(request('status'))
                                        @case('Pending') Pending @break
                                        @case('Paid') Dibayar @break
                                        @case('On-Proses') Sedang Diproses @break
                                        @case('Shipped') Dikirim @break
                                        @case('Completed') Selesai @break
                                        @case('Cancelled') Dibatalkan @break
                                        @default {{ request('status') }}
                                    @endswitch
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            @endif
