<?php

namespace Chdtu\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", name="first_name", length=50)
     */
    protected $firstName;

    /**
     * @ORM\Column(type="string", name="middle_name", length=70)
     */
    protected $middleName;

    /**
     * @ORM\Column(type="string", name="last_name", length=50)
     */
    protected $lastName;

    /**
     * @ORM\Column(type="integer", length=10)
     */
    protected $mobile;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}
