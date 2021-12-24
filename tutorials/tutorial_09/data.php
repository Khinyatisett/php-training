<?php
$con  = mysqli_connect("localhost","root","aryaryar","db");
if (!$con) {
    echo "Problem in database connection! Contact administrator!" ;
} else {
         $sql ="SELECT * FROM students ORDER BY id";
         $result = mysqli_query($con,$sql);
         $chart_data="";
         while ($row = mysqli_fetch_array($result)) { 
            $name[]  = $row['name']  ;
            $marks[] = $row['marks'];
        }
}

?>
<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Graph</title> 
    </head>
    <body>
        <div style="width:50%;height:50%;text-align:center">
            <h3>Student Marks</h3>
            <canvas  id="chartjs_bar"></canvas> 
        </div>    
    </body>
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">
      var ctx = document.getElementById("chartjs_bar");
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($name); ?>,
                        datasets: [{
                          backgroundColor: [
                               "#5969ff",
                                "#ff407b",
                                "#25d5f2",
                                "#ffc750",
                                "#2ec551",
                                "#7040fa",
                                "#ff004e"
                            ],
                            data:<?php echo json_encode($marks); ?>,
                        }]
                    },
                    options: {
                           legend: {
                        display: true,
                        position: 'bottom', 
                    },
                }
                });
    </script>
</html>