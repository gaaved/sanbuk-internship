<?php

namespace App\Http\Livewire\Experiences;

use App\Models\Traits\ModalFilterTrait;
use App\Models\TripType;
use LivewireUI\Modal\ModalComponent;

class TripTypeFilter extends ModalComponent
{
    use ModalFilterTrait;

    public $items = [];
    public $selected = [];

    public function mount()
    {
        $this->items = TripType::all();

        $filter = $this->modalFilter();

        foreach ($filter as $key => $val){
            if($key === 'tripType'){
                $this->selected = $val;
            }
        }
    }

    public function render()
    {
        return view('livewire.experiences.trip-type-filter');
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
            foreach ($this->items as $item) {
                $sel[] =  $item->id;
            }

            $this->selected =  $value ? $sel : [];
    }
}
