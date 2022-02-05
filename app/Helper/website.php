<?php

use App\Models\Country;

if (!function_exists('popular_destination')) {
    function popular_destination($limit = 5)
    {
        /**
         * To - do: Develop alogrithm to get popular destination
         */
        return Country::where('status', Country::STATUS_ACTIVE)->limit($limit)->get();
    }
}
