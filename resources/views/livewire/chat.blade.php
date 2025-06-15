@php
    \Carbon\Carbon::setLocale('id');
    setlocale(LC_TIME, 'id_ID.utf8');
@endphp
<div class="flex flex-col flex-1 h-full p-0 panel">
    <!-- Chat Header -->
    <div class="flex items-center px-6 py-4 bg-white border-b border-gray-200">
        <div class="flex items-center">
            @if ($user->profile_pic)
                <img class="object-cover w-10 h-10 border border-gray-400 rounded-full"
                    src="{{ asset('storage/' . $user->profile_pic) }}" alt="User Avatar" />
            @else
                <div
                    class="flex items-center justify-center w-10 h-10 font-semibold text-white bg-blue-500 rounded-full">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
            @endif
            <div class="ml-3">
                <h3 class="text-lg font-semibold text-gray-900">{{ $user->name }}</h3>
            </div>
        </div>
    </div>

    <!-- Chat Messages Area -->
    <div class="flex-1 p-6 space-y-4 overflow-y-auto bg-gray-50">
        <div wire:poll>
            @foreach ($messages as $msg)
                @if ($msg->from_user_id == Auth::id())
                    <!-- Pesan dari user yang sedang login (kanan) -->
                    <div class="flex justify-end">
                        <div class="max-w-xs lg:max-w-md">
                            <div class="px-4 py-2 text-white bg-blue-500 rounded-lg rounded-br-none shadow">
                                <p class="text-sm">{{ $msg->message }}</p>
                            </div>
                            <div class="mt-1 text-xs text-right text-gray-500">
                                {{ $msg->created_at->translatedFormat('d F Y, H:i') }}
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Pesan dari user lain (kiri) -->
                    <div class="flex justify-start">
                        <div class="max-w-xs lg:max-w-md">
                            <div class="px-4 py-2 bg-white border rounded-lg rounded-bl-none shadow">
                                <p class="text-sm text-gray-800">{{ $msg->message }}</p>
                            </div>
                            <div class="mt-1 text-xs text-gray-500">
                                {{ $msg->created_at->translatedFormat('d F Y, H:i') }}
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            @if ($messages->isEmpty())
                <div class="py-8 text-center text-gray-500">
                    <svg class="w-12 h-12 mx-auto text-gray-400" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
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
                    <p class="mt-2">Belum ada pesan. Mulai percakapan!</p>
                </div>
            @endif
        </div>

    </div>

    <!-- Chat Input Area -->
    <div class="px-6 py-4 bg-white border-t border-gray-200">
        <form wire:submit.prevent="sendMessage" class="flex items-center space-x-3">
            <!-- Input Message -->
            <div class="flex-1">
                <input type="text" wire:model="message" placeholder="Ketik pesan..."
                    class="w-full px-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    required />
            </div>

            <!-- Send Button -->
            <button type="submit"
                class="flex items-center px-6 py-2 space-x-2 text-white transition duration-200 bg-blue-500 rounded-full hover:bg-blue-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                </svg>
                <span>Kirim</span>
            </button>
        </form>
    </div>
</div>

<script>
    // Auto scroll ke bawah ketika ada pesan baru
    document.addEventListener('livewire:updated', () => {
        const chatArea = document.querySelector('.overflow-y-auto');
        if (chatArea) {
            chatArea.scrollTop = chatArea.scrollHeight;
        }
    });

    // Clear input setelah send message berhasil
    document.addEventListener('livewire:updated', () => {
        // Input akan otomatis ter-reset dari component
    });
</script>
