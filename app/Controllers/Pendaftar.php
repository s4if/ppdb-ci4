<?php

namespace App\Controllers;

class Pendaftar extends BaseController
{
    private function initEntities()
    {
        $this->user_id = $this->session->user_id;
        $this->registrant = $this->em->find('\\Entities\\Registrant', $this->user_id);
        if (is_null($this)) {
            throw new Exception("Pendaftar dengan ID:".$this->user_id." Tidak Ditemukan!");
        }
    }

    public function index()
    {
        echo 'user:' . $_SESSION['username'];
        echo '<br><a href="'.base_url('/logout').'">Logout</a>';
        echo '<br><a href="'.base_url('/pendaftar/detail').'">Isi Detail</a>';
    }

    public function detail()
    {
        $this->initEntities();
        $detail = $this->registrant->getRegistrantDetail();
        if (is_null($detail)) {
            $detail = new \Entities\RegistrantDetail;
        } 
        return view('pendaftar/detail', [
            'reg' => $this->registrant,
            'data' => $detail->getArray(), // data untuk form
        ]);
    }

    public function isi_detail()
    {
        $this->initEntities();
        $data = $this->request->getPost();

        // process data
        $data['birth_date'] = \DateTime::createFromFormat('Y-m-d', $data['birth_date']);
        $data['hobbies'] = implode(';',$data['hobbies']);
        $data['achievements'] = implode(';',$data['achievements']);
        // end process data

        //var_dump($data);
        $detail = $this->registrant->getRegistrantDetail();
        if (is_null($detail)) {
            $detail = new \Entities\RegistrantDetail;
        }
        $detail->setRegistrant($this->registrant);
        $detail->setArray($data);
        $this->registrant->setRegistrantDetail($detail);
        $this->em->persist($detail);
        $this->em->persist($this->registrant);
        $this->em->flush();
        $this->session->setFlashdata('notif', [[
            'type' => 'success',
            'message' => 'Registrasi Berhasil'
        ]]);
        return redirect()->to('/pendaftar/detail');
    }

    public function coba1()
    {
        $detail = new \Entities\RegistrantDetail;
        $data = $detail->getArray();
        var_dump($data);
    }
}
