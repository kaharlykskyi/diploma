<?php

class Profile
{
    /**
     * Возвращает список стран с json файла
     * @return array|bool
     */
    public static function getCountries()
    {
        $buffer = file_get_contents(ROOT."/data/country.json");
        $countries = json_decode($buffer);
        if(json_last_error() == JSON_ERROR_NONE) {
            return $countries;
        }
        return false;
    }

    /**
     * Возвращает дату рождения в профиль в нужном формате
     * @param $str
     * @return false|string
     */
    public static function toDate($str)
    {
        return date("d.m.Y", strtotime($str));
    }

}