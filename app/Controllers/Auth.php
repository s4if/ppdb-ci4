<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;


class Auth extends BaseController
{

    public function index()
    {
        return view('auth/index', [
            'notif' => $this->session->getFlashData('notif'),
        ]);
    }
    
    public function login_process()
    {
        $username = $this->request->getPost("username");
        $password = $this->request->getPost("password");
        $registrant = $this->em->getRepository('\\Entities\\Registrant')
            ->findOneBy(array('username' => $username));
        if (is_null($registrant)) {
            $this->session->setFlashdata('notif', [[
                'type' => 'error',
                'message' => 'Maaf, username salah!'
            ]]);
            return redirect()->to('/login');
        } else {
            if (password_verify($password, $registrant->getPassword())) {
                $data = [
                    'user_id' => $registrant->getId(),
                    'username' => $username,
                    'logged_in' => True
                ];
                $this->session->set($data);
                $this->session->setFlashdata('notif', [[
                    'type' => 'success',
                    'message' => 'Selamat, anda berhasil login!'
                ]]);
                return redirect()->to('/pendaftar');
            } else {
                $this->session->setFlashdata('notif', [[
                    'type' => 'error',
                    'message' => 'Maaf, password salah!'
                ]]);
                return redirect()->to('/login');
            }
        }
    }

    public function register()
    {
        return view('auth/register', [
            'jurusan' => (array) $this->site_config->jurusan,
            'notif' => $this->session->getFlashData('notif'),
        ]);
    }

    public function register_process()
    {
        $reg = new \Entities\Registrant;
        $reg->setUsername($this->request->getPost("username"));
        $reg->setPassword(password_hash($this->request->getPost("password"), PASSWORD_DEFAULT));
        $reg->setName($this->request->getPost("name"));
        $reg->setGender($this->request->getPost("gender"));
        $reg->setPrevSchool($this->request->getPost("prev_school"));
        $reg->setNisn($this->request->getPost("nisn"));
        $reg->setContact($this->request->getPost("contact"));
        $reg->setProgram($this->request->getPost("program"));
        $reg->setRegTime((new \DateTime('now')));
        $reg->setIsFinalized(False);
        $reg->setIsDeleted(False);
        try {
            $this->em->persist($reg);
            $this->em->flush();
        } catch (\Doctrine\DBAL\Exception\UniqueConstraintViolationException $e) {
            $this->session->setFlashdata('notif', [[
                    'type' => 'error',
                    'message' => 'Maaf, Username Sudah Digunakan!'
                ]]);
            return redirect()->to('/register');
        }
        $this->session->setFlashdata('notif', [[
            'type' => 'success',
            'message' => 'Registrasi Berhasil'
        ]]);
        return redirect()->to('/login');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}