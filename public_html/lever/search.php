<?php
include 'connect.php';
include 'header.php';
?>

<div class="container">
    <!-- Docs nav ================================================== -->
    <div class="row">
       <div class="span3 bs-docs-sidebar">
           <ul class="nav nav-list bs-docs-sidenav">
          
                <li><a href="#wijmo"><i class="icon-chevron-right"></i>By Mice</a></li>
				 <li><a href="#position"><i class="icon-chevron-right"></i>By Video Position</a></li>
				 <li><a href="#publication"><i class="icon-chevron-right"></i>By Publication</a></li>
				 <li><a href="#age_group"><i class="icon-chevron-right"></i>By Age Group</a></li>		
                <li><a href="#missing_value"><i class="icon-chevron-right"></i>Missing Value</a></li>
				<li><a href="#file_download"><i class="icon-chevron-right"></i>File Download</a></li>

            </ul>
        </div>
        <div class="span9">

            <!-- Wijmo ================================================== -->
            <section id="wijmo">
                <div class="page-header">
                    <h1>By Mice</h1>
                </div>
                <div >
                    <table width="100%" cellspacing="14" cellpadding="14">
                        <tr>
                            <td width="50%" align="center" valign="top" style="border:1px solid #999999; padding:10px; background-color:#f8f8f8; text-align:left;">
                                <form action = "search_results.php" method="get">
                                    <h2>Search By Mouse_id</h2>
                                    <br><font size="2">(eg. H601)</font>
                                    <br>
                                    <input type="text" name="mouse_id"> <br>
                                    <input type="submit" value="Search">
                                </form>
                            </td>
<!--
                            <td width="50%" align="center" valign="top" style="border:1px solid #999999; padding:10px; background-color:#f8f8f8; text-align:left;">
                                <form  action = "search_pos1.php" method="post" >
                                    <table>
                                        <h2>Search Position 1 Records</h2>
                                            <tr>
                                                <td>Test Subject:</td>
                                                <td>
                                                    <select name="mid" id="mid">
													
                                                        <?php
                                                 //       $m_sql="select * from subject";
                                                  //      $rs_m=mysql_query($m_sql);

                                                  //      $nr_m=mysql_num_rows($rs_m);
                                                  //      echo "<option disabled selected> -- Test Subject -- </option>";
                                                  //      for ( $i = 0; $i < $nr_m; $i ++ ){
                                                  //          $r_m=mysql_fetch_array($rs_m);
                                                  //          echo "<option value= " .$r_m["sub_id"] .">".$r_m['sub_id'] ."</option>";
                                               //        }
                                                       ?>
														
                                                        ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Test Date:</td>
                                                <td> <input type="date" name="test_date" id="test_date"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="text-align:center;">
                                                    <input type="submit" name="submit1" value="Search">
                                                </td>
                                            </tr>
                                    </table>
                                </form>
                            </td>
							
							-->
                        </tr>
<!--
                        <tr>
                            <td width="50%" align="center" valign="top" style="border:1px solid #999999; padding:10px; background-color:#f8f8f8; text-align:left;">
                                <p>
                                <form  action = "search_pos2.php" method="post" >
                                    <table>
                                        <h2>Search Position 2 Records</h2>
                                        <tr>
                                            <td>Test Subject:</td>
                                            <td>
                                                <select name="mid2" id="mid2">
                                                    <?php
                                      //              $m2_sql="select * from subject";
                                      //              $rs_m2=mysql_query($m2_sql);

                                      //              $nr_m2=mysql_num_rows($rs_m2);
                                      //              echo "<option disabled selected> -- Test Subject -- </option>";
                                       //             for ( $i = 0; $i < $nr_m2; $i ++ ){
                                       //                 $r_m2=mysql_fetch_array($rs_m2);
                                       //                 echo "<option value= " .$r_m2["sub_id"] .">".$r_m2['sub_id'] ."</option>";
                                       //             }
                                                    ?>
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Test Date:</td>
                                            <td> <input type="date" name="test_date2" id="test_date2"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="text-align:center;">
                                                <input type="submit" value="Search">
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                                </p>

                            </td>


                            <td width="50%" align="center" valign="top" style="border:1px solid #999999; padding:10px; background-color:#f8f8f8; text-align:left;">
                                <form  action = "search_ba.php" method="post" >
                                    <table>
                                        <h2>Search Bolus Area Records</h2>
                                        <tr>
                                            <td>Test Subject:</td>
                                            <td>
                                                <select name="mid3" id="mid3">
                                                    <?php
                                       //             $m_sql="select * from subject";
                                       //             $rs_m=mysql_query($m_sql);
