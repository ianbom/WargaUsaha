<x-customer.app>
    <div class="flex gap-5 relative sm:h-[calc(100vh_-_150px)] h-full sm:min-h-0">
        <div class="panel p-4 flex-none overflow-hidden max-w-xs w-full xl:relative space-y-4 xl:h-full block">
            <!-- Current User Info -->
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <div class="flex-none">
                        <img src="{{ $user->avatar ? '/storage/' . $user->avatar : '/assets/images/profile-34.jpeg' }}"
                             class="rounded-full h-12 w-12 object-cover" />
                    </div>
                    <div class="mx-3">
                        <p class="mb-1 font-semibold">{{ $user->name }}</p>
                        <p class="text-xs text-white-dark">{{ $user->role ?? 'User' }}</p>
                    </div>
                </div>
            </div>

            <div class="relative">
                  <input type="text" class="form-input peer ltr:pr-9 rtl:pl-9" placeholder="Searching..."
                      x-model="searchUser" @keyup="searchUsers" />
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
            <!-- Divider -->
            <div class="h-px w-full border-b border-[#e0e6ed] dark:border-[#1b2e4b]"></div>

            <!-- All Users List -->
            <div class="!mt-0">
                <div class="chat-users perfect-scrollbar relative h-full min-h-[100px] sm:h-[calc(100vh_-_357px)] space-y-0.5 pr-3.5 -mr-3.5">
                    @forelse($allUser as $person)
                        @if($person->id !== $user->id) {{-- Don't show current user in the list --}}
                            <a href="{{ route('customer.chat.detail', $person->id) }}"
                               class="w-full flex justify-between items-center p-2 hover:bg-gray-100 dark:hover:bg-[#050b14] rounded-md dark:hover:text-primary hover:text-primary block">
                                <div class="flex-1">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 relative">
                                            <img src="{{ $person->avatar ? '/storage/' . $person->avatar : '/assets/images/profile-34.jpeg' }}"
                                                 class="rounded-full h-12 w-12 object-cover" />

                                            {{-- Optional: Show online status if you have this field --}}
                                            @if(isset($person->is_online) && $person->is_online)
                                                <div class="absolute bottom-0 ltr:right-0 rtl:left-0">
                                                    <div class="w-4 h-4 bg-success rounded-full"></div>
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
                                <div class="font-semibold whitespace-nowrap text-xs">
                                    <p>{{ $person->created_at->format('H:i') }}</p>
                                </div>
                            </a>
                        @endif
                    @empty
                        <div class="text-center text-gray-500 py-4">
                            <p>No users found</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Chat Content Area (Right Side) -->
        <div class="flex-1 panel p-0 min-h-[400px]">
            <div class="flex items-center justify-center h-full">
                <div class="text-center">
                    <div class="text-6xl text-gray-300 mb-4">💬</div>
                    <h3 class="text-lg font-semibold text-gray-600 dark:text-gray-400 mb-2">
                        Select a conversation
                    </h3>
                    <p class="text-sm text-gray-500">
                        Choose a user from the sidebar to start chatting
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-customer.app>
