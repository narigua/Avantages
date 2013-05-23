<?php

namespace Avantages\Bundle\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"user" = "User", "partner" = "Partner", "employee" = "Employee", "customer" = "Customer"})
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    protected $civility;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $firstname;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $lastname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $address;

    /**
     * @ORM\Column(type="string", length=100, name="postcode", nullable=true)
     */
    protected $postCode;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $city;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $country;

    /**
     * @ORM\Column(type="string", length=24, nullable=true)
     */
    protected $phone;

    /**
     * @ORM\Column(type="string", length=24, nullable=true)
     */
    protected $phone2;

    public function __toString()
    {
        return sprintf('%s %s',
            $this->getFirstname(),
            $this->getLastname()
        );
    }
}