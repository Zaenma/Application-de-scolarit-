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
				<h1 class="animate-box"><?= $Outil_administrations['Nom_etablissement'] ?></h1>
				<h2 class="animate-box text-white">Trouver tous les articles publiés par nos enseignants</h2>
			</hgroup>
		</div>
	</div>
</div>

<div id="fh5co-features" class="fh5co-section-gray">
	<div class="container">
		<div class="text-center heading-section animate-box">
			<h3>Notre Blog</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit est facilis maiores, perspiciatis accusamus asperiores sint consequuntur debitis.</p>
		</div>
	</div>
	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
		Launch
	</button>

	<!-- Modal -->
	<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Body
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save</button>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row row-bottom-padded-md">
			<?php foreach ($tous_articles as $article) : ?>
				<div class="col-lg-4 col-md-4 col-sm-6">
					<div class="fh5co-blog animate-box">
						<a href="#"><img class="img-responsive" src="Admin/pieces-articles/<?= $article->Image ?>" alt=""></a>
						<div class="blog-text">
							<div class="prod-title">
								<h3><a href="#"><?= $article->Titres ?></a></h3>
								<small class="posted_by mb-2">Le <?= (new \DateTime($article->Date))->format('d/m/Y à H:i:s') ?> </small> par <b><?= $article->Nom ?> </b>
								<p><?= substr($article->Articles, 0, 100) . '...' ?></p>
								<small><a href="index.php?page=article&identifiant=<?= $article->Id ?>" class="">Lire l'article complet</a></small>
								<span class="comment"><a href=""><?= nombre_commentaire_par_article($article->Id) ?><i class="icon-bubble2"></i></a></span>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
			<!-- <div class="col-lg-4 col-md-4 col-sm-6">
				<div class="fh5co-blog animate-box">
					<a href="#"><img class="img-responsive" src="images/place-2.jpg" alt=""></a>
					<div class="blog-text">
						<div class="prod-title">
							<h3><a href="#">Planning for Vacation</a></h3>
							<span class="posted_by">Sep. 15th</span>
							<span class="comment"><a href="">21<i class="icon-bubble2"></i></a></span>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
							<p><a href="#">Learn More...</a></p>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix visible-sm-block"></div>
			<div class="col-lg-4 col-md-4 col-sm-6">
				<div class="fh5co-blog animate-box">
					<a href="#"><img class="img-responsive" src="images/place-3.jpg" alt=""></a>
					<div class="blog-text">
						<div class="prod-title">
							<h3><a href="#">Visit Tokyo Japan</a></h3>
							<span class="posted_by">Sep. 15th</span>
							<span class="comment"><a href="">21<i class="icon-bubble2"></i></a></span>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
							<p><a href="#">Learn More...</a></p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6">
				<div class="fh5co-blog animate-box">
					<a href="#"><img class="img-responsive" src="images/place-4.jpg" alt=""></a>
					<div class="blog-text">
						<div class="prod-title">
							<h3><a href="#">30% Discount to Travel</a></h3>
							<span class="posted_by">Sep. 15th</span>
							<span class="comment"><a href="">21<i class="icon-bubble2"></i></a></span>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
							<p><a href="#">Learn More...</a></p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6">
				<div class="fh5co-blog animate-box">
					<a href="#"><img class="img-responsive" src="images/place-5.jpg" alt=""></a>
					<div class="blog-text">
						<div class="prod-title">
							<h3><a href="#">Planning for Vacation</a></h3>
							<span class="posted_by">Sep. 15th</span>
							<span class="comment"><a href="">21<i class="icon-bubble2"></i></a></span>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
							<p><a href="#">Learn More...</a></p>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix visible-sm-block"></div>
			<div class="col-lg-4 col-md-4 col-sm-6">
				<div class="fh5co-blog animate-box">
					<a href="#"><img class="img-responsive" src="images/place-6.jpg" alt=""></a>
					<div class="blog-text">
						<div class="prod-title">
							<h3><a href="#">Visit Tokyo Japan</a></h3>
							<span class="posted_by">Sep. 15th</span>
							<span class="comment"><a href="">21<i class="icon-bubble2"></i></a></span>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
							<p><a href="#">Learn More...</a></p>
						</div>
					</div>
				</div>
			</div> -->
			<div class="clearfix visible-md-block"></div>
		</div>

	</div>
</div>
<!-- fh5co-blog-section -->
<!-- <div id="fh5co-testimonial" style="background-image:url(images/img_bg_1.jpg);">
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
</div> -->