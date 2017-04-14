<?php

class UserController
{
    public function actionRegister()
	{
		$name = '';
		$password = '';
		$result = false;

		if (isset($_POST['submit'])) {
			$name = $_POST['name'];
			$password = $_POST['password'];

			$errors = User::getErrorsUserData($name, $password);
			if (User::checkNameExists($name)) {
                $errors[] = 'A user with this name already exists';
            }

			if ($errors == false) {
				$result = User::register($name, $password);
			}
		}

		require_once(ROOT . '/views/user/register.php');
		return true;
	}

    public function actionLogin()
	{
        $password = false;
        $name = false;
        
        if (isset($_POST['submit'])) {
            $password = $_POST['password'];
            $name = $_POST['name'];
        	$userId = User::checkExistsUserData($name, $password);
        	if ($userId != false) {
        		User::auth($userId);
                header("Location: /cabinet");
            } else {
            	$errors[] = 'Incorrect login or password';
            }
        }

        require_once(ROOT . '/views/user/login.php');
        return true;
	}

    public function actionLogout()
    {
        unset($_SESSION['user']);
        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");
        return true;
    }
}