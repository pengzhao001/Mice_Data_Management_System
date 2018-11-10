<?php
include 'connect.php';
include 'header.php';
?>
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "mouse_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
/*
 * sql1 means the mice who has the test on three months
 * sql2 means the mice who has the test on six months
 * sql3 means the mice who has the test on nine months
 * sql4 means the mice who has the test on eighteen months
 */
//$sql1 = "SELECT count(*) from review_record where abs(DATEDIFF(test_date, DOB))<105 and abs(DATEDIFF(test_date, DOB))>75";
//$sql2 = "SELECT count(*) from review_record where abs(DATEDIFF(test_date, DOB))<195 and abs(DATEDIFF(test_date, DOB))>165";
//$sql3 = "SELECT count(*) from review_record where abs(DATEDIFF(test_date, DOB))<285 and abs(DATEDIFF(test_date, DOB))>255";
//$sql4 = "SELECT count(*) from review_record where abs(DATEDIFF(test_date, DOB))<555 and abs(DATEDIFF(test_date, DOB))>525";

// in 3 months not in 6 months
$sql1="SELECT sub_id from review_view where abs(DATEDIFF(test_date, dob))<105 and abs(DATEDIFF(test_date, dob))>75
AND sub_id NOT IN
(SELECT sub_id from review_view where abs(DATEDIFF(test_date, dob))<195 and abs(DATEDIFF(test_date, dob))>165)";

// in 6 months not in 9 months
$sql2="SELECT sub_id from review_view where abs(DATEDIFF(test_date, dob))<195 and abs(DATEDIFF(test_date, dob))>165
AND sub_id NOT IN
(SELECT sub_id from review_view where abs(DATEDIFF(test_date, dob))<285 and abs(DATEDIFF(test_date, dob))>255)";

// in 9 months not in 18 months
$sql3="SELECT sub_id from review_view where abs(DATEDIFF(test_date, dob))<285 and abs(DATEDIFF(test_date, dob))>255
AND sub_id NOT IN
(SELECT sub_id from review_view where abs(DATEDIFF(test_date, dob))<555 and abs(DATEDIFF(test_date, dob))>525)";

// in 18 months
$sql4 = "SELECT sub_id from review_view where abs(DATEDIFF(test_date, dob))<555 and abs(DATEDIFF(test_date, dob))>525";

// others
$sqlo = "SELECT sub_id from review_view where abs(DATEDIFF(test_date, dob))<=75 or abs(DATEDIFF(test_date, dob))>=555 or abs(DATEDIFF(test_date, dob)) is NULL ";

$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);
$result3 = $conn->query($sql3);
$result4 = $conn->query($sql4);
$result5 = $conn->query($sqlo);

$val1=0;$val2=0;$val3=0;$val4=0;$val5=0;
if ($result1->num_rows > 0) {
    while($row1 = $result1->fetch_assoc()) {
//        echo $row1['count(*)'];
//        $val1=$row1['count(*)'];
        $val1++;
    }

} else {
    //echo "0 results";
}
if ($result2->num_rows > 0) {
    while($row2 = $result2->fetch_assoc()) {
//        echo $row2['count(*)'];
//        $val2=$row2['count(*)'];
        $val2++;
    }

} else {
    //echo "0 results";
}
if ($result3->num_rows > 0) {
    while($row3 = $result3->fetch_assoc()) {
//        echo $row3['count(*)'];
//        $val3=$row3['count(*)'];
        $val3++;
    }

} else {
    //echo "0 results";
}
if ($result4->num_rows > 0) {
    while($row4 = $result4->fetch_assoc()) {
//        echo $row4['count(*)'];
//        $val4=$row4['count(*)'];
        $val4++;
    }

} else {
    //echo "0 results";
}
if ($result5->num_rows > 0) {
    while($row5 = $result5->fetch_assoc()) {
//        echo $row4['count(*)'];
//        $val4=$row4['count(*)'];
        $val5++;
    }
} else {
    //echo "0 results";
}
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
    <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>

    <link href="http://www.jqueryscript.net/css/top.css" rel="stylesheet" type="text/css">
    <script src="js/jquery.scrollToTop.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "scrollY": 400,
                "scrollX": true
            });
            $('#example1').DataTable({
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
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

        // Load the Visualization API and the piechart package.
        google.load('visualization', '1.0', {'packages':['corechart']});

        // Set a callback to run when the Google Visualization API is loaded.
        google.setOnLoadCallback(drawChart);

        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.
        function drawChart() {

            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');
            data.addRows([
                ['3months', <?php echo $val1?>],
                ['6months', <?php echo $val2?>],
                ['9months', <?php echo $val3?>],
                ['18months', <?php echo $val4?>],
                ['Others', <?php echo $val5?>]
            ]);

            // Set chart options
            var options = {'title':'Number of Mice has been tested in different periods',fontSize:25,
                'width':900,
                'height':400};

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));

            function selectHandler() {
                var selectedItem = chart.getSelection()[0];
                if (selectedItem) {
                    var topping = data.getValue(selectedItem.row, 0);
//                    alert('The user selected ' + topping);
                    window.location.href = "liu_analysis.php?name=" + topping;
                }
            }

            google.visualization.events.addListener(chart, 'select', selectHandler);
            chart.draw(data, options);
        }
    </script>
