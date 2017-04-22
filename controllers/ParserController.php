<?php

class ParserController
{
    public function actionMatch()
    {
        $userId = User::checkUsernameMain();
        $user = User::getUserById($userId);
        $file = Profile::getCurl('https://football24.ua/ru/calendar/'); //вся страница
        $data = Parser::get_today_match_data($file); //массив с данными о матчах

        $res = Parser::insert_match_data($data); //всталяем инфу в БД
        if ($res == 1) {
            $res = 'Данные успешно обновлены';
        }

        require_once(ROOT.'/views/site/parser.php');
        return true;
    }
}