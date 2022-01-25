<?php

namespace projetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RecuStatus
 *
 * @ORM\Table(name="recu_status")
 * @ORM\Entity(repositoryClass="projetBundle\Repository\RecuStatusRepository")
 */
class RecuStatus
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
     * @var string
     *
     * @ORM\Column(name="available_ind", type="string", length=1)
     */
    private $availableInd;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;


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
     * @return RecuStatus
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
     * @return RecuStatus
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
     * @return RecuStatus
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
     * @return RecuStatus
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
     * @return RecuStatus
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
     * Set description
     *
     * @param string $description
     *
     * @return RecuStatus
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
}

