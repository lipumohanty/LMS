<?php
if (isset($_POST["submit"])) {
    unset($_POST["submit"]);
   echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    MysqlConnection::insert("tbl_applyleave", $_POST);
}
?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-user"></i></span><h5 style="color: green">APPLY FOR LEAVE</h5></div>
                <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post" action="" name="" id="" novalidate="novalidate">
                        <div class="control-group" style="background-color: white;">
                            <div class="span11" style="clear: both "></div>
                           
                            <div class="span11">
                               
                                <div class="span6"  style="float: left">
                                    <label class="control-label ">TYPE&nbspOF&nbsp;LEAVE:&nbsp;</label>
                                    <div class="controls">
                                        <select class="span12" id="city" name="leave_type">
                                                <option value="">Select option</option>
                                                <option value="Casual Leave">Casual Leave</option>
                                                <option value="Restricted Leave">Restricted Leave</option>
                                                <option value="Earned Leave">Earned Leave</option>
                                                <option value="Commuted Leave">Commuted Leave</option>
                                                <option value="Half Pay Leave">Half Pay Leave</option>
                                                <option value="Special Leave">Special Leave</option>
                                                <option value="Leaving of Headquater">Leaving of Headquater</option>
                                           
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="span11">
                                <div class="span6"  style="float: left">
                                    <label class="control-label ">NO.&nbspOF&nbspDays&nbsp;LEAVE &nbsp;PERIOD:&nbsp;</label>
                                    <div class="controls">
                                        <input type="text" name="no_days_lp"  onKeyPress="return isNumberKey(event)" value="" maxlength="20" minlength="8"  class="span12"   placeholder="ENTER NO. OF DAYS" />
                                    </div>
                                </div>
                            </div>
                            <div class="span11">
                                <div class="span6"  style="float: left">
                                    <label class="control-label ">&nbsp;DURATION OF&nbsp;LEAVE&nbsp;& DATE:&nbsp;</label>
                                    <div class="controls">
                                        <input type="text" name="leave_duration"  onKeyPress="return isNumberKey(event)" value="" maxlength="20" minlength="8"  class="span12"   placeholder="ENTER DURATION OF LEAVE" />
                                    </div>
                                </div>
                            </div>
                            <div class="span11">
                               <div class="span6"  style="float: left">
                                    <label class="control-label ">&nbsp;PURPOSE OF&nbsp;LEAVE&nbsp;:&nbsp;</label>
                                    <div class="controls">
                                        <input type="text" name="leave_purpose"  value="" maxlength="20" minlength="8"  class="span12"   placeholder="PURPOSE OF LEAVE" />
                                    </div>
                                </div>
                            </div>
                            <div class="span11">
                                <div class="span6"  style="float: left">
                                    <label class="control-label ">WHETHER THERE IS ANY PROPOSAL TO AVAIL LTC&nbspDURING THE PERIOD OF LEAVE?&nbsp;:&nbsp;</label>
                                    <div class="controls">
                                        <select class="span12" id="avail_ltc" name="avail_ltc">
                                                 <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                           
                                        </select>
                                    </div>
                                </div>
                            </div>
                             <div class="span11">
                               <div class="span6"  style="float: left">
                                    <label class="control-label ">&nbsp;IF YES,&nbsp;GIVE THE DETAILS&nbsp;:&nbsp;</label>
                                    <div class="controls">
                                        <input type="text" name="ltc_details"  value="" maxlength="20" minlength="8"  class="span12"   placeholder="ENTER YOUR DETAILS" />
                                    </div>
                                </div>
                             </div>
                            <div class="span11">
                                <div class="span6"  style="float: left">
                                    <label class="control-label ">LEAVE ENCASHMENT&nbspREQUIRED&nbsp;:&nbsp;</label>
                                    <div class="controls">
                                        <select class="span12" id="leave_encashment" name="leave_encashment">
                                                 <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                           
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="span11">
                                <div class="span12"  >
                                    <label class="control-label ">IF YES, NO. OF DAYS LEAVE ENCASHMENT&nbsp TAKEN TILL DATE&nbsp;:&nbsp;</label>
                                    <div class="controls">
                                        <input type="text" name="no_leaveencash" value="" maxlength="21845" class="span12"  required="" placeholder="ENTER NO. OF DAYS" />
                                    </div>
                                </div>
                            </div>
                            <div class="span11">
                                 <div class="span6"  style="float: left">
                                    <label class="control-label ">WHETHER PERMISSION IS REQUIRED FOR LEAVING THE HEADQUATER&nbspDURING THE PERIOD OF LEAVE&nbsp;:&nbsp;</label>
                                    <div class="controls">
                                        <select class="span12" id="permission_hq" name="permission_hq">
                                                 <option value="">Select</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                           
                                        </select>
                                    </div>
                                </div>
                            </div>
                             <div class="span11">
                                <div class="span12"  >
                                    <label class="control-label ">IF YES,MENTION THE PERIOD&nbspWITH DATE&nbsp;:&nbsp;</label>
                                    <div class="controls">
                                        <input type="text" name="period_hq" value="" maxlength="255" class="span12"  required="" placeholder="ENTER YOUR DURATION" />
                                    </div>
                                </div>
                            </div>
                             <div class="span11">
                                <div class="span12"  >
                                    <label class="control-label ">PLACE OF &nbspVISIT&nbsp;:&nbsp;</label>
                                    <div class="controls">
                                        <input type="text" name="visit_place" value="" maxlength="20" class="span12"  required="" placeholder="ENTER NAME OF PLACE" />
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="control-group">
                            <center>
                                <div class="form-actions right">
                                   
                                    <button type="submit" name="submit" class="btn btn-success" >APPLY</button>
                                    <button type="reset" class="btn btn-primary">RESET</button>
                                    <a href="view_user.php"><button type="button" class="btn btn-info">VIEW</button></a>
                                </div>
                            </center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>