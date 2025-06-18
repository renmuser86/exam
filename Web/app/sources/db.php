<?php
    define('COOKIE_LIFETIME', 60 * 60 * 2);

    $username = $_POST['login'];
    $password = $_POST['password'];

    if ($_POST['action'] == 'login') {
        if (!$username || !$password)
            die('Заполните все поля ввода!');

        $connection = mysqli_connect('localhost', 'application_admin', '1324', 'application');
        if (!$connection)
            die('Ошибка подключения: ' . mysqli_connect_error());

        $result = mysqli_query($connection, "SELECT * FROM users WHERE username = '$username' AND password = '$password'");
        if (!$result) {
            mysqli_close($connection);
            die('Не удалось добавить пост.');
        }
        
        if (mysqli_num_rows($result) > 0) {
            setcookie('user_role', $_POST['login'], time() + COOKIE_LIFETIME, '/');
            mysqli_close($connection);
            header('Location: /');
            exit;
        } else {
            mysqli_close($connection);
            echo '<h3 align="center">Неправильный логин или пароль, попробуйте снова.</h3>';
        }
    } else {
        $email = $_POST['email'];

        if (!$username || !$password || !$email)
            die('Заполните все поля ввода!');

        $connection = mysqli_connect('localhost', 'application_admin', '1324', 'application');
        if (!$connection)
            die('Ошибка подключения: ' . mysqli_connect_error());

        $result = mysqli_query($connection, "SELECT * FROM users WHERE username = '$username'");
        if (!$result) {
            mysqli_close($connection);
            die('Не удалось добавить пост.');
        }

        if (mysqli_num_rows($result) > 0) {
            mysqli_close($connection);
            echo '<h3 align="center">Пользователь с таким именем уже существует, пожалуйста, используйте другое.</h3>';
        } else if (strlen($username) < 3) {
            mysqli_close($connection);
            echo '<h3 align="center">Нельзя использовать имя с длиной меньшей, чем 3 символа.</h3>';
        } else if (strlen($password) < 4) {
            mysqli_close($connection);
            echo '<h3 align="center">Нельзя использовать пароль с длиной меньшей, чем 4 символа.</h3>';
        } else {
            $enroll_new_user = mysqli_query($connection, "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')");
            setcookie('user_role', $_POST['login'], time() + COOKIE_LIFETIME, '/');
            mysqli_close($connection);
            header('Location: /');
            exit;
        }
    }
