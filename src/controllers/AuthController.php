<?php

namespace Sergey\Oop\controllers;

class AuthController extends Controller
{
    public function actionLogin()
    {
        $login = $_POST['login'];
        $pass = $_POST['pass'];
        $user_role = true; // логика

        if (($login == 'admin' || $login == 'Admin') && $user_role) {
            $_SESSION['login'] = 'admin';
            header('Location: /');
            exit();
        }
    }

    public function actionLogout()
    {
        session_destroy();
        header('Location: /');
        exit();
    }
}
