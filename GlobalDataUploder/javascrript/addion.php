<?php
include("config.php");
error_reporting(0);


if (isset($_POST["submit"])) {
    //echo "*";
    $date_from = $_POST["datefrom"];
    if (empty($date_from)) {
        $strError[] = "Please Select Date";
    }
    $date_to = $_POST["dateto"];
    if (empty($date_to)) {
        $strError[] = "Please Select date";
    }


    if (empty($strError)) {

        $inserted = mysql_query("SELECT * FROM `tbl_outward`");
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Outward Report</title>

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
            <link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,400,300,600,700|Six+Caps' rel='stylesheet' type='text/css' />



            <link href="assets/css/basic.css" rel="stylesheet" />

            <link href="assets/css/custom.css" rel="stylesheet" />

            <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
            <style>
                .form-control {width:70%;}
            </style>
            <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>
            <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <script>
                $(function () {
                    $("#dateFrom").datepicker({dateFormat: 'dd-mm-yy'});
                });
                $(function () {
                    $("#dateTo").datepicker({dateFormat: 'dd-mm-yy'});
                });

            </script>
    </head>
    <body>
        <div id="wrapper">
            <div class="hidden-print">
                <?php
                include("header1.php");
                ?>
            </div>
            <!-- /. NAV SIDE  -->
            <div id="page-wrapper">
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 style="float:left;width:50%;" class="page-head-line">Outward Reports</h1>
                            <form style="float:right;" class="form-horizontal" method="post" enctype="multipart/form-data" role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                                <input style="float:left;" type="text" class="form-control" name="searchin1" placeholder="Search Here...">


                                    <button style="float:left;" type="submit" name="submitin" class="btn btn-default">GO</button>


                            </form>
                            <!-- <h1 class="page-subhead-line">This is dummy text , you can replace it with your original text. </h1> -->

                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <div style="border:2px solid black;background:#6495ED;">

                        <center><fieldset class="hidden-print">
                          <legend><!-- Toll - Plaza Registartion  --></legend><!-- <a href="main_page.php"><p>Return</p></a> -->
                                <form class="form-horizontal" method="post" enctype="multipart/form-data" role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">Date From:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="dateFrom" name="datefrom" placeholder="dd-mm-yyyy">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-sm-2">Date To:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="dateTo" name="dateto" placeholder="dd-mm-yyyy">
                                        </div>
                                    </div>

                                    <div class="form-group">        
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" name="submit" class="btn btn-default">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </fieldset></center>
                    </div>
                    <hr>
                        <div style="width:100%;" class="container">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div style="border:2px solid black;" class="table-responsive">

                                        <table summary="This table shows how to create responsive tables using Bootstrap's default functionality" class="table table-bordered table-hover">

                                            <thead style="border:1px solid black;">
                                                <tr>
                                                    <th id="th11">Date</th>
                                                    <th id="th11">Time</th>
                                                    <th id="th11">Outward Number</th>
                                                    <th id="th11">Reference No.& Date</th>
                                                    <th id="th11">Subject</th>
                                                    <th id="th11">Address to</th>
                                                    <th id="th11">Copy to</th>
                                                    <th id="th11"> From</th>
                                                    <th id="th11">File No. Of RO</th>
                                                    <th id="th11">Type of Letter</th>
                                                    <th id="th11">RO File No</th>
                                                    <th id="th11">Linked Inward Letter No</th>
                                                    <th id="th11">Mode of Dispatch</th>
                                                    <th id="th11">Remark</th>
                                                    <th id="th11">Letter</th>



                                                </tr>
                                            </thead>
                                            <?php
                                            if (isset($_POST["submit"])) {
                                                $sqlin = "SELECT * FROM tbl_outward 
  LEFT JOIN tbl_out_file
ON tbl_outward.out_id=tbl_out_file.out_no
  
  WHERE fixx='" . RO . "' and date BETWEEN '" . $date_from . "' and '" . $date_to . "'";
                                                $sqlinward = mysql_query($sqlin);
                                                while ($results = mysql_fetch_assoc($sqlinward)) {
                                                    ?>




                                                    <tbody>
                                                        <tr>
                                                            <td id="td11" style="border-left:2px solid black;"><?php echo $results['date']; ?></td>
                                                            <td id="td11"><?php echo $results['time']; ?></td>
                                                            <td id="td11"><?php echo $results['out_id']; ?></td>
                                                            <td id="td11"><?php echo $results['refer']; ?></td>
                                                            <td id="td11"><?php echo $results['subject']; ?></td>
                                                            <td id="td11"><?php echo $results['add_to']; ?></td>
                                                            <td id="td11"><?php echo $results['copy_to']; ?></td>
                                                            <td id="td11"><?php echo $results['from']; ?></td>
                                                            <td id="td11"><?php echo $results['file_ro']; ?></td>
                                                            <td id="td11"><?php echo $results['receipt']; ?></td>
                                                            <td id="td11"><?php echo $results['ro_file_nos']; ?></td>
                                                            <td id="td11"><?php echo $results['link_in']; ?></td>
                                                            <td id="td11"><?php echo $results['type_letter']; ?></td>
                                                            <td id="td11"><?php echo $results['remark']; ?></td>
                                                            <td id="td11"><a href="assets/upload/<?php echo $results['letter']; ?>">
                                                                    <?php echo $results['letter']; ?></a></td>



                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                                <?php
                                                if (isset($_POST["submitin"])) {
                                                    $searchin = $_POST['searchin1'];
                                                    $sqlin1 = "SELECT * FROM tbl_outward 
                                                     LEFT JOIN tbl_out_file
  
                                                     ON tbl_outward.out_id=tbl_out_file.out_no
  
                                                    WHERE subject ='" . $searchin . "' or `from` ='" . $searchin . "' or `add_to` ='" . $searchin . "'  or `receipt` ='" . $searchin . "' ";
                                                    $sqlinward1 = mysql_query($sqlin1);
                                                    while ($results = mysql_fetch_assoc($sqlinward1)) {
                                                        ?>
                                                        <tr>
                                                            <td id="td11" style="border-left:2px solid black;"><?php echo $results['date']; ?></td>
                                                            <td id="td11"><?php echo $results['time']; ?></td>
                                                            <td id="td11"><?php echo $results['out_id']; ?></td>
                                                            <td id="td11"><?php echo $results['refer']; ?></td>
                                                            <td id="td11"><?php echo $results['subject']; ?></td>
                                                            <td id="td11"><?php echo $results['add_to']; ?></td>
                                                            <td id="td11"><?php echo $results['copy_to']; ?></td>
                                                            <td id="td11"><?php echo $results['from']; ?></td>
                                                            <td id="td11"><?php echo $results['file_ro']; ?></td>
                                                            <td id="td11"><?php echo $results['receipt']; ?></td>
                                                            <td id="td11"><?php echo $results['ro_file_nos']; ?></td>
                                                            <td id="td11"><?php echo $results['link_in']; ?></td>
                                                            <td id="td11"><?php echo $results['type_letter']; ?></td>
                                                            <td id="td11"><?php echo $results['remark']; ?></td>

                                                            <td id="td11"><a href="assets/upload/<?php echo $results['letter']; ?>">
                                                                    <?php echo $results['letter']; ?></a></td>



                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>

                                            <tfoot>
                                                <tr>
                                                    <td style="color:black;font-size:15px;" colspan="16" class="text-center">Here are the result that you have searched by search box.
                                                        <span><button onclick="print();">Scan</button></span><a href="http://www.gmail.com" target="_blank">
                                                            <button>Mail</button></a>    
                                                    </td>
                                                </tr>
                                            </tfoot> 

                                        </table>
                                    </div>
                                </div>
                            </div>
                            <hr style="border:2px solid black;">
                        </div>
                </div>


                <!-- display -->

                <!-- end display -->
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
        <!-- /. WRAPPER  -->
        <!-- <div id="footer-sec">
            &copy; 2016NHAI | Design By : RO Nagpur.
        </div> -->

        <?php
        include("footer.php");
        ?>
        <!-- /. FOOTER  -->
        <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
        <!-- JQUERY SCRIPTS -->
        <script src="assets/js/jquery-1.10.2.js"></script>
        <!-- BOOTSTRAP SCRIPTS -->
        <script src="assets/js/bootstrap.js"></script>
        <!-- METISMENU SCRIPTS -->
        <script src="assets/js/jquery.metisMenu.js"></script>
        <!-- CUSTOM SCRIPTS -->
        <script src="assets/js/custom.js"></script>


    </body>
</html>
