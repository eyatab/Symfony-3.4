<?php
namespace projetBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User extends  BaseUser{

  /**
     * @var int
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

       /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $matricule;
/**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $nom;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $prenom;

   /**
     * @var string
     * @ORM\Column(type="string", length=8)
     */
    protected $tel;
   




    public function __construct()
    {
        parent::__construct();
        // your own logic
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
     * @ORM\ManyToOne(targetEntity=Caisse::class, inversedBy="users")
     * @ORM\JoinColumn(name="caisse_id", referencedColumnName="id")
     */

    protected $caisse;
     /**
     * Set caisse
     *
     * @param $caisse
     *
     * @return User
     */
    public function setCaisseId($caisse=null)
    {
        $this->caisse = $caisse;

        return $this;
    }

    /**
     * Get caisse
     *
     * @return Caisse
     */
    public function getCaisseId()
    {
        return $this->caisse;
    }







     /**
     * @ORM\OneToMany(targetEntity=Operation::class,cascade={"persist", "remove"}, mappedBy="user")
     */

    protected $operations; 




    /**
     * @ORM\OneToMany(targetEntity=Arretcaisse::class,cascade={"persist", "remove"}, mappedBy="user")
     */

    protected $arretcaisses; 
    
}



