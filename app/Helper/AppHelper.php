<?php

namespace App\Helper;

class AppHelper
{
    public static function getPhoto( $gender = 'male')
    {
        return asset( "images/$gender.png" );
    }
}
