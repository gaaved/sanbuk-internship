<?php

namespace App\Models\Traits;

trait ModalFilterTrait
{
    public function modalFilter()
    {
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
        return $filter;
    }
}
