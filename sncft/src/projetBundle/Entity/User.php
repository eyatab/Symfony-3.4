<?php

namespace projetBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User
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
    private $matricule;
/**
     * @var string
     * @ORM\Column(type="string")
     */
    private $nom;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $prenom;

   /**
     * @var string
     * @ORM\Column(type="string", length=8)
     */
    private $tel;

   /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $email;

  /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $profil;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $username;


    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $etatU;


    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @var string
     * @ORM\Column(type="string", length=10)
     */
    private $idcrea;
  
/**
     * @var string
     * @ORM\Column(type="string", length=10)
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
     * Set matricule
     *
     * @param string $matricule
     *
     * @return User
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
     * Set nom
     *
     * @param string $nom
     *
     * @return User
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
     * @return User
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
     * Set tel
     *
     * @param string $tel
     *
     * @return User
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set profil
     *
     * @param string $profil
     *
     * @return User
     */
    public function setProfil($profil)
    {
        $this->profil = $profil;

        return $this;
    }

    /**
     * Get profil
     *
     * @return string
     */
    public function getProfil()
    {
        return $this->profil;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

/**
     * Set idcrea
     *
     * @param string $idcrea
     *
     * @return User
     */
    public function setIdcrea($idcrea)
    {
        $this->idcrea = $idcrea;

        return $this;
    }

    /**
     * Get idcrea
     *
     * @return string
     */
    public function getIdcrea()
    {
        return $this->idcrea;
    }




      /**
     * Set etatU
     *
     * @param string $password
     *
     * @return User
     */
    public function setEtatU($etatU)
    {
        $this->etatU = $etatU;

        return $this;
    }

    /**
     * Get etatU
     *
     * @return string
     */
    public function getEtatU()
    {
        return $this->etatU;
    }

    /**
     * Set datecreation
     *
     * @param string $datecreation
     *
     * @return User
     */
    public function setDatecreation($datecreation)
    {
        $this->datecreation = $datecreation;

        return $this;
    }

    /**
     * Get datecreation
     *
     * @return string
     */
    public function getDatecreation()
    {
        return $this->datecreation;
    }
}

