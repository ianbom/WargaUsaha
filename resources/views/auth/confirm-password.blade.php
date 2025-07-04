<x-layout.auth>

    <div x-data="auth">
        <div class="absolute inset-0">
            <img src="/assets/images/auth/bg-gradient.png" alt="image" class="object-cover w-full h-full" />
        </div>
        <div
            class="relative flex min-h-screen items-center justify-center bg-[url(/assets/images/auth/map.png)] bg-cover bg-center bg-no-repeat px-6 py-10 dark:bg-[#060818] sm:px-16">
            <img src="/assets/images/auth/coming-soon-object1.png" alt="image"
                class="absolute left-0 top-1/2 h-full max-h-[893px] -translate-y-1/2" />
            <div
                class="relative w-full max-w-[870px] rounded-md bg-[linear-gradient(45deg,#fff9f9_0%,rgba(255,255,255,0)_25%,rgba(255,255,255,0)_75%,_#fff9f9_100%)] p-2 dark:bg-[linear-gradient(52.22deg,#0E1726_0%,rgba(14,23,38,0)_18.66%,rgba(14,23,38,0)_51.04%,rgba(14,23,38,0)_80.07%,#0E1726_100%)]">
                <div
                    class="relative flex flex-col justify-center rounded-md bg-white/60 backdrop-blur-lg dark:bg-black/50 px-6 lg:min-h-[758px] py-20">
                    <div class="absolute top-6 end-6">
                        {{-- <div class="dropdown" x-data="dropdown" @click.outside="open = false">
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
                    <div class="mx-auto w-full max-w-[440px]">
                        <div class="mb-7">
                            <h1 class="text-3xl font-extrabold uppercase !leading-snug text-primary md:text-4xl">RESEt
                                Password
                            </h1>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Enter your new password to reset your
                                account</p>
                        </div>

                        <!-- Display validation errors -->
                        @if ($errors->any())
                            <div class="p-4 mb-4 border border-red-200 rounded-md bg-red-50">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="w-5 h-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <div class="text-sm text-red-800">
                                            <ul class="space-y-1 list-disc list-inside">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <form class="space-y-5" action="{{ route('password.store') }}" method="POST">
                            @csrf

                            <!-- Hidden Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <!-- Email Field -->
                            <div>
                                <label for="email"
                                    class="block text-sm font-medium text-gray-700 dark:text-white">Email</label>
                                <div class="relative text-white-dark">
                                    <input id="email" name="email" type="email"
                                        value="{{ old('email', $request->email) }}" placeholder="Enter Email"
                                        class="form-input ps-10 placeholder:text-white-dark @error('email') border-red-500 @enderror"
                                        required autofocus readonly />
                                    <span class="absolute -translate-y-1/2 start-4 top-1/2">
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

                            <!-- Password Field -->
                            <div>
                                <label for="password"
                                    class="block text-sm font-medium text-gray-700 dark:text-white">New Password</label>
                                <div class="relative text-white-dark">
                                    <input id="password" name="password" type="password"
                                        placeholder="Enter New Password"
                                        class="form-input ps-10 placeholder:text-white-dark @error('password') border-red-500 @enderror"
                                        required />
                                    <span class="absolute -translate-y-1/2 start-4 top-1/2">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                                            <path opacity="0.5"
                                                d="M1.5 12C1.5 8.68629 4.18629 6 7.5 6H10.5C13.8137 6 16.5 8.68629 16.5 12C16.5 15.3137 13.8137 18 10.5 18H7.5C4.18629 18 1.5 15.3137 1.5 12Z"
                                                fill="currentColor" />
                                            <path
                                                d="M6 12.75C6.41421 12.75 6.75 12.4142 6.75 12C6.75 11.5858 6.41421 11.25 6 11.25C5.58579 11.25 5.25 11.5858 5.25 12C5.25 12.4142 5.58579 12.75 6 12.75Z"
                                                fill="currentColor" />
                                            <path
                                                d="M9 12.75C9.41421 12.75 9.75 12.4142 9.75 12C9.75 11.5858 9.41421 11.25 9 11.25C8.58579 11.25 8.25 11.5858 8.25 12C8.25 12.4142 8.58579 12.75 9 12.75Z"
                                                fill="currentColor" />
                                            <path
                                                d="M12.75 12C12.75 12.4142 12.4142 12.75 12 12.75C11.5858 12.75 11.25 12.4142 11.25 12C11.25 11.5858 11.5858 11.25 12 11.25C12.4142 11.25 12.75 11.5858 12.75 12Z"
                                                fill="currentColor" />
                                            <path
                                                d="M5.0625 6C5.0625 3.82538 6.82538 2.0625 9 2.0625C11.1746 2.0625 12.9375 3.82538 12.9375 6V6.56066C13.4629 6.87439 13.9289 7.27034 14.3187 7.72959C14.4138 7.83815 14.5 7.95243 14.5781 8.07143C14.5388 8.04803 14.4985 8.0259 14.4573 8.00503C13.6654 7.61914 12.7726 7.40625 11.8359 7.40625H6.16406C5.22739 7.40625 4.33456 7.61914 3.54272 8.00503C3.50147 8.0259 3.46121 8.04803 3.42188 8.07143C3.5 7.95243 3.58618 7.83815 3.68127 7.72959C4.07107 7.27034 4.53711 6.87439 5.0625 6.56066V6Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                </div>
                                @error('password')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Confirm Password Field -->
                            <div>
                                <label for="password_confirmation"
                                    class="block text-sm font-medium text-gray-700 dark:text-white">Confirm
                                    Password</label>
                                <div class="relative text-white-dark">
                                    <input id="password_confirmation" name="password_confirmation" type="password"
                                        placeholder="Confirm New Password"
                                        class="form-input ps-10 placeholder:text-white-dark @error('password_confirmation') border-red-500 @enderror"
                                        required />
                                    <span class="absolute -translate-y-1/2 start-4 top-1/2">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                                            <path opacity="0.5"
                                                d="M1.5 12C1.5 8.68629 4.18629 6 7.5 6H10.5C13.8137 6 16.5 8.68629 16.5 12C16.5 15.3137 13.8137 18 10.5 18H7.5C4.18629 18 1.5 15.3137 1.5 12Z"
                                                fill="currentColor" />
                                            <path
                                                d="M6 12.75C6.41421 12.75 6.75 12.4142 6.75 12C6.75 11.5858 6.41421 11.25 6 11.25C5.58579 11.25 5.25 11.5858 5.25 12C5.25 12.4142 5.58579 12.75 6 12.75Z"
                                                fill="currentColor" />
                                            <path
                                                d="M9 12.75C9.41421 12.75 9.75 12.4142 9.75 12C9.75 11.5858 9.41421 11.25 9 11.25C8.58579 11.25 8.25 11.5858 8.25 12C8.25 12.4142 8.58579 12.75 9 12.75Z"
                                                fill="currentColor" />
                                            <path
                                                d="M12.75 12C12.75 12.4142 12.4142 12.75 12 12.75C11.5858 12.75 11.25 12.4142 11.25 12C11.25 11.5858 11.5858 11.25 12 11.25C12.4142 11.25 12.75 11.5858 12.75 12Z"
                                                fill="currentColor" />
                                            <path
                                                d="M5.0625 6C5.0625 3.82538 6.82538 2.0625 9 2.0625C11.1746 2.0625 12.9375 3.82538 12.9375 6V6.56066C13.4629 6.87439 13.9289 7.27034 14.3187 7.72959C14.4138 7.83815 14.5 7.95243 14.5781 8.07143C14.5388 8.04803 14.4985 8.0259 14.4573 8.00503C13.6654 7.61914 12.7726 7.40625 11.8359 7.40625H6.16406C5.22739 7.40625 4.33456 7.61914 3.54272 8.00503C3.50147 8.0259 3.46121 8.04803 3.42188 8.07143C3.5 7.95243 3.58618 7.83815 3.68127 7.72959C4.07107 7.27034 4.53711 6.87439 5.0625 6.56066V6Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                </div>
                                @error('password_confirmation')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit"
                                class="btn w-full !mt-6 border-0 uppercase bg-gradient-to-r from-blue-500 to-indigo-500 hover:from-blue-600 hover:to-indigo-600 text-white shadow-md transition duration-300">
                                RESET PASSWORD
                            </button>
                        </form>

                        <!-- Back to Login Link -->
                        <div class="mt-6 text-center">
                            <a href="{{ route('login') }}" class="font-bold text-sm text-primary hover:underline">
                                Back to Login
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // main section
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
    </script>

</x-layout.auth>
