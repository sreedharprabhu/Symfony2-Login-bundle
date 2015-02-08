<?php

namespace Login\LoginBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Work
 */
class Work
{
    /**
     * @var string
     */
    private $hallname;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var string
     */
    private $employeeid;


    /**
     * Set hallname
     *
     * @param string $hallname
     * @return Work
     */
    public function setHallname($hallname)
    {
        $this->hallname = $hallname;
    
        return $this;
    }

    /**
     * Get hallname
     *
     * @return string 
     */
    public function getHallname()
    {
        return $this->hallname;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Work
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set employeeid
     *
     * @param string $employeeid
     * @return Work
     */
    public function setEmployeeid($employeeid)
    {
        $this->employeeid = $employeeid;
    
        return $this;
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