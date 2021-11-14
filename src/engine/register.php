<?php
	include('config.php');

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password1 = $_POST['password1'];
	$password2 = $_POST['password2'];

    $format = '/^[a-z0-9]+$/i';
	$lowername = strtolower($name);
    $group = 4;

    if (isset($name)) {
    	$check_mail = $link->prepare('SELECT `email` FROM `users` WHERE `email` = :email');
    	$check_mail->execute(array('email' => $email));
		$exists_email = $check_mail->fetchColumn();
		
		$check_name = $link->prepare('SELECT `name` FROM `users` WHERE LOWER(`name`) = :name');
    	$check_name->execute(array('name' => $lowername));
    	$exists_name = $check_name->fetchColumn();

    	if ($exists_email || strlen($email) <= 0) {
    		echo json_encode($error = array('email' => 'Данная эл. почта уже занята!'));
    	} else if ($exists_name || strlen($name) <= 0) {
			echo json_encode($error = array('name' => 'Данный логин уже занят!'));
		} else {

			if ($password1 == $password2) {
				if (preg_match($format, $name)) {
					$hidden_password = md5($password1);

		            $register = $link->prepare("INSERT INTO `users` SET `name` = :name, `password` = :password, `email` = :email, `user_group` = :user_group");
		            $register->execute(array('name' => $name, 'password' => $hidden_password, 'email' => $email, 'user_group' => $group));
		            
		            echo json_encode($error = array('register' => 'Успешная регистрация! Авторизуйтесь под своими данными.'));

				} else {
					echo json_encode($error = array('format' => 'Некорректный логин!'));
				}

	        } else {
	            echo json_encode($error = array('password' => 'Пароли не совпадают!'));
	        }
	    }

    } else {
    	die(header("HTTP/1.0 404 Not Found"));
    }
?>