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

                    <li class="inline-block">
                        <a href="javascript:;"
                            class="flex gap-2 p-4 border-b border-transparent hover:border-primary hover:text-primary"
                            :class="{ '!border-primary text-primary': tab == 'payment-details' }"
                            @click="tab='payment-details'">

                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                                <circle opacity="0.5" cx="12" cy="12" r="10"
                                    stroke="currentColor" stroke-width="1.5" />
                                <path d="M12 6V18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path
                                    d="M15 9.5C15 8.11929 13.6569 7 12 7C10.3431 7 9 8.11929 9 9.5C9 10.8807 10.3431 12 12 12C13.6569 12 15 13.1193 15 14.5C15 15.8807 13.6569 17 12 17C10.3431 17 9 15.8807 9 14.5"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                            Wallet
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

                 <template x-if="tab === 'payment-details'">
                     <div>
                         <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 mb-5">
                             <!-- Current Wallet Information -->
                             <div class="panel bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                                 <div class="mb-5">
                                     <h5 class="font-semibold text-lg mb-4 text-gray-800 dark:text-white">Current Wallet Information</h5>
                                     <p class="text-gray-600 dark:text-gray-300">Your current <span class="text-primary font-semibold">Wallet</span> details and balance information.</p>
                                 </div>
                                 <div class="mb-5 space-y-4">
                                     <!-- Wallet Balance -->
                                     <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
                                         <div class="flex items-center justify-between">
                                             <div>
                                                 <h6 class="text-gray-700 font-bold dark:text-white text-[15px]">
                                                     Current Balance
                                                 </h6>
                                                 <span class="block text-2xl font-bold text-primary mt-1">
                                                     Rp 2,500,000
                                                 </span>
                                             </div>
                                             <div class="text-right">
                                                 <span class="text-sm text-gray-500 dark:text-gray-400">Last Updated</span>
                                                 <p class="text-sm text-gray-600 dark:text-gray-300">Today, 10:30 AM</p>
                                             </div>
                                         </div>
                                     </div>

                                     <!-- Bank Information -->
                                     <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
                                         <div class="flex items-start justify-between">
                                             <div class="flex-1">
                                                 <h6 class="text-gray-700 font-bold dark:text-white text-[15px]">
                                                     Bank Account
                                                 </h6>
                                                 <div class="mt-2 space-y-1">
                                                     <p class="text-sm text-gray-600 dark:text-gray-300">
                                                         <span class="font-medium">Bank:</span> Bank Central Asia (BCA)
                                                     </p>
                                                     <p class="text-sm text-gray-600 dark:text-gray-300">
                                                         <span class="font-medium">Account:</span> 1234567890
                                                     </p>
                                                 </div>
                                             </div>
                                             <button class="btn bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700 transition-colors">Edit</button>
                                         </div>
                                     </div>
                                 </div>
                             </div>

                             <!-- Recent Transactions -->
                             <div class="panel bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                                 <div class="mb-5">
                                     <h5 class="font-semibold text-lg mb-4 text-gray-800 dark:text-white">Recent Transactions</h5>
                                     <p class="text-gray-600 dark:text-gray-300">Your latest <span class="text-primary font-semibold">Wallet</span> transaction history.</p>
                                 </div>
                                 <div class="mb-5 space-y-3">
                                     <div class="border-b border-gray-200 dark:border-gray-700 pb-3">
                                         <div class="flex items-center justify-between">
                                             <div class="flex items-center space-x-3">
                                                 <div class="w-10 h-10 rounded-full bg-green-100 dark:bg-green-900 flex items-center justify-center">
                                                     <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                     </svg>
                                                 </div>
                                                 <div>
                                                     <h6 class="text-gray-700 font-medium dark:text-white text-sm">Sale Commission</h6>
                                                     <span class="text-xs text-gray-500 dark:text-gray-400">Order #12345</span>
                                                 </div>
                                             </div>
                                             <div class="text-right">
                                                 <span class="text-green-600 dark:text-green-400 font-semibold">+Rp 150,000</span>
                                                 <p class="text-xs text-gray-500 dark:text-gray-400">2 hours ago</p>
                                             </div>
                                         </div>
                                     </div>

                                     <div class="border-b border-gray-200 dark:border-gray-700 pb-3">
                                         <div class="flex items-center justify-between">
                                             <div class="flex items-center space-x-3">
                                                 <div class="w-10 h-10 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center">
                                                     <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
                                                     </svg>
                                                 </div>
                                                 <div>
                                                     <h6 class="text-gray-700 font-medium dark:text-white text-sm">Withdrawal</h6>
                                                     <span class="text-xs text-gray-500 dark:text-gray-400">To BCA Account</span>
                                                 </div>
                                             </div>
                                             <div class="text-right">
                                                 <span class="text-red-600 dark:text-red-400 font-semibold">-Rp 500,000</span>
                                                 <p class="text-xs text-gray-500 dark:text-gray-400">1 day ago</p>
                                             </div>
                                         </div>
                                     </div>

                                     <div>
                                         <div class="flex items-center justify-between">
                                             <div class="flex items-center space-x-3">
                                                 <div class="w-10 h-10 rounded-full bg-green-100 dark:bg-green-900 flex items-center justify-center">
                                                     <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                     </svg>
                                                 </div>
                                                 <div>
                                                     <h6 class="text-gray-700 font-medium dark:text-white text-sm">Sale Commission</h6>
                                                     <span class="text-xs text-gray-500 dark:text-gray-400">Order #12344</span>
                                                 </div>
                                             </div>
                                             <div class="text-right">
                                                 <span class="text-green-600 dark:text-green-400 font-semibold">+Rp 75,000</span>
                                                 <p class="text-xs text-gray-500 dark:text-gray-400">2 days ago</p>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <button class="btn bg-primary text-white px-4 py-2 rounded hover:bg-blue-700 transition-colors w-full">View All Transactions</button>
                             </div>
                         </div>

                         <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
                             <!-- Edit Bank Account Information -->
                             <div class="panel bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                                 <div class="mb-5">
                                     <h5 class="font-semibold text-lg mb-4 text-gray-800 dark:text-white">Edit Bank Account</h5>
                                     <p class="text-gray-600 dark:text-gray-300">Update your <span class="text-primary font-semibold">Bank Account</span> information for withdrawals.</p>
                                 </div>
                              <div class="mb-5">

                                    <form method="POST" action="{{ route('seller.wallet.update', $wallet) }}">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-5">
                                            <label for="bank_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Bank Name</label>
                                            <select id="bank_name" name="bank_name" required
                                                class="form-select w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white @error('bank_name') border-danger @enderror">
                                                <option value="">Choose Bank...</option>
                                                <option value="BCA" {{ old('bank_name', $wallet->bank_name) == 'BCA' ? 'selected' : '' }}>Bank Central Asia (BCA)</option>
                                                <option value="BNI" {{ old('bank_name', $wallet->bank_name) == 'BNI' ? 'selected' : '' }}>Bank Negara Indonesia (BNI)</option>
                                                <option value="BRI" {{ old('bank_name', $wallet->bank_name) == 'BRI' ? 'selected' : '' }}>Bank Rakyat Indonesia (BRI)</option>
                                                <option value="Mandiri" {{ old('bank_name', $wallet->bank_name) == 'Mandiri' ? 'selected' : '' }}>Bank Mandiri</option>
                                                <option value="CIMB" {{ old('bank_name', $wallet->bank_name) == 'CIMB' ? 'selected' : '' }}>CIMB Niaga</option>
                                                <option value="Danamon" {{ old('bank_name', $wallet->bank_name) == 'Danamon' ? 'selected' : '' }}>Bank Danamon</option>
                                                <option value="Permata" {{ old('bank_name', $wallet->bank_name) == 'Permata' ? 'selected' : '' }}>Bank Permata</option>
                                                <option value="OCBC" {{ old('bank_name', $wallet->bank_name) == 'OCBC' ? 'selected' : '' }}>OCBC NISP</option>
                                            </select>
                                            @error('bank_name')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-5">
                                            <label for="account_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Account Number</label>
                                            <input id="account_number" name="account_number" type="text"
                                                   value="{{ old('account_number', $wallet->account_number) }}"
                                                   placeholder="Enter Account Number" required
                                                   class="form-input w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white @error('account_number') border-danger @enderror" />
                                            @error('account_number')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn bg-primary text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                                            Update Bank Account
                                        </button>
                                    </form>
                                 </div>
                             </div>

                             <!-- Withdrawal Request -->
                             <div class="panel bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                                 <div class="mb-5">
                                     <h5 class="font-semibold text-lg mb-4 text-gray-800 dark:text-white">Request Withdrawal</h5>
                                     <p class="text-gray-600 dark:text-gray-300">Withdraw funds from your <span class="text-primary font-semibold">Wallet</span> to your bank account.</p>
                                 </div>
                                 <div class="mb-5">
                                     <form>
                                         <div class="mb-5">
                                             <label for="withdrawAmount" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Withdrawal Amount</label>
                                             <div class="relative">
                                                 <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500 dark:text-gray-400">Rp</span>
                                                 <input id="withdrawAmount" type="number" placeholder="0" min="10000" max="2500000"
                                                     class="form-input w-full pl-10 pr-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white" />
                                             </div>
                                             <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Available balance: Rp 2,500,000</p>
                                         </div>
                                         <div class="mb-5">
                                             <label for="withdrawNote" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Note (Optional)</label>
                                             <textarea id="withdrawNote" rows="3" placeholder="Add a note for this withdrawal..."
                                                 class="form-input w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white resize-none"></textarea>
                                         </div>
                                         <div class="mb-5 p-4 bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-lg">
                                             <div class="flex items-start space-x-2">
                                                 <svg class="w-5 h-5 text-yellow-600 dark:text-yellow-400 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.082 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                                 </svg>
                                                 <div>
                                                     <h6 class="text-sm font-medium text-yellow-800 dark:text-yellow-300">Withdrawal Information</h6>
                                                     <p class="text-xs text-yellow-700 dark:text-yellow-400 mt-1">
                                                         • Minimum withdrawal: Rp 10,000<br>
                                                         • Processing time: 1-3 business days<br>
                                                         • No withdrawal fees
                                                     </p>
                                                 </div>
                                             </div>
                                         </div>
                                         <button type="submit" class="btn bg-primary text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors w-full">Request Withdrawal</button>
                                     </form>
                                 </div>
                             </div>
                         </div>
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
