<?php include('includes/header.php'); ?>


	<section class="section-main">
		<div class="container">
			<div id="my-carousel" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
					<li data-target="#my-carousel" data-slide-to="0" class="active"></li>
					<li data-target="#my-carousel" data-slide-to="1"></li>
					<li data-target="#my-carousel" data-slide-to="2"></li>
					</ol>

					<!-- Wrapper for slides -->
					<div class="carousel-inner">
					<div class="item active">
						<img src="img/dummy.jpg" alt="...">
					</div>
					<div class="item">
						<img src="img/showcase.jpg" alt="...">
					</div>
					<div class="item">
						<img src="img/dummy.jpg" alt="...">
					</div>
					</div>

					<!-- Controls -->
					<a class="left carousel-control" href="#my-carousel" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
					</a>
					<a class="right carousel-control" href="#my-carousel" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
					</a>
				</div>
				<section class="section-secondary">
					<div class="container">
						<div class="row">
								<div class="col-md-6">
								<form class="search">
									<div>
										<input type="search" placeholder="Search Our Blog">
										<button type="submit" value=""><img src="img/search.png" alt="Search"></button>
									</div>
								</form>
							</div>
							<div class="col-md-6">
									<!-- TODO   DROPDOWN MENU -->
							</div>
						</div>
					</div>
				</section>
	</section>





	<!-- TODO TABLE -->

	<?php include('includes/footer.php'); ?>
