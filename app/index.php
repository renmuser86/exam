<?php
    if (!isset($_COOKIE['user_role'])) {
        http_response_code(403);
        header('Location: /login.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link href="sources/styles.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header>
            <h1>Главная</h1>
            <nav>
                <ul>
                    <li><a href="/">Главная</a></li>
                    <li><a href="/profile.php">Профиль</a></li>
                    <li><a href="/about.php">О нас</a></li>
                    <li><a href="/contact.php">Контакты</a></li>
                    <li><a href="/login.php">Авторизация</a></li>
                    <li><a href="/enroll.php">Регистрация</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <p>Это главная страница нашего сайта. Здесь вы найдёте общую информацию. 
            Мы рады приветствовать вас и надеемся, что вы найдете что-то полезное для себя. Наша цель - сделать ваш опыт максимально удобным и информативным.</p>
            <p>На этой странице вы можете узнать основные сведения о нашем сайте, его структуре и возможностях. 
            Обязательно посетите другие страницы, чтобы больше узнать о нас и наших услугах.</p>
            <figure class="content">
                <img src="/sources/image.jpg" class="main-image" alt="Карасик">
                <figcaption>Текущие посты:</figcaption>
            </figure>
            <div class="post-links">
                <?php
                    $connection = mysqli_connect('localhost', 'application_admin', '1324', 'application');
                    if (!$connection)
                        die('Ошибка подключения: ' . mysqli_connect_error());

                    $result = mysqli_query($connection, "SELECT * FROM posts");
                    if (!$result) {
                        mysqli_close($connection);
                        die('Не удалось загрузить посты.');
                    }

                    if (mysqli_num_rows($result) > 0) {
                        while ($post = mysqli_fetch_assoc($result))
                            echo '<a href="/posts.php?id=' . $post['id'] . '">' . $post['title'] . '</a><br>';
                    } else
                        echo 'Здесь пока нет записей.';

                    mysqli_close($connection);
                ?>
            </div>
        </main>
        <footer>
            <p>&copy; 2024 Всё это принадлежит МНЕ, кража букв запрещена.</p>
        </footer>
    </div>
</body>
</html>
