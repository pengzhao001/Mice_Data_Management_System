<?php
//#echo "start" ;
//$link=mysql_connect("localhost","root","root");
//if(!$link) echo  " DATABASE CONNECT FAILD!";
//
//
//$db_selected = mysql_select_db('mouse_db', $link);
//if (!$db_selected) {
//    die ('Can\'t use mouse_db : ' . mysql_error());
//    }
// //   echo "done" ;
//?>
<?php
#echo "start" ;
session_start();
$login_user=$_SESSION['user'];
$login_pws=$_SESSION['pwd'];
//$link=mysql_connect("localhost","root","root");
//if(!$link){
//    echo  " DATABASE CONNECT FAILD!";
//    echo "window.location.href=location.href='index.php'";
//}
//
//$db_selected = mysql_select_db('mouse_db', $link);
//if (!$db_selected) {
//    die ('Can\'t use mouse_db : ' . mysql_error());
//}
//   echo "done" ;

$link=mysql_connect("localhost","$login_user","$login_pws");

if(!$link){
    echo  " DATABASE CONNECT FAILD!";
    echo "<script>window.location.href=location.href='index.php'</script>";
}

$db_selected = mysql_select_db('mouse_db', $link);

if (!$db_selected) {
    die ('Can\'t use mouse_db : ' . mysql_error());
}

?>