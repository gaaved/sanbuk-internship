<?php

namespace App\Http\Livewire\Experiences;

use App\Models\Departure;
use App\Models\Traits\ModalFilterTrait;
use LivewireUI\Modal\ModalComponent;

class DepartureFilter extends ModalComponent
{
    use ModalFilterTrait;

    public $items = [];
    public $selected = [];

    public function mount()
    {
        $this->items = Departure::all();

        $filter = $this->modalFilter();

        foreach ($filter as $key => $val){
            if($key === 'departure'){
                $this->selected = $val;
            }
        }
    }

    public function render()
    {
        return view('livewire.experiences.departure-filter');
    }

    public function setSelected($value)
    {
        if (!in_array($value, $this->selected)) {
            $this->selected[] =  (string)$value;
        } else {
            $key = array_search ($value, $this->selected);

            unset($this->selected[$key]);
        }
    }

    public function setAllSelected($value)
    {
        $sel = [];
        foreach ($this->items as $item)
        {
            $sel[] =  $item->id;
        }

        $this->selected =  $value ? $sel : [];
    }
}
