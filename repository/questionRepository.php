<?php


function getAllQuestions(){
    
    $pdo = getConnexion();
    
    $query = $pdo->prepare("SELECT * FROM questions");
    $query->execute();

    // Récupération de toutes les questions dans un tableau associatif
    $questions = $query->fetchAll(PDO::FETCH_ASSOC);

    // Retourne le tableau de questions
    return $questions;
}

function getQuestionId(string $id) {
    $pdo = getConnexion();
    $query = $pdo->prepare("SELECT * FROM questions WHERE id_question = ?");
    $query->execute([$id]);

    // Récupération de la question
    $question = $query->fetch(PDO::FETCH_ASSOC);

    return $question;
}


