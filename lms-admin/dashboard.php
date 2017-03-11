
<?php
//session_start();
$empId = $_SESSION["email"]["txtId"];
error_reporting(0);
MysqlConnection::connect();
$resource = MysqlConnection::fetchAll("tbl_predefinedleave");

$getCurretLeavesByStatuspending =getCurretLeavesByStatus("");
$getCurretLeavesByStatusapprove =getCurretLeavesByStatus("APPROVED");
$getCurretLeavesByStatusreject =getCurretLeavesByStatus("REJECTED");
$casualcountercount = calculateCasualeavecount();
$getCurretLeaves = getCurretLeaves();
?>

<!--<h3>
    Welcome <?php echo $_SESSION["email"]["name"] ?>
</h3>-->
<div class="container-fluid">
   <div class="quick-actions_homepage">
        <ul class="quick-actions">
            <li class="bg_lb">  <a href="mainpage.php?requestPage"> <i class="icon-dashboard"></i> My Dashboard </a> </li>
            <li class="bg_lg"> <a href="mainpage.php?requestPage=viewleave_leave"  > <i class="icon-th-large"></i><span class="label label-important"><?php echo $casualcountercount ?></span>Casual Leave</a></li>
            <li class="bg_ly"> <a href="mainpage.php?requestPage=viewaddleave_setting" > <i class=" icon-th-large"></i> <span class="label label-important"></span> Earned Leave </a> </li>
            <li class="bg_lo"> <a href="mainpage.php?requestPage=view_employee"> <i class="icon-group"></i> Users Manager</a> </li>
            <li class="bg_ls"> <a href="mainpage.php?requestPage=add_leaveapproval"> <i class="icon-ok"></i>Request Manager</a> </li>
            <li class="bg_ls"> <a href="#"> <i class="icon-signal"></i>Reports Manager</a> </li>
        </ul>
    </div>
    <div class="row-fluid">
        <div class="span6">
            <div class="widget-box">
                <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i class="icon-chevron-down"></i></span>
                    <h5>LAST 5 PENDING REQUEST</h5>
                </div>
                <div class="widget-content nopadding collapse in" id="collapseG1">
                    <ul class="recent-posts">
                        <table class="table data-table" style="font-size: 11px;">

                            <tbody>
                                <?php
                              

                                foreach ($getCurretLeavesByStatuspending as $result) {
                                    ?>
                                    <tr class="gradeX">


                                        <td>Applied on(<?php echo $result["applieddate"] ?>) &nbsp;-&nbsp;<?php
                                            $resultemp = MysqlConnection::fetchAll("tbl_employeenew");
                                            $resultemp = getEmployeeById($result["empId"]);
                                            echo $resultemp["name"];
                                            ?> &nbsp;&nbsp;( <?php echo $result["leave_type"] ?> ) &nbsp;&nbsp;( <?php echo $result["applieddate"] ?> )</td>


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
             <div class="widget-box">
          <div class="widget-title bg_lo"  data-toggle="collapse" href="#collapseG3" > <span class="icon"> <i class="icon-chevron-down"></i> </span>
            <h5>LAST 5 APPROVED REQUEST</h5>
          </div>
           <div class="widget-content nopadding collapse in" id="collapseG1">
                    <ul class="recent-posts">
                        <table class="table data-table" style="font-size: 11px;">

                            <tbody>
                                <?php
                              

                                foreach ($getCurretLeavesByStatusapprove as $result) {
                                    ?>
                                    <tr class="gradeX">


                                        <td>Applied on(<?php echo $result["applieddate"] ?>) &nbsp;-&nbsp;<?php
                                            $resultemp = MysqlConnection::fetchAll("tbl_employeenew");
                                            $resultemp = getEmployeeById($result["empId"]);
                                            echo $resultemp["name"];
                                            ?> &nbsp;&nbsp;( <?php echo $result["leave_type"] ?> ) &nbsp;&nbsp;( <?php echo $result["applieddate"] ?> )</td>


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
        <div class="span6">
            <div class="widget-box">
                <div class="widget-title bg_lo"  data-toggle="collapse" href="#collapseG3" > <span class="icon"> <i class="icon-chevron-down"></i> </span>
                    <h5>TODAYS LEAVE REQUEST</h5>
                    </div>
                 <div class="widget-content nopadding collapse in" id="collapseG1">
                    <ul class="recent-posts">
                <table class="table data-table" style="font-size: 11px;">

                            <tbody>
                                <?php
                                

                                foreach ($getCurretLeaves as $result) {
                                    ?>
                                    <tr class="gradeX">


                                        <td>Applied on(<?php echo $result["applieddate"] ?>) &nbsp;-&nbsp;<?php
                                            $resultemp = MysqlConnection::fetchAll("tbl_employeenew");
                                            $resultemp = getEmployeeById($result["empId"]);
                                            echo $resultemp["name"];
                                            ?> &nbsp;&nbsp;( <?php echo $result["leave_type"] ?> ) &nbsp;&nbsp;( <?php echo $result["applieddate"] ?> )</td>


                                    </tr>  
                                    <?php
                                }
                                ?>

                            </tbody>
                        </table>
            </div>
        </div>
            
            
           
             <div class="widget-box">
          <div class="widget-title bg_lo"  data-toggle="collapse" href="#collapseG3" > <span class="icon"> <i class="icon-chevron-down"></i> </span>
            <h5>LAST 5 REJECTED REQUEST</h5>
          </div>
           <div class="widget-content nopadding collapse in" id="collapseG1">
                    <ul class="recent-posts">
                        <table class="table data-table" style="font-size: 11px;">

                            <tbody>
                                <?php
                              

                                foreach ($getCurretLeavesByStatusreject as $result) {
                                    ?>
                                    <tr class="gradeX">


                                        <td><?php echo $result["empId"] ?> &nbsp;&nbsp;( <?php echo $result["leave_type"] ?> ) &nbsp;&nbsp;( <?php echo $result["entrydate"] ?> )</td>


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
    <div class="row-fluid">
  <div id="footer" class="span12"> 2017 &copy;National Highways Authority Of India. <a href="www.mangalgiri.in">mangalgiri.in</a> </div>
</div>

<?php






function getCurretLeaves() {
    $date = date("Y-m-d");
    $query = "SELECT * FROM `tbl_leavehistorynew` where `applieddate` = '$date'  ORDER BY `applieddate` DESC";
    $result = MysqlConnection::fetchCustom($query);
    return $result;
}
function getCurretLeavesByStatus($status) {
    $date = date("Y-m-d");
    $query = "SELECT * FROM `tbl_leavehistorynew` where `status` = '$status'  ORDER BY `applieddate` DESC limit 0,10";
    $result = MysqlConnection::fetchCustom($query);
    return $result;
}

function calculateCasualeavecount() {
    $sql = "SELECT no_count AS balance FROM `tbl_addleave` ";
    $fectch = MysqlConnection::fetchCustom($sql);
    return $fectch[0]["balance"];
}
function getEmployeeById($empId) {

    $result = MysqlConnection::fetchByPrimary("tbl_employeenew", $empId);
    return($result);
}


?>