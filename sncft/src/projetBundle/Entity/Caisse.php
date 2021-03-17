<?php

namespace projetBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
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
    private $codeC;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $nomC;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $compteC;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $montantC;

 /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $etatC;

 /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $datecreaC;
     /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $idcreaC;




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
     * Set codeC
     *
     * @param string $codeC
     *
     * @return Caisse
     */
    public function setCodeC($codeC)
    {
        $this->codeC = $codeC;

        return $this;
    }

    /**
     * Get codeC
     *
     * @return string
     */
    public function getCodeC()
    {
        return $this->codeC;
    }

    /**
     * Set nomC
     *
     * @param string $nomC
     *
     * @return Caisse
     */
    public function setNomC($nomC)
    {
        $this->nomC = $nomC;

        return $this;
    }

    /**
     * Get nomC
     *
     * @return string
     */
    public function getNomC()
    {
        return $this->nomC;
    }


/**
     * Set etatC
     *
     * @param string $nomC
     *
     * @return Caisse
     */
    public function setEtatC($etatC)
    {
        $this->etatC= $etatC;

        return $this;
    }

    /**
     * Get etatC
     *
     * @return string
     */
    public function getEtatC()
    {
        return $this->etatC;
    }



/**
     * Set datecreaC
     *
     * @param string $nomC
     *
     * @return Caisse
     */
    public function setDatecreaC($datecreaC)
    {
        $this->datecreaC= $datecreaC;

        return $this;
    }

    /**
     * Get datecreaC
     *
     * @return string
     */
    public function getDatecreaC()
    {
        return $this->datecreaC;
    }



/**
     * Set idcreaC
     *
     * @param string $nomC
     *
     * @return Caisse
     */
    public function setIdcreaC($datecreaC)
    {
        $this->idcreaC= $idcreaC;

        return $this;
    }

    /**
     * Get idcreaC
     *
     * @return string
     */
    public function getIdcreaC()
    {
        return $this->idcreaC;
    }







    /**
     * Set compteC
     *
     * @param string $compteC
     *
     * @return Caisse
     */
    public function setCompteC($compteC)
    {
        $this->compteC = $compteC;

        return $this;
    }

    /**
     * Get compteC
     *
     * @return string
     */
    public function getCompteC()
    {
        return $this->compteC;
    }

    /**
     * Set montantC
     *
     * @param string $montantC
     *
     * @return Caisse
     */
    public function setMontantC($montantC)
    {
        $this->montantC = $montantC;

        return $this;
    }

    /**
     * Get montantC
     *
     * @return string
     */
    public function getMontantC()
    {
        return $this->montantC;
    }
}

