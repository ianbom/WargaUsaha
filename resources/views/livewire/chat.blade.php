<div class="panel p-0 flex-1 flex flex-col h-full">
    <!-- Chat Header -->
    <div class="bg-white border-b border-gray-200 px-6 py-4 flex items-center">
        <div class="flex items-center">
            <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center text-white font-semibold">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>
            <div class="ml-3">
                <h3 class="text-lg font-semibold text-gray-900">{{ $user->name }}</h3>
                <p class="text-sm text-gray-500">Online</p>
            </div>
        </div>
    </div>

    <!-- Chat Messages Area -->
    <div class="flex-1 overflow-y-auto p-6 space-y-4 bg-gray-50">
      <div wire:poll>
         @foreach($messages as $msg)
            @if($msg->from_user_id == Auth::id())
                <!-- Pesan dari user yang sedang login (kanan) -->
                <div class="flex justify-end">
                    <div class="max-w-xs lg:max-w-md">
                        <div class="bg-blue-500 text-white px-4 py-2 rounded-lg rounded-br-none shadow">
                            <p class="text-sm">{{ $msg->message }}</p>
                        </div>
                        <div class="text-xs text-gray-500 mt-1 text-right">
                            {{ $msg->created_at->format('H:i') }}
                        </div>
                    </div>
                </div>
            @else
                <!-- Pesan dari user lain (kiri) -->
                <div class="flex justify-start">
                    <div class="max-w-xs lg:max-w-md">
                        <div class="bg-white px-4 py-2 rounded-lg rounded-bl-none shadow border">
                            <p class="text-sm text-gray-800">{{ $msg->message }}</p>
                        </div>
                        <div class="text-xs text-gray-500 mt-1">
                            {{ $msg->created_at->format('H:i') }}
                        </div>
                    </div>
                </div>
            @endif
        @endforeach

        @if($messages->isEmpty())
            <div class="text-center text-gray-500 py-8">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-3.582 8-8 8a8.013 8.013 0 01-7.93-6.88c-.02-.12-.03-.24-.03-.36C5.037 10.022 8.016 8 12 8s6.963 2.022 6.93 4.76c0 .12-.01.24-.03.36z" />
                </svg>
                <p class="mt-2">Belum ada pesan. Mulai percakapan!</p>
            </div>
        @endif
        </div>

    </div>

    <!-- Chat Input Area -->
    <div class="bg-white border-t border-gray-200 px-6 py-4">
        <form wire:submit.prevent="sendMessage" class="flex items-center space-x-3">
            <!-- Input Message -->
            <div class="flex-1">
                <input
                    type="text"
                    wire:model="message"
                    placeholder="Ketik pesan..."
                    class="w-full px-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    required
                />
            </div>

            <!-- Send Button -->
            <button
                type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-full transition duration-200 flex items-center space-x-2"

            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
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
