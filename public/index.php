<?php

//routing

//localhost/index.php
//localhost/posts.php       localhost/posts
//localhost/post.php?id=2   localhost/post?id=2
//localhost/users.php       localhost/users/5

//localhost/?page=user&id=2     localhost/?c=user ->c(controller)

use Sergey\Oop\controllers\PostsController;

include __DIR__ . "/../vendor/autoload.php";


$controllerName = $_GET["c"] ?? 'posts';
$actionName = $_GET["a"] ?? 'index';

$controllerClass = "Sergey\\Oop\\controllers\\"  . ucfirst($controllerName) . "Controller";;

//var_dump($controllerClass);
//var_dump(class_exists($controllerClass));

if (class_exists($controllerClass)) {
    $controller = new $controllerClass();
    $controller->runAction($actionName);
} else {
    echo "Нет такого контроллера";
}











// AR CRUD над одной записью в БД через ООП
/*
// C -> Create

$post = new Post("post");

$post->insert();

// R -> Read
$post = Post::getOne($id);
$post = Post::getAll();

// U -> Update
$post->title = "new";
$post->update();

//$post->save();

// D -> Delete
$post->delete();
*/