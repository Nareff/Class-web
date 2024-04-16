<?php
function dbConnect(){
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=esiea_web', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }catch(Exception $e){
        throw new Exception('Erreur lors de la connexion à la base de données : ' . $e->getMessage());
    }
} 

?>