<?php

namespace Sergey\Oop\controllers;

use Sergey\Oop\model\Post;


class PostsController
{

    public function runAction($action)
    {
        //$posts = Post::getOne(1);
        //var_dump($posts);
        $method = "action" . ucfirst($action);
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            echo "404 -> Нет такого ACtion";
        }
    }

    public function actionIndex()
    {
        $posts = Post::getAll();
        //var_dump($posts);
        //include "../src/views/index.php";
        $this->renderTemplate('index', [
            'posts' => $posts
        ]);
    }

    public function actionPost()
    {
        //http://localhost:8080/?c=posts&a=post
        //http://localhost:8080/?c=posts&a=post&id=2

        $id = (int)$_GET['id'];
        $post = Post::getOne($id);
        echo $this->renderTemplate('post', [
            'title' => $post->title,
            'text' => $post->text
        ]);
    }

    public function renderTemplate($template, $params = [])
    {
        ob_clean();
        extract($params);
        include "../src/views/" . $template . ".php";
        return ob_get_clean();
    }
}
