<?php

class ParserController
{
    public function actionMatch()
    {
        $userId = User::checkUsernameMain();
        $user = User::getUserById($userId);
        $file = Profile::getCurl('https://football24.ua/ru/calendar/'); //вся страница
        $data = Parser::get_today_match_data($file); //массив с данными о матчах
        Parser::insert_match_data($data); //всталяем инфу в БД

        $england_table = Parser::get_stat_table(Profile::getCurl('https://football24.ua/champ/showTables.do?anglija&tagId=50820&lang=ru'));
        Parser::insert_stat_table($england_table, 'england');
        $spain_table = Parser::get_stat_table(Profile::getCurl('https://football24.ua/champ/showTables.do?ispanija&tagId=50823&lang=ru'));
        Parser::insert_stat_table($spain_table, 'spain');
        $italy_table = Parser::get_stat_table(Profile::getCurl('https://football24.ua/champ/showTables.do?italija&tagId=50822&lang=ru'));
        Parser::insert_stat_table($italy_table, 'italy');
        $germany_table = Parser::get_stat_table(Profile::getCurl('https://football24.ua/champ/showTables.do?germanija&tagId=50829&lang=ru'));
        Parser::insert_stat_table($germany_table, 'germany');
        $france_table = Parser::get_stat_table(Profile::getCurl('https://football24.ua/champ/showTables.do?francija&tagId=50826&lang=ru'));
        Parser::insert_stat_table($france_table, 'france');
        $ukraine_table = Parser::get_stat_table(Profile::getCurl('https://football24.ua/champ/showTables.do?ukraina&tagId=50819&lang=ru&activeTournamentTableTab=UPL_FIRST_STAGE'));
        Parser::insert_stat_table($ukraine_table, 'ukraine');
        $turkey_table = Parser::get_stat_table(Profile::getCurl('https://football24.ua/champ/showTables.do?turcija&tagId=51278&activeTournamentTableTab=&lang=ru'));
        Parser::insert_stat_table($turkey_table, 'turkey');

        require_once(ROOT.'/views/site/parser.php');
        return true;
    }

    public function actionStat()
    {
        $userId = User::checkUsernameMain();
        $user = User::getUserById($userId);

        $england_scorers = Parser::getScorersTable(Profile::getCurl('https://football24.ua/champ/showForwards.do?anglija_201617&tagId=50820&lang=ru'));
        Parser::insertScorersTable($england_scorers, 'england');
        $spain_scorers = Parser::getScorersTable(Profile::getCurl('https://football24.ua/champ/showForwards.do?ispanija_201617&tagId=50823&lang=ru'));
        Parser::insertScorersTable($spain_scorers, 'spain');
        $italy_scorers = Parser::getScorersTable(Profile::getCurl('https://football24.ua/champ/showForwards.do?italija_201617&tagId=50822&lang=ru'));
        Parser::insertScorersTable($italy_scorers, 'italy');
        $germany_scorers = Parser::getScorersTable(Profile::getCurl('https://football24.ua/champ/showForwards.do?germanija_201617&tagId=50829&lang=ru'));
        Parser::insertScorersTable($germany_scorers, 'germany');
        $ukraine_scorers = Parser::getScorersTable(Profile::getCurl('https://football24.ua/champ/showForwards.do?ukraina_201617&tagId=50819&lang=ru'));
        Parser::insertScorersTable($ukraine_scorers, 'ukraine');


        require_once(ROOT.'/views/site/parser.php');
        return true;
    }


}