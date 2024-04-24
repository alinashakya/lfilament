<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Todos')]
class Todos extends Component
{
    public $todo = "";

    public $todos = [];

    public function mount()
    {
        $this->todos = [
            'Take out trash',
            'Do dishes'
        ];
    }

    /**
     * Whenever change take place in model, it goes here
     *
     * @param $property
     * @param $value
     * @return void
     */
//    public function updated($property, $value)
//    {
//        $this->$property = strtoupper($value);
//    }

    /**
     * For prticular ones
     *
     * @param $value
     * @return void
     */
    public function updatedToDo($value)
    {
        $this->todo = strtoupper($value);
    }

    public function add()
    {
        $this->todos[] = $this->todo;

        $this->reset('todo');
    }

    public function render()
    {
        return view('livewire.todos');
    }
}
