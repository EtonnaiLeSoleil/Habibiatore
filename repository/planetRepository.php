<?php
function getPlanetById(string $id) {
    $pdo = getConnexion();
    $query = $pdo->prepare("SELECT * FROM planet WHERE id_planet = ?");
    $query->execute([$id]);

    // Récupération de la question
    $planet = $query->fetch(PDO::FETCH_ASSOC);

    return $planet;
}