<x-seller.app>
    <div>
        <div class="flex items-center justify-between ">
            <div class="text-xl font-semibold text-gray-800">
                Account Settings
            </div>
            <nav class="flex items-center space-x-2 text-sm text-gray-600">
                <a href="#" class="transition-colors text-primary hover:underline">Dashboard</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <a href="{{route('seller.profile.index')}}" class="transition-colors text-primary hover:underline">Profile</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="text-gray-800">Account Settings</span>
            </nav>
        </div>
        <div class="pt-5">
            <div class="mb-0">
                @include('web.seller.alert.success')
            </div>
            <div class="mb-0">
                @include('web.seller.alert.error')
            </div>
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
                            <div class="grid grid-cols-1 gap-5 lg:grid-cols-3 xl:grid-cols-4">
            <!-- Panel Kiri: Informasi Profil -->
            <div class="panel">
                <div class="flex items-center justify-between mb-5">
                    <h5 class="text-lg font-semibold dark:text-white-light">Profil Saya</h5>
                </div>
                <div class="flex flex-col items-center mb-6">
                    <div class="relative mb-4">
                        @if ($user->profile_pic)
                            <img src="{{ asset('storage/' . $user->profile_pic) }}" alt="Foto Profil"
                                class="object-cover w-24 h-24 border-4 border-white rounded-full shadow-md">
                        @else
                            <div
                                class="flex items-center justify-center w-24 h-24 text-sm font-medium text-center text-gray-600 bg-gray-200 border-4 border-white rounded-full shadow-md">
                                Belum ada foto
                            </div>
                        @endif
                    </div>
                    <h3 class="text-xl font-semibold text-primary">{{ auth()->user()->name }}</h3>
                    <p class="mt-1 text-gray-600 dark:text-gray-300">{{ auth()->user()->role }}</p>
                </div>

                <div class="space-y-4">
                    <div class="flex items-start">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mt-0.5 text-primary shrink-0">
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
                        <div class="ml-3">
                            <p class="font-medium text-gray-700 dark:text-gray-300">Peran</p>
                            <p class="text-gray-600 dark:text-gray-400">{{ auth()->user()->role }}</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mt-0.5 text-primary shrink-0">
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
                        <div class="ml-3">
                            <p class="font-medium text-gray-700 dark:text-gray-300">Telepon</p>
                            <p class="text-gray-600 dark:text-gray-400">{{ auth()->user()->phone ?: '-' }}</p>
                        </div>

                    </div>

                    <div class="flex items-start">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mt-0.5 text-primary shrink-0">
                            <path opacity="0.5"
                                d="M4 10.1433C4 5.64588 7.58172 2 12 2C16.4183 2 20 5.64588 20 10.1433C20 14.6055 17.4467 19.8124 13.4629 21.6744C12.5343 22.1085 11.4657 22.1085 10.5371 21.6744C6.55332 19.8124 4 14.6055 4 10.1433Z"
                                stroke="currentColor" stroke-width="1.5" />
                            <circle cx="12" cy="10" r="3" stroke="currentColor" stroke-width="1.5" />
                        </svg>
                        <div class="ml-3">
                            <p class="font-medium text-gray-700 dark:text-gray-300">Lokasi</p>
                            <p class="text-gray-600 dark:text-gray-400">{{ auth()->user()->ward->name ?? '-' }},
                                {{ auth()->user()->ward->subdistrict->name ?? '' }}</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mt-0.5 text-primary shrink-0">
                            <path opacity="0.5"
                                d="M2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12C22 15.7712 22 17.6569 20.8284 18.8284C19.6569 20 17.7712 20 14 20H10C6.22876 20 4.34315 20 3.17157 18.8284C2 17.6569 2 15.7712 2 12Z"
                                stroke="currentColor" stroke-width="1.5" />
                            <path
                                d="M6 8L8.1589 9.79908C9.99553 11.3296 10.9139 12.0949 12 12.0949C13.0861 12.0949 14.0045 11.3296 15.8411 9.79908L18 8"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                        <div class="ml-3">
                            <p class="font-medium text-gray-700 dark:text-gray-300">Email</p>
                            <a href="mailto:{{ auth()->user()->email }}"
                                class="text-primary hover:underline">{{ auth()->user()->email }}</a>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mt-0.5 text-primary shrink-0">
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
                        <div class="ml-3">
                            <p class="font-medium text-gray-700 dark:text-gray-300">Bergabung</p>
                            <p class="text-gray-600 dark:text-gray-400">
                                {{ auth()->user()->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>

                <div class="pt-5 mt-8 border-t border-gray-200 dark:border-gray-700">
                    <h6 class="mb-3 font-semibold">Sosial Media</h6>
                    <div class="flex space-x-2">
                        <a href="#" class="p-2 rounded-full btn btn-outline-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                <path
                                    d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                </path>
                            </svg>
                        </a>
                        <a href="#" class="p-2 rounded-full btn btn-outline-danger">
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
                        <a href="#" class="p-2 rounded-full btn btn-outline-dark">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                <path
                                    d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Panel Kanan: Form Edit Profil -->
            <div class="panel lg:col-span-2 xl:col-span-3">
                <div class="mb-5">
                    <h5 class="text-lg font-semibold dark:text-white-light">Edit Profil</h5>
                    <p class="text-sm text-gray-500">Perbarui informasi profil Anda</p>
                </div>

                <form method="POST" action="{{ route('seller.profile.update') }}" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <!-- Foto Profil -->
                        <div class="md:col-span-2">
                            <div class="flex items-center space-x-6">
                                <div class="shrink-0">
                                    @if ($user->profile_pic)
                                        <img id="profile-preview" src="{{ asset('storage/' . $user->profile_pic) }}"
                                            alt="Foto Profil"
                                            class="object-cover w-20 h-20 border-2 border-white rounded-full shadow">
                                    @else
                                        <div id="profile-preview"
                                            class="flex items-center justify-center w-20 h-20 text-xs font-semibold text-center text-gray-600 bg-gray-200 border-2 border-white rounded-full shadow">
                                            Belum ada foto
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <label class="block mb-2 font-medium">Foto Profil</label>
                                    <input type="file" id="profile_pic" name="profile_pic" accept="image/*"
                                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20">
                                    @error('profile_pic')
                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Nama Lengkap -->
                        <div>
                            <label for="name" class="block mb-2 font-medium">Nama Lengkap</label>
                            <input id="name" name="name" type="text"
                                value="{{ old('name', auth()->user()->name) }}"
                                class="form-input w-full @error('name') border-danger @enderror">
                            @error('name')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block mb-2 font-medium">Email</label>
                            <input id="email" name="email" type="email"
                                value="{{ old('email', auth()->user()->email) }}"
                                class="form-input w-full @error('email') border-danger @enderror">
                            @error('email')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Telepon -->
                        <div>
                            <label for="phone" class="block mb-2 font-medium">Telepon</label>
                            <input id="phone" name="phone" type="text"
                                value="{{ old('phone', auth()->user()->phone) }}"
                                class="form-input w-full @error('phone') border-danger @enderror">
                            @error('phone')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                     <div>
                        <label for="ward_id" class="block mb-2 font-medium">Kelurahan</label>
                        <select id="ward_id" name="ward_id"
                            class="form-select w-full @error('ward_id') border-danger @enderror">
                            <option value="">-- Pilih Kelurahan --</option>
                            @foreach ($wards as $ward)
                                <option value="{{ $ward->id }}"
                                    {{ old('ward_id', auth()->user()->ward_id) == $ward->id ? 'selected' : '' }}>
                                    {{ $ward->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('ward_id')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>


                        <!-- Password -->
                        <div>
                            <label for="password" class="block mb-2 font-medium">Password Baru</label>
                            <input id="password" name="password" type="password"
                                placeholder="Kosongkan jika tidak ingin diubah"
                                class="form-input w-full @error('password') border-danger @enderror">
                            @error('password')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Alamat -->
                        <div class="md:col-span-2">
                            <label for="address" class="block mb-2 font-medium">Alamat</label>
                            <textarea id="address" name="address" rows="2"
                                class="form-textarea w-full @error('address') border-danger @enderror">{{ old('address', auth()->user()->address) }}</textarea>
                            @error('address')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Lokasi -->
                        <div class="md:col-span-2">
                            <label class="block mb-2 font-medium">Lokasi (Latitude/Longitude)</label>
                            <div class="flex">
                                <input id="location-display" type="text"
                                    value="{{ auth()->user()->location_lat && auth()->user()->location_long ? auth()->user()->location_lat . ', ' . auth()->user()->location_long : 'Lokasi belum diatur' }}"
                                    class="flex-1 form-input" readonly>
                                <button type="button" id="get-location-btn"
                                    class="flex items-center ml-2 btn btn-primary">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span id="location-btn-text">Dapatkan Lokasi</span>
                                </button>
                            </div>
                            <div id="location-status" class="hidden mt-2 text-sm"></div>
                            <input type="hidden" id="location_lat" name="location_lat"
                                value="{{ old('location_lat', auth()->user()->location_lat ?? '') }}">
                            <input type="hidden" id="location_long" name="location_long"
                                value="{{ old('location_long', auth()->user()->location_long ?? '') }}">
                            @error('location_lat')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                            @error('location_long')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-end pt-4 mt-6 border-t border-gray-200 dark:border-gray-700">
                        <button type="submit" class="px-6 py-2 btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
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
                                                    {{ $wallet->amount }}
                                                </span>
                                            </div>
                                            <div class="text-right">
                                                <span class="text-sm text-gray-500 dark:text-gray-400">Last
                                                    Updated</span>
                                                <p class="text-sm text-gray-600 dark:text-gray-300">
                                                    {{ $wallet->updated_at }}</p>
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
                                                        <span class="font-medium">Bank:</span>
                                                        {{ $wallet->bank_name }}
                                                    </p>
                                                    <p class="text-sm text-gray-600 dark:text-gray-300">
                                                        <span class="font-medium">Account:</span>
                                                        {{ $wallet->account_number }}
                                                    </p>
                                                </div>
                                            </div>
                                            {{-- <button class="px-4 py-2 text-white transition-colors bg-gray-800 rounded btn hover:bg-gray-700">Edit</button> --}}
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

                                        <div class="mb-5">
                                            <label for="account_name"
                                                class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Nama
                                                Pemilik</label>
                                            <input id="account_name" name="account_name" type="text"
                                                value="{{ old('account_name', $wallet->account_name) }}"
                                                placeholder="Enter Account Number" required
                                                class="form-input w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white @error('account_number') border-danger @enderror" />
                                            @error('account_name')
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
                                    <form action="{{ route('seller.wallet.withdraw') }}" method="POST">
                                        @csrf
                                        <div class="mb-5">
                                            <label for="amount"
                                                class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Withdrawal
                                                Amount</label>
                                            <div class="relative">
                                                <span
                                                    class="absolute text-gray-500 transform -translate-y-1/2 left-3 top-1/2 dark:text-gray-400">Rp</span>
                                                <input id="amount" name="amount" type="number" placeholder="0"
                                                    min="10000" max="2500000" value="{{ old('amount') }}"
                                                    class="form-input w-full pl-10 pr-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary dark:bg-gray-700 dark:text-white @error('amount') border-red-500 @enderror" />
                                            </div>
                                            @error('amount')
                                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                            @enderror
                                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Available balance:
                                                Rp {{ number_format($wallet->amount ?? 0, 0, ',', '.') }}</p>
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
                                            class="w-full px-6 py-2 text-white transition-colors rounded-lg btn bg-primary hover:bg-blue-700">
                                            Request Withdrawal
                                        </button>
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
        // document.getElementById('profile_pic').addEventListener('change', function(e) {
        //     const file = e.target.files[0];
        //     if (!file) return;

        //     const reader = new FileReader();
        //     reader.onload = function(e) {
        //         const preview = document.getElementById('profile-preview');
        //         const placeholder = document.getElementById('profile-placeholder');

        //         // Ganti src gambar
        //         preview.src = e.target.result;
        //         preview.classList.remove('hidden');

        //         // Hapus placeholder "Belum ada foto" jika masih ada
        //         if (placeholder) {
        //             placeholder.remove();
        //         }
        //     };

        //     reader.readAsDataURL(file);
        // });

        setTimeout(() => {
            const input = document.getElementById('profile_pic');
            if (!input) return; // fail-safe
            const preview = document.getElementById('profile-preview');
            const placeholder = document.getElementById('profile-placeholder');

            input.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (!file) return;
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    if (placeholder) placeholder.remove();
                };
                reader.readAsDataURL(file);
            });
        }, 500); // cukup de
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
