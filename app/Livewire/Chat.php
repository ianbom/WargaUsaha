<?php

namespace App\Livewire;

use App\Models\Message;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Chat extends Component
{
    public User $user;
    public $message = '';

    public function render()
    {
        return view('livewire.chat', [
            'messages' => Message::where(function(Builder $query){
                $query->where('from_user_id', Auth::id())
                ->where('to_user_id', $this->user->id);
            })->orWhere(function(Builder $query){
               $query->where('from_user_id', $this->user->id)
               ->where('to_user_id', Auth::id());
            })->get()
        ]);



    }

   public function sendMessage(){
    // Validasi pesan tidak kosong
    if(trim($this->message) == '') {
        return;
    }

    Message::create([
        'from_user_id' => Auth::id(),
        'to_user_id' => $this->user->id,
        'message' => $this->message
    ]);

    // Reset input message setelah berhasil kirim
    $this->message = '';
}
}
