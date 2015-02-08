<?php

namespace Login\LoginBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Occupy
 */
class Occupy
{
    /**
     * @var string
     */
    private $hallname;

    /**
     * @var float
     */
    private $roomno;

    /**
     * @var \DateTime
     */
    private $year;

    /**
     * @var string
     */
    private $studentno;


    /**
     * Set hallname
     *
     * @param string $hallname
     * @return Occupy
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
     * Set roomno
     *
     * @param float $roomno
     * @return Occupy
     */
    public function setRoomno($roomno)
    {
        $this->roomno = $roomno;
    
        return $this;
    }

    /**
     * Get roomno
     *
     * @return float 
     */
    public function getRoomno()
    {
        return $this->roomno;
    }

    /**
     * Set year
     *
     * @param \DateTime $year
     * @return Occupy
     */
    public function setYear($year)
    {
        $this->year = $year;
    
        return $this;
    }

    /**
     * Get year
     *
     * @return \DateTime 
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set studentno
     *
     * @param string $studentno
     * @return Occupy
     */
    public function setStudentno($studentno)
    {
        $this->studentno = $studentno;
    
        return $this;
    }

    /**
     * Get studentno
     *
     * @return string 
     */
    public function getStudentno()
    {
        return $this->studentno;
    }
    /**
     * @var integer
     */
    private $indnum;


    /**
     * Get indnum
     *
     * @return integer 
     */
    public function getIndnum()
    {
        return $this->indnum;
    }
    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var \DateTime
     */
    private $lastedit;


    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Occupy
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
     * Set lastedit
     *
     * @param \DateTime $lastedit
     * @return Occupy
     */
    public function setLastedit($lastedit)
    {
        $this->lastedit = $lastedit;
    
        return $this;
    }

    /**
     * Get lastedit
     *
     * @return \DateTime 
     */
    public function getLastedit()
    {
        return $this->lastedit;
    }
}