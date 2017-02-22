<?php
$txtId = $_GET["txtId"];
if (isset($_POST["submit"])) {
    unset($_POST["submit"]);
    MysqlConnection::edit("tbl_employeenew", $_POST, $txtId);
    header("location:mainpage.php?requestPage=view_employee");
}
$employee = MysqlConnection::fetchByPrimary("tbl_employeenew", $txtId);
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
                                    <label class="control-label ">NAME:</label>
                                    <div class="controls">
                                        <input type="text" name="name" autofocus="" value="<?php echo $employee["name"] ?>" maxlength="30" minlength="2" class="span12"  required="true" placeholder="" />
                                    </div>
                                </div>
                                     <div class="span6"  style="float: left">
                                    <label class="control-label ">E-MAIL ID:</label>
                                    <div class="controls">
                                        <input type="text" name="email"  value="<?php echo $employee["email"] ?>" maxlength="30" minlength="10" class="span12" required="true"  placeholder="" />
                                    </div>
                                </div>
                            </div>
                        
                            <div class="span10">
                                
                                <div class="span6"  style="float: left">
                                    <label class="control-label ">DESIGNATION :</label>
                                    <div class="controls">
                                        <input type="text" name="designation"  value="<?php echo $employee["designation"] ?>" maxlength="20" minlength="8"  class="span12" required="true"  placeholder="" />
                                        
                                    </div>
                                </div>
                                 <div class="span6"  style="float: left">
                                    <label class="control-label ">PAY SCALE:</label>
                                    <div class="controls">
                                        <input type="text" name="pay_scale"  onKeyPress="return isNumberKey(event)" value="<?php echo $employee["pay_scale"] ?>" maxlength="20" minlength="8"  class="span12" required="true"  placeholder="" />
                                    </div>
                                </div>
                            </div>
                            
                           
                        </div>
                </div>
                <div class="control-group">
                    <center>
                        <div class="form-actions right">
                            <button type="submit" name="submit" class="btn btn-success">SUBMIT</button>
                            <button type="submit" class="btn btn-danger">CANCEL</button>
                        </div>
                    </center>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>


