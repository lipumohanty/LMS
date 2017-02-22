<?php
$txtId = $_GET["txtId"];
$empId = $_GET["empId"];

$employee = MysqlConnection::fetchByPrimary("tbl_leavehistory", $txtId);
if (isset($_POST["submit"])) {
    unset($_POST["submit"]);
    // $_add["leave_type"] = $_POST["leave_type"];
     $type = $_POST["leave_type"];
//    MysqlConnection::insert("tbl_leavehistory", $_POST, $txtId);
    
    /// if available emp rthen update epse 
    
    $sqlheck = "SELECT * FROM `tbl_applyleave` WHERE  empId = $empId AND leave_type =  '$type' ";
    $customsearch = MysqlConnection::fetchCustom($sqlheck);

    if(count($customsearch)!=0){
        $total = $customsearch[0]["availableLeave"]; ///15
        $oldBal = $customsearch[0]["balanceLeave"];  /// 13
        $oldTaken = $customsearch[0]["leaveTaken"];  /// 2
        
        $takenNew = $_POST["no_days"]; /// 3
        
        $newTaken = $oldTaken +   $takenNew; /// 2 + 3 
        $newBalance = $oldBal - $takenNew; /// 13 - 3 
                
        
        
        $_EDIT_ARR["empId"] = $empId;
        $_EDIT_ARR["leave_type"] = $type;
        $_EDIT_ARR["availableLeave"] = $total;
        $_EDIT_ARR["leaveTaken"] = $newTaken;
        $_EDIT_ARR["balanceLeave"] = $newBalance;
        
//        tbl = "", $data = array(), $pkcolumn, $pkvalue, $condition
         MysqlConnection::editByParam("tbl_applyleave", $_EDIT_ARR, "empId",$empId," AND leave_type = '$type' " );
         
    }
    else {
        $_EDIT_ARR["empId"] = $empId;
        $_EDIT_ARR["leave_type"] = $type;
        $_EDIT_ARR["availableLeave"] =getAvailableLeave($employee["leave_type"], "");
        $_EDIT_ARR["leaveTaken"] = $_POST["no_days"];
        $_EDIT_ARR["balanceLeave"] = getAvailableLeave($employee["leave_type"], "") - $_POST["no_days"];
         MysqlConnection::insert("tbl_applyleave", $_EDIT_ARR);
    }
    
    
    header("location:mainpage.php?requestPage=status_leaveapproval");
}

?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
   

