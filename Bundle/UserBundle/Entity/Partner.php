<?php

namespace Avantages\Bundle\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Partner extends User
{
    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $rcs;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $capital;

    public function __construct()
    {
        parent::__construct();
    }

    public function getDefaultRole()
    {
        return 'ROLE_PARTNER';
    }

    public function __toString()
    {
        return $this->getName();
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Partner
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
     * Set rcs
     *
     * @param string $rcs
     * @return Partner
     */
    public function setRcs($rcs)
    {
        $this->rcs = $rcs;
    
        return $this;
    }

    /**
     * Get rcs
     *
     * @return string 
     */
    public function getRcs()
    {
        return $this->rcs;
    }

    /**
     * Set capital
     *
     * @param string $capital
     * @return Partner
     */
    public function setCapital($capital)
    {
        $this->capital = $capital;
    
        return $this;
    }

    /**
     * Get capital
     *
     * @return string 
     */
    public function getCapital()
    {
        return $this->capital;
    }
}