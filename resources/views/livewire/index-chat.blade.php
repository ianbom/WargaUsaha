
    <div x-data="chat">
        <div class="flex gap-5 relative sm:h-[calc(100vh_-_150px)] h-full sm:min-h-0"
            :class="{ 'min-h-[999px]': isShowChatMenu }">
            <div class="panel p-4 flex-none overflow-hidden max-w-xs w-full absolute xl:relative z-10 space-y-4 xl:h-full hidden xl:block"
                :class="isShowChatMenu && '!block'">
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <div class="flex-none">
                            {{-- <img src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : '/assets/images/profile-34.jpeg' }}"
                                class="rounded-full h-12 w-12 object-cover" /> --}}
                        </div>
                        <div class="mx-3">
                            {{-- <p class="mb-1 font-semibold">{{ $user->name }}</p> --}}
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <input type="text" class="form-input peer ltr:pr-9 rtl:pl-9" placeholder="Searching..."
                        x-model="searchQuery" @input="filterUsers" />
                    <div class="absolute ltr:right-2 rtl:left-2 top-1/2 -translate-y-1/2 peer-focus:text-primary">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="11.5" cy="11.5" r="9.5" stroke="currentColor"
                                stroke-width="1.5" opacity="0.5"></circle>
                            <path d="M18.5 18.5L22 22" stroke="currentColor" stroke-width="1.5"
                                stroke-linecap="round"></path>
                        </svg>
                    </div>
                </div>

                <div class="h-px w-full border-b border-[#e0e6ed] dark:border-[#1b2e4b]"></div>

                {{-- User List Pojok Kiri --}}
                <div class="!mt-0">
                    <div class="chat-users perfect-scrollbar relative h-full min-h-[100px] sm:h-[calc(100vh_-_357px)] space-y-0.5 pr-3.5 -mr-3.5">
                        <template x-for="person in filteredUsers" :key="person.id">
                            <button type="button"
                                class="w-full flex justify-between items-center p-2 hover:bg-gray-100 dark:hover:bg-[#050b14] rounded-md dark:hover:text-primary hover:text-primary"
                                :class="{
                                    'bg-gray-100 dark:bg-[#050b14] dark:text-primary text-primary': selectedUser && selectedUser.id === person.id
                                }"
                                @click="selectUser(person)">
                                <div class="flex-1">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 relative">
                                            <img :src="person.profile_photo ? `/storage/${person.profile_photo}` : '/assets/images/profile-34.jpeg'"
                                                class="rounded-full h-12 w-12 object-cover" />
                                            <template x-if="person.is_online">
                                                <div class="absolute bottom-0 ltr:right-0 rtl:left-0">
                                                    <div class="w-4 h-4 bg-success rounded-full"></div>
                                                </div>
                                            </template>
                                        </div>
                                        <div class="mx-3 ltr:text-left rtl:text-right">
                                            <p class="mb-1 font-semibold" x-text="person.name"></p>
                                            <p class="text-xs text-white-dark truncate max-w-[185px]"
                                                x-text="person.email"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="font-semibold whitespace-nowrap text-xs">
                                    <p x-text="person.last_seen || 'Online'"></p>
                                </div>
                            </button>
                        </template>

                        <!-- Jika tidak ada user yang ditemukan -->
                        <div x-show="filteredUsers.length === 0" class="text-center py-4">
                            <p class="text-white-dark text-sm">No users found</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-black/60 z-[5] w-full h-full absolute rounded-md hidden"
                :class="isShowChatMenu && '!block xl:!hidden'" @click="isShowChatMenu = !isShowChatMenu"></div>
                <h1>Ini CHat</h1>

        </div>
    </div>

  

