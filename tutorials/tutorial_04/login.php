<?php 
    session_start(); 
    if ( isset($_POST['Submit'] ) ) 
    {
        $logins = array('Mg Mg' => '123','Su Su' => '456','Mya Mya' => '789');
            $Username = isset($_POST['Username']) ? $_POST['Username'] : '';
            $Password = isset($_POST['Password']) ? $_POST['Password'] : '';


    if (isset($logins[$Username]) && $logins[$Username] == $Password) 
        {
            $_SESSION['UserData']['Username']=$logins[$Username];
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
    <title>Document</title>
</head>
<body>
<form action="" method="post" name="Login_Form">
	Enter your name <br>
	<input name="Username" type="text" class="Input"> <br> <br>
	Enter your password <br> 
	<input name="Password" type="password" class="Input"><br> <br>
	<input name="Submit" type="submit" value="Login" class="Button3">
</form>
</body>
</html>