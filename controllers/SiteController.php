<?php

class SiteController
{
    public function actionIndex()
    {
        $userId = User::checkUsernameMain();
        $user = User::getUserById($userId);
        $countries = Profile::getCountries();
        $small_avatar_url = Profile::get_gravatar($user['email'], 26);
        $data = Profile::getCurl('https://football24.ua/ru/calendar/'); //вся страница
        $matchTable = Site::getMatchTable($data); //таблица матчей на сегодня


        require_once(ROOT.'/views/site/index.php');
        return true;
    }


}