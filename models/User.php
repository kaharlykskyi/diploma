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
}