<?php
$txtId = $_GET["txtId"];
if (isset($_POST["submit"])) {
    unset($_POST["submit"]);
    MysqlConnection::edit("tbl_employee", $_POST, $txtId);
    header("location:index.php?requestPage=view_employee");
}
$employee = MysqlConnection::fetchByPrimary("tbl_employee", $txtId);
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
                                        <input type="text" name="fname" autofocus="" value="<?php echo $employee["fname"] ?>" maxlength="30" class="span12"  required="" placeholder="" />
                                    </div>
                                </div>
                                <div class="span6"  style="float: left">
                                    <label class="control-label ">LAST NAME:</label>
                                    <div class="controls">
                                        <input type="text" name="lname" autofocus="" value="<?php echo $employee["lname"] ?>" maxlength="30" class="span12"  required="" placeholder="" />
                                    </div>
                                </div>
                            </div>

                            <div class="span10">
                                <div class="span6"  style="float: left">
                                    <label class="control-label ">CONTACT NO :</label>
                                    <div class="controls">
                                        <input type="text" name="contact"  value="<?php echo $employee["contact"] ?>" maxlength="10" minlength="10" onKeyPress="return isNumberKey(event)" class="span12"   placeholder="" />
                                    </div>
                                </div>
                                <div class="span6"  style="float: left">
                                    <label class="control-label ">E-MAIL ID:</label>
                                    <div class="controls">
                                        <input type="text" name="email"  value="<?php echo $employee["email"] ?>" maxlength="30" minlength="10" class="span12"   placeholder="" />
                                    </div>
                                </div>
                                <div class="span12">
                                    <div class="span6"  style="float: left">
                                        <label class="control-label ">JOIN DATE :</label>
                                        <div class="controls">
                                            <input type="text" name="join_date" id="join_date"  value="<?php echo $employee["join_date"] ?>" maxlength="20" minlength="8"  class="span12"   placeholder="yyyy-mm-dd" />
                                        </div>
                                    </div>
                                    <div class="span6"  style="float: left">
                                        <label class="control-label ">DESIGNATION :</label>
                                        <div class="controls">
                                            <input type="text" name="designation"  value="<?php echo $employee["designation"] ?>" maxlength="20" minlength="8"  class="span12"   placeholder="" />
                                        </div>
                                    </div>
                                </div>
                                <div class="span12">
                                    <div class="span6"  style="float: left">
                                        <label class="control-label ">PAY SCALE:</label>
                                        <div class="controls">
                                            <input type="text" name="pay_scale"  onKeyPress="return isNumberKey(event)" value="<?php echo $employee["pay_scale"] ?>" maxlength="20" minlength="8"  class="span12"   placeholder="" />
                                        </div>
                                    </div>

                                    <div class="span6"  >
                                        <label class="control-label ">D.O.B:</label>
                                        <div class="controls">
                                            <input type="date" name="dob" id="dob" value="<?php echo $employee["dob"] ?>" maxlength="255" class="span12"  required="" placeholder="yyyy-mm-dd" />
                                        </div>
                                    </div>
                                </div>

                                <div class="span12">
                                    <div class="span6"  >
                                        <label class="control-label ">ADDRESS:</label>
                                        <div class="controls">
                                            <input type="text" name="address" value="<?php echo $employee["address"] ?>" maxlength="255" class="span12"  required="" placeholder="" />
                                        </div>
                                    </div>

                                </div>

                            </div>



                        </div>
                        <div class="control-group">
                            <center>
                                <div class="form-actions right">

                                    <button type="submit" name="submit" class="btn btn-success">SUBMIT</button>
                                    <button type="reset" name="reset" class="btn btn-primary">RESET</button>
                                    <a href="index.php?requestPage=viewleave_leave"><button type="button" class="btn btn-info">VIEW</button></a>
                                    <button type="submit" class="btn btn-danger">CANCEL</button>


                                </div>
                            </center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




