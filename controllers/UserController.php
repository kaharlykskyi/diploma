<?php

class UserController
{
    /**
     * Метод для проведения процесса авторизации на сайте
     */
    public function actionLogin()
    {
        $email = '';
        $password = '';

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $errors = false;
            $userId = User::checkUserData($email, $password);

            //Проверяем на существование пользователя
            if ($userId == false) {
                $errors[] = 'Неправильные данные для входа!';
            } else {
                User::auth($userId);
                header("Location: /profile/");
            }
        }
        require_once(ROOT.'/views/user/login.php');
        return true;
    }


    /**
     * Метод для проведения процесса регистрации на сайте
     */
    public function actionRegister()
    {
        $name = '';
        $surname = '';
        $email = '';
        $password = '';
        $password_second = '';
        $bdate = '2017-01-01';
        $result = false;

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password_second = $_POST['password_second'];
            $bdate = $_POST['bdate'];

            $errors = false;

            if (!User::checkSame($password, $password_second)) {
                $errors[] = 'Пароли должны совпадать!';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль должен содержать 5 или более символов!';
            }

            if (User::checkEmailExists($email)) {
                $errors[] = 'Пользователь с таким email уже существует!';
            }


            if ($errors == false) {
                $result = User::register($name, $surname, $email, $password, $bdate);
                if ($result == true) {
                    header('Location: /');
                }
            }
        }

        require_once(ROOT . '/views/user/register.php');
        return true;
    }


    /**
     * Удаление инфо о пользователе с сессии (выход с профиля)
     */
    public function actionLogout()
    {
        unset($_SESSION['user']);
        header('Location: /');
    }
}