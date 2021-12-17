<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="../tutorial_05/style.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>tutorial_05</title>
</head>
<body>

<?php
	$csv_fp = fopen("sample.csv", "r");
	if ($csv_fp !== FALSE) {
?>
  <h3>(1) content of csv file</h3>
  <table id="table">
  <tr>
    <td>NAME</td>
    <td>GENDER</td>
  </tr>
<?php	
	while (! feof($csv_fp)) {
	$data = fgetcsv($csv_fp, 1000, ",");
?>
  <tr class="data">
  <td><?php echo $data[0]; ?></td>
  <td><?php echo $data[1]; ?></td>
  </tr>
<?php
	}
?>
  </table> </br>
<?php	
	}
	fclose($csv_fp);
?>

<?php

$file = fopen("sample.txt","r");

while(! feof($file))
  {
  echo fgets($file). "<br />";
  }

fclose($file);
?>

</body>
</html>
