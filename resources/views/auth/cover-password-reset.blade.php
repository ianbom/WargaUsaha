<x-layout.auth>

    <div x-data="auth">
        <div class="absolute inset-0">
            <img src="/assets/images/auth/bg-gradient.png" alt="image" class="object-cover w-full h-full" />
        </div>
        <div
            class="relative flex min-h-screen items-center justify-center bg-[url(/assets/images/auth/map.png)] bg-cover bg-center bg-no-repeat px-6 py-10 dark:bg-[#060818] sm:px-16">
            <img src="/assets/images/auth/coming-soon-object1.png" alt="image"
                class="absolute left-0 top-1/2 h-full max-h-[893px] -translate-y-1/2" />
            {{-- <img src="/assets/images/auth/coming-soon-object2.png" alt="image" class="absolute left-24 top-0 h-40 md:left-[30%]" />
            <img src="/assets/images/auth/coming-soon-object3.png" alt="image" class="absolute right-0 top-0 h-[300px]" />
            <img src="/assets/images/auth/polygon-object.svg" alt="image" class="absolute bottom-0 end-[28%]" /> --}}
            <div
                class="relative flex w-full max-w-[1502px] flex-col justify-between overflow-hidden rounded-md bg-white/60 backdrop-blur-lg dark:bg-black/50 lg:min-h-[758px] lg:flex-row lg:gap-10 xl:gap-0">
                <div
                    class="relative hidden w-full items-center justify-center bg-[linear-gradient(225deg,rgba(147,197,253,1)_0%,rgba(181,165,250,1)_100%)] p-5 lg:inline-flex lg:max-w-[835px] xl:-ms-28 ltr:xl:skew-x-[14deg] rtl:xl:skew-x-[-14deg]">
                    <div
                        class="absolute inset-y-0 w-8 from-primary/10 via-transparent to-transparent ltr:-right-10 ltr:bg-gradient-to-r rtl:-left-10 rtl:bg-gradient-to-l xl:w-16 ltr:xl:-right-20 rtl:xl:-left-20">
                    </div>
                    <div class="ltr:xl:-skew-x-[14deg] rtl:xl:skew-x-[14deg]">
                        <a href="/" class="flex items-center w-48 gap-3 lg:w-72 ms-10">
                            <p class="w-full text-5xl font-bold text-gradient">WargaUsaha</p>
                        </a>
                        <div class="mt-24 hidden w-full max-w-[430px] lg:block">
                            <img src="/assets/images/auth/reset-password.svg" alt="Cover Image" class="w-full" />
                        </div>
                    </div>
                </div>
                <div
                    class="relative flex w-full flex-col items-center justify-center gap-6 px-4 pb-16 pt-6 sm:px-6 lg:max-w-[667px]">
                    <div
                        class="flex w-full max-w-[440px] items-center gap-2 lg:absolute lg:end-6 lg:top-6 lg:max-w-full">
                        <a href="/" class="block w-8 lg:hidden">
                            <img src="/assets/images/logo.svg" alt="Logo" class="w-full" />
                        </a>
                        {{-- <div class="dropdown ms-auto w-max" x-data="dropdown" @click.outside="open = false">
                            <a href="javascript:;"
                                class="flex items-center gap-2.5 rounded-lg border border-white-dark/30 bg-white px-2 py-1.5 text-white-dark hover:border-primary hover:text-primary dark:bg-black"
                                :class="{ '!border-primary !text-primary': open }" @click="toggle">
                                <div>
                                    <img :src="`/assets/images/flags/${$store.app.locale.toUpperCase()}.svg`"
                                        alt="image" class="object-cover w-5 h-5 rounded-full" />
                                </div>
                                <div x-text="$store.app.locale" class="text-base font-bold uppercase"></div>
                                <span class="shrink-0" :class="{ 'rotate-180': open }">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6.99989 9.79988C6.59156 9.79988 6.18322 9.64238 5.87406 9.33321L2.07072 5.52988C1.90156 5.36071 1.90156 5.08071 2.07072 4.91154C2.23989 4.74238 2.51989 4.74238 2.68906 4.91154L6.49239 8.71488C6.77239 8.99488 7.22739 8.99488 7.50739 8.71488L11.3107 4.91154C11.4799 4.74238 11.7599 4.74238 11.9291 4.91154C12.0982 5.08071 12.0982 5.36071 11.9291 5.52988L8.12572 9.33321C7.81656 9.64238 7.40822 9.79988 6.99989 9.79988Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                            </a>
                            <ul x-cloak x-show="open" x-transition x-transition.duration.300ms
                                class="top-11 grid w-[280px] grid-cols-2 gap-y-2 !px-2 font-semibold text-dark ltr:-right-14 rtl:-left-14 dark:text-white-dark dark:text-white-light/90 sm:ltr:-right-2 sm:rtl:-left-2">
                                <template x-for="item in languages">
                                    <li>
                                        <a href="javascript:;" class="hover:text-primary"
                                            @click="$store.app.toggleLocale(item.value),toggle()"
                                            :class="{ 'bg-primary/10 text-primary': $store.app.locale == item.value }">
                                            <img class="object-cover w-5 h-5 rounded-full"
                                                :src="`/assets/images/flags/${item.value.toUpperCase()}.svg`"
                                                alt="image" />
                                            <span class="ltr:ml-3 rtl:mr-3" x-text="item.key"></span>
                                        </a>
                                    </li>
                                </template>
                            </ul>
                        </div> --}}
                    </div>
                    <div class="w-full max-w-[440px] lg:mt-16">
                        <div class="mb-7">
                            <h1 class="text-3xl font-extrabold uppercase !leading-snug text-primary md:text-4xl">Reset
                                Password
                            </h1>
                            <p>Masukkan email anda dan kami akan mengirimkan link untuk reset password.</p>
                        </div>

                        <!-- Session Status -->
                        @if (session('status'))
                            <div class="p-4 mb-4 border border-green-200 rounded-md bg-green-50">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="w-5 h-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-green-800">
                                            {{ session('status') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <form class="space-y-5" action="{{ route('password.email') }}" method="POST">
                            @csrf
                            <div>
                                <label for="email"
                                    class="block text-sm font-medium text-gray-700 dark:text-white">Email</label>
                                <div class="relative text-white-dark">
                                    <input id="email" name="email" type="email" value="{{ old('email') }}"
                                        placeholder="Masukkan Email Anda"
                                        class="form-input pl-10 placeholder:text-white-dark @error('email') border-red-500 @enderror"
                                        required autofocus />
                                    <span class="absolute -translate-y-1/2 left-4 top-1/2">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                                            <path opacity="0.5"
                                                d="M10.65 2.25H7.35C4.23873 2.25 2.6831 2.25 1.71655 3.23851C0.75 4.22703 0.75 5.81802 0.75 9C0.75 12.182 0.75 13.773 1.71655 14.7615C2.6831 15.75 4.23873 15.75 7.35 15.75H10.65C13.7613 15.75 15.3169 15.75 16.2835 14.7615C17.25 13.773 17.25 12.182 17.25 9C17.25 5.81802 17.25 4.22703 16.2835 3.23851C15.3169 2.25 13.7613 2.25 10.65 2.25Z"
                                                fill="currentColor" />
                                            <path
                                                d="M14.3465 6.02574C14.609 5.80698 14.6445 5.41681 14.4257 5.15429C14.207 4.89177 13.8168 4.8563 13.5543 5.07507L11.7732 6.55931C11.0035 7.20072 10.4691 7.6446 10.018 7.93476C9.58125 8.21564 9.28509 8.30993 9.00041 8.30993C8.71572 8.30993 8.41956 8.21564 7.98284 7.93476C7.53168 7.6446 6.9973 7.20072 6.22761 6.55931L4.44652 5.07507C4.184 4.8563 3.79384 4.89177 3.57507 5.15429C3.3563 5.41681 3.39177 5.80698 3.65429 6.02574L5.4664 7.53583C6.19764 8.14522 6.79033 8.63914 7.31343 8.97558C7.85834 9.32604 8.38902 9.54743 9.00041 9.54743C9.6118 9.54743 10.1425 9.32604 10.6874 8.97558C11.2105 8.63914 11.8032 8.14522 12.5344 7.53582L14.3465 6.02574Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                </div>
                                @error('email')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit"
                                class="btn w-full !mt-6 border-0 uppercase bg-gradient-to-r from-blue-500 to-indigo-500 hover:from-blue-600 hover:to-indigo-600 text-white shadow-md transition duration-300">
                                EMAIL PASSWORD RESET LINK
                            </button>
                        </form>

                        <!-- Back to Login Link -->
                        <div class="mt-6 text-center">
                            <a href="{{ route('login') }}" class="font-bold text-primary hover:text-black">
                                Back to Login
                            </a>
                        </div>
                    </div>
                    <p class="absolute w-full text-center bottom-6 dark:text-white">
                        © <span id="footer-year">2025</span>. WargaUsaha All Rights Reserved.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <style>
        .text-gradient {
            background: linear-gradient(150deg, #1643aa 0%, #7f4cae 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('auth', () => ({
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
            }));
        });

        // Update footer year
        document.getElementById('footer-year').textContent = new Date().getFullYear();
    </script>

</x-layout.auth>
