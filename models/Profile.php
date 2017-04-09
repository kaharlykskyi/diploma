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

    public static function getNews()
    {
        require_once (ROOT.'/template/assets/libs/phpQuery.php');
        $url = 'https://www.livesport.ru/news/football/';
        $file = file_get_contents($url);
        $doc = phpQuery::newDocument($file);
        $news = $doc->find('div.col-left1');
        $news = @iconv('Windows-1251', 'UTF-8//TRANSLIT//IGNORE', $news);
        return $news;
    }

}