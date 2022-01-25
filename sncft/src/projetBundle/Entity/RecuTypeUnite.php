<?php

namespace projetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RecuTypeUnite
 *
 * @ORM\Table(name="recu_type_unite")
 * @ORM\Entity(repositoryClass="projetBundle\Repository\RecuTypeUniteRepository")
 */
class RecuTypeUnite
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
     * @var int
     *
     * @ORM\Column(name="id_unite", type="integer")
     */
    private $idUnite;

    /**
     * @var int
     *
     * @ORM\Column(name="id_recu_type", type="integer")
     */
    private $idRecuType;

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
     * @ORM\Column(name="cretion_user", type="integer")
     */
    private $cretionUser;

    /**
     * @var int
     *
     * @ORM\Column(name="update_user", type="integer")
     */
    private $updateUser;

    /**
     * @var string
     *
     * @ORM\Column(name="available_ind", type="string", length=1)
     */
    private $availableInd;


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
     * Set idUnite
     *
     * @param integer $idUnite
     *
     * @return RecuTypeUnite
     */
    public function setIdUnite($idUnite)
    {
        $this->idUnite = $idUnite;

        return $this;
    }

    /**
     * Get idUnite
     *
     * @return int
     */
    public function getIdUnite()
    {
        return $this->idUnite;
    }

    /**
     * Set idRecuType
     *
     * @param integer $idRecuType
     *
     * @return RecuTypeUnite
     */
    public function setIdRecuType($idRecuType)
    {
        $this->idRecuType = $idRecuType;

        return $this;
    }

    /**
     * Get idRecuType
     *
     * @return int
     */
    public function getIdRecuType()
    {
        return $this->idRecuType;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return RecuTypeUnite
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
     * @return RecuTypeUnite
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
     * Set cretionUser
     *
     * @param integer $cretionUser
     *
     * @return RecuTypeUnite
     */
    public function setCretionUser($cretionUser)
    {
        $this->cretionUser = $cretionUser;

        return $this;
    }

    /**
     * Get cretionUser
     *
     * @return int
     */
    public function getCretionUser()
    {
        return $this->cretionUser;
    }

    /**
     * Set updateUser
     *
     * @param integer $updateUser
     *
     * @return RecuTypeUnite
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
     * Set availableInd
     *
     * @param string $availableInd
     *
     * @return RecuTypeUnite
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
}

