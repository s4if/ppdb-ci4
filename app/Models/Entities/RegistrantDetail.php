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

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRegistrant()
    {
        return $this->registrant;
    }

    /**
     * @param mixed $registrant
     *
     * @return self
     */
    public function setRegistrant($registrant)
    {
        $this->registrant = $registrant;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNik()
    {
        return $this->nik;
    }

    /**
     * @param mixed $nik
     *
     * @return self
     */
    public function setNik($nik)
    {
        $this->nik = $nik;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNkk()
    {
        return $this->nkk;
    }

    /**
     * @param mixed $nkk
     *
     * @return self
     */
    public function setNkk($nkk)
    {
        $this->nkk = $nkk;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNak()
    {
        return $this->nak;
    }

    /**
     * @param mixed $nak
     *
     * @return self
     */
    public function setNak($nak)
    {
        $this->nak = $nak;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBirthPlace()
    {
        return $this->birth_place;
    }

    /**
     * @param mixed $birth_place
     *
     * @return self
     */
    public function setBirthPlace($birth_place)
    {
        $this->birth_place = $birth_place;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBirthDate()
    {
        return $this->birth_date;
    }

    /**
     * @param mixed $birth_date
     *
     * @return self
     */
    public function setBirthDate($birth_date)
    {
        $this->birth_date = $birth_date;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getChildOrder()
    {
        return $this->child_order;
    }

    /**
     * @param mixed $child_order
     *
     * @return self
     */
    public function setChildOrder($child_order)
    {
        $this->child_order = $child_order;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSiblingsCount()
    {
        return $this->siblings_count;
    }

    /**
     * @param mixed $siblings_count
     *
     * @return self
     */
    public function setSiblingsCount($siblings_count)
    {
        $this->siblings_count = $siblings_count;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param mixed $street
     *
     * @return self
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRt()
    {
        return $this->rt;
    }

    /**
     * @param mixed $rt
     *
     * @return self
     */
    public function setRt($rt)
    {
        $this->rt = $rt;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRw()
    {
        return $this->rw;
    }

    /**
     * @param mixed $rw
     *
     * @return self
     */
    public function setRw($rw)
    {
        $this->rw = $rw;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVillage()
    {
        return $this->village;
    }

    /**
     * @param mixed $village
     *
     * @return self
     */
    public function setVillage($village)
    {
        $this->village = $village;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * @param mixed $district
     *
     * @return self
     */
    public function setDistrict($district)
    {
        $this->district = $district;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     *
     * @return self
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * @param mixed $province
     *
     * @return self
     */
    public function setProvince($province)
    {
        $this->province = $province;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     *
     * @return self
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPostalCode()
    {
        return $this->postal_code;
    }

    /**
     * @param mixed $postal_code
     *
     * @return self
     */
    public function setPostalCode($postal_code)
    {
        $this->postal_code = $postal_code;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFamilyCondition()
    {
        return $this->family_condition;
    }

    /**
     * @param mixed $family_condition
     *
     * @return self
     */
    public function setFamilyCondition($family_condition)
    {
        $this->family_condition = $family_condition;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * @param mixed $nationality
     *
     * @return self
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getReligion()
    {
        return $this->religion;
    }

    /**
     * @param mixed $religion
     *
     * @return self
     */
    public function setReligion($religion)
    {
        $this->religion = $religion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHospitalSheets()
    {
        return $this->hospital_sheets;
    }

    /**
     * @param mixed $hospital_sheets
     *
     * @return self
     */
    public function setHospitalSheets($hospital_sheets)
    {
        $this->hospital_sheets = $hospital_sheets;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhysicalAbnormalities()
    {
        return $this->physical_abnormalities;
    }

    /**
     * @param mixed $physical_abnormalities
     *
     * @return self
     */
    public function setPhysicalAbnormalities($physical_abnormalities)
    {
        $this->physical_abnormalities = $physical_abnormalities;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param mixed $height
     *
     * @return self
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     *
     * @return self
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHeadSize()
    {
        return $this->head_size;
    }

    /**
     * @param mixed $head_size
     *
     * @return self
     */
    public function setHeadSize($head_size)
    {
        $this->head_size = $head_size;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStayWith()
    {
        return $this->stay_with;
    }

    /**
     * @param mixed $stay_with
     *
     * @return self
     */
    public function setStayWith($stay_with)
    {
        $this->stay_with = $stay_with;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHobbies()
    {
        return $this->hobbies;
    }

    /**
     * @param mixed $hobbies
     *
     * @return self
     */
    public function setHobbies($hobbies)
    {
        $this->hobbies = $hobbies;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAchievements()
    {
        return $this->achievements;
    }

    /**
     * @param mixed $achievements
     *
     * @return self
     */
    public function setAchievements($achievements)
    {
        $this->achievements = $achievements;

        return $this;
    }
}