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
        $doc = phpQuery::newDocument($file);
        $news = $doc->find('div.col-left1');
        $news = @iconv('Windows-1251', 'UTF-8//TRANSLIT//IGNORE', $news);
        return $news;
    }

    /**
     * Get either a Gravatar URL or complete image tag for a specified email address.
     *
     * @param string $email The email address
     * @param string $s Size in pixels, defaults to 80px [ 1 - 2048 ]
     * @param string $d Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
     * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
     * @param bool $img True to return a complete IMG tag False for just the URL
     * @param array $atts Optional, additional key/value attributes to include in the IMG tag
     * @return String containing either just a URL or a complete image tag
     */
    public static function get_gravatar( $email, $s = 140, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
        $url = 'https://www.gravatar.com/avatar/';
        $url .= md5( strtolower( trim( $email ) ) );
        $url .= "?s=$s&d=$d&r=$r";
        if ( $img ) {
            $url = '<img src="' . $url . '"';
            foreach ( $atts as $key => $val )
                $url .= ' ' . $key . '="' . $val . '"';
            $url .= ' />';
        }
        return $url;
    }

    public static function get_flag_href()
    {
        $userId = User::checkLogged();
        $user_info = User::getUserInfoById($userId);
        $href = '';
        $country = ['Украина' => 'UA', 'Россия' => 'RU', 'США' => 'US'];
        if ($user_info['country'] == 'Украина') $href = 'UA';
        if ($user_info['country'] == 'Россия') $href = 'RU';
        if ($user_info['country'] == 'США') $href = 'US';
        return in_array($href, $country) ? "<img class=\"flags\" src=\"/data/flags/24/$href.png\" alt=\"flag\">&nbsp;" : '';

    }

}