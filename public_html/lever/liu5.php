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
$sql1="select age,name,avg(rate) from (select m_id,avg(Jaw_rate) as rate,test_date,round(age_month,0) as age,name from consensus join (select sub_id,name from geno_type join (select * from subject natural join non_human_view natural join has_geno) as test on (geno_type.geno_id=test.geno_id) )as geno on (geno.sub_id=consensus.m_id)  group by m_id, age_month) as s group by s.age,s.name";
$sql2="select distinct(s2.name) from (select age,name,avg(rate) from (select m_id,avg(Jaw_rate) as rate,test_date,round(age_month,0) as age,name from consensus join (select sub_id,name from geno_type join (select * from subject natural join non_human_view natural join has_geno) as test on (geno_type.geno_id=test.geno_id) )as geno on (geno.sub_id=consensus.m_id)  group by m_id, age_month) as s group by s.age,s.name) as s2";
$sql3="select distinct(age) from (select age,name,avg(rate) from (select m_id,avg(Jaw_rate) as rate,test_date,round(age_month,0) as age,name from consensus join (select sub_id,name from geno_type join (select * from subject natural join non_human_view natural join has_geno) as test on (geno_type.geno_id=test.geno_id) )as geno on (geno.sub_id=consensus.m_id)  group by m_id, age_month) as s group by s.age,s.name) as s2";

$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);
$result3 = $conn->query($sql3);

$name=array();$age=array();$total=array();
$num=0;$num1=0;
if ($result2->num_rows > 0) {
    while($row2 = $result2->fetch_assoc()) {
        array_push($name,$row2["name"]);
        $num++;
    }

} else {
    echo "0 results";
}
if ($result3->num_rows > 0) {
    while($row3 = $result3->fetch_assoc()) {
        array_push($age,$row3["age"]);
        $num1++;
    }

} else {
    echo "0 results";
}

foreach($name as $value){
  foreach($age as $value1){
    $total[$value][$value1]=0;
  }
}

if ($result1->num_rows > 0) {
    while($row1 = $result1->fetch_assoc()) {
      
      
      $total[$row1["name"]][$row1["age"]]=$row1["avg(rate)"];
      
    }

} else {
    echo "0 results";
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
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawMaterial);

function drawMaterial() {

var length=<?php echo $num;?>;
var length1=<?php echo $num1;?>;
 var age= <?php echo json_encode($age); ?>;
 var name= <?php echo json_encode($name); ?>;
 var total= <?php echo json_encode($total); ?>;
 
    
       var data=[]; 
       var temp=[];
name.unshift("Month");
 data.push(name);
 for(var m=0;m<length1;m++){
   var temp=[];
   
   temp.push(age[m]);
    for (var i = 1; i <=length; i++) {
      var k=name[i];
      temp.push(Number(total[k][age[m]]));

  }

      data.push(temp);
 }



var data = new google.visualization.arrayToDataTable(data);

            var options = {        
            chart: {
              title: 'Average Jawrate of mice with different geno type and age'
            },
            fontSize:60,
            'width':900,
            'height':400};

                

      var material = new google.charts.Bar(document.getElementById('chart_div'));
      material.draw(data, options);
    }
    </script>
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

    <div class="span9">
        <section id="testlist">
            <div class="page-header">
                <h1>Jaw Rate Analysis</h1>
            </div>
            <!--Div that will hold the pie chart-->
            <div id="chart_div"></div>

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




