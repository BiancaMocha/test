

<?php
include('includes/connection.php');
include('includes/functions.php');

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
					<form class="search" action="index.php" method="post">
						<div>
							<input type="search" name="search" placeholder="Search Our Blog" value="<?php echo (isset($_REQUEST['search']) ? $_REQUEST['search'] : ''); ?>">
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
				<h2 class="page-header">Latest in our Beer World</h2>

				<?php
				// i is the counter of columns in each row

					$i = 0;
					$did_open_row = false;
					// if we get any results assign basic variables and loop through the posts
					//sending the query to blog posts in descending order
					if(isset($_REQUEST['search']) && !empty($_REQUEST['search']))
					{
						$search = $_REQUEST['search']; // HOMEWORK: mysqli escape string
							$query = "SELECT * FROM blog WHERE title LIKE '%$search%' OR content LIKE '%$search%' ORDER BY id DESC";

					}

					else
						$query = "SELECT * FROM blog ORDER BY id DESC ";
					//store the result
					$result = mysqli_query( $conn, $query );
					if(mysqli_num_rows($result) > 0){

						while($row = mysqli_fetch_assoc($result)){
									$i++;
									$title = $row['title'];
									$content = $row['content'];
				?>

				<?php if($i % 3 == 0) { $did_open_row = true;// when i = 3, a new row starts?>

			<div class="row">

				<?php } ?>

				<div class="col-md-4">
						<div class="blog-post">

								<span class="blog-featured">	<img src="uploads/<?php echo urlencode($title); ?>.jpg" class=" img-responsive "></span><br>
									<h3 class="page-header"><?php echo $title; ?></h3>
									<p>	<?php echo excerpt_length($content) .'. . .' . '<a href="post.php?id=' . $row['id'] . '" class="text text-danger"> Read More</a>'; ?>		</p>

					</div>
        </div>
        <?php if($did_open_row) { ?>
      </div>
	     <?php } } } ?>
			 <div class="container text-center">
				 <a href="archive.php" class="btn btn-success"> View all posts </a>
			 </div>
		</div>
	</section>



	<?php include('includes/footer.php'); ?>
