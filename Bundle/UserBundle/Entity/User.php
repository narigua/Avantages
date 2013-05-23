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

    public function __construct()
    {
        parent::__construct();
        $this->addRole($this->getDefaultRole());
    }

    public function __toString()
    {
        return sprintf('%s %s',
            $this->getFirstname(),
            $this->getLastname()
        );
    }

    public function getDefaultRole()
    {
        return 'ROLE_USER';
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set civility
     *
     * @param string $civility
     * @return User
     */
    public function setCivility($civility)
    {
        $this->civility = $civility;
    
        return $this;
    }

    /**
     * Get civility
     *
     * @return string 
     */
    public function getCivility()
    {
        return $this->civility;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    
        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    
        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return User
     */
    public function setAddress($address)
    {
        $this->address = $address;
    
        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set postCode
     *
     * @param string $postCode
     * @return User
     */
    public function setPostCode($postCode)
    {
        $this->postCode = $postCode;
    
        return $this;
    }

    /**
     * Get postCode
     *
     * @return string 
     */
    public function getPostCode()
    {
        return $this->postCode;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return User
     */
    public function setCity($city)
    {
        $this->city = $city;
    
        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return User
     */
    public function setCountry($country)
    {
        $this->country = $country;
    
        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    
        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set phone2
     *
     * @param string $phone2
     * @return User
     */
    public function setPhone2($phone2)
    {
        $this->phone2 = $phone2;
    
        return $this;
    }

    /**
     * Get phone2
     *
     * @return string 
     */
    public function getPhone2()
    {
        return $this->phone2;
    }

    public function toggleActivation()
    {
        if ($this->isEnabled()) {
            $this->setEnabled(false);

            return false;
        } else {
            $this->setEnabled(true);

            return true;
        }
    }
}