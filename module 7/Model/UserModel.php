<?php

class User{
    protected $id;
    protected $nom;
    protected $prenom;
    protected $email;
    protected $adresse;
    protected $password;
    protected $confirmPassword;

    public function __construct($nom, $prenom,$adresse, $email, $password, $confirmPassword) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->adresse = $adresse;
        $this->email = $email;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
    }
} 


?>