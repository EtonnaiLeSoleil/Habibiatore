<?php
include "repository/planetRepository.php";
include "repository/userRepository.php";

$template = "answer";

$answer_id = (int)$_SESSION["planet_id"];
$answer = getPlanetById($answer_id);

var_dump($_SESSION);

$id_user = (int)$_SESSION["id_user"];


addHistoryByUser($id_user, $answer_id);

unset($_SESSION["question_id"]);



include "layout.phtml";