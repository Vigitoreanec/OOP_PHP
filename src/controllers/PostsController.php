<?php

namespace Sergey\Oop\controllers;

use Sergey\Oop\model\Post;
use Sergey\Oop\model\User;

class PostsController extends Controller
{

    public function actionIndex()
    {
        $posts = Post::getAll();
        //var_dump($posts);
        //include "../src/views/index.php";
        //var_dump($_SESSION);
        $message = $_SESSION['message'] ?? null;
        $_SESSION['message'] = null;

        echo $this->render('posts/index', [
            'posts' => $posts,
            'message' => $message
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

    public function actionSave()
    {
        $title = $_POST['title'];
        $text = $_POST['text'];

        $_SESSION['message'] = null;

        if (empty($title)) {
            $_SESSION['message'] = "Название должно быть заполнено";
            header('Location: /posts');
            exit;
        }


        $post = new Post($title, $text);
        $post->save();


        $_SESSION['message'] = "Post saved";
        header('Location: /posts');
    }

    public function actionDelete()
    {
        if (!User::getUserRole()) {
            $_SESSION['message'] = "Вы не админ";
            header('Location: /posts');
            exit;
        }

        $id = $_GET['id'];
        $post = Post::getOne($id);
        $post->delete();
        $_SESSION['message'] = "Пост удален";
        header('Location: /posts');
    }
}
