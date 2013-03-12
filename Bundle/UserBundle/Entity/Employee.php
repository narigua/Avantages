<?php

namespace Avantages\Bundle\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Employee extends User
{
    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $poste;

    public function __construct()
    {
        parent::__construct();
    }

    public function getDefaultRole()
    {
        return 'ROLE_EMPLOYEE';
    }

    /**
     * Set poste
     *
     * @param string $poste
     * @return Employee
     */
    public function setPoste($poste)
    {
        $this->poste = $poste;
    
        return $this;
    }

    /**
     * Get poste
     *
     * @return string 
     */
    public function getPoste()
    {
        return $this->poste;
    }
}