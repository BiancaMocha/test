<?php

		if (isset($_POST["submit"])) {
				$name = $_POST['name'];
				$email = $_POST['email'];
				$message = $_POST['message'];
				$human = intval($_POST['human']);
				$from = 'Contact Form';
				$to = 'fsheremetyeva@yahoo.com';
				$subject = 'Message from Obatzda Contact Form ';

				$body = "From: $name\n E-Mail: $email\n Message:\n $message";

				// Check if name has been entered
				if (!$_POST['name']) {
						$errName = 'Please enter your name';
				}

				// Check if email has been entered and is valid
				if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
						$errEmail = 'Please enter a valid email address';
				}

				//Check if message has been entered
				if (!$_POST['message']) {
						$errMessage = 'Please enter your message';
				}
				//Check if simple anti-bot test is correct
				if ($human !== 5) {
						$errHuman = 'Your anti-spam is incorrect';
				}

// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
		if (mail ($to, $subject, $body, $from)) {
				$result='<div class="alert alert-success">Thank You! I will be in touch</div>';
		} else {
				$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
		}
}
		}

	include('includes/header.php');
 ?>


	<section class="hero" >
		<div class="container-fluid hero-content">
			<h1> Contact </h1>
		</div>
	</section>

	<section class="section-main">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="page-heading">Contact Us</h2>
					<form role="form" class="form-horizontal" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
							<div class="form-group">
								<label>Name</label>
								<input type="text" class="form-control" name="name" placeholder="Enter name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
								<?php echo "<p class='text-danger'>$errName</p>";?>
							</div>
							<div class="form-group">
								<label>Email address</label>
								<input type="email" class="form-control" name="email" placeholder="Enter email" value="<?php echo htmlspecialchars($_POST['email']); ?>">
								<?php echo "<p class='text-danger'>$errEmail</p>";?>
							</div>

							<div class="form-group">
								<label>Message</label>
								<textarea class="form-control" name="message"><?php echo htmlspecialchars($_POST['message']);?></textarea>
								<?php echo "<p class='text-danger'>$errMessage</p>";?>
							</div>
							<div class="form-group">
			 					<label for="human" class="control-label">2 + 3 = ?</label>
					 			<input type="text" class="form-control" id="human" name="human" placeholder="Your Answer">
								<?php echo "<p class='text-danger'>$errHuman</p>";?>
			 				</div>
							<button type="submit" name="submit" class="btn btn-success">Submit</button>
						</form>
						<?php echo $result; ?>
				</div>
			</div>
		</div>
	</section>


<?php include('includes/footer.php'); ?>
