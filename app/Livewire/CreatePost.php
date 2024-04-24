<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CreatePost extends Component
{
    #[Rule('required', message: 'Yo add a message')]
    #[Rule('min:4', 'Too short')]
    public $title = '';

    #[Rule('required', 'Comic Content')]
    public $content = '';

    public function save()
    {
        $this->validate();

        Post::create([
            'title' => $this->title,
            'content' => $this->content
        ]);
        $this->redirect('/posts', navigate: true);

        //Can do this for refresh table of parent after creating from modal form
        //$this->dispatch('added');
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
