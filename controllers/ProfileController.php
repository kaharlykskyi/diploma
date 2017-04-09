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
        $user_info = User::getUserInfoById($userId); //получаем доп. инфу о пользователе
        $news = Profile::getNews();

        require_once(ROOT . '/views/profile/index.php');
        return true;
    }

    /**
     * Метод для редактирования профиля пользователя
     */
    public function actionEdit()
    {
        $userId = User::checkLogged(); //получаем id пользователя
        $user = User::getUserById($userId); //получаем основную инфу о пользователе
        $user_info = User::getUserInfoById($userId); //получаем доп. инфу о пользователе
        $countries = Profile::getCountries();

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $bdate = $_POST['bdate'];
            $country = $_POST['country'];
            $city = $_POST['city'];
            $phone = $_POST['phone'];
            $skype = $_POST['skype'];
            $vk = $_POST['vk'];
            $fb = $_POST['fb'];
            $google = $_POST['google'];
            $twitter = $_POST['twitter'];
            $interests = $_POST['interests'];
            $about = $_POST['about'];

            $result = User::edit($userId, $name, $surname, $bdate, $country, $city, $phone, $skype, $vk, $fb, $google, $twitter, $about, $interests);
            if ($result == true) {
                header('Location: /profile');
            }
        }


        require_once(ROOT.'/views/profile/edit.php');
        return true;
    }


}