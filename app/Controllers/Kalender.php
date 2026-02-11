<?php

namespace App\Controllers;

class Kalender extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Kalender Akademik'
        ];
        return view('kalender/index', $data);
    }
}