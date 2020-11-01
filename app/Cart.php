<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    public function hitungTotal($hrg)
    {

        $sum  = 0;
        $arr = [];
        foreach ($hrg as $ttl) {

            if (isset($ttl[1])) {

                array_push($arr, $ttl[1]);
            }
        }
        $sum = array_sum($arr);

        return $sum;
    }
}
