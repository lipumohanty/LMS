<?php
error_reporting(0);
MysqlConnection::connect();
$resource = MysqlConnection::fetchAll("tbl_leavehistory");
if (isset($_POST["btnSearch"])) {
    $emp_id = $_POST["empId"];

    $sql_custom = "SELECT * FROM `tbl_leavehistory` ";

    $resource = MysqlConnection::fetchCustom($sql_custom);
}
?>
<div class="container-fluid">

    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>LEAVE REQUEST</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table" style="font-size: 11px;">
                            <thead>
                                <tr>
                                    <th>Employee Name</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>No of Days</th>
                                     <th>Purpose of Leave</th>
                                    <th>Place of Visit</th>
                                    <th>Mobile No</th>
                                    <th> Status </th>
                                     <th> Reason </th>


                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($resource as $result) {
                                    ?>
                                    <tr class="gradeX">
                                       
                                       
                                        <td>
                                            <?php
                                            $resultemp = MysqlConnection::fetchAll("tbl_employee");
                                            $resultemp = getEmployeeById($result["empId"]);
                                            echo $resultemp["fname"] . " " . $resultemp["lname"];
                                            ?>
                                        </td>
                                        <td><?php echo $result["leave_type"] ?></td>
                                        <td><?php echo $result["fromdate"] ?></td>
                                        <td><?php echo $result["todate"] ?></td>
                                        <td><?php echo $result["no_days"] ?></td>
                                        <td><?php echo $result["purpose"] ?></td>
                                        <td><?php echo $result["place"] ?></td>
                                        <td><?php echo $result["contact"] ?></td>
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

                                    <a href="mainpage.php?requestPage="><button type="button" class="btn btn-primary">BACK</button></a>
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

    $result = MysqlConnection::fetchByPrimary("tbl_employee", $empId);
    return($result);
}
?>