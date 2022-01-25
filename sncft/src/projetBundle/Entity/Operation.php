<?php

namespace projetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * operation
 *
 * @ORM\Table(name="Operations")
 * @ORM\Entity(repositoryClass="projetBundle\Repository\OperationRepository")
 */
class Operation
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
     * @var string
     *
     * @ORM\Column(name="matricule", type="string", length=255)
     */
    private $matricule;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=255)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="motif", type="string", length=255)
     */
    private $motif;

    /**
     * @var float
     *
     * @ORM\Column(name="somme", type="float")
     */
    private $somme;

    /**
     * @var string
     *
     * @ORM\Column(name="typer", type="string", length=255)
     */
    private $typer;


    /**
     * @var string
     *
     * @ORM\Column(name="cin", type="string", length=255)
     */
    private $cin;

    /**
     * @var date
     *
     * @ORM\Column(name="datecreation", type="date", length=255)
     */
    private $datecreation;

    /**
     * @var string
     *
     * @ORM\Column(name="typeoperation", type="string", length=255)
     */
    private $typeoperation;

    /**
     * @var bool
     *
     * @ORM\Column(name="arretee", type="boolean")
     */
    private $arretee;

    /**
     * @var bool
     *
     * @ORM\Column(name="imprimee", type="boolean")
     */
    private $imprimee;


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
     * Set matricule
     *
     * @param string $matricule
     *
     * @return Operation
     */
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;

        return $this;
    }

    /**
     * Get matricule
     *
     * @return string
     */
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * Set reference
     *
     * @param string $reference
     *
     * @return Operation
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Operation
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Operation
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set motif
     *
     * @param string $motif
     *
     * @return Operation
     */
    public function setMotif($motif)
    {
        $this->motif = $motif;

        return $this;
    }

    /**
     * Get motif
     *
     * @return string
     */
    public function getMotif()
    {
        return $this->motif;
    }


    /**
     * Set typer
     *
     * @param string $typer
     *
     * @return Operation
     */
    public function setTyper($typer)
    {
        $this->typer = $typer;

        return $this;
    }

    /**
     * Get typer
     *
     * @return string
     */
    public function getTyper()
    {
        return $this->typer;
    }

    /**
     * Set cin
     *
     * @param string $cin
     *
     * @return Operation
     */
    public function setCin($cin)
    {
        $this->cin = $cin;

        return $this;
    }

    /**
     * Get cin
     *
     * @return string
     */
    public function getCin()
    {
        return $this->cin;
    }

   /**
     * Set datecreation
     *
     * @param Date $datecreation
     *
     * @return Operation
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
     * Set typeoperation
     *
     * @param string $typeoperation
     *
     * @return Operation
     */
    public function setTypeoperation($typeoperation)
    {
        $this->typeoperation = $typeoperation;

        return $this;
    }

    /**
     * Get typeoperation
     *
     * @return string
     */
    public function getTypeoperation()
    {
        return $this->typeoperation;
    }

    /**
     * Set arretee
     *
     * @param boolean $arretee
     *
     * @return Operation
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
     * Set imprimee
     *
     * @param boolean $imprimee
     *
     * @return Operation
     */
    public function setImprimee($imprimee)
    {
        $this->imprimee = $imprimee;

        return $this;
    }

    /**
     * Get imprimee
     *
     * @return bool
     */
    public function getImprimee()
    {
        return $this->imprimee;
    }




    /**
     * Set somme
     *
     * @param float $somme
     *
     * @return Operation
     */
    public function setSomme($somme)
    {
        $this->somme = $somme;

        return $this;
    }

    /**
     * Get somme
     *
     * @return float
     */
    public function getSomme()
    {
        return $this->somme;
    }


    /**
     * @ORM\ManyToOne(targetEntity=Banque::class, inversedBy="operations")
     * @ORM\JoinColumn(name="banque_id", referencedColumnName="id")
     */

    protected $banque;
     /**
     * Set banque
     *
     * @param $banque
     *
     * @return Operation
     */
    public function setBanqueId($banque=null)
    {
        $this->banque = $banque;

        return $this;
    }

    /**
     * Get banque
     *
     * @return Banque
     */
    public function getBanqueId()
    {
        return $this->banque;
    }



    
    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="operations")
     * @ORM\JoinColumn(name="caissier_id", referencedColumnName="id")
     */

    protected $user;
     /**
     * Set user
     *
     * @param $user
     *
     * @return Operation
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


