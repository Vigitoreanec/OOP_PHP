<?php
session_start();
$user = false;

if (isset($_SESSION['login'])) {
    $user = $_SESSION['login'];
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: /');
    exit();
}

if (isset($_GET['login'])) {
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    if ($login == 'admin' && $pass == 'admin') {
        $_SESSION['login'] = 'admin';
        header('Location: /');
        exit();
    }
}

?>

<?php if ($user): ?>
    Привет <?= $user ?>
    <a class="nav-link">Показ</a>
    <div class="button login" style="position: absolute; right: 90px; top: 10px;">
        <a class="btn btn-secondary" type="button">Выйти</a>
    </div>

<?php else: ?>
    <form action="/?login" method="post">
        <div class="row" style="text-align: center;">
            <div class="form-data">
                <label></label>
                <input type="text" name="login">
            </div>
            <div class="form-data" style=" margin-top: 10px;">
                <label></label>
                <input type="password" name="pass">
            </div>
            <div style="margin: 10px 20px;">
                <input class="btn btn-primary" type="submit" value="Войти" style="
                position: relative;
                width: auto;
                height: 30px;
                text-align: center;"></input>
                <a class="btn btn-primary" href="/?logout"
                    style=" position: relative;
                            width: auto;
                            height: 40px;
                            text-align: center;">
                    Назад
                </a>
            </div>
    </form>

<?php endif; ?>