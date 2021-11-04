<?php
class Contact extends Entite
{
    private $nom;
    private $prenom;
    private $statut;
    private $tel;
    private $courriel;

    public function __construct(int $id, String $nom = '', String $prenom = '', String $statut = '', String $telephone = '', String $courriel = '')
    {
        parent::__construct($id);
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setStatut($statut);
        $this->setTel($telephone);
        $this->setCourriel($courriel);
    }

    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = htmlspecialchars(strip_tags($id));

        return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = htmlspecialchars(strip_tags($nom));

        return $this;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = htmlspecialchars(strip_tags($prenom));

        return $this;
    }

    /**
     * Get the value of statut
     */ 
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set the value of statut
     *
     * @return  self
     */ 
    public function setStatut($statut)
    {
        $this->statut = htmlspecialchars(strip_tags($statut));

        return $this;
    }

    /**
     * Get the value of tel
     */ 
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set the value of tel
     *
     * @return  self
     */ 
    public function setTel($tel)
    {
        $this->tel = htmlspecialchars(strip_tags($tel));

        return $this;
    }

    /**
     * Get the value of courriel
     */ 
    public function getCourriel()
    {
        return $this->courriel;
    }

    /**
     * Set the value of courriel
     *
     * @return  self
     */ 
    public function setCourriel($courriel)
    {
        $this->courriel = htmlspecialchars(strip_tags($courriel));

        return $this;
    }
}
