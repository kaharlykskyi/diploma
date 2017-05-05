<?php

class StatisticController
{
    public static function actionIndex()
    {
        $userId = User::checkUsernameMain();
        $user = User::getUserById($userId);
        $menu = 'stat';
        $small_avatar_url = Profile::get_gravatar($user['email'], 26);

        $leagueTableEngland = Forecast::getStatFullTableByLeagueName('Англия');
        $scorersTableEngland = Statistic::getScorersTableByLeagueName('Англия');

        $leagueTableUkraine = Forecast::getStatFullTableByLeagueName('Украина');
        $scorersTableUkraine = Statistic::getScorersTableByLeagueName('Украина');

        $leagueTableSpain = Forecast::getStatFullTableByLeagueName('Испания');
        $scorersTableSpain = Statistic::getScorersTableByLeagueName('Испания');

        $leagueTableGermany = Forecast::getStatFullTableByLeagueName('Германия');
        $scorersTableGermany = Statistic::getScorersTableByLeagueName('Германия');

        $leagueTableItaly = Forecast::getStatFullTableByLeagueName('Италия');
        $scorersTableItaly = Statistic::getScorersTableByLeagueName('Италия');

        $leagueTableFrance = Forecast::getStatFullTableByLeagueName('Франция');
        $leagueTableTurkey = Forecast::getStatFullTableByLeagueName('Турция');


        require_once(ROOT . '/views/statistic/index.php');
        return true;
    }
}