<?php

session_start();

$_SESSION['errors'] = [
    'title' => 'Ошибка названия',
    'other' => 'другие ошибки'
];


var_dump($_SESSION);
