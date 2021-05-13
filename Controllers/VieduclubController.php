<?php

namespace App\Controllers;

class VieduclubController extends Controller
{
    public function index()
    {
        $this->render('vieduclub/index');
    }

    public function observatoire()
    {
        $this->render('vieduclub/observatoire');
    }

    public function acces()
    {
        $this->render('vieduclub/acces');
    }
}