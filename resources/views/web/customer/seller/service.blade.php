<x-customer.app>
    <div class="min-h-screen bg-gray-50">
        <!-- Breadcrumb -->
        <div class="bg-white border-b">
            <div class="max-w-7xl mx-auto px-6 py-4">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="flex items-center space-x-2">
                        <li>
                            <a href="{{ route('customer.home.showSeller', $seller) }}" class="text-gray-500 hover:text-gray-700">
                                {{ $seller->name }}
                            </a>
                        </li>
                        <li>
                            <span class="text-gray-400">/</span>
                        </li>
                        <li>
                            <span class="text-gray-900 font-medium">Layanan</span>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Header -->
        <div class="bg-white">
            <div class="max-w-7xl mx-auto px-6 py-8">
                <div class="flex items-center space-x-6">
                    <div class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center">
                        <span class="text-xl font-bold text-gray-600">
                            {{ strtoupper(substr($seller->name, 0, 1)) }}
                        </span>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">Layanan {{ $seller->name }}</h1>
                        <p class="text-gray-600">Berbagai layanan yang tersedia</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Services Grid -->
        <div class="max-w-7xl mx-auto px-6 py-8">
            @if($services->count() > 0)
                <div class="mb-6 text-sm text-gray-600">
                    {{-- Menampilkan {{ $services->count() }} dari {{ $services->total() }} layanan --}}
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($services as $service)
                        <div class="bg-white rounded-lg shadow hover:shadow-lg transition-shadow overflow-hidden">
                            <div class="aspect-video">
                                <img src="{{ asset('storage/' . $service->image_url) }}" alt="{{ $service->title }}"
                                     class="w-full h-full object-cover">
                            </div>

                            <div class="p-6">
                                <div class="flex justify-between items-start mb-3">
                                    <h3 class="font-bold text-xl text-gray-900 line-clamp-2">{{ $service->title }}</h3>
                                    @if($service->serviceCategory)
                                        <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-xs whitespace-nowrap ml-2">
                                            {{ $service->serviceCategory->name }}
                                        </span>
                                    @endif
                                </div>

                                <p class="text-gray-600 mb-4 line-clamp-3">{{ $service->description }}</p>

                                <div class="flex justify-between items-center mb-4">
                                    <div>
                                        <p class="text-2xl font-bold text-green-600">
                                            Rp {{ number_format($service->price, 0, ',', '.') }}
                                        </p>
                                        <p class="text-sm text-gray-500">Per layanan</p>
                                    </div>

                                    <div class="text-right">
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            <span class="w-2 h-2 bg-green-400 rounded-full mr-1"></span>
                                            Tersedia
                                        </span>
                                    </div>
                                </div>

                                <div class="flex space-x-2">
                                    <button class="flex-1 bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition-colors">
                                        Pesan Sekarang
                                    </button>
                                    <button class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                                        Detail
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                {{-- <div class="mt-8">
                    {{ $services->links() }}
                </div> --}}
            @else
                <div class="text-center py-12">
                    <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m8 0H8m8 0v6.5c0 .621-.504 1.125-1.125 1.125H9.125C8.504 12.625 8 12.121 8 11.5V6m8 0V4.5c0-.621-.504-1.125-1.125-1.125H9.125C8.504 3.375 8 3.879 8 4.5V6"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Belum Ada Layanan</h3>
                    <p class="text-gray-600">Penjual belum menambahkan layanan apapun.</p>
                </div>
            @endif
        </div>
    </div>

    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</x-customer.app>
