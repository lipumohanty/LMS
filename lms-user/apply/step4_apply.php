<?php
$typesession = $_SESSION["typesession"];
$nextId= $_GET["nextId"];
if (isset($_POST["submit"])) {
   
    unset($_POST["submit"]);
    $_POST["empId"] = $_SESSION["email"]["txtId"];
    
    $_POST["txtId"]=$nextId;
     MysqlConnection::edit("tbl_leavehistory", $_POST,$nextId);
    
     header("location:mainpage.php?requestPage=step5_apply&nextId=$nextId");
}
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-user"></i></span><h5 style="color: green">STEP 4</h5></div>
                <form class="form-horizontal" method="post" action="" name="" id="" novalidate="novalidate">
                    <div class="control-group" style="background-color: white;">
                        <div class="span11" style="clear: both "></div>
                       
                     
                        <div class="span11">
                            <div class="span11"  style="float: left">
                                <label class="control-group ">LEAVE ENCASHMENT:</label>
                                <div class="controls">
                                    <select class="span8" id="" name="leave_encashment">
                                        <option value="">Select</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="span11">
                            <div class="span8"  style="float: left">
                                <label class="control-label ">NO OF DAYS LE TAKEN TILL DATE:</label>
                                <div class="controls">
                                    <input type="text" name="days" value="" maxlength="10" minlength="1" class="span12" onKeyPress="return isNumberKey(event)"  placeholder="" required>
                                </div>
                            </div>
                        </div>
                       
                        <div class="control-group">
                            <center>
                                <div class="form-actions right">
                                     <input type="submit" name="submit" class="btn btn-success" value="NEXT" >
                                      <a href="mainpage.php?requestPage=step3_apply&nextId=<?php echo$nextId ?>"><button type="button" class="btn btn-primary">BACK</button></a>
                                </div>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>