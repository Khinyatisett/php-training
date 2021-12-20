<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="../tutorial_06/style.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial_6</title>
</head>
<body>
<form action="index.php" method="post" enctype="multipart/form-data" id="form">
  Enter Folder Name <br>
  <input name="createfolder" type="text"> <br> <br>
  Choose Image <br> <br>
  <input type="file" name="image" accept="image/png, image/gif, image/jpeg"/>  <br> <br>
  <input type="submit" value="Upload Image" name="upload"/>
</form>
</body>
</html>

<?php

if (isset($_POST['upload'])){
    $folder_name=$_POST['createfolder'];
    @mkdir($output_dir . $folder_name);

    $tmp=$_FILES ['image']['tmp_name'];
    $img_name=$_FILES['image']['name'];
    $target_file="$folder_name/". $img_name;
    move_uploaded_file($tmp,$target_file);    
}

?>
