<?php 
require_once "config.php";
session_start(); 
if(isset($_POST['sub']))
{
$uname = $_POST['uname'];
$upassword = $_POST['upassword'];

$res = mysqli_query($mysqli,"select* from user where uname='$uname'and upassword='$upassword'");
$result=mysqli_fetch_array($res);
if($result)
{

header("location:index.php");   // create my-account.php page for redirection 
	
}
else
{
	echo "failed ";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Login</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<!-- --------------style css --------------->
<link rel="stylesheet" href="../tutorial_10/style.css">

</head>
<body>
    <h1>Admin Login</h1>
<div class="login-form">
    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="js-form-message mb-3">
            <div class="js-focus-state input-group form" >
              <div class="input-group-prepend form__prepend">
                <span class="input-group-text form__text">
                  <i class="fa fa-user form__text-inner"></i>
                </span>
              </div>
              <input type="text" class="form-control" name="uname" required="" placeholder="Enter your  name">         
        </div>
		<div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fa fa-lock"></i>
                    </span>                    
                </div>
                <input type="password" class="form-control" name="upassword" required="" placeholder="password">
            </div>
        </div> 
        <div class="form-group mb-3">
        <input type="submit" name="sub" value="Login">
        </div>
    </form>
</div>
<a href="../tutorial_10/forget-password.php"><input type="submit"  name="forget-pwd" value="forget password"></a>
</body>
</html>