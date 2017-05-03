<?php

class SiteController
{
    public function actionIndex()
    {
        $userId = User::checkUsernameMain();
        $user = User::getUserById($userId);
        $football_news = Profile::getNews(Profile::getCurl('https://www.livesport.ru/news/football/'));
        $tennis_news = Profile::getNews(Profile::getCurl('https://www.livesport.ru/news/tennis/'));
        $hockey_news = Profile::getNews(Profile::getCurl('https://www.livesport.ru/news/hockey/'));
        $basketball_news = Profile::getNews(Profile::getCurl('https://www.livesport.ru/news/basketball/'));
        $countries = Profile::getCountries();
        $small_avatar_url = Profile::get_gravatar($user['email'], 26);
        $data = Profile::getCurl('https://football24.ua/ru/calendar/'); //вся страница
        $matchTable = Site::getMatchTable($data); //таблица матчей на сегодня
        $info = Site::get_match_info();



        require_once(ROOT.'/views/site/index.php');
        return true;
    }


}