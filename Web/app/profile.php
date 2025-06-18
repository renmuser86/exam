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
    <title>Профиль</title>
    <link href="sources/styles.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header>
            <h1>Профиль</h1>
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
            <h2>Добро пожаловать в ваш профиль!</h2>
            <p>Это ваша страница, тут вы можете создавать посты, делиться мыслями, идеями и многим другим!</p>
            <form class="post-form" action="/profile.php" method="POST" enctype="multipart/form-data" name="upload">
                <label for="post-title">Заголовок поста:</label>
                <input type="text" id="post-title" name="title" required placeholder="Введите заголовок поста">
                <label for="post-content">Текст поста:</label>
                <textarea id="post-content" name="main_text" required placeholder="Введите текст вашего поста"></textarea>
                <label for="file-upload" class="custom-file-upload">
                    <input id="file-upload" type="file" name="file">
                    Прикрепить файл
                </label>
                <span id="file-name">Файл не выбран</span>
                <input type="submit" name="submit" value="Создать пост">
            </form>
        </main>
        <footer>
            <p>&copy; 2024 Всё это принадлежит МНЕ, кража букв запрещена.</p>
        </footer>
    </div>
    <script>
        document.getElementById('file-upload').addEventListener('change', function() {
            const fileName = this.files[0] ? this.files[0].name : 'Файл не выбран';
            document.getElementById('file-name').textContent = fileName;
        });
    </script>
</body>
</html>
<?php
    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $main_text = $_POST['main_text'];

        if (!$title || !$main_text)
            die('Заполните все поля ввода!');

        if(!empty($_FILES["file"]) && $_FILES["file"]["size"] < 1048576) {
            $fileType = $_FILES["file"]["type"];
            $allowedTypes = ['image/gif', 'image/jpeg', 'image/jpg', 'image/pjpeg', 'image/png', 'image/x-png'];

            if (in_array($fileType, $allowedTypes)) {
                move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
                echo "Файл был загружен в: " . "upload/" . $_FILES["file"]["name"];
            } else
                echo "Ошибка загрузки файла!";
        }

        $connection = mysqli_connect('localhost', 'application_admin', '1324', 'application');
        if (!$connection)
            die('Ошибка подключения: ' . mysqli_connect_error());

        $add_post = mysqli_query($connection, "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')");
        if (!$add_post) {
            mysqli_close($connection);
            die('Не удалось добавить пост.');
        }

        mysqli_close($connection);
    }
?>
