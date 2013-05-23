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

    public function __toString()
    {
        return $this->getName();
    }
}