<?php

class MatchController
{
    public static function actionIndex()
    {
        $userId = User::checkUsernameMain();
        $user = User::getUserById($userId);
        $small_avatar_url = Profile::get_gravatar($user['email'], 26);
        $match_info = Forecast::getLeagueNameById($_GET['league']);
        $tmp = $match_info[0]['league_name'];
        list($league, $else) = explode(",", $tmp);
        $statistic = Forecast::getStatTableByLeagueName($league, $_GET['home'], $_GET['away']);
        $forecast = Forecast::getForecast($statistic, $_GET['home'], $_GET['away']);



        require_once(ROOT.'/views/match/index.php');
        return true;
    }
}