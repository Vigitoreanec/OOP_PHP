<?php

namespace Sergey\Oop\controllers;

use Sergey\Oop\model\Post;
use Sergey\Oop\interfaces\IRender;


class PostsController
{
    protected IRender $render;

    public function __construct(IRender $render)
    {
        $this->render = $render;
    }

    public function runAction($action)
    {
        //$posts = Post::getOne(1);
        //var_dump($posts);
        $method = "action" . ucfirst($action);
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            echo "404!!! -> Нет такого ACtion";
        }
    }

    public function actionIndex()
    {
        $posts = Post::getAll();
        //var_dump($posts);
        //include "../src/views/index.php";
        echo $this->render('posts/index', [
            'posts' => $posts
        ]);
    }

    public function actionShow()
    {
        //http://localhost:8080/?c=posts&a=post
        //http://localhost:8080/?c=posts&a=post&id=2

        $id = (int)$_GET['id'];
        $post = Post::getOne($id);

        echo $this->render('posts/post', [
            'post' => $post
        ]);
    }

    public function render($template, $params = [])
    {
        return $this->renderTemplate('layouts/main', [
            'menu' => $this->renderTemplate('menu'),
            'content' => $this->renderTemplate($template, $params)
        ]);
    }

    public function renderTemplate($template, $params = [])
    {
        return $this->render->renderTemplate($template, $params);
    }
}
