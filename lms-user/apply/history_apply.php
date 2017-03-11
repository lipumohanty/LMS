<?php
$empId = $_GET["empId"];
error_reporting(0);
MysqlConnection::connect();
$resource = MysqlConnection::fetchByPrimary("tbl_leavehistorynew", $empId);
$getCurretLeavesByEmployee = getCurretLeavesByEmployee($empId);
?>
<div class="container-fluid">
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>YOUR LEAVE RECORD</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table "  style="font-size: 11px;">
                            <thead>
                                <tr>
                                    <th>Application Date</th>
                                    <th>Employee Name</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>No of Days</th>
                                     <th>Purpose of Leave</th>
                                     
                                    <th>Status</th>
                                    <th>Remark</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($getCurretLeavesByEmployee as $result) {
                                    ?>
                                    <tr class="gradeX">
                                       <td><?php echo $result["applieddate"] ?></td>
                                        <td>
                                            <?php
                                            $resultemp = MysqlConnection::fetchAll("tbl_employeenew");
                                            $resultemp = getEmployeeById($result["empId"]);
                                            echo $resultemp["name"];
                                            ?>
                                        </td>
                                        <td><?php echo $result["leave_type"] ?></td>
                                        <td><?php echo $result["fromdate"] ?></td>
                                        <td><?php echo $result["todate"] ?></td>
                                        <td><?php echo $result["no_days"] ?></td>
                                        <td><?php echo $result["purpose"] ?></td>
                                        
                                         <td><?php echo $result["status"] ?></td>
                                          <td><?php echo $result["reason"] ?></td>
                                      
                                    </tr>  
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post" action="" name="basic_validate" id="basic_validate" novalidate="novalidate">
                        <div class="control-group" style="background-color: white;">
                            <div class="span11" style="clear: both "></div>
                            <div class="controls">
                                <center>

                                    <a href="mainpage.php?requestPage=view_apply"><button type="button" class="btn btn-success">BACK</button></a>
                                </center>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php

function getEmployeeById($empId) {

    $result = MysqlConnection::fetchByPrimary("tbl_employeenew", $empId);
    return($result);
}

function getCurretLeavesByEmployee($empId) {
   
    $query = "SELECT * FROM `tbl_leavehistorynew` where `empId` = '$empId'  ORDER BY `applieddate`";
    $result = MysqlConnection::fetchCustom($query);
    return $result;
}

?>