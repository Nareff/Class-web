<?php
    class AuthService{
        public function getUserInfos($id) {
            $pdo = dbConnect();
        
            try {
                // Récupérer les informations de l'utilisateur par son ID (Requête préparée pour prévenir l'injection SQL)
                $stmt = $pdo->prepare("SELECT id, nom, prenom, adresse, email FROM utilisateurs WHERE id = ?");
                $stmt->execute([$id]);
                $userInfo = $stmt->fetch();
        
                return $userInfo;
            } catch (Exception $e) {
                throw new Exception("Erreur lors de la récupération des informations de l'utilisateur : " . $e->getMessage());
            }
        }
    }
?>