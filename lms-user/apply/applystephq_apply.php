<?php
$typesession = $_SESSION["typesession"];
$nextId = $_GET["nextId"];
if (isset($_POST["submit"])) {
    unset($_POST["submit"]);
    $_POST["empId"] = $_SESSION["email"]["txtId"];
    $_POST["txtId"] = $nextId;
    MysqlConnection::edit("tbl_leavehistorynew", $_POST, $nextId);
    header("location:mainpage.php?requestPage=applystep3_apply&nextId=$nextId");
}
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>

    $(function () {
        $("#hqfromdate").datepicker({dateFormat: 'yy-mm-dd'});
    });
    $(function () {
        $("#hqtodate").datepicker({dateFormat: 'yy-mm-dd'});
    });

</script>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-user"></i></span><h5 style="color: green">APPLY STEP 2.1</h5></div>
                <form class="form-horizontal" method="post" action="" name="" id="" novalidate="novalidate">
                    <div class="control-group" style="background-color: white;">
                        <br/>
                        <div >
                            <div class="controls span11" >
                                WHETHER PERMISSION IS REQUIRED FOR LEAVING THE HEADQUARTER DURING THE PERIOD OF LEAVE&nbsp;&nbsp;:&nbsp;
                                <select >
                                    <option value="">Select</option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div class="controls">
                                <label class="control-label span5">FROM:</label>
                                <div  data-date="12-02-2012" class="input-append date datepicker">
                                    <input type="text" name="hqfromdate" id="hqfromdate" value="" maxlength="10" minlength="1" class="span12"   placeholder="yyyy-mm-dd" required><span class="add-on"><i class="icon-th"></i></span>
                                </div>
                            </div>
                            <div class="controls">
                                <label class="control-label span5">TO:</label>
                                <div  data-date="12-02-2012" class="input-append date datepicker">
                                    <input type="text" name="hqtodate" id="hqtodate" value="" maxlength="10" minlength="1" class="span12"   placeholder="yyyy-mm-dd" required><span class="add-on"><i class="icon-th"></i></span>
                                </div>
                            </div>

                            <div class="control-group">
                                <center>
                                    <div class="form-actions right">
                                        <input type="submit" name="submit" class="btn btn-success" value="NEXT" >
                                        <button type="reset" class="btn btn-primary">RESET</button>
                                        <a href="mainpage.php?requestPage=view_apply"><button type="button" class="btn btn-info">VIEW</button></a>
                                        <a href="mainpage.php?requestPage=view_apply"> <button type="button" class="btn btn-danger">CANCEL</button></a>
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
