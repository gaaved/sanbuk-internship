<?php

namespace App\Http\Livewire\Experiences;

use App\Models\TripType;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class TripTypeFilter extends ModalComponent
{
    public $items = [];
    public $selected = [];

    public function mount()
    {
        $this->items = TripType::all();


 //       $filter = request()->query('filter');

        $symbol = array("http://sanbuk-internship.com/experiences?", "&");
        $results = array_slice(explode("filter", str_replace($symbol, "", $_SERVER['HTTP_REFERER'])), 1);
        $filter = [];
        foreach ($results as $result){
            $date=[];
            $date[] = array_slice(explode("[", str_replace(']', "", $result)), 1);
            $clear = explode("=", $date[0][1]);

            $date[0][1] = $clear[1];

            $filter[$date[0][0]][] = $date[0][1];
        }

        foreach ($filter as $key => $val){
            if($key === 'tripType'){
                $this->selected = $val;
            }
        }

//        if ($filter !== null) {
//            if(in_array('tripType', $filter) === true){
//                $this->selected = $filter['tripType'];
//            }
//        }

    }

    public function render()
    {
        return view('livewire.experiences.trip-type-filter');
    }


    public function setSelected($value)
    {


        if (!in_array($value, $this->selected)) {
            $this->selected[] = $value;
        } else {
            $key = array_search ($value, $this->selected);

                    $this->selected[$key] = null;
                    unset($this->selected[$key]);
                }




    }
}
