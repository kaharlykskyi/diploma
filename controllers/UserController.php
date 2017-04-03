<?php

class UserController
{
    /**
     * Метод для проведения процесса авторизации на сайте
     */
    public function actionLogin()
    {
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
        $result = false;

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password_second = $_POST['password_second'];

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
                $result = User::register($name, $surname, $email, $password);
                if ($result == true) {
                    header('Location: /');
                }
            }
        }

        require_once(ROOT.'/views/user/register.php');
        return true;
    }
}