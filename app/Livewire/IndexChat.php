<?php

namespace App\Livewire;

use Livewire\Component;

class IndexChat extends Component
{
    public function render()
    {
        return view('livewire.index-chat')->layout('components.customer.app');
    }


}
