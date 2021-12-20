
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
    
<h3>(1) content of csv file</h3>
<?php
    $csv_fp = fopen("sample.csv", "r");
	  if ($csv_fp !== FALSE) {
?>
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


<h3>(2) Content for txt file</h3>
<?php
$fh = fopen('sample.txt','r');
    while ($line = fgets($fh)) {
    echo($line);
}
fclose($fh);
?>

<h3>(3) Content for doc file</h3>
<?php
    readfile('sample.doc');
?> 

<h3>(4) Content for xlsx file</h3>
<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
require 'vendor/autoload.php';

    $flsx_fp = fopen("sample.xlsx", "r");
	  if ($flsx_fp !== FALSE) {
?>
  <table id="table">
  <tr>
    <td>NAME</td>
    <td>GENDER</td>
  </tr>
<?php	
	  while (! feof($flsx_fp)) {
	  $data = fgetcsv($flsx_fp, 1000, ",");
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
	  fclose($flsx_fp);




/*$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$spreadsheet = $reader->load("sample.xlsx");
$sheetArray = $spreadsheet->getActiveSheet()->toArray();
    foreach ( $sheetArray as $sheet){
        foreach ($sheet as $data) {
        echo $data;
    }
}*/
?>

</body>
</html>

