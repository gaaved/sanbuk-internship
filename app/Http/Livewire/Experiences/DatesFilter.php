<?php

namespace App\Http\Livewire\Experiences;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class DatesFilter extends ModalComponent
{
    public $selected = [];

    protected $listeners = ['setSelected' => 'setSelected'];

    public function mount()
    {
        $filter = request()->query('filter');

        if ($filter !== null && in_array('packages', $filter)) {
            $this->selected = $filter['packages'];
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