</head>
<div class="row">
    <div class="span3 bs-docs-sidebar">
        <ul class="nav nav-list bs-docs-sidenav">
            <li><a href="liu.php#testlist"><i class="icon-chevron-right"></i>Test List</a>
            </li>
            <li><a href="liu.php#threemonths"><i class="icon-chevron-right"></i>3 Months</a>
            </li>
            <li><a href="liu.php#sixmonths"><i class="icon-chevron-right"></i>6 Months</a>
            </li>
            <li><a href="liu.php#ninemonths"><i class="icon-chevron-right"></i>9 Months</a>
            </li>
            <li><a href="liu.php#eighteenmonths"><i class="icon-chevron-right"></i>18 Months</a>
            </li>
            <li><a href="liu_analysis.php"><i class="icon-chevron-right"></i>Analysis</a>
            </li>

        </ul>
    </div>

    <div class="span9">
        <section id="testlist">
            <div class="page-header">
                <h1>Analysis</h1>
            </div>
            <!--Div that will hold the pie chart-->
            <div id="chart_div"></div>
            <div class="page-header">
                <?php
                $name = $_GET['name'];
                ?>
                <h1>Mice List Tested In <?php echo $name;?> But Haven't In Next Period</h1>
            </div>
            <div class="scroll">

                <?php
                // in 3 months not in 6 months
                $sql1="SELECT sub_id from review_view where abs(DATEDIFF(test_date, dob))<105 and abs(DATEDIFF(test_date, dob))>75
AND sub_id NOT IN
(SELECT sub_id from review_view where abs(DATEDIFF(test_date, dob))<195 and abs(DATEDIFF(test_date, dob))>165)";

                // in 6 months not in 9 months
                $sql2="SELECT sub_id from review_view where abs(DATEDIFF(test_date, dob))<195 and abs(DATEDIFF(test_date, dob))>165
AND sub_id NOT IN
(SELECT sub_id from review_view where abs(DATEDIFF(test_date, dob))<285 and abs(DATEDIFF(test_date, dob))>255)";

                // in 9 months not in 18 months
                $sql3="SELECT sub_id from review_view where abs(DATEDIFF(test_date, dob))<285 and abs(DATEDIFF(test_date, dob))>255
AND sub_id NOT IN
(SELECT sub_id from review_view where abs(DATEDIFF(test_date, dob))<555 and abs(DATEDIFF(test_date, dob))>525)";

                // in 18 months
                $sql4 = "SELECT sub_id from review_view where abs(DATEDIFF(test_date, dob))<555 and abs(DATEDIFF(test_date, dob))>525";

                // others
                $sqlo = "SELECT sub_id from review_view where abs(DATEDIFF(test_date, dob))<=75 or abs(DATEDIFF(test_date, dob))>=555 or abs(DATEDIFF(test_date, dob)) is NULL ";


                if($name=='3months'){
                    $sql5=$sql1;
                }elseif($name=='6months'){
                    $sql5=$sql2;
                }elseif($name=='9months'){
                    $sql5=$sql3;
                }elseif($name=='18months'){
                    $sql5=$sql4;
                }elseif($name=='Others'){
                    $sql5=$sqlo;
                }else{
                    $sql5 = "SELECT sub_id FROM review_view";
                }
                $result = $conn->query($sql5);

                if ($result->num_rows > 0) {
                    echo "<table id=\"example\" class=\"display\" cellspacing=\"0\" width=\"100%\">
        <thead>
            <tr>
                <th>Mouse#</th>
                <th>Choose</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Mouse#</th>
                <th>Choose</th>
            </tr>
        </tfoot>
        <tbody>";
                    while($row = $result->fetch_assoc()) {
                        echo '<tr>
		<td>' . $row["sub_id"]. '</td>
		<td>
		         <form action="datacollection.php" method="post">
                      <input type="hidden" value="'.$row['sub_id'].'" name="mouse_id">
                      <input type="submit" value="Details">
                 </form>
		</td>
		</tr>';
                    }
                    echo " </tbody>
    </table>";
                } else {
                    echo "0 results";
                }

                $conn->close();
                ?>
            </div>
        </section>
    </div>
    <a href="#top" id="toTop"></a>
</div>
</html>

<?php
if(!isset($_POST["add_genotype"])) {exit;}
?>

<?php
include 'footer.php';
?>




