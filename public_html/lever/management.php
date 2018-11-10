<?php
include 'connect.php';
include 'header.php';
?>

<div class="row">
        <div class="span3 bs-docs-sidebar">
            <ul class="nav nav-list bs-docs-sidenav">
                <li><a href="#genotype"><i class="icon-chevron-right"></i>Genotype</a> </li>
                <li><a href="#phenotype"><i class="icon-chevron-right"></i>Phenotype </a> </li>
            </ul>
        </div>

        <div class="span9">
            <section id="genotype">
                <div class="page-header">
                    <h1>Genotype</h1>
        </div>
       
       <form name='form' method='post' >
                <table border="0">
                    <tr>
                        <td>genotype_id:</td>
                        <td><input type="text" name="genotype_id"></td>
                        <td>number only</td>
                    </tr>
                    <tr>
                        <td>genotype_name:</td>
                        <td><input name="genotype_name" type="text"></td>
                    </tr>
                     <tr>
                        <td>description:</td>
                        <td><input name="description" type="text"></td>
                    </tr>
                    <tr>
                        <td><input name = "add_genotype" type ="submit" value = "Add genotype" ></td>
                    </tr>

                </table>
          </form>       
            </section>

            <div class="span9">
                <section id="phenotype">
                    <div class="page-header">
                        <h1>Phenotype</h1>
                    </div>

                    < id="show">
                        ID：<input type="text" id="geno_id" /><br />
                        Name：<input type="text" id="geno_name" /><br />
                        Description：<input type="text" id="geno_desc" /><br />
                        <input type="button" onclick=jqajax() value="提交"/><br/>
                    </div>

                </section>
</div>
 
<?php
 if(!isset($_POST["add_genotype"])) {exit;}
$geno_id = $_POST["genotype_id"];
$gene_name = $_POST["genotype_name"];
$description = $_POST["description"];


$query = "insert into geno_type values('".$geno_id."','".$gene_name."','".$description."');";

 if (mysql_query($query)) 
 {
  print "Record added!";
 } else
 {
  print mysql_error();
 } 
?>

<?php 
include 'footer.php';
?>




