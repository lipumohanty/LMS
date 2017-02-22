<?php
error_reporting(0);
MysqlConnection::connect();
$resource = MysqlConnection::fetchAll("tbl_leavehistorynew");
if (isset($_POST["btnSearch"])) {
    $empId = $_POST["empId"];

    $sql_custom = "SELECT * FROM `tbl_leavehistorynew` ";

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
                                    
                                    <th>Application Date</th>
                                    <th>Employee Name</th>
                                    <th>Leave Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Available Leave</th>
                                    <th>No of Days Leave taken</th>
                                    <th>Balance Leave</th>
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
                                        <td>
                                            <?php
                                            /// 2 paramter requre u singin one wo bhi galat wala a
                                            // mast great job 
                                            echo $bal =  getBalanceLeave($result["leave_type"] , $result["empId"]);
//                                            echo $bal =  getBalanceLeave($result["balanceLeave"]);
                                            ?>
                                        </td>

                                        <td><?php echo $result["no_days"] ?></td>
                                        <td>
                                            <?php
                                            if ($bal == "" ) {
                                                echo $result["no_days"]; 
                                            }  else{
                                                echo $balance = $bal - $result["no_days"];
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $result["purpose"] ?></td>
                                        <td><?php echo $result["city"] ?></td>
                                        <td><?php echo $result["mobile"] ?></td>
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

    $result = MysqlConnection::fetchByPrimary("tbl_employeenew", $empId);
    return($result);
}
function getAvailableLeave($type, $empId) {
    if ($type == "casual leave") {
        $result = MysqlConnection::fetchCustom("SELECT no_count FROM `tbl_addleave`");
        return $result[0]["no_count"];
    
    } else {
        return "NA";
    }
}

 
 function getBalanceLeave($type, $empId) {
      
        $query = "SELECT * FROM `tbl_applyleave` WHERE  empId = $empId AND leave_type =  '$type' ";
       $resource = MysqlConnection::executeQuery($query);
       $result = MysqlConnection::toArrays($resource);
       return $result[0]["balanceLeave"];
}
?>