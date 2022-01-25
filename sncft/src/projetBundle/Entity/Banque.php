<?php

namespace projetBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection; 
/**
 * @ORM\Entity
 * @ORM\Table(name="banques")
 */
class Banque
{
    /**
     * @var int
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

   /**
     * @var string
     * @ORM\Column(type="string",unique=true)
     */
    private $code;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $raisonsb;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $codecomptable;
/**
     * @var string
     * @ORM\Column(type="string")
     */
    private $rib;
/**
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    private $etat;

    /**
     * @var date
     * @ORM\Column(type="date")
     */
    private $datecreation;
   
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
     * Set code
     *
     * @param string $code
     *
     * @return Banque
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

/**
     * Set etat
     *
     * @param bool $etat
     *
     * @return Banque
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return bool
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set datecreation
     *
     * @param Date $datecreation
     *
     * @return Banque
     */
    public function setDatecreation($datecreation)
    {
        $this->datecreation =new \DateTime('@'.strtotime('now'));;

        return $this;
    }

    /**
     * Get datecreation
     *
     * @return Date
     */
    public function getDatecreation()
    {
        return $this->datecreation;
    }




    



    /**
     * Set raisonsb
     *
     * @param string $raisonsb
     *
     * @return Banque
     */
    public function setRaisonsb($raisonsb)
    {
        $this->raisonsb = $raisonsb;

        return $this;
    }

    /**
     * Get raisonSB
     *
     * @return string
     */
    public function getRaisonsb()
    {
        return $this->raisonsb;
    }

    /**
     * Set codecomptable
     *
     * @param string $codecomptable
     *
     * @return Banque
     */
    public function setCodecomptable($codecomptable)
    {
        $this->codecomptable = $codecomptable;

        return $this;
    }

    /**
     * Get codecomptable
     *
     * @return string
     */
    public function getCodecomptable()
    {
        return $this->codecomptable;
    }

    /**
     * Set rib
     *
     * @param string $rib
     *
     * @return Banque
     */
    public function setRib($rib)
    {
        $this->rib = $rib;

        return $this;
    }

    /**
     * Get rib
     *
     * @return string
     */
    public function getRib()
    {
        return $this->rib;
    }






    
    /**
     * @ORM\OneToMany(targetEntity=Operation::class,cascade={"persist", "remove"}, mappedBy="banque")
     */

    protected $operations; 
    public function __construct()
    {
        $this->operations = new ArrayCollection();
    }
}

