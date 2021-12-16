<?php 
    session_start(); 
    if ( isset($_POST['submit'] ) ) 
    {
        $logins = array('Mg Mg' => '123','Su Su' => '456','Mya Mya' => '789');
            $username = isset($_POST['username']) ? $_POST['username'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';

    if (isset($logins[$username]) && $logins[$username] == $password) 
        {
            $_SESSION['userData']['username']=$logins[$username];
            header("location:index.php");
            exit;
        } 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<form action="" method="post" name="Login_Form">
	Enter your name <br>
	<input name="username" type="text" class="Input"> <br> <br>
	Enter your password <br> 
	<input name="password" type="password" class="Input"><br> <br>
	<input name="submit" type="submit" value="Login" class="Button3">
</form>
</body>
</html>