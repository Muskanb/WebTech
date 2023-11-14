
<?php

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_FILES["resume"])){
    $upload_dir="uploads/";
    $filename=$upload_dir.basename($_FILES["resume"]["name"]);
    $fileType = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    // Check if the file is a PDF
    if ($fileType === 'pdf') {
        if (move_uploaded_file($_FILES['resume']['tmp_name'], $filename)) {
            echo '<p>Resume uploaded successfully!</p>';
        } else {
            echo '<p>Sorry, there was an error uploading your file.</p>';
        }
    } else {
        echo '<p>Invalid file format. Please upload a PDF file.</p>';
    }
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Upload</title>
</head>
<body>
    <!-- important enc type!!! -->
    <form action="" method="post" enctype="multipart/form-data" >
        <label for="resume">Resume:</label>
        <input type="file" name="resume" id="resume">
        <button>Submit</button>
    </form>
</body>
</html>