</script>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-remove-sign"></i></span><h5 style="color: green">REJECT</h5></div>
                <form class="form-horizontal" method="post" action="" name="" id="" novalidate="novalidate">
                    <div class="control-group" style="background-color: white;">
                        <div class="span11" style="clear: both "></div>
                        
                        <div class="span11">
                            <div class="span6"  style="float: left">
                                <label class="control-label ">FROM:</label>
                                <div class="controls">
                                    <input type="text" name="fromdate" value="<?php echo $employee["fromdate"] ?>" id="from" autofocus=""  maxlength="10" minlength="1" class="span12"   placeholder="yyyy-mm-dd" readonly="true">
                                </div>
                            </div>
                            <div class="span6"  style="float: left">
                                <label class="control-label ">TO:</label>
                                <div class="controls">
                                    <input type="text" name="todate" value="<?php echo $employee["todate"] ?>" id="to"  maxlength="10" minlength="1" class="span12"   placeholder="yyyy-mm-dd" readonly="true">
                                </div>
                            </div> 
                        </div>
                        <div class="span11">
                            <div class="span6"  style="float: left">
                                <label class="control-label ">NO OF DAYS:</label>
                                <div class="controls">
                                    <input type="text" name="no_days" value="<?php echo $employee["no_days"] ?>" maxlength="10" minlength="1" class="span12" onKeyPress="return isNumberKey(event)"  placeholder="" readonly="true">
                                </div>
                            </div>
                            <div class="span6"  style="float: left">
                                <label class="control-label ">TYPE OF LEAVE:</label>
                                <div class="controls">
                                    <input type="text" name="leave_type" value="<?php echo $employee["leave_type"] ?>"  class="span12"  readonly="true"  >
                                </div>
                            </div>
                        </div>
                        
                         <div class="span11">
                            <div class="span6"  style="float: left">
                                <label class="control-label ">PLACE OF VISIT:</label>
                                <div class="controls">
                                    <input type="text" name="place" value="<?php echo $employee["place"] ?>" maxlength="10" minlength="1" class="span12"   placeholder="" readonly="true">
                                </div>
                            </div>
                            <div class="span6"  style="float: left">
                                <label class="control-label ">MOBILE NO:</label>
                                <div class="controls">
                                    <input type="text" name="contact" value="<?php echo $employee["contact"] ?>" maxlength="10" minlength="10" class="span12" onKeyPress="return isNumberKey(event)"  placeholder="" readonly="true">
                                </div>
                            </div>
                        </div>
                        <div class="span11">
                        <div class="span12"  style="float: left">
                                <label class="control-label ">PURPOSE OF LEAVE:</label>
                                <div class="controls">
                                    <input type="text" name="purpose" value="<?php echo $employee["purpose"] ?>"  class="span12"  readonly="true">
                                </div>
                            </div>
                        </div>
                        
                        <div class="span11">
                            <div class="span11"  style="float: left">
                                <label class="control-group ">DO YOU WANT TO USE ANY RESTRICTED LEAVE:</label>
                                <div class="controls">
                                    <input type="text" name="restricted_leave" id="todate" value=" <?php
                                            if ($employee["restricted_leave"] == "" ) {
                                                echo "NA"; 
                                            }  else{
                                                 echo $employee["restricted_leave"];
                                            }
                                            ?>"  class="span12" readonly="true" >
                                </div>
                            </div>
                        </div>
                        <div class="span11">
                            <div class="span8"  style="float: left">
                                <label class="control-label ">DATE:</label>
                                <div class="controls">
                                    <input type="text" name="date" id="date" value=" <?php
                                            if ($employee["date"] == "0000-00-00" ) {
                                                echo "NA"; 
                                            }  else{
                                                 echo $employee["date"];
                                            }
                                            ?>"  class="span12" readonly="true">
                                </div>
                            </div>
                        </div>
                        
                        <div class="span11">
                            <div class="span11"  style="float: left">
                                <label class="control-group ">WHETHER THERE IS ANY PROPOSAL TO AVAIL LTC DURING THE PERIOD OF LEAVE:</label>
                                <div class="controls">
                                    <input type="text" name="avail_ltc" value=" <?php
                                            if ($employee["avail_ltc"] == "" ) {
                                                echo "NA"; 
                                            }  else{
                                                 echo $employee["avail_ltc"];
                                            }
                                            ?>"  class="span12" readonly="true" >
                                </div>
                            </div>
                        </div>
                        <div class="span11">
                            <div class="span8"  style="float: left">
                                <label class="control-label ">MENTION THE DETAILS:</label>
                                <div class="controls">
                                    <input type="text" name="ltc_details" value=" <?php
                                            if ($employee["ltc_details"] == "" ) {
                                                echo "NA"; 
                                            }  else{
                                                 echo $employee["ltc_details"];
                                            }
                                            ?>"  class="span12" readonly="true" >
                                </div>
                            </div>
                        </div>
                        <div class="span11">
                            <div class="span11"  style="float: left">
                                <label class="control-group ">LEAVE ENCASHMENT:</label>
                                <div class="controls">
                                    <input type="text" name="leave_encashment" value=" <?php
                                            if ($employee["leave_encashment"] == "" ) {
                                                echo "NA"; 
                                            }  else{
                                                 echo $employee["leave_encashment"];
                                            }
                                            ?>" class="span12" readonly="true"  >
                                </div>
                            </div>
                        </div>
                        <div class="span11">
                            <div class="span8"  style="float: left">
                                <label class="control-label ">NO OF DAYS LEAVE ENCASHMENT TAKEN TILL DATE:</label>
                                <div class="controls">
                                    <input type="text" name="days" value=" <?php
                                            if ($employee["days"] == "" ) {
                                                echo "NA"; 
                                            }  else{
                                                 echo $employee["days"];
                                            }
                                            ?>"  class="span12" readonly="true">
                                </div>
                            </div>
                        </div>
                        <div class="span11">
                            <div class="span11"  style="float: left">
                                <label class="control-group ">WHETHER PERMISSION IS REQUIRED FOR LEAVING THE HEADQUARTER DURING THE PERIOD OF LEAVE:</label>
                                <div class="controls">
                                    <input type="text" name="permission_hq" value=" <?php
                                            if ($employee["permission_hq"] == "" ) {
                                                echo "NA"; 
                                            }  else{
                                                 echo $employee["permission_hq"];
                                            }
                                            ?>"  class="span12" readonly="true">
                                </div>
                            </div>
                        </div>
                        <div class="span11">
                            <div class="span6"  style="float: left">
                                <label class="control-label ">FROM:</label>
                                <div class="controls">
                                    <input type="text" name="datefrom" id="datefrom" value=" <?php
                                            if ($employee["datefrom"] == "0000-00-00" ) {
                                                echo "NA"; 
                                            }  else{
                                                 echo $employee["datefrom"];
                                            }
                                            ?>"  class="span12" readonly="true" >
                                </div>
                            </div>
                            <div class="span6"  style="float: left">
                                <label class="control-label ">TO:</label>
                                <div class="controls">
                                    <input type="text" name="dateto" id="dateto" value=" <?php
                                            if ($employee["dateto"] == "0000-00-00" ) {
                                                echo "NA"; 
                                            }  else{
                                                 echo $employee["dateto"];
                                            }
                                            ?>"  class="span12" readonly="true"  >
                                </div>
                            </div> 
                        </div>
                        <div class="span11">
                        <div class="span12"  style="float: left">
                                <label class="control-label ">AVAILABLE LEAVE:</label>
                                <div class="controls">
                                    <input type="text" name="approved_leave" value="<?php 
                                    if ($employee["leave_type"] == "" ){
                                         echo getAvailableLeave( $employee["no_days"]);
                                    }else{
                                    
                                    echo getAvailableLeave($employee["leave_type"], "") -  $employee["no_days"] ;
                                    }
                                            ?>"  class="span12"   placeholder="" readonly="true">
                                </div>
                            </div>
                        </div>
                       
                       
                         <div class="span11">
                        <div class="span12"  style="float: left">
                                <label class="control-label ">STATUS:</label>
                                <div class="controls">
                                    <input type="text" name="status" value="REJECTED" maxlength="255" minlength="5" class="span12"   placeholder="" readonly="true">
                                </div>
                            </div>
                        </div>
                         <div class="span11">
                        <div class="span12"  style="float: left">
                                <label class="control-label ">REMARK:</label>
                                <div class="controls">
                                    <textarea type="text" name="reason" value="" maxlength="255" minlength="5" class="span12"   placeholder="" required></textarea>
                                </div>
                            </div>
                        </div>
                       
                        <div class="control-group">
                            <center>
                                <div class="form-actions right">
                                    <a href=""><button type="submit" name="submit" class="btn btn-danger" >REJECT</button></a>
                                   
                                     
                                </div>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
function getAvailableLeave($type, $empId) {
    if ($type == "casual leave") {
        $result = MysqlConnection::fetchCustom("SELECT no_count FROM `tbl_addleave`");
        return $result[0]["no_count"];
    } else if ($type == "earned leave") {
        $result = MysqlConnection::fetchCustom("SELECT earned_leave FROM `tbl_leavesetting`");
        return $result[0]["earned_leave"];
    } else {
        return "NA";
    }
}

?>