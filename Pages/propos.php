<div class="carousel fade-carousel slide carousel-fade" data-ride="carousel" data-interval="3000" id="bs-carousel">
	<ol class="carousel-indicators">
		<li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
		<li data-target="#bs-carousel" data-slide-to="1"></li>
	</ol>
	<div class="carousel-inner">
		<div class="item slides active carousel-item">
			<div class="slide-1" style="background-image: url(Admin/pieces-admin/<?= $Outil_administrations['Logo'] ?>);">
				<div class="overlay"></div>
			</div>
		</div>
		<div class="hero">
			<hgroup>
				<h1 class="animated"><?= $Outil_administrations['Nom_etablissement'] ?></h1>
				<p><a class="btn btn-primary btn-lg" href="#">Avoir plus d'infos sur notre établissement <?= $Outil_administrations['Nom_etablissement'] ?></a></p>
			</hgroup>

		</div>
	</div>
</div>

<div id="fh5co-tours" class="fh5co-section-gray">
	<div class="container">
		<div class="text-center heading-section animate-box">
			<h3>À Propos de notre nous </h3>
			<p><?= substr($Outil_administrations['Histoire'], 0, 100) . '...' ?></p>
		</div>
		<div class="row row-bottom-padded-md">
			<div class="col-md-12 animate-box">
				<h2 class="heading-title">Description de <?= $Outil_administrations['Nom_etablissement'] ?></h2>
			</div>
			<div class="col-md-6 animate-box">
				<div class="row">
					<div class="col-md-12">
						<?= $Outil_administrations['Histoire'] ?>
					</div>
				</div>
			</div>
			<div class="col-md-6 animate-box">
				<img class="img-responsive" src="Admin/pieces-admin/<?= $Outil_administrations['Logo'] ?>" alt="travel">
				<!-- </a> -->
			</div>
		</div>
		<div class="text-center heading-section animate-box">
			<h3>Nos enseignants</h3>
			<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
		</div>

		<div class="row row-bottom-padded-md">
			<?php foreach ($enseignants as $enseignant) : ?>
				<div class="col-lg-3 col-md-3 col-sm-3">
					<div class="fh5co-blog animate-box">
						<a href="#"><img class="img-responsive img-enseignant img-fluid" src="Admin/pieces-enseignant/<?= $enseignant['Photo'] ?>" alt=""></a>
						<div class="blog-text text-center">
							<div class="prod-title">
								<h3><a href="#"><?= $enseignant['Nom'] ?> <?= $enseignant['Prenom'] ?></a></h3>
							</div>
							<p>Spécialiste en <?= $enseignant['Specialite'] ?></p>
							<a href="index.php?page=affiche-enseignant&identifiant-enseignant=<?= $enseignant['Id'] ?>" class="btn btn-primary btn-outline">Son profile <i class="icon-arrow-right22"></i> </a>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
<div id="fh5co-testimonial" style="background-image:url(images/img_bg_1.jpg);">
	<div class="container">
		<div class="row animate-box">
			<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
				<h2>Happy Clients</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="box-testimony animate-box">
					<blockquote>
						<span class="quote"><span><i class="icon-quotes-right"></i></span></span>
						<p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
					</blockquote>
					<p class="author">John Doe, CEO <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a> <span class="subtext">Creative Director</span></p>
				</div>

			</div>
			<div class="col-md-4">
				<div class="box-testimony animate-box">
					<blockquote>
						<span class="quote"><span><i class="icon-quotes-right"></i></span></span>
						<p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.&rdquo;</p>
					</blockquote>
					<p class="author">John Doe, CEO <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a> <span class="subtext">Creative Director</span></p>
				</div>


			</div>
			<div class="col-md-4">
				<div class="box-testimony animate-box">
					<blockquote>
						<span class="quote"><span><i class="icon-quotes-right"></i></span></span>
						<p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
					</blockquote>
					<p class="author">John Doe, Founder <a href="#">FREEHTML5.co</a> <span class="subtext">Creative Director</span></p>
				</div>

			</div>
		</div>
	</div>
</div>