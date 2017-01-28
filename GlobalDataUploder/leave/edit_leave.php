<?php
$txtId = $_GET["txtId"];
if (isset($_POST["submit"])) {
    unset($_POST["submit"]);
    MysqlConnection::edit("tbl_addleave", $_POST, $txtId);
    header("location:index.php?requestPage=viewleave_leave");
}
$employee = MysqlConnection::fetchByPrimary("tbl_addleave", $txtId);
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function () {
        $("#added_date").datepicker({dateFormat: 'yy-mm-dd'});
    });

</script>


<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-user"></i></span><h5 style="color: green">LEAVE YEAR</h5></div>
                <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post" action="" name="" id="" novalidate="novalidate">
                        <div class="control-group" style="background-color: white;">
                            <div class="span11" style="clear: both "></div>
                            <div class="span11">
                                <div class="span11"  style="float: left">
                                    <label class="control-label ">LEAVE TYPE:</label>
                                    <div class="controls">
                                        <input type="text" name="leave_type" autofocus=""  value="<?php echo $employee["leave_type"] ?>" maxlength="30" class="span12"  required="" placeholder="" />
                                    </div>
                                </div>
                            </div>
                            <div class="span11">
                                <div class="span11"  style="float: left">
                                    <label class="control-label ">DESCRIPTION:</label>
                                    <div class="controls">
                                        <input type="text" name="description"  value="<?php echo $employee["description"] ?>"  maxlength="255" class="span12"  required="" placeholder="" />
                                    </div>
                                </div>
                            </div>
                            <div class="span11">
                                <div class="span11"  style="float: left">
                                    <label class="control-label ">NO OF COUNT:</label>
                                    <div class="controls">
                                        <input type="text" name="no_count" value="<?php echo $employee["no_count"] ?>" maxlength="`" class="span12" required="" onKeyPress="return isNumberKey(event)"  placeholder="" />
                                    </div>
                                </div>

                            </div>
                            <div class="span11">
                                <div class="span11"  style="float: left">
                                    <label class="control-label ">ADDED DATE:</label>
                                    <div class="controls">
                                        <input type="text" name="added_date" id="added_date" value="<?php echo $employee["added_date"] ?>" maxlength="" class="span12"   placeholder="" />
                                    </div>
                                </div>

                            </div>
                            <div class="span11">
                                <div class="span11"  style="float: left">
                                    <label class="control-label ">ADDED BY:</label>
                                    <div class="controls">
                                        <input type="text" name="added_by" value="<?php echo $employee["added_by"] ?>" maxlength="30" class="span12"   placeholder="" />
                                    </div>
                                </div>

                            </div>
                            <div class="span11">
                                <div class="span11"  style="float: left">
                                    <label class="control-label ">IS ACTIVE:</label>
                                    <div class="controls">
                                        <select class="span12" id="is_active" name="is_active">

                                            <option value="y">Yes</option>
                                            <option value="n">No</option>

                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="control-group">
                                <center>
                                    <div class="form-actions right">

                                        <a href=""><button type="submit" name="submit" class="btn btn-success">ADD</button>
                                            <button type="reset" class="btn btn-primary">RESET</button>
                                            <a href="index.php?requestPage=viewleave_leave"><button type="button" class="btn btn-info">VIEW</button></a>
                                            <a href="index.php?requestPage="><button type="button" class="btn btn-info">EDIT</button></a>
                                    </div>
                                </center>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>