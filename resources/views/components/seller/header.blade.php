<header class="z-40" :class="{ 'dark': $store.app.semidark && $store.app.menu === 'horizontal' }">
    <div class="shadow-sm">
        <div class="relative bg-white flex w-full items-center px-5 py-2.5 dark:bg-[#0e1726]">
            <!-- Left Section: Logo -->
            <div class="flex items-center justify-between horizontal-logo lg:hidden ltr:mr-2 rtl:ml-2">
                <a href="/" class="flex items-center main-logo shrink-0">
                    {{-- <img class="inline w-8 ltr:-ml-1 rtl:-mr-1" src="/assets/images/logo.svg" alt="image" /> --}}
                   <span class="hidden text-xl font-bold text-gray-800 dark:text-white sm:block">
                        WargaUsaha
                    </span>
                </a>

                <a href="javascript:;"
                    class="collapse-icon flex-none dark:text-[#d0d2d6] hover:text-primary dark:hover:text-primary flex lg:hidden ltr:ml-2 rtl:mr-2 p-2 rounded-full bg-white-light/40 dark:bg-dark/40 hover:bg-white-light/90 dark:hover:bg-dark/60"
                    @click="$store.app.toggleSidebar()">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 7L4 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        <path opacity="0.5" d="M20 12L4 12" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" />
                        <path d="M20 17L4 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                    </svg>
                </a>
            </div>



            <!-- Center Section: Navigation Menu (Desktop) -->
            <div class="flex-1 flex justify-center">
                <nav class="items-center hidden space-x-1 lg:flex" x-data="header">
                    <div class="flex items-center p-1 rounded-lg bg-gray-50 dark:bg-gray-800">

                        <!-- Home Menu -->
                        <div class="relative group">
                            <a href="/customer/home"
                                class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 transition-all duration-200 rounded-md dark:text-gray-200 hover:text-primary dark:hover:text-primary hover:bg-white dark:hover:bg-gray-700">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2 12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274C22 8.77128 22 9.91549 22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039Z"
                                        stroke="currentColor" stroke-width="1.5" />
                                    <path d="M15 18H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                                Home
                            </a>
                        </div>

                        <!-- Products Menu -->
                        <div class="relative group">
                            <a href="{{ route('customer.home.indexProduct') }}"
                                class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 transition-all duration-200 rounded-md dark:text-gray-200 hover:text-primary dark:hover:text-primary hover:bg-white dark:hover:bg-gray-700">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3.79424 12.0291C4.33141 9.34329 4.59999 8.00036 5.48746 7.13543C5.65149 6.97557 5.82894 6.8301 6.01786 6.70061C7.04004 6 8.40956 6 11.1486 6H12.8515C15.5906 6 16.9601 6 17.9823 6.70061C18.1712 6.8301 18.3486 6.97557 18.5127 7.13543C19.4001 8.00036 19.6687 9.34329 20.2059 12.0291C20.9771 15.8851 21.3627 17.8131 20.475 19.1793C20.3143 19.4267 20.1267 19.6555 19.9157 19.8616C18.7501 21 16.7839 21 12.8515 21H11.1486C7.21622 21 5.25004 21 4.08447 19.8616C3.87342 19.6555 3.68582 19.4267 3.5251 19.1793C2.63744 17.8131 3.02304 15.8851 3.79424 12.0291Z"
                                        stroke="currentColor" stroke-width="1.5" />
                                    <circle cx="15" cy="9" r="1" fill="currentColor" />
                                    <circle cx="9" cy="9" r="1" fill="currentColor" />
                                    <path d="M9 6V5C9 3.34315 10.3431 2 12 2C13.6569 2 15 3.34315 15 5V6"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                                Products
                            </a>
                        </div>

                        <!-- Available Jobs Menu -->
                        <div class="relative group">
                            <a href="{{ route('customer.home.indexJobVacancy') }}"
                                class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 transition-all duration-200 rounded-md dark:text-gray-200 hover:text-primary dark:hover:text-primary hover:bg-white dark:hover:bg-gray-700">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4">
                                    <path
                                        d="M2 14C2 10.2288 2 8.34315 3.17157 7.17157C4.34315 6 6.22876 6 10 6H14C17.7712 6 19.6569 6 20.8284 7.17157C22 8.34315 22 10.2288 22 14C22 17.7712 22 19.6569 20.8284 20.8284C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14Z"
                                        stroke="currentColor" stroke-width="1.5" />
                                    <path
                                        d="M16 6C16 4.11438 16 3.17157 15.4142 2.58579C14.8284 2 13.8856 2 12 2C10.1144 2 9.17157 2 8.58579 2.58579C8 3.17157 8 4.11438 8 6"
                                        stroke="currentColor" stroke-width="1.5" />
                                    <path
                                        d="M17 9C17 9.55228 16.5523 10 16 10C15.4477 10 15 9.55228 15 9C15 8.44772 15.4477 8 16 8C16.5523 8 17 8.44772 17 9Z"
                                        fill="currentColor" />
                                    <path
                                        d="M9 9C9 9.55228 8.55228 10 8 10C7.44772 10 7 9.55228 7 9C7 8.44772 7.44772 8 8 8C8.55228 8 9 8.44772 9 9Z"
                                        fill="currentColor" />
                                </svg>
                                Available Jobs
                            </a>
                        </div>

                        <!-- Services Menu -->
                        <div class="relative group">
                            <a href="{{ route('customer.home.indexService') }}"
                                class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 transition-all duration-200 rounded-md dark:text-gray-200 hover:text-primary dark:hover:text-primary hover:bg-white dark:hover:bg-gray-700">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3 10.4167C3 7.21907 3 5.62028 3.37752 5.08241C3.75503 4.54454 5.25832 4.02996 8.26491 3.00079L8.83772 2.80472C10.405 2.26824 11.1886 2 12 2C12.8114 2 13.595 2.26824 15.1623 2.80472L15.7351 3.00079C18.7417 4.02996 20.245 4.54454 20.6225 5.08241C21 5.62028 21 7.21907 21 10.4167C21 10.8996 21 11.4234 21 11.9914C21 17.6294 16.761 20.3655 14.1014 21.5273C13.38 21.8424 13.0193 22 12 22C10.9807 22 10.62 21.8424 9.89856 21.5273C7.23896 20.3655 3 17.6294 3 11.9914C3 11.4234 3 10.8996 3 10.4167Z"
                                        stroke="currentColor" stroke-width="1.5" />
                                    <path d="M9.5 12.4L10.9286 14L14.5 10" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                Services
                            </a>
                        </div>

                    </div>
                </nav>
            </div>

            <!-- Right Section: Chat, Cart & User Menu -->
            <div class="flex items-center gap-3">
                <!-- Chat Button -->
                <div class="relative group">
                    <a href="{{ route('customer.message.index') }}"
                        class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 transition-all duration-200 rounded-md dark:text-gray-200 hover:text-primary dark:hover:text-primary hover:bg-white dark:hover:bg-gray-700">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21 11.5C21 16.1944 16.9706 20 12 20C10.4174 20 8.92451 19.6204 7.63735 18.9623L3 20L4.37647 16.0941C3.51552 14.9546 3 13.5193 3 12C3 7.30558 7.02944 3.5 12 3.5C16.9706 3.5 21 7.30558 21 11.5Z"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span class="hidden sm:block">Chat</span>
                    </a>
                </div>

                <!-- Cart Button -->
                <div class="relative group">
                    <a href="{{ route('customer.cart.index') }}"
                        class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 transition-all duration-200 rounded-md dark:text-gray-200 hover:text-primary dark:hover:text-primary hover:bg-white dark:hover:bg-gray-700">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2 3L2.26491 3.0883C3.58495 3.52832 4.24497 3.74832 4.62248 4.2721C5 4.79587 5 5.49159 5 6.88304V9.5C5 12.3284 5 13.7426 5.87868 14.6213C6.75736 15.5 8.17157 15.5 11 15.5H19"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            <path
                                d="M7.5 18C8.32843 18 9 18.6716 9 19.5C9 20.3284 8.32843 21 7.5 21C6.67157 21 6 20.3284 6 19.5C6 18.6716 6.67157 18 7.5 18Z"
                                stroke="currentColor" stroke-width="1.5" />
                            <path
                                d="M16.5 18.0001C17.3284 18.0001 18 18.6716 18 19.5001C18 20.3285 17.3284 21.0001 16.5 21.0001C15.6716 21.0001 15 20.3285 15 19.5001C15 18.6716 15.6716 18.0001 16.5 18.0001Z"
                                stroke="currentColor" stroke-width="1.5" />
                            <path
                                d="M5 6H16.4504C18.5054 6 19.5328 6 19.9775 6.67426C20.4221 7.34853 20.0173 8.29294 19.2078 10.1818L18.7792 11.1818C18.4013 12.0636 18.2123 12.5045 17.8366 12.7523C17.4609 13 16.9812 13 16.0218 13H5"
                                stroke="currentColor" stroke-width="1.5" />
                        </svg>
                        <span class="hidden sm:block">Cart</span>
                    </a>
                </div>

                <!-- User Dropdown -->
                <div class="relative" x-data="{ open: false }" @click.outside="open = false">
                    <button type="button"
                        class="flex items-center gap-2 p-1 transition-colors duration-200 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800"
                        @click="open = !open" aria-label="User menu">
                        <img class="object-cover w-8 h-8 rounded-full ring-2 ring-gray-200 dark:ring-gray-700"
                            src="{{ asset('storage/' . auth()->user()->profile_pic) }}" alt="User Avatar" />
                        <div class="hidden text-left md:block">
                            <div class="text-sm font-medium text-gray-700 dark:text-gray-200">
                                {{ auth()->user()->name }}
                            </div>
                        </div>
                    </button>

                    <!-- Dropdown Menu -->
                    <div x-show="open" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                        class="absolute right-0 z-50 w-64 py-1 mt-2 bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700">

                        <!-- User Info -->
                        <div class="px-4 py-3 border-b border-gray-200 dark:border-gray-700">
                            <div class="flex items-center gap-3">
                                <img class="object-cover w-10 h-10 rounded-full"
                                    src="{{ asset('storage/' . auth()->user()->profile_pic) }}" alt="User Avatar" />
                                <div>
                                    <div class="flex items-center gap-2 font-medium text-gray-900 dark:text-white">
                                        {{ auth()->user()->name }}
                                    </div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">{{ auth()->user()->email }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Menu Items -->
                        <div class="py-1">
                            <a href="/customer/profile"
                                class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 transition-colors duration-200 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Profile
                            </a>
                            <a href="/customer/order"
                                class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 transition-colors duration-200 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                Riwayat Product
                            </a>
                            <a href="/customer/service"
                                class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 transition-colors duration-200 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                Riwayat Layanan
                            </a>
                            <a href="/customer/transaction"
                                class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 transition-colors duration-200 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                Riwayat Transaksi
                            </a>
                            <a href="{{ route('employer.job.create') }}"
                                class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 transition-colors duration-200 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                    class="w-4 h-4">
                                    <path
                                        d="M2 14C2 10.2288 2 8.34315 3.17157 7.17157C4.34315 6 6.22876 6 10 6H14C17.7712 6 19.6569 6 20.8284 7.17157C22 8.34315 22 10.2288 22 14C22 17.7712 22 19.6569 20.8284 20.8284C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14Z"
                                        stroke="currentColor" stroke-width="1.5" />
                                    <path
                                        d="M16 6C16 4.11438 16 3.17157 15.4142 2.58579C14.8284 2 13.8856 2 12 2C10.1144 2 9.17157 2 8.58579 2.58579C8 3.17157 8 4.11438 8 6"
                                        stroke="currentColor" stroke-width="1.5" />
                                    <path
                                        d="M17 9C17 9.55228 16.5523 10 16 10C15.4477 10 15 9.55228 15 9C15 8.44772 15.4477 8 16 8C16.5523 8 17 8.44772 17 9Z"
                                        fill="currentColor" />
                                    <path
                                        d="M9 9C9 9.55228 8.55228 10 8 10C7.44772 10 7 9.55228 7 9C7 8.44772 7.44772 8 8 8C8.55228 8 9 8.44772 9 9Z"
                                        fill="currentColor" />
                                </svg>
                                Create Job Vacancy
                            </a>
                            <a href="/auth/boxed-lockscreen"
                                class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 transition-colors duration-200 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                Lock Screen
                            </a>
                        </div>

                        <!-- Logout -->
                        <div class="pt-1 border-t border-gray-200 dark:border-gray-700">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="flex items-center w-full gap-3 px-4 py-2 text-sm text-red-600 transition-colors duration-200 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    Sign Out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("header", () => ({
            init() {
                const selector = document.querySelector('ul.horizontal-menu a[href="' + window
                    .location.pathname + '"]');
                if (selector) {
                    selector.classList.add('active');
                    const ul = selector.closest('ul.sub-menu');
                    if (ul) {
                        let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                        if (ele) {
                            ele = ele[0];
                            setTimeout(() => {
                                ele.classList.add('active');
                            });
                        }
                    }
                }
            },

            notifications: [{
                    id: 1,
                    profile: 'user-profile.jpeg',
                    message: '<strong class="mr-1 text-sm">John Doe</strong>invite you to <strong>Prototyping</strong>',
                    time: '45 min ago',
                },
                {
                    id: 2,
                    profile: 'profile-34.jpeg',
                    message: '<strong class="mr-1 text-sm">Adam Nolan</strong>mentioned you to <strong>UX Basics</strong>',
                    time: '9h Ago',
                },
                {
                    id: 3,
                    profile: 'profile-16.jpeg',
                    message: '<strong class="mr-1 text-sm">Anna Morgan</strong>Upload a file',
                    time: '9h Ago',
                }
            ],

            messages: [{
                    id: 1,
                    image: '<span class="grid rounded-full place-content-center w-9 h-9 bg-success-light dark:bg-success text-success dark:text-success-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg></span>',
                    title: 'Congratulations!',
                    message: 'Your OS has been updated.',
                    time: '1hr',
                },
                {
                    id: 2,
                    image: '<span class="grid rounded-full place-content-center w-9 h-9 bg-info-light dark:bg-info text-info dark:text-info-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg></span>',
                    title: 'Did you know?',
                    message: 'You can switch between artboards.',
                    time: '2hr',
                },
                {
                    id: 3,
                    image: '<span class="grid rounded-full place-content-center w-9 h-9 bg-danger-light dark:bg-danger text-danger dark:text-danger-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>',
                    title: 'Something went wrong!',
                    message: 'Send Reposrt',
                    time: '2days',
                },
                {
                    id: 4,
                    image: '<span class="grid rounded-full place-content-center w-9 h-9 bg-warning-light dark:bg-warning text-warning dark:text-warning-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">    <circle cx="12" cy="12" r="10"></circle>    <line x1="12" y1="8" x2="12" y2="12"></line>    <line x1="12" y1="16" x2="12.01" y2="16"></line></svg></span>',
                    title: 'Warning',
                    message: 'Your password strength is low.',
                    time: '5days',
                },
            ],

            languages: [{
                    id: 1,
                    key: 'Chinese',
                    value: 'zh',
                },
                {
                    id: 2,
                    key: 'Danish',
                    value: 'da',
                },
                {
                    id: 3,
                    key: 'English',
                    value: 'en',
                },
                {
                    id: 4,
                    key: 'French',
                    value: 'fr',
                },
                {
                    id: 5,
                    key: 'German',
                    value: 'de',
                },
                {
                    id: 6,
                    key: 'Greek',
                    value: 'el',
                },
                {
                    id: 7,
                    key: 'Hungarian',
                    value: 'hu',
                },
                {
                    id: 8,
                    key: 'Italian',
                    value: 'it',
                },
                {
                    id: 9,
                    key: 'Japanese',
                    value: 'ja',
                },
                {
                    id: 10,
                    key: 'Polish',
                    value: 'pl',
                },
                {
                    id: 11,
                    key: 'Portuguese',
                    value: 'pt',
                },
                {
                    id: 12,
                    key: 'Russian',
                    value: 'ru',
                },
                {
                    id: 13,
                    key: 'Spanish',
                    value: 'es',
                },
                {
                    id: 14,
                    key: 'Swedish',
                    value: 'sv',
                },
                {
                    id: 15,
                    key: 'Turkish',
                    value: 'tr',
                },
                {
                    id: 16,
                    key: 'Arabic',
                    value: 'ae',
                },
            ],


            removeNotification(value) {
                this.notifications = this.notifications.filter((d) => d.id !== value);
            },

            removeMessage(value) {
                this.messages = this.messages.filter((d) => d.id !== value);
            },
        }));
    });
</script>
