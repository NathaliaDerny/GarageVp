<?php
require_once('templates/header.php');

/*if(!isset($_SESSION['user'])) {
    header('location: login.php');
}*/


require_once('lib/tools.php');
require_once('lib/vehicle.php');
require_once('lib/fueltype.php');




$errors = [];
$messages = [];
$vehicle = [
    'modele' => '',
    'marque' => '',
    'boite de vitesse' => '',
    'fueltype' => '',
    'options' => '',
    'kilometrage' => '',
    'date de mise en circulation' => '',
    'prix' => '',
    'creer le' => '',
];

$fueltype = getFueltype($pdo);

if (isset($_POST['saveVehicle'])) {
    $fileName = null;
    // Si un fichier a été envoyé
    if(isset($_FILES['file']['tmp_name']) && $_FILES['file']['tmp_name'] != '') {
        // la méthode getimagessize va retourner false si le fichier n'est pas une image
        $checkImage = getimagesize($_FILES['file']['tmp_name']);
        if ($checkImage !== false) {
            // Si c'est une image on traite
            $fileName = uniqid().'-'.slugify($_FILES['file']['name']);
            move_uploaded_file($_FILES['file']['tmp_name'], _VEHICLES_IMG_PATH_.$fileName);
        } else {
            // Sinon on affiche un message d'erreur
            $errors[] = 'Le fichier doit être une image';
        }
    }
    if (!$errors) {
        $res = saveVehicle($pdo, $_POST['models'], $_POST['brands'], $_POST['gearbox'], $_POST['fueltype'], $_POST['options'], $_POST['milesAge'], $_POST['dateOfCirculation'], $_POST['price'], $_POST['createdAt'], $fileName);

        if ($res) {
            $messages[] = 'Le véhicule a bien été sauvegardé';
        } else {
            $errors[] = 'Le véhicule n\'a pas été sauvegardé';
        }
    }
    $vehicle = [
        'models' => $_POST['models'],
        'brands_id' => $_POST['brands'],
        'gearbox_id' => $_POST['gearbox'],
        'fuelType_id' => $_POST['fueltype'],
        'options' => $_POST['options'],
        'milesAge' => $_POST['milesAge'],
        'dateOfCirculation' => $_POST['dateOfCirculation'],
        'price' => $_POST['price'],
        'createdAt' => $_POST['createdAt'],
    ];
}
?>

<h1>Ajouter un vehicules</h1>

<?php foreach ($messages as $message) { ?>
    <div class="alert alert-success">
        <?=$message; ?>
    </div>
<?php } ?>

<?php foreach ($errors as $error) { ?>
    <div class="alert alert-danger">
        <?=$error; ?>
    </div>
<?php } ?>


<form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
         <label for="models" class="form-label">Modèle</label>
        <input type="text" name="models" id="models" class="form-control" value="<?= $vehicle['models']; ?>">
    </div>
    <div class="mb-3">
        <label for="brands" class="form-label">Marque</label>
        <input type="text" name="brands" id="brands" class="form-control" value="<?= $vehicle['brands']; ?>">
    </div>
    <div class="mb-3">
        <label for="gearbox" class="form-label">Boite de vitesse</label>
        <select name="gearbox" id="gearbox" class="form-select">
            <?php foreach ($gearboxId as $gearbox) { ?>
                <option value="<?= $gearbox['id']; ?>" <?php if ($vehicle['gearbox_id'] == $gearbox['id']) { echo 'selected="selected"'; } ?>>
                    <?= $gearbox['name']; ?>
                </option>
            <?php } ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="fuelType" class="form-label">Carburant</label>
        <select name="fuelType" id="fuelType" class="form-select">
            <?php foreach ($fuelType as $fuelTypeItem) { ?>
                <option value="<?= $fuelTypeItem['id']; ?>" <?php if ($vehicle['fuelType_id'] == $fuelTypeItem['id']) { echo 'selected="selected"'; } ?>>
                    <?= $fuelTypeItem['name']; ?>
                </option>
            <?php } ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="options" class="form-label">Options</label>
        <textarea name="options" id="options" cols="30" rows="5" class="form-control"><?= $vehicle['options']; ?></textarea>
    </div>
    <div class="mb-3">
        <label for="milesAge" class="form-label">Kilométrage</label>
        <input type="number" name="milesAge" id="milesAge" class="form-control" value="<?= $vehicle['milesAge']; ?>">
    </div>
    <div class="mb-3">
        <label for="dateOfCirculation" class="form-label">Date de mise en circulation</label>
        <input type="date" name="dateOfCirculation" id="dateOfCirculation" class="form-control" value="<?= $vehicle['dateOfCirculation']; ?>">
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Prix</label>
        <input type="number" name="price" id="price" class="form-control" value="<?=$vehicle['price'] ;?>">
    </div>
    <div class="mb-3">
        <label for="createdAt" class="form-label">Date de creation de la fiche de vente</label>
        <input type="date" name="createdAt" id="createdAt" class="form-control" value="<?=$vehicle['createdAt'] ;?>">
    </div>
    
    <div class="mb-3">
        <label for="pictures" class="form-label">Image</label>
        <input type="file" name="pictures" id="pictures">
    </div>
    <input type="submit" value="Enregistrer" name="saveVehicle" class="btn btn-primary">


</form>

<?php
require_once('templates/footer.php');
?>