<?php

namespace projetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Recu
 *
 * @ORM\Table(name="recu")
 * @ORM\Entity(repositoryClass="projetBundle\Repository\RecuRepository")
 */
class Recu
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
     * @ORM\Column(name="creation_date", type="datetime")
     */
    private $creationDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="update_date", type="datetime")
     */
    private $updateDate;

    /**
     * @var int
     *
     * @ORM\Column(name="creation_user", type="integer")
     */
    private $creationUser;

    /**
     * @var int
     *
     * @ORM\Column(name="update_user", type="integer")
     */
    private $updateUser;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timestamp", type="datetime")
     */
    private $timestamp;

    /**
     * @var string
     *
     * @ORM\Column(name="available_ind", type="string", length=255)
     */
    private $availableInd;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=255)
     */
    private $reference;

    /**
     * @var float
     *
     * @ORM\Column(name="sum", type="float")
     */
    private $sum;

    /**
     * @var string
     *
     * @ORM\Column(name="matricule", type="string", length=255)
     */
    private $matricule;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="cin", type="string", length=255)
     */
    private $cin;

    /**
     * @var string
     *
     * @ORM\Column(name="current_month", type="string", length=255)
     */
    private $currentMonth;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deadline", type="datetime")
     */
    private $deadline;

    /**
     * @var string
     *
     * @ORM\Column(name="motif", type="text")
     */
    private $motif;

    /**
     * @var int
     *
     * @ORM\Column(name="id_recu_type_unite", type="integer")
     */
    private $idRecuTypeUnite;

    /**
     * @var int
     *
     * @ORM\Column(name="id_recu_status", type="integer")
     */
    private $idRecuStatus;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_signature", type="datetime")
     */
    private $dateSignature;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_caisse", type="datetime")
     */
    private $dateCaisse;

    /**
     * @var int
     *
     * @ORM\Column(name="signature_user", type="integer")
     */
    private $signatureUser;

    /**
     * @var int
     *
     * @ORM\Column(name="caisse_user", type="integer")
     */
    private $caisseUser;

   

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
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return Recu
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set updateDate
     *
     * @param \DateTime $updateDate
     *
     * @return Recu
     */
    public function setUpdateDate($updateDate)
    {
        $this->updateDate = $updateDate;

        return $this;
    }

    /**
     * Get updateDate
     *
     * @return \DateTime
     */
    public function getUpdateDate()
    {
        return $this->updateDate;
    }

    /**
     * Set creationUser
     *
     * @param integer $creationUser
     *
     * @return Recu
     */
    public function setCreationUser($creationUser)
    {
        $this->creationUser = $creationUser;

        return $this;
    }

    /**
     * Get creationUser
     *
     * @return int
     */
    public function getCreationUser()
    {
        return $this->creationUser;
    }

    /**
     * Set updateUser
     *
     * @param integer $updateUser
     *
     * @return Recu
     */
    public function setUpdateUser($updateUser)
    {
        $this->updateUser = $updateUser;

        return $this;
    }

    /**
     * Get updateUser
     *
     * @return int
     */
    public function getUpdateUser()
    {
        return $this->updateUser;
    }

    /**
     * Set timestamp
     *
     * @param \DateTime $timestamp
     *
     * @return Recu
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * Get timestamp
     *
     * @return \DateTime
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Set availableInd
     *
     * @param string $availableInd
     *
     * @return Recu
     */
    public function setAvailableInd($availableInd)
    {
        $this->availableInd = $availableInd;

        return $this;
    }

    /**
     * Get availableInd
     *
     * @return string
     */
    public function getAvailableInd()
    {
        return $this->availableInd;
    }

    /**
     * Set reference
     *
     * @param string $reference
     *
     * @return Recu
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
     * Set sum
     *
     * @param float $sum
     *
     * @return Recu
     */
    public function setSum($sum)
    {
        $this->sum = $sum;

        return $this;
    }

    /**
     * Get sum
     *
     * @return float
     */
    public function getSum()
    {
        return $this->sum;
    }

    /**
     * Set matricule
     *
     * @param string $matricule
     *
     * @return Recu
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
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Recu
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Recu
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set cin
     *
     * @param string $cin
     *
     * @return Recu
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
     * Set currentMonth
     *
     * @param string $currentMonth
     *
     * @return Recu
     */
    public function setCurrentMonth($currentMonth)
    {
        $this->currentMonth = $currentMonth;

        return $this;
    }

    /**
     * Get currentMonth
     *
     * @return string
     */
    public function getCurrentMonth()
    {
        return $this->currentMonth;
    }

    /**
     * Set deadline
     *
     * @param \DateTime $deadline
     *
     * @return Recu
     */
    public function setDeadline($deadline)
    {
        $this->deadline = $deadline;

        return $this;
    }

    /**
     * Get deadline
     *
     * @return \DateTime
     */
    public function getDeadline()
    {
        return $this->deadline;
    }

    /**
     * Set motif
     *
     * @param string $motif
     *
     * @return Recu
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
     * Set idRecuTypeUnite
     *
     * @param integer $idRecuTypeUnite
     *
     * @return Recu
     */
    public function setIdRecuTypeUnite($idRecuTypeUnite)
    {
        $this->idRecuTypeUnite = $idRecuTypeUnite;

        return $this;
    }

    /**
     * Get idRecuTypeUnite
     *
     * @return int
     */
    public function getIdRecuTypeUnite()
    {
        return $this->idRecuTypeUnite;
    }

    /**
     * Set idRecuStatus
     *
     * @param integer $idRecuStatus
     *
     * @return Recu
     */
    public function setIdRecuStatus($idRecuStatus)
    {
        $this->idRecuStatus = $idRecuStatus;

        return $this;
    }

    /**
     * Get idRecuStatus
     *
     * @return int
     */
    public function getIdRecuStatus()
    {
        return $this->idRecuStatus;
    }

    /**
     * Set dateSignature
     *
     * @param \DateTime $dateSignature
     *
     * @return Recu
     */
    public function setDateSignature($dateSignature)
    {
        $this->dateSignature = $dateSignature;

        return $this;
    }

    /**
     * Get dateSignature
     *
     * @return \DateTime
     */
    public function getDateSignature()
    {
        return $this->dateSignature;
    }

    /**
     * Set dateCaisse
     *
     * @param \DateTime $dateCaisse
     *
     * @return Recu
     */
    public function setDateCaisse($dateCaisse)
    {
        $this->dateCaisse = $dateCaisse;

        return $this;
    }

    /**
     * Get dateCaisse
     *
     * @return \DateTime
     */
    public function getDateCaisse()
    {
        return $this->dateCaisse;
    }

    /**
     * Set signatureUser
     *
     * @param integer $signatureUser
     *
     * @return Recu
     */
    public function setSignatureUser($signatureUser)
    {
        $this->signatureUser = $signatureUser;

        return $this;
    }

    /**
     * Get signatureUser
     *
     * @return int
     */
    public function getSignatureUser()
    {
        return $this->signatureUser;
    }

    /**
     * Set caisseUser
     *
     * @param integer $caisseUser
     *
     * @return Recu
     */
    public function setCaisseUser($caisseUser)
    {
        $this->caisseUser = $caisseUser;

        return $this;
    }

    /**
     * Get caisseUser
     *
     * @return int
     */
    public function getCaisseUser()
    {
        return $this->caisseUser;
    }

    
    
}

