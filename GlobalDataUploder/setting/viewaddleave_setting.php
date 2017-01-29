<?php
error_reporting(0);
MysqlConnection::connect();
$resource = MysqlConnection::fetchAll("tbl_leavesetting");
if (isset($_POST["btnSearch"])) {
    $empfname = $_POST["$resultemp"];
   
    $sql_custom = "SELECT * FROM `tbl_leavesetting` "
            . " WHERE `fname` LIKE '%$empfname%' ";
            
    $resource = MysqlConnection::fetchCustom($sql_custom);
}
?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-cloud"></i> </span>
                    <h5>SEARCH </h5>
                </div>
                <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post" action="" name="basic_validate" id="basic_validate" novalidate="novalidate">
                        <div class="control-group">
                            <label class="control-label ">EMPLOYEE NAME :</label>
                            <div class="controls">
                                <input type="text" name="empfname" value="<?php echo $resultemp["fname"] ?>"  autofocus="" maxlength="10" class="span11"    placeholder="" />
                            </div>

                            <div class="controls">
                                <center>

                                    <button type="submit" name="btnSearch" class="btn btn-success">Search</button>
                                    <button type="submit" class="btn btn-danger">Clear</button>
                                    <a href="index.php?requestPage=addleave_setting"><button type="button" class="btn btn-info">Add</button></a>
                                </center>
                            </div>
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
                    <h5>VIEW LEAVE SETTING</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table" style="font-size: 11px;">
                        <thead>
                            <tr>
                                <th style="width: 1%">#</th>
                                <th  style="width: 1%">#</th>

                                <th>Employee Name</th>
                                <th>Commuted Leave</th>
                                <th>Halfpay Leave</th>
                                <th>Special Leave</th>
                                <th>Leaving of Headquarter</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($resource as $result) {
                                ?>
                                <tr class="gradeX">
                                    <td>
                                        <a  title="EDIT" href="index.php?requestPage=editleave_setting&txtId=<?php echo $result["txtId"] ?>">
                                            <i class="icon-pencil"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a title="DELETE" onclick="return confirm('Are You Sure Want to delete this Record?');" href="index.php?requestPage=request_delete&tblname=tbl_leavesetting&pkvalue=<?php echo $result["txtId"] ?>&location=index.php?requestPage=viewaddleave_setting">
                                            <i class="icon-remove"></i>
                                        </a>                                  
                                    </td>                                  

                                    <td>
                                        <?php
                                        $resultemp = getEmployeeById($result["emp_id"]);
                                        echo $resultemp["fname"] . " " . $resultemp["lname"];
                                        ?>
                                    </td>
                                    <td><?php echo $result["commuted_leave"] ?></td>
                                    <td><?php echo $result["halfpay_leave"] ?></td>
                                    <td><?php echo $result["special_leave"] ?></td>
                                    <td><?php echo $result["leaving_hq"] ?></td>
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

<?php

function getEmployeeById($empId) {

    $result = MysqlConnection::fetchByPrimary("tbl_employee", $empId);
    return($result);
}
?>