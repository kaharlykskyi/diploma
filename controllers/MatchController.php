<?php

class MatchController
{
    public static function actionIndex()
    {
        echo $_GET['league'].'<br>'.$_GET['home'].'<br>'.$_GET['away'];
        return true;
    }
}