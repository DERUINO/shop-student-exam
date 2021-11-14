<?php ini_set('session.gc_maxlifetime', 604800);
	  session_start();
?>

<?php
    require_once('config.php');
    
    $name = $_POST['name'];
    $password = $_POST['password'];

    $hidden_password = md5($password);

    $lowername = strtolower($name);

    if (isset($name)) {

        $login = $link->prepare("SELECT * FROM users WHERE LOWER(`name`) = :name AND `password` = :password");
        $login->execute(array('name' => $lowername, 'password' => $hidden_password));
        $array = $login->fetch(PDO::FETCH_ASSOC);

        $auth_id = $array['id'];
        $auth_name = strtolower($array['name']);
        $auth_email = $array['email'];
        $auth_password = $array['password'];
        $auth_user_group = $array['user_group'];

        if($lowername == $auth_name && $hidden_password == $auth_password) {

            $_SESSION['id'] = $auth_id;
            $_SESSION['name'] = $auth_name;
            $_SESSION['email'] = $auth_email;
            $_SESSION['user_group'] = $auth_user_group;
            $_SESSION['user_ip'] = $ip;

            echo json_encode($auth = array('auth' => 'Успешная авторизация!'));

        } else {
            echo json_encode($error = array('error' => 'Неверный логин или пароль!'));
        }
    } else {
    	die(header("HTTP/1.0 404 Not Found"));
    }
?>