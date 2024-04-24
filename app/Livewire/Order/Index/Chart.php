<?php

namespace App\Livewire\Order\Index;

use App\Models\Store;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Chart extends Component
{
    public Store $store;

    public $dataset = [];

    public function mount()
    {
        $this->fillDataset();
    }

    public function fillDataset()
    {
        $results = $this->store->orders()
                ->select(
                    DB::raw('DATE(ordered_at) as increment'),
                    DB::raw('SUM(amount) as total'),
                )
              ->groupBy('increment')
              ->get();
        //dd($this->store->orders());


        $this->dataset['values'] = $results->pluck('total')->toArray();
        $this->dataset['labels'] = $results->pluck('increment')->toArray();
//        $increment = match ($this->filters->range) {
//            Range::Today => DB::raw("strftime('%H', ordered_at) as increment"),
//            Range::All_Time => DB::raw("strftime('%Y', ordered_at) || '-' || strftime('%m', ordered_at) as increment"),
//            Range::Year => DB::raw("strftime('%Y', ordered_at) || '-' || strftime('%m', ordered_at) as increment"),
//            default => DB::raw("DATE(ordered_at) as increment"),
//        };
//
//        $results = $this->store->orders()
//            ->select($increment, DB::raw('SUM(amount) as total'))
//            ->tap(function ($query) {
//                $this->filters->apply($query);
//            })
//            ->groupBy('increment')
//            ->get();
//
//        $this->dataset['values'] = $results->pluck('total')->toArray();
//        $this->dataset['labels'] = $results->pluck('increment')->toArray();
    }

    public function render()
    {
        return view('livewire.order.index.chart');
    }

    public function placeholder()
    {
        //return view('livewire.order.index.chart-placeholder');
    }
}
