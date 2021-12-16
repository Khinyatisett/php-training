<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="POST">
        <input type="date" name="date" id="date">
        <br> <br>
        <input type="submit" name="submit" value="Calculate">
    </form>
    <?php
    if(isset($_POST['submit'])){
        $dateOfBirth = $_POST['date'];
        $today = date("Y/m/d");
        $age = date_diff(date_create($dateOfBirth), date_create($today));
        echo 'Your age is '.$age->format('%y');
    }
    ?>
</body>
</html>