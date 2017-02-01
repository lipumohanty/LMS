<?php
error_reporting(0);
MysqlConnection::connect();
$resource = MysqlConnection::fetchAll("tbl_addleave");
if (isset($_POST["btnSearch"])) {
    $leavetype = $_POST["leave_type"];
    $nocount = $_POST["no_count"];

    $sql_custom = "SELECT * FROM `tbl_addleave` "
            . " WHERE `leave_type` LIKE '%$leavetype%' "
            . " AND `no_count` LIKE '%$nocount%' ";

    $resource = MysqlConnection::fetchCustom($sql_custom);
}
?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post" action="" name="basic_validate" id="basic_validate" novalidate="novalidate">
                        <div class="control-group" style="background-color: white;">
                            <div class="span11" style="clear: both "></div>
                            <div class="controls">
                                <center>
                                    <a href="index.php?requestPage=leave_apply"><button type="button" class="btn btn-info">APPLY LEAVE</button></a>
                                </center>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <hr>
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>APPLY LEAVE HISTORY</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table" style="font-size: 11px;">
                        <thead>
                            <tr>
                                <th style="width: 1%">#</th>
                                <th  style="width: 1%">#</th>
                                <th>Leave type</th>
                                <th colspan="3">Duration</th>
                                <th colspan="2">Restricted Leave</th>
                                <th>Purpose of Leave</th>
                                <th colspan="2">Avail LTC</th>
                                <th colspan="2">Leave Encashment</th>
                                <th colspan="4">Headquarter Permission</th>
                                <th>Place of Visit</th>
                                <th>Mobile No</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>