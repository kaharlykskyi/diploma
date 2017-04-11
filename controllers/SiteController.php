<?php

class SiteController
{
    public function actionIndex()
    {
        $userId = User::checkUsernameMain();
        $user = User::getUserById($userId);
        $countries = Profile::getCountries();
        $small_avatar_url = Profile::get_gravatar($user['email'], 26);

        require_once(ROOT.'/views/site/index.php');
        return true;
    }

}