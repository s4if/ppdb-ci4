<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;


class Auth extends BaseController
{

    public function __construct()
    {
        $this->em = \Config\Services::doctrine();
    }

    public function coba()
    {
        print_r($this->em);
    }

    public function index()
    {
        return view('auth/index', [
            'error' => $this->session->getFlashData('error'),
        ]);
    }
    
    public function login_process()
    {
        $username = $this->request->getPost("username");
        $password = $this->request->getPost("password");
        $registrant = $this->em->getRepository('\\Entities\\Registrant')
            ->findOneBy(array('username' => $username));
        if (is_null($registrant)) {
            $this->session->setFlashdata('error', 'Maaf, username salah!');
            return redirect()->to('/login');
        } else {
            if (password_verify($password, $registrant->getPassword())) {
                $data = [
                    'user_id' => $registrant->getId(),
                    'username' => $username,
                    'logged_in' => True
                ];
                $this->session->set($data);
                return redirect()->to('/home');
            } else {
                $this->session->setFlashdata('error', 'Maaf, password salah!');
                return redirect()->to('/login');
            }
        }
    }

    public function register()
    {
        return view('auth/register', [
            'jurusan' => (array) $this->site_config->jurusan,
            'error' => $this->session->getFlashData('error'),
        ]);
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}