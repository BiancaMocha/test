<?php
session_start();

// if user is not logged in
if( !$_SESSION['loggedInUser'] ) {

    // send them to the login page
    header("Location: index.php");
}

// connect to database
include('includes/connection.php');

// include functions file
include('includes/functions.php');

// if add button was submitted
if( isset( $_POST['add'] ) ) {

    // set all variables to empty by default
    $title = $category = $content  = "";

    // check to see if inputs are empty
    // create variables with form data
    // wrap the data with our function

    if( !$_POST["title"] ) {
        $titleError = "Please enter a title <br>";
    } else {
        $title = validateFormData( $_POST["title"] );
    }

    if( !$_POST["category"] ) {
        $categoryError = "Please enter a category <br>";
    } else {
        $category = validateFormData( $_POST["category"] );
    }

    if( !$_POST["content"] ) {
        $contentErorr = "Please enter content <br>";
    } else {
        $content = validateFormData( $_POST["content"] );
    }



    // if required fields have data
    if( $title && $category && $content ) {

        // create query
        $query = "INSERT INTO blog (id, title, category, content) VALUES (NULL, '$title', '$category', '$content')";
        $result = mysqli_query( $conn, $query );

        // picture code
        $target_dir = "uploads/";
$target_file = $target_dir . urlencode($title) . '.jpg';
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
} else {
    echo "Sorry, there was an error uploading your file.";
}

        // if query was successful
        if( $result ) {

            // refresh page with query string
            header( "Location: index.php?alert=success" );
        } else {

            // something went wrong
            echo "Error: ". $query ."<br>" . mysqli_error($conn);
        }

    }

}

// close the mysql connection
mysqli_close($conn);


include('includes/header.php');
?>
<section class="hero" >
  <div class="container-fluid hero-content">
    <h1> Admin </h1>
  </div>
</section>
<section class="section-dark">
  <div class="container">
    <form action="" method="post" enctype="multipart/form-data">
      Select image to upload:
      <input type="file" name="fileToUpload" id="fileToUpload">
    <div class="form-group ">
        <label for="title" >Title</label>
        <input type="text" class="form-control" id="title" name="title" value="">
    </div>
    <div class="form-group ">
        <label for="category" >Category</label>
        <input type="text" class="form-control" id="cagegory" name="category" value="">
    </div>
    <div class="form-group ">
        <label for="content" >Content</label>
        <textarea class="form-control" rows="10" id="content"  name="content"></textarea>
    </div>
    <button type="submit" class="btn btn-success" name="add">Submit</button>
</form>
  </div>
</section>
