<?php
include_once 'Service/UserRegService.php';
include_once 'Repository/UserRepository.php';

class service{
    public function handleRegisterAction() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Vérifier le jeton CSRF
            $token = new CsrfToken();
            $token->verifyCsrfToken();

            $sec = new Security(htmlspecialchars($_POST['nom'], ENT_QUOTES, 'UTF-8'),htmlspecialchars($_POST['prenom'])
            ,htmlspecialchars($_POST['adresse']),filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
            $_POST['password'],$_POST['confirm_password']);
    
            // Récupérer les données du formulaire
            /*$nom = $sec->sanitizeInput($_POST['nom']);
            $prenom = functions\sanitizeInput($_POST['prenom']);
            $adresse = functions\sanitizeInput($_POST['adresse']);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];*/
    
            // Valider le formulaire
            $errors = $sec->validateRegistrationForm();
    
            // Si des erreurs sont présentes, afficher le formulaire avec les erreurs
            if (!empty($errors)) {
                // Ajouter les erreurs au tableau de données pour les afficher dans le formulaire
                $data['errors'] = $errors;
                include_once 'View/register.php';
            } else {
                // Appeler la fonction pour enregistrer l'utilisateur
    
                $use = new UserRegService(htmlspecialchars($_POST['nom'], ENT_QUOTES, 'UTF-8'),htmlspecialchars($_POST['prenom'])
                ,htmlspecialchars($_POST['adresse']),filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
                $_POST['password'],$_POST['confirm_password']);
                $error = $use->registerUser();
    
                //$error = registerUser($nom, $prenom, $adresse, $email, $password, $confirmPassword);
    
                // Si l'enregistrement est réussi, rediriger vers la page de connexion
                if ($error === true) {
                    header("Location: index.php?action=login");
                    exit();
                } else {
                    // En cas d'erreur, afficher le message d'erreur sur la page d'inscription
                    // Ajouter le message d'erreur au tableau de données pour l'afficher dans le formulaire
                    $data['error'] = $error;
                    include_once 'View/register.php';
                }
            }
        } else {
            // Afficher le formulaire d'inscription si la requête n'est pas de type POST
            include_once 'View/register.php';
        }
    }
    
    public function handleLoginAction() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Vérifier le jeton CSRF ici avant d'appeler loginUser
            $token = new CsrfToken();
            $token->verifyCsrfToken();
    
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];
    
    
            $pdo = dbConnect();
            $yu = new UserRepository($email, $password);
            $error = $yu->loginUser($pdo);   
    
            if($error === true){
                header("Location: index.php?action=dashboard");
                exit();
            } else {
                include_once 'View/login.php';
            }
        } else {
            include_once 'View/login.php';
        }
    }
    
    public function handleUpdateAction() {
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
            $token = new CsrfToken();
            $token->verifyCsrfToken();
    
            $id = $_SESSION['user_id'];

            $sec = new Security(htmlspecialchars($_POST['nom'], ENT_QUOTES, 'UTF-8'),htmlspecialchars($_POST['prenom'])
            ,htmlspecialchars($_POST['adresse']),filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
            $_POST['password'],$_POST['confirm_password']);

            /*$nom = functions\sanitizeInput($_POST['nom']);
            $prenom = functions\sanitizeInput($_POST['prenom']);
            $adresse = functions\sanitizeInput($_POST['adresse']);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];*/
    
            $errors = $sec->validateRegistrationForm();
    
            if (!empty($errors)) {
                $data['errors'] = $errors;
                include_once 'View/update.php';
            } else {
                
                $db = dbConnect();
                $use = new UserRegService(htmlspecialchars($_POST['nom'], ENT_QUOTES, 'UTF-8'),htmlspecialchars($_POST['prenom'])
                ,htmlspecialchars($_POST['adresse']),filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
                $_POST['password'],$_POST['confirm_password']);
                $error = $use->updateUserInfo();
                
    
                if ($error === true) {
                    header("Location: index.php?action=dashboard");
                    exit();
                } else {
                    include_once 'View/update.php';
                }
            }
    
        } else {
            include_once 'View/update.php';
        }
    }
    public function closeAccount($id,$pdo) {       
    
        try {
            // Supprimer le compte de l'utilisateur (Requête préparée pour prévenir l'injection SQL)
            $stmt = $pdo->prepare("DELETE FROM utilisateurs WHERE id = ?");
            $stmt->execute([$id]);
    
            // Déconnecter l'utilisateur et rediriger vers la page d'accueil
            session_destroy();
            header("Location: index.php");
            exit();
        } catch (Exception $e) {
            throw new Exception("Erreur lors de la fermeture du compte de l'utilisateur : " . $e->getMessage());
        }
    }
    
    public function handleCloseAction() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_SESSION['user_id'];
    
            $token = new CsrfToken();
            $token->verifyCsrfToken();
    
    
            $pdo = dbConnect();
            $serv = new Service();
            $serv->closeAccount($id,$pdo);
    
    
            session_destroy();
    
            header("Location: index.php");
            exit();
        }
    }
    
    public function handleLogoutAction() {
        // Détruire la session
        session_destroy();
    
        // Rediriger vers la page d'accueil
        header("Location: index.php");
        exit();
    }
}



?>