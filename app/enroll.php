<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link href="sources/styles.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header>
            <h1>Регистрация</h1>
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
            <p>Это страница регистрации. Придумайте и введиите имя и пароль, которые будут использованы в дальнейшем.</p>
            <p>Уже существующие имена, а также имена, имеющие длину менее 3 символов, не могут быть использованы для регистрации.</p>
            <form action="sources/db.php" method="post">
                <input type="text" name="login" placeholder="Придумайте логин" required>
                <input type="password" name="password" placeholder="Придумайте пароль" required>
                <input type="email" name="email" placeholder="Введите email" required>
                <input type="hidden" name="action" value="enroll">
                <input type="submit" value="Зарегистрироваться">
            </form>
        </main>
        <footer>
            <p>&copy; 2024 Всё это принадлежит МНЕ, кража букв запрещена.</p>
        </footer>
    </div>
</body>
</html>
