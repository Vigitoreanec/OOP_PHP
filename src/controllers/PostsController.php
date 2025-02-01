<?php

namespace Sergey\Oop\controllers;

use Sergey\Oop\model\Post;

class PostsController extends Controller
{

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
}
