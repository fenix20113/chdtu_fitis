<?php

namespace Chdtu\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SubjectMap
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Chdtu\MainBundle\Entity\SubjectMapRepository")
 */
class SubjectMap
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
     * @ORM\ManyToOne(targetEntity="Chdtu\MainBundle\Entity\Subject", inversedBy="id")
     */
    private $subject;

    /**
     * @var string
     *
     * @ORM\Column(name="mark", type="string", length=255)
     */
    private $mark;

    /**
     * @ORM\ManyToOne(targetEntity="Chdtu\UserBundle\Entity\User", inversedBy="id")
     */
    private $student;

    /**
     * @ORM\ManyToOne(targetEntity="Chdtu\UserBundle\Entity\User", inversedBy="id")
     */
    private $teacher;


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
     * Set subject
     *
     * @param string $subject
     * @return SubjectMap
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string 
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set mark
     *
     * @param string $mark
     * @return SubjectMap
     */
    public function setMark($mark)
    {
        $this->mark = $mark;

        return $this;
    }

    /**
     * Get mark
     *
     * @return string 
     */
    public function getMark()
    {
        return $this->mark;
    }

    /**
     * Set student
     *
     * @param string $student
     * @return SubjectMap
     */
    public function setStudent($student)
    {
        $this->student = $student;

        return $this;
    }

    /**
     * Get student
     *
     * @return string 
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * Set teacher
     *
     * @param integer $teacher
     * @return SubjectMap
     */
    public function setTeacher($teacher)
    {
        $this->teacher = $teacher;

        return $this;
    }

    /**
     * Get teacher
     *
     * @return integer 
     */
    public function getTeacher()
    {
        return $this->teacher;
    }
}
