<?php
// upload.php

// Assuming the form field name is 'profileImage'
if (isset($_FILES['profileImage'])) {
    $uploadedFileName = $_FILES['profileImage']['name'];
    $destination = 'images/' . $uploadedFileName;

    // Move the uploaded file to the desired destination
    if (move_uploaded_file($_FILES['profileImage']['tmp_name'], $destination)) {
        // Return the file path as a response
        $imagePath = 'http://localhost/thermospace/' . $destination;
        echo $destination;
    } else {
        echo 'Error uploading file.';
    }
}
?>
