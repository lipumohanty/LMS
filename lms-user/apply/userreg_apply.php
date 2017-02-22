<?php
$txtId = $_GET["txtId"];

if (isset($_POST["submit"])) {
    unset($_POST["submit"]);
    MysqlConnection::edit("tbl_employeenew", $_POST, $txtId);
    header("location:mainpage.php?requestPage=dashboard");
}
$employee = MysqlConnection::fetchByPrimary("tbl_employeenew", $txtId);



$array_designation = array();
$array_designation[0] = "Chief General Manager(Technical)";
$array_designation[1] = "Dy.General Manager(Technical)";
$array_designation[2] = "General Manager(Technical)";
$array_designation[3] = "Manager(Technical)";
$array_designation[4] = "Dy.Manager(Technical)";
$array_designation[5] = "Dy.General Manager(Finance & Accounts)";
$array_designation[6] = "Manager(Finance)";
$array_designation[7] = "Jr. Accounts Officer";
$array_designation[8] = "Accountant";
$array_designation[9] = "Personal Assistant";
$array_designation[10] = "Stenographer";
$array_designation[11] = "Sr.Accounts officer";
$array_designation[12] = "Accounts Officer";
?>




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
                                    <label class="control-label ">NAME:</label>
                                    <div class="controls">
                                        <input type="text" name="name"  autofocus="" value="<?php echo $employee["name"] ?>" maxlength="30" minlength="1" class="span12"  required="true" placeholder="" />
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
                            
                            
                            <div class="span11">
                                <div class="span11"  style="float: left">
                                    <label class="control-label ">PAYSCALE/GRADEPAY:</label>
                                    <div class="controls">
                                        <input type="text" name="pay_scale"  onKeyPress="return isNumberKey(event)" value="" maxlength="30" minlength="4"  class="span12" required="true"  placeholder="" />
                                    </div>
                                </div>

                            </div>
                          
                        </div>
                         
                        <div class="control-group">
                            <center>
                                <div class="span12 form-actions right">

                                    <button type="submit" name="submit" class="btn btn-success">SUBMIT</button>
                                    <button type="reset" name="reset" class="btn btn-primary">RESET</button>
                                    
                                    <a href="mainpage.php?requestPage=dashboard">  <button type="button" class="btn btn-danger">CANCEL</button></a>
                                </div>
                            </center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




