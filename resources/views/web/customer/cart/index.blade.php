<x-customer.app>
    <div class="min-h-screen py-4 bg-gray-50">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-5">
                <h1 class="text-3xl font-bold text-gray-900">Keranjang Pesanan</h1>
                <p class="mt-2 text-gray-600">Kelola dan pantau semua pesanan Anda</p>
            </div>
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
                <!-- Main Content -->
                <div class="space-y-6 lg:col-span-2">
                    <!-- Coba Item 1 -->
                    <div class="transition-shadow bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md">
                        <div class="p-6">
                            <div class="flex items-start gap-6">
                                <div class="flex-shrink-0 pt-1">
                                    <input type="checkbox" id="product-1" data-price="19167" data-qty-id="qty-1"
                                        class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500 product-checkbox">
                                </div>
                                <!-- Gambar -->
                                <div class="flex-shrink-0">
                                    <div class="w-32 h-32 overflow-hidden bg-gray-200 rounded-lg">
                                        <img src="{{ asset('assets/images/hero-section1.png') }}" alt="Tenda 4 Person"
                                            class="object-cover w-full h-full">
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex flex-col gap-4 lg:flex-row lg:justify-between lg:items-start">
                                        <div class="flex-1">
                                            <h3 class="mb-1 text-xl font-semibold text-gray-900">Tenda 4 Person</h3>
                                            <p class="mb-3 text-sm text-gray-500">#AWOKAWOK</p>

                                            <div class="grid grid-cols-1 gap-3 mb-4 md:grid-cols-2">
                                                <div>
                                                    <label
                                                        class="block mb-1 text-xs font-medium tracking-wide text-gray-500 uppercase">Penjual</label>
                                                    <p class="text-sm font-medium text-gray-900">Argya</p>
                                                </div>
                                                <div>
                                                    <label
                                                        class="block mb-1 text-xs font-medium tracking-wide text-gray-500 uppercase">Harga
                                                        Satuan</label>
                                                    <p class="text-sm font-medium text-gray-900">Rp 1,250,000</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex flex-col items-end gap-4">
                                            <!-- Kuantitas -->
                                            <div class="flex items-center gap-3">
                                                <label
                                                    class="text-xs font-medium tracking-wide text-gray-500 uppercase">Kuantitas</label>
                                                <div class="flex items-center border border-gray-300 rounded-md">
                                                    <button onclick="decreaseQuantity('qty-1')"
                                                        class="px-3 py-2 text-gray-600 border-gray-300 hover:bg-gray-100">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M20 12H4"></path>
                                                        </svg>
                                                    </button>
                                                    <input type="number" id="qty-1" value="12" min="1"
                                                        class="w-16 py-2 text-center border-0 focus:ring-0 focus:outline-none quantity-input"
                                                        onchange="updateTotal('qty-1')">
                                                    <button onclick="increaseQuantity('qty-1')"
                                                        class="px-3 py-2 text-gray-600 border-gray-300 hover:bg-gray-100">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M12 4v16m8-8H4"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- Total  -->
                                            <div class="text-right">
                                                <label
                                                    class="block mb-1 text-xs font-medium tracking-wide text-gray-500 uppercase">Total
                                                    Harga</label>
                                                <p class="text-2xl font-bold text-primary" id="total-1">Rp 230,000
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap gap-2 pt-4 mt-4 border-t border-gray-200">
                                        <a href="#"
                                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 transition-colors bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                </path>
                                            </svg>
                                            Detail Produk
                                        </a>
                                        <button
                                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 transition-colors bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                                </path>
                                            </svg>
                                            Hubungi Penjual
                                        </button>
                                        <button onclick="removeItem('product-1')"
                                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-red-600 transition-colors bg-white border border-red-300 rounded-md hover:bg-red-50">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                            Hapus
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Coba Item 2 -->
                    <div class="transition-shadow bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md">
                        <div class="p-6">
                            <div class="flex items-start gap-6">
                                <div class="flex-shrink-0 pt-1">
                                    <input type="checkbox" id="product-2" data-price="45000" data-qty-id="qty-2"
                                        class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500 product-checkbox">
                                </div>
                                <!-- Gambar -->
                                <div class="flex-shrink-0">
                                    <div class="w-32 h-32 overflow-hidden bg-gray-200 rounded-lg">
                                        <img src="{{ asset('assets/images/hero-section1.png') }}" alt="Sleeping Bag"
                                            class="object-cover w-full h-full">
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="flex flex-col gap-4 lg:flex-row lg:justify-between lg:items-start">
                                        <div class="flex-1">
                                            <h3 class="mb-1 text-xl font-semibold text-gray-900">Sleeping Bag Winter
                                            </h3>
                                            <p class="mb-3 text-sm text-gray-500">#AWOKAWOK</p>

                                            <div class="grid grid-cols-1 gap-3 mb-4 md:grid-cols-2">
                                                <div>
                                                    <label
                                                        class="block mb-1 text-xs font-medium tracking-wide text-gray-500 uppercase">Penjual</label>
                                                    <p class="text-sm font-medium text-gray-900">OutdoorGear</p>
                                                </div>
                                                <div>
                                                    <label
                                                        class="block mb-1 text-xs font-medium tracking-wide text-gray-500 uppercase">Harga
                                                        Satuan</label>
                                                    <p class="text-sm font-medium text-gray-900">Rp 450,000</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex flex-col items-end gap-4">
                                            <!-- Kuantitas -->
                                            <div class="flex items-center gap-3">
                                                <label
                                                    class="text-xs font-medium tracking-wide text-gray-500 uppercase">Kuantitas</label>
                                                <div class="flex items-center border border-gray-300 rounded-md">
                                                    <button onclick="decreaseQuantity('qty-2')"
                                                        class="px-3 py-2 text-gray-600 border-gray-300 hover:bg-gray-100">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M20 12H4"></path>
                                                        </svg>
                                                    </button>
                                                    <input type="number" id="qty-2" value="2"
                                                        min="1"
                                                        class="w-16 py-2 text-center border-0 focus:ring-0 focus:outline-none quantity-input"
                                                        onchange="updateTotal('qty-2')">
                                                    <button onclick="increaseQuantity('qty-2')"
                                                        class="px-3 py-2 text-gray-600 border-gray-300 hover:bg-gray-100">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M12 4v16m8-8H4"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- Total -->
                                            <div class="text-right">
                                                <label
                                                    class="block mb-1 text-xs font-medium tracking-wide text-gray-500 uppercase">Total
                                                    Harga</label>
                                                <p class="text-2xl font-bold text-primary" id="total-2">Rp 90,000
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap gap-2 pt-4 mt-4 border-t border-gray-200">
                                        <a href="#"
                                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 transition-colors bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                </path>
                                            </svg>
                                            Detail Produk
                                        </a>
                                        <button
                                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 transition-colors bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                                </path>
                                            </svg>
                                            Hubungi Penjual
                                        </button>
                                        <button onclick="removeItem('product-2')"
                                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-red-600 transition-colors bg-white border border-red-300 rounded-md hover:bg-red-50">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                            Hapus
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kanan -->
                <div class="space-y-6">
                    <!-- Select All -->
                    <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold text-gray-900">Pilih Item</h3>
                                <div class="flex items-center gap-3">
                                    <input type="checkbox" id="select-all" onchange="toggleSelectAll()"
                                        class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <label for="select-all" class="text-sm font-medium text-gray-900">Pilih
                                        Semua</label>
                                </div>
                            </div>
                        </div>
                        <div class="p-6 space-y-4">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Item Terpilih:</span>
                                <span class="font-medium text-gray-900" id="selected-count">0</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Total Barang:</span>
                                <span class="font-medium text-gray-900" id="total-quantity">0</span>
                            </div>
                            <hr class="border-gray-200">
                            <div class="flex justify-between">
                                <span class="text-base font-medium text-gray-900">Total:</span>
                                <span class="text-xl font-bold text-primary" id="grand-total">Rp 0</span>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900">Aksi</h3>
                        </div>
                        <div class="p-6 space-y-3">
                            <form action="" method="POST" onsubmit="return confirmCheckout()">
                                @csrf
                                @method('PUT')
                                <input type="text" name="order_status" value="Completed" hidden>
                                <button type="submit" id="checkout-btn"
                                    class="inline-flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-white transition-colors border border-transparent rounded-md shadow-sm bg-secondary hover:bg-purple-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 disabled:opacity-50 disabled:cursor-not-allowed"
                                    disabled>
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Checkout Sekarang
                                </button>
                            </form>
                            <button
                                class="inline-flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 transition-colors bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                                Unduh Invoice
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // mapping
        const products = {
            'product-1': {
                price: 1250000,
                qtyId: 'qty-1',
                totalId: 'total-1'
            },
            'product-2': {
                price: 450000,
                qtyId: 'qty-2',
                totalId: 'total-2'
            }
        };
        // fungsi gae nambah kuantitas
        function increaseQuantity(qtyId) {
            const input = document.getElementById(qtyId);
            input.value = parseInt(input.value) + 1;
            updateTotal(qtyId);
        }
        // fungsi gae mengurangi kuantitas
        function decreaseQuantity(qtyId) {
            const input = document.getElementById(qtyId);
            if (parseInt(input.value) > 1) {
                input.value = parseInt(input.value) - 1;
                updateTotal(qtyId);
            }
        }

        function updateTotal(qtyId) {
            const qty = parseInt(document.getElementById(qtyId).value);
            // product by qtyId
            let productKey = null;
            let price = 0;
            let totalId = null;

            for (const [key, product] of Object.entries(products)) {
                if (product.qtyId === qtyId) {
                    productKey = key;
                    price = product.price;
                    totalId = product.totalId;
                    break;
                }
            }

            if (totalId) {
                const total = qty * price;
                document.getElementById(totalId).textContent = 'Rp ' + total.toLocaleString('id-ID');
            }

            updateGrandTotal();
        }

        function updateGrandTotal() {
            let grandTotal = 0;
            let selectedCount = 0;
            let totalQuantity = 0;

            const checkboxes = document.querySelectorAll('.product-checkbox');
            checkboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    selectedCount++;
                    const productId = checkbox.id;
                    const product = products[productId];

                    if (product) {
                        const qty = parseInt(document.getElementById(product.qtyId).value);
                        totalQuantity += qty;
                        grandTotal += qty * product.price;
                    }
                }
            });

            document.getElementById('selected-count').textContent = selectedCount;
            document.getElementById('total-quantity').textContent = totalQuantity;
            document.getElementById('grand-total').textContent = 'Rp ' + grandTotal.toLocaleString('id-ID');

            // enable/disable checkout button
            const checkoutBtn = document.getElementById('checkout-btn');
            checkoutBtn.disabled = selectedCount === 0;
        }

        function toggleSelectAll() {
            const selectAll = document.getElementById('select-all');
            const checkboxes = document.querySelectorAll('.product-checkbox');

            checkboxes.forEach(checkbox => {
                checkbox.checked = selectAll.checked;
            });

            updateGrandTotal();
        }

        function removeItem(productId) {
            if (confirm('Apakah Anda yakin ingin menghapus item ini dari keranjang?')) {
                const element = document.getElementById(productId).closest('.bg-white');
                element.remove();

                // remove from products object
                delete products[productId];

                updateGrandTotal();

                // check if select all should be unchecked
                const remainingCheckboxes = document.querySelectorAll('.product-checkbox');
                const selectAllCheckbox = document.getElementById('select-all');

                if (remainingCheckboxes.length === 0) {
                    selectAllCheckbox.checked = false;
                } else {
                    const allChecked = Array.from(remainingCheckboxes).every(cb => cb.checked);
                    selectAllCheckbox.checked = allChecked;
                }
            }
        }

        function confirmCheckout() {
            const selectedCount = parseInt(document.getElementById('selected-count').textContent);

            if (selectedCount === 0) {
                alert('Pilih minimal satu item untuk checkout!');
                return false;
            }

            return confirm(`Apakah Anda yakin checkout ${selectedCount} item?`);
        }

        // inisialisasi
        document.addEventListener('DOMContentLoaded', function() {
            // Add event listeners for quantity inputs
            document.querySelectorAll('.quantity-input').forEach(input => {
                input.addEventListener('input', function() {
                    updateTotal(this.id);
                });
            });

            // Add event listeners for checkboxes
            document.querySelectorAll('.product-checkbox').forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    updateGrandTotal();

                    // Update select all checkbox state
                    const allCheckboxes = document.querySelectorAll('.product-checkbox');
                    const checkedCheckboxes = document.querySelectorAll(
                    '.product-checkbox:checked');
                    const selectAllCheckbox = document.getElementById('select-all');

                    if (checkedCheckboxes.length === 0) {
                        selectAllCheckbox.indeterminate = false;
                        selectAllCheckbox.checked = false;
                    } else if (checkedCheckboxes.length === allCheckboxes.length) {
                        selectAllCheckbox.indeterminate = false;
                        selectAllCheckbox.checked = true;
                    } else {
                        selectAllCheckbox.indeterminate = true;
                    }
                });
            });

            // Initialize totals
            Object.values(products).forEach(product => {
                updateTotal(product.qtyId);
            });

            updateGrandTotal();
        });
    </script>
</x-customer.app>
