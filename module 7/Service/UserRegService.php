<?php
include_once 'Controller/db.php';

class UserRegService extends User{

    function __construct($nom, $prenom, $adresse, $email, $password, $confirmPassword){
        parent::__construct($nom, $prenom, $adresse, $email, $password, $confirmPassword);
    }

    public function registerUser() {
        $pdo = dbConnect();
        //role 0 = admin, 1 = modérateur, 2 = utilisateur
        $defaultRole = 2; 
        // Vérifier le jeton CSRF
        $token = new CsrfToken();
        $token->verifyCsrfToken();

        try {
            // Vérifier si l'email existe déjà (Prévention d'injection SQL)
            $stmt = $pdo->prepare("SELECT id FROM utilisateurs WHERE email = ?");
            $stmt->execute([$this->email]);
            $existingUser = $stmt->fetch();
    
            if ($existingUser) {
                // L'email existe déjà, renvoyer une erreur
                return "email_exists";
            } elseif ($this->password !== $this->confirmPassword) {
                // Les mots de passe ne correspondent pas, renvoyer une erreur
                return "password_mismatch";
            } else {
                // Enregistrement réussi
                $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
                $stmt = $pdo->prepare("INSERT INTO utilisateurs (nom, prenom, adresse, email, password, role) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->execute([$this->nom, $this->prenom, $this->adresse, $this->email, $hashedPassword, $defaultRole]);
                return true;
            }
        } catch (Exception $e) {
            throw new Exception("Erreur lors de l'enregistrement de l'utilisateur : " . $e->getMessage());
        }
    }
    
    public function updateUserInfo(){
        $pdo = dbConnect();

        $token = new CsrfToken();
        $token->verifyCsrfToken();
       
    
        try {
    
            if($this->email === $_SESSION['email']){
                if ($this->password !== $this->confirmPassword) {
                    return "password_mismatch";
    
                } else {
                    $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
            
                    $stmt = $pdo->prepare("UPDATE utilisateurs SET nom = ?, prenom = ?, adresse = ?, email = ?, password = ? WHERE id = ?");
                    $stmt->execute([$this->nom, $this->prenom, $this->adresse, $this->email, $hashedPassword, $id]);
                    return true;
                }
            } else {
                $stmt = $pdo->prepare("SELECT id FROM utilisateurs WHERE email = ?");
                $stmt->execute([$this->email]);
                $existingUser = $stmt->fetch();
    
                if ($existingUser) {
                    return "email_exists";
    
                } elseif ($this->password !== $this->confirmPassword) {
                    return "password_mismatch";
    
                } else {
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            
                    $stmt = $pdo->prepare("UPDATE utilisateurs SET nom = ?, prenom = ?, adresse = ?, email = ?, password = ? WHERE id = ?");
                    $stmt->execute([$this->nom, $this->prenom, $this->adresse, $this->email, $hashedPassword, $id]);
                    $_SESSION['email'] = $this->email;
                    
                    return true;
                }
            }
    
        } catch (Exception $e) {
            throw new Exception("Erreur lors de la modification des informations de l'utilisateur : " . $e->getMessage());
        }
    }
}

?>