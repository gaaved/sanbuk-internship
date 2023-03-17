<?php


namespace App\Http\Livewire\Experiences;

use App\Models\Departure;
use LivewireUI\Modal\ModalComponent;

class DepartureFilter extends ModalComponent
{
    public $items = [];
    public $selected = [];

    public function mount()
    {
        $this->items = Departure::all();
        $filter = request()->query('filter');

        ray('filter', request());

        if ($filter !== null && in_array('departure', $filter)) {
            $this->selected = $filter['departure'];

            ray('selected', $this->selected);
        }
    }

    public function render()
    {
        return view('livewire.experiences.departure-filter');
    }

    public function setSelected($value)
    {
        if (in_array($value, $this->selected) === false) {
            $this->selected[] = $value;
        }

        ray('$this->selected', $this->selected);
    }
}
