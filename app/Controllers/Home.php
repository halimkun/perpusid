<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            "title"         => "Home | PERPUSID",
            'uagent' => $this->request->getUserAgent()
        ];
        return view('public/index', $data);
    }
}
