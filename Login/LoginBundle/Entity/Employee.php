<?php

namespace Login\LoginBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Employee
 */
class Employee
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $salary;

    /**
     * @var string
     */
    private $position;

    /**
     * @var string
     */
    private $employeeid;


    /**
     * Set name
     *
     * @param string $name
     * @return Employee
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set salary
     *
     * @param float $salary
     * @return Employee
     */
    public function setSalary($salary)
    {
        $this->salary = $salary;
    
        return $this;
    }

    /**
     * Get salary
     *
     * @return float 
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * Set position
     *
     * @param string $position
     * @return Employee
     */
    public function setPosition($position)
    {
        $this->position = $position;
    
        return $this;
    }

    /**
     * Get position
     *
     * @return string 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Get employeeid
     *
     * @return string 
     */
    public function getEmployeeid()
    {
        return $this->employeeid;
    }
}