<?php
if (isset($_POST["submit"])) {
    
    unset($_POST["submit"]);
    $_POST["emp_name"] = $_SESSION["login"]["name_user"];
    $_POST["leave_id"] = date("y-m-d");
    MysqlConnection::insert("tbl_applyleave", $_POST);
    header("location:index.php?requestPage=dashboard");
}
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function () {
        $("#fromdate").datepicker({dateFormat: 'yy-mm-dd'});
    });
    $(function () {
        $("#todate").datepicker({dateFormat: 'yy-mm-dd'});
    });
    $(function () {
        $("#date").datepicker({dateFormat: 'yy-mm-dd'});
    });
    $(function () {
        $("#datefrom").datepicker({dateFormat: 'yy-mm-dd'});
    });
    $(function () {
        $("#dateto").datepicker({dateFormat: 'yy-mm-dd'});
    });

</script>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-user"></i></span><h5 style="color: green">APPLY LEAVE</h5></div>
                <form class="form-horizontal" method="post" action="" name="" id="" novalidate="novalidate">
                    <div class="control-group" style="background-color: white;">
                        <div class="span11" style="clear: both "></div>
                        <div class="span11">
                            <div class="span11"  style="float: left">
                                <label class="control-group ">DURATION OF LEAVE:</label>
                            </div>
                        </div>
                        <div class="span11">
                            <div class="span6"  style="float: left">
                                <label class="control-label ">FROM:</label>
                                <div class="controls">
                                    <input type="text" name="fromdate" id="fromdate" value="" maxlength="10" minlength="1" class="span12"   placeholder="yyyy-mm-dd" required>
                                </div>
                            </div>
                            <div class="span6"  style="float: left">
                                <label class="control-label ">TO:</label>
                                <div class="controls">
                                    <input type="text" name="todate" id="todate" value="" maxlength="10" minlength="1" class="span12"   placeholder="yyyy-mm-dd" required>
                                </div>
                            </div> 
                        </div>
                        <div class="span11">
                            <div class="span6"  style="float: left">
                                <label class="control-label ">NO OF DAYS:</label>
                                <div class="controls">
                                    <input type="text" name="no_days" value="" maxlength="10" minlength="1" class="span12" onKeyPress="return isNumberKey(event)"  placeholder="" required>
                                </div>
                            </div>
                        </div>

                        <div class="control-group">
                            <center>
                                <div class="form-actions right">
                                    <a href="index.php?requestPage=viewleave_leave"><button type="submit" name="submit" class="btn btn-success" >SUBMIT</button></a>
                                    <button type="reset" class="btn btn-primary">RESET</button>
                                    <a href="index.php?requestPage=view_apply"><button type="button" class="btn btn-info">VIEW</button></a>
                                    <a href="index.php?requestPage=view_apply"> <button type="button" class="btn btn-danger">CANCEL</button></a>
                                </div>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>