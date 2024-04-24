<?php

namespace App\Livewire\Order\Index;

use App\Models\Order;
use App\Models\Store;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Renderless;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Lazy]
class Table extends Component
{
    use WithPagination, Sortable, Searchable;

    public Store $store;

    //public $search = '';

    public $selectedOrderIds = [];
    public $orderIdsOnPage = [];

    #[Renderless]
    public function export()
    {
        sleep(1);
        return $this->store->orders()->toCsv();
    }

    public function refund(Order $order)
    {
        $order->refund();
    }

    public function refundMultiple()
    {
        $orders = $this->store->orders()->whereIn('id', $this->selectedOrderIds)->get();

        foreach ($orders as $order) {
            $this->refund($order);
        }
    }

    public function archive(Order $order)
    {
        $order->archive();
    }

    public function archiveMultiple()
    {
        $orders = $this->store->orders()->whereIn('id', $this->selectedOrderIds)->get();

        foreach ($orders as $order) {
            $this->archive($order);
        }
    }

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
        sleep(1);
        $query = $this->store->orders();

        $query = $this->applySearch($query);

        $query = $this->applySorting($query);

        $orders = $query->paginate(5);

        $this->orderIdsOnPage = $orders->map(fn ($order) => (string) $order->id)->toArray();

        //dd($this->orderIdsOnPage);
        return view('livewire.order.index.table', [
            'orders' => $orders,
        ]);
    }

    public function placeholder()
    {
        //Lazy loading...
        return view('livewire.order.index.table-placeholder');
//        return <<<'HTML'
//            <div>Loading.....</div>
//        HTML;
    }
}
