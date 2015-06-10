<?php

namespace Chdtu\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @UniqueEntity("email")
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\OneToMany(targetEntity="Chdtu\UserBundle\Entity\ChdtuGroup", mappedBy="curator")
     * @ORM\OneToMany(targetEntity="Chdtu\MainBundle\Entity\SubjectMap", mappedBy="student")
     * @ORM\OneToMany(targetEntity="Chdtu\MainBundle\Entity\SubjectMap", mappedBy="teacher")
     *
     */
    protected $id;

    /**
     * @Assert\NotBlank()
     */
    protected $username;

    /**
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    protected $email;

    /**
     * @Assert\NotBlank()
     */
    protected $plainPassword;

    /**
     * @ORM\Column(type="string", name="first_name", length=50)
     * @Assert\NotBlank()
     */
    protected $firstName;

    /**
     * @ORM\Column(type="string", name="middle_name", length=70)
     * @Assert\NotBlank()
     */
    protected $middleName;

    /**
     * @ORM\Column(type="string", name="last_name", length=50)
     * @Assert\NotBlank()
     */
    protected $lastName;

    /**
     * @ORM\Column(type="integer", length=10, nullable=true)
     */
    protected $mobile;

    /**
     * @ORM\ManyToOne(targetEntity="Chdtu\UserBundle\Entity\ChdtuGroup", inversedBy="students")
     * @ORM\JoinColumn(name="group_id", referencedColumnName="id")
     */
    protected $group;


    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set middleName
     *
     * @param string $middleName
     * @return User
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;

        return $this;
    }

    /**
     * Get middleName
     *
     * @return string 
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set mobile
     *
     * @param integer $mobile
     * @return User
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return integer 
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set group
     *
     * @param \Chdtu\UserBundle\Entity\ChdtuGroup $group
     * @return User
     */
    public function setGroup(\Chdtu\UserBundle\Entity\ChdtuGroup $group = null)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * Get group
     *
     * @return \Chdtu\UserBundle\Entity\ChdtuGroup 
     */
    public function getGroup()
    {
        return $this->group;
    }

    public function fullName () {
        return $this->lastName . ' ' . $this->firstName . ' ' . $this->middleName;
    }
}
