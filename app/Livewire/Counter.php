<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Counter')]
class Counter extends Component
{
    public $count = 1;

    public function increment($by)
    {
        $this->count = $this->count + $by;
    }

    public function decrement($by)
    {
        $this->count = $this->count - $by;
    }
    public function render()
    {
        return view('livewire.counter');
    }
}
