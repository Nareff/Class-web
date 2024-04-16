<?php 

class Security extends User{

    /*protected $nom;
    protected $prenom;
    protected $email;
    protected $adresse;
    protected $password;
    protected $confirmPassword;*/

    function __construct($nom, $prenom, $adresse, $email, $password, $confirmPassword){
        parent::__construct($nom, $prenom, $adresse, $email, $password, $confirmPassword);
    }
    
    public function validateRegistrationForm() {
        $errors = [];
    
        // Validation du nom et prénom (autorise uniquement les lettres et les espaces)
        if (!preg_match("/^[a-zA-Z\sàáâãäåèéêëìíîïòóôõöùúûüýÿç']+$/", $this->nom)) {
            $errors['nom'] = "Le nom n'est pas valide.";
        }
    
        if (!preg_match("/^[a-zA-Z\sàáâãäåèéêëìíîïòóôõöùúûüýÿç']+$/", $this->prenom)) {
            $errors['prenom'] = "Le prénom n'est pas valide.";
        }
    
        // Validation de l'adresse (autorise les lettres, les chiffres, les espaces et les caractères spéciaux courants)
        if (!preg_match("/^[a-zA-Z0-9\sàáâãäåèéêëìíîïòóôõöùúûüýÿç'-.,]+$/", $this->adresse)) {
            $errors['adresse'] = "L'adresse n'est pas valide.";
        }
    
        // Validation de l'email
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "L'adresse email n'est pas valide.";
        }
    
        // Validation du mot de passe
        if (strlen($this->password) < 8 || !preg_match("/[A-Z]/", $this->password) || !preg_match("/[0-9]/", $this->password)) {
            $errors['password'] = "Le mot de passe doit avoir au moins 8 caractères, une majuscule et un chiffre.";
        }
    
        // Validation de la confirmation du mot de passe
        if ($this->password !== $this->confirmPassword) {
            $errors['confirm_password'] = "Les mots de passe ne correspondent pas.";
        }
    
        return $errors;
    }
}

?>