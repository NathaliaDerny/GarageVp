<?php

function getfueltype(PDO $pdo) {
    $sql = 'SELECT * FROM fueltype';
    $query = $pdo->prepare($sql);

    $query->execute();
    return $query->fetchAll();
}