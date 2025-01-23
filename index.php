<?php
include "app/Autoload.php";

//spl_autoload_register("loader");
//
// function loader($className)
// {
//     (new Autoload())->loadClass($className);
// }

//use app\{Post,Test};
use app\Post;
use app\Test;
use db\DataBase;

spl_autoload_register([new Autoload(), 'loadClass']);

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