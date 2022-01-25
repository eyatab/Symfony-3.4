<?php

namespace projetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Arretcaisse
 *
 * @ORM\Table(name="arretcaisses")
 * @ORM\Entity(repositoryClass="projetBundle\Repository\ArretcaisseRepository")
 */
class Arretcaisse
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datejour", type="date")
     */
    private $datejour;

    /**
     * @var string
     *
     * @ORM\Column(name="montantdeb", type="string", length=255)
     */
    private $montantdeb;
     /**
     * @var bool
     *
     * @ORM\Column(name="arretee", type="boolean")
     */
    private $arretee;
    /**
     * @var string
     *
     * @ORM\Column(name="montantfin", type="string", length=255)
     */
    private $montantfin;

    /**
     * @var string
     *
     * @ORM\Column(name="decai", type="string", length=255)
     */
    
    private $decai;

    /**
     * @var string
     *
     * @ORM\Column(name="encai", type="string", length=255)
     */
    private $encai;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set datejour
     *
     * @param \DateTime $datejour
     *
     * @return Arretcaisse
     */
    public function setDatejour($datejour)
    {
        $this->datejour = $datejour;

        return $this;
    }

    /**
     * Get datejour
     *
     * @return \DateTime
     */
    public function getDatejour()
    {
        return $this->datejour;
    }

    /**
     * Set montantdeb
     *
     * @param string $montantdeb
     *
     * @return Arretcaisse
     */
    public function setMontantdeb($montantdeb)
    {
        $this->montantdeb = $montantdeb;

        return $this;
    }

    /**
     * Get montantdeb
     *
     * @return string
     */
    public function getMontantdeb()
    {
        return $this->montantdeb;
    }

    /**
     * Set montantfin
     *
     * @param string $montantfin
     *
     * @return Arretcaisse
     */
    public function setMontantfin($montantfin)
    {
        $this->montantfin = $montantfin;

        return $this;
    }

    /**
     * Get montantfin
     *
     * @return string
     */
    public function getMontantfin()
    {
        return $this->montantfin;
    }

    /**
     * Set decai
     *
     * @param string $decai
     *
     * @return Arretcaisse
     */
    public function setDecai($decai)
    {
        $this->decai = $decai;

        return $this;
    }

    /**
     * Get decai
     *
     * @return string
     */
    public function getDecai()
    {
        return $this->decai;
    }
    /**
     * Set arretee
     *
     * @param boolean $arretee
     *
     * @return Arretcaisse
     */
    public function setArretee($arretee)
    {
        $this->arretee = $arretee;

        return $this;
    }

    /**
     * Get arretee
     *
     * @return bool
     */
    public function getArretee()
    {
        return $this->arretee;
    }

    /**
     * Set encai
     *
     * @param string $encai
     *
     * @return Arretcaisse
     */
    public function setEncai($encai)
    {
        $this->encai = $encai;

        return $this;
    }

    /**
     * Get encai
     *
     * @return string
     */
    public function getEncai()
    {
        return $this->encai;
    }


    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="arretcaisses")
     * @ORM\JoinColumn(name="caissier_id", referencedColumnName="id")
     */

    protected $user;
     /**
     * Set user
     *
     * @param $user
     *
     * @return Arretcaisse
     */
    public function setUserId($user=null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return User
     */
    public function getUserId()
    {
        return $this->user;
    }






}

