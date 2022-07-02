<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity @ORM\Table(name="guardians")
*/
class Guardian
{
    /**
     * @ORM\Id @ORM\GeneratedValue(strategy="AUTO") @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", nullable=FALSE)
     */
    protected $type;

    /**
     * @ORM\Column(type="string", nullable=FALSE)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", nullable=FALSE)
     */
    protected $status; //Hidup, Cerai, Almarhum

    /**
     * @ORM\Column(type="string", nullable=FALSE)
     */
    protected $birth_place;

    /**
     * @ORM\Column(type="integer", nullable=FALSE)
     */
    protected $birth_date;

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
     * @ORM\Column(type="string", nullable=TRUE)
     */
    protected $contact; // Nomor Telepon

    /**
     * @ORM\Column(type="string", nullable=FALSE)
     */
    protected $relation; // //Kandung, Tiri, Angkat (ayah & ibu pake radio, tapi wali pake input teks)

    /**
     * @ORM\Column(type="string", length=4, nullable=FALSE)
     */
    protected $nationality;

    /**
     * @ORM\Column(type="string", length=10, nullable=FALSE)
     */
    protected $religion;

    /**
     * @ORM\Column(type="string", length=10, nullable=FALSE)
     */
    protected $education_level; // pendidikan terakhir, sd, smp .. s3

    /**
     * @ORM\Column(type="string", nullable=TRUE)
     */
    protected $job;

    /**
     * @ORM\Column(type="string", nullable=TRUE)
     */
    protected $position;

    /**
     * @ORM\Column(type="string", nullable=TRUE)
     */
    protected $company;

    /**
     * @ORM\Column(type="string", nullable=TRUE)
     */
    protected $income;

    /**
     * @ORM\Column(type="string", nullable=TRUE)
     */
    protected $burden_count; // jumlah tanggungan
}