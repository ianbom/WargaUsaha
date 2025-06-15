 <div class="mb-6 bg-white border border-gray-200 rounded-lg shadow-sm">
     <div class="border-b border-gray-200">
         <nav class="flex px-6 -mb-px space-x-8" aria-label="Tabs">
             <a href="{{ route('customer.order.index', array_merge(request()->except('status'), ['status' => ''])) }}"
                 class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors {{ request('status', 'all') == 'all' || request('status') == '' ? 'border-blue-500 text-blue-600' : '' }}">
                 Semua
                 <span
                     class="bg-gray-100 text-gray-900 ml-2 py-0.5 px-2.5 rounded-full text-xs font-medium {{ request('status', 'all') == 'all' || request('status') == '' ? 'bg-blue-100 text-blue-600' : '' }}">
                     {{ $statusCounts['all'] ?? 0 }}
                 </span>
             </a>

             <a href="{{ route('customer.order.index', array_merge(request()->except('status'), ['status' => 'Pending'])) }}"
                 class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors {{ request('status') == 'Pending' ? 'border-yellow-500 text-yellow-600' : '' }}">
                 <svg class="inline w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                     <path fill-rule="evenodd"
                         d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                         clip-rule="evenodd"></path>
                 </svg>
                 Pending
                 <span class="bg-yellow-100 text-yellow-800 ml-2 py-0.5 px-2.5 rounded-full text-xs font-medium">
                     {{ $statusCounts['Pending'] ?? 0 }}
                 </span>
             </a>

             <a href="{{ route('customer.order.index', array_merge(request()->except('status'), ['status' => 'Paid'])) }}"
                 class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors {{ request('status') == 'Paid' ? 'border-blue-500 text-blue-600' : '' }}">
                 <svg class="inline w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                     <path fill-rule="evenodd"
                         d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                         clip-rule="evenodd"></path>
                 </svg>
                 Dibayar
                 <span class="bg-blue-100 text-blue-800 ml-2 py-0.5 px-2.5 rounded-full text-xs font-medium">
                     {{ $statusCounts['Paid'] ?? 0 }}
                 </span>
             </a>

             <a href="{{ route('customer.order.index', array_merge(request()->except('status'), ['status' => 'On-Proses'])) }}"
                 class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors {{ request('status') == 'On-Proses' ? 'border-purple-500 text-purple-600' : '' }}">
                 <svg class="inline w-4 h-4 mr-1 animate-spin" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M12 4v1m6.364 1.636l-.707.707M20 12h-1M18.364 18.364l-.707-.707M12 20v-1m-6.364-1.636l.707-.707M4 12h1m1.636-6.364l.707.707" />
                 </svg>
                 Diproses
                 <span class="bg-purple-100 text-purple-800 ml-2 py-0.5 px-2.5 rounded-full text-xs font-medium">
                     {{ $statusCounts['On-Proses'] ?? 0 }}
                 </span>
             </a>

             <a href="{{ route('customer.order.index', array_merge(request()->except('status'), ['status' => 'Shipped'])) }}"
                 class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors {{ request('status') == 'Shipped' ? 'border-indigo-500 text-indigo-600' : '' }}">
                 <svg class="inline w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                 </svg>
                 Dikirim
                 <span class="bg-indigo-100 text-indigo-800 ml-2 py-0.5 px-2.5 rounded-full text-xs font-medium">
                     {{ $statusCounts['Shipped'] ?? 0 }}
                 </span>
             </a>

             <a href="{{ route('customer.order.index', array_merge(request()->except('status'), ['status' => 'Completed'])) }}"
                 class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors {{ request('status') == 'Completed' ? 'border-green-500 text-green-600' : '' }}">
                 <svg class="inline w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                     <path fill-rule="evenodd"
                         d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                         clip-rule="evenodd"></path>
                 </svg>
                 Selesai
                 <span class="bg-green-100 text-green-800 ml-2 py-0.5 px-2.5 rounded-full text-xs font-medium">
                     {{ $statusCounts['Completed'] ?? 0 }}
                 </span>
             </a>

             <a href="{{ route('customer.order.index', array_merge(request()->except('status'), ['status' => 'Cancelled'])) }}"
                 class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors {{ request('status') == 'Cancelled' ? 'border-red-500 text-red-600' : '' }}">
                 <svg class="inline w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                     </path>
                 </svg>
                 Dibatalkan
                 <span class="bg-red-100 text-red-800 ml-2 py-0.5 px-2.5 rounded-full text-xs font-medium">
                     {{ $statusCounts['Cancelled'] ?? 0 }}
                 </span>
             </a>
         </nav>
     </div>
 </div>
