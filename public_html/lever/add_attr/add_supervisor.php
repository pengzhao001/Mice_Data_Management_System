<?phpinclude dirname(dirname(__FILE__))."/connect.php";include dirname(dirname(__FILE__))."/header.php";?><style>	html,body{text-align:center;margin:0px auto;}</style><table border="1" align="center">	<form id="signupForm" method="post" action="add_supervisor.php">		<div class="divFrame">			<div class="divContent">				<div>					First Name：<br />					<input id="first_name" name="first_name" type="text" class="txt" />					<font color="red">*</font><br/>				</div>				<div>					Last Name：<br />					<input id="last_name" name="last_name" type="text" class="txt" />					<font color="red">*</font><br />					<span></span>				</div>				<div>					Position：<br/>					<select name="position">						<option value="professor">Professor</option>						<option value="lab assistant">Lab Assistant</option>					</select>					<font color="red">*</font><br />					<span></span>				</div>				<div>					Password:<br/>					<input id="pd" name="pd" type="text" >					<font color="red">*</font><br />					<span></span>				</div>			</div>			<div class="divBtn">				<input type="submit" name='submit' value="save" />			</div>		</div>	</form></table><?phpif(isset($_POST['submit'])){	$sql_id= "select max(obs_id) as id from observer";	$id_result=mysql_query($sql_id);	$res_id=mysql_fetch_assoc($id_result);	$id=$res_id['id']+1;	$first_name=$_POST['first_name'];	$last_name=$_POST['last_name'];	$position=$_POST['position'];	$pwd=$_POST['pd'];	$insert = "insert into observer values('".$id."','".$first_name."','".$last_name."','".$pwd."');";	mysql_query($insert);	$inser_sub="insert into supervisor values('".$id."','".$position."');";	if(mysql_query($inser_sub)){		echo '<script language="javascript">';		echo 'alert("Supervisor Observer Information Add Success!")';		echo '</script>';	}	else{		echo mysql_error();	}}?><?phpinclude dirname(dirname(__FILE__))."/footer.php";?>