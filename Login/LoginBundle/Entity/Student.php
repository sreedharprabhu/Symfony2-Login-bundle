<?php

namespace Login\LoginBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Student
 */
class Student
{
    /**
     * @var string
     */
    private $studentid;

    /**
     * @var string
     */
    private $firstname;

    /**
     * @var string
     */
    private $lastname;

    /**
     * @var string
     */
    private $gender;

    /**
     * @var string
     */
    private $deptName;

    /**
     * @var string
     */
    private $year;

    /**
     * @var integer
     */
    private $indnum;


    /**
     * Set studentid
     *
     * @param string $studentid
     * @return Student
     */
    public function setStudentid($studentid)
    {
        $this->studentid = $studentid;
    
        return $this;
    }

    /**
     * Get studentid
     *
     * @return string 
     */
    public function getStudentid()
    {
        return $this->studentid;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return Student
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    
        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return Student
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    
        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return Student
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    
        return $this;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set deptName
     *
     * @param string $deptName
     * @return Student
     */
    public function setDeptName($deptName)
    {
        $this->deptName = $deptName;
    
        return $this;
    }

    /**
     * Get deptName
     *
     * @return string 
     */
    public function getDeptName()
    {
        return $this->deptName;
    }

    /**
     * Set year
     *
     * @param string $year
     * @return Student
     */
    public function setYear($year)
    {
        $this->year = $year;
    
        return $this;
    }

    /**
     * Get year
     *
     * @return string 
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Get indnum
     *
     * @return integer 
     */
    public function getIndnum()
    {
        return $this->indnum;
    }
}