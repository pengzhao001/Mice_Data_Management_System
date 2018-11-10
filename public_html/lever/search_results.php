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
                "scrollY": 400,
                "scrollX": true
            });
			   $('#example3').DataTable({
                "scrollY": 200,
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
//session_start();
//if(!isset($_POST["mouse_id"])) {exit;}
$mouse_id = trim($_REQUEST["mouse_id"]);
//$age = trim($_REQUEST["mouse_age"]);
//$sex = trim($_REQUEST["sex"]);
//$colony = trim($_REQUEST["colony"]);

?>
<div class="row">

    <div class="span3 bs-docs-sidebar">
        <ul class="nav nav-list bs-docs-sidenav">
            <li><a href="#video"><i class="icon-chevron-right"></i>Video</a>
            </li>
            <li><a href="#Information"><i class="icon-chevron-right"></i>Information</a>
            </li>
            <li><a href="#behaviour"><i class="icon-chevron-right"></i>Behaviour</a>
            </li>

        </ul>
    </div>
<div  class= "span9">
<section id="video">
<div class="page-header">
<h1>Video of <?php echo $mouse_id?></h1>
</div>

<?php
$query = "SELECT V.test_date,V.location,V.name FROM video V, has_vid H WHERE V.vid_id=H.vid_id AND H.sub_id ="."'".$mouse_id."';";
$result_video = mysql_query($query);

 if (!$result_video) {
             die('Invalid query: ' . mysql_error());
            }
            
            
if (mysql_num_rows ($result_video) > 0) {
 echo "
 <table id=\"example2\" class=\"display\" cellspacing=\"0\" width=\"100%\">
        <thead>
            <tr>
                <th>Test Date</th>
                <th>Video</th>
            </tr>
        </thead>
		        <tfoot>
            <tr>
                <th>Test Date</th>
                <th>Video</th>
            </tr>
        </tfoot>
        <tbody>";
        while($row = mysql_fetch_assoc($result_video)) {
        $video = $row["location"];
        echo '<tr>
		<td>' . $row["test_date"]. '</td>
		<td>' .'<embed src="'.$video.'"></embed>' . '</td>
		</tr>';
		}
                    echo " </tbody>
    </table>";
                } else {
                    echo "No Videos found.";
                }

?>

</section>
<br><br>

<section id = "Information">
<div class="page-header">
<h1>Information of <?php echo $mouse_id?></h1>
</div>
<?php
$col_query= "SELECT C.disease, HC.sub_id from colony C, has_col HC where HC.sub_id = "."'".$mouse_id."' AND HC.col_id = C.col_id";
$col_result = mysql_query($col_query);

 if (!$col_result) {
             die('Invalid query: ' . mysql_error());
         }
		             
if (mysql_num_rows ($col_result) > 0) {
 while($row = mysql_fetch_assoc($col_result)) {
 $col = $row["disease"];
 }
 }
 else {$col = "No record found!";}
		 
$geno_query= "SELECT  G.name,HG.sub_id from geno_type G,has_geno HG where HG.geno_id = G.geno_id and HG.sub_id= "."'".$mouse_id."';";
$geno_result = mysql_query($geno_query);
 if (!$geno_result) {
             die('Invalid query: ' . mysql_error());
         }
		 
		             
if (mysql_num_rows ($geno_result) > 0) {
 while($row = mysql_fetch_assoc($geno_result)) {
 $geno = $row["name"];
 }}
  else {$geno = "No record found!";}
 
$pheno_query= "SELECT  P.name,HP.sub_id from pheno_type P,has_pheno HP where HP.pheno_id = P.pheno_id and HP.sub_id= "."'".$mouse_id."';";
$pheno_result = mysql_query($pheno_query);
 if (!$pheno_result) {
             die('Invalid query: ' . mysql_error());
         }
		
            
if (mysql_num_rows ($pheno_result) > 0) {
 while($row = mysql_fetch_assoc($pheno_result)) {
 $pheno = $row["name"];
 }}
   else {$pheno = "No record found!";}
   
$sex_query= "SELECT sex FROM subject where sub_id="."'".$mouse_id."';" ;
$sex_result = mysql_query($sex_query);
 if (!$sex_result) {
             die('Invalid query: ' . mysql_error());
         }
		
            
if (mysql_num_rows ($sex_result) > 0) {
 while($row = mysql_fetch_assoc($sex_result)) {
 $sex= $row["sex"];
 }}
   else {$sex = "No record found!";} 
   
      
$pub_query= "SELECT doi FROM has_pub where sub_id="."'".$mouse_id."';" ;
$pub_result = mysql_query($pub_query);
 if (!$pub_result) {
             die('Invalid query: ' . mysql_error());
         }
		
            
if (mysql_num_rows ($pub_result) > 0) {
 while($row = mysql_fetch_assoc($pub_result)) {
 $pub= $row["doi"];
 }}
   else {$pub = "No record found!";} 
   
 
 echo "
 <table id=\"example3\" class=\"display\" cellspacing=\"0\" width=\"100%\">
        <thead>
            <tr>
                <th>Mouse id</th>
				<th>Sex</th>
                <th>colony</th>
                <th>Phenotype</th>
                <th>Genotype</th>
				<th>Publication</th>
				
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Mouse id</th>
				<th>Sex</th>
                <th>colony</th>
                <th>Phenotype</th>
                <th>Genotype</th>
				<th>Publication</th>
            </tr>
        </tfoot>
        <tbody>";
		 echo '<tr>
		<td>' . $mouse_id. '</td>
		<td>' . $sex. '</td>
		<td>' . $col. '</td>
		<td>' . $geno. '</td>
		<td>' . $pheno. '</td>
		<td>' . $pub. '</td>
		</tr>
		</tbody>
		</table>';
		


		 

?>
</section>

<br><br>

<section  id = "behaviour">

<div class="page-header">
<h1> Behavior of: <?php echo $mouse_id ?></h1>
</div>
<?php            
       
       
$query = "SELECT * FROM consensus WHERE m_id = "."'".$mouse_id."';";

$result = mysql_query($query);

 if (!$result) {
             die('Invalid query: ' . mysql_error());
         }
            
if (mysql_num_rows ($result) > 0) {
 echo "
 <table id=\"example\" class=\"display\" cellspacing=\"0\" width=\"100%\" align = \"center\">
        <thead>
            <tr>
                <th>Mouse id</th>
                <th>Age</th>
                <th>Age group</th>
                <th>Test date</th>
                <th>Body weight</th>
                <th>Trial</th>
                <th>Jaw rate</th>
                <th>Jaw cycle</th>
                <th>ETT</th>
                <th>bolus_area</th>
                <th>EEB4secS</th>
                <th>Swallow No.</th>
                <th>ISI_P1</th>
                <th>ISI_P2</th>
                <th>PTT_P1</th>
                <th>PTT_P2</th>
                <th>Swallow rate</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Mouse id</th>
                <th>Age</th>
                <th>Age group</th>
                <th>Test date</th>
                <th>Body weight</th>
                <th>Trial</th>
                <th>Jaw rate</th>
                <th>Jaw cycle</th>
                <th>ETT</th>              
                <th>bolus_area</th>
                <th>EEB4secS</th>                
                <th>Swallow No.</th>                
                <th>ISI_P1</th>
                <th>ISI_P2</th>
                <th>PTT_P1</th>
                <th>PTT_P2</th>
                <th>Swallow rate</th>
            </tr>
        </tfoot>
        <tbody aling = \"center\">";
        while($row = mysql_fetch_assoc($result)) {
                        echo '<tr>
		<td>' . $row["m_id"]. '</td>
		<td>' . $row["age_month"]. '</td>
		<td>' . $row["age_group"]. '</td>
		<td>' . $row["test_date"]. '</td>
		<td>' . $row["bodyweight"]. '</td>
		<td>' . $row["Trial"]. '</td>
		<td>' . $row["Jaw_rate"]. '</td>
		<td>' . $row["Jaw_cycle"]. '</td>
		<td>' . $row["ETT"]. '</td>
		<td>' . $row["bolus_area"]. '</td>
		<td>' . $row["EEB4secS"]. '</td>
		<td>' . $row["Num_Swall"]. '</td>		
		<td>' . $row["ISI_P1"]. '</td>
		<td>' . $row["ISI_P2"]. '</td>
		<td>' . $row["PTT_P1"]. '</td>
		<td>' . $row["PTT_P2"]. '</td>
		<td>' . $row["Swall_rate"]. '</td>
		</tr>';
		}
                    echo " </tbody>
    </table>";
                } else {
                    echo "No record of behavior data.";
                }

?>
</section>
</div>


<br><br><br>
</div>
<?php

if(!isset($_POST["mouse_id"])) {exit;}
session_start();
?>

<?php
include 'footer.php';
?>



