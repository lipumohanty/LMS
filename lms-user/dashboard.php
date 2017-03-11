
<?php
//session_start();
$empId = $_SESSION["email"]["txtId"];
$empname = $_SESSION["email"]["name"];
error_reporting(0);
MysqlConnection::connect();
$resource = MysqlConnection::fetchAll("tbl_predefinedleave");
$getCurretLeavesByEmployee = getCurretLeavesByEmployee($empId);
$casualcounter = calculateCasualeave($empId, "casual leave");
?>

<!--<h4>
    <i class="icon-user"></i> Welcome  <?php echo $_SESSION["email"]["name"] ?>
</h4>-->
<div class="container-fluid">
    <div class="quick-actions_homepage">
        <ul class="quick-actions">
            <li class="bg_lb"> <a href=""> <i class="icon-dashboard"></i>  My Dashboard </a> </li>
            <li class="bg_lg"> <a href="mainpage.php?requestPage=applystep1_apply&type=casual_leave"  ><i class="icon-globe"></i> <span class="label label-important"><?php echo $casualcounter ?></span>Apply for casual leave</a></li>
            <li class="bg_lo"> <a href="mainpage.php?requestPage=userreg_apply&txtId=<?php echo $empId ?>"> <i class="icon-group"></i> Users Manager</a> </li>
            <li class="bg_ls"> <a href="mainpage.php?requestPage=history_apply&empId=<?php echo $empId ?>"> <i class="icon-ok"></i>Status Manager</a> </li>
            <li class="bg_lb"> <a href=""> <i class="icon-signout"></i> LogOut </a> </li>
        </ul>
    </div>
    <div class="row-fluid">
        <div class="span6">
            <div class="widget-box">
                <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i class="icon-calendar"></i></span>
                    <h5>CALENDER 2017</h5>
                </div>
                <div class="widget-content nopadding collapse in" id="collapseG2" style="max-height: 500px;">
                    <marquee marquee-speed="60seconds"  height="30%" bgcolor="" vspace="30px"  direction="down" onmouseover="this.stop();" onmouseout="this.start();" >
                        <ul class="recent-posts">
                            <table class="table data-table" style="font-size: 11px; color: blue;">
                                <tbody>
                                    <?php
                                    foreach ($resource as $result) {
                                        ?>
                                        <tr class="gradeX">
                                            <td> <a href="" target="_blank"><?php echo $result["name"] ?> &nbsp;&nbsp;&nbsp;( <?php echo $result["description"] ?> )&nbsp;&nbsp;&nbsp;( <?php echo $result["date_leave"] ?> )</a></td>
                                        </tr>  
                                        <?php
                                    }
                                    ?>

                                </tbody>
                            </table> 
                            <!--<li>
                                <button class="btn btn-warning btn-mini"><a href="">VIEW ALL</a> </button>
                            </li>-->
                        </ul>
                    </marquee>

                </div>
            </div>


        </div>
        <div class="span6">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-ok"></i></span>
                    <h5>Progress Box</h5>
                </div>
                <div class="widget-content">
                    <ul class="unstyled">
                        <li> <span class="icon24 icomoon-icon-arrow-up-2 green"></span> Casual Leave <span class="pull-right strong">50</span>
                            <div class="progress progress-striped ">
                                <div style="width:50%;" class="bar"></div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="widget-box">
                <div class="widget-title bg_lo"  data-toggle="collapse" href="#collapseG3" > <span class="icon"> <i class="icon-chevron-down"></i> </span>
                    <h5>LAST 5 APPLY</h5>
                </div>
                <div class="widget-content nopadding collapse in" id="collapseG1">
                    <ul class="recent-posts">
                        <table class="table data-table" style="font-size: 11px;">

                            <tbody>
                                <?php
                                foreach ($getCurretLeavesByEmployee as $result) {
                                    ?>
                                    <tr class="gradeX">


                                        <td> Applied on(<?php echo $result["applieddate"] ?>) &nbsp;-&nbsp;<?php
                                $resultemp = MysqlConnection::fetchAll("tbl_employeenew");
                                $resultemp = getEmployeeById($result["empId"]);
                                echo $resultemp["name"];
                                    ?> &nbsp;&nbsp;( <?php echo $result["leave_type"] ?> ) &nbsp;&nbsp;( <?php echo $result["no_days"] ?> )&nbsp;&nbsp;( <?php echo $result["status"] ?> )</td>


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

<div class="row-fluid">
    <div id="footer" class="span12"> 2017 &copy;National Highways Authority Of India. <a href="www.mangalgiri.in">mangalgiri.in</a> </div>
</div>
<?php

function getCurretLeavesByEmployee($empId) {
    $date = date("Y-m-d");
    $query = "SELECT * FROM `tbl_leavehistorynew` where `empId` = '$empId'  ORDER BY `applieddate` DESC limit 0,10";
    $result = MysqlConnection::fetchCustom($query);
    return $result;
}

function getEmployeeById($empId) {

    $result = MysqlConnection::fetchByPrimary("tbl_employeenew", $empId);
    return($result);
}

function calculateCasualeave($empId, $type) {
    $sql = "SELECT  `balanceLeave`  AS balance FROM `tbl_applyleavenew` WHERE `empId` = $empId AND `leave_type` = '$type'";
    $fectch = MysqlConnection::fetchCustom($sql);
    return $fectch[0]["balance"];
}
?>