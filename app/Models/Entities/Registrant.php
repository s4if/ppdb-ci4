<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity @ORM\Table(name="registrants")
*/
class Registrant
{
    /**
     * @ORM\Id @ORM\GeneratedValue(strategy="AUTO") @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", nullable=FALSE, length=15, unique=TRUE)
     */
    protected $username;

    /**
     * @ORM\Column(type="string", nullable=FALSE)
     */
    protected $password;

    /**
     * @ORM\Column(type="string", nullable=FALSE)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=10, nullable=FALSE)
     */
    protected $gender; // L = laki2, P = perempuan

    /**
     * @ORM\Column(type="string", nullable=FALSE)
     */
    protected $prev_school;

    /**
     * @ORM\Column(type="string", nullable=TRUE)g
     */
    protected $nisn;

    /**
     * @ORM\Column(type="string", nullable=TRUE)
     */
    protected $contact; // (8/12/2015 : Diganti No. HP)

    /**
     * @ORM\Column(type="string", length=15, nullable=FALSE)
     */
    protected $program; // dari site_config.json

    /**
     * @ORM\Column(type="integer", nullable=FALSE)
     */
    protected $phase; // Gelombang, ambil dari site_config.json

    /**
     * @ORM\Column(type="datetime", nullable=FALSE)
     */
    protected $reg_time;

    /**
     * @ORM\Column(type="boolean", nullable=TRUE)
     */
    protected $is_finalized;

    /**
     * @ORM\Column(type="boolean", nullable=TRUE)
     */
    protected $is_deleted;

    /**
     * @ORM\OneToOne(targetEntity="\Entities\RegistrantDetail", mappedBy="registrant", orphanRemoval=true, cascade={"persist"})
     **/
    protected $registrant_detail;

    /**
     * @ORM\OneToOne(targetEntity="\Entities\Guardian")
     * @ORM\JoinColumn(name="father_id", referencedColumnName="id", nullable=TRUE, onDelete="CASCADE")
     **/
    protected $father;

    /**
     * @ORM\OneToOne(targetEntity="\Entities\Guardian")
     * @ORM\JoinColumn(name="mother_id", referencedColumnName="id", nullable=TRUE, onDelete="CASCADE")
     **/
    protected $mother;

    /**
     * @ORM\OneToOne(targetEntity="\Entities\Guardian")
     * @ORM\JoinColumn(name="guardian_id", referencedColumnName="id", nullable=TRUE, onDelete="CASCADE")
     **/
    protected $guardian;

    public function __construct()
    {
        // nothing...
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     *
     * @return self
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     *
     * @return self
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrevSchool()
    {
        return $this->prev_school;
    }

    /**
     * @param mixed $prev_school
     *
     * @return self
     */
    public function setPrevSchool($prev_school)
    {
        $this->prev_school = $prev_school;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNisn()
    {
        return $this->nisn;
    }

    /**
     * @param mixed $nisn
     *
     * @return self
     */
    public function setNisn($nisn)
    {
        $this->nisn = $nisn;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param mixed $contact
     *
     * @return self
     */
    public function setContact($contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProgram()
    {
        return $this->program;
    }

    /**
     * @param mixed $program
     *
     * @return self
     */
    public function setProgram($program)
    {
        $this->program = $program;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRegTime()
    {
        return $this->reg_time;
    }

    /**
     * @param mixed $reg_time
     *
     * @return self
     */
    public function setRegTime($reg_time)
    {
        $this->reg_time = $reg_time;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsFinalized()
    {
        return $this->is_finalized;
    }

    /**
     * @param mixed $is_finalized
     *
     * @return self
     */
    public function setIsFinalized($is_finalized)
    {
        $this->is_finalized = $is_finalized;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsDeleted()
    {
        return $this->is_deleted;
    }

    /**
     * @param mixed $is_deleted
     *
     * @return self
     */
    public function setIsDeleted($is_deleted)
    {
        $this->is_deleted = $is_deleted;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhase()
    {
        return $this->phase;
    }

    /**
     * @param mixed $phase
     *
     * @return self
     */
    public function setPhase($phase)
    {
        $this->phase = $phase;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRegistrantDetail()
    {
        return $this->registrant_detail;
    }

    /**
     * @param mixed $registrant_detail
     *
     * @return self
     */
    public function setRegistrantDetail(\Entities\RegistrantDetail $registrant_detail)
    {
        $this->registrant_detail = $registrant_detail;

        return $this;
    }
}
