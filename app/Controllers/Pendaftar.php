<?php

namespace App\Controllers;

class Pendaftar extends BaseController
{
    public function index()
    {
        echo 'user:' . $_SESSION['username'];
        echo '<br><a href="'.base_url().'/auth/logout">Logout</a>';
    }
}
