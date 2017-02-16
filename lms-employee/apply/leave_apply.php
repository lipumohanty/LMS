<?php
$type = $_GET["type"];
if (isset($_POST["submit"])) {
    
    unset($_POST["submit"]);
    $_POST["empId"] = $_SESSION["email"]["txtId"];
    if($type == "casual_leave" || $type=="earned_leave"){
        $_POST["leave_type"] = $type;
    }else{
        $_POST["leave_type"] = $type;
    }
  $nextId= MysqlConnection::insert("tbl_leavehistory", $_POST);
 
 
  header("location:mainpage.php?requestPage=step2_apply&nextId=$nextId");
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
                            <div class="span6"  style="float: left">
                                <label class="control-label ">PURPOSE OF LEAVE:</label>
                                <div class="controls">
                                    <textarea type="text" name="purpose" value="" maxlength="10" minlength="1" class="span12"   placeholder="" required></textarea>
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
                </form>
            </div>
        </div>
    </div>
</div>