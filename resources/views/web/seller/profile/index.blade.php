<x-seller.app>
    <div>
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Users</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Profile</span>
            </li>
        </ul>
        <div class="pt-5">
            <div class="grid grid-cols-1 gap-5 mb-5 lg:grid-cols-3 xl:grid-cols-3">
                <!-- Profile Card -->
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="text-lg font-semibold dark:text-white-light">Profile</h5>
                        <a href="{{ route('seller.profile.show') }}"
                            class="p-2 rounded-full ltr:ml-auto rtl:mr-auto btn btn-primary">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                                <path opacity="0.5" d="M4 22H20" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" />
                                <path
                                    d="M14.6296 2.92142L13.8881 3.66293L7.07106 10.4799C6.60933 10.9416 6.37846 11.1725 6.17992 11.4271C5.94571 11.7273 5.74491 12.0522 5.58107 12.396C5.44219 12.6874 5.33894 12.9972 5.13245 13.6167L4.25745 16.2417L4.04356 16.8833C3.94194 17.1882 4.02128 17.5243 4.2485 17.7515C4.47573 17.9787 4.81182 18.0581 5.11667 17.9564L5.75834 17.7426L8.38334 16.8675L8.3834 16.8675C9.00284 16.6611 9.31256 16.5578 9.60398 16.4189C9.94775 16.2551 10.2727 16.0543 10.5729 15.8201C10.8275 15.6215 11.0583 15.3907 11.5201 14.929L11.5201 14.9289L18.3371 8.11195L19.0786 7.37044C20.3071 6.14188 20.3071 4.14999 19.0786 2.92142C17.85 1.69286 15.8581 1.69286 14.6296 2.92142Z"
                                    stroke="currentColor" stroke-width="1.5" />
                                <path opacity="0.5"
                                    d="M13.8879 3.66406C13.8879 3.66406 13.9806 5.23976 15.3709 6.63008C16.7613 8.0204 18.337 8.11308 18.337 8.11308M5.75821 17.7437L4.25732 16.2428"
                                    stroke="currentColor" stroke-width="1.5" />
                            </svg>
                        </a>
                    </div>
                    <div class="mb-5">
                        <div class="flex flex-col items-center justify-center">
                            <img src="{{ auth()->user()->profile_pic ? asset('storage/' . auth()->user()->profile_pic) : '/assets/images/profile-34.jpeg' }}"
                                 alt="profile image"
                                 class="object-cover w-24 h-24 mb-5 rounded-full" />
                            <p class="text-xl font-semibold text-primary">{{ auth()->user()->name }}</p>
                            <span class="px-2 py-1 mt-2 text-xs rounded-full bg-primary/10 text-primary">
                                {{ auth()->user()->role }}
                            </span>
                        </div>
                        <ul class="mt-5 flex flex-col max-w-[200px] m-auto space-y-4 font-semibold text-white-dark">
                            <li class="flex items-center gap-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0">
                                    <path
                                        d="M2.3153 12.6978C2.26536 12.2706 2.2404 12.057 2.2509 11.8809C2.30599 10.9577 2.98677 10.1928 3.89725 10.0309C4.07094 10 4.286 10 4.71612 10H15.2838C15.7139 10 15.929 10 16.1027 10.0309C17.0132 10.1928 17.694 10.9577 17.749 11.8809C17.7595 12.057 17.7346 12.2706 17.6846 12.6978L17.284 16.1258C17.1031 17.6729 16.2764 19.0714 15.0081 19.9757C14.0736 20.6419 12.9546 21 11.8069 21H8.19303C7.04537 21 5.9263 20.6419 4.99182 19.9757C3.72352 19.0714 2.89681 17.6729 2.71598 16.1258L2.3153 12.6978Z"
                                        stroke="currentColor" stroke-width="1.5" />
                                    <path opacity="0.5"
                                        d="M17 17H19C20.6569 17 22 15.6569 22 14C22 12.3431 20.6569 11 19 11H17.5"
                                        stroke="currentColor" stroke-width="1.5" />
                                    <path opacity="0.5"
                                        d="M10.0002 2C9.44787 2.55228 9.44787 3.44772 10.0002 4C10.5524 4.55228 10.5524 5.44772 10.0002 6"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M4.99994 7.5L5.11605 7.38388C5.62322 6.87671 5.68028 6.0738 5.24994 5.5C4.81959 4.9262 4.87665 4.12329 5.38382 3.61612L5.49994 3.5"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M14.4999 7.5L14.6161 7.38388C15.1232 6.87671 15.1803 6.0738 14.7499 5.5C14.3196 4.9262 14.3767 4.12329 14.8838 3.61612L14.9999 3.5"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                {{ auth()->user()->role === 'Seller' ? 'Seller Account' : 'Buyer Account' }}
                            </li>
                            <li class="flex items-center gap-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0">
                                    <path
                                        d="M2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12V14C22 17.7712 22 19.6569 20.8284 20.8284C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14V12Z"
                                        stroke="currentColor" stroke-width="1.5" />
                                    <path opacity="0.5" d="M7 4V2.5" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" />
                                    <path opacity="0.5" d="M17 4V2.5" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" />
                                    <path opacity="0.5" d="M2 9H22" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" />
                                </svg>
                                {{ auth()->user()->created_at->format('M d, Y') }}
                            </li>
                            @if(auth()->user()->ward)
                            <li class="flex items-center gap-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0">
                                    <path opacity="0.5"
                                        d="M4 10.1433C4 5.64588 7.58172 2 12 2C16.4183 2 20 5.64588 20 10.1433C20 14.6055 17.4467 19.8124 13.4629 21.6744C12.5343 22.1085 11.4657 22.1085 10.5371 21.6744C6.55332 19.8124 4 14.6055 4 10.1433Z"
                                        stroke="currentColor" stroke-width="1.5" />
                                    <circle cx="12" cy="10" r="3" stroke="currentColor"
                                        stroke-width="1.5" />
                                </svg>
                                {{ auth()->user()->ward->name ?? 'Location not set' }}
                            </li>
                            @endif
                            <li>
                                <a href="mailto:{{ auth()->user()->email }}" class="flex items-center gap-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0">
                                        <path opacity="0.5"
                                            d="M2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12C22 15.7712 22 17.6569 20.8284 18.8284C19.6569 20 17.7712 20 14 20H10C6.22876 20 4.34315 20 3.17157 18.8284C2 17.6569 2 15.7712 2 12Z"
                                            stroke="currentColor" stroke-width="1.5" />
                                        <path
                                            d="M6 8L8.1589 9.79908C9.99553 11.3296 10.9139 12.0949 12 12.0949C13.0861 12.0949 14.0045 11.3296 15.8411 9.79908L18 8"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                    <span class="truncate text-primary">{{ auth()->user()->email }}</span>
                                </a>
                            </li>
                            @if(auth()->user()->phone)
                            <li class="flex items-center gap-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0">
                                    <path
                                        d="M16.1007 13.359L16.5562 12.9062C17.1858 12.2801 18.1672 12.1515 18.9728 12.5894L20.8833 13.628C22.1102 14.2949 22.3806 15.9295 21.4217 16.883L20.0011 18.2954C19.6399 18.6546 19.1917 18.9171 18.6763 18.9651M4.00289 5.74561C3.96765 5.12559 4.25823 4.56668 4.69185 4.13552L6.26145 2.57483C7.13596 1.70529 8.61028 1.83992 9.37326 2.85908L10.6342 4.54348C11.2507 5.36691 11.1841 6.49484 10.4775 7.19738L10.1907 7.48257"
                                        stroke="currentColor" stroke-width="1.5" />
                                    <path opacity="0.5"
                                        d="M18.6763 18.9651C17.0469 19.117 13.0622 18.9492 8.8154 14.7266C4.81076 10.7447 4.09308 7.33182 4.00293 5.74561"
                                        stroke="currentColor" stroke-width="1.5" />
                                    <path opacity="0.5"
                                        d="M16.1007 13.3589C16.1007 13.3589 15.0181 14.4353 12.0631 11.4971C9.10807 8.55886 10.1907 7.48242 10.1907 7.48242"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                                <span class="whitespace-nowrap" dir="ltr">{{ auth()->user()->phone }}</span>
                            </li>
                            @endif
                        </ul>
                        <ul class="flex items-center justify-center gap-2 mt-7">
                            <li>
                                <a class="flex items-center justify-center w-10 h-10 p-0 rounded-full btn btn-info"
                                    href="javascript:;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                        <path
                                            d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                        </path>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center justify-center w-10 h-10 p-0 rounded-full btn btn-danger"
                                    href="javascript:;">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                                        <path
                                            d="M3.33946 16.9997C6.10089 21.7826 12.2168 23.4214 16.9997 20.66C18.9493 19.5344 20.3765 17.8514 21.1962 15.9286C22.3875 13.1341 22.2958 9.83304 20.66 6.99972C19.0242 4.1664 16.2112 2.43642 13.1955 2.07088C11.1204 1.81935 8.94932 2.21386 6.99972 3.33946C2.21679 6.10089 0.578039 12.2168 3.33946 16.9997Z"
                                            stroke="currentColor" stroke-width="1.5" />
                                        <path opacity="0.5"
                                            d="M16.9497 20.5732C16.9497 20.5732 16.0107 13.9821 14.0004 10.5001C11.99 7.01803 7.05018 3.42681 7.05018 3.42681M7.57711 20.8175C9.05874 16.3477 16.4525 11.3931 21.8635 12.5801M16.4139 3.20898C14.926 7.63004 7.67424 12.5123 2.28857 11.4516"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a class="flex items-center justify-center w-10 h-10 p-0 rounded-full btn btn-dark"
                                    href="javascript:;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                        <path
                                            d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                                        </path>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Wallet Information Card -->
                @if(auth()->user()->role === 'Seller' && auth()->user()->sellerWallet)
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="text-lg font-semibold dark:text-white-light">Wallet Information</h5>
                        <a href=""
                           class="p-2 rounded-full ltr:ml-auto rtl:mr-auto btn btn-success">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                                <path d="M20.998 6.00002L20.998 18C20.998 20.2091 19.2072 22 16.998 22L6.998 22C4.78886 22 2.998 20.2091 2.998 18L2.998 6.00002C2.998 3.79088 4.78886 2.00002 6.998 2.00002L16.998 2.00002C19.2072 2.00002 20.998 3.79088 20.998 6.00002Z" stroke="currentColor" stroke-width="1.5"/>
                                <path d="M17.998 9.00002L17.998 8.00002C17.998 6.89545 17.1026 6.00002 15.998 6.00002L7.998 6.00002C6.89343 6.00002 5.998 6.89545 5.998 8.00002L5.998 9.00002" stroke="currentColor" stroke-width="1.5"/>
                                <path d="M13.998 12L13.998 13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                        </a>
                    </div>
                    <div class="mb-5">
                        <div class="space-y-4">
                            <!-- Wallet Balance -->
                            <div class="p-4 text-white rounded-lg bg-gradient-to-r from-blue-500 to-purple-600">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm text-blue-100">Current Balance</p>
                                        <p class="text-2xl font-bold">Rp {{ number_format(auth()->user()->sellerWallet->amount, 0, ',', '.') }}</p>
                                    </div>
                                    <div class="p-3 rounded-full bg-white/20">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6">
                                            <path d="M20.998 6.00002L20.998 18C20.998 20.2091 19.2072 22 16.998 22L6.998 22C4.78886 22 2.998 20.2091 2.998 18L2.998 6.00002C2.998 3.79088 4.78886 2.00002 6.998 2.00002L16.998 2.00002C19.2072 2.00002 20.998 3.79088 20.998 6.00002Z" stroke="currentColor" stroke-width="1.5"/>
                                            <path d="M17.998 9.00002L17.998 8.00002C17.998 6.89545 17.1026 6.00002 15.998 6.00002L7.998 6.00002C6.89343 6.00002 5.998 6.89545 5.998 8.00002L5.998 9.00002" stroke="currentColor" stroke-width="1.5"/>
                                            <path d="M13.998 12L13.998 13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Bank Information -->
                            <div class="space-y-3">
                                <div class="flex items-center gap-3 p-3 rounded-lg bg-gray-50 dark:bg-gray-800">
                                    <div class="p-2 bg-green-100 rounded-full dark:bg-green-900">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="text-green-600 dark:text-green-400">
                                            <path d="M3.5 8.5L8.5 11.5L15.5 7.5L20.5 10.5V18.5C20.5 19.6046 19.6046 20.5 18.5 20.5H5.5C4.39543 20.5 3.5 19.6046 3.5 18.5V8.5Z" stroke="currentColor" stroke-width="1.5"/>
                                            <path d="M12 3.5L20.5 8.5L12 13.5L3.5 8.5L12 3.5Z" stroke="currentColor" stroke-width="1.5"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Bank Name</p>
                                        <p class="font-semibold text-gray-900 dark:text-gray-100">{{ auth()->user()->sellerWallet->bank_name }}</p>
                                    </div>
                                </div>

                                <div class="flex items-center gap-3 p-3 rounded-lg bg-gray-50 dark:bg-gray-800">
                                    <div class="p-2 bg-blue-100 rounded-full dark:bg-blue-900">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="text-blue-600 dark:text-blue-400">
                                            <path d="M4 7C4 5.89543 4.89543 5 6 5H18C19.1046 5 20 5.89543 20 7V17C20 18.1046 19.1046 19 18 19H6C4.89543 19 4 18.1046 4 17V7Z" stroke="currentColor" stroke-width="1.5"/>
                                            <path d="M4 9H20" stroke="currentColor" stroke-width="1.5"/>
                                            <path d="M8 13H12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Account Number</p>
                                        <p class="font-semibold text-gray-900 dark:text-gray-100">**** **** {{ substr(auth()->user()->sellerWallet->account_number, -4) }}</p>
                                    </div>
                                </div>

                                <div class="flex items-center gap-3 p-3 rounded-lg bg-gray-50 dark:bg-gray-800">
                                    <div class="p-2 bg-purple-100 rounded-full dark:bg-purple-900">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="text-purple-600 dark:text-purple-400">
                                            <path d="M12 2V22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                            <path d="M17 5H9.5C8.11929 5 7 6.11929 7 7.5C7 8.88071 8.11929 10 9.5 10H14.5C15.8807 10 17 11.1193 17 12.5C17 13.8807 15.8807 15 14.5 15H7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Last Updated</p>
                                        <p class="font-semibold text-gray-900 dark:text-gray-100">{{ auth()->user()->sellerWallet->updated_at->format('M d, Y') }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Quick Actions -->
                            <div class="pt-4 border-t border-gray-200 dark:border-gray-700">
                                <div class="grid grid-cols-2 gap-3">
                                    <a href="" class="btn btn-outline-primary btn-sm">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="ltr:mr-2 rtl:ml-2">
                                            <path d="M12 16V8M12 8L8 12M12 8L16 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="currentColor" stroke-width="1.5"/>
                                        </svg>
                                        Withdraw
                                    </a>
                                    <a href="" class="btn btn-outline-info btn-sm">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="ltr:mr-2 rtl:ml-2">
                                            <path d="M12 8V12L15 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="currentColor" stroke-width="1.5"/>
                                        </svg>
                                        History
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @elseif(auth()->user()->role === 'Seller' && !auth()->user()->sellerWallet)
                <!-- No Wallet Setup Card -->
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="text-lg font-semibold dark:text-white-light">Wallet Setup</h5>
                    </div>
                    <div class="py-8 text-center">
                        <div class="mb-4">
                            <svg width="64" height="64" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="mx-auto text-gray-400">
                                <path d="M20.998 6.00002L20.998 18C20.998 20.2091 19.2072 22 16.998 22L6.998 22C4.78886 22 2.998 20.2091 2.998 18L2.998 6.00002C2.998 3.79088 4.78886 2.00002 6.998 2.00002L16.998 2.00002C19.2072 2.00002 20.998 3.79088 20.998 6.00002Z" stroke="currentColor" stroke-width="1.5"/>
                                <path d="M17.998 9.00002L17.998 8.00002C17.998 6.89545 17.1026 6.00002 15.998 6.00002L7.998 6.00002C6.89343 6.00002 5.998 6.89545 5.998 8.00002L5.998 9.00002" stroke="currentColor" stroke-width="1.5"/>
                                <path d="M13.998 12L13.998 13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <h6 class="mb-2 font-semibold text-gray-900 dark:text-gray-100">No Wallet Setup</h6>
                        <p class="mb-4 text-gray-500 dark:text-gray-400">You need to setup your wallet to start receiving payments</p>
                        <a href="" class="btn btn-primary">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="ltr:mr-2 rtl:ml-2">
                                <path d="M12 5V19M5 12H19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Setup Wallet
                        </a>
                    </div>
                </div>
                @endif

                <!-- Additional Information Card -->
                <div class="panel">
                    <div class="flex items-center justify-between mb-5">
                        <h5 class="text-lg font-semibold dark:text-white-light">Additional Info</h5>
                    </div>
                    <div class="space-y-4">
                        @if(auth()->user()->address)
                        <div class="flex items-start gap-3">
                            <div class="p-2 mt-1 bg-orange-100 rounded-full dark:bg-orange-900">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="text-orange-600 dark:text-orange-400">
                                    <path d="M12 2L13.09 8.26L20 9L13.09 9.74L12 16L10.91 9.74L4 9L10.91 8.26L12 2Z" stroke="currentColor" stroke-width="1.5"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Address</p>
                                <p class="text-gray-900 dark:text-gray-100">{{ auth()->user()->address }}</p>
                            </div>
                        </div>
                        @endif

                        @if(auth()->user()->location_lat && auth()->user()->location_long)
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-red-100 rounded-full dark:bg-red-900">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="text-red-600 dark:text-red-400">
                                    <path d="M12 2C16.4183 2 20 5.64588 20 10.1433C20 14.6055 17.4467 19.8124 13.4629 21.6744C12.5343 22.1085 11.4657 22.1085 10.5371 21.6744C6.55332 19.8124 4 14.6055 4 10.1433C4 5.64588 7.58172 2 12 2Z" stroke="currentColor" stroke-width="1.5"/>
                                    <circle cx="12" cy="10" r="3" stroke="currentColor" stroke-width="1.5"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">GPS Coordinates</p>
                                <p class="text-xs text-gray-900 dark:text-gray-100">{{ auth()->user()->location_lat }}, {{ auth()->user()->location_long }}</p>
                            </div>
                        </div>
                        @endif

                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-indigo-100 rounded-full dark:bg-indigo-900">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="text-indigo-600 dark:text-indigo-400">
                                    <path d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="currentColor" stroke-width="1.5"/>
                                    <path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="currentColor" stroke-width="1.5"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Account Status</p>
                                <div class="flex items-center gap-2">
                                    <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                                    <p class="text-green-600 dark:text-green-400">Active</p>
                                </div>
                            </div>
                        </div>

                        @if(auth()->user()->is_admin)
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-yellow-100 rounded-full dark:bg-yellow-900">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="text-yellow-600 dark:text-yellow-400">
                                    <path d="M12 2L15.09 8.26L22 9L17 14L18.18 21L12 17.77L5.82 21L7 14L2 9L8.91 8.26L12 2Z" stroke="currentColor" stroke-width="1.5"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Admin Privileges</p>
                                <p class="font-semibold text-yellow-600 dark:text-yellow-400">Administrator</p>
                            </div>
                        </div>
                        @endif

                        <div class="pt-4 border-t border-gray-200 dark:border-gray-700">
                            <a href="{{ route('seller.profile.show') }}" class="w-full btn btn-outline-primary">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="ltr:mr-2 rtl:ml-2">
                                    <path d="M14.6296 2.92142L13.8881 3.66293L7.07106 10.4799C6.60933 10.9416 6.37846 11.1725 6.17992 11.4271C5.94571 11.7273 5.74491 12.0522 5.58107 12.396C5.44219 12.6874 5.33894 12.9972 5.13245 13.6167L4.25745 16.2417L4.04356 16.8833C3.94194 17.1882 4.02128 17.5243 4.2485 17.7515C4.47573 17.9787 4.81182 18.0581 5.11667 17.9564L5.75834 17.7426L8.38334 16.8675C9.00284 16.6611 9.31256 16.5578 9.60398 16.4189C9.94775 16.2551 10.2727 16.0543 10.5729 15.8201C10.8275 15.6215 11.0583 15.3907 11.5201 14.929L18.3371 8.11195L19.0786 7.37044C20.3071 6.14188 20.3071 4.14999 19.0786 2.92142C17.85 1.69286 15.8581 1.69286 14.6296 2.92142Z" stroke="currentColor" stroke-width="1.5"/>
                                </svg>
                                Edit Profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-seller.app>
