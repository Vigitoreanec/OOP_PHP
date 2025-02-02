<a href="/">Главная</a>
<a href="/?c=posts">Посты</a>

<?php if ($user): ?>


    <div class="button login" style="position: absolute; right: 90px; top: 10px;">
        <span style="padding-right: 20px;">Привет <?= $user ?></span>
        <a class="btn btn-secondary" href="/?c=auth&a=logout">Выйти</a>
    </div>

<?php else: ?>
    <form action="/?c=auth&a=login" method="post">
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
                <a class="btn btn-primary" href="/?c=auth&a=logout"
                    style=" position: relative;
                            width: auto;
                            height: 40px;
                            text-align: center;">
                    Назад
                </a>
            </div>
    </form>

<?php endif; ?>