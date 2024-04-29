<div class="col-md-4 my-2 d-flex">
           <div class="card">
              <img src="<?=_VEHICLES_IMG_PATH_.$vehicle['image'] ; ?>" class="card-img-top" alt="<?=$vehicle['models']?>">
              <div class="card-body">
                  <h5 class="card-title"><?=$vehicle['models']?></h5>
              </div>
               <ul class="list-group list-group-flush">
                  <li class="list-group-item"><?=$vehicle['brands']; ?></li>
                  <li class="list-group-item"><?=$vehicle['milesAge']; ?></li>
                  <li class="list-group-item"><?=$vehicle['price']; ?></li>
              </ul>
              <div class="card-body">
                  <a href="#" class="card-link">Voir le vehicule</a>
                  <a href="#" class="card-link">Contactez un conseiller</a>
              </div>
           </div>
</div>
  