//
                                     //               $nr_m=mysql_num_rows($rs_m);
                                       //             echo "<option disabled selected> -- Test Subject -- </option>";
                                       //             for ( $i = 0; $i < $nr_m; $i ++ ){
                                        //                $r_m=mysql_fetch_array($rs_m);
                                        //                echo "<option value= " .$r_m["sub_id"] .">".$r_m['sub_id'] ."</option>";
                                        //            }
                                                    ?>
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Test Date:</td>
                                            <td> <input type="date" name="test_date3" id="test_date"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="text-align:center;">
                                                <input type="submit" value="Search">
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </td>
                        </tr>
						
						-->
                    </table>
                    </div>
            </section>
<section>
        <div class="page-header">
            <h1>Video Position</h1>
        </div>
		<div >
		 
            <table width="100%" cellspacing="14" cellpadding="14">
                <tr>
                    <td width="100%" align="center" valign="top" style="border:1px solid #999999; padding:10px; background-color:#f8f8f8; text-align:left;">
                      <form action = "search_position.php" method="post">
						<select name= "position" id= "position">
                            <option value= "P_1"> Position-1: Throat</option>
							<option value= "P_2">Position-2: Stomach</option>
							<option value= "bolus:">Bolus area</option>
						</select>
						<br>
                   <input type="submit" value="Search">   
                   </form >
                    </td>
                </tr>
            </table>

        </div>

</section>



    <section id="publication">
        <div class="page-header">
            <h1>Publication</h1>
        </div>
        <div >
            <table width="100%" cellspacing="14" cellpadding="14">
                <tr>
                    <td width="100%" align="center" valign="top" style="border:1px solid #999999; padding:10px; background-color:#f8f8f8; text-align:left;">
                        <form action = "publication.php" method="post">
                            DOI (eg.test_doi)<br>
                            <input type="text" name="pub_id"><br>
                            <input type="submit" value="Search">
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </section>

            <section id="age_group">
                <div class="page-header">
                    <h1>Age Group</h1>
                </div>
                <div >
                    <table width="100%" cellspacing="14" cellpadding="14">
                        <tr>

                            <td width="100%" align="center" valign="top" style="border:1px solid #999999; padding:10px; background-color:#f8f8f8; text-align:left;">
                                <form action = "age_group.php" method="post">
                                    Age group (eg.1 to 3)<br>
                                    From: <input type="text" name="group_start">to <input type="text" name="group_end"><br>
                                    <input type="submit" value="Search">
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
            </section>


            <!--                Find missing values-->
            <section id="missing_value">
                <div class="page-header">
                    <h1>Missing Values</h1>
                </div>
                <div >
                    <table width="100%" cellspacing="14" cellpadding="14">
                        <tr>
                            <td width="100%" align="center" valign="top" style="border:1px solid #999999; padding:10px; background-color:#f8f8f8; text-align:left;">
                                <form action = "missing.php" method="post">
                                    <h2>Missing Values</h2>
                                    <select name="mis" id="mis" >
                                        <option disabled selected> -- Test Item -- </option>

                                        <option value="Num_Swall">Numer of Swallow in 2 sec</option>
                                        <option value="ISI_P1">ISI_P1</option>
                                        <option value="ISI_P2">ISI_P2</option>
                                        <option value="PTT_P1">PTT_P1</option>
                                        <option value="PTT_P2">PTT_P2</option>
                                        <option value="Swall_rate">Swallow rate</option>
                                        <option value="EEB4secS">Esoph Empty before next swallow</option>
                                        <option value="bolus_area">Bolus Area</option>
                                        </select>
                                    <br>
                                    <input type="submit" value="Search">
                                </form>
                            </td>
                        </tr>
                    </table>
                </div></section>
    <section id="file_download">
        <h1>File Download</h1>
        <table width="100%" cellspacing="14" cellpadding="14">
            <tr>
                <td colspan="2" width="100%" align="center" valign="top" style="border:1px solid #999999; padding:10px; background-color:#f8f8f8; text-align:left;">
                    <h2>Download Experiment Record</h2>
                    <a href="dataexport.php"><button>Download</button>

                </td>
            </tr>
            </table>
    </section>


        </div>
    </div>
</div>


<?php
include 'footer.php';
?>



