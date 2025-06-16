<x-customer.app>
    <div class="min-h-screen py-4 bg-gray-50">

        @include('web.seller.alert.success')

        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-5">
                <h1 class="text-3xl font-bold text-gray-900">Keranjang Pesanan</h1>
                <p class="mt-2 text-gray-600">Kelola dan pantau semua pesanan Anda</p>
            </div>

            @if ($carts->isEmpty())
                <div class="py-12 text-center">
                    <div class="max-w-md mx-auto">
                        <svg class="w-12 h-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Keranjang kosong</h3>
                        <p class="mt-1 text-sm text-gray-500">Belum ada produk yang ditambahkan ke keranjang.</p>
                        <div class="mt-6">
                            <a href="{{ route('customer.home.indexProduct') }}"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-primary hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Mulai Belanja
                            </a>
                        </div>
                    </div>
                </div>
            @else
                <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
                    <!-- Main Content -->
                    <div class="space-y-6 lg:col-span-2">
                        @foreach ($carts as $index => $cart)
                            <div class="transition-shadow bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md"
                                data-cart-id="{{ $cart->id }}">
                                <div class="p-6">
                                    <div class="flex items-start gap-6">
                                        <div class="flex-shrink-0 pt-1">
                                            <input type="checkbox" id="product-{{ $cart->id }}"
                                                data-price="{{ $cart->product->price }}"
                                                data-cart-id="{{ $cart->id }}"
                                                class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500 product-checkbox">
                                        </div>
                                        <!-- Gambar -->
                                        <div class="flex-shrink-0">
                                            <div class="w-32 h-32 overflow-hidden bg-gray-200 rounded-lg">
                                                <img src="{{ asset('storage/' . $cart->product->image_url) }}"
                                                    alt="{{ $cart->product->name }}" class="object-cover w-full h-full">
                                            </div>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <div
                                                class="flex flex-col gap-4 lg:flex-row lg:justify-between lg:items-start">
                                                <div class="flex-1">
                                                    <h3 class="mb-1 text-xl font-semibold text-gray-900">
                                                        {{ $cart->product->name }}</h3>
                                                    <p class="mb-3 text-sm text-gray-500">
                                                        {{ $cart->product->description }}</p>

                                                    <div class="grid grid-cols-1 gap-1 mb-4 md:grid-cols-3">
                                                        <div>
                                                            <label
                                                                class="block mb-1 text-xs font-medium tracking-wide text-gray-500 uppercase">Toko</label>
                                                            <p class="text-sm font-medium text-gray-900">
                                                                {{ $cart->product->mart->name }}</p>
                                                        </div>
                                                        <div>
                                                            <label
                                                                class="block mb-1 text-xs font-medium tracking-wide text-gray-500 uppercase">Harga
                                                            </label>
                                                            <p class="text-sm font-medium text-gray-900">Rp
                                                                {{ number_format($cart->product->price, 0, ',', '.') }}
                                                            </p>
                                                        </div>
                                                        <div>
                                                            <label
                                                                class="block mb-1 text-xs font-medium tracking-wide text-gray-500 uppercase">Stock</label>
                                                            <p class="text-sm font-medium text-gray-900">
                                                                {{ $cart->product->stock }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex flex-col items-end gap-4">
                                                    <!-- Kuantitas -->
                                                    <div class="flex items-center gap-3">
                                                        <label
                                                            class="text-xs font-medium tracking-wide text-gray-500 uppercase">Kuantitas</label>
                                                        <div
                                                            class="flex items-center border border-gray-300 rounded-md">
                                                            <button type="button"
                                                                onclick="decreaseQuantity({{ $cart->id }})"
                                                                class="px-3 py-2 text-gray-600 border-gray-300 hover:bg-gray-100 disabled:opacity-50 disabled:cursor-not-allowed">
                                                                <svg class="w-4 h-4" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2" d="M20 12H4"></path>
                                                                </svg>
                                                            </button>
                                                            <input type="number" id="qty-{{ $cart->id }}"
                                                                value="{{ $cart->quantity }}" min="1"
                                                                data-cart-id="{{ $cart->id }}"
                                                                class="w-16 py-2 text-center border-0 focus:ring-0 focus:outline-none quantity-input"
                                                                onchange="updateQuantityDB({{ $cart->id }}, this.value)">
                                                            <button type="button"
                                                                onclick="increaseQuantity({{ $cart->id }})"
                                                                class="px-3 py-2 text-gray-600 border-gray-300 hover:bg-gray-100">
                                                                <svg class="w-4 h-4" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24">
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
                                                        <p class="text-2xl font-bold text-primary"
                                                            id="total-{{ $cart->id }}">
                                                            Rp
                                                            {{ number_format($cart->product->price * $cart->quantity, 0, ',', '.') }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex flex-wrap gap-2 pt-4 mt-4 border-t border-gray-200">
                                                <a href="{{ route('customer.home.showProduct', $cart->product->id) }}"
                                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 transition-colors bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                                                        </path>
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                        </path>
                                                    </svg>
                                                    Detail Produk
                                                </a>
                                                <a href="{{ route('customer.chat.detail', $cart->product->mart->user->id) }}"
                                                    type="button"
                                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 transition-colors bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                                        </path>
                                                    </svg>
                                                    Hubungi Penjual
                                                </a>
                                                <button type="button" onclick="removeItem({{ $cart->id }})"
                                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-red-600 transition-colors bg-white border border-red-300 rounded-md hover:bg-red-50">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
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
                        @endforeach
                    </div>

                    <!-- Sidebar Kanan -->
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

                        <!-- Actions -->
                        <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm">
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-900">Aksi</h3>
                            </div>
                            <div class="p-6 space-y-3">
                                <form id="checkout-form" action="{{ route('customer.cart.checkout') }}"
                                    method="POST" onsubmit="return confirmCheckout()">
                                    @csrf
                                    <!-- Hidden inputs untuk data cart yang dipilih -->
                                    <div id="selected-carts-container"></div>

                                    <button type="submit" id="checkout-btn"
                                        class="inline-flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-white transition-colors bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 disabled:opacity-50 disabled:cursor-not-allowed"
                                        disabled>
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Checkout Sekarang
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Loading Overlay -->
    <div id="loading-overlay" class="fixed inset-0 z-50 items-center justify-center hidden bg-black bg-opacity-50">
        <div class="flex items-center p-6 space-x-4 bg-white rounded-lg">
            <div class="w-8 h-8 border-b-2 border-indigo-600 rounded-full animate-spin"></div>
            <span class="text-gray-900">Memproses...</span>
        </div>
    </div>

    <script>
        // CSRF Token untuk AJAX requests
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') ||
            '{{ csrf_token() }}';

        // Menampilkan loading overlay
        function showLoading() {
            document.getElementById('loading-overlay').classList.remove('hidden');
            document.getElementById('loading-overlay').classList.add('flex');
        }

        // Menyembunyikan loading overlay
        function hideLoading() {
            document.getElementById('loading-overlay').classList.add('hidden');
            document.getElementById('loading-overlay').classList.remove('flex');
        }

        // Fungsi untuk menambah quantity
        function increaseQuantity(cartId) {
            const input = document.getElementById(`qty-${cartId}`);
            const newValue = parseInt(input.value) + 1;
            input.value = newValue;
            updateQuantityDB(cartId, newValue);
        }

        // Fungsi untuk mengurangi quantity
        function decreaseQuantity(cartId) {
            const input = document.getElementById(`qty-${cartId}`);
            const currentValue = parseInt(input.value);
            if (currentValue > 1) {
                const newValue = currentValue - 1;
                input.value = newValue;
                updateQuantityDB(cartId, newValue);
            }
        }

        // Update quantity ke database via AJAX
        function updateQuantityDB(cartId, quantity) {
            if (quantity < 1) return;

            showLoading();

            fetch(`{{ url('customer/cart') }}/${cartId}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        quantity: quantity
                    })
                })
                .then(response => response.json())
                .then(data => {
                    hideLoading();
                    if (data.success) {
                        updateItemTotal(cartId, data.price, quantity);
                        updateGrandTotal();
                    } else {
                        alert(data.message || 'Terjadi kesalahan saat memperbarui quantity');
                        // Reset input ke nilai sebelumnya jika gagal
                        location.reload();
                    }
                })
                .catch(error => {
                    hideLoading();
                    console.error('Error:', error);
                    alert('Terjadi kesalahan jaringan');
                    location.reload();
                });
        }

        // Update total harga per item
        function updateItemTotal(cartId, price, quantity) {
            const total = price * quantity;
            const totalElement = document.getElementById(`total-${cartId}`);
            if (totalElement) {
                totalElement.textContent = 'Rp ' + total.toLocaleString('id-ID');
            }
        }

        // Update grand total dan summary
        function updateGrandTotal() {
            let grandTotal = 0;
            let selectedCount = 0;
            let totalQuantity = 0;
            const selectedCarts = [];

            const checkboxes = document.querySelectorAll('.product-checkbox:checked');
            checkboxes.forEach(checkbox => {
                selectedCount++;
                const cartId = checkbox.dataset.cartId;
                const price = parseFloat(checkbox.dataset.price);
                const qtyInput = document.getElementById(`qty-${cartId}`);

                if (qtyInput) {
                    const qty = parseInt(qtyInput.value);
                    const itemTotal = qty * price;

                    totalQuantity += qty;
                    grandTotal += itemTotal;

                    // Simpan data lengkap cart yang dipilih
                    selectedCarts.push({
                        cart_id: cartId,
                        quantity: qty,
                        unit_price: price,
                        total_price: itemTotal
                    });
                }
            });

            // Update UI
            document.getElementById('selected-count').textContent = selectedCount;
            document.getElementById('total-quantity').textContent = totalQuantity;
            document.getElementById('grand-total').textContent = 'Rp ' + grandTotal.toLocaleString('id-ID');

            // Update hidden inputs untuk checkout
            updateSelectedCartsInputs(selectedCarts);

            // Enable/disable checkout button
            const checkoutBtn = document.getElementById('checkout-btn');
            checkoutBtn.disabled = selectedCount === 0;
        }

        // Update hidden inputs untuk data cart yang dipilih
        function updateSelectedCartsInputs(selectedCarts) {
            const container = document.getElementById('selected-carts-container');
            container.innerHTML = ''; // Clear existing inputs

            selectedCarts.forEach((cart, index) => {
                // Input untuk cart_id
                const cartIdInput = document.createElement('input');
                cartIdInput.type = 'hidden';
                cartIdInput.name = `selected_carts[${index}][cart_id]`;
                cartIdInput.value = cart.cart_id;
                container.appendChild(cartIdInput);

                // Input untuk quantity
                const quantityInput = document.createElement('input');
                quantityInput.type = 'hidden';
                quantityInput.name = `selected_carts[${index}][quantity]`;
                quantityInput.value = cart.quantity;
                container.appendChild(quantityInput);

                // Input untuk unit_price
                const unitPriceInput = document.createElement('input');
                unitPriceInput.type = 'hidden';
                unitPriceInput.name = `selected_carts[${index}][unit_price]`;
                unitPriceInput.value = cart.unit_price;
                container.appendChild(unitPriceInput);

                // Input untuk total_price
                const totalPriceInput = document.createElement('input');
                totalPriceInput.type = 'hidden';
                totalPriceInput.name = `selected_carts[${index}][total_price]`;
                totalPriceInput.value = cart.total_price;
                container.appendChild(totalPriceInput);
            });
        }

        // Toggle select all
        function toggleSelectAll() {
            const selectAll = document.getElementById('select-all');
            const checkboxes = document.querySelectorAll('.product-checkbox');

            checkboxes.forEach(checkbox => {
                checkbox.checked = selectAll.checked;
            });

            updateGrandTotal();
        }

        // Remove item dari cart
        function removeItem(cartId) {
            if (!confirm('Apakah Anda yakin ingin menghapus item ini dari keranjang?')) {
                return;
            }

            showLoading();

            fetch(`{{ url('/customer/cart') }}/${cartId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    hideLoading();
                    if (data.success) {
                        // Remove element dari DOM
                        const element = document.querySelector(`[data-cart-id="${cartId}"]`);
                        if (element) {
                            element.remove();
                        }

                        updateGrandTotal();
                        updateSelectAllState();

                        // Check if cart is empty
                        const remainingItems = document.querySelectorAll('.product-checkbox');
                        if (remainingItems.length === 0) {
                            location.reload(); // Reload untuk menampilkan empty state
                        }
                    } else {
                        alert(data.message || 'Terjadi kesalahan saat menghapus item');
                    }
                })
                .catch(error => {
                    hideLoading();
                    console.error('Error:', error);
                    alert('Terjadi kesalahan jaringan');
                });
        }

        // Update state checkbox select all
        function updateSelectAllState() {
            const allCheckboxes = document.querySelectorAll('.product-checkbox');
            const checkedCheckboxes = document.querySelectorAll('.product-checkbox:checked');
            const selectAllCheckbox = document.getElementById('select-all');

            if (allCheckboxes.length === 0) {
                selectAllCheckbox.checked = false;
                selectAllCheckbox.indeterminate = false;
            } else if (checkedCheckboxes.length === 0) {
                selectAllCheckbox.indeterminate = false;
                selectAllCheckbox.checked = false;
            } else if (checkedCheckboxes.length === allCheckboxes.length) {
                selectAllCheckbox.indeterminate = false;
                selectAllCheckbox.checked = true;
            } else {
                selectAllCheckbox.indeterminate = true;
            }
        }

        // Konfirmasi checkout
        function confirmCheckout() {
            const selectedCount = parseInt(document.getElementById('selected-count').textContent);

            if (selectedCount === 0) {
                alert('Pilih minimal satu item untuk checkout!');
                return false;
            }

            const grandTotal = document.getElementById('grand-total').textContent;
            return confirm(`Apakah Anda yakin checkout ${selectedCount} item dengan total ${grandTotal}?`);
        }

        // Initialize saat DOM ready
        document.addEventListener('DOMContentLoaded', function() {
            // Event listener untuk quantity inputs
            document.querySelectorAll('.quantity-input').forEach(input => {
                input.addEventListener('input', function() {
                    const cartId = this.dataset.cartId;
                    const quantity = parseInt(this.value);

                    if (quantity < 1) {
                        this.value = 1;
                        return;
                    }

                    // Debounce update untuk menghindari terlalu banyak request
                    clearTimeout(this.updateTimeout);
                    this.updateTimeout = setTimeout(() => {
                        updateQuantityDB(cartId, quantity);
                    }, 500);
                });

                // Prevent negative values
                input.addEventListener('keydown', function(e) {
                    if (e.key === '-' || e.key === 'e' || e.key === 'E') {
                        e.preventDefault();
                    }
                });
            });

            // Event listener untuk checkboxes
            document.querySelectorAll('.product-checkbox').forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    updateGrandTotal();
                    updateSelectAllState();
                });
            });

            // Initialize grand total
            updateGrandTotal();
        });
    </script>

</x-customer.app>
