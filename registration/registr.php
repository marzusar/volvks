<?php
// Опционально начать сессию, если вам нужны сессии
session_start();

// Обработка формы при отправке
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Получение данных из формы
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Здесь должна быть логика для проверки учетных данных
    // Для примера, просто выводим их
    // В реальной жизни вы должны сравнивать эти данные с теми, что у вас есть в базе данных.
    if ($username == "test" && $password == "password") {
        $_SESSION['username'] = $username;
        header("Location: welcome.php"); // Переход на страницу после успешной авторизации
        exit();
    } else {
        $error_message = "Неверное имя пользователя или пароль.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wind_reg">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <h1>Авторизация</h1>
            <?php if (!empty($error_message)): ?>
                <p style="color: red;"><?php echo $error_message; ?></p>
            <?php endif; ?>
            <div class="input_box">
                <input type="text" name="username" placeholder="Имя" required>
                <i class='bx bx-user bx-flip-horizontal'></i>
            </div>
            <div class="input_box">
                <input type="password" name="password" placeholder="Пароль" required>
                <i class='bx bx-lock-alt'></i>
            </div>

            <button type="submit" class="btm">Войти</button>

            <div class="remember">
                <div class="regisrt_link">
                    <p><a href="#">Создать акаунт</a></p>
                </div>
                <a href="#">Забыл пароль</a>
            </div>
        </form>
    </div>
</body>
</html>