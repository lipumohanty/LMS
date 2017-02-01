<?php
if (isset($_POST["submit"])) {
    
    if (!$_POST['fname'] | !$_POST['lname'] | !$_POST['contact'] | !$_POST['email']| !$_POST['join_date']| !$_POST['designation']  ) {

 		die('You did not complete all of the required fields') ;

 	}
    unset($_POST["submit"]);

    MysqlConnection::insert("tbl_employee", $_POST);
    header("location:index.php?requestPage=view_employee");
}

$array_designation = array();
$array_designation[0] = "Chief General Manager(Technical)";
$array_designation[1] = "Dy.General Manager(Technical)";
$array_designation[2] = "Manager(Technical)";
$array_designation[3] = "Dy.Manager(Technical)";
$array_designation[4] = "Dy.General Manager(Finance & Accounts)";
$array_designation[5] = "Manager(Finance)";
$array_designation[6] = "Jr. Accounts Officer";
$array_designation[7] = "Accountant";
$array_designation[8] = "Personal Assistant";
$array_designation[9] = "Stenographer";
$array_designation[10] = "Sr.Accounts officer";
$array_designation[11] = "Accounts Officer";
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function () {
        $("#dob").datepicker({dateFormat: 'yy-mm-dd'});
    });
    $(function () {
        $("#join_date").datepicker({dateFormat: 'yy-mm-dd'});
    });

</script>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-user"></i></span><h5 style="color: green">EMPLOYEE REGISTRATION</h5></div>
                <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post" action="" name="" id="" novalidate="novalidate">
                        <div class="control-group" style="background-color: white;">
                            <div class="span11" style="clear: both "></div>
                            <div class="span10">
                                <div class="span6"  style="float: left">
                                    <label class="control-label ">FIRST NAME:</label>
                                    <div class="controls">
                                        <input type="text" name="fname"  autofocus="" value="" maxlength="30" minlength="1" class="span12"  required="true" placeholder="" />
                                    </div>
                                </div>
                                <div class="span6"  style="float: left">
                                    <label class="control-label ">LAST NAME:</label>
                                    <div class="controls">
                                        <input type="text" name="lname" autofocus="" value="" maxlength="30" minlength="1" class="span12"  required="true" placeholder="" />
                                    </div>
                                </div>
                            </div>
                            <div class="span10">
                                <div class="span6"  style="float: left">
                                    <label class="control-label ">CONTACT NO :</label>
                                    <div class="controls">
                                        <input type="text" name="contact"  value="" maxlength="10" minlength="10" required="true" onKeyPress="return isNumberKey(event)" class="span12"   placeholder="" />
                                    </div>
                                </div>
                                <div class="span6"  style="float: left">
                                    <label class="control-label ">E-MAIL ID:</label>
                                    <div class="controls">
                                        <input type="email" name="email"  value="" maxlength="30" minlength="5" class="span12" required="true"   placeholder="" />
                                    </div>
                                </div>
                            </div>  
                            <div class="span10">
                                <div class="span6"  style="float: left">
                                    <label class="control-label ">JOIN DATE :</label>
                                    <div class="controls">
                                        <input type="text" name="join_date" id="join_date"  value="" maxlength="20" minlength="8"  class="span12"  placeholder="yyyy-mm-dd" required>
                                    </div>
                                </div>
                                <div class="span6"  style="float: left">
                                    <label class="control-label ">DESIGNATION :</label>
                                    <div class="controls">
                                        <select class="span12" id="designation" name="designation" required="true">
                                            <option value="">Select</option>
                                            
                                            <?php
                                                foreach($array_designation as $designation){
                                            ?>
                                            <option value="<?php echo $designation?>"><?php echo $designation?></option>
                                            <?php
                                                    
                                                }
                                            ?>
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="span10">
                                <div class="span6"  style="float: left">
                                    <label class="control-label ">PAY SCALE:</label>
                                    <div class="controls">
                                        <input type="text" name="pay_scale"  onKeyPress="return isNumberKey(event)" value="" maxlength="30" minlength="4"  class="span12" required="true"  placeholder="" />
                                    </div>
                                </div>

                                <div class="span6" style="float: left" >
                                    <label class="control-label ">D.O.B:</label>
                                    <div class="controls">
                                        <input type="date" name="dob" id="dob" value="" maxlength="" class="span12"  required="true" placeholder="yyyy-mm-dd" />
                                    </div>
                                </div>
                            </div>
                            <div class="span10">
                                <div class="span6" style="float: left" >
                                    <label class="control-label ">ADDRESS:</label>
                                    <div class="controls">
                                        <input type="text" name="address" value="" maxlength="255" minlength="10" class="span12"  required="true" placeholder="" />
                                    </div>
                                </div>
                                <div class="span6"  style="float: left">
                                    <label class="control-label ">PASSWORD:</label>
                                    <div class="controls">
                                        <input type="password" name="password"   value="" maxlength="30" minlength="7" class="span12" required="true"   placeholder="" />
                                    </div>
                                </div>
                            </div>
                            <div class="span10">
                                <div class="span6"  style="float: left">
                                    <label class="control-label ">RE-TYPE PASSWORD:</label>
                                    <div class="controls">
                                        <input type="password" name=""   value="" maxlength="30" minlength="7"  class="span12" required="true"  placeholder="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                         
                        <div class="control-group">
                            <center>
                                <div class="span12 form-actions right">

                                    <button type="submit" name="submit" class="btn btn-success">SUBMIT</button>
                                    <button type="reset" name="reset" class="btn btn-primary">RESET</button>
                                    <a href="index.php?requestPage=view_employee"><button type="button" class="btn btn-info">VIEW</button></a>
                                    <a href="index.php?requestPage=view_employee">  <button type="button" class="btn btn-danger">CANCEL</button></a>
                                </div>
                            </center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




