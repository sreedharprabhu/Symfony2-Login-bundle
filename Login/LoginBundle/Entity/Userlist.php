<?php

namespace Login\LoginBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Userlist
 */
class Userlist
{
    /**
     * @var string
     */
    private $position;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $userid;


    /**
     * Set position
     *
     * @param string $position
     * @return Userlist
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
     * Set password
     *
     * @param string $password
     * @return Userlist
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get userid
     *
     * @return string 
     */
    public function getUserid()
    {
        return $this->userid;
    }
}