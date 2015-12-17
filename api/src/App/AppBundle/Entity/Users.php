<?php

namespace App\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="App\AppBundle\Entity\UsersRepository")
 */
class Users
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="hdv", type="string", length=255, nullable=true)
     */
    private $hdv;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255, nullable=true)
     */
    private $firstname;

    /**
     * @var integer
     *
     * @ORM\Column(name="age", type="integer", nullable=true)
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255, nullable=true)
     */
    private $link;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="state", type="integer", nullable=false)
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="leave_reason", type="string", length=255, nullable=true)
     */
    private $leaveReason;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_arrived", type="date", nullable=true)
     */
    private $dateArrived;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="leave_date", type="date", nullable=true)
     */
    private $leaveDate;



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
     * Set username
     *
     * @param string $username
     * @return Users
     */
    public function setUsername($username)
    {
        $this->username = $username;
    
        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set hdv
     *
     * @param string $hdv
     * @return Users
     */
    public function setHdv($hdv)
    {
        $this->hdv = $hdv;
    
        return $this;
    }

    /**
     * Get hdv
     *
     * @return string 
     */
    public function getHdv()
    {
        return $this->hdv;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return Users
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
     * Set age
     *
     * @param integer $age
     * @return Users
     */
    public function setAge($age)
    {
        $this->age = $age;
    
        return $this;
    }

    /**
     * Get age
     *
     * @return integer 
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Users
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
     * Set link
     *
     * @param string $link
     * @return Users
     */
    public function setLink($link)
    {
        $this->link = $link;
    
        return $this;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Users
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set state
     *
     * @param integer $state
     * @return Users
     */
    public function setState($state)
    {
        $this->state = $state;
    
        return $this;
    }

    /**
     * Get state
     *
     * @return integer 
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set leaveReason
     *
     * @param string $leaveReason
     * @return Users
     */
    public function setLeaveReason($leaveReason)
    {
        $this->leaveReason = $leaveReason;
    
        return $this;
    }

    /**
     * Get leaveReason
     *
     * @return string 
     */
    public function getLeaveReason()
    {
        return $this->leaveReason;
    }

    /**
     * Set dateArrived
     *
     * @param \DateTime $dateArrived
     * @return Users
     */
    public function setDateArrived($dateArrived)
    {
        $this->dateArrived = $dateArrived;
    
        return $this;
    }

    /**
     * Get dateArrived
     *
     * @return \DateTime 
     */
    public function getDateArrived()
    {
        return $this->dateArrived;
    }

    /**
     * Set leaveDate
     *
     * @param \DateTime $leaveDate
     * @return Users
     */
    public function setLeaveDate($leaveDate)
    {
        $this->leaveDate = $leaveDate;
    
        return $this;
    }

    /**
     * Get leaveDate
     *
     * @return \DateTime 
     */
    public function getLeaveDate()
    {
        return $this->leaveDate;
    }
}
