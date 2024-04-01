<?php
/** Controller */
require_once 'model.php';
include_once 'security.php';
include_once 'service.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();    
}
/**
 * Contrôleur principal qui gère les différentes actions
 */
function controller() {
    try{
    // Démarrer la session (si elle n'est pas déjà active)
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Routes
    if (isset($_GET['action'])) {
        $action = $_GET['action'];        
        // Protection CSRF pour toutes les actions POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            functions\verifyCsrfToken();
        }

        $control = new controller();

        
        switch ($action) {
            case 'register':
                $control->handleRegisterAction();
                break;
            case 'login':
                $control->handleLoginAction();
                break;
            case 'dashboard':
                include_once 'templates/dashboard.php';
                break;
            case 'update':
                $control->handleUpdateAction();
                break;
            case 'close':
                $control->handleCloseAction();
                break;
            case 'logout':
                $control->handleLogoutAction();
                break;
            default:
                include_once 'templates/home.php';
                break;
        }
    } else {
        include_once 'templates/home.php';
    }
}catch(Exception $e){
    $error_message = $e->getMessage();
    require_once 'templates/error.php';
}
}


?>
