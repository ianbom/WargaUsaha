 <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-6" x-data="{ showFilters: false }">
                <div class="px-6 py-4 border-b border-gray-200">
                    <button @click="showFilters = !showFilters"
                            class="flex items-center justify-between w-full text-left">
                        <h3 class="text-lg font-medium text-gray-900">Filter Pencarian</h3>
                        <svg class="w-5 h-5 text-gray-500 transform transition-transform"
                             :class="{ 'rotate-180': showFilters }"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                </div>

                <div x-show="showFilters" x-transition class="p-6">
                    <form method="GET" action="{{ route('customer.order.index') }}" class="flex flex-wrap gap-4">
                        <!-- Preserve current status -->
                        <input type="hidden" name="status" value="{{ request('status') }}">

                        <div class="flex-1 min-w-48">
                            <label for="search" class="block text-sm font-medium text-gray-700 mb-2">
                                Cari Pesanan
                            </label>
                            <input type="text" name="search" id="search" value="{{ request('search') }}"
                                   placeholder="Nama produk, layanan, atau toko..."
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <div class="min-w-40">
                            <label for="type" class="block text-sm font-medium text-gray-700 mb-2">
                                Tipe
                            </label>
                            <select name="type" id="type" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Semua</option>
                                <option value="Product" {{ request('type') == 'Product' ? 'selected' : '' }}>Produk</option>
                                <option value="Service" {{ request('type') == 'Service' ? 'selected' : '' }}>Layanan</option>
                            </select>
                        </div>

                        <div class="min-w-40">
                            <label for="date_range" class="block text-sm font-medium text-gray-700 mb-2">
                                Periode
                            </label>
                            <select name="date_range" id="date_range" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Semua Waktu</option>
                                <option value="today" {{ request('date_range') == 'today' ? 'selected' : '' }}>Hari Ini</option>
                                <option value="week" {{ request('date_range') == 'week' ? 'selected' : '' }}>7 Hari Terakhir</option>
                                <option value="month" {{ request('date_range') == 'month' ? 'selected' : '' }}>30 Hari Terakhir</option>
                                <option value="3month" {{ request('date_range') == '3month' ? 'selected' : '' }}>3 Bulan Terakhir</option>
                            </select>
                        </div>

                        <div class="flex items-end gap-2">
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                Cari
                            </button>
                            <a href="{{ route('customer.order.index', ['status' => request('status')]) }}"
                               class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors">
                                Reset
                            </a>
                        </div>
                    </form>
                </div>
            </div>
