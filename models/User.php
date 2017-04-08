<?php

class User
{

    /**
     * Метод для проверки паролей
     * @param $password, $password_second
     * @return bool
     */
    public static function checkSame($password, $password2)
    {
        if($password === $password2) {
            return true;
        }
        return false;
    }
    /**
     * Метод проверки пароля на длину
     * @param $password
     * @return bool
     */
    public static function checkPassword($password)
    {
        if(strlen($password) >= 5) {
            return true;
        }
        return false;
    }

    /**
     * Метод для проверки емейла на существование в БД
     * @param $email
     * @return bool
     */
    public static function checkEmailExists($email)
    {
        $db = Db::getConnection();
        $sql = 'SELECT count(email) FROM user WHERE email = :email';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        if ($result->fetchColumn())
            return true;
        return false;
    }

    /**
     * Метод для хэширования пароля и записи (регистрации) пользователя
     * @param $name, $surname, $email, $password
     * @return bool
     */
    public static function register($name, $surname, $email, $password)
    {
        $db = Db::getConnection();
        $password = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO user(email,name,surname,password,role) VALUES (:email, :name, :surname, :password, '')";
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':surname', $surname, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
    }

    /**
     * Метод который проверяет коректность введенных данных при авторизации и если они верны - возвразает id пользователя
     * @param $email, $password
     * @return bool or int
     */
    public static function checkUserData($email, $password)
    {
        $db = Db::getConnection();
        $pass = "SELECT password FROM user WHERE email = :email";
        $result = $db->prepare($pass);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        $hash = $result->fetch(); // хэшированный пароль с БД

        if (password_verify($password, $hash['password'])) {
            $sql = "SELECT * FROM user WHERE email = :email AND password = :password";
            $result = $db->prepare($sql);
            $result->bindParam(':email', $email, PDO::PARAM_STR);
            $result->bindParam(':password', $hash['password'], PDO::PARAM_STR);
            $result->execute();
            $user = $result->fetch();
            if($user) {
                return $user['id'];
            }
        }
        return false;
    }

    /**
     * Метод который создает сессию с id вошедшего пользователя
     * @param $userId
     */
    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

    /**
     * Если сессия существует (пользователь авторизован) - возращает id
     */
    public static function checkLogged()
    {
         if (isset($_SESSION['user'])) {
             return $_SESSION['user'];
         }
         header('Location: /login');
    }

    public static function checkUsernameMain()
    {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        return false;
    }

    /**
     * Проверяет авторизован ли пользователь
     */
    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    /**
     * Возвращает инфо о пользователе по его id
     * @param $userId
     * @return mixed
     */
    public static function getUserById($userId)
    {
        $userId = intval($userId);
        if($userId) {
            $db = Db::getConnection();
            $sql = "SELECT * FROM user WHERE id = :id";
            $result = $db->prepare($sql);
            $result->bindParam(':id', $userId, PDO::PARAM_INT);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();
            return $result->fetch();
        }
    }

}