<?php

class SiteController
{
    public function actionIndex()
    {
        $userId = User::checkUsernameMain();
        $user = User::getUserById($userId);
        $countries = Profile::getCountries();

        require_once(ROOT.'/views/site/index.php');
        return true;
    }

}