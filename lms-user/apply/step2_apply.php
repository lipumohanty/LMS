<?php
$typesession = $_SESSION["typesession"];

$nextId= $_GET["nextId"];
if (isset($_POST["submit"])) {
  
    unset($_POST["submit"]);
     $_POST["empId"] = $_SESSION["email"]["txtId"];
    //$_POST["leaveId"] = date("y-m-d");
    $_POST["txtId"]=$nextId;
    MysqlConnection::edit("tbl_leavehistory", $_POST,$nextId);
    
  header("location:mainpage.php?requestPage=step3_apply&nextId=$nextId");
}
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
   
    $(function () {
        $("#date").datepicker({dateFormat: 'yy-mm-dd'});
    });
   
</script>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-user"></i></span><h5 style="color: green">STEP 2</h5></div>
                <form class="form-horizontal" method="post" action="" name="" id="" novalidate="novalidate">
                    <div class="control-group" style="background-color: white;">
                        <div class="span11" style="clear: both "></div>
                       
                        <div class="span11">
                            <div class="span11"  style="float: left">
                                <label class="control-group ">DO YOU WANT TO USE ANY RESTRICTED LEAVE:</label>
                                <div class="controls">
                                    <select class="span8" id="" name="restricted_leave">
                                        <option value="">Select</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="span11">
                            <div class="span8"  style="float: left">
                                <label class="control-label ">DATE:</label>
                                <div class="controls">
                                     <div  data-date="12-02-2012" class="input-append date datepicker">
                                    <input type="text" name="date" id="date" value="" maxlength="10" minlength="1" class="span12"   placeholder="yyyy-mm-dd" required><span class="add-on"><i class="icon-th"></i></span>
                                </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="control-group">
                            <center>
                                <div class="form-actions right">
                                   <input type="submit" name="submit" class="btn btn-success" value="NEXT" >
                                   <a href="mainpage.php?requestPage=leave_apply&type=<?php echo $typesession?>"><button type="button" class="btn btn-primary">BACK</button></a>
                                </div>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>