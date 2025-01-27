<?php

include "vendor/autoload.php";

use Sergey\Oop\Model\Post;
use Sergey\Oop\Model\User;
use Sergey\Oop\Model\Category;

//$user = new User();
//$post = new Post();
//$category = Category::getOne(5);

//print_r($post->getAll());

//print_r($category);
//print_r($category->getAll());


$post = new Post("Title 20", "Text ddsgd", 6);
$post->insertModel();


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