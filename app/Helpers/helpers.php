<?php

if (! function_exists('dateToPage')) {
    function dateToPage($d){
        if($d){
            $date = new DateTime($d);
            return $date->format('d.m.Y H:i');
        }
    }
}

if (! function_exists('dateToDb')) {
    function dateToDb($d){
        $date = new DateTime($d);
        return $date->format('Y-m-d');
    }
}