<?php
include('phpqrcode/qrlib.php');
function getUsernameFromEmail($email) {
	  $find = '@';
	  $pos = strpos($email, $find);
	  $username = substr($email, 0, $pos);
	  return $username;
}

if (isset($_POST['submit']) ) {
	  $tempDir = 'temp/'; 
	  $email = $_POST['mail'];
	  $filename = getUsernameFromEmail($email);
	  $codeContents = 'mailto:'.$email.'?subject='.urlencode($subject).'&body='.urlencode($body); 
	  QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="../tutorial_07/style.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Generating QR code</title>
</head>
<body>
<div>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
<label>Email</label>
  <input type="email" class="form-control" name="mail" style="width:20em;" placeholder="Enter your Email" value="<?php echo @$email; ?>" required /> <br> <br>
  <input type="submit" name="submit" class="submitBtn" value="Generate QR code" />
</form>

<?php
	  if(!isset($filename)){
		$filename = "author";
	}
?>
<h3>QR Code Result: </h3>
<?php 
    echo '<img src="temp/'. @$filename.'.png" style="width:200px; height:200px;"><br>'; 
?>
</div>
</div>
</body>
</html>