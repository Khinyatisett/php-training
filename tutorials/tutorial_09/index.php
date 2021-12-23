<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../tutorial_08/style.css">
    <title>Students Information</title>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="mt-5 mb-3 clearfix">
                <h2 class="pull-left">Students Information</h2>
                <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New Students</a>
            </div>
            </div>
        </div>        
    </div>
</div>
<div style="text-align: center"> <a href="data.php"> <input type="button" value="View Age Chart"> </a></div>
</body>
</html>

<?php
require_once "config.php";
$sql = "SELECT * FROM students";
if ($result = $mysqli->query($sql)) {
    if($result->num_rows > 0) {
        echo '<table class="table table-bordered table-striped">';
        echo "<thead>";
        echo "<tr>";
        echo "<th>Roll</th>";
        echo "<th>Father Name</th>";
        echo "<th>Name</th>";
        echo "<th>Major</th>";
        echo "<th>Address</th>";
        echo "<th>Age</th>";
        echo "<th>Action</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
            while ($row = $result->fetch_array()) {
                echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['fathername'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['major'] . "</td>";
                    echo "<td>" . $row['address'] . "</td>";
                    echo "<td>" . $row['age'] . "</td>";
                    echo "<td>";
                    echo '<a href="read.php?id='. $row['id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                    echo '<a href="update.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                    echo '<a href="delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                    echo "</td>";
                echo "</tr>";
                }
        echo "</tbody>";                            
        echo "</table>";                    
    $result->free(); } else {
        echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
      }  } else {
            echo "Oops! Something went wrong. Please try again later.";
          }
    $mysqli->close();
?>