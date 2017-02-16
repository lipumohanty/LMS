<?php
error_reporting(0);
MysqlConnection::connect();
$resource = MysqlConnection::fetchAll("tbl_leavehistory");
if (isset($_POST["btnSearch"])) {
    $empId = $_POST["empId"];

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
                                    <th style="width: 1%">#</th>
                                    <th  style="width: 1%">#</th>
                                    <th>Employee Name</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Available count</th>
                                    <th>No of Days</th>
                                    <th>Balance count</th>
                                    <th>Purpose of Leave</th>
                                    <th>Place of Visit</th>
                                    <th>Mobile No</th>



                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($resource as $result) {
                                    ?>
                                    <tr class="gradeX">
                                        <td>
                                            <a title="APPROVE" href="mainpage.php?requestPage=edit_leaveapproval&txtId=<?php echo $result["txtId"] ?>">
                                                <i class="icon-ok-sign"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a title="REJECT" href="mainpage.php?requestPage=reject_leaveapproval&txtId=<?php echo $result["txtId"] ?>">
                                                <i class=" icon-remove-sign"></i>
                                            </a>                                  
                                        </td>
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
                                        <td>
                                            <?php
                                            echo $bal = getAvailableLeave($result["leave_type"]);
                                            ?>
                                        </td>

                                        <td><?php echo $result["no_days"] ?></td>
                                        <td>
                                            <?php
                                            if ($bal == "NA" ) {
                                                echo $result["no_days"]; 
                                            }  else{
                                                echo $balance = $bal - $result["no_days"];
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $result["purpose"] ?></td>
                                        <td><?php echo $result["place"] ?></td>
                                        <td><?php echo $result["contact"] ?></td>


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

                                    <a href="mainpage.php?requestPage=status_leaveapproval"><button type="button" class="btn btn-primary">BACK</button></a>
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

function getAvailableLeave($type, $empId) {
    if ($type == "casual_leave") {
        $result = MysqlConnection::fetchCustom("SELECT no_count FROM `tbl_addleave`");
        return $result[0]["no_count"];
    } else if ($type == "earned_leave") {
        $result = MysqlConnection::fetchCustom("SELECT earned_leave FROM `tbl_leavesetting`");
        return $result[0]["earned_leave"];
    } else {
        return "NA";
    }
}
?>

