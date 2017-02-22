<?php
$typesession = $_SESSION["typesession"];
$nextId= $_GET["nextId"];
if (isset($_POST["submit"])) {
   
    unset($_POST["submit"]);
    $_POST["empId"] = $_SESSION["email"]["txtId"];
    
    $_POST["txtId"]=$nextId;
     MysqlConnection::edit("tbl_leavehistory", $_POST,$nextId);
     header("location:mainpage.php?requestPage=step4_apply&nextId=$nextId");
}
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-user"></i></span><h5 style="color: green">STEP 3</h5></div>
                <form class="form-horizontal" method="post" action="" name="" id="" novalidate="novalidate">
                    <div class="control-group" style="background-color: white;">
                        <div class="span11" style="clear: both "></div>
                       
                        <div class="span11">
                            <div class="span11"  style="float: left">
                                <label class="control-group ">WHETHER THERE IS ANY PROPOSAL TO AVAIL LTC DURING THE PERIOD OF LEAVE:</label>
                                <div class="controls">
                                    <select class="span8" id="" name="avail_ltc">
                                        <option value="">Select</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="span11">
                            <div class="span8"  style="float: left">
                                <label class="control-label ">MENTION DETAILS:</label>
                                <div class="controls">
                                    <textarea type="text" name="ltc_details" value="" maxlength="100" minlength="2" class="span12"   placeholder="" required></textarea>
                                </div>
                            </div>
                        </div>
                       
                        <div class="control-group">
                            <center>
                                <div class="form-actions right">
                                     <input type="submit" name="submit" class="btn btn-success" value="NEXT" >
                                      <a href="mainpage.php?requestPage=step2_apply&nextId=<?php echo$nextId ?>"><button type="button" class="btn btn-primary">BACK</button></a>
                                     
                                </div>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>