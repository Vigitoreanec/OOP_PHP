<?php

include "vendor/autoload.php";

use Sergey\Oop\Model\Post;

$post = new Post();

var_dump($post);

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