<?php

namespace Login\LoginBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hall
 */
class Hall
{
    /**
     * @var string
     */
    private $hallname;

    /**
     * @var integer
     */
    private $capacity;

    /**
     * @var string
     */
    private $gender;

    /**
     * @var integer
     */
    private $indnum;


    /**
     * Set hallname
     *
     * @param string $hallname
     * @return Hall
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
     * Set capacity
     *
     * @param integer $capacity
     * @return Hall
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;
    
        return $this;
    }

    /**
     * Get capacity
     *
     * @return integer 
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return Hall
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
     * Get indnum
     *
     * @return integer 
     */
    public function getIndnum()
    {
        return $this->indnum;
    }
}