<?php
$txtId = $_GET["txtId"];
if (isset($_POST["submit"])) {
    unset($_POST["submit"]);
    MysqlConnection::edit("tbl_leavesetting", $_POST, $txtId);
    header("location:mainpage.php?requestPage=viewaddleave_setting");
}
$employee = MysqlConnection::fetchByPrimary("tbl_leavesetting", $txtId);
?>

<div class="container-fluid">
    <hr>
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                    <h5>LEAVE SETTINGS: </h5>
                </div>
                <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post" action="" name="" id="" novalidate="novalidate">
                        <div class="control-group" style="background-color: white;">
                            <div class="span11" style="clear: both "></div>
                            <div class="span11">
                                <div class="span6"  style="float: left">
                                    <label class="control-label ">EMPLOYEE ID:</label>
                                    <div class="controls">
                                        <input type="text" name="emp_id" value="" maxlength="" class="span12"   placeholder="" />
                                    </div>
                                </div>
                                <div class="span6"  style="float: left">
                                    <label class="control-label ">COMMUTED LEAVE :</label>
                                    <div class="controls">
                                        <input type="text" name="commuted_leave" autofocus="" value="<?php echo $employee["commuted_leave"] ?>" maxlength="" class="span12"  required="" placeholder="" />
                                    </div>
                                </div>
                            </div>

                            <div class="span11">
                                <div class="span6"  style="float: left">
                                    <label class="control-label ">HALF PAY LEAVE :</label>
                                    <div class="controls">
                                        <input type="text" name="halfpay_leave"  value="<?php echo $employee["halfpay_leave"] ?>"  maxlength="" class="span12"  required="" placeholder="" />
                                    </div>
                                </div>
                                <div class="span6"  style="float: left">
                                    <label class="control-label ">SPECIAL LEAVE: </label>
                                    <div class="controls">
                                        <input type="text" name="special_leave" value="<?php echo $employee["special_leave"] ?>" maxlength="" class="span12"   placeholder="" />
                                    </div>
                                </div>
                            </div>


                            <div class="span11">
                                <div class="span6"  style="float: left">
                                    <label class="control-label ">LEAVING OF HEADQUARTER :</label>
                                    <div class="controls">
                                        <input type="text" name="leaving_hq" value="<?php echo $employee["leaving_hq"] ?>" maxlength="" class="span12"   placeholder="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <center>
                                <div class="form-actions right">
                                    <a href=""><button type="submit" name="submit" class="btn btn-success">SUBMIT</button>
                                        <button type="submit" class="btn btn-danger">CANCEL</button>
                                </div>
                            </center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>