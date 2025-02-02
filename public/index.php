<?php
session_start();
//session_destroy();
//routing

//localhost/index.php
//localhost/posts.php       localhost/posts
//localhost/post.php?id=2   localhost/post?id=2
//localhost/users.php       localhost/users/5

//localhost/?page=user&id=2     localhost/?c=user ->c(controller)

use Sergey\Oop\core\Render;

include __DIR__ . "/../vendor/autoload.php";


$controllerName = $_GET["c"] ?? 'posts';
$actionName = $_GET["a"] ?? 'index';

$controllerClass = "Sergey\\Oop\\controllers\\"  . ucfirst($controllerName) . "Controller";;

try {

    if (class_exists($controllerClass)) {
        $controller = new $controllerClass(new Render());
        $controller->runAction($actionName);
    } else {
        throw new Exception("Нет такого контроллера");
    }
} catch (Exception $ex) {
    echo $ex->getMessage();
}
