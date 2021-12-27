<?php
require_once "config.php";
$fathername = $name = $major = $address = $age = $marks = "";
$fathername_err = $name_err = $major_err = $address_err = $age_err = $marks_err= "";

if (isset($_POST["id"]) && !empty($_POST["id"])) {
$id = $_POST["id"];
$input_fathername = trim($_POST["fathername"]);
    if (empty($input_fathername)){
        $fathername_err = "Please enter a name.";
    } elseif (!filter_var($input_fathername, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $fathername_err = "Please enter a valid name.";
    } else{
        $fathername = $input_fathername;
    }    

$input_name = trim($_POST["name"]);
    if (empty($input_name)) {
        $name_err = "Please enter a name.";
    } elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else {
        $name = $input_name;
    }

$input_major = trim($_POST["major"]);
    if (empty($input_major)) {
        $major_err = "Please enter your major.";     
    } else {
        $major = $input_major;
    }
    
$input_address = trim($_POST["address"]);
    if (empty($input_address)){
        $address_err = "Please enter an address.";     
    } else{
        $address = $input_address;  
    }

$input_age = trim($_POST["age"]);
    if (empty($input_age)){
        $age_err = "Please enter your age.";     
    } elseif(!ctype_digit($input_age)){
        $age_err = "Please enter a positive integer value.";
    } else{
        $age = $input_age;
    }

$input_marks = trim($_POST["marks"]);
    if (empty($input_age)){
        $marks_err = "Please enter total marks.";     
    } elseif(!ctype_digit($input_marks)){
        $marks_err = "Please enter a positive integer value.";
    } else{
        $marks = $input_marks;
    }    
    
    if (empty($fathername_err) && empty($name_err) && empty($major_err) && empty($address_err) && empty($age_err) && empty($marks_err)) {
        $sql = "UPDATE students SET fathername=?, name=?, major=?, address=?, age=? , marks=? WHERE id=?";
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("sssssss",$param_fathername, $param_name,$param_major, $param_address, $param_age, $param_marks , $param_id);
            $param_fathername = $fathername;
            $param_name = $name;
            $param_major = $major;
            $param_address = $address;
            $param_age = $age;
            $param_marks = $marks;
            $param_id = $id;
        if ($stmt->execute()){
            header("location: index.php");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
      }
        $stmt->close();
    }
    $mysqli->close();
} else {
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        $id =  trim($_GET["id"]);
        $sql = "SELECT * FROM students WHERE id = ?";
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("i", $param_id);
            $param_id = $id;
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                if ($result->num_rows == 1) {
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    $fathername = $row ["fathername"];
                    $name = $row["name"];
                    $major = $row ["major"];
                    $address = $row["address"];
                    $age = $row["age"];
                    $marks = $row["marks"];
                } else {
                    header ("location: error.php");
                    exit();
                }
                
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        $stmt->close();
        $mysqli->close();
    }  else {
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
  <title>Update Student information</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="../tutorial_08/style.css">
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-5">Update Student Information</h2>
                <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                    <div class="form-group">
                        <label>Father Name</label>
                        <input type="text" name="fathername" class="form-control <?php echo (!empty($fathername_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $fathername; ?>">
                        <span class="invalid-feedback"><?php echo $fathername_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                        <span class="invalid-feedback"><?php echo $name_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Major</label>
                        <input type="text" name="major" class="form-control <?php echo (!empty($major_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $major; ?>">
                        <span class="invalid-feedback"><?php echo $major_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea name="address" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>"><?php echo $address; ?></textarea>
                        <span class="invalid-feedback"><?php echo $address_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Age</label>
                        <input type="text" name="age" class="form-control <?php echo (!empty($age_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $age; ?>">
                        <span class="invalid-feedback"><?php echo $age_err;?></span>
                    </div>
                    <div class="form-group">
                        <label>Total Marks</label>
                        <input type="text" name="marks" class="form-control <?php echo (!empty($marks_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $marks; ?>">
                        <span class="invalid-feedback"><?php echo $marks_err;?></span>
                    </div>
                <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                <input type="submit" class="btn btn-primary" value="Submit">
                <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                </form>
            </div>
        </div>        
    </div>
</div>
</body>
</html>
