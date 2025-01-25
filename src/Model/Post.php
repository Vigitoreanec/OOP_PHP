<?php
namespace Sergey\Oop\Model;

class Post extends Model
{
    public int $id;
    public string $title;
    public string $text;

    protected string $tableName = "posts";
}