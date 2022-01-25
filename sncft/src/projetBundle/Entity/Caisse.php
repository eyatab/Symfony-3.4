<?php

namespace projetBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * @ORM\Entity
 * @ORM\Table(name="caisses")
 * @ORM\Entity(repositoryClass="projetBundle\Repository\CaisseRepository")
 */
class Caisse
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
    private $nom;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $compte;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $montant;

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
     * @return Caisse
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Caisse
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }


/**
     * Set etat
     *
     * @param bool etat
     *
     * @return Caisse
     */
    public function setEtat($etat)
    {
        $this->etat= $etat;

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
     * Set compte
     *
     * @param string $compte
     *
     * @return Caisse
     */
    public function setCompte($compte)
    {
        $this->compte = $compte;

        return $this;
    }

    /**
     * Get compte
     *
     * @return string
     */
    public function getCompte()
    {
        return $this->compte;
    }

    /**
     * Set montant
     *
     * @param string $montant
     *
     * @return Caisse
     */
    public function setMontant($montant)
    {
        $this->montant= $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return string
     */
    public function getMontant()
    {
        return $this->montant;
    }
    /**
     * Set datecreation
     *
     * @param Date $datecreation
     *
     * @return Caisse
     */
    public function setDatecreation($datecreation)
    {
        $this->datecreation= new \DateTime();

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
     * @ORM\OneToMany(targetEntity=User::class,cascade={"persist", "remove"}, mappedBy="caisse")
     */

    protected $users; 
    public function __construct()
    {
    }
     

}


