<?php

namespace Login\LoginBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Finance
 */
class Finance
{
    /**
     * @var float
     */
    private $balance;

    /**
     * @var string
     */
    private $studentno;


    /**
     * Set balance
     *
     * @param float $balance
     * @return Finance
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;
    
        return $this;
    }

    /**
     * Get balance
     *
     * @return float 
     */
    public function getBalance()
    {
        return $this->balance;
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
}