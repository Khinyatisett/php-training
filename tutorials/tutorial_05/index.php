
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
</body>
</html>

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
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$spreadsheet = $reader->load("sample.xlsx");
$sheetArray = $spreadsheet->getActiveSheet()->toArray();
foreach($sheetArray as $sheet){
  foreach($sheet as $data) {
    echo $data5t6y;
  }
}
?>

