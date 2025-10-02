<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link href="sources/styles.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header>
            <h1>Авторизация</h1>
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
            <p>Это страница авторизации. Войдите в аккаунт, если он у Вас уже есть, или <a href="/enroll.php">зарегистрируйтесь</a>.</p>
            <form action="sources/db.php" method="post">
                <input type="text" name="login" placeholder="Введите логин" required>
                <input type="password" name="password" placeholder="Введите пароль" required>
                <input type="hidden" name="action" value="login">
                <input type="submit" value="Войти">
            </form>
        </main>
        <footer>
            <p>&copy; 2024 Всё это принадлежит МНЕ, кража букв запрещена.</p>
        </footer>
    </div>
</body>
</html>
