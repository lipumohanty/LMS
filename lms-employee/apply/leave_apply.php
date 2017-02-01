<?php
if (isset($_POST["submit"])) {
    if (!$_POST['leave_type'] | !$_POST['description'] | !$_POST['no_count']) {

        die('You did not complete all of the required fields');
    }
    unset($_POST["submit"]);
    $_POST["added_by"] = $_SESSION["login"]["name_user"];
    $_POST["added_date"] = date("y-m-d");
    MysqlConnection::insert("tbl_addleave", $_POST);
    header("location:index.php?requestPage=viewleave_leave");
}
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function () {
        $("#fromdate").datepicker({dateFormat: 'yy-mm-dd'});
    });
    $(function () {
        $("#todate").datepicker({dateFormat: 'yy-mm-dd'});
    });
     $(function () {
        $("#date").datepicker({dateFormat: 'yy-mm-dd'});
    });
     $(function () {
        $("#datefrom").datepicker({dateFormat: 'yy-mm-dd'});
    });
     $(function () {
        $("#dateto").datepicker({dateFormat: 'yy-mm-dd'});
    });

</script>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-user"></i></span><h5 style="color: green">APPLY LEAVE</h5></div>

                <form class="form-horizontal" method="post" action="" name="" id="" novalidate="novalidate">
                    <div class="control-group" style="background-color: white;">
                        <div class="span11" style="clear: both "></div>
                        <div class="span11">
                            <div class="span6"  style="float: left">
                                <label class="control-label ">LEAVE TYPE:</label>
                                <div class="controls">
                                    <input type="text" name="" autofocus=""  value="" maxlength="30" minlength="1" class="span12"  required="" placeholder="" />
                                </div>
                            </div>
                            <div class="span6"  style="float: left">
                                <label class="control-label ">DURATION OF LEAVE:</label>
                                <div class="controls">
                                    <input type="text" name=""  value=""  maxlength="255"  minlength="1" class="span12"  required="" placeholder="" />
                                </div>
                            </div>
                        </div>

                        <div class="span11">
                            <div class="span6"  style="float: left">
                                <label class="control-label ">FROM:</label>
                                <div class="controls">
                                    <input type="text" name="fromdate" id="fromdate" value="" maxlength="10" minlength="1" class="span12"   placeholder="yyyy-mm-dd" required>
                                </div>
                            </div>
                            <div class="span6"  style="float: left">
                                <label class="control-label ">TO:</label>
                                <div class="controls">
                                    <input type="text" name="todate" id="todate" value="" maxlength="10" minlength="1" class="span12"   placeholder="yyyy-mm-dd" required>
                                </div>
                            </div> 

                        </div>
                        <div class="span11">
                            <div class="span6"  style="float: left">
                                <label class="control-label ">NO OF DAYS:</label>
                                <div class="controls">
                                    <input type="text" name="" value="" maxlength="10" minlength="1" class="span12" onKeyPress="return isNumberKey(event)"  placeholder="" required>
                                </div>
                            </div>
                            <div class="span6"  style="float: left">
                                <label class="control-label ">DO YOU WANT TO USE ANY RESTRICTED LEAVE:</label>
                                <div class="controls">
                                    <select class="span12" id="" name="">

                                        <option value="y">Yes</option>
                                        <option value="n">No</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="span11">
                            <div class="span6"  style="float: left">
                                <label class="control-label ">DATE:</label>
                                <div class="controls">
                                    <input type="text" name="date" id="date" value="" maxlength="10" minlength="1" class="span12"   placeholder="yyyy-mm-dd" required>
                                </div>
                            </div>
                            <div class="span6"  style="float: left">
                                <label class="control-label ">PURPOSE OF LEAVE:</label>
                                <div class="controls">
                                    <input type="text" name="" value="" maxlength="10" minlength="1" class="span12"   placeholder="" required>
                                </div>
                            </div>


                        </div>

                        
                        <div class="span11">
                            <div class="span6"  style="float: left">
                                <label class="control-label ">WHETHER THERE IS ANY PROPOSAL TO AVAIL LTC DURING THE PERIOD OF LEAVE:</label>
                                <div class="controls">
                                    <select class="span12" id="" name="">

                                        <option value="y">Yes</option>
                                        <option value="n">No</option>

                                    </select>
                                </div>
                            </div>
                             <div class="span6"  style="float: left">
                                <label class="control-label ">MENTION THE DETAILS:</label>
                                <div class="controls">
                                    <input type="text" name="" value="" maxlength="10" minlength="1" class="span12"   placeholder="" required>
                                </div>
                            </div>

                        </div>
                        
                        <div class="span11">
                            <div class="span6"  style="float: left">
                                <label class="control-label ">LEAVE ENCASHMENT:</label>
                                <div class="controls">
                                    <select class="span12" id="" name="">

                                        <option value="y">Yes</option>
                                        <option value="n">No</option>

                                    </select>
                                </div>
                            </div>
                             <div class="span6"  style="float: left">
                                <label class="control-label ">NO OF DAYS LEAVE ENCASHMENT TAKEN TILL DATE:</label>
                                <div class="controls">
                                    <input type="text" name="" value="" maxlength="10" minlength="1" class="span12" onKeyPress="return isNumberKey(event)"  placeholder="" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="span11">
                            <div class="span6"  style="float: left">
                                <label class="control-label ">WHETHER PERMISSION IS REQUIRED FOR LEAVING THE HEADQUARTER DURING THE PERIOD OF LEAVE:</label>
                                <div class="controls">
                                    <select class="span12" id="" name="">

                                        <option value="y">Yes</option>
                                        <option value="n">No</option>

                                    </select>
                                </div>
                            </div>
                             <div class="span6"  style="float: left">
                                <label class="control-label ">FROM:</label>
                                <div class="controls">
                                    <input type="text" name="datefrom" id="datefrom" value="" maxlength="10" minlength="1" class="span12"   placeholder="yyyy-mm-dd" required>
                                </div>
                            </div>
                        </div>
                        <div class="span11">
                           
                            <div class="span6"  style="float: left">
                                <label class="control-label ">TO:</label>
                                <div class="controls">
                                    <input type="text" name="dateto" id="dateto" value="" maxlength="10" minlength="1" class="span12"   placeholder="yyyy-mm-dd" required>
                                </div>
                            </div> 
                             <div class="span6"  style="float: left">
                                <label class="control-label ">PLACE OF VISIT:</label>
                                <div class="controls">
                                    <input type="text" name="" value="" maxlength="10" minlength="1" class="span12"   placeholder="" required>
                                </div>
                            </div>

                        </div>
                       
                        <div class="span11">
                            <div class="span6"  style="float: left">
                                <label class="control-label ">MOBILE NO:</label>
                                <div class="controls">
                                    <input type="text" name="" value="" maxlength="10" minlength="1" class="span12" onKeyPress="return isNumberKey(event)"  placeholder="" required>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <center>
                                <div class="form-actions right">
                                    <a href="index.php?requestPage=viewleave_leave"><button type="submit" name="submit" class="btn btn-success" >SUBMIT</button></a>
                                    <button type="reset" class="btn btn-primary">RESET</button>
                                    <a href="index.php?requestPage=view_apply"><button type="button" class="btn btn-info">VIEW</button></a>
                                    <a href="index.php?requestPage=view_apply"> <button type="button" class="btn btn-danger">CANCEL</button></a>
                                </div>
                            </center>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>