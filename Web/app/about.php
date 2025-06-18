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
    <title>О нас</title>
    <link href="sources/styles.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header>
            <h1>О нас</h1>
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
            <p>Мы команда, которая занимается разработкой простых и понятных веб-сайтов. 
            Мы верим, что технологии должны быть доступными для всех, и стремимся сделать их использование лёгким и приятным.</p>
            <p>Наши специалисты обладают многолетним опытом работы в области веб-разработки и дизайна. 
            Мы всегда стремимся к совершенству и постоянно ищем новые способы улучшить наши услуги. Узнайте больше, посетив другие разделы нашего сайта.</p>
            <p>Если у вас есть вопросы или предложения, не стесняйтесь связаться с нами. Мы всегда готовы помочь и ответить на любые ваши вопросы!</p>
        </main>
        <footer>
            <p>&copy; 2024 Всё это принадлежит МНЕ, кража букв запрещена.</p>
        </footer>
    </div>
</body>
</html>
