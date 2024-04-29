<?php

function getVehiclesById(PDO $pdo, int $id) {
    $query = $pdo->prepare("SELECT * FROM vehicles WHERE id = :id");
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch();
}

function get(string|null $image) {
    if ($image === null) {
        return _ASSETS_IMG_PATH_.'logovparrot.png';
    } else {
        return _VEHICLES_IMG_PATH_.$image;
    }
}

function getVehicles(PDO $pdo, int $limit = null) {
    $sql = 'SELECT * FROM vehicles ORDER BY id DESC';

    if ($limit) {
        $sql .= ' LIMIT :limit';
    }

    $query = $pdo->prepare($sql);

    if ($limit) {
        $query->bindParam(':limit', $limit, PDO::PARAM_INT);
    }

    $query->execute();
    return $query->fetchAll();
}

function saveVehicle(PDO $pdo, int $models, int $brands, string $gearbox, string $fuelType, string $options, string $milesAge, string $dateOfCirculation, string $price, string $createdAt, string|null $image) {
    $sql = "INSERT INTO `vehicles` (`id`, `models`, brands`, `gearbox_id`, `fuelType_id`, `options`, `milesAge`, `dateOfCirculation`, `price`, `createdAt` `image`) VALUES (NULL, :models, :brands, :gearbox, :fuelType, :options, :milesAge, :dateOfCirculation, :price, :createdAt :image);";
    $query = $pdo->prepare($sql);
    $query->bindParam(':models', $models, PDO::PARAM_STR);
    $query->bindParam(':brands', $brands, PDO::PARAM_STR);
    $query->bindParam(':gearbox', $gearbox, PDO::PARAM_STR);
    $query->bindParam(':fuelType', $fuelType, PDO::PARAM_STR);
    $query->bindParam(':options', $options, PDO::PARAM_STR);
    $query->bindParam(':milesAge', $milesAge, PDO::PARAM_STR);
    $query->bindParam(':dateOfCirculation', $dateOfCirculation, PDO::PARAM_STR);
    $query->bindParam(':price', $price, PDO::PARAM_STR);
    $query->bindParam(':createdAt', $createdAt, PDO::PARAM_STR);
    $query->bindParam(':image', $image, PDO::PARAM_STR);
    return $query->execute();
}