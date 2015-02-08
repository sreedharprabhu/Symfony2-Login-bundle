<?php

namespace Login\LoginBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Room
 */
class Room
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
     * @var string
     */
    private $type;

    /**
     * @var float
     */
    private $monthlycost;

    /**
     * @var integer
     */
    private $indnum;


    /**
     * Set hallname
     *
     * @param string $hallname
     * @return Room
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
     * @return Room
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
     * Set type
     *
     * @param string $type
     * @return Room
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set monthlycost
     *
     * @param float $monthlycost
     * @return Room
     */
    public function setMonthlycost($monthlycost)
    {
        $this->monthlycost = $monthlycost;
    
        return $this;
    }

    /**
     * Get monthlycost
     *
     * @return float 
     */
    public function getMonthlycost()
    {
        return $this->monthlycost;
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