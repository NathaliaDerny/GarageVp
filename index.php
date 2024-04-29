<?php
  require_once('templates/header.php');
  require_once('lib/vehicle.php');

 /* $vehicules = getvehicles($pdo, _HOME_VEHICLES_LIMIT_);*/

  $vehicles = [
    ['models' => 'Civic x type R', 'brands' => 'Honda', 'milesAge' => '21915 km', 'price' => '47490 $', 'image' => 'hondacivicxface-jakub-pabis-16475138.jpg']
  ];



?>



    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="assets/images/garage.jpg" class="bd-placeholder-img rounded-circle" alt="" width="500" height="500" >
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold lh-1 mb-3">Le garage Vincent Parrot</h1>
        <p class="lead">Vincent Parrot, fort de ses 15 années d'expérience dans la réparation automobile, a ouvert
            son propre garage à Toulouse en 2021.
            Depuis 2 ans, nous proposons une large gamme de services: réparation de la carrosserie et de la
            mécanique des voitures ainsi que leur entretien régulier pour garantir leur performance et
            leur sécurité.</p>
      </div>
    </div>




      <div class="row">

       <?php foreach ($vehicles as $key => $vehicle) { 
         include('templates/vehicle_partial.php');
        } ?>

      </div>
    

<?php
require_once('templates/footer.php');
?>

