<?php

function getConnexion():object
{
    $pdo = new PDO('mysql:host=db.3wa.io;port=3306;dbname=antoinegouet_habibinator;charset=utf8', 'antoinegouet', '63fb200d244b55c9c8d139eda85490c8');
    
    return $pdo;
}