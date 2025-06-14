<div :class="{ 'dark text-white-dark': $store.app.semidark }">
    <nav x-data="sidebar"
        class="sidebar fixed min-h-screen h-full top-0 bottom-0 w-[260px] shadow-[5px_0_25px_0_rgba(94,92,154,0.1)] z-50 transition-all duration-300">
        <div class="bg-white dark:bg-[#0e1726] h-full ">
            <div class="flex items-center justify-between px-4 py-3">
                <a href="/" class="flex items-center main-logo shrink-0">
                   <span class="hidden text-xl font-bold text-gray-800 dark:text-white sm:block">
                        WargaUsaha
                    </span>
                </a>
                <a href="javascript:;"
                    class="flex items-center w-8 h-8 transition duration-300 rounded-full collapse-icon hover:bg-gray-500/10 dark:hover:bg-dark-light/10 dark:text-white-light rtl:rotate-180"
                    @click="$store.app.toggleSidebar()">
                    <svg class="w-5 h-5 m-auto" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </div>

            <!-- Mode Toggle Buttons -->
            <div class="px-4 pb-4 py-4">
                <div class="flex bg-gray-100 dark:bg-dark/20 rounded-lg p-1">
                    <button @click="setActiveMode('customer')"
                            :class="activeMode === 'customer' ? 'bg-white dark:bg-[#0e1726] shadow-sm text-primary' : 'text-gray-500 dark:text-gray-400'"
                            class="flex-1 py-2 px-3 rounded-md text-sm font-medium transition-all duration-200">
                        <div class="flex items-center justify-center">
                            Profil Saya
                        </div>
                    </button>
                    <button @click="setActiveMode('seller')"
                            :class="activeMode === 'seller' ? 'bg-white dark:bg-[#0e1726] shadow-sm text-primary' : 'text-gray-500 dark:text-gray-400'"
                            class="flex-1 py-2 px-3 rounded-md text-sm font-medium transition-all duration-200">
                        <div class="flex items-center justify-center">
                            Toko Sewa
                        </div>
                    </button>
                </div>
            </div>

            <ul class="perfect-scrollbar relative font-semibold space-y-0.5 h-[calc(100vh-140px)] overflow-y-auto overflow-x-hidden p-4 py-0"
                x-data="{ activeDropdown: null }">

                <h2 class="py-3 px-7 flex items-center uppercase font-extrabold bg-white-light/30 dark:bg-dark dark:bg-opacity-[0.08] -mx-4 mb-1">
                    <svg class="flex-none hidden w-4 h-5" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    <span x-text="activeMode === 'customer' ? 'Menu Customer' : 'Menu Seller'"></span>
                </h2>

                <!-- Customer Menu -->
                <div x-show="activeMode === 'customer'" x-transition>
                    <li class="nav-item">
                        <ul>
                            <li class="nav-item">
                                <a href="/customer/profile" class="group" :class="isActiveRoute('/customer/profile') ? 'active' : ''">
                                    <div class="flex items-center">
                                        <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Profile</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/customer/orders" class="group" :class="isActiveRoute('/customer/orders') ? 'active' : ''">
                                    <div class="flex items-center">
                                        <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Riwayat Transaksi</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/customer/products" class="group" :class="isActiveRoute('/customer/products') ? 'active' : ''">
                                    <div class="flex items-center">
                                        <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Riwayat Produk</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/customer/services" class="group" :class="isActiveRoute('/customer/services') ? 'active' : ''">
                                    <div class="flex items-center">
                                        <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Riwayat Layanan</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </div>

                <!-- Seller Menu -->
                <div x-show="activeMode === 'seller'" x-transition>
                    <li class="nav-item">
                        @if (auth()->user()->role == 'Seller')
                        <ul>
                            <li class="nav-item">
                                <a href="/seller/profile" class="group" :class="isActiveRoute('/seller/profile') ? 'active' : ''">
                                    <div class="flex items-center">
                                        <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Profile</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/seller/product" class="group" :class="isActiveRoute('/seller/product') ? 'active' : ''">
                                    <div class="flex items-center">
                                        <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Produk Saya</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/seller/service" class="group" :class="isActiveRoute('/seller/service') ? 'active' : ''">
                                    <div class="flex items-center">
                                        <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Layanan Saya</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/seller/order/product" class="group" :class="isActiveRoute('/seller/order/product') ? 'active' : ''">
                                    <div class="flex items-center">
                                        <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Transaksi Product</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/seller/order/service" class="group" :class="isActiveRoute('/seller/order/service') ? 'active' : ''">
                                    <div class="flex items-center">
                                        <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Transaksi Layanan</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/seller/withdraw" class="group" :class="isActiveRoute('/seller/withdraw') ? 'active' : ''">
                                    <div class="flex items-center">
                                        <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Transaksi Withdraw</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/seller/mart" class="group" :class="isActiveRoute('/seller/mart') ? 'active' : ''">
                                    <div class="flex items-center">
                                        <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Pengaturan Toko</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        @else
                        <ul>
                            <li class="nav-item">
                                <a href="/customer/mart-registration/create" class="group" :class="isActiveRoute('/customer/mart-registration/create') ? 'active' : ''">
                                    <div class="flex items-center">
                                        <span class="ltr:pl-3 rtl:pr-3 text-black dark:text-[#506690] dark:group-hover:text-white-dark">Registrasi Toko</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        @endif
                    </li>
                </div>

                <!-- Footer -->
                {{-- <div class="p-4 mt-auto border-t dark:border-gray-700">
                    <div class="flex items-center justify-center p-3 bg-indigo-50 dark:bg-[#1a223f] rounded-lg">
                        <div class="text-center">
                            <p class="text-xs text-indigo-600 dark:text-indigo-400">WargaUsaha v1.0</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">© 2023 All rights reserved</p>
                        </div>
                    </div>
                </div> --}}
            </ul>
        </div>
    </nav>
</div>

<style>
    .nav-item a.active {
        @apply bg-primary/10 text-primary border-r-2 border-primary;
    }

    .nav-item a.active span {
        @apply text-primary font-semibold;
    }

    .dark .nav-item a.active {
        @apply bg-primary/20;
    }
</style>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('sidebar', () => ({
            activeMode: 'customer', // default mode

            init() {
                // Set active mode based on current route
                this.setActiveModeFromRoute();

                // Listen for route changes (if using SPA routing)
                window.addEventListener('popstate', () => {
                    this.setActiveModeFromRoute();
                });
            },

            setActiveModeFromRoute() {
                const currentPath = window.location.pathname;

                if (currentPath.startsWith('/seller/')) {
                    this.activeMode = 'seller';
                } else if (currentPath.startsWith('/customer/')) {
                    this.activeMode = 'customer';
                }
            },

            setActiveMode(mode) {
                this.activeMode = mode;
            },

            isActiveRoute(route) {
                return window.location.pathname === route ||
                       window.location.pathname.startsWith(route + '/');
            }
        }));
    });
</script>
