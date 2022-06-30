<?php

namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Controller;

class Lihat extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        return "Tabel Disini";
    }

    public function get_data($gender = 'any')
    {
        if ($gender == 'any') { 
            $this->query = $this->em->createQuery('select r from \Entities\Registrant r where r.is_deleted = false');
        } else { 
            $this->query = $this->em->createQuery("select r from \Entities\Registrant r where r.is_deleted = false and r.gender = :gender"); 
            $this->query->setParameter('gender', strtoupper($gender));
        }
        $result = $this->query->getResult();
        $data = [];
        $i = 1;
        foreach ($result as $reg) {
            $row = [];
            $row['no'] = $i++;
            $row['id'] = $reg->getId();
            $row['name'] = $reg->getName();
            $row['prev_school'] = $reg->getPrevSchool();
            $row['gender'] = $reg->getGender();
            $row['program'] = $reg->getProgram();
            $data[] = $row;
        }
        //var_dump($data);
        return $this->respond(['data' => $data]);
    }
}
