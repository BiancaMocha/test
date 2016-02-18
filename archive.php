

<?php
include('includes/connection.php');
include('includes/functions.php');

//sending the query to blog posts in descending order
$query = "SELECT * FROM blog ORDER BY id DESC ";
//store the result
$result = mysqli_query( $conn, $query );


include('includes/header.php');
?>

	<section class="container-fluid section-showcase" data-type="background" data-speed="3">
		<div class=" showcase-content">
			<h1>Beer, Cheese and Pursuit of Happiness</h1>
			<div>
				<a href="#" class="btn btn-lg btn-primary"><span>Find a Brewery</span></a>
			</div>
		</div>
	</section>

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
				</div>
			</div>
		</div>
	</section>

	<section class="section-main">
		<div class="container">
			<h2 class="page-header">All Posts</h2>

				<?php
				// i is the counter of columns in each row

					$i = 0;
					$did_open_row = false;
					// if we get any results assign basic variables and loop through the posts
					if(mysqli_num_rows($result) > 0){

						while($row = mysqli_fetch_assoc($result)){

									$title = $row['title'];
									$content = $row['content'];
				?>
						<div class="blog-post">
									<h3 class="page-header"><?php echo $title; ?></h3>
									<p>	<?php echo excerpt_length($content) .'. . .' . '<a href="post.php?id=' . $row['id'] . '" class="text text-danger"> Read More</a>'; ?>	</p> <br>

					</div>

	     <?php } } ?>
		</div>
	</section>



	<?php include('includes/footer.php'); ?>
