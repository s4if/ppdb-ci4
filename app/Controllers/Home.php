<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo 'user:' . $_SESSION['username'];
        echo '<br><a href="'.base_url().'"/auth/logout">Logount</a>';
    }

    public function welcome()
    {
        return view('welcome_message');
    }

    public function print_config()
    {
        var_dump($this->site_config);
    }
}
