<?php


session_start();
include "config/database.php";
include "repository/userRepository.php";

$pdo = new PDO('mysql:host=db.3wa.io;port=3306;dbname=ryennmithcatan_test_task;charset=utf8', 'ryennmithcatan', 'ab09fc793df41efc7e15ac8eacb44015');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



if (!isset($_SESSION['user'])) {
    die("Erreur : utilisateur non connecté.");
}
$id_utilisateur = getIdByName($_SESSION['user'])['id_user'];

    // Requête préparée sans l'identifiant si c'est un AUTO_INCREMENT
    $sql = "DELETE FROM task WHERE id_user = :idutilisateur";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':idutilisateur' => $id_utilisateur,
    ]);
    
    $sql = "DELETE FROM user WHERE id_user = :idutilisateur";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':idutilisateur' => $id_utilisateur,
    ]);

header("Location: login.php");
exit();