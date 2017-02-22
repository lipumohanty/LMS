<?php
error_reporting(0);
$type = str_replace("_", " ", $_GET["type"]);
if (isset($_POST["submit"])) {
    if ($_POST["fromdate"] == "" || $_POST["todate"]||$_POST["no_days"]||$_POST["purpose"]||$_POST["place"]||$_POST["contact"]) {
        $error = "Enter All fields";
    } else {

    unset($_POST["submit"]);
    $_POST["empId"] = $_SESSION["email"]["txtId"];

    $insertId = MysqlConnection::insert("tbl_leavehistory", $_POST);

    //header("location:mainpage.php?requestPage=history_apply");
}
}
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function () {
        $("#from").datepicker({dateFormat: 'yy-mm-dd'});
    });
    $(function () {
        $("#to").datepicker({dateFormat: 'yy-mm-dd'});
    });




</script>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-user"></i></span><h5 style="color: green">APPLY LEAVE -(<?php echo $type  ?>)</h5></div>
                <form class="form-horizontal" method="post" action="" name="" id="" novalidate="novalidate">
                    <div class="control-group" style="background-color: white;">
                        <div class="span11" style="clear: both "></div>
                        <div class="span11">
                            <div class="span11"  style="float: left">
                                <label class="control-group "><p style="color: red"><?php echo $error ?></p></label>
                            </div>
                        </div>
                        <div class="span11">
                            <div class="span6"  style="float: left">
                                <label class="control-label ">FROM:</label>
                                <div class="controls">
                                     <div  data-date="12-02-2012" class="input-append date datepicker">
                                    <input type="text" name="fromdate" id="from" autofocus=""  maxlength="10" minlength="1" class="span12"   placeholder="yyyy-mm-dd" required><span class="add-on"><i class="icon-th"></i></span>
                                </div>
                                </div>
                            </div>
                            <div class="span6"  style="float: left">
                                <label class="control-label ">TO:</label>
                                <div class="controls">
                                     <div  data-date="12-02-2012" class="input-append date datepicker">
                                    <input type="text" name="todate" id="to" value="" maxlength="10" minlength="1" class="span12"   placeholder="yyyy-mm-dd" required><span class="add-on"><i class="icon-th"></i></span>
                                </div>
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
                            <div class="span6"  style="float: left">
                                <label class="control-label ">TYPE OF LEAVE:</label>
                                <div class="controls">
                                    <input type="text" name="leave_type" value="<?php echo $type ?>"  class="span12"   >
                                </div>
                            </div>
                        </div>

                        <div class="span11">
                            <div class="span6"  style="float: left">
                                <label class="control-label ">PLACE OF VISIT:</label>
                                <div class="controls">
                                    <input type="text" name="place" value="" maxlength="10" minlength="1" class="span12"   placeholder="" required>
                                </div>
                            </div>
                            <div class="span6"  style="float: left">
                                <label class="control-label ">MOBILE NO:</label>
                                <div class="controls">
                                    <input type="text" name="contact" value="" maxlength="10" minlength="10" class="span12" onKeyPress="return isNumberKey(event)"  placeholder="" required>
                                </div>
                            </div>
                        </div>
                        <div class="span11">
                            <div class="span12"  style="float: left">
                                <label class="control-label ">PURPOSE OF LEAVE:</label>
                                <div class="controls">
                                    <textarea type="text" name="purpose" value="" maxlength="255" minlength="5" class="span12"   placeholder="" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="control-group">
                            <center>
                                <div class="form-actions right">
                                    <a href=""><button type="submit" name="submit" class="btn btn-success" >SUBMIT</button></a>
                                    <button type="reset" class="btn btn-primary">RESET</button>
                                    <a href="mainpage.php?requestPage="><button type="button" class="btn btn-info">VIEW</button></a>
                                    <a href="mainpage.php?requestPage="> <button type="button" class="btn btn-danger">CANCEL</button></a>

                                </div>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>