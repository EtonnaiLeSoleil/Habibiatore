<?php
include "repository/planetRepository.php";

$answer_id = (int)$_SESSION["planet_id"];
$answer = getPlanetById($answer_id);

var_dump($answer);

$template = "answer";



include "layout.phtml";