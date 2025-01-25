<?php

include "vendor/autoload.php";

use Sergey\Oop\Model\Post;
use Sergey\Oop\Model\User;
use Sergey\Oop\Model\Category;

$user = new User();
$post = new Post();
$category = new Category();

print_r($post->getAll());
print_r($category->getAll());
print_r($category->getOne(12));







// $db = new DataBase();
// $post = new Post($db);
// $user = new User($db);
// //$post = $post->getOne(1);
// $post = $post->query()->where('id', '123')->get();
// $user = $user->getOne(1);
// //$post = $post->getAll();
// print_r($post);

// var_dump($user);


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