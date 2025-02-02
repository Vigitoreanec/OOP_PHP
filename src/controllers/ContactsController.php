<?php

namespace Sergey\Oop\controllers;

class ContactsController extends Controller
{
    public function actionIndex()
    {
        $message = "112 , 02";
        echo $this->render('contacts/index', [
            'message' => $message
        ]);
    }
}
