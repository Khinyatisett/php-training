<?php
if(isset($_POST["id"]) && !empty($_POST["id"])){
    require_once "config.php";
    $sql = "DELETE FROM students WHERE id = ?";
    if ($stmt = $mysqli->prepare($sql)){
        $stmt->bind_param("i", $param_id);
        $param_id = trim($_POST["id"]);
        if ($stmt->execute()){
            header("location: index.php");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    $stmt->close();
    $mysqli->close();
} else {
    if(empty(trim($_GET["id"]))){
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../tutorial_08/style.css">
</head>
<body>
<div class="wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <h2 class="mt-5 mb-3">Delete Student Information</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="alert alert-danger">
              <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
              <p>Are you sure you want to delete this employee record?</p>
              <p>
              <input type="submit" value="Yes" class="btn btn-danger">
              <a href="index.php" class="btn btn-secondary ml-2">No</a>
              </p>
            </div>
        </form>
      </div>
    </div>        
  </div>
</div>
</body>
</html>