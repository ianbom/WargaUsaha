<x-seller.app>
    <div x-data="form">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="{{ route('seller.service.index') }}" class="text-primary hover:underline">Services</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Create Service</span>
            </li>
        </ul>
        <div class="pt-5">
            <!-- Create Service Form -->
            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="font-semibold text-lg dark:text-white-light">Create New Service</h5>

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
                    <form action="{{ route('seller.service.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                        @csrf

                        <!-- Service Title and Category -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="title" class="block text-sm font-medium mb-1">Service Title <span class="text-red-500">*</span></label>
                                <input id="title" name="title" type="text" placeholder="Enter Service Title"
                                    class="form-input @error('title') border-red-500 @enderror"
                                    value="{{ old('title') }}" required />
                                @error('title')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="service_category_id" class="block text-sm font-medium mb-1">Category <span class="text-red-500">*</span></label>
                                <select id="service_category_id" name="service_category_id"
                                    class="form-select text-white-dark @error('service_category_id') border-red-500 @enderror" required>
                                    <option value="">Choose Category...</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('service_category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('service_category_id')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Description -->
                        <div>
                            <label for="description" class="block text-sm font-medium mb-1">Description <span class="text-red-500">*</span></label>
                            <textarea id="description" name="description" rows="4" placeholder="Enter Service Description"
                                class="form-input @error('description') border-red-500 @enderror" required>{{ old('description') }}</textarea>
                            @error('description')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Price and Availability -->
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
                                <label for="is_available" class="block text-sm font-medium mb-1">Availability</label>
                                <select id="is_available" name="is_available" class="form-select text-white-dark @error('is_available') border-red-500 @enderror">
                                    <option value="1" {{ old('is_available', '1') == '1' ? 'selected' : '' }}>Available</option>
                                    <option value="0" {{ old('is_available') == '0' ? 'selected' : '' }}>Not Available</option>
                                </select>
                                @error('is_available')
                                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Service Image -->
                        <div>
                            <label for="image_url" class="block text-sm font-medium mb-1">Service Image <span class="text-red-500">*</span></label>
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
                                Create Service
                            </button>
                            <a href="{{ route('seller.service.index') }}" class="btn btn-outline-danger">
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
