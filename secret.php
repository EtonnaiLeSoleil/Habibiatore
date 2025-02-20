<?php
include "config/database.php";
include "repository/questionRepository.php";


$questions = getAllQuestions();
print_r($questions);

$question_id = 29; // Replace with the ID of the question you want to retrieve
$question = getQuestionId($question_id);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $yn = $_POST["YN"];
    switch ($yn) {
        case "Oui":
      
            echo "C'est un chien.";
            
            
            if (isset($question["next_question_id_y"])) {
              $question_id = $question["next_question_id_y"];
              $question = getQuestionId($question_id);
            }
            
            
        break;
        case "Non":
            echo "C'est un oiseau.";
            
            if (isset($question["next_question_id_n"])) {
              $question_id = $question["next_question_id_n"];
              $question = getQuestionId($question_id);
            }
            
            break;
    }
}



$template = "secret";
include "layout.phtml";
    
  