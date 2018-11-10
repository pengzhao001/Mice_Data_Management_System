<?php
include 'connect.php';
include 'header.php';
$inni = 4;
?>
<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
    <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>

    <link href="http://www.jqueryscript.net/css/top.css" rel="stylesheet" type="text/css">
    <script src="js/jquery.scrollToTop.min.js"></script>	

    <script>
        $(document).ready(function() {
            $('#Gender').DataTable({
                "scrollY": 400,
                "scrollX": true
            });
			  $('#Colony').DataTable({
                "scrollY": 400,
                "scrollX": true
            });


        } );
    </script>
    <script type="text/javascript">
        $(function() {
            $("#toTop").scrollToTop(1000);
        });
    </script>
    <style>
        #toTop {
            display: none;
            position: fixed;
            bottom: 5px;
            right: 5px;
            width: 64px;
            height: 64px;
            background-image: url('css/image/up.png');
            background-repeat: no-repeat;
            opacity: 0.4;
            filter: alpha(opacity=40); /* For IE8 and earlier */
        }
        #toTop:hover {
            opacity: 0.8;
            filter: alpha(opacity=80); /* For IE8 and earlier */
        }
    </style>
</head>




<div class="row">
    <div class="span3 bs-docs-sidebar">
        <ul class="nav nav-list bs-docs-sidenav">
            <li><a href="liutest2.php"><i class="icon-chevron-right"></i>Gender VS. Genotype</a>
            </li>
            <li><a href="liu5.php"><i class="icon-chevron-right"></i>Jaw Rate Analysis</a>
            </li>
            <li><a href="liu6.php"><i class="icon-chevron-right"></i>Time Analysis</a>
            </li>
            <li><a href="summary.php"><i class="icon-chevron-right"></i>Gender Distribution</a>
            </li>
            <li><a href="liu_analysis.php"><i class="icon-chevron-right"></i>Testing Age Summary</a>
            </li>

        </ul>
    </div>
<div  class= "span9">

<section id="Gender">

<div class="page-header">
<h1>Analysis</h1>
</div>

<?php
$sex_array = [];
$gender_query = "SELECT sex, count(*) FROM subject GROUP BY sex;";
$gender_result = mysql_query($gender_query);        
            
if (mysql_num_rows ($gender_result) > 0) 
{
 echo "
 <table id=\"Gender\" class=\"display\" cellspacing=\"0\" width=\"100%\" align = \"center\">
        <thead>
            <tr>
                <th>Gender</th>
                <th>Count</th>
            </tr>
        </thead>
		        <tfoot>
            <tr>
                <th>Gender</th>
                <th>Count</th>
            </tr>
        </tfoot>
        <tbody alig=\"center\">";
        while($row = mysql_fetch_assoc($gender_result)) {
        array_push($sex_array,$row["count(*)"]);
        echo '<tr>
		<td>' . $row["sex"]. '</td>
		<td>' . $row["count(*)"] . '</td>
		</tr>';
		}
                    echo " </tbody>
    </table>";
} 

				else {
                    echo "No summary found.";
                }

?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Sex', 'Count'],
          ['Female',    <?php echo $sex_array[0]; ?>],
          ['Male',      <?php echo $sex_array[1]; ?>]
        ]);

        var options = {
          title: 'Gender Distribution'
        };

        var chart = new google.visualization.PieChart(document.getElementById('gender_dist'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="gender_dist" style="width: 900px; height: 500px;"></div>
  </body>
</html>
</section>   <!--gender section end -->




<section id = "Colony">







</section>

</div>  <!--span9 end -->

</div>  <!--row end -->
<br><br><br>

<?php
if(!isset($inni)) {exit;}
?>

<?php
include 'footer.php';
?>



