<?php

class Profile
{
    public static function getCountries()
    {
        $buffer = file_get_contents(ROOT."/data/country.json");
        $countries = json_decode($buffer);
        if(json_last_error() == JSON_ERROR_NONE) {
            return $countries;
        }
        return false;
    }
}