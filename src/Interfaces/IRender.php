<?php

namespace Sergey\Oop\interfaces;

interface IRender
{
    public function renderTemplate($template, $params = []);
}