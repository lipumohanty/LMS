<?php

if (isset($_POST["submit"])) {
    
    unset($_POST["submit"]);
    $_POST["added_by"] = $_SESSION["login"]["name_user"];
    $_POST["added_date"] = date("y-m-d");
    MysqlConnection::insert("tbl_addleave", $_POST);
     header("location:mainpage.php?requestPage=viewleave_leave");
}
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
                <div class="widget-title"> <span class="icon"> <i class="icon-user"></i></span><h5 style="color: green">ADD LEAVE</h5></div>

                <form class="form-horizontal" method="post" action="" name="" id="" novalidate="novalidate">
                    <div class="control-group" style="background-color: white;">
                        <div class="span11" style="clear: both "></div>
                        <div class="span11">
                            <div class="span6"  style="float: left">
                                <label class="control-label ">LEAVE TYPE:</label>
                                <div class="controls">
                                    <input type="text" name="leave_type" autofocus=""  value="" maxlength="30" minlength="1" class="span12"  required="" placeholder="" />
                                </div>
                            </div>
                            <div class="span6"  style="float: left">
                                <label class="control-label ">DESCRIPTION:</label>
                                <div class="controls">
                                    <input type="text" name="description"  value=""  maxlength="255"  minlength="1" class="span12"  required="" placeholder="" />
                                </div>
                            </div>
                        </div>

                        <div class="span11">
                            <div class="span6"  style="float: left">
                                <label class="control-label ">NO OF COUNT:</label>
                                <div class="controls">
                                    <input type="text" name="no_count" value="" maxlength="10" minlength="1" class="span12" onKeyPress="return isNumberKey(event)"  placeholder="" required>
                                </div>
                            </div>
                            <div class="span6"  style="float: left">
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
                                    <a href="mainpage.php?requestPage=viewleave_leave"><button type="submit" name="submit" class="btn btn-success" >SUBMIT</button></a>
                                    <button type="reset" class="btn btn-primary">RESET</button>
                                    <a href="mainpage.php?requestPage=viewleave_leave"><button type="button" class="btn btn-info">VIEW</button></a>
                                    <a href="mainpage.php?requestPage=viewleave_leave"> <button type="button" class="btn btn-danger">CANCEL</button></a>
                                </div>
                            </center>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>