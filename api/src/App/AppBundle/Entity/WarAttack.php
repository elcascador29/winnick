<?php

namespace App\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WarAttack
 *
 * @ORM\Table(name="war_attack", indexes={@ORM\Index(name="id_gdc", columns={"id_gdc"}), @ORM\Index(name="id_user", columns={"id_user"})})
 * @ORM\Entity(repositoryClass="App\AppBundle\Entity\WarAttackRepository")
 */
class WarAttack
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
     * @var integer
     *
     * @ORM\Column(name="first_attack", type="integer", nullable=true)
     */
    private $firstAttack;

    /**
     * @var integer
     *
     * @ORM\Column(name="second_attack", type="integer", nullable=true)
     */
    private $secondAttack;

    /**
     * @var string
     *
     * @ORM\Column(name="strategy", type="string", length=50, nullable=true)
     */
    private $strategy;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cdc_full", type="boolean", nullable=true)
     */
    private $cdcFull;

    /**
     * @var integer
     *
     * @ORM\Column(name="enemy_position", type="integer", nullable=true)
     */
    private $enemyPosition;

    /**
     * @var integer
     *
     * @ORM\Column(name="enemy_position2", type="integer", nullable=true)
     */
    private $enemyPosition2;

    /**
     * @var string
     *
     * @ORM\Column(name="strategy2", type="string", length=50, nullable=true)
     */
    private $strategy2;

    /**
     * @var \Gdc
     *
     * @ORM\ManyToOne(targetEntity="Gdc")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_gdc", referencedColumnName="id")
     * })
     */
    private $idGdc;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $idUser;



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
     * Set firstAttack
     *
     * @param boolean $firstAttack
     * @return WarAttack
     */
    public function setFirstAttack($firstAttack)
    {
        $this->firstAttack = $firstAttack;
    
        return $this;
    }

    /**
     * Get firstAttack
     *
     * @return boolean 
     */
    public function getFirstAttack()
    {
        return $this->firstAttack;
    }

    /**
     * Set secondAttack
     *
     * @param boolean $secondAttack
     * @return WarAttack
     */
    public function setSecondAttack($secondAttack)
    {
        $this->secondAttack = $secondAttack;
    
        return $this;
    }

    /**
     * Get secondAttack
     *
     * @return boolean 
     */
    public function getSecondAttack()
    {
        return $this->secondAttack;
    }

    /**
     * Set strategy
     *
     * @param string $strategy
     * @return WarAttack
     */
    public function setStrategy($strategy)
    {
        $this->strategy = $strategy;
    
        return $this;
    }

    /**
     * Get strategy
     *
     * @return string 
     */
    public function getStrategy()
    {
        return $this->strategy;
    }

    /**
     * Set cdcFull
     *
     * @param boolean $cdcFull
     * @return WarAttack
     */
    public function setCdcFull($cdcFull)
    {
        $this->cdcFull = $cdcFull;
    
        return $this;
    }

    /**
     * Get cdcFull
     *
     * @return boolean 
     */
    public function getCdcFull()
    {
        return $this->cdcFull;
    }

    /**
     * Set enemyPosition
     *
     * @param integer $enemyPosition
     * @return WarAttack
     */
    public function setEnemyPosition($enemyPosition)
    {
        $this->enemyPosition = $enemyPosition;
    
        return $this;
    }

    /**
     * Get enemyPosition
     *
     * @return integer 
     */
    public function getEnemyPosition()
    {
        return $this->enemyPosition;
    }

    /**
     * Set enemyPosition2
     *
     * @param integer $enemyPosition2
     * @return WarAttack
     */
    public function setEnemyPosition2($enemyPosition2)
    {
        $this->enemyPosition2 = $enemyPosition2;
    
        return $this;
    }

    /**
     * Get enemyPosition2
     *
     * @return integer 
     */
    public function getEnemyPosition2()
    {
        return $this->enemyPosition2;
    }

    /**
     * Set strategy2
     *
     * @param string $strategy2
     * @return WarAttack
     */
    public function setStrategy2($strategy2)
    {
        $this->strategy2 = $strategy2;
    
        return $this;
    }

    /**
     * Get strategy2
     *
     * @return string 
     */
    public function getStrategy2()
    {
        return $this->strategy2;
    }

    /**
     * Set idGdc
     *
     * @param \App\AppBundle\Entity\Gdc $idGdc
     * @return WarAttack
     */
    public function setIdGdc(\App\AppBundle\Entity\Gdc $idGdc = null)
    {
        $this->idGdc = $idGdc;
    
        return $this;
    }

    /**
     * Get idGdc
     *
     * @return \App\AppBundle\Entity\Gdc 
     */
    public function getIdGdc()
    {
        return $this->idGdc;
    }

    /**
     * Set idUser
     *
     * @param \App\AppBundle\Entity\Users $idUser
     * @return WarAttack
     */
    public function setIdUser(\App\AppBundle\Entity\Users $idUser = null)
    {
        $this->idUser = $idUser;
    
        return $this;
    }

    /**
     * Get idUser
     *
     * @return \App\AppBundle\Entity\Users 
     */
    public function getIdUser()
    {
        return $this->idUser;
    }
}
