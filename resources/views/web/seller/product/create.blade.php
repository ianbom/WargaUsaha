<x-seller.app>
    <div x-data="form">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="{{ route('seller.product.index') }}" class="text-primary hover:underline">Products</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Create Product</span>
            </li>
        </ul>
        <div class="pt-5">
            <!-- Create Product Form -->
            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Create New Product</h5>
                   
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
                    <form action="{{ route('seller.product.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                        @csrf

                        <!-- Product Name and Category -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="name" class="block text-sm font-medium mb-1">Product Name <span class="text-red-500">*</span></label>
                                <input id="name" name="name" type="text" placeholder="Enter Product Name"
                                    class="form-input @error('name') border-red-500 @enderror"
                                    value="{{ old('name') }}" required />
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
                                        <option value="{{ $category->id }}" {{ old('product_category_id') == $category->id ? 'selected' : '' }}>
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
                                class="form-input @error('description') border-red-500 @enderror" required>{{ old('description') }}</textarea>
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
                                    value="{{ old('price') }}" required />
                                @error('price')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="stock" class="block text-sm font-medium mb-1">Stock <span class="text-red-500">*</span></label>
                                <input id="stock" name="stock" type="number" min="0" placeholder="Enter Stock Quantity"
                                    class="form-input @error('stock') border-red-500 @enderror"
                                    value="{{ old('stock') }}" required />
                                @error('stock')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Product Image -->
                        <div>
                            <label for="image_url" class="block text-sm font-medium mb-1">Product Image <span class="text-red-500">*</span></label>
                            <input id="image_url" name="image_url" type="file" accept="image/jpeg,image/png,image/jpg,image/gif"
                                class="form-input @error('image_url') border-red-500 @enderror" required />
                            <p class="text-xs text-gray-500 mt-1">Allowed formats: JPEG, PNG, JPG, GIF. Max size: 2MB</p>
                            @error('image_url')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Image Preview -->
                        <div id="imagePreview" class="hidden">
                            <label class="block text-sm font-medium mb-1">Image Preview</label>
                            <img id="previewImg" src="" alt="Image Preview" class="w-32 h-32 object-cover rounded border">
                        </div>

                        <!-- Submit Buttons -->
                        <div class="flex items-center gap-4 !mt-6">
                            <button type="submit" class="btn btn-primary">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ltr:mr-2 rtl:ml-2">
                                    <path d="M12 5V19M5 12H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                Create Product
                            </button>
                            <a href="{{ route('seller.product.index') }}" class="btn btn-outline-danger">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ltr:mr-2 rtl:ml-2">
                                    <path d="M6 18L18 6M6 6l12 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                Cancel
                            </a>
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
    </script>
</x-seller.app>
