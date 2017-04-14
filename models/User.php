<?php 

class User
{
    /**
     * @param string $name
     * @param string $password
     * @return bool
     */
    public static function register($name, $password)
    {
        $db = Db::getConnection();
        $sql = 'INSERT INTO `users` (`name`, `password`) '
                . 'VALUES (:name,  :password)';
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
    }

    /**
     * @param integer $userId
     */
    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

    /**
     * @return bool/int
     */
    public static function checkLogged()
    {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        return false;
    }

    /**
     * @return bool
     */
    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    /**
     * @param string $name
     * @param string $password
     * @return bool/int
     */
    public static function checkExistsUserData($name, $password)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM `users` WHERE `name` = :name AND `password` = :password';
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();
        $user = $result->fetch();
        if ($user) {
            return $user['id'];
        }
        return false;
    }

    /**
     * @param string $name
     * @param string $password
     * @return bool/array
     */
    public static function getErrorsUserData($name, $password) {
        $errors = false;

        if(strlen($name) < 2) {
            $errors[] = 'The name can not be shorter than 2 characters';
        } 
        
        if(strlen($password) < 6) {
            $errors[] = 'Password must not be shorter than 6 characters';
        }

        return $errors;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public static function getUserById($id)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM `users` WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetch();
    }

    /**
     * @param string $name
     * @return bool
     */
    public static function checkNameExists($name)
    {
        $db = Db::getConnection();
        $sql = 'SELECT COUNT(*) FROM `users` WHERE `name` = :name';
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->execute();

        if($result->fetchColumn()) {
            return true;
        }
        return false;
    }

    /**
     * @param integer $id
     * @param string $name
     * @param string $password
     * @return bool
     */
    public static function edit($id, $name, $password)
    {
        $db = Db::getConnection();
        $sql = "UPDATE users 
            SET name = :name, password = :password 
            WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
    }

    /**
     * @return bool
     */
    public static function checkAdmin()
    {
        $userId = User::checkLogged();
        $user = User::getUserById($userId);

        if ($user['role'] == 'admin') {
            return true;
        }
        return false;
    }
}