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

    /**
     * Возвращает html код запрошенной страницы
     * @param string $url
     * @param string $referer
     * @return html data
     */
    public static function getCurl($url, $referer = "https://www.google.ru/")
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36");
        curl_setopt($ch, CURLOPT_REFERER, $referer);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    /**
     * Возвращает div с новостями
     * @param $file
     * @return phpQueryObject
     */
    public static function getNews($file)
    {
        require_once (ROOT.'/template/assets/libs/phpQuery.php');
        //$url = 'https://www.livesport.ru/news/football/';
        //$file = file_get_contents($url);
        $doc = phpQuery::newDocument($file);
        $news = $doc->find('div.col-left1');
        $news = @iconv('Windows-1251', 'UTF-8//TRANSLIT//IGNORE', $news);
        return $news;
    }

}