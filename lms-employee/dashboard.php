
<?php
//session_start();
$empId = $_SESSION["email"]["txtId"];
error_reporting(E_ALL);
MysqlConnection::connect();
$resource = MysqlConnection::fetchAll("tbl_predefinedleave");
$earnedcounter = calculateEarnedleave($empId, "earned_leave");
$casualcounter = calculateCasualeave($empId, "casual_leave");
?>

<!--<h4>
    <i class="icon-user"></i> Welcome  <?php echo $_SESSION["email"]["fname"] ?>
</h4>-->
<div class="container-fluid">
    <div class="quick-actions_homepage">
        <ul class="quick-actions">
            <li class="bg_lo"> <a href=""> <i class="icon-dashboard"></i>  My Dashboard </a> </li>
            <li class="bg_lb"> <a href="mainpage.php?requestPage=leave_apply&type=casual_leave"  ><i class="icon-globe"></i> <span class="label label-important"><?php echo $casualcounter ?></span>CASUAL LEAVE</a></li>
            <li class="bg_lg"> <a href="mainpage.php?requestPage=leave_apply&type=earned_leave" > <i class="icon-globe"></i><span class="label label-important"><?php echo $earnedcounter ?></span>EARNED LEAVE</a> </li>
            <li class="bg_ly"> <a href="mainpage.php?requestPage=specialleave_apply&type=medical_leave"> <i class="icon-globe"></i>MEDICAL LEAVE</a></li>
            <li class="bg_lo"> <a href="mainpage.php?requestPage=specialleave_apply&type=commuted_leave"> <i class="icon-globe"></i>COMMUTED LEAVE</a></li>
            <li class="bg_lb"> <a href="mainpage.php?requestPage=specialleave_apply&type=halfpay_leave"> <i class="icon-globe"></i> HALFPAY LEAVE</a></li>
            <li class="bg_lg"> <a href="mainpage.php?requestPage=specialleave_apply&type=special_leave"> <i class="icon-globe"></i>SPECIAL LEAVE</a></li>
            <li class="bg_ly"> <a href="mainpage.php?requestPage=specialleave_apply&type=leaving_headquarter"> <i class="icon-globe"></i>LEAVING HEADQUARTER</a></li>

        </ul>
    </div>
    <div class="row-fluid">
        <div class="span6">
            <div class="widget-box">
                <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i class="icon-calendar"></i></span>
                    <h5>HOLIDAY CALENDER</h5>
                </div>
                <div class="widget-content nopadding collapse in" id="collapseG2">
                    <ul class="recent-posts">
                        <table class="table data-table" style="font-size: 11px;">

                            <tbody>

                                <?php
                                foreach ($resource as $result) {
                                    ?>
                                    <tr class="gradeX">


                                        <td> <?php echo $result["name"] ?> &nbsp;&nbsp;&nbsp;( <?php echo $result["date_leave"] ?> )</td>


                                    </tr>  
                                    <?php
                                }
                                ?>

                            </tbody>
                        </table>   
                        <li>
                            <button class="btn btn-warning btn-mini"><a href="">VIEW ALL</a> </button>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="span6">
            <div class="widget-box">
                <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG1"><span class="icon"><i class="icon-briefcase"></i></span>
                    <h5>LAST APPLY</h5>
                </div>
                <div class="widget-content nopadding collapse in" id="collapseG1">
                    <ul class="recent-posts">
                        <table class="table data-table" style="font-size: 11px;">

                            <tbody>
                                <?php
                                $resource1 = MysqlConnection::fetchAll("tbl_applyleave");

                                foreach ($resource1 as $result1) {
                                    ?>
                                    <tr class="gradeX">


                                        <td><?php echo $result1["leave_type"] ?> &nbsp;&nbsp;( <?php echo $result1["no_days"] ?> ) &nbsp;&nbsp;( <?php echo $result1["status"] ?> )</td>


                                    </tr>  
                                    <?php
                                }
                                ?>

                            </tbody>
                        </table>
                        <div class="new-update clearfix">
                            <button class="btn btn-warning btn-mini">
                                <a href="">VIEW ALL</a> 
                            </button>
                        </div> 
                </div>
            </div>
        </div>
    </div>
</div>

<?php

function calculateEarnedleave($empId, $type) {
    $sql = "SELECT SUM( `approved_leave` ) AS balance FROM `tbl_applyleave` WHERE `empId` = $empId AND `leave_type` = '$type'";
    $fectch = MysqlConnection::fetchCustom($sql);
    return $fectch[0]["balance"];
}

function calculateCasualeave($empId, $type) {
    $sql = "SELECT SUM( `approved_leave` ) AS balance FROM `tbl_applyleave` WHERE `empId` = $empId AND `leave_type` = '$type'";
    $fectch = MysqlConnection::fetchCustom($sql);
    return $fectch[0]["balance"];
}
?>