<?php
include 'connect.php';
include 'header.php';

?>
<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
    <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>

    <link href="http://www.jqueryscript.net/css/top.css" rel="stylesheet" type="text/css">
    <script src="js/jquery.scrollToTop.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "scrollY": 200,
                "scrollX": true
            });
            $('#example2').DataTable({
                "scrollY": 200,
                "scrollX": true
            });
			   $('#example3').DataTable({
                "scrollY": 50,
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





<?php
$position = trim($_REQUEST["position"]);

?>
<div class="row">

    <div class="span3 bs-docs-sidebar">
        <ul class="nav nav-list bs-docs-sidenav">
            <li><a href="#video"><i class="icon-chevron-right"></i>Position</a>
            </li>


        </ul>
    </div>
<div  class= "span9">
<section id="video">
<div class="page-header">
<h1>Position： <?php echo $position;?></h1>
</div>

<?php
if  ($position == "P_1")
{
$query = "select m_id,test_date,avg(ISI_P1) as isi,avg(PTT_P1) as ptt1,avg(Jaw_cycle) as cycle, avg(Jaw_rate) as rate from consensus group by m_id";

$result = mysql_query($query);

 if (!$result) {
             die('Invalid query: ' . mysql_error());
 }
               
if (mysql_num_rows ($result) > 0) {
 echo "
 <table id=\"example2\" class=\"display\" cellspacing=\"0\" width=\"100%\">
        <thead>
            <tr>
                     	<th> Test Subject#</th>
						<th >Test Date</th>
						<th >ISI Average</th>
						<th >PTT For P1</th>
						<th>Jaw Cycles per Swallow</th>
						<th>Jaw Rate</th>
            </tr>
        </thead>
		        <tfoot>
            <tr>
              	       <th> Test Subject#</th>
						<th >Test Date</th>
						<th >ISI Average</th>
						<th >PTT For P1</th>
						<th>Jaw Cycles per Swallow</th>
						<th>Jaw Rate</th>
            </tr>
        </tfoot>
        <tbody>";
        while($row = mysql_fetch_assoc($result)) {
        echo '<tr>
			
					<td>'.$row['m_id']. '</td>
					<td>'.$row['test_date'].'</td>
					<td>'.number_format($row['isi'],2).'</td>
					<td>'.number_format($row['ptt1'],2).'</td>
					<td>'.number_format($row['cycle'],2).'</td>
					<td>'.number_format($row['rate'],2).'</td>
			
		</tr>';
		}
                    echo " </tbody>
    </table>";
                } else {
                    echo "No record found.";
                }

   
} 
else if ($position == "P_2")
{$query = "select m_id,test_date,avg(ISI_P2) as isi2,avg(PTT_P2) as ptt2, count(EEB4secS) as ee from consensus group by m_id";
$result = mysql_query($query);

 if (!$result) {
             die('Invalid query: ' . mysql_error());
 }
               
if (mysql_num_rows ($result) > 0) {
 echo "
 <table id=\"example2\" class=\"display\" cellspacing=\"0\" width=\"100%\">
        <thead>
            <tr>
		                <th> Test Subject#</th>
						<th >Test Date</th>
						<th >ISI Average</th>
						<th >PTT For P2</th>
						<th>Esoph Empty before next swallow</th>
            </tr>
        </thead>
		        <tfoot>
            <tr>
		                <th> Test Subject#</th>
		 				<th >Test Date</th>
						<th >ISI Average</th>
						<th >PTT For P2</th>
						<th>Esoph Empty before next swallow</th>
            </tr>
        </tfoot>
        <tbody>";
        while($row = mysql_fetch_assoc($result)) {
        echo '<tr>
			
							<td>'.$row['m_id'].'</td>
							<td>'.$row['test_date'].'</td>
							<td>'.number_format($row['isi2'],2).'</td>
							<td>'.number_format($row['ptt2'],2).'</td>
							<td>'.number_format($row['ee'],2).'</td>
			
		</tr>';
		}
                    echo " </tbody>
    </table>";
                } else {
                    echo "No record found.";
                }

}
else
{$query = "select m_id,test_date,avg(bolus_area) as ba from Bolus_record group by m_id";

$result = mysql_query($query);

 if (!$result) {
             die('Invalid query: ' . mysql_error());
 }
               
if (mysql_num_rows ($result) > 0) {
 echo "
 <table id=\"example2\" class=\"display\" cellspacing=\"0\" width=\"100%\">
        <thead>
            <tr>
				<th> Test Subject#</th>
						<th >Test Date</th>
						<th >Average Bolus Area</th>
            </tr>
        </thead>
		        <tfoot>
            <tr>
				<th> Test Subject#</th>
						<th >Test Date</th>
						<th >Average Bolus Area</th>
            </tr>
        </tfoot>
        <tbody>";
        while($row = mysql_fetch_assoc($result)) {
        echo '<tr>
			
							<td>'.$row['m_id'].'</td>
							<td>'.$row['test_date'].'</td>
							<td>'. number_format($row['ba'],2).'</td>
			
		</tr>';
		}
                    echo " </tbody>
    </table>";
                } else {
                    echo "No record found.";
                }
}

       


?>

</section>
<br><br>


<br><br>
</div>


<br><br><br>
</div>
<?php

if(!isset($_POST["add_genotype"])) {exit;}
?>

<?php
include 'footer.php';
?>



