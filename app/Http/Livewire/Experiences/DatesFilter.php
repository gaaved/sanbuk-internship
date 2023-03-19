<?php

namespace App\Http\Livewire\Experiences;

use App\Models\Traits\ModalFilterTrait;
use LivewireUI\Modal\ModalComponent;

class DatesFilter extends ModalComponent
{
    use ModalFilterTrait;

    public $selected = [];

    protected $listeners = ['setSelected' => 'setSelected'];

    public function mount()
    {
        $filter = $this->modalFilter();

        foreach ($filter as $key => $val){
            if($key === 'packages'){
                $this->selected = $val;
            }
        }
    }

    public function render()
    {
        return view('livewire.experiences.dates-filter');
    }

    public function setSelected($value, $name)
    {
        $this->selected[$name] = $value;
    }
}
