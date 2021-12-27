<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../tutorial_10/style.css">
</head>
<body>
<div class="login-form">
<h3>Change Password</h3>						
    <form id="forgetForm" method="POST">
		<div id="inputSection">						
			<div class="form-group">
				<input type="email" name="userEmail" class="form-control" placeholder="Old Password" />
			</div>
			<div class="form-group">
				<input type="email" name="userEmail" class="form-control" placeholder="New Password" />
			</div>
		</div>						
    </form>	
	<a href="../tutorial_10/reset-password.php"><input type="submit" class="btnSubmit" value="Confirm" /></a>
</div>
</body>
</html>