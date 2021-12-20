<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="../tutorial_06/style.css">
  <meta charset="UTF-8">
  <title>Tutorial 6</title>
</head>
<body>
  <div class="block">
  <form action="index.php" method="post" enctype="multipart/form-data">
      Upload a File:
      <input type="file" name="upload_image" id="image" accept="image/png, image/gif, image/jpeg" ><br><br>
      <input name="createfolder" type="text" id="folder_name"> <br> <br>
      <input type="submit" name="submit" value="Start Upload" id="submit"><br><br>
  </form>
  </div>
</body>
</html>

<?php

$folder_name=$_POST['createfolder'];
@mkdir($output_dir . $folder_name);
$errors = [];
$fileName = $_FILES['upload_image']['name'];
$fileSize = $_FILES['upload_image']['size'];
$fileTmpName  = $_FILES['upload_image']['tmp_name'];
$fileType = $_FILES['upload_image']['type'];
$uploadPath = "$folder_name/". basename($fileName); 

if (isset($_POST['submit'])) {
    if ($fileSize > 4000000) {
        $errors[] = "File exceeds maximum size (4MB)";
    }
    if (empty($errors)) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
        if ($didUpload) {
            echo "The file " . basename($fileName) . " has been uploaded";
        }
    } else {
        foreach ($errors as $error) {
            echo $error . "These are the errors" . "\n";
        }
    }
}

?>
