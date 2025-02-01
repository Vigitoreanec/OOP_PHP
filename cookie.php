<?php

//cookies

setcookie("username", "admin", time() + 36000, '/');

print_r($_COOKIE);

//1 установка
//2 обновление
//3 удалить
