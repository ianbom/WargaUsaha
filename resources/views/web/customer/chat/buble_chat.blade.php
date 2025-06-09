<!-- Room Chat (Right Side) -->
<div class="panel p-0 flex-1 overflow-hidden">
    @if(isset($selectedUser))
        <!-- Chat Header -->
        <div class="flex items-center justify-between p-4 border-b border-[#e0e6ed] dark:border-[#1b2e4b]">
            <div class="flex items-center">
                <div class="flex-shrink-0 relative">
                    <img src="{{ $selectedUser->avatar ? '/storage/' . $selectedUser->avatar : '/assets/images/profile-34.jpeg' }}"
                         class="rounded-full h-10 w-10 object-cover" />

                    {{-- Online status indicator --}}
                    @if(isset($selectedUser->is_online) && $selectedUser->is_online)
                        <div class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 rounded-full border-2 border-white dark:border-gray-800"></div>
                    @endif
                </div>
                <div class="ml-3">
                    <h4 class="font-semibold text-lg">{{ $selectedUser->name }}</h4>
                    <p class="text-xs text-gray-500 dark:text-gray-400">
                        @if(isset($selectedUser->is_online) && $selectedUser->is_online)
                            Online
                        @else
                            Last seen {{ $selectedUser->updated_at->diffForHumans() }}
                        @endif
                    </p>
                </div>
            </div>

            <!-- Chat Actions -->
            <div class="flex items-center space-x-2">
                <button type="button" class="btn btn-circle btn-outline-primary">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.1007 13.359L16.5562 12.9062C17.1858 12.2801 18.1672 12.1515 18.9728 12.5898L20.8833 13.628C22.1102 14.2949 22.3806 15.9295 21.4217 16.883L20.0011 18.2954C19.6399 18.6546 19.1917 18.9171 18.6763 18.9651M4.00289 5.74561C3.96765 5.12559 4.25823 4.56668 4.69185 4.13552L6.26145 2.57483C7.13596 1.70529 8.61028 1.83992 9.37326 2.85908L10.6342 4.54348C11.2507 5.36691 11.1841 6.49484 10.4775 7.19738L10.1907 7.48257"
                              stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        <path d="M18.6763 18.9651C17.0469 19.117 13.0622 18.9492 8.8154 14.7266C4.81076 10.7447 4.09308 7.33182 4.00289 5.74561"
                              stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </button>
                <button type="button" class="btn btn-circle btn-outline-primary">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 12V7C5 5.11438 5 4.17157 5.58579 3.58579C6.17157 3 7.11438 3 9 3H15C16.8856 3 17.8284 3 18.4142 3.58579C19 4.17157 19 5.11438 19 7V12C19 13.8856 19 14.8284 18.4142 15.4142C17.8284 16 16.8856 16 15 16H9C7.11438 16 6.17157 16 5.58579 15.4142C5 14.8284 5 13.8856 5 12Z"
                              stroke="currentColor" stroke-width="1.5"/>
                        <path d="M8 21L16 21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        <path d="M12 16V21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Chat Messages -->
        <div class="chat-conversation-box perfect-scrollbar relative h-full sm:h-[calc(100vh_-_300px)] p-4 pb-[68px]">
            <div class="space-y-4">
                @forelse($messages ?? [] as $message)
                    @if($message->from_user_id == auth()->id())
                        <!-- Sent Message (Right) -->
                        <div class="flex justify-end">
                            <div class="max-w-xs lg:max-w-md">
                                <div class="bg-primary text-white rounded-2xl rounded-br-md px-4 py-2 relative">
                                    <p class="text-sm">{{ $message->message }}</p>

                                    <!-- Message Status -->
                                    <div class="flex items-center justify-end mt-1 space-x-1">
                                        <span class="text-xs opacity-75">{{ $message->created_at->format('H:i') }}</span>
                                        @if($message->is_read)
                                            <svg class="w-4 h-4 text-blue-300" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                            </svg>
                                            <svg class="w-4 h-4 text-blue-300 -ml-2" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                            </svg>
                                        @else
                                            <svg class="w-4 h-4 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                            </svg>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <!-- Received Message (Left) -->
                        <div class="flex justify-start">
                            <div class="flex items-start space-x-2">
                                <img src="{{ $selectedUser->avatar ? '/storage/' . $selectedUser->avatar : '/assets/images/profile-34.jpeg' }}"
                                     class="rounded-full h-8 w-8 object-cover flex-shrink-0" />
                                <div class="max-w-xs lg:max-w-md">
                                    <div class="bg-gray-100 dark:bg-gray-700 rounded-2xl rounded-bl-md px-4 py-2">
                                        <p class="text-sm text-gray-800 dark:text-gray-200">{{ $message->message }}</p>
                                        <span class="text-xs text-gray-500 dark:text-gray-400 mt-1 block">
                                            {{ $message->created_at->format('H:i') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @empty
                    <!-- No Messages -->
                    <div class="flex flex-col items-center justify-center h-full text-center">
                        <div class="w-24 h-24 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-600 dark:text-gray-300 mb-2">No messages yet</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Start a conversation with {{ $selectedUser->name }}</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Message Input -->
        <div class="absolute bottom-0 left-0 w-full bg-white dark:bg-gray-800 border-t border-[#e0e6ed] dark:border-[#1b2e4b] p-4">
            <form action="/" method="POST" class="flex items-center space-x-3">
                @csrf
                <div class="flex-1 relative">
                    <input type="text"
                           name="message"
                           placeholder="Type a message..."
                           class="form-input pr-12 py-3 rounded-full border-gray-300 dark:border-gray-600 focus:border-primary focus:ring-primary"
                           required
                           autocomplete="off" />

                    <!-- Emoji & Attachment Buttons -->
                    <div class="absolute right-3 top-1/2 -translate-y-1/2 flex space-x-1">
                        <button type="button" class="text-gray-400 hover:text-primary transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 100-2 1 1 0 000 2zm7-1a1 1 0 11-2 0 1 1 0 012 0zm-.464 5.535a1 1 0 10-1.415-1.414 3 3 0 01-4.242 0 1 1 0 00-1.415 1.414 5 5 0 007.072 0z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                        <button type="button" class="text-gray-400 hover:text-primary transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-circle">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                    </svg>
                </button>
            </form>
        </div>
    @else
        <!-- No User Selected -->
        <div class="flex flex-col items-center justify-center h-full text-center p-8">
            <div class="w-32 h-32 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mb-6">
                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-gray-600 dark:text-gray-300 mb-3">Select a conversation</h2>
            <p class="text-gray-500 dark:text-gray-400 max-w-md">
                Choose from your existing conversations on the left, or start a new one with someone from your contact list.
            </p>
        </div>
    @endif
</div>
