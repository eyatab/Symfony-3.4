<?php

namespace projetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * recuType
 *
 * @ORM\Table(name="sncft_db_recu_espece.recu_type")
 * @ORM\Entity(repositoryClass="projetBundle\Repository\recuTypeRepository")
 */
class RecuType
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
     * @ORM\Column(name="creationDate", type="datetime")
     */
    private $creationDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updateDate", type="datetime")
     */
    private $updateDate;

    /**
     * @var int
     *
     * @ORM\Column(name="creationUser", type="integer")
     */
    private $creationUser;

    /**
     * @var int
     *
     * @ORM\Column(name="updateUser", type="integer")
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
     * @ORM\Column(name="availableIndice", type="string", length=255)
     */
    private $availableIndice;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="visaDaic", type="string", length=1)
     */
    private $visaDaic;

    /**
     * @var string
     *
     * @ORM\Column(name="encaissement", type="string", length=1)
     */
    private $encaissement;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="salarie", type="string", length=1)
     */
    private $salarie;

    /**
     * @var string
     *
     * @ORM\Column(name="visaComptabilite", type="string", length=1)
     */
    private $visaComptabilite;

    /**
     * @var string
     *
     * @ORM\Column(name="sstt", type="string", length=1)
     */
    private $sstt;

    /**
     * @var string
     *
     * @ORM\Column(name="direction", type="string", length=1)
     */
    private $direction;


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
     * @return recuType
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
     * @return recuType
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
     * @return recuType
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
     * @return recuType
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
     * @return recuType
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
     * Set availableIndice
     *
     * @param string $availableIndice
     *
     * @return recuType
     */
    public function setAvailableIndice($availableIndice)
    {
        $this->availableIndice = $availableIndice;

        return $this;
    }

    /**
     * Get availableIndice
     *
     * @return string
     */
    public function getAvailableIndice()
    {
        return $this->availableIndice;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return recuType
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set visaDaic
     *
     * @param string $visaDaic
     *
     * @return recuType
     */
    public function setVisaDaic($visaDaic)
    {
        $this->visaDaic = $visaDaic;

        return $this;
    }

    /**
     * Get visaDaic
     *
     * @return string
     */
    public function getVisaDaic()
    {
        return $this->visaDaic;
    }

    /**
     * Set encaissement
     *
     * @param string $encaissement
     *
     * @return recuType
     */
    public function setEncaissement($encaissement)
    {
        $this->encaissement = $encaissement;

        return $this;
    }

    /**
     * Get encaissement
     *
     * @return string
     */
    public function getEncaissement()
    {
        return $this->encaissement;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return recuType
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
     * Set salarie
     *
     * @param string $salarie
     *
     * @return recuType
     */
    public function setSalarie($salarie)
    {
        $this->salarie = $salarie;

        return $this;
    }

    /**
     * Get salarie
     *
     * @return string
     */
    public function getSalarie()
    {
        return $this->salarie;
    }

    /**
     * Set visaComptabilite
     *
     * @param string $visaComptabilite
     *
     * @return recuType
     */
    public function setVisaComptabilite($visaComptabilite)
    {
        $this->visaComptabilite = $visaComptabilite;

        return $this;
    }

    /**
     * Get visaComptabilite
     *
     * @return string
     */
    public function getVisaComptabilite()
    {
        return $this->visaComptabilite;
    }

    /**
     * Set sstt
     *
     * @param string $sstt
     *
     * @return recuType
     */
    public function setSstt($sstt)
    {
        $this->sstt = $sstt;

        return $this;
    }

    /**
     * Get sstt
     *
     * @return string
     */
    public function getSstt()
    {
        return $this->sstt;
    }

    /**
     * Set direction
     *
     * @param string $direction
     *
     * @return recuType
     */
    public function setDirection($direction)
    {
        $this->direction = $direction;

        return $this;
    }

    /**
     * Get direction
     *
     * @return string
     */
    public function getDirection()
    {
        return $this->direction;
    }
}

