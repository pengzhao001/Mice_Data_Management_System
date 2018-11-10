<?php

include "header.php";
include "connect.php";
?>


<div class="container">
    <!-- Docs nav ================================================== -->
    <div class="row">
<!--        <div class="span3 bs-docs-sidebar">-->
<!--            <ul class="nav nav-list bs-docs-sidenav">-->
<!--                <li><a href="#upload"><i class="icon-chevron-right"></i>Upload Files</a></li>-->
<!--                <li><a href="#download"><i class="icon-chevron-right"></i>Download Files</a></li>-->
<!--            </ul>-->
<!--        </div>-->
        <div class="span9" style="align-content: center">
            <!-- Wijmo ================================================== -->
            <section id="upload" >
                <div class="page-header" >
                    <h1>Upload Files</h1>
                    <form name="file_upload" id="file_upload" method="post" action="datafields.php" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td>Test Date:</td>
                                <td><input name="testdate" type="date"></td>
                            </tr>
                            <tr>
                                <td>Mouse ID:</td>
                                <td>
                                    <select name="mouseid" id="mouseid">
                                        <?php
                                        $select_mouse="select * from subject";
                                        $rs_select_mouse=mysql_query($select_mouse);
                                        $nr_select_mouse=mysql_num_rows($rs_select_mouse);
                                        echo "<option disabled selected> -- Select test subject -- </option>";
                                        for ( $i = 0; $i < $nr_select_mouse; $i ++ ){
                                            $r_select_mouse=mysql_fetch_array($rs_select_mouse);
                                            echo "<option value= " .$r_select_mouse["sub_id"] .">".$r_select_mouse['sub_id'] ."</option>";
                                        }
                                        ?>

                                    </select>
<!--                                    <input name = "mouseid" type="text" id="mouseid"/>-->
                                </td>
                            </tr>
                            <tr>
                                <td><label for="pic">Video Upload: </label></td>
                                <td><input type="file" id="pic" name="pic"></td>
                            </tr>
                            <tr><td><input type="submit" id="submit" name="submit" value="submit"/> </td></tr>
                        </table>
                    </form>

                </div>
                <div class="container-fluid">

                </div>


            </section>
            <!-- File input -->


            <!-- end file input -->
            <!-- File input -->
        </div>
    </div>
</div>

<?php
if(isset($_POST['submit'])){
    $mouse=$_POST['mouseid'];
    $date=date($_POST['testdate']);
    $date=date("Y-m-d", strtotime($_POST['testdate']));
    //echo $date."\n";


        if($_FILES['pic']['error']!=0) {
//        echo "<script> alert('please upload valid video!') ; window.location=history.go(-1);</script>";
//            echo $_FILES['pic']['error'];
            echo "<script> alert('please upload valid video!');</script>";
        }
        else{
            $dir        = dirname( __FILE__ );
            $upload_dir = $dir;
        }

        if(move_uploaded_file($_FILES['pic']['tmp_name'],$upload_dir."/video/".$_FILES['pic']['name'])){
            $pic_path=$upload_dir."/video/".$_FILES['pic']['name'];

            $sql_id = "select max(vid_id) as id from video";
            $id_result=mysql_query($sql_id);
            $res_id=mysql_fetch_assoc($id_result);
            $id=$res_id['id']+1;

            //vid_id: mouse ID + test date
            $vid_id="$mouse"."_"."$date";
            //echo $vid_id;

            $pic_addr=strstr($pic_path,'/lever/');
            $pic_addr="http://cs4380-group3.centralus.cloudapp.azure.com".$pic_addr;
//        echo $pic_addr ."\n";

            $name=$_FILES['pic']['name'];
            $insert="insert into video VALUES ('$vid_id','$date','$pic_addr','$name')";
            mysql_query($insert);
            $insert_has_vid="insert into has_vid VALUES ('$vid_id','$mouse')";


            if(mysql_query($insert_has_vid)){
                echo '<script language="javascript">';
                echo 'alert("Video Upload Success!")';
                echo '</script>';
            }
            else{
                echo mysql_error();
            }

        }
        else{
            echo $upload_dir."/".$_FILES['pic']['name'];
//        $pic=$upload_dir."/".$_FILES['pic']['name'];
//        echo $pic;
//
            echo "move upload fail";
        }


}



?>

<?php
include "footer.php";
?>