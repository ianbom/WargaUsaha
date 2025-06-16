@php
    $user = auth()->user();
@endphp
<header class="sticky top-0 z-50 bg-white border-b border-gray-200 shadow-sm dark:bg-dark dark:border-gray-700">
    <div class="max-w-full px-4 mx-auto sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">

            <!-- Left Section: Logo & Mobile Menu Toggle -->
            <div class="flex items-center gap-4">
                <!-- Mobile Menu Toggle -->
                <button type="button"
                    class="p-2 transition-colors duration-200 bg-gray-100 rounded-lg lg:hidden hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700"
                    @click="$store.app.toggleSidebar()" aria-label="Toggle menu">
                    <svg class="w-5 h-5 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <!-- Logo -->
                <a href="/" class="flex items-center gap-2 group">
                    {{-- <img class="w-8 h-8 transition-transform duration-200 group-hover:scale-105"
                        src="/assets/images/logo.svg" alt="VRISTO Logo" /> --}}
                    <span class="hidden text-xl font-bold text-gray-800 dark:text-white sm:block">
                        WargaUsaha
                    </span>
                </a>
            </div>

            <!-- Center Section: Navigation Menu (Desktop) -->
            <nav class="items-center hidden space-x-1 lg:flex" x-data="header">
                <div class="flex items-center p-1 rounded-lg bg-gray-50 dark:bg-gray-800">

                    <!-- Dashboard Menu -->
                    <div class="relative group">
                        <a href="/customer/home"
                            class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 transition-all duration-200 rounded-md dark:text-gray-200 hover:text-primary dark:hover:text-primary hover:bg-white dark:hover:bg-gray-700">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M2 12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274C22 8.77128 22 9.91549 22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039Z"
                                    stroke="currentColor" stroke-width="1.5" />
                                <path d="M15 18H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                            Beranda
                        </a>
                    </div>

                    <!-- Apps Menu -->
                    <div class="relative group">
                        <a href="{{ route('customer.home.indexProduct') }}"
                            class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 transition-all duration-200 rounded-md dark:text-gray-200 hover:text-primary dark:hover:text-primary hover:bg-white dark:hover:bg-gray-700">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15.5777 3.38197L17.5777 4.43152C19.7294 5.56066 20.8052 6.12523 21.4026 7.13974C22 8.15425 22 9.41667 22 11.9415V12.0585C22 14.5833 22 15.8458 21.4026 16.8603C20.8052 17.8748 19.7294 18.4393 17.5777 19.5685L15.5777 20.618C13.8221 21.5393 12.9443 22 12 22C11.0557 22 10.1779 21.5393 8.42229 20.618L6.42229 19.5685C4.27063 18.4393 3.19479 17.8748 2.5974 16.8603C2 15.8458 2 14.5833 2 12.0585V11.9415C2 9.41667 2 8.15425 2.5974 7.13974C3.19479 6.12523 4.27063 5.56066 6.42229 4.43152L8.42229 3.38197C10.1779 2.46066 11.0557 2 12 2C12.9443 2 13.8221 2.46066 15.5777 3.38197Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path
                                    d="M21 7.5L17 9.5M12 12L3 7.5M12 12V21.5M12 12C12 12 14.7426 10.6287 16.5 9.75C16.6953 9.65237 17 9.5 17 9.5M17 9.5V13M17 9.5L7.5 4.5"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                            Produk

                        </a>
                        {{-- <button class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 transition-all duration-200 rounded-md dark:text-gray-200 hover:text-primary dark:hover:text-primary hover:bg-white dark:hover:bg-gray-700">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M4 4h6v6H4V4zm10 0h6v6h-6V4zM4 14h6v6H4v-6zm10 0h6v6h-6v-6z"/>
                                </svg>
                                Product
                                <svg class="w-3 h-3 transition-transform duration-200 group-hover:rotate-180" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                                </svg>
                            </button>
                            <div class="absolute left-0 invisible w-48 mt-1 transition-all duration-200 bg-white border border-gray-200 rounded-lg shadow-lg opacity-0 top-full dark:bg-gray-800 dark:border-gray-700 group-hover:opacity-100 group-hover:visible">
                                <div class="py-1">
                                    <a href="/apps/chat" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 hover:text-primary">Chat</a>
                                    <a href="/apps/mailbox" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 hover:text-primary">Mailbox</a>
                                    <a href="/apps/todolist" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 hover:text-primary">Todo List</a>
                                </div>
                            </div> --}}
                    </div>
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
                            Lowongan Pekerjaan
                        </a>

                    </div>

                    <!-- Components Menu -->
                    <div class="relative group">
                        <a href="{{ route('customer.home.indexService') }}"
                            class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 transition-all duration-200 rounded-md dark:text-gray-200 hover:text-primary dark:hover:text-primary hover:bg-white dark:hover:bg-gray-700">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.1497 8.80219L9.70794 9.40825L10.1497 8.80219ZM12 3.10615L11.4925 3.65833C11.7794 3.9221 12.2206 3.9221 12.5075 3.65833L12 3.10615ZM13.8503 8.8022L14.2921 9.40826L13.8503 8.8022ZM12 9.67598L12 10.426H12L12 9.67598ZM10.5915 8.19612C9.90132 7.69298 9.16512 7.08112 8.60883 6.43627C8.03452 5.77053 7.75 5.18233 7.75 4.71476H6.25C6.25 5.73229 6.82845 6.66885 7.47305 7.41607C8.13569 8.18419 8.97435 8.87349 9.70794 9.40825L10.5915 8.19612ZM7.75 4.71476C7.75 3.65612 8.27002 3.05231 8.8955 2.84182C9.54754 2.62238 10.5199 2.76435 11.4925 3.65833L12.5075 2.55398C11.2302 1.37988 9.70254 0.987559 8.41707 1.42016C7.10502 1.8617 6.25 3.09623 6.25 4.71476H7.75ZM14.2921 9.40826C15.0257 8.8735 15.8643 8.18421 16.527 7.41608C17.1716 6.66886 17.75 5.73229 17.75 4.71475H16.25C16.25 5.18234 15.9655 5.77055 15.3912 6.43629C14.8349 7.08113 14.0987 7.69299 13.4085 8.19613L14.2921 9.40826ZM17.75 4.71475C17.75 3.09622 16.895 1.8617 15.5829 1.42016C14.2975 0.987559 12.7698 1.37988 11.4925 2.55398L12.5075 3.65833C13.4801 2.76435 14.4525 2.62238 15.1045 2.84181C15.73 3.0523 16.25 3.65612 16.25 4.71475H17.75ZM9.70794 9.40825C10.463 9.95869 11.0618 10.426 12 10.426L12 8.92598C11.635 8.92598 11.4347 8.81074 10.5915 8.19612L9.70794 9.40825ZM13.4085 8.19613C12.5653 8.81074 12.365 8.92598 12 8.92598L12 10.426C12.9382 10.426 13.537 9.9587 14.2921 9.40826L13.4085 8.19613Z"
                                    fill="currentColor" />
                                <path
                                    d="M4 21.3884H6.25993C7.27079 21.3884 8.29253 21.4937 9.27633 21.6964C11.0166 22.0549 12.8488 22.0983 14.6069 21.8138C15.4738 21.6734 16.326 21.4589 17.0975 21.0865C17.7939 20.7504 18.6469 20.2766 19.2199 19.7459C19.7921 19.216 20.388 18.3487 20.8109 17.6707C21.1736 17.0894 20.9982 16.3762 20.4245 15.943C19.7873 15.4619 18.8417 15.462 18.2046 15.9433L16.3974 17.3084C15.697 17.8375 14.932 18.3245 14.0206 18.4699C13.911 18.4874 13.7962 18.5033 13.6764 18.5172M13.6764 18.5172C13.6403 18.5214 13.6038 18.5254 13.5668 18.5292M13.6764 18.5172C13.8222 18.486 13.9669 18.396 14.1028 18.2775C14.746 17.7161 14.7866 16.77 14.2285 16.1431C14.0991 15.9977 13.9475 15.8764 13.7791 15.7759C10.9817 14.1074 6.62942 15.3782 4 17.2429M13.6764 18.5172C13.6399 18.525 13.6033 18.5292 13.5668 18.5292M13.5668 18.5292C13.0434 18.5829 12.4312 18.5968 11.7518 18.5326"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                            Layanan Jasa
                        </a>
                    </div>


                    <!-- Elements Menu -->
                    {{-- <div class="relative group">
                        <button
                            class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 transition-all duration-200 rounded-md dark:text-gray-200 hover:text-primary dark:hover:text-primary hover:bg-white dark:hover:bg-gray-700">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M9.5 3A6.5 6.5 0 0 1 16 9.5c0 1.61-.59 3.09-1.56 4.23l.27.27h.79l5 5-1.5 1.5-5-5v-.79l-.27-.27A6.516 6.516 0 0 1 9.5 16 6.5 6.5 0 0 1 3 9.5 6.5 6.5 0 0 1 9.5 3m0 2C7 5 5 7 5 9.5S7 14 9.5 14 14 12 14 9.5 12 5 9.5 5z" />
                            </svg>
                            Elements
                            <svg class="w-3 h-3 transition-transform duration-200 group-hover:rotate-180"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                            </svg>
                        </button>
                        <div
                            class="absolute left-0 invisible w-48 mt-1 transition-all duration-200 bg-white border border-gray-200 rounded-lg shadow-lg opacity-0 top-full dark:bg-gray-800 dark:border-gray-700 group-hover:opacity-100 group-hover:visible">
                            <div class="py-1">
                                <a href="/elements/treeview"
                                    class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 hover:text-primary">Treeview</a>
                                <a href="/elements/typography"
                                    class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 hover:text-primary">Typography</a>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </nav>

            <!-- Right Section: Search & User Menu -->
            <div class="flex items-center gap-3">
                <div class="relative group">
                    <a href="{{ route('customer.message.index') }}"
                        class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 transition-all duration-200 rounded-md dark:text-gray-200 hover:text-primary dark:hover:text-primary hover:bg-white dark:hover:bg-gray-700">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9 12C9 12.5523 8.55228 13 8 13C7.44772 13 7 12.5523 7 12C7 11.4477 7.44772 11 8 11C8.55228 11 9 11.4477 9 12Z"
                                fill="currentColor" />
                            <path
                                d="M13 12C13 12.5523 12.5523 13 12 13C11.4477 13 11 12.5523 11 12C11 11.4477 11.4477 11 12 11C12.5523 11 13 11.4477 13 12Z"
                                fill="currentColor" />
                            <path
                                d="M17 12C17 12.5523 16.5523 13 16 13C15.4477 13 15 12.5523 15 12C15 11.4477 15.4477 11 16 11C16.5523 11 17 11.4477 17 12Z"
                                fill="currentColor" />
                            <path
                                d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 13.5997 2.37562 15.1116 3.04346 16.4525C3.22094 16.8088 3.28001 17.2161 3.17712 17.6006L2.58151 19.8267C2.32295 20.793 3.20701 21.677 4.17335 21.4185L6.39939 20.8229C6.78393 20.72 7.19121 20.7791 7.54753 20.9565C8.88837 21.6244 10.4003 22 12 22Z"
                                stroke="currentColor" stroke-width="1.5" />
                        </svg>
                        Chat
                    </a>
                </div>

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
                        Keranjang
                    </a>

                </div>
                <!-- Search Button (Mobile) -->
                {{-- <button type="button"
                    class="p-2 transition-colors duration-200 bg-gray-100 rounded-lg sm:hidden hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700"
                    aria-label="Search">
                    <svg class="w-5 h-5 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button> --}}

                <!-- Theme Toggle -->
                {{-- <button
                        type="button"
                        class="p-2 transition-colors duration-200 bg-gray-100 rounded-lg hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700"
                        @click="document.documentElement.classList.toggle('dark')"
                        aria-label="Toggle theme">
                        <svg class="w-5 h-5 text-gray-600 dark:text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                            <path class="dark:hidden" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                            <path class="hidden dark:block" d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"/>
                        </svg>
                    </button> --}}

                <!-- User Dropdown -->
                <div class="relative" x-data="{ open: false }" @click.outside="open = false">
                    <button type="button"
                        class="flex items-center gap-2 p-1 transition-colors duration-200 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800"
                        @click="open = !open" aria-label="User menu">
                        @if ($user->profile_pic)
                            <img class="object-cover w-8 h-8 rounded-full ring-2 ring-gray-200 dark:ring-gray-700"
                                src="{{ asset('storage/' . $user->profile_pic) }}" alt="User Avatar" />
                        @else
                            <div
                                class="flex items-center justify-center w-8 h-8 font-semibold text-gray-700 bg-gray-300 rounded-full dark:bg-gray-600 dark:text-gray-100 ring-2 ring-gray-200 dark:ring-gray-700">
                                {{ strtoupper($user->name[0]) }}
                            </div>
                        @endif
                        <div class="hidden text-left md:block">
                            <div class="text-sm font-medium text-gray-700 dark:text-gray-200">
                                {{ auth()->user()->name }}
                            </div>
                            {{-- <div class="text-xs text-gray-500 dark:text-gray-400">Admin</div> --}}
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
                                @if ($user->profile_pic)
                                    <img class="object-cover w-10 h-10 rounded-full"
                                        src="{{ asset('storage/' . $user->profile_pic) }}" alt="User Avatar" />
                                @else
                                    <div
                                        class="flex items-center justify-center w-10 h-10 font-semibold text-gray-700 bg-gray-300 rounded-full dark:bg-gray-600 dark:text-gray-100">
                                        {{ strtoupper($user->name[0]) }}
                                    </div>
                                @endif
                                <div>
                                    <div class="flex items-center gap-2 font-medium text-gray-900 dark:text-white">
                                        {{ auth()->user()->name }}
                                        {{-- <span class="text-xs text-gray-500 dark:text-gray-400">Admin</span> --}}

                                    </div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">{{ auth()->user()->email }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Menu Items -->
                        <div class="py-1">
                            <p class="flex items-center gap-3 px-4 text-xs text-gray-600 dark:text-gray-200 ">
                                Pengguna
                            </p>
                            <a href="/customer/profile"
                                class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 transition-colors duration-200 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Profil Saya
                            </a>
                            <p class="flex items-center gap-3 px-4 text-xs text-gray-600 dark:text-gray-200 ">
                                Riwayat
                            </p>
                            <a href="/customer/order"
                                class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 transition-colors duration-200 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.5777 3.38197L17.5777 4.43152C19.7294 5.56066 20.8052 6.12523 21.4026 7.13974C22 8.15425 22 9.41667 22 11.9415V12.0585C22 14.5833 22 15.8458 21.4026 16.8603C20.8052 17.8748 19.7294 18.4393 17.5777 19.5685L15.5777 20.618C13.8221 21.5393 12.9443 22 12 22C11.0557 22 10.1779 21.5393 8.42229 20.618L6.42229 19.5685C4.27063 18.4393 3.19479 17.8748 2.5974 16.8603C2 15.8458 2 14.5833 2 12.0585V11.9415C2 9.41667 2 8.15425 2.5974 7.13974C3.19479 6.12523 4.27063 5.56066 6.42229 4.43152L8.42229 3.38197C10.1779 2.46066 11.0557 2 12 2C12.9443 2 13.8221 2.46066 15.5777 3.38197Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    <path
                                        d="M21 7.5L17 9.5M12 12L3 7.5M12 12V21.5M12 12C12 12 14.7426 10.6287 16.5 9.75C16.6953 9.65237 17 9.5 17 9.5M17 9.5V13M17 9.5L7.5 4.5"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                </svg>

                                Riwayat Produk
                            </a>
                            <a href="/customer/service"
                                class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 transition-colors duration-200 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.1497 8.80219L9.70794 9.40825L10.1497 8.80219ZM12 3.10615L11.4925 3.65833C11.7794 3.9221 12.2206 3.9221 12.5075 3.65833L12 3.10615ZM13.8503 8.8022L14.2921 9.40826L13.8503 8.8022ZM12 9.67598L12 10.426H12L12 9.67598ZM10.5915 8.19612C9.90132 7.69298 9.16512 7.08112 8.60883 6.43627C8.03452 5.77053 7.75 5.18233 7.75 4.71476H6.25C6.25 5.73229 6.82845 6.66885 7.47305 7.41607C8.13569 8.18419 8.97435 8.87349 9.70794 9.40825L10.5915 8.19612ZM7.75 4.71476C7.75 3.65612 8.27002 3.05231 8.8955 2.84182C9.54754 2.62238 10.5199 2.76435 11.4925 3.65833L12.5075 2.55398C11.2302 1.37988 9.70254 0.987559 8.41707 1.42016C7.10502 1.8617 6.25 3.09623 6.25 4.71476H7.75ZM14.2921 9.40826C15.0257 8.8735 15.8643 8.18421 16.527 7.41608C17.1716 6.66886 17.75 5.73229 17.75 4.71475H16.25C16.25 5.18234 15.9655 5.77055 15.3912 6.43629C14.8349 7.08113 14.0987 7.69299 13.4085 8.19613L14.2921 9.40826ZM17.75 4.71475C17.75 3.09622 16.895 1.8617 15.5829 1.42016C14.2975 0.987559 12.7698 1.37988 11.4925 2.55398L12.5075 3.65833C13.4801 2.76435 14.4525 2.62238 15.1045 2.84181C15.73 3.0523 16.25 3.65612 16.25 4.71475H17.75ZM9.70794 9.40825C10.463 9.95869 11.0618 10.426 12 10.426L12 8.92598C11.635 8.92598 11.4347 8.81074 10.5915 8.19612L9.70794 9.40825ZM13.4085 8.19613C12.5653 8.81074 12.365 8.92598 12 8.92598L12 10.426C12.9382 10.426 13.537 9.9587 14.2921 9.40826L13.4085 8.19613Z"
                                        fill="currentColor" />
                                    <path
                                        d="M4 21.3884H6.25993C7.27079 21.3884 8.29253 21.4937 9.27633 21.6964C11.0166 22.0549 12.8488 22.0983 14.6069 21.8138C15.4738 21.6734 16.326 21.4589 17.0975 21.0865C17.7939 20.7504 18.6469 20.2766 19.2199 19.7459C19.7921 19.216 20.388 18.3487 20.8109 17.6707C21.1736 17.0894 20.9982 16.3762 20.4245 15.943C19.7873 15.4619 18.8417 15.462 18.2046 15.9433L16.3974 17.3084C15.697 17.8375 14.932 18.3245 14.0206 18.4699C13.911 18.4874 13.7962 18.5033 13.6764 18.5172M13.6764 18.5172C13.6403 18.5214 13.6038 18.5254 13.5668 18.5292M13.6764 18.5172C13.8222 18.486 13.9669 18.396 14.1028 18.2775C14.746 17.7161 14.7866 16.77 14.2285 16.1431C14.0991 15.9977 13.9475 15.8764 13.7791 15.7759C10.9817 14.1074 6.62942 15.3782 4 17.2429M13.6764 18.5172C13.6399 18.525 13.6033 18.5292 13.5668 18.5292M13.5668 18.5292C13.0434 18.5829 12.4312 18.5968 11.7518 18.5326"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                                Riwayat Layanan Jasa
                            </a>
                            <a href="/customer/transaction"
                                class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 transition-colors duration-200 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2 11C2 8.17157 2 6.75736 2.87868 5.87868C3.75736 5 5.17157 5 8 5H13C15.8284 5 17.2426 5 18.1213 5.87868C19 6.75736 19 8.17157 19 11C19 13.8284 19 15.2426 18.1213 16.1213C17.2426 17 15.8284 17 13 17H8C5.17157 17 3.75736 17 2.87868 16.1213C2 15.2426 2 13.8284 2 11Z"
                                        stroke="currentColor" stroke-width="1.5" />
                                    <path
                                        d="M19.0001 8.07617C19.9751 8.17208 20.6315 8.38885 21.1214 8.87873C22.0001 9.75741 22.0001 11.1716 22.0001 14.0001C22.0001 16.8285 22.0001 18.2427 21.1214 19.1214C20.2427 20.0001 18.8285 20.0001 16.0001 20.0001H11.0001C8.17163 20.0001 6.75742 20.0001 5.87874 19.1214C5.38884 18.6315 5.17208 17.9751 5.07617 17"
                                        stroke="currentColor" stroke-width="1.5" />
                                    <path
                                        d="M13 11C13 12.3807 11.8807 13.5 10.5 13.5C9.11929 13.5 8 12.3807 8 11C8 9.61929 9.11929 8.5 10.5 8.5C11.8807 8.5 13 9.61929 13 11Z"
                                        stroke="currentColor" stroke-width="1.5" />
                                    <path d="M16 13L16 9" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" />
                                    <path d="M5 13L5 9" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" />
                                </svg>
                                Riwayat Transaksi
                            </a>
                        
                            <p class="flex items-center gap-3 px-4 text-xs text-gray-600 dark:text-gray-200 ">
                                Pekerjaan
                            </p>
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
                                Buat Lowongan Kerja
                            </a>
                            <a href="{{ route('employer.job.index') }}"
                                class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 transition-colors duration-200 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C4.97196 6.49956 7.81811 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957Z"
                                        stroke="currentColor" stroke-width="1.5" />
                                    <path
                                        d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                                        stroke="currentColor" stroke-width="1.5" />
                                </svg>
                                Lihat Loker Saya
                            </a>
                            <a href="{{ route('customer.jobApply.index') }}"
                                class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 transition-colors duration-200 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700">
                                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-dasharray="0.5 3.5" />
                                    <path d="M22 12C22 6.47715 17.5228 2 12 2" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M12 9V13H16" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                Riwayat Lamaran Saya
                            </a>
                            {{-- <a href="/auth/boxed-lockscreen"
                                class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 transition-colors duration-200 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                Lock Screen
                            </a> --}}
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
