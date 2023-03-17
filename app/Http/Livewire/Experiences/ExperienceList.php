<?php

namespace App\Http\Livewire\Experiences;

use App\Models\Experience;
use App\Models\ExperienceImage;
use App\Models\Package;
use Illuminate\Database\Eloquent\Builder;
//use Illuminate\Database\Query\Builder;
use Livewire\Component;

class ExperienceList extends Component
{
    public $experiences = [];

    public $search = null;
    public $filter = null;

    protected $queryString = ['search', 'filter'];

    protected $listeners = [
        'searchEvent' => 'searchListener',
        'filterEvent' => 'filterListener',
    ];

    public function updated($name, $value)
    {
        if ($name === 'search') {
            if (empty($value)) {
                $this->search = null;
            }
            $this->emit('searchEvent', $value);
        }
    }

    public function searchListener($value)
    {
        $this->search = $value;
        $this->initItems();
    }

    public function filterListener($type, $value)
    {
        $this->emit('closeModal');
        $this->filter[$type] = $value;
        ray($this->filter);
        $this->initItems();
    }

    public function mount()
    {
        $this->initItems();
    }

    public function render()
    {
        return view('livewire.experiences.experience-list');
    }

    public function initItems()
    {

        request()->flash();
        $experiences = Experience::query();

        if ($this->search !== null) {
            $experiences->where('name', 'like', '%'. $this->search .'%');
        }

        if ($this->filter !== null) {


            foreach ($this->filter as $key => $values) {

                    $experiences->whereHas($key, function (Builder $query) use ($key, $values) {
                        if ($key === 'tripType') {
                            $query->whereIn('id', $values);
                        }
                        if ($key === 'departure') {
                            $query->whereIn('id', $values);
                        }
                        if ($key === 'packages') {
                            $query->where('start_of_activity','<=' , $values[1])
                                  ->where('and_of_activity', '>=', $values[0]);
                        }
                        if ($key === 'type') {
                            $query->whereIn('id', $values);
                        }
                        return $query;
                    });
            }
        }

        $this->experiences = $experiences->get();

        return $this->experiences;
    }
}
