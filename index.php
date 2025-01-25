<?php

include "vendor/autoload.php";

use Sergey\Oop\Model\Post;
use Sergey\Oop\Model\User;
use Sergey\Oop\core\DataBase;


$db = new DataBase();
$post = new Post($db );
$user = new User($db );
//$post = $post->getOne(1);
$user = $user->getOne(1);
$post = $post->getAll();
var_dump($post);
var_dump($user);
var_dump($db);

// AR CRUD над одной записью в БД через ООП
/*
// C -> Create

$post = new Post("post");

$post->insert();

// R -> Read
$post = Post::get($id);

// U -> Update
$post->title = "new";
$post->update();

//$post->save();

// D -> Delete
$post->delete();
*/