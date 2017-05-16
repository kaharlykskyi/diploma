<?php

class ForecastController
{
    public static function actionIndex()
    {
        $userId = User::checkUsernameMain();
        $user = User::getUserById($userId);
        $notificationCounter = User::getNotificationCounter($userId);
        $menu = 'Прогнозы';
        $small_avatar_url = Profile::get_gravatar($user['email'], 26);

        $data = Profile::getCurl('https://football24.ua/ru/calendar/'); //вся страница
        $matchTable = Site::getMatchTable($data); //таблица матчей на сегодня
        $info = Site::get_match_info();


        require_once(ROOT . '/views/forecast/index.php');
        return true;
    }
}