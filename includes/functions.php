<?php
function validateFormData( $formData ) {
    $formData = trim( stripslashes( htmlspecialchars( $formData ) ) );
    return $formData;
}


function excerpt_length($body){

  $rest = substr($body, 0, strpos($body, '. ',(strpos($body, '. ')+1)));
  return $rest ;


}


 ?>
