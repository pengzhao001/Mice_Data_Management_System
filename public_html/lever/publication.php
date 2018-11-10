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
$pub_id = trim($_REQUEST["pub_id"]);
//$age = trim($_REQUEST["mouse_age"]);
//$sex = trim($_REQUEST["sex"]);
//$colony = trim($_REQUEST["colony"]);

?>
<div class="row">

    <div class="span3 bs-docs-sidebar">
        <ul class="nav nav-list bs-docs-sidenav">
            <li><a href="#pub"><i class="icon-chevron-right"></i>Publication</a>
            </li>
        </ul>
    </div>
<div  class= "span9">

<section id="pub">
<div class="page-header">
<h1>Mouse of <?php echo $pub_id?></h1>
</div>

<?php
$query = "SELECT * FROM has_pub HP WHERE HP.doi="."'".$pub_id."';";
$result = mysql_query($query);

 if (!$result) {
             die('Invalid query: ' . mysql_error());
            }
            
            
if (mysql_num_rows ($result) > 0) {
 echo "
 <table id=\"example2\" class=\"display\" cellspacing=\"0\" width=\"100%\">
        <thead>
            <tr>
                <th>DOI</th>
                <th>Mouse</th>
            </tr>
        </thead>
		        <tfoot>
            <tr>
                <th>DOI</th>
                <th>Mouse</th>
            </tr>
        </tfoot>
        <tbody>";
        while($row = mysql_fetch_assoc($result)) {
        echo '<tr>
		<td><a href="http://cs4380-group3.centralus.cloudapp.azure.com/lever/search_results.php?mouse_id='.$row["sub_id"].'">'.$row["sub_id"]. '</a></td>
		<td>' .  $row["doi"] . '</td>
		</tr>';
		}
                    echo " </tbody>
    </table>";
                } else {
                    echo "No Videos found.";
                }

?>

</section>
<section>
</section>
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



