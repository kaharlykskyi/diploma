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
        $football_news = Profile::getNews(Profile::getCurl('https://www.livesport.ru/news/football/'));
        $tennis_news = Profile::getNews(Profile::getCurl('https://www.livesport.ru/news/tennis/'));
        $hockey_news = Profile::getNews(Profile::getCurl('https://www.livesport.ru/news/hockey/'));
        $basketball_news = Profile::getNews(Profile::getCurl('https://www.livesport.ru/news/basketball/'));
        $boxing_news = Profile::getNews(Profile::getCurl('https://www.livesport.ru/news/boxing/'));
        $large_avatar_url = Profile::get_gravatar($user['email']);
        $small_avatar_url = Profile::get_gravatar($user['email'], 26);

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
        $small_avatar_url = Profile::get_gravatar($user['email'], 26);
        $medium_avatar_url = Profile::get_gravatar($user['email'], 100);

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
            $about = $_POST['about'];
            $interests = serialize($_POST['interests']);

            $result = User::edit($userId, $name, $surname, $bdate, $country, $city, $phone, $skype, $vk, $fb, $google, $twitter, $about, $interests);
            if ($result == true) {
                header('Location: /profile');
            }
        }


        require_once(ROOT.'/views/profile/edit.php');
        return true;
    }


}