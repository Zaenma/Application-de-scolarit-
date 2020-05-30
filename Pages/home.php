			<?php include 'include/diapos.php' ?>
			<div id="fh5co-features">
				<div class="container">
					<div class="row">
						<div class="col-md-4 animate-box">
							<div class="feature-left">
								<span class="icon">
									<i class="icon-hotairballoon"></i>
								</span>
								<div class="feature-copy">
									<h3>Family Travel</h3>
									<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
									<p><a href="#">Learn More</a></p>
								</div>
							</div>
						</div>
						<div class="col-md-4 animate-box">
							<div class="feature-left">
								<span class="icon">
									<i class="icon-search"></i>
								</span>
								<div class="feature-copy">
									<h3>Travel Plans</h3>
									<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
									<p><a href="#">Learn More</a></p>
								</div>
							</div>
						</div>
						<div class="col-md-4 animate-box">
							<div class="feature-left">
								<span class="icon">
									<i class="icon-wallet"></i>
								</span>
								<div class="feature-copy">
									<h3>Honeymoon</h3>
									<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
									<p><a href="#">Learn More</a></p>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 animate-box">

							<div class="feature-left">
								<span class="icon">
									<i class="icon-wine"></i>
								</span>
								<div class="feature-copy">
									<h3>Business Travel</h3>
									<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
									<p><a href="#">Learn More</a></p>
								</div>
							</div>

						</div>

						<div class="col-md-4 animate-box">
							<div class="feature-left">
								<span class="icon">
									<i class="icon-genius"></i>
								</span>
								<div class="feature-copy">
									<h3>Solo Travel</h3>
									<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
									<p><a href="#">Learn More</a></p>
								</div>
							</div>

						</div>
						<div class="col-md-4 animate-box">
							<div class="feature-left">
								<span class="icon">
									<i class="icon-chat"></i>
								</span>
								<div class="feature-copy">
									<h3>Explorer</h3>
									<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
									<p><a href="#">Learn More</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="fh5co-blog-section" class="fh5co-section-gray">
				<div class="container">
					<div class="row">
						<div class="text-center heading-section animate-box">
							<h3>Recent From Blog</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit est facilis maiores,
								perspiciatis accusamus asperiores sint consequuntur debitis.</p>
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
						<!-- <div class="clearfix visible-md-block"></div> -->
					</div>
					<div class="col-md-12 text-center animate-box">
						<p><a class="btn btn-primary btn-outline btn-lg" href="index.php?page=blog">Tous les articles <i class="icon-arrow-right22"></i></a></p>
					</div>

				</div>
			</div>