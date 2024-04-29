<?php
  require_once('templates/header.php');
  require_once('lib/vehicle.php');


?>

    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <h1>Nos voitures en ventes</h1>
    </div>


    <div class="row">

      <?php foreach ($vehicles as $key => $vehicle) { 
        include_once('templates/vehicle_partial.php');
       } ?>
    </div>

<?php
require_once('templates/footer.php');
?>