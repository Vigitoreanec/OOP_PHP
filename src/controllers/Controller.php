<?php

namespace Sergey\Oop\controllers;

use Sergey\Oop\interfaces\IRender;


abstract class Controller
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

    public function render($template, $params = []): string
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
