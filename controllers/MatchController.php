<?php

class MatchController
{
    public static function actionIndex()
    {
        $userId = User::checkUsernameMain();
        $user = User::getUserById($userId);
        $small_avatar_url = Profile::get_gravatar($user['email'], 26);



        require_once(ROOT.'/views/match/index.php');
        return true;
    }
}