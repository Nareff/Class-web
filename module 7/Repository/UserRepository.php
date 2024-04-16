<?php
include_once 'Security/CsrfToken.php';
include_once 'Security/UserSecurity.php';

include_once 'Service/service.php';

require_once 'Model/UserModel.php';

class UserRepository{
    protected $pdo;
    protected $email;
    protected $password;
    
    function __construct($email, $password){
        $this->email = $email;
        $this->password = $password;
    }

    //$Use = new User($id, $nom, $prenom, $adresse, $email, $password, $confirmPassword);

    /*public function __construct(){
        try{
            $this->pdo = new PDO('mysql:host=localhost;dbname=esiea_web', 'root', '');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->pdo;
        }catch(Exception $e){
            throw new Exception('Erreur lors de la connexion à la base de données : ' . $e->getMessage());
        }
    }*/

    public function loginUser($pdo) {
    
        try {
            // Récupérer les informations de l'utilisateur (Requête préparée pour prévenir l'injection SQL)
            $stmt = $pdo->prepare("SELECT id, email, password FROM utilisateurs WHERE email = ?");
            $stmt->execute([$this->email]);
            $user = $stmt->fetch();
    
            if ($user && password_verify($this->password, $user['password'])) {
                // Connexion réussie, stocker l'ID de l'utilisateur en session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
    
                return true;
            } else {
                // Échec de connexion, afficher un message d'erreur
                return "wrong_email_password";
            }
        } catch (Exception $e) {
            throw new Exception("Erreur lors de la connexion de l'utilisateur : " . $e->getMessage());
        }
    }
    
} 


?>