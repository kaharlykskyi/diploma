<?php

class ProfileController
{
    /**
     * Метод для отображения страницы профиля
     * @return bool
     */
    public function actionIndex()
    {
        $userId = User::checkLogged();
        $user = User::getUserById($userId);
        require_once(ROOT . '/views/profile/index.php');
        return true;
    }

    /**
     * Метод для редактирования профиля пользователя
     */
    public function actionEdit()
    {
        $userId = User::checkLogged();
        $user = User::getUserById($userId);
        $countries = Profile::getCountries();

        require_once(ROOT.'/views/profile/edit.php');
        return true;
    }


}