<?php

class MatchController
{
    public static function actionIndex()
    {
        $userId = User::checkUsernameMain();
        $user = User::getUserById($userId);
        $notificationCounter = User::getNotificationCounter($userId);
        $menu = 'Анализ матча';
        $small_avatar_url = Profile::get_gravatar($user['email'], 26);
        $match_info = Forecast::getLeagueNameById($_GET['league']);
        $tmp = $match_info[0]['league_name'];
        list($league, $tour) = explode(",", $tmp);
        $statistic = Forecast::getStatTableByLeagueName($league, $_GET['home'], $_GET['away']);
        $forecast = Forecast::getForecast($statistic, $_GET['home'], $_GET['away']);
        $logo = Forecast::getLogoByTeamName($_GET['home'], $_GET['away']);
        $info = Site::get_match_info();
        $leagueTable = Forecast::getStatFullTableByLeagueName($league);
        $football_news = Profile::getNews(Profile::getCurl('https://www.livesport.ru/news/football/'));





        require_once(ROOT.'/views/match/index.php');
        return true;
    }

}