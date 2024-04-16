<?php 

class CsrfToken{
    public function verifyCsrfToken() {
        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            throw new \Exception("Erreur CSRF token. Les jetons ne correspondent pas. ");                 //. json_encode($_POST)
        }
    }
    
    public function generateCsrfToken() {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
    
        return $_SESSION['csrf_token'];
    }
}
?>