<?phpinclude dirname(dirname(__FILE__))."/connect.php";include dirname(dirname(__FILE__))."/header.php";?><style>	html,body{text-align:center;margin:0px auto;}</style><table border="1" align="center">	<form id="signupForm" method="post" action="add_geno.php">		<div class="divFrame">			<div class="divContent">				<div>					Phenotype Name：<br />					<input id="pheno_name" name="pheno_name" type="text" class="txt" />					<font color="red">*</font><br/>				</div>				<div>					Genotype Description：<br />					<input id="desc" name="desc" type="text" class="txt" />					<font color="red">*</font><br />					<span></span>				</div>			</div>			<div class="divBtn">				<input type="submit" name='submit' value="save"  />			</div>		</div>	</form></table><?phpif(isset($_POST['submit'])){	$sql_id= "select max(pheno_id) as id from pheno_type";	$id_result=mysql_query($sql_id);	$res_id=mysql_fetch_assoc($id_result);	$id=$res_id['id']+1;	$phene_name=$_POST['pheno_name'];	$description=$_POST['desc'];	$insert = "insert into pheno_type values('".$id."','".$phene_name."','".$description."');";	if(mysql_query($insert)){		echo '<script language="javascript">';		echo 'alert("Phenotype Add Success!")';		echo '</script>';	}	else{		echo mysql_error();	}}?><?phpinclude dirname(dirname(__FILE__))."/footer.php";?>