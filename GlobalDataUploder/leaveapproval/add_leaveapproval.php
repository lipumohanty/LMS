


<?php
if (isset($_POST["submit"])) {
    unset($_POST["submit"]);

    MysqlConnection::insert("tbl_employee", $_POST);
    header("location:index.php?requestPage=view_employee");
}
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
                <div class="widget-title"> <span class="icon"> <i class="icon-user"></i></span><h5 style="color: green">LEAVE REQUEST MANAGER</h5></div>
                <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post" action="" name="" id="" novalidate="novalidate">
                        <div class="control-group" style="background-color: white;">
                            <div class="span11" style="clear: both "></div>
                            <div class="span10">
                                <div class="span12"  style="float: left">
                                    <label class="control-label ">EMPLOYEE ID:</label>
                                    <div class="controls">
                                        <input type="text" name="txtId" autofocus="" value="" maxlength="30" class="span12"  required="" placeholder="" />
                                    </div>
                                </div>
                                <div class="span12"  style="float: left">
                                    <label class="control-label ">LEAVE ID:</label>
                                    <div class="controls">
                                        <input type="text" name="lname" autofocus="" value="" maxlength="30" class="span12"  required="" placeholder="" />
                                    </div>
                                </div>
                            </div>

                            <div class="span10">
                                <div class="span12"  style="float: left">
                                    <label class="control-label ">EMPLOYEE NAME :</label>
                                    <div class="controls">
                                        <input type="text" name="employee_name"  value="employee_name" maxlength="30" minlength="5" onKeyPress="return isNumberKey(event)" class="span12"   placeholder="EMPLOYEE NAME" />
                                    </div>
                                </div>
                                <div class="span12"  style="float: left">
                                    <label class="control-label ">DESIGNATION:</label>
                                    <div class="controls">
                                        <input type="text" name="designation"  value="designation" maxlength="30" minlength="10" class="span12"   placeholder="DESIGNATION" />
                                    </div>
                                </div>
                                <div class="span12">
                                    <div class="span12"  style="float: left">
                                        <label class="control-label ">TYPE OF LEAVE :</label>
                                        <div class="controls">
                                            <input type="text" name="leave_type" id="leave_type"  value="leave_type" maxlength="20" minlength="8"  class="span12"   placeholder="LEAVE-TYE" />
                                        </div>
                                    </div>
                                    <div class="span12"  style="float: left">
                                        <label class="control-label ">FROM:</label>
                                        <div class="controls">
                                            <input type="date" name="from"  value="from" maxlength="20" minlength="8"  class="span12"   placeholder="yyyy-mm-dd" />
                                        </div>
                                    </div>
                                </div>
                                <div class="span12">
                                    <div class="span12"  style="float: left">
                                        <label class="control-label ">TO:</label>
                                        <div class="controls">
                                            <input type="date" name="to"  onKeyPress="return isNumberKey(event)" value="" maxlength="20" minlength="8"  class="span12"   placeholder="Dd/Mm/Yyyy" />
                                        </div>
                                    </div>

                                    <div class="span12"  >
                                        <label class="control-label ">REASON:</label>
                                        <div class="controls">
                                            <input type="text" name="reason" id="reason" value="" maxlength="255" class="span12"  required="" placeholder="REASON" />
                                        </div>
                                    </div>
                                </div>

                               
                                
                            </div>



                        </div>
                        <div class="control-group">
                            <center>
                                <div class="form-actions right">

                                    <button type="submit" name="submit" class="btn btn-success">APPROVE</button>
                                    <button type="reset" name="reset" class="btn btn-primary">RESET</button>
                                    <a href="index.php?requestPage=view_employee"><button type="button" class="btn btn-info">VIEW</button></a>
                                    <a href="index.php?requestPage=rejectreason_leaveapproval"  <button type="submit" class="btn btn-danger">REJECT</button></a>


                                </div>
                            </center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




