<?php

class CabinetController
{
    public function actionIndex()
	{
		$userId = User::checkLogged();
        
        if (!$userId) {
            header("Location: /user/login");
        }
		$user = User::getUserById($userId);

		require_once(ROOT . '/views/cabinet/index.php');
		return true;
	}

    public function actionEdit()
    {
        $userId = User::checkLogged();
        if (!$userId) {
            header("Location: /user/login");
        }
        $user = User::getUserById($userId);

        $name = $user['name'];
        $password = $user['password'];
        $result = false;

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $password = $_POST['password'];
            $errors = User::getErrorsUserData($name, $password);

            if ($errors == false) {
                $result = User::edit($userId, $name, $password);
            }
        }

        require_once(ROOT . '/views/cabinet/edit.php');
        return true;
    }
}