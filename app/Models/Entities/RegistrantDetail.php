<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity @ORM\Table(name="detail_registrants")
*/
class RegistrantDetail
{
    /**
     * @ORM\Id @ORM\GeneratedValue(strategy="AUTO") @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="\Entities\Registrant", inversedBy="registrant_detail", cascade={"persist"})
     **/
    protected $registrant;

    /**
     * @ORM\Column(type="string", length=60, nullable=FALSE)
     */
    protected $nik; #nomor induk kependudukan

    /**
     * @ORM\Column(type="string", length=60, nullable=FALSE)
     */
    protected $nkk; #nomor kartu keluarga

    /**
     * @ORM\Column(type="string", nullable=FALSE)
     */
    protected $nak; #nomor akte Kelahiran

    /**
     * @ORM\Column(type="string", nullable=FALSE)
     */
    protected $birth_place;

    /**
     * @ORM\Column(type="date", nullable=FALSE)
     */
    protected $birth_date;

    /**
     * @ORM\Column(type="string", nullable=FALSE)
     */
    protected $child_order; // Anak Ke...

    /**
     * @ORM\Column(type="string", nullable=FALSE)
     */
    protected $siblings_count; // sekarang, jumlah saudara + si pendaftar

    /**
     * @ORM\Column(type="string", nullable=FALSE)
     */
    protected $street; // Dusun atau Jalan

    /**
     * @ORM\Column(type="integer", nullable=FALSE)
     */
    protected $rt; // RT

    /**
     * @ORM\Column(type="integer", nullable=FALSE)
     */
    protected $rw; // RW

    /**
     * @ORM\Column(type="string", nullable=FALSE)
     */
    protected $village; // Desa / Kelurahan

    /**
     * @ORM\Column(type="string", nullable=FALSE)
     */
    protected $district; // Kecamatan

    /**
     * @ORM\Column(type="string", nullable=FALSE)
     */
    protected $city; // Kota / kabupaten

    /**
     * @ORM\Column(type="string", nullable=FALSE)
     */
    protected $province; // provinsi

    /**
     * @ORM\Column(type="string", nullable=FALSE)
     */
    protected $country; // negara

    /**
     * @ORM\Column(type="string", nullable=FALSE)
     */
    protected $postal_code;

    /**
     * @ORM\Column(type="string", nullable=FALSE)
     */
    protected $family_condition; //NOTE : Ini isinya ortu lengkap, yatim, piatu, yatim piatu,
    // tambah: cerai ikut ayah, cerai ikut ibu,

    /**
     * @ORM\Column(type="string", length=4, nullable=FALSE)
     */
    protected $nationality;

    /**
     * @ORM\Column(type="string", length=10, nullable=FALSE)
     */
    protected $religion;

    /**
     * @ORM\Column(type="string", length=1024, nullable=TRUE)
     */
    protected $hospital_sheets; // catatan penyakit

    /**
     * @ORM\Column(type="string", length=1024, nullable=TRUE)
     */
    protected $physical_abnormalities; // catatan cacat

    /**
     * @ORM\Column(type="integer", nullable=FALSE)
     */
    protected $height;

    /**
     * @ORM\Column(type="integer", nullable=FALSE)
     */
    protected $weight;

    /**
     * @ORM\Column(type="integer", nullable=FALSE)
     */
    protected $head_size; // linkar kepala

    /**
     * @ORM\Column(type="string", nullable=FALSE)
     */
    protected $stay_with; // NOTE: Tinggal dengan siapa

    /**
     * @ORM\Column(type="string", length=1024, nullable=TRUE)
     */
    protected $hobbies;

    /**
     * @ORM\Column(type="string", length=1024, nullable=TRUE)
     */
    protected $achievements;

    public function initArray()
    {
        $this->property_list = [
            //'id', // id jangan diambil pakai array
            //'registrant',
            'nik',
            'nkk',
            'nak',
            'birth_place',
            'birth_date',
            'child_order',
            'siblings_count',
            'street',
            'rt',
            'rw',
            'village',
            'district',
            'city',
            'province',
            'country',
            'postal_code',
            'family_condition',
            'nationality',
            'religion',
            'hospital_sheets',
            'physical_abnormalities',
            'height',
            'weight',
            'head_size',
            'stay_with',
            'hobbies',
            'achievements',
        ]; // selalu diupdate, accessible properties
    }

    public function get($prop)
    {
        $this->initArray();
        if (in_array($prop, $this->property_list)) {
            return $this->$prop;
        } else {
            throw new Exception("Properties Not Found in This Entities!");
        }
    }

    public function set($prop, $value){ // return object
        $this->initArray();
        if (in_array($prop, $this->property_list)) {
            $this->prop = $value;
            return $this;
        } else {
            throw new Exception("Properties Not Found in This Entities!");
        }
    }

    public function getArray($keys = null){
        $this->initArray();
        if (is_null($keys)) {
            $keys = $this->property_list;
        }
        $data = [];
        foreach($keys as $key){
            if (in_array($key, $this->property_list)) {
                $data[$key] = $this->$key;
            } else {
                throw new Exception("Properties Not Found in This Entities!");
            }
        }
        return $data;
    }

    public function setArray($arr_value){
        $this->initArray();
        foreach ($arr_value as $key => $value) {
            if (in_array($key, $this->property_list)) {
                $this->$key = $value;
            }
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getRegistrant()
    {
        return $this->registrant;
    }

    public function setRegistrant(\Entities\Registrant $registrant)
    {
        $this->registrant = $registrant;

        return $this;
    }
}