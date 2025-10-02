<?php
    if (!isset($_COOKIE['user_role'])) {
        http_response_code(403);
        header('Location: /login.php');
        exit;
    }

    if (!isset($_GET['id'])) {
        die('Пост не найден.');
    }

    $post_id = $_GET['id'];

    $connection = mysqli_connect('localhost', 'application_admin', '1324', 'application');
    if (!$connection)
        die('Ошибка подключения: ' . mysqli_connect_error());

    $result = mysqli_query($connection, "SELECT * FROM posts WHERE id = $post_id");
    if (!$result) {
        mysqli_close($connection);
        die('Не удалось загрузить пост.');
    }

    $post = mysqli_fetch_assoc($result);
    if (!$post) {
        mysqli_close($connection);
        die('Пост не найден.');
    }

    mysqli_close($connection);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $post['title']; ?></title>
    <link href="sources/styles.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header>
            <h1><?php echo $post['title']; ?></h1>
        </header>
        <main>
            <article>
                <p><?php echo $post['main_text']; ?></p>
            </article>
            <a href="/">Назад на главную</a>
        </main>
        <footer>
            <p>&copy; 2024 Всё это принадлежит МНЕ, кража букв запрещена.</p>
        </footer>
    </div>
</body>
</html>
