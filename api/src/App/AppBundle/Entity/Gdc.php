<?php

namespace App\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gdc
 *
 * @ORM\Table(name="gdc")
 * @ORM\Entity(repositoryClass="App\AppBundle\Entity\GdcRepository")
 */
class Gdc
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
     * @ORM\Column(name="enemy_team", type="string", length=50, nullable=false)
     */
    private $enemyTeam;

    /**
     * @var integer
     *
     * @ORM\Column(name="stars", type="integer", nullable=true)
     */
    private $stars;

    /**
     * @var integer
     *
     * @ORM\Column(name="enemy_stars", type="integer", nullable=true)
     */
    private $enemyStars;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;



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
     * Set enemyTeam
     *
     * @param string $enemyTeam
     * @return Gdc
     */
    public function setEnemyTeam($enemyTeam)
    {
        $this->enemyTeam = $enemyTeam;

        return $this;
    }

    /**
     * Get enemyTeam
     *
     * @return string 
     */
    public function getEnemyTeam()
    {
        return $this->enemyTeam;
    }

    /**
     * Set stars
     *
     * @param integer $stars
     * @return Gdc
     */
    public function setStars($stars)
    {
        $this->stars = $stars;

        return $this;
    }

    /**
     * Get stars
     *
     * @return integer 
     */
    public function getStars()
    {
        return $this->stars;
    }

    /**
     * Set enemyStars
     *
     * @param integer $enemyStars
     * @return Gdc
     */
    public function setEnemyStars($enemyStars)
    {
        $this->enemyStars = $enemyStars;

        return $this;
    }

    /**
     * Get enemyStars
     *
     * @return integer 
     */
    public function getEnemyStars()
    {
        return $this->enemyStars;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Gdc
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }
}
