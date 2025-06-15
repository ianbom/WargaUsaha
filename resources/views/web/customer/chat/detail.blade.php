<x-customer.app>
    <div class="flex gap-5 relative sm:h-[calc(100vh_-_150px)] h-full sm:min-h-0">
        <div class="flex-none block w-full max-w-xs p-4 space-y-4 overflow-hidden panel xl:relative xl:h-full">
            <!-- Current User Info -->
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="flex-none">
                        @if ($me->profile_pic)
                            <img class="object-cover w-10 h-10 border border-gray-400 rounded-full"
                                src="{{ asset('storage/' . $me->profile_pic) }}" alt="User Avatar" />
                        @else
                            <div
                                class="flex items-center justify-center w-10 h-10 font-semibold text-white bg-blue-500 rounded-full">
                                {{ strtoupper(substr($me->name, 0, 1)) }}
                            </div>
                        @endif
                    </div>
                    <div class="mx-3">
                        <p class="mb-1 font-semibold">{{ $me->name }}</p>
                        <p class="text-xs text-white-dark">{{ $me->role ?? 'User' }}</p>
                    </div>
                </div>
            </div>

            <div x-data="chatFilter()" class="relative">
                <input type="text" class="form-input peer ltr:pr-9 rtl:pl-9" placeholder="Cari pengguna..."
                    x-model="searchUser" @keyup="searchUsers" />
                <div class="absolute -translate-y-1/2 ltr:right-2 rtl:left-2 top-1/2 peer-focus:text-primary">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <circle cx="11.5" cy="11.5" r="9.5" stroke="currentColor" stroke-width="1.5"
                            opacity="0.5"></circle>
                        <path d="M18.5 18.5L22 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                        </path>
                    </svg>
                </div>
            </div>
            <!-- Divider -->
            <div class="h-px w-full border-b border-[#e0e6ed] dark:border-[#1b2e4b]"></div>

            <!-- All Users List -->
            <div class="!mt-0">
                <div
                    class="chat-users perfect-scrollbar relative h-full min-h-[100px] sm:h-[calc(100vh_-_357px)] space-y-0.5 pr-3.5 -mr-3.5">
                    @forelse($allUser as $person)
                        @if ($person->id !== $me->id)
                            {{-- Don't show current user in the list --}}
                            <a href="{{ route('customer.chat.detail', $person->id) }}"
                                class="w-full flex justify-between items-center p-2 hover:bg-gray-100 dark:hover:bg-[#050b14] rounded-md dark:hover:text-primary hover:text-primary block">
                                <div class="flex-1">
                                    <div class="flex items-center">
                                        <div class="relative flex-shrink-0">
                                            @if ($person->profile_pic)
                                                <img class="object-cover w-12 h-12 border border-gray-400 rounded-full"
                                                    src="{{ asset('storage/' . $person->profile_pic) }}"
                                                    alt="User Avatar" />
                                            @else
                                                <div
                                                    class="flex items-center justify-center w-12 h-12 font-semibold text-white bg-blue-500 rounded-full">
                                                    {{ strtoupper(substr($person->name, 0, 1)) }}
                                                </div>
                                            @endif
                                            {{-- <img src="{{ $person->avatar ? '/storage/' . $person->avatar : '/assets/images/profile-34.jpeg' }}"
                                                class="object-cover w-12 h-12 rounded-full" /> --}}
                                            {{-- Optional: Show online status if you have this field --}}
                                            @if (isset($person->is_online) && $person->is_online)
                                                <div class="absolute bottom-0 ltr:right-0 rtl:left-0">
                                                    <div class="w-4 h-4 rounded-full bg-success"></div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="mx-3 ltr:text-left rtl:text-right">
                                            <p class="mb-1 font-semibold">{{ $person->name }}</p>
                                            <p class="text-xs text-white-dark truncate max-w-[185px]">
                                                {{ $person->email }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-xs font-semibold whitespace-nowrap">
                                    {{-- <p>{{ $person->created_at->format('H:i') }}</p> --}}
                                </div>
                            </a>
                        @endif
                    @empty
                        <div class="py-4 text-center text-gray-500">
                            <p>No users found</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        <!-- Room Chat (Right Side) -->
        <livewire:chat :user="$selectedUser" />
    </div>
    <script>
        function chatFilter() {
            return {
                searchUser: '',
                searchUsers() {
                    const keyword = this.searchUser.toLowerCase();
                    document.querySelectorAll('.chat-users a').forEach(el => {
                        const name = el.querySelector('p.font-semibold')?.innerText.toLowerCase() ?? '';
                        const email = el.querySelector('p.text-xs')?.innerText.toLowerCase() ?? '';
                        if (name.includes(keyword) || email.includes(keyword)) {
                            el.style.display = '';
                        } else {
                            el.style.display = 'none';
                        }
                    });
                }
            }
        }
    </script>
</x-customer.app>
