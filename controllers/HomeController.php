<?php

namespace app\controllers;

use app\core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $this->view("home", "auth", null);
    }
    public function aboutUs()
    {
        $this->view("about", "auth", null);
    }
    public function slike()
    {
        $this->view("slike", "visual", null);
    }

    public function authorize()
    {
        return [

        ];
    }
}