<?php

namespace App\Livewire\Order\Index;

use App\Models\Order;
use App\Models\Store;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Renderless;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Page extends Component
{
    public Store $store;

    //public Filters $filters;

    //public $search = '';

//    public function updatedSearch()
//    {
//        $this->resetPage();
//    }

//    protected function applySearch($query)
//    {
//        return $this->search === ''
//            ? $query
//            : $query->where('email', 'like', '%'.$this->search.'%')
//            ->orWhere('number', 'like', '%'.$this->search.'%');
//    }

    public function render()
    {
        return view('livewire.order.index.page');
    }
}
