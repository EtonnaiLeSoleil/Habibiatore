<?php
include "config/database.php";
include "repository/questionRepository.php";

session_start();


$questions = getAllQuestions();
print_r($questions);

// Si un question_id est défini dans la session, l'utiliser, sinon utiliser l'ID par défaut
if (isset($_SESSION["question_id"])) {
    $question_id = (int)$_SESSION["question_id"];
} else {
    $question_id = 29; // ID par défaut
}

$question = getQuestionId($question_id);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $yn = $_POST["YN"];
    switch ($yn) {
        case "Oui":
            if(isset($question["id_planet_y"])){
                $_SESSION["planet_id"] = $question["id_planet_y"];
                
                echo("caca");
            }
            elseif (isset($question["next_question_id_y"])) {
                $_SESSION["question_id"] = $question["next_question_id_y"];
                $question_id = $question["next_question_id_y"];
                $question = getQuestionId($question_id);
            }
            break;
        case "Non":
            if(isset($question["id_planet_n"])){
                $_SESSION["planet_id"] = $question["id_planet_n"];
                
                echo("caca");
            }
            elseif (isset($question["next_question_id_n"])) {
                $_SESSION["question_id"] = $question["next_question_id_n"];
                $question_id = $question["next_question_id_n"];
                $question = getQuestionId($question_id);
            }
            
            break;
    }
}

var_dump($_SESSION);

$template = "secret";
include "layout.phtml";
    
  