<?php

use Livewire\Component;

new class extends Component
{
    public $count = 0; 

    public function increment()
    {
        $this->count++; 
    }

   
};
?>


    <div style="text-align: center;">
    <h1>{{ $count }}</h1>
    <button wire:click="increment">+</button>
</div>{{-- You must be the change you wish to see in the world. - Mahatma Gandhi --}}
