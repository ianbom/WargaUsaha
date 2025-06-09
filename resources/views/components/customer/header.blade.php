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
                    <img class="w-8 h-8 transition-transform duration-200 group-hover:scale-105"
                        src="/assets/images/logo.svg" alt="VRISTO Logo" />
                    <span class="hidden text-xl font-bold text-gray-800 dark:text-white sm:block">
                        VRISTO
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
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M3 13h1v7c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-7h1a1 1 0 0 0 .707-1.707l-9-9a.999.999 0 0 0-1.414 0l-9 9A1 1 0 0 0 3 13z" />
                            </svg>
                            Home

                        </a>

                    </div>

                    <!-- Apps Menu -->
                    <div class="relative group">
                        <a href="{{ route('customer.home.indexProduct') }}"
                            class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 transition-all duration-200 rounded-md dark:text-gray-200 hover:text-primary dark:hover:text-primary hover:bg-white dark:hover:bg-gray-700">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M4 4h6v6H4V4zm10 0h6v6h-6V4zM4 14h6v6H4v-6zm10 0h6v6h-6v-6z" />
                            </svg>
                            Products

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
                        <a href="{{ route('customer.home.indexService') }}"
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
                    <!-- Components Menu -->
                    <div class="relative group">
                        <a href="{{ route('customer.home.indexService') }}"
                            class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 transition-all duration-200 rounded-md dark:text-gray-200 hover:text-primary dark:hover:text-primary hover:bg-white dark:hover:bg-gray-700">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M22.7 19l-9.1-9.1c.9-2.3.4-5-1.5-6.9-2-2-5-2.4-7.4-1.3L9 6 6 9 1.6 4.7C.4 7.1.9 10.1 2.9 12.1c1.9 1.9 4.6 2.4 6.9 1.5l9.1 9.1c.4.4 1 .4 1.4 0l2.3-2.3c.5-.4.5-1.1.1-1.4zM6.5 10.9L5.1 9.5l.4-1.2L7.1 10l-1.2.4-.4.5zm8.9 3.6c-.9.9-2.4.9-3.3 0-.9-.9-.9-2.4 0-3.3.9-.9 2.4-.9 3.3 0 .9.9.9 2.4 0 3.3z" />
                            </svg>
                            Services

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
                        Cart
                    </a>

                </div>
                <!-- Search Button (Mobile) -->
                <button type="button"
                    class="p-2 transition-colors duration-200 bg-gray-100 rounded-lg sm:hidden hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700"
                    aria-label="Search">
                    <svg class="w-5 h-5 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>

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
                        <img class="object-cover w-8 h-8 rounded-full ring-2 ring-gray-200 dark:ring-gray-700"
                            src="{{ asset('storage/' . auth()->user()->profile_pic) }}" alt="User Avatar" />
                        <div class="hidden text-left md:block">
                            <div class="text-sm font-medium text-gray-700 dark:text-gray-200">{{ auth()->user()->name }}
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
                                <img class="object-cover w-10 h-10 rounded-full"
                                    src="{{ asset('storage/' . auth()->user()->profile_pic) }}" alt="User Avatar" />
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
                            <a href="/customer/transaction"
                                class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 transition-colors duration-200 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                Riwayat Transaksi
                            </a>
                            <a href="{{route('employer.job.create')}}"
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
