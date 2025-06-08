<x-seller.app>
    <div>
        <div class="flex items-center justify-between ">
            <div class="text-xl font-semibold text-gray-800">
                Account Settings
            </div>
            <nav class="flex items-center space-x-2 text-sm text-gray-600">
                <a href="#" class="transition-colors text-primary hover:underline">Users</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="text-gray-800">Account Settings</span>
            </nav>
        </div>
        <div class="pt-5">
            <!-- Alert Section -->
            <div class="mb-0">
                @include('web.seller.alert.success')
            </div>

            @if (session('error'))
                <div class="mb-5 alert alert-danger">
                    <strong>Error!</strong> {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div x-data="{ tab: 'home' }">
                <ul
                    class="sm:flex font-semibold bg-white border-b border-[#ebedf2] dark:border-[#191e3a] mb-5 whitespace-nowrap overflow-y-auto rounded-md">
                    <li class="inline-block">
                        <a href="javascript:;"
                            class="flex gap-2 p-4 border-b border-transparent hover:border-primary hover:text-primary"
                            :class="{ '!border-primary text-primary': tab == 'home' }" @click="tab='home'">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
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
                                <circle opacity="0.5" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="1.5" />
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

                            <h6 class="mb-5 text-lg font-bold">General Information</h6>
                            <div class="flex flex-col sm:flex-row">
                                <div class="w-full mb-5 ltr:sm:mr-4 rtl:sm:ml-4 sm:w-2/12">
                                    <!-- Profile Picture -->
                                    <div class="relative group">
                                        <img id="profile-preview"
                                            src="{{ auth()->user()->profile_pic ? asset('storage/' . auth()->user()->profile_pic) : asset('build/images/profile-34.jpeg') }}"
                                            alt="profile"
                                            class="object-cover w-20 h-20 mx-auto rounded-full md:w-32 md:h-32">
                                        <label for="profile_pic"
                                            class="absolute bottom-0 right-0 p-2 transition rounded-full cursor-pointer bg-primary hover:bg-blue-700">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round" />
                                                <path
                                                    d="M2 12.5001L3.75159 10.9675C4.66286 10.1702 6.03628 10.2159 6.89249 11.0721L11.1822 15.3618C11.8694 16.0491 12.9512 16.1428 13.7464 15.5839L14.0446 15.3744C15.1888 14.5702 16.7369 14.6634 17.7765 15.599L21 18.5001"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round" />
                                                <path
                                                    d="M18.562 2.9354L18.9791 2.5183C19.6702 1.82723 20.7906 1.82723 21.4817 2.5183C22.1728 3.20937 22.1728 4.32981 21.4817 5.02087L21.0646 5.43797M18.562 2.9354C18.562 2.9354 18.6142 3.82172 19.3962 4.60378C20.1783 5.38583 21.0646 5.43797 21.0646 5.43797M18.562 2.9354L14.7275 6.76995C14.4677 7.02968 14.3379 7.15954 14.2262 7.30273C14.0945 7.47163 13.9815 7.65439 13.8894 7.84776C13.8112 8.01169 13.7532 8.18591 13.637 8.53437L13.2651 9.65M21.0646 5.43797L17.23 9.27253C16.9703 9.53225 16.8405 9.66211 16.6973 9.7738C16.5284 9.90554 16.3456 10.0185 16.1522 10.1106C15.9883 10.1888 15.8141 10.2468 15.4656 10.363L14.35 10.7349M14.35 10.7349L13.6281 10.9755C13.4567 11.0327 13.2676 10.988 13.1398 10.8602C13.012 10.7324 12.9673 10.5433 13.0245 10.3719L13.2651 9.65M14.35 10.7349L13.2651 9.65"
                                                    stroke="white" stroke-width="1.5" />
                                            </svg> <input type="file" id="profile_pic" name="profile_pic"
                                                class="hidden" accept="image/*">
                                        </label>
                                    </div>
                                    @error('profile_pic')
                                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="grid flex-1 grid-cols-1 gap-5 sm:grid-cols-2">
                                    <!-- Full Name -->
                                    <div>
                                        <label for="name">Full Name</label>
                                        <input id="name" name="name" type="text"
                                            value="{{ old('name', auth()->user()->name) }}"
                                            class="form-input @error('name') border-danger @enderror" />
                                        @error('name')
                                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Email -->
                                    <div>
                                        <label for="email">Email</label>
                                        <input id="email" name="email" type="email"
                                            value="{{ old('email', auth()->user()->email) }}"
                                            class="form-input @error('email') border-danger @enderror" />
                                        @error('email')
                                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Phone -->
                                    <div>
                                        <label for="phone">Phone</label>
                                        <input id="phone" name="phone" type="text"
                                            value="{{ old('phone', auth()->user()->phone) }}"
                                            class="form-input @error('phone') border-danger @enderror" />
                                        @error('phone')
                                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Password -->
                                    <div>
                                        <label for="password">Password</label>
                                        <input id="password" name="password" type="password"
                                            placeholder="Enter new password"
                                            class="form-input @error('password') border-danger @enderror" />
                                        @error('password')
                                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
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
                                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="profile_pic">Profile Picture</label>
                                        <input type="file"
                                            class="form-control @error('profile_pic') is-invalid @enderror"
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
                                                value="{{ auth()->user()->location_lat && auth()->user()->location_long ? auth()->user()->location_lat . ', ' . auth()->user()->location_long : 'Location not set' }}"
                                                class="flex-1 form-input" readonly>
                                            <button type="button" id="get-location-btn"
                                                class="ml-2 btn btn-primary">
                                                <i class="ri-map-pin-line"></i>
                                                <span id="location-btn-text">Get Current Location</span>
                                            </button>
                                        </div>
                                        <div id="location-status" class="hidden mt-2 text-sm"></div>
                                        @error('location_lat')
                                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                        @enderror
                                        @error('location_long')
                                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-3 sm:col-span-2">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </template>

                <template x-if="tab === 'payment-details'">
                    <div>
                        <div class="grid grid-cols-1 gap-5 mb-5 lg:grid-cols-2">
                            <!-- Current Wallet Information -->
                            <div class="p-6 bg-white rounded-lg shadow-md panel dark:bg-gray-800">
                                <div class="mb-5">
                                    <h5 class="mb-4 text-lg font-semibold text-gray-800 dark:text-white">Current Wallet
                                        Information</h5>
                                    <p class="text-gray-600 dark:text-gray-300">Your current <span
                                            class="font-semibold text-primary">Wallet</span> details and balance
                                        information.</p>
                                </div>
                                <div class="mb-5 space-y-4">
                                    <!-- Wallet Balance -->
                                    <div class="pb-4 border-b border-gray-200 dark:border-gray-700">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <h6 class="text-gray-700 font-bold dark:text-white text-[15px]">
                                                    Current Balance
                                                </h6>
                                                <span class="block mt-1 text-2xl font-bold text-primary">
                                                    Rp 2,500,000
                                                </span>
                                            </div>
                                            <div class="text-right">
                                                <span class="text-sm text-gray-500 dark:text-gray-400">Last
                                                    Updated</span>
                                                <p class="text-sm text-gray-600 dark:text-gray-300">Today, 10:30 AM</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Bank Information -->
                                    <div class="pb-4 border-b border-gray-200 dark:border-gray-700">
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
                                            <button
                                                class="px-4 py-2 text-white transition-colors bg-gray-800 rounded btn hover:bg-gray-700">Edit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Recent Transactions -->
                            <div class="p-6 bg-white rounded-lg shadow-md panel dark:bg-gray-800">
                                <div class="mb-5">
                                    <h5 class="mb-4 text-lg font-semibold text-gray-800 dark:text-white">Recent
                                        Transactions</h5>
                                    <p class="text-gray-600 dark:text-gray-300">Your latest <span
                                            class="font-semibold text-primary">Wallet</span> transaction history.</p>
                                </div>
                                <div class="mb-5 space-y-3">
                                    <div class="pb-3 border-b border-gray-200 dark:border-gray-700">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center space-x-3">
                                                <div
                                                    class="flex items-center justify-center w-10 h-10 bg-green-100 rounded-full dark:bg-green-900">
                                                    <svg class="w-5 h-5 text-green-600 dark:text-green-400"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h6 class="text-sm font-medium text-gray-700 dark:text-white">Sale
                                                        Commission</h6>
                                                    <span class="text-xs text-gray-500 dark:text-gray-400">Order
                                                        #12345</span>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <span class="font-semibold text-green-600 dark:text-green-400">+Rp
                                                    150,000</span>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">2 hours ago</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="pb-3 border-b border-gray-200 dark:border-gray-700">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center space-x-3">
                                                <div
                                                    class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full dark:bg-blue-900">
                                                    <svg class="w-5 h-5 text-blue-600 dark:text-blue-400"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h6 class="text-sm font-medium text-gray-700 dark:text-white">
                                                        Withdrawal</h6>
                                                    <span class="text-xs text-gray-500 dark:text-gray-400">To BCA
                                                        Account</span>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <span class="font-semibold text-red-600 dark:text-red-400">-Rp
                                                    500,000</span>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">1 day ago</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center space-x-3">
                                                <div
                                                    class="flex items-center justify-center w-10 h-10 bg-green-100 rounded-full dark:bg-green-900">
                                                    <svg class="w-5 h-5 text-green-600 dark:text-green-400"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                    </svg>
                                                </div>
                                                <div>
                                                    <h6 class="text-sm font-medium text-gray-700 dark:text-white">Sale
                                                        Commission</h6>
                                                    <span class="text-xs text-gray-500 dark:text-gray-400">Order
                                                        #12344</span>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <span class="font-semibold text-green-600 dark:text-green-400">+Rp
                                                    75,000</span>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">2 days ago</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button
                                    class="w-full px-4 py-2 text-white transition-colors rounded btn bg-primary hover:bg-blue-700">View
                                    All Transactions</button>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-5 lg:grid-cols-2">
                            <!-- Edit Bank Account Information -->
                            <div class="p-6 bg-white rounded-lg shadow-md panel dark:bg-gray-800">
                                <div class="mb-5">
                                    <h5 class="mb-4 text-lg font-semibold text-gray-800 dark:text-white">Edit Bank
                                        Account</h5>
                                    <p class="text-gray-600 dark:text-gray-300">Update your <span
                                            class="font-semibold text-primary">Bank Account</span> information for
                                        withdrawals.</p>
                                </div>
                                <div class="mb-5">

                                    <form method="POST" action="{{ route('seller.wallet.update', $wallet) }}">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-5">
                                            <label for="bank_name"
                                                class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Bank
                                                Name</label>
                                            <select id="bank_name" name="bank_name" required
                                                class="form-select w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white @error('bank_name') border-danger @enderror">
                                                <option value="">Choose Bank...</option>
                                                <option value="BCA"
                                                    {{ old('bank_name', $wallet->bank_name) == 'BCA' ? 'selected' : '' }}>
                                                    Bank Central Asia (BCA)</option>
                                                <option value="BNI"
                                                    {{ old('bank_name', $wallet->bank_name) == 'BNI' ? 'selected' : '' }}>
                                                    Bank Negara Indonesia (BNI)</option>
                                                <option value="BRI"
                                                    {{ old('bank_name', $wallet->bank_name) == 'BRI' ? 'selected' : '' }}>
                                                    Bank Rakyat Indonesia (BRI)</option>
                                                <option value="Mandiri"
                                                    {{ old('bank_name', $wallet->bank_name) == 'Mandiri' ? 'selected' : '' }}>
                                                    Bank Mandiri</option>
                                                <option value="CIMB"
                                                    {{ old('bank_name', $wallet->bank_name) == 'CIMB' ? 'selected' : '' }}>
                                                    CIMB Niaga</option>
                                                <option value="Danamon"
                                                    {{ old('bank_name', $wallet->bank_name) == 'Danamon' ? 'selected' : '' }}>
                                                    Bank Danamon</option>
                                                <option value="Permata"
                                                    {{ old('bank_name', $wallet->bank_name) == 'Permata' ? 'selected' : '' }}>
                                                    Bank Permata</option>
                                                <option value="OCBC"
                                                    {{ old('bank_name', $wallet->bank_name) == 'OCBC' ? 'selected' : '' }}>
                                                    OCBC NISP</option>
                                            </select>
                                            @error('bank_name')
                                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-5">
                                            <label for="account_number"
                                                class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Account
                                                Number</label>
                                            <input id="account_number" name="account_number" type="text"
                                                value="{{ old('account_number', $wallet->account_number) }}"
                                                placeholder="Enter Account Number" required
                                                class="form-input w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white @error('account_number') border-danger @enderror" />
                                            @error('account_number')
                                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <button type="submit"
                                            class="px-6 py-2 text-white transition-colors rounded-lg btn bg-primary hover:bg-blue-700">
                                            Update Bank Account
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <!-- Withdrawal Request -->
                            <div class="p-6 bg-white rounded-lg shadow-md panel dark:bg-gray-800">
                                <div class="mb-5">
                                    <h5 class="mb-4 text-lg font-semibold text-gray-800 dark:text-white">Request
                                        Withdrawal</h5>
                                    <p class="text-gray-600 dark:text-gray-300">Withdraw funds from your <span
                                            class="font-semibold text-primary">Wallet</span> to your bank account.</p>
                                </div>
                                <div class="mb-5">
                                    <form>
                                        <div class="mb-5">
                                            <label for="withdrawAmount"
                                                class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Withdrawal
                                                Amount</label>
                                            <div class="relative">
                                                <span
                                                    class="absolute text-gray-500 transform -translate-y-1/2 left-3 top-1/2 dark:text-gray-400">Rp</span>
                                                <input id="withdrawAmount" type="number" placeholder="0"
                                                    min="10000" max="2500000"
                                                    class="w-full py-2 pl-10 pr-3 border border-gray-300 rounded-lg form-input dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white" />
                                            </div>
                                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Available balance:
                                                Rp 2,500,000</p>
                                        </div>
                                        <div class="mb-5">
                                            <label for="withdrawNote"
                                                class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Note
                                                (Optional)</label>
                                            <textarea id="withdrawNote" rows="3" placeholder="Add a note for this withdrawal..."
                                                class="w-full px-3 py-2 border border-gray-300 rounded-lg resize-none form-input dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white"></textarea>
                                        </div>
                                        <div
                                            class="p-4 mb-5 border border-yellow-200 rounded-lg bg-yellow-50 dark:bg-yellow-900/20 dark:border-yellow-800">
                                            <div class="flex items-start space-x-2">
                                                <svg class="w-5 h-5 text-yellow-600 dark:text-yellow-400 mt-0.5"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.082 16.5c-.77.833.192 2.5 1.732 2.5z">
                                                    </path>
                                                </svg>
                                                <div>
                                                    <h6
                                                        class="text-sm font-medium text-yellow-800 dark:text-yellow-300">
                                                        Withdrawal Information</h6>
                                                    <p class="mt-1 text-xs text-yellow-700 dark:text-yellow-400">
                                                        • Minimum withdrawal: Rp 10,000<br>
                                                        • Processing time: 1-3 business days<br>
                                                        • No withdrawal fees
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit"
                                            class="w-full px-6 py-2 text-white transition-colors rounded-lg btn bg-primary hover:bg-blue-700">Request
                                            Withdrawal</button>
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
                    statusDiv.textContent =
                        `Location obtained successfully! Accuracy: ±${Math.round(position.coords.accuracy)}m`;

                    // Reset button
                    button.disabled = false;
                    buttonText.textContent = 'Update Location';
                },
                (error) => {
                    let errorMessage = '';
                    switch (error.code) {
                        case error.PERMISSION_DENIED:
                            errorMessage =
                                'Location access denied by user. Please enable location permissions.';
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
                    if (statusDiv && statusDiv.textContent && statusDiv.textContent.includes(
                            'successfully')) {
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
