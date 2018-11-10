<?php
include 'connect.php';
include 'header.php';
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
            $('#example2').DataTable({
                "scrollY": 400,
                "scrollX": true
            });
            $('#example3').DataTable({
                "scrollY": 400,
                "scrollX": true
            });
            $('#example4').DataTable({
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
            <li><a href="#testlist"><i class="icon-chevron-right"></i>Test List</a>
            </li>
            <li><a href="#threemonths"><i class="icon-chevron-right"></i>3 Months</a>
            </li>
            <li><a href="#sixmonths"><i class="icon-chevron-right"></i>6 Months</a>
            </li>
            <li><a href="#ninemonths"><i class="icon-chevron-right"></i>9 Months</a>
            </li>
            <li><a href="#eighteenmonths"><i class="icon-chevron-right"></i>18 Months</a>
            </li>
            <li><a href="liu_analysis.php"><i class="icon-chevron-right"></i>Analysis</a>
            </li>

        </ul>
    </div>

    <div class="span9">
        <section id="testlist">
            <div class="page-header">
                <h1>Test List</h1>
            </div>
            <div class="scroll">

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


                //$sql = "SELECT test_date,mouse_id,DOB,Sex,1stP1,1stP2,1stBA,2ndP1,2ndP2,2ndBA,Consensus FROM review_record";
                $sql = "SELECT test_date,sub_id,dob,sex,1stP1,1stP2,1stBA,2ndP1,2ndP2,2ndBA,consensus FROM review_view";
                $result = $conn->query($sql);
                $path="video/1.mp4";

                if ($result->num_rows > 0) {
                    echo "<table id=\"example\" class=\"display\" cellspacing=\"0\" width=\"100%\">
        <thead>
            <tr>
                <th>test_date</th>
                <th>Mouse#</th>
                <th>DOB</th>
                <th>Sex</th>
                <th>R1.P1</th>
                <th>R1.P2</th>
                <th>R1.BA</th>
                <th>R2.P1</th>
                <th>R2.P2</th>
                <th>R2.BA</th>
                <th>Consensus</th>
                <th>Choose</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>test_date</th>
                <th>Mouse#</th>
                <th>DOB</th>
                <th>Sex</th>
                <th>R1.P1</th>
                <th>R1.P2</th>
                <th>R1.BA</th>
                <th>R2.P1</th>
                <th>R2.P2</th>
                <th>R2.BA</th>
                <th>Consensus</th>
                <th>Choose</th>
            </tr>
        </tfoot>
        <tbody>";
                    while($row = $result->fetch_assoc()) {
                        echo '<tr>
		<td>' . $row["test_date"]. '</td>
		<td>' . $row["sub_id"]. '</td>
		<td>' . $row["dob"]. '</td>
		<td>' . $row["sex"]. '</td>
		<td>' . $row["1stP1"]. '</td>
		<td>' . $row["1stP2"]. '</td>
		<td>' . $row["1stBA"]. '</td>
		<td>' . $row["2ndP1"]. '</td>
		<td>' . $row["2ndP2"]. '</td>
		<td>' . $row["2ndBA"]. '</td>
		<td>' . $row["consensus"]. '</td>
		<td>
		         <form action="datacollection.php" method="post">
					  <input type="hidden" value="'.$row['test_date'].'" name="test_date">
                      <input type="hidden" value="'.$row['sub_id'].'" name="mouse_id">
					  <input type="hidden" value="'.$row['1stP1'].'" name="1stP1">
					  <input type="hidden" value="'.$row['2ndP1'].'" name="2ndP1">
					  <input type="hidden" value="'.$row['consensus'].'" name="consensus">
					  <input type="hidden" value="'.$path.'" name="path">
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

                //$conn->close();
                ?>
            </div>
        </section>
        <!--            this is for 3 months        -->
        <section id="threemonths">
            <div class="page-header">
                <h1>3 Months</h1>
            </div>
            <div class="scroll">
                <?php
                $sql1 = "SELECT test_date,sub_id,dob,sex,1stP1,1stP2,1stBA,2ndP1,2ndP2,2ndBA,consensus FROM review_view";
                $result = $conn->query($sql1);
                $path="video/1.mp4";

                if ($result->num_rows > 0) {
                    echo "<table id=\"example1\" class=\"display\" cellspacing=\"0\" width=\"100%\">
                        <thead>
                        <tr>
                            <th>test_date</th>
                            <th>Mouse#</th>
                            <th>DOB</th>
                            <th>Sex</th>
                            <th>R1.P1</th>
                            <th>R1.P2</th>
                            <th>R1.BA</th>
                            <th>R2.P1</th>
                            <th>R2.P2</th>
                            <th>R2.BA</th>
                            <th>Consensus</th>
                            <th>Choose</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>test_date</th>
                            <th>Mouse#</th>
                            <th>DOB</th>
                            <th>Sex</th>
                            <th>R1.P1</th>
                            <th>R1.P2</th>
                            <th>R1.BA</th>
                            <th>R2.P1</th>
                            <th>R2.P2</th>
                            <th>R2.BA</th>
                            <th>Consensus</th>
                            <th>Choose</th>
                        </tr>
                        </tfoot>
                        <tbody>";
                    while($row = $result->fetch_assoc()) {
                        $date1=date_create("$row[test_date]");
                        $date2=date_create("$row[dob]");
                        $diff=date_diff($date1,$date2);
                        $difference=$diff->format("%a");
                        if($difference<105&&$difference>75){
                            echo '<tr>
                            <td>' . $row["test_date"]. '</td>
                            <td>' . $row["sub_id"]. '</td>
                            <td>' . $row["dob"]. '</td>
                            <td>' . $row["sex"]. '</td>
                            <td>' . $row["1stP1"]. '</td>
                            <td>' . $row["1stP2"]. '</td>
                            <td>' . $row["1stBA"]. '</td>
                            <td>' . $row["2ndP1"]. '</td>
                            <td>' . $row["2ndP2"]. '</td>
                            <td>' . $row["2ndBA"]. '</td>
                            <td>' . $row["consensus"]. '</td>
                            <td>
                                <form action="datacollection.php" method="post">
                                    <input type="hidden" value="'.$row['test_date'].'" name="test_date">
                                    <input type="hidden" value="'.$row['sub_id'].'" name="mouse_id">
                                    <input type="hidden" value="'.$row['1stP1'].'" name="1stP1">
                                    <input type="hidden" value="'.$row['2ndP1'].'" name="2ndP1">
                                    <input type="hidden" value="'.$row['consensus'].'" name="consensus">
                                    <input type="hidden" value="'.$path.'" name="path">
                                    <input type="submit" value="Details">
                                </form>
                            </td>
                        </tr>';
                        }

                    }
                    echo " </tbody>
                    </table>";
                } else {
                    echo "0 results";
                }
                ?>
            </div>
        </section>
        <!--            this is for 6 months        -->
        <section id="sixmonths">
            <div class="page-header">
                <h1>6 Months</h1>
            </div>
            <div class="scroll">
                <?php
                $sql2 = "SELECT test_date,sub_id,dob,sex,1stP1,1stP2,1stBA,2ndP1,2ndP2,2ndBA,consensus FROM review_view";
                $result = $conn->query($sql2);
                $path="video/1.mp4";

                if ($result->num_rows > 0) {
                    echo "<table id=\"example2\" class=\"display\" cellspacing=\"0\" width=\"100%\">
                        <thead>
                        <tr>
                            <th>test_date</th>
                            <th>Mouse#</th>
                            <th>DOB</th>
                            <th>Sex</th>
                            <th>R1.P1</th>
                            <th>R1.P2</th>
                            <th>R1.BA</th>
                            <th>R2.P1</th>
                            <th>R2.P2</th>
                            <th>R2.BA</th>
                            <th>Consensus</th>
                            <th>Choose</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>test_date</th>
                            <th>Mouse#</th>
                            <th>DOB</th>
                            <th>Sex</th>
                            <th>R1.P1</th>
                            <th>R1.P2</th>
                            <th>R1.BA</th>
                            <th>R2.P1</th>
                            <th>R2.P2</th>
                            <th>R2.BA</th>
                            <th>Consensus</th>
                            <th>Choose</th>
                        </tr>
                        </tfoot>
                        <tbody>";
                    while($row = $result->fetch_assoc()) {
                        $date3 = date_create("$row[test_date]");
                        $date4 = date_create("$row[dob]");
                        $diff1 = date_diff($date3, $date4);
                        $difference1 = $diff1->format("%a");
                        if ($difference1 < 195 && $difference1 > 165) {
                            echo '<tr>
                            <td>' . $row["test_date"] . '</td>
                            <td>' . $row["sub_id"] . '</td>
                            <td>' . $row["dob"] . '</td>
                            <td>' . $row["sex"] . '</td>
                            <td>' . $row["1stP1"] . '</td>
                            <td>' . $row["1stP2"] . '</td>
                            <td>' . $row["1stBA"] . '</td>
                            <td>' . $row["2ndP1"] . '</td>
                            <td>' . $row["2ndP2"] . '</td>
                            <td>' . $row["2ndBA"] . '</td>
                            <td>' . $row["consensus"] . '</td>
                            <td>
                                <form action="datacollection.php" method="post">
                                    <input type="hidden" value="' . $row['test_date'] . '" name="test_date">
                                    <input type="hidden" value="' . $row['sub_id'] . '" name="mouse_id">
                                    <input type="hidden" value="' . $row['1stP1'] . '" name="1stP1">
                                    <input type="hidden" value="' . $row['2ndP1'] . '" name="2ndP1">
                                    <input type="hidden" value="' . $row['consensus'] . '" name="consensus">
                                    <input type="hidden" value="' . $path . '" name="path">
                                    <input type="submit" value="Details">
                                </form>
                            </td>
                        </tr>';
                        }
                    }
                    echo " </tbody>
                    </table>";
                } else {
                    echo "0 results";
                }
                ?>
            </div>
        </section>
        <!--            this is for 9 months        -->
        <section id="ninemonths">
            <div class="page-header">
                <h1>9 Months</h1>
            </div>
            <div class="scroll">
                <?php
                $sql3 = "SELECT test_date,sub_id,dob,sex,1stP1,1stP2,1stBA,2ndP1,2ndP2,2ndBA,consensus FROM review_view";
                $result = $conn->query($sql3);
                $path="video/1.mp4";

                if ($result->num_rows > 0) {
                    echo "<table id=\"example3\" class=\"display\" cellspacing=\"0\" width=\"100%\">
                        <thead>
                        <tr>
                            <th>test_date</th>
                            <th>Mouse#</th>
                            <th>DOB</th>
                            <th>Sex</th>
                            <th>R1.P1</th>
                            <th>R1.P2</th>
                            <th>R1.BA</th>
                            <th>R2.P1</th>
                            <th>R2.P2</th>
                            <th>R2.BA</th>
                            <th>Consensus</th>
                            <th>Choose</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>test_date</th>
                            <th>Mouse#</th>
                            <th>DOB</th>
                            <th>Sex</th>
                            <th>R1.P1</th>
                            <th>R1.P2</th>
                            <th>R1.BA</th>
                            <th>R2.P1</th>
                            <th>R2.P2</th>
                            <th>R2.BA</th>
                            <th>Consensus</th>
                            <th>Choose</th>
                        </tr>
                        </tfoot>
                        <tbody>";
                    while($row = $result->fetch_assoc()) {
                        $date5 = date_create("$row[test_date]");
                        $date6 = date_create("$row[dob]");
                        $diff2 = date_diff($date5, $date6);
                        $difference2 = $diff2->format("%a");
                        if ($difference2 < 285 && $difference2 > 255) {
                            echo '<tr>
                            <td>' . $row["test_date"] . '</td>
                            <td>' . $row["sub_id"] . '</td>
                            <td>' . $row["dob"] . '</td>
                            <td>' . $row["sex"] . '</td>
                            <td>' . $row["1stP1"] . '</td>
                            <td>' . $row["1stP2"] . '</td>
                            <td>' . $row["1stBA"] . '</td>
                            <td>' . $row["2ndP1"] . '</td>
                            <td>' . $row["2ndP2"] . '</td>
                            <td>' . $row["2ndBA"] . '</td>
                            <td>' . $row["consensus"] . '</td>
                            <td>
                                <form action="datacollection.php" method="post">
                                    <input type="hidden" value="' . $row['test_date'] . '" name="test_date">
                                    <input type="hidden" value="' . $row['sub_id'] . '" name="mouse_id">
                                    <input type="hidden" value="' . $row['1stP1'] . '" name="1stP1">
                                    <input type="hidden" value="' . $row['2ndP1'] . '" name="2ndP1">
                                    <input type="hidden" value="' . $row['consensus'] . '" name="consensus">
                                    <input type="hidden" value="' . $path . '" name="path">
                                    <input type="submit" value="Details">
                                </form>
                            </td>
                        </tr>';
                        }
                    }
                    echo " </tbody>
                    </table>";
                } else {
                    echo "0 results";
                }
                ?>
            </div>
        </section>
        <!--            this is for 18 months        -->
        <section id="eighteenmonths">
            <div class="page-header">
                <h1>18 Months</h1>
            </div>
            <div class="scroll">
                <?php
                $sql4 = "SELECT test_date,sub_id,dob,sex,1stP1,1stP2,1stBA,2ndP1,2ndP2,2ndBA,consensus FROM review_view";
                $result = $conn->query($sql4);
                $path="video/1.mp4";

                if ($result->num_rows > 0) {
                    echo "<table id=\"example4\" class=\"display\" cellspacing=\"0\" width=\"100%\">
                        <thead>
                        <tr>
                            <th>test_date</th>
                            <th>Mouse#</th>
                            <th>DOB</th>
                            <th>Sex</th>
                            <th>R1.P1</th>
                            <th>R1.P2</th>
                            <th>R1.BA</th>
                            <th>R2.P1</th>
                            <th>R2.P2</th>
                            <th>R2.BA</th>
                            <th>Consensus</th>
                            <th>Choose</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>test_date</th>
                            <th>Mouse#</th>
                            <th>DOB</th>
                            <th>Sex</th>
                            <th>R1.P1</th>
                            <th>R1.P2</th>
                            <th>R1.BA</th>
                            <th>R2.P1</th>
                            <th>R2.P2</th>
                            <th>R2.BA</th>
                            <th>Consensus</th>
                            <th>Choose</th>
                        </tr>
                        </tfoot>
                        <tbody>";
                    while($row = $result->fetch_assoc()) {
                        $date7 = date_create("$row[test_date]");
                        $date8 = date_create("$row[dob]");
                        $diff3 = date_diff($date7, $date8);
                        $difference3 = $diff3->format("%a");
                        if ($difference3 < 555 && $difference3 > 525) {
                            echo '<tr>
                            <td>' . $row["test_date"] . '</td>
                            <td>' . $row["sub_id"] . '</td>
                            <td>' . $row["dob"] . '</td>
                            <td>' . $row["sex"] . '</td>
                            <td>' . $row["1stP1"] . '</td>
                            <td>' . $row["1stP2"] . '</td>
                            <td>' . $row["1stBA"] . '</td>
                            <td>' . $row["2ndP1"] . '</td>
                            <td>' . $row["2ndP2"] . '</td>
                            <td>' . $row["2ndBA"] . '</td>
                            <td>' . $row["consensus"] . '</td>
                            <td>
                                <form action="datacollection.php" method="post">
                                    <input type="hidden" value="' . $row['test_date'] . '" name="test_date">
                                    <input type="hidden" value="' . $row['sub_id'] . '" name="mouse_id">
                                    <input type="hidden" value="' . $row['1stP1'] . '" name="1stP1">
                                    <input type="hidden" value="' . $row['2ndP1'] . '" name="2ndP1">
                                    <input type="hidden" value="' . $row['consensus'] . '" name="consensus">
                                    <input type="hidden" value="' . $path . '" name="path">
                                    <input type="submit" value="Details">
                                </form>
                            </td>
                        </tr>';
                        }
                    }
                    echo " </tbody>
                    </table>";
                } else {
                    echo "0 results";
                }
                ?>
            </div>
        </section>
    </div>
    <a href="#top" id="toTop"></a>
</div>
</html>


<?php
exit;
?>

<?php
include 'footer.php';
?>



