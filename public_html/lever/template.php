<?php
include 'connect.php';
include 'header.php';
?>
<?php


echo '
<body data-spy="scroll" data-target=".bs-docs-sidebar" data-twttr-rendered="true">


<div class="container">
    <!-- Docs nav ================================================== -->
    <div class="row">
        <div class="span3 bs-docs-sidebar">
            <ul class="nav nav-list bs-docs-sidenav">
                <li><a href="#wijmo"><i class="icon-chevron-right"></i>By Mice</a></li>
                <li><a href="#file-input"><i class="icon-chevron-right"></i>By Test</a></li>
                <li><a href="#date-range"><i class="icon-chevron-right"></i>By Video</a></li>
                <li><a href="#paper-search"><i class="icon-chevron-right"></i>By Paper</a></li>
                <li><a href="#default-search"><i class="icon-chevron-right"></i>By Default</a></li>
            </ul>
        </div>
        <div class="span9">
            <!-- Wijmo ================================================== -->
            <section id="wijmo">
                <div class="page-header">
                    <h1>By Mice</h1>
                </div>
                <p>
                    Search for Mice information
                 </p>
                <div class="container-fluid">
                    <table width="100%" cellspacing="14" cellpadding="14">
                        <tr>
                            <td width="50%" align="center" valign="top" style="border:1px solid #999999; padding:10px; background-color:#f8f8f8; text-align:left;">
                                <form action="fuzzy_search.php" method="get">
                                    <h2>Search By MouseID</h2>
                                    <br><font size="2">(eg. 9634 H302 L404)</font>
                                    <br>
                                    <input type="text" name="gene">
                                    <input type="submit" value="Search">
                                    <br>We support partial ID fuzzy search.
                                </form>
                            </td>
                            <td width="50%" align="center" valign="top" style="border:1px solid #999999; padding:10px; background-color:#f8f8f8; text-align:left;">
                                <form action="fuzzy_search.php" method="get">
                                    <h2>Search By Gender</h2>
                                    <form>
                                        <input type="radio" name="sex" value="male" /> Male
                                        <br />
                                        <input type="radio" name="sex" value="female" /> Female
                                    </form>
                                    <input type="submit" value="Search">
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td width="50%" align="center" valign="top" style="border:1px solid #999999; padding:10px; background-color:#f8f8f8; text-align:left;">
                                <p>
                                <form action="fuzzy_search.php" method="get">
                                    <h2>Search By Age</h2>
                                    <br><select name="geneversion">
                                    <option>Greater</option><option selected>Equal</option><option>Less</option>
                                    </select><input type="text" name="gene">Months (eg. 2 3)
                                    <h5>Tested:</h5>
                                    <input type="radio" name="tested" value="yes" /> Yes
                                    <input type="radio" name="tested" value="no" /> No
                                    <h5>Sort:</h5>
                                    <input type="radio" name="sort" value="asc" /> Asc
                                    <input type="radio" name="sort" value="desc" /> Desc
                                    <br><br>
                                    <input type="submit" value="Search">
                                </form>
                                </p>

                            </td>
                            <td width="50%" align="center" valign="top" style="border:1px solid #999999; padding:10px; background-color:#f8f8f8; text-align:left;">
                                <form action="fuzzy_search.php" method="get">

                                    <h2>Search By Colony</h2>
                                    <br><select name="geneversion">
                                    <option>C57</option><option selected>SOD1-HCN</option><option>SOD1-LCN</option><option>OPMO</option>
                                    <option>Pax7-DTA</option><option>Other</option>
                                </select>
                                    <br><br>
                                    <input type="submit" value="Search">

                                </form>
                            </td>
                        </tr>
                    </table>

                </div>


            </section>
            <!-- File input -->
            <section id="file-input">
                <div class="page-header">
                    <h1>By Test</h1>
                </div>
                <div class="container-fluid">
                    <p>
                    <form>
                        <h5>Date Range:</h5>
                        <input type="text" value="01/01/2016" id="rangeBa" />
                        <input type="text" value="02/06/2016" id="rangeBb" />
                        <h5>Mouse ID:</h5> <input type="text" name="gene_family"> (if known)
                        <br>
                        <input type="submit" value="Search">
                    </form>
                    </p>
                    <!--<form>-->
                        <!--<input type="file" class="span3" name="file" id="file">-->
                    <!--</form>-->
                </div>

            </section>
            <!-- end file input -->
            <!-- File input -->
            <section id="date-range">
                <div class="page-header">
                    <h1>By Video</h1>
                </div>
                <p>
                    <form>
                        <h5>Date Range:</h5>
                        <input type="text" value="01/01/2016" id="rangeBa" />
                        <input type="text" value="02/06/2016" id="rangeBb" />
                        <h5>Mouse ID:</h5> <input type="text" name="gene_family"> (if known)
                        <br>
                         <input type="submit" value="Search">
                    </form>
                </p>

            </section>
            <!-- end file input -->
            <section id="paper-search">
                <div class="page-header">
                    <h1>By Paper</h1>
                </div>
                <p>
                <form>
                Doi:
                <input type="text" name="gene">
                <br><br>

                    <input type="checkbox" name="bike" />
                    Mice id
                    <br />
                    <input type="checkbox" name="car" />
                    Video information
                <br><br>
                <input type="submit" value="Search">
                </form>
                </p>
            </section>

            <section id="default-search">
                <div class="page-header">
                    <h1>By Default</h1>
                </div>
                <p>
                <form>
                    <h5>Q1:How many mice death unexpected?</h5>
                    <input type="submit" value="Search">
                    <h5>Q2:How many missing data?</h5>
                    <input type="submit" value="Search">
            </form>
                </p>
            </section>
        </div>
    </div>
</div>
';
?>

<?php
include 'footer.php';
?>



