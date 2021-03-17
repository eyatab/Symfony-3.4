<?php

namespace projetBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
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
    private $codeB;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $raisonSB;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $codeComptableB;
/**
     * @var string
     * @ORM\Column(type="string")
     */
    private $rib;
/**
     * @var string
     * @ORM\Column(type="string")
     */
    private $etat;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $datecreabq;
    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $idcreabq;
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
     * Set codeB
     *
     * @param string $codeB
     *
     * @return Banque
     */
    public function setCodeB($codeB)
    {
        $this->codeB = $codeB;

        return $this;
    }

    /**
     * Get codeB
     *
     * @return string
     */
    public function getCodeB()
    {
        return $this->codeB;
    }

/**
     * Set etat
     *
     * @param string $etat
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
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set datecreabq
     *
     * @param string $etat
     *
     * @return Banque
     */
    public function setDatecreabq($datecreabq)
    {
        $this->datecreabq = $datecreabq;

        return $this;
    }

    /**
     * Get datecreabq
     *
     * @return string
     */
    public function getDatecreabq()
    {
        return $this->datecreabq;
    }




    /**
     * Set idcreabq
     *
     * @param string $etat
     *
     * @return Banque
     */
    public function setIdcreabq($idcreabq)
    {
        $this->datecreabq = $datecreabq;

        return $this;
    }

    /**
     * Get idcreabq
     *
     * @return string
     */
    public function getIdcreabq()
    {
        return $this->idcreabq;
    }




    /**
     * Set raisonSB
     *
     * @param string $raisonSB
     *
     * @return Banque
     */
    public function setRaisonSB($raisonSB)
    {
        $this->raisonSB = $raisonSB;

        return $this;
    }

    /**
     * Get raisonSB
     *
     * @return string
     */
    public function getRaisonSB()
    {
        return $this->raisonSB;
    }

    /**
     * Set codeComptableB
     *
     * @param string $codeComptableB
     *
     * @return Banque
     */
    public function setCodeComptableB($codeComptableB)
    {
        $this->codeComptableB = $codeComptableB;

        return $this;
    }

    /**
     * Get codeComptableB
     *
     * @return string
     */
    public function getCodeComptableB()
    {
        return $this->codeComptableB;
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
}
