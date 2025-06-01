<x-seller.app>
    <div x-data="form">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="{{ route('seller.product.index') }}" class="text-primary hover:underline">Products</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Edit Product</span>
            </li>
        </ul>
        <div class="pt-5">
            <!-- Edit Product Form -->
            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Edit Product: {{ $product->name }}</h5>
                </div>

                <!-- Display Success/Error Messages -->
                @if(session('success'))
                    <div class="alert alert-success mb-5">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger mb-5">
                        {{ session('error') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger mb-5">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="mb-5">
                    <form action="{{ route('seller.product.update', $product) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                        @csrf
                        @method('PUT')

                        <!-- Product Name and Category -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="name" class="block text-sm font-medium mb-1">Product Name <span class="text-red-500">*</span></label>
                                <input id="name" name="name" type="text" placeholder="Enter Product Name"
                                    class="form-input @error('name') border-red-500 @enderror"
                                    value="{{ old('name', $product->name) }}" required />
                                @error('name')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="product_category_id" class="block text-sm font-medium mb-1">Category <span class="text-red-500">*</span></label>
                                <select id="product_category_id" name="product_category_id"
                                    class="form-select text-white-dark @error('product_category_id') border-red-500 @enderror" required>
                                    <option value="">Choose Category...</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('product_category_id', $product->product_category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('product_category_id')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Description -->
                        <div>
                            <label for="description" class="block text-sm font-medium mb-1">Description <span class="text-red-500">*</span></label>
                            <textarea id="description" name="description" rows="4" placeholder="Enter Product Description"
                                class="form-input @error('description') border-red-500 @enderror" required>{{ old('description', $product->description) }}</textarea>
                            @error('description')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Price and Stock -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="price" class="block text-sm font-medium mb-1">Price (Rp) <span class="text-red-500">*</span></label>
                                <input id="price" name="price" type="number" step="0.01" min="0" placeholder="Enter Price"
                                    class="form-input @error('price') border-red-500 @enderror"
                                    value="{{ old('price', $product->price) }}" required />
                                @error('price')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="stock" class="block text-sm font-medium mb-1">Stock <span class="text-red-500">*</span></label>
                                <input id="stock" name="stock" type="number" min="0" placeholder="Enter Stock Quantity"
                                    class="form-input @error('stock') border-red-500 @enderror"
                                    value="{{ old('stock', $product->stock) }}" required />
                                @error('stock')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Current Image Display -->
                        <div>
                            <label class="block text-sm font-medium mb-1">Current Product Image</label>
                            <div class="flex items-start gap-4">
                                <div>
                                    <img src="{{ asset('storage/' . $product->image_url) }}"
                                         alt="{{ $product->name }}"
                                         class="w-32 h-32 object-cover rounded border border-gray-300 dark:border-gray-600" />
                                    <p class="text-xs text-gray-500 mt-1">Current image</p>
                                </div>
                                <div class="flex-1">
                                    <label for="image_url" class="block text-sm font-medium mb-1">
                                        Update Product Image <span class="text-gray-500">(optional)</span>
                                    </label>
                                    <input id="image_url" name="image_url" type="file" accept="image/jpeg,image/png,image/jpg,image/gif"
                                        class="form-input @error('image_url') border-red-500 @enderror" />
                                    <p class="text-xs text-gray-500 mt-1">Leave empty to keep current image. Allowed formats: JPEG, PNG, JPG, GIF. Max size: 2MB</p>
                                    @error('image_url')
                                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- New Image Preview -->
                        <div id="imagePreview" class="hidden">
                            <label class="block text-sm font-medium mb-1">New Image Preview</label>
                            <div class="flex items-center gap-4">
                                <img id="previewImg" src="" alt="New Image Preview" class="w-32 h-32 object-cover rounded border border-green-300">
                                <div>
                                    <p class="text-sm text-green-600 font-medium">New image selected</p>
                                    <p class="text-xs text-gray-500">This will replace the current image</p>
                                    <button type="button" onclick="clearImagePreview()" class="text-xs text-red-500 hover:text-red-700 mt-1">
                                        Remove new image
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Buttons -->
                        <div class="flex items-center gap-4 !mt-6">
                            <button type="submit" class="btn btn-primary">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ltr:mr-2 rtl:ml-2">
                                    <path d="M14 2.26953V6.40007C14 6.96012 14 7.24015 14.109 7.45406C14.2049 7.64222 14.3578 7.7952 14.546 7.89108C14.7599 8.00007 15.0399 8.00007 15.6 8.00007H19.7305M14 17H8M14 13H8M10 9H8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M20 9.98822V17.2C20 18.8802 20 19.7202 19.673 20.362C19.3854 20.9265 18.9265 21.3854 18.362 21.673C17.7202 22 16.8802 22 15.2 22H8.8C7.11984 22 6.27976 22 5.63803 21.673C5.07354 21.3854 4.6146 20.9265 4.32698 20.362C4 19.7202 4 18.8802 4 17.2V6.8C4 5.11984 4 4.27976 4.32698 3.63803C4.6146 3.07354 5.07354 2.6146 5.63803 2.32698C6.27976 2 7.11984 2 8.8 2H12.0118C12.7455 2 13.1124 2 13.4577 2.08289C13.7638 2.15638 14.0564 2.27759 14.3249 2.44208C14.6276 2.6276 14.8829 2.88289 15.3936 3.39359L19.6064 7.60641C20.1171 8.11711 20.3724 8.3724 20.5579 8.67515C20.7224 8.94356 20.8436 9.2362 20.9171 9.5423C21 9.88757 21 10.2545 21 10.9882Z" stroke="currentColor" stroke-width="1.5"/>
                                </svg>
                                Update Product
                            </button>
                            <a href="{{ route('seller.product.index') }}" class="btn btn-outline-danger">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ltr:mr-2 rtl:ml-2">
                                    <path d="M6 18L18 6M6 6l12 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                Cancel
                            </a>
                            {{-- <a href="{{ route('seller.product.show', $product) }}" class="btn btn-outline-info">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ltr:mr-2 rtl:ml-2">
                                    <path d="M15.0007 12C15.0007 13.6569 13.6576 15 12.0007 15C10.3439 15 9.00073 13.6569 9.00073 12C9.00073 10.3431 10.3439 9 12.0007 9C13.6576 9 15.0007 10.3431 15.0007 12Z" stroke="currentColor" stroke-width="1.5"/>
                                    <path d="M12.0012 21C7.52166 21 3.73324 17.8497 2.45142 12C3.73324 6.15027 7.52166 3 12.0012 3C16.4807 3 20.2691 6.15027 21.551 12C20.2691 17.8497 16.4807 21 12.0012 21Z" stroke="currentColor" stroke-width="1.5"/>
                                </svg>
                                View Product
                            </a> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- start hightlight js -->
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/highlight.min.css') }}">
    <script src="/assets/js/highlight.min.js"></script>
    <!-- end hightlight js -->

    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("form", () => ({
                // highlightjs
                codeArr: [],
                toggleCode(name) {
                    if (this.codeArr.includes(name)) {
                        this.codeArr = this.codeArr.filter((d) => d != name);
                    } else {
                        this.codeArr.push(name);

                        setTimeout(() => {
                            document.querySelectorAll('pre.code').forEach(el => {
                                hljs.highlightElement(el);
                            });
                        });
                    }
                }
            }));
        });

        // Image preview functionality
        document.getElementById('image_url').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('previewImg').src = e.target.result;
                    document.getElementById('imagePreview').classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                document.getElementById('imagePreview').classList.add('hidden');
            }
        });

        // Clear image preview function
        function clearImagePreview() {
            document.getElementById('image_url').value = '';
            document.getElementById('imagePreview').classList.add('hidden');
            document.getElementById('previewImg').src = '';
        }

        // Auto-format price input
        document.getElementById('price').addEventListener('input', function(e) {
            let value = e.target.value;
            // Remove any non-digit characters except decimal point
            value = value.replace(/[^0-9.]/g, '');
            // Ensure only one decimal point
            const parts = value.split('.');
            if (parts.length > 2) {
                value = parts[0] + '.' + parts.slice(1).join('');
            }
            e.target.value = value;
        });

        // Stock input validation
        document.getElementById('stock').addEventListener('input', function(e) {
            let value = e.target.value;
            // Remove any non-digit characters
            value = value.replace(/[^0-9]/g, '');
            e.target.value = value;
        });

        // Form validation before submit
        document.querySelector('form').addEventListener('submit', function(e) {
            const name = document.getElementById('name').value.trim();
            const description = document.getElementById('description').value.trim();
            const price = document.getElementById('price').value;
            const stock = document.getElementById('stock').value;
            const category = document.getElementById('product_category_id').value;

            if (!name || !description || !price || !stock || !category) {
                e.preventDefault();
                alert('Please fill in all required fields');
                return false;
            }

            if (parseFloat(price) <= 0) {
                e.preventDefault();
                alert('Price must be greater than 0');
                return false;
            }

            if (parseInt(stock) < 0) {
                e.preventDefault();
                alert('Stock cannot be negative');
                return false;
            }

            // Show loading state
            const submitBtn = e.target.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<svg class="animate-spin w-4 h-4 mr-2" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Updating...';
            submitBtn.disabled = true;

            // Re-enable after 10 seconds (fallback)
            setTimeout(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 10000);
        });
    </script>
</x-seller.app>
