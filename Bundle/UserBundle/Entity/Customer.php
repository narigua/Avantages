<?php

namespace Avantages\Bundle\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Customer extends User
{
    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $birthday;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $newsletter;

    public function __construct()
    {
        parent::__construct();
    }
    
    public function getDefaultRole()
    {
        return 'ROLE_CUSTOMER';
    }

    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     * @return Customer
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    
        return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime 
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set newsletter
     *
     * @param boolean $newsletter
     * @return Customer
     */
    public function setNewsletter($newsletter)
    {
        $this->newsletter = $newsletter;
    
        return $this;
    }

    /**
     * Get newsletter
     *
     * @return boolean 
     */
    public function getNewsletter()
    {
        return $this->newsletter;
    }
}