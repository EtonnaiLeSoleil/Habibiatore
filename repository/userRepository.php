<?php

function createUser(string $email, string $pseudo, string $password){
    
    $pdo = getConnexion();
    
    $query = $pdo -> prepare("INSERT INTO user (username, email, password) VALUES (?,?,?)");
    
    $query->execute([$pseudo, $email, $password]);
}

function getUserByEmail(string $email){
    
    $pdo = getConnexion();
    
    $query = $pdo -> prepare("SELECT * FROM user WHERE email = ?");
    
    $query->execute([$email]);
    
    return $query->fetch();
}

function getUserByName(string $name){
    
    $pdo = getConnexion();
    
    $query = $pdo -> prepare("SELECT email FROM user WHERE username = ?");
    
    $query->execute([$name]);
    
    return $query->fetch();
}


function getIdByName(string $name){
    
    $pdo = getConnexion();
    
    $query = $pdo -> prepare("SELECT id_user FROM user WHERE username = ?");
    
    $query->execute([$name]);
    
    return $query->fetch();
}

function addHistoryByUser(string $id_user, string $id_planet) {
    $pdo = getConnexion();
    $current_date = date('Y-m-d'); // Définir la date actuelle
    
    // Préparer la requête SQL avec des espaces réservés
    $query = $pdo->prepare("INSERT INTO history (id_user, id_planet, date) VALUES (:id_user, :id_planet, :date)");

    // Exécuter la requête préparée avec les valeurs réelles
    $query->execute([
        ':id_user' => $id_user,
        ':id_planet' => $id_planet,
        ':date' => $current_date
    ]);
}

function seeHistoryByUser(string $id_user) {
    $pdo = getConnexion();

    // Préparer la requête SQL pour récupérer l'historique de l'utilisateur avec les noms des planètes
    $query = $pdo->prepare("
        SELECT history.id_user, history.id_planet, planet.name AS planet_name, history.date
        FROM history
        JOIN planet ON history.id_planet = planet.id_planet
        WHERE history.id_user = :id_user
    ");

    // Exécuter la requête préparée avec la valeur réelle de l'id_user
    $query->execute([':id_user' => $id_user]);

    // Récupérer tous les résultats
    $history = $query->fetchAll(PDO::FETCH_ASSOC);

    // Vérifier si des résultats ont été trouvés
    if ($history) {
        return $history; // Retourner l'historique de l'utilisateur avec le nom des planètes
    } else {
        return null; // Retourner null si aucun historique n'est trouvé
    }
}
