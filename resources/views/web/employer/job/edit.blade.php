<x-employer.app>
    <div x-data="form">
        <div class="flex items-center justify-between ">
            <div class="text-xl font-semibold text-gray-800">
                Edit Job
            </div>
            <nav class="flex items-center space-x-2 text-sm text-gray-600">
                <a href="{{ route('employer.job.index') }}"
                    class="transition-colors text-primary hover:underline">Job</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="text-gray-800">Edit Job</span>
            </nav>
        </div>
        <div class="pt-5">
            <!-- Create Job Form -->
            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="text-lg font-semibold dark:text-white-light">Edit Job: {{ $job->job_title }}</h5>
                </div>
                <!-- Display Success/Error Messages -->
                <div class="mb-0">
                    @include('web.seller.alert.success')
                </div>
                <div class="mb-0">
                    @include('web.seller.alert.error')
                </div>
                @if ($errors->any())
                    <div class="mb-5 alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="mb-5">
                    <form action="{{ route('employer.job.update', $job) }}" method="POST"
                        enctype="multipart/form-data" class="space-y-5">
                        @csrf
                        @method('PUT')
                        <!-- Job Title and Category -->
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div>
                                <label for="job_title" class="block mb-1 text-sm font-medium">Job Title <span
                                        class="text-red-500">*</span></label>
                                <input id="job_title" name="job_title" type="text" placeholder="Enter Job Title"
                                    class="form-input @error('job_title') border-red-500 @enderror"
                                    value="{{ old('job_title', $job->job_title) }}" required />
                                @error('job_title')
                                    <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="job_category_id" class="block mb-1 text-sm font-medium">Job Category <span
                                        class="text-red-500">*</span></label>
                                <select id="job_category_id" name="job_category_id"
                                    class="form-select text-white-dark @error('job_category_id') border-red-500 @enderror"
                                    required>
                                    <option value="">Choose Category...</option>
                                    @foreach ($job_categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('job_category_id', $job->job_category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('job_category_id')
                                    <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- Job Description -->
                        <div>
                            <label for="job_description" class="block mb-1 text-sm font-medium">Job Description <span
                                    class="text-red-500">*</span></label>
                            <textarea id="job_description" name="job_description" rows="4" placeholder="Enter Job Description"
                                class="form-input @error('job_description') border-red-500 @enderror" required>{{ old('job_description', $job->job_description) }}</textarea>
                            @error('job_description')
                                <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Skill Requirement -->
                        <div>
                            <label for="skill_requirement" class="block mb-1 text-sm font-medium">Skill Requirement<span
                                    class="text-red-500">*</span></label>
                            <textarea id="skill_requirement" name="skill_requirement" rows="4" placeholder="Enter Skill Requirement"
                                class="form-input @error('skill_requirement') border-red-500 @enderror" required>{{ old('skill_requirement', $job->skill_requirement) }}</textarea>
                            @error('skill_requirement')
                                <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Salary Min and Max -->
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div>
                                <label for="salary_min" class="block mb-1 text-sm font-medium">Salary Min (Rp) <span
                                        class="text-red-500">*</span></label>
                                <input id="salary_min" name="salary_min" type="number" step="0.01" min="0"
                                    placeholder="Enter Salary"
                                    class="form-input @error('salary_min') border-red-500 @enderror"
                                    value="{{ old('salary_min', $job->salary_min) }}" required />
                                @error('salary_min')
                                    <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="salary_max" class="block mb-1 text-sm font-medium">Salary Max (Rp) <span
                                        class="text-red-500">*</span></label>
                                <input id="salary_max" name="salary_max" type="number" min="0"
                                    placeholder="Enter Salary"
                                    class="form-input @error('salary_max') border-red-500 @enderror"
                                    value="{{ old('salary_max', $job->salary_max) }}" required />
                                @error('salary_max')
                                    <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div>
                                <label for="start_date" class="block mb-1 text-sm font-medium">Start Date <span
                                        class="text-red-500">*</span></label>
                                <input id="start_date" name="start_date" type="date"
                                    class="form-input @error('start_date') border-red-500 @enderror"
                                    value="{{ old('start_date', $job->start_date) }}" required />
                                @error('start_date')
                                    <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label for="end_date" class="block mb-1 text-sm font-medium">End Date <span
                                        class="text-red-500">*</span></label>
                                <input id="end_date" name="end_date" type="date"
                                    class="form-input @error('end_date') border-red-500 @enderror"
                                    value="{{ old('end_date', $job->end_date) }}" required />
                                @error('end_date')
                                    <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <!-- Detail Location -->
                        <div>
                            <label for="location_detail" class="block mb-1 text-sm font-medium">Detail
                                Location</label>
                            <textarea id="location_detail" name="location_detail" rows="4" placeholder="Enter Detail Detail"
                                class="form-input @error('location_detail') border-red-500 @enderror" required>{{ old('location_detail', $job->location_detail) }}</textarea>
                            @error('location_detail')
                                <span class="mt-1 text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Job Document -->
                        <div class="mb-4">
                            <label for="job_document" class="block mb-2 text-sm font-medium text-gray-700">
                                Job Document <span class="text-red-500">*</span>
                            </label>
                            {{-- Tampilkan file lama jika ada --}}
                            @if ($job->job_document)
                                <div class="mb-2 text-sm text-gray-600">
                                    Current Document:
                                    <a href="{{ asset('storage/' . $job->job_document) }}" target="_blank"
                                        class="text-blue-600 underline">
                                        View Document
                                    </a>
                                </div>
                            @endif
                            <div
                                class="relative transition-colors border-2 border-gray-300 border-dashed rounded-lg bg-gray-50 hover:border-red-300">
                                <input id="job_document" name="job_document" type="file"
                                    accept="application/pdf,.pdf"
                                    class="absolute inset-0 z-10 w-full h-full opacity-0 cursor-pointer"
                                    onchange="updateFileName(this)" />

                                <div id="upload-area"
                                    class="flex flex-col items-center justify-center p-8 text-center">
                                    <svg class="w-12 h-12 mb-3 text-red-400 " fill="none" stroke="#d8d8d6"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    <p class="mb-1 text-sm text-gray-600">
                                        <span class="font-medium text-primary hover:text-red-500">Click to
                                            upload</span> or drag and drop
                                    </p>
                                    <p class="text-xs text-gray-500">PDF files only (Max 2MB)</p>
                                </div>

                                <div id="file-info"
                                    class="flex items-center justify-between hidden p-4 border-t border-red-200 bg-red-50">
                                    <div class="flex items-center">
                                        <svg class="w-6 h-6 mr-2 text-red-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <span id="file-name" class="text-sm font-medium text-gray-700"></span>
                                    </div>

                                </div>
                            </div>
                            @error('job_document')
                                <span class="flex items-center mt-2 text-xs text-red-500">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <!-- Submit Buttons -->
                        <div class="flex items-center gap-4 !mt-6">
                            <button type="submit" class="btn btn-primary">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ltr:mr-2 rtl:ml-2">
                                    <path d="M12 5V19M5 12H19" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                Create Job
                            </button>
                            <a href="{{ route('employer.job.create') }}" class="btn btn-outline-danger">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ltr:mr-2 rtl:ml-2">
                                    <path d="M6 18L18 6M6 6l12 12" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
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

        document.addEventListener('DOMContentLoaded', function() {
            const input = document.getElementById('job_document');
            const uploadArea = document.getElementById('upload-area');
            const fileInfo = document.getElementById('file-info');
            const fileName = document.getElementById('file-name');
            const uploadContainer = uploadArea.parentElement;

            function updateFileName(inputElement) {
                if (inputElement.files && inputElement.files[0]) {
                    const file = inputElement.files[0];
                    fileName.textContent = file.name;
                    uploadArea.classList.add('hidden');
                    fileInfo.classList.remove('hidden');
                }
            }

            if (input) {
                input.addEventListener('change', function() {
                    updateFileName(this);
                });

                ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                    uploadContainer.addEventListener(eventName, preventDefaults, false);
                });

                function preventDefaults(e) {
                    e.preventDefault();
                    e.stopPropagation();
                }

                ['dragenter', 'dragover'].forEach(eventName => {
                    uploadContainer.classList.add('border-red-400', 'bg-red-50');
                });

                ['dragleave', 'drop'].forEach(eventName => {
                    uploadContainer.classList.remove('border-red-400', 'bg-red-50');
                });

                uploadContainer.addEventListener('drop', handleDrop, false);

                function handleDrop(e) {
                    const dt = e.dataTransfer;
                    const files = dt.files;
                    if (files.length > 0 && files[0].type === 'application/pdf') {
                        const dataTransfer = new DataTransfer();
                        dataTransfer.items.add(files[0]);
                        input.files = dataTransfer.files;
                        updateFileName(input);
                    }
                }
            }
        });
    </script>
</x-employer.app>
