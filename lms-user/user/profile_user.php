
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-user"></i></span><h5 style="color: green">REGISTER EMPLOYEE</h5></div>
                <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post" action="" name="" id="" novalidate="novalidate">
                        <div class="control-group" style="background-color: white;">
                            <div class="span11" style="clear: both "></div>
                            <div class="span11">
                                <div class="span6"  style="float: left">
                                    <label class="control-label ">NAME&nbsp;:&nbsp;</label>
                                    <div class="controls">
                                        <input type="text" name="name" autofocus="" value="" maxlength="100" class="span12"  required="" placeholder="" />
                                    </div>
                                </div>
                                <div class="span6"  style="float: left">
                                    <label class="control-label ">DESIGNATION&nbsp;:&nbsp;</label>
                                    <div class="controls">
                                        <input type="text" name="designation"  value=""  maxlength="100" class="span12"  required="" placeholder="" />
                                    </div>
                                </div>
                            </div>
                            <div class="span11">
                                <div class="span6"  style="float: left">
                                    <label class="control-label ">&nbsp;PAY&nbsp;SCALE&nbsp;& GRADE PAY:&nbsp;</label>
                                    <div class="controls">
                                        <input type="text" name="payscale" value="" maxlength="30" class="span12"   placeholder="" />
                                    </div>
                                </div>
                                <div class="span6"  style="float: left">
                                    <label class="control-label ">&nbspCONTACT&nbspNO&nbsp; &nbsp;:&nbsp;</label>
                                    <div class="controls">
                                        <input type="text" name="contact_no"  onKeyPress="return isNumberKey(event)" value="" maxlength="20" minlength="8"  class="span12"   placeholder="" />
                                    </div>
                                </div>
                            </div>
                            <div class="span11">
                                <div class="span12"  >
                                    <label class="control-label ">ADDRESS&nbsp&nbsp;:&nbsp;</label>
                                    <div class="controls">
                                        <input type="text" name="address" value="" maxlength="21845" class="span12"  required="" placeholder="" />
                                    </div>
                                </div>
                            </div>
                            <div class="span11">
                                <div class="span12"  >
                                    <label class="control-label ">D.O.B&nbsp&nbsp;:&nbsp;</label>
                                    <div class="controls">
                                        <input type="date" name="birth_date" value="" maxlength="255" class="span12"  required="" placeholder="" />
                                    </div>
                                </div>
                            </div>      
                        </div>
                        <div class="control-group">
                            <center>
                                <div class="form-actions right">

                                    <button type="submit" name="submit" class="btn btn-success">SUBMIT</button>
                                    <button type="reset" name="reset" class="btn btn-primary">RESET</button>
                                    <a href="employeedetails.php"><button type="button" class="btn btn-info">VIEW</button></a>
                                </div>
                            </center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>