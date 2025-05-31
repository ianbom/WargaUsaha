<x-seller.app>

    <div>
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Users</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Account Settings</span>
            </li>
        </ul>
        <div class="pt-5">
            <div class="flex items-center justify-between mb-5">
                <h5 class="font-semibold text-lg dark:text-white-light">Settings</h5>
            </div>

            <!-- Alert Section -->
            @if (session('success'))
            <div class="alert alert-success mb-5">
                <strong>Sukses!</strong> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            @if (session('error'))
            <div class="alert alert-danger mb-5">
                <strong>Error!</strong> {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <div x-data="{ tab: 'home' }">
                <ul class="sm:flex font-semibold border-b border-[#ebedf2] dark:border-[#191e3a] mb-5 whitespace-nowrap overflow-y-auto">
                    <li class="inline-block">
                        <a href="javascript:;"
                            class="flex gap-2 p-4 border-b border-transparent hover:border-primary hover:text-primary"
                            :class="{ '!border-primary text-primary': tab == 'home' }" @click="tab='home'">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                                <path opacity="0.5"
                                    d="M2 12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274C22 8.77128 22 9.91549 22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039Z"
                                    stroke="currentColor" stroke-width="1.5" />
                                <path d="M12 15L12 18" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" />
                            </svg>
                            Home
                        </a>
                    </li>
                </ul>

                <template x-if="tab === 'home'">
                    <div>
                        <form method="POST" action="{{ route('seller.profile.update') }}" enctype="multipart/form-data"
                            class="border border-[#ebedf2] dark:border-[#191e3a] rounded-md p-4 mb-5 bg-white dark:bg-[#0e1726]">
                            @csrf
                            @method('PUT')

                            <h6 class="text-lg font-bold mb-5">General Information</h6>
                            <div class="flex flex-col sm:flex-row">
                                <div class="ltr:sm:mr-4 rtl:sm:ml-4 w-full sm:w-2/12 mb-5">
                                    <!-- Profile Picture -->
                                    <div class="relative group">
                                        <img id="profile-preview"
                                             src="{{ auth()->user()->profile_pic ? asset('storage/' . auth()->user()->profile_pic) : asset('build/images/profile-34.jpeg') }}"
                                             alt="profile"
                                             class="w-20 h-20 md:w-32 md:h-32 rounded-full object-cover mx-auto">

                                        <label for="profile_pic" class="absolute bottom-0 right-0 bg-gray-200 rounded-full p-2 cursor-pointer group-hover:bg-primary transition">
                                            <i class="ri-camera-line"></i>
                                            <input type="file" id="profile_pic" name="profile_pic" class="hidden" accept="image/*">
                                        </label>
                                    </div>
                                    @error('profile_pic')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="flex-1 grid grid-cols-1 sm:grid-cols-2 gap-5">
                                    <!-- Full Name -->
                                    <div>
                                        <label for="name">Full Name</label>
                                        <input id="name" name="name" type="text"
                                               value="{{ old('name', auth()->user()->name) }}"
                                               class="form-input @error('name') border-danger @enderror" />
                                        @error('name')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Email -->
                                    <div>
                                        <label for="email">Email</label>
                                        <input id="email" name="email" type="email"
                                               value="{{ old('email', auth()->user()->email) }}"
                                               class="form-input @error('email') border-danger @enderror" />
                                        @error('email')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Phone -->
                                    <div>
                                        <label for="phone">Phone</label>
                                        <input id="phone" name="phone" type="text"
                                               value="{{ old('phone', auth()->user()->phone) }}"
                                               class="form-input @error('phone') border-danger @enderror" />
                                        @error('phone')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Password -->
                                    <div>
                                        <label for="password">Password</label>
                                        <input id="password" name="password" type="password"
                                               placeholder="Enter new password"
                                               class="form-input @error('password') border-danger @enderror" />
                                        @error('password')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                        <small class="text-muted">Leave blank to keep current password</small>
                                    </div>

                                    <!-- Address -->
                                    <div>
                                        <label for="address">Address</label>
                                        <input id="address" name="address" type="text"
                                               value="{{ old('address', auth()->user()->address) }}"
                                               class="form-input @error('address') border-danger @enderror" />
                                        @error('address')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="profile_pic">Profile Picture</label>
                                        <input type="file" class="form-control @error('profile_pic') is-invalid @enderror"
                                                 id="profile_pic" name="profile_pic" accept="image/*">
                                          @error('profile_pic')
                                              <div class="invalid-feedback">{{ $message }}</div>
                                          @enderror
                                    </div>

                                    <!-- Location Picker (Hidden) -->
                                    <input type="hidden" id="location_lat" name="location_lat"
                                           value="{{ old('location_lat', auth()->user()->location_lat ?? '') }}">
                                    <input type="hidden" id="location_long" name="location_long"
                                           value="{{ old('location_long', auth()->user()->location_long ?? '') }}">

                                    <!-- Location Display -->
                                    <div class="sm:col-span-2">
                                        <label for="location-display">Location (Latitude/Longitude)</label>
                                        <div class="flex">
                                            <input id="location-display" type="text"
                                                   value="{{ (auth()->user()->location_lat && auth()->user()->location_long) ? auth()->user()->location_lat . ', ' . auth()->user()->location_long : 'Location not set' }}"
                                                   class="form-input flex-1" readonly>
                                            <button type="button" id="get-location-btn"
                                                    class="btn btn-primary ml-2">
                                                <i class="ri-map-pin-line"></i>
                                                <span id="location-btn-text">Get Current Location</span>
                                            </button>
                                        </div>
                                        <div id="location-status" class="mt-2 text-sm hidden"></div>
                                        @error('location_lat')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                        @error('location_long')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="sm:col-span-2 mt-3">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </template>
            </div>
        </div>
    </div>

    <script>
        // Profile picture preview
        document.getElementById('profile_pic').addEventListener('change', function(e) {
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profile-preview').src = e.target.result;
                }
                reader.readAsDataURL(this.files[0]);
            }
        });

        // Get current location
        document.getElementById('get-location-btn').addEventListener('click', function() {
            const button = this;
            const buttonText = document.getElementById('location-btn-text');
            const statusDiv = document.getElementById('location-status');

            // Disable button and show loading
            button.disabled = true;
            buttonText.textContent = 'Getting Location...';
            statusDiv.className = 'mt-2 text-sm text-blue-600';
            statusDiv.textContent = 'Requesting location access...';
            statusDiv.classList.remove('hidden');

            if (!navigator.geolocation) {
                showLocationError('Geolocation is not supported by your browser');
                return;
            }

            const options = {
                enableHighAccuracy: true,
                timeout: 10000,
                maximumAge: 60000
            };

            navigator.geolocation.getCurrentPosition(
                (position) => {
                    const lat = position.coords.latitude;
                    const lng = position.coords.longitude;

                    // Update hidden inputs
                    document.getElementById('location_lat').value = lat;
                    document.getElementById('location_long').value = lng;

                    // Update display
                    document.getElementById('location-display').value = `${lat.toFixed(6)}, ${lng.toFixed(6)}`;

                    // Show success status
                    statusDiv.className = 'mt-2 text-sm text-green-600';
                    statusDiv.textContent = `Location obtained successfully! Accuracy: ±${Math.round(position.coords.accuracy)}m`;

                    // Reset button
                    button.disabled = false;
                    buttonText.textContent = 'Update Location';
                },
                (error) => {
                    let errorMessage = '';
                    switch(error.code) {
                        case error.PERMISSION_DENIED:
                            errorMessage = 'Location access denied by user. Please enable location permissions.';
                            break;
                        case error.POSITION_UNAVAILABLE:
                            errorMessage = 'Location information is unavailable.';
                            break;
                        case error.TIMEOUT:
                            errorMessage = 'Location request timed out. Please try again.';
                            break;
                        default:
                            errorMessage = 'An unknown error occurred while retrieving location.';
                            break;
                    }
                    showLocationError(errorMessage);
                },
                options
            );

            function showLocationError(message) {
                statusDiv.className = 'mt-2 text-sm text-red-600';
                statusDiv.textContent = message;
                button.disabled = false;
                buttonText.textContent = 'Get Current Location';
            }
        });

        // Auto-hide status message after 5 seconds
        const observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.type === 'childList' || mutation.type === 'characterData') {
                    const statusDiv = document.getElementById('location-status');
                    if (statusDiv && statusDiv.textContent && statusDiv.textContent.includes('successfully')) {
                        setTimeout(() => {
                            statusDiv.classList.add('hidden');
                        }, 5000);
                    }
                }
            });
        });

        observer.observe(document.getElementById('location-status'), {
            childList: true,
            characterData: true,
            subtree: true
        });
    </script>

</x-seller.app>
