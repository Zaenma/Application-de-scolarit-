<div class="carousel fade-carousel slide carousel-fade" data-ride="carousel" data-interval="3000" id="bs-carousel">

   <!-- Overlay -->
   <!-- Indicators -->
   <ol class="carousel-indicators">
      <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
      <li data-target="#bs-carousel" data-slide-to="1"></li>
   </ol>
   <!-- Wrapper for slides -->
   <div class="carousel-inner">
      <div class="item slides active carousel-item">
         <div class="slide-1" style="background-image: url(Admin/photos-actualites/<?= $actualites['Photos_1'] ?>);">
            <div class="overlay"></div>
         </div>
      </div>
      <div class="item slides carousel-item">
         <div class="slide-2" style="background-image: url(Admin/photos-actualites/<?= $actualites['Photos_2'] ?>);">
            <div class="overlay"></div>
         </div>
      </div>
      <div class="hero">
         <div class="container">
            <hgroup>
               <h1 class="animated"><?= substr($actualites['Titres'], 0, 30) . "..."; ?></h1>
               <strong class="animated bounceInDown mb-5"><?= substr($actualites['Publications'], 0, 100) . "..."; ?></strong>
               <p><a class="btn btn-primary btn-lg" href="#">Lire l'actualité</a></p>
            </hgroup>
         </div>
         <!-- <button class="btn btn-hero btn-lg" role="button">See all features</button> -->

      </div>
   </div>
</div>