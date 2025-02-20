<?php 
include "repository/userRepository.php";
include "config/database.php";


session_start();

$template = "user";

$id_user=$_SESSION["id_user"];
$username=$_SESSION["user"];

$history=seeHistoryByUser($id_user);


include "layout.phtml";


