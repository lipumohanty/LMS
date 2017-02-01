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
                <div class="widget-title"> <span class="icon"> <i class="icon-cloud"></i> </span>
                    <h5>SEARCH RECORD BY CATAGORIES</h5>
                </div>
                <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post" action="" name="basic_validate" id="basic_validate" novalidate="novalidate">
                        <div class="control-group" style="background-color: white;">
                            <div class="span11" style="clear: both "></div>
                            <div class="span11">
                                <div class="span6"  style="float: left">
                                    <label class="control-label ">LEAVE TYPE :</label>
                                    <div class="controls">
                                        <select name="leave_type">
                                            <?php
                                            foreach ($resource as $result) {
                                                ?>
                                                <option value="<?php echo $result["leave_type"] ?>" ><?php echo $result["leave_type"] ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="span6"  style="float: left">
                                    <label class="control-label ">NO OF COUNT :</label>
                                    <div class="controls">
                                        <input type="text" name="no_count" value="<?php echo $nocount ?>"  autofocus="" maxlength="100" class="span11"    placeholder="" />
                                    </div>
                                </div>
                            </div>

                            <div class="controls">
                                <center>
                                    <button type="submit" name="btnSearch" class="btn btn-success">Search</button>
                                    <button type="submit" class="btn btn-danger">Clear</button>
                                    <a href="index.php?requestPage=addleave_leave"><button type="button" class="btn btn-info">Add</button></a>
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
                    <h5>VIEW LEAVE</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered data-table" style="font-size: 11px;">
                        <thead>
                            <tr>
                                <th style="width: 1%">#</th>
                                <th  style="width: 1%">#</th>
                                <th>Leave type</th>
                                <th>Description</th>
                                <th>No Of Count</th>
                                <th>Added Date</th>
                                <th>Added By</th>
                                <th>Is Active</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($resource as $result) {
                                ?>
                                <tr class="gradeX">
                                    <td>
                                        <a title="EDIT" href="index.php?requestPage=edit_leave&txtId=<?php echo $result["txtId"] ?>">
                                            <i class="icon-pencil"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a title="DELETE" onclick="return confirm('Are You Sure Want to delete this Record?');" href="index.php?requestPage=request_delete&tblname=tbl_addleave&pkvalue=<?php echo $result["txtId"] ?>&location=index.php?requestPage=viewleave_leave">
                                            <i class="icon-remove"></i>
                                        </a>                                  
                                    </td>

                                    <td><?php echo $result["leave_type"] ?></td>
                                    <td><?php echo $result["description"] ?></td>
                                    <td><?php echo $result["no_count"] ?></td>
                                    <td><?php echo $result["added_date"] ?></td>
                                    <td><?php echo $result["added_by"] ?></td>
                                    <td><?php echo $result["is_active"] ?></td>

                                </tr>  
                                <?php
                            }
                            ?>
                            <?php
                            if (count($resource) == 0) {
                                ?>
                                <tr>
                                    <td colspan="8" style="text-align: center;color: red">
                                        No Record Found
                                    </td>
                                </tr>      
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>