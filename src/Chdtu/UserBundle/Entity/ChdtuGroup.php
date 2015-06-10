<?php

namespace Chdtu\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * ChdtuGroup
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Chdtu\UserBundle\Entity\ChdtuGroupRepository")
 */
class ChdtuGroup
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="group_name", type="string", length=255)
     */
    private $groupName;


    /**
     * @ORM\OneToMany(targetEntity="Chdtu\UserBundle\Entity\User", mappedBy="group")
     */
    private $students;

    /**
     * @ORM\ManyToOne(targetEntity="Chdtu\UserBundle\Entity\User", inversedBy="id")
     */
    private $curator;



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
     * Set groupName
     *
     * @param string $groupName
     * @return ChdtuGroup
     */
    public function setGroupName($groupName)
    {
        $this->groupName = $groupName;

        return $this;
    }

    /**
     * Get groupName
     *
     * @return string 
     */
    public function getGroupName()
    {
        return $this->groupName;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->students = new ArrayCollection();
    }

    /**
     * Add students
     *
     * @param \Chdtu\UserBundle\Entity\User $students
     * @return ChdtuGroup
     */
    public function addStudent(\Chdtu\UserBundle\Entity\User $students)
    {
        $this->students[] = $students;

        return $this;
    }

    /**
     * Remove students
     *
     * @param \Chdtu\UserBundle\Entity\User $students
     */
    public function removeStudent(\Chdtu\UserBundle\Entity\User $students)
    {
        $this->students->removeElement($students);
    }

    /**
     * Get students
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStudents()
    {
        return $this->students;
    }

    /**
     * Set curator
     *
     * @param \Chdtu\UserBundle\Entity\User $curator
     * @return ChdtuGroup
     */
    public function setCurator(\Chdtu\UserBundle\Entity\User $curator = null)
    {
        $this->curator = $curator;

        return $this;
    }

    /**
     * Get curator
     *
     * @return \Chdtu\UserBundle\Entity\User 
     */
    public function getCurator()
    {
        return $this->curator;
    }

}
