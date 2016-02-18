<?php
include('includes/connection.php');
include('includes/functions.php');

$postID = $_GET['id'];
//sending the query to blog posts in descending order
$query = "SELECT * FROM blog WHERE id=$postID ";
//store the result
$result = mysqli_query( $conn, $query );
include('includes/header.php'); ?>


	<section class="hero">
		<div class="container-fluid hero-content">
		</div>
	</section>

	<section class="section-main">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
            <article class="post">
  		    		<header>
  		    			<h1>Blog title here</h1>
  		    		</header>

						<?php	if(mysqli_num_rows($result) > 0){

								while($row = mysqli_fetch_assoc($result)){
											$title = $row['title'];
											$content = $row['content'];
											?>
  		    		<div class="post-body">
								<div class="post-image">										
									<img src="uploads/<?php echo urlencode($title); ?>.jpg" class=" img-responsive ">
						    </div><!-- post-image -->
  						  <h2><?php echo $tile; ?></h2>
  							<p><?php echo $content; ?></p>
							<?php } } ?>
  		    	</article><!-- post -->
				</div>
			</div>
		</div>
	</section>


<?php include('includes/footer.php'); ?>
