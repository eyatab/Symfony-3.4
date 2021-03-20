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
    private $role;

    


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
     * Set role
     *
     * @param string $role
     *
     * @return User
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
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
        $this->datecreation = new \DateTime('@'.strtotime('now'));

        return $this;
    }

    /**
     * Get datecreation
     *
     * @return date
     */
    public function getDatecreation()
    {
        return $this->datecreation;
    }
}

