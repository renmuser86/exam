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
    <title>Контакты</title>
    <link href="sources/styles.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header>
            <h1>Контакты</h1>
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
        <p>Свяжитесь с нами по электронной почте: info@example.com. Мы стараемся отвечать на все запросы в течение 24 часов. Ваше мнение важно для нас!</p>
                <p>Наш офис находится в центре города, и мы всегда рады видеть вас. Если у вас есть срочные вопросы, вы можете позвонить нам по телефону, указанному ниже.</p>
                <p>Телефон: +1 234 567 8900. Часы работы: с 9:00 до 18:00 с понедельника по пятницу. Спасибо, что выбрали наш сайт!</p>
        </main>
        <footer>
            <p>&copy; 2024 Всё это принадлежит МНЕ, кража букв запрещена.</p>
        </footer>
    </div>
</body>
</html>
