<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-cloud"></i> </span>
                    <h5>EDIT EMPLOYEE </h5>
                </div>
                <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post" action="../OffsetuserServlet" name="basic_validate" id="basic_validate" novalidate="novalidate">
                        <div class="control-group">
                            <label class="control-label ">EMPLOYEE ID :</label>
                            <div class="controls">
                                <input type="text" name=";leave_id"   autofocus="" maxlength="10" class="span11"    placeholder="LEAVE ID" />
                            </div>
                            <label class="control-label ">EMPLOYEE NAME :</label>
                            <div class="controls">
                                <input type="text" name="leave_type"   autofocus="" maxlength="100" class="span11"    placeholder="LEAVE TYPE" />
                            </div>
                            <div class="controls">
                                <input type="hidden" name="<%= IServletConstant.ACTION%>" value="<%= IServletConstant.ACTION_SEARCH%>" />
                                <button type="submit" class="btn btn-success">Search</button>
                                <button type="submit" class="btn btn-danger">Clear</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-user"></i></span><h5 style="color: green">EMPLOYEE REGISTRATION</h5></div>
                <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post" action="" name="" id="" novalidate="novalidate">
                        <div class="control-group" style="background-color: white;">
                            <div class="span11" style="clear: both "></div>
                            <div class="span11">
                                <div class="span11"  style="float: left">
                                    <label class="control-label ">FIRST NAME:</label>
                                    <div class="controls">
                                        <input type="text" name="fname" autofocus="" value="" maxlength="30" class="span12"  required="" placeholder="" />
                                    </div>
                                </div>
                                <div class="span11"  style="float: left">
                                   <label class="control-label ">LAST NAME:</label>
                                    <div class="controls">
                                        <input type="text" name="lname" autofocus="" value="" maxlength="30" class="span12"  required="" placeholder="" />
                                    </div>
                                </div>
                            </div>
                            <div class="span11">
                                <div class="span11"  style="float: left">
                                    <label class="control-label ">CONTACT&nbspNO&nbsp; &nbsp;:&nbsp;</label>
                                    <div class="controls">
                                        <input type="text" name="contact"  value="" maxlength="10" minlength="10" onKeyPress="return isNumberKey(event)" class="span12"   placeholder="" />
                                    </div>
                                </div>
                                <div class="span11"  style="float: left">
                                    <label class="control-label ">MAIL&nbspID&nbsp; &nbsp;:&nbsp;</label>
                                    <div class="controls">
                                        <input type="text" name="mail_id"  value="" maxlength="10" minlength="10" onKeyPress="return isNumberKey(event)" class="span12"   placeholder="" />
                                    </div>
                                </div>
                                <div class="span11"  style="float: left">
                                    <label class="control-label ">&nbspJOIN &nbspDATE&nbsp; &nbsp;:&nbsp;</label>
                                    <div class="controls">
                                        <input type="text" name="join_date" id="join_date"  value="" maxlength="20" minlength="8"  class="span12"   placeholder="" />
                                    </div>
                                </div>
                            </div>
                            <div class="span11">
                                <div class="span11"  style="float: left">
                                    <label class="control-label ">&nbspDESIGNATION&nbsp; &nbsp;:&nbsp;</label>
                                    <div class="controls">
                                        <input type="text" name="designation"  value="" maxlength="20" minlength="8"  class="span12"   placeholder="" />
                                    </div>
                                </div>
                                <div class="span11"  style="float: left">
                                    <label class="control-label ">&nbspPAY &nbspSCALE&nbsp; &nbsp;:&nbsp;</label>
                                    <div class="controls">
                                        <input type="text" name="payscale"  onKeyPress="return isNumberKey(event)" value="" maxlength="20" minlength="8"  class="span12"   placeholder="" />
                                    </div>
                                </div>
                            </div>
                            <div class="span11">
                                <div class="span11"  >
                                    <label class="control-label ">D.O.B&nbsp&nbsp;:&nbsp;</label>
                                    <div class="controls">
                                        <input type="date" name="dob" value="" maxlength="255" class="span12"  required="" placeholder="" />
                                    </div>
                                </div>
                            </div>

                            <div class="span11">
                                <div class="span12"  >
                                    <label class="control-label ">ADDRESS&nbsp&nbsp;:&nbsp;</label>
                                    <div class="controls">
                                        <input type="text" name="address" value="" maxlength="255" class="span12"  required="" placeholder="" />
                                    </div>
                                </div>
                            </div>


                            <div class="span11">
                                <div class="span11"  style="float: left">
                                    <label class="control-label ">&nbsp;PASSWORD:</label>
                                    <div class="controls">
                                        <input type="text" name="commuted_leave"  onKeyPress="return isNumberKey(event)" value="" maxlength="30" class="span12"   placeholder="" />
                                    </div>
                                </div>
                                <div class="span11"  style="float: left">
                                    <label class="control-label ">RE-TYPE PASSWORD:&nbsp;</label>
                                    <div class="controls">
                                        <input type="text" name="halfpay_leave"  onKeyPress="return isNumberKey(event)" value="" maxlength="20" minlength="8"  class="span12"   placeholder="" />
                                    </div>
                                </div>
                            </div>
                            


                        </div>
                        <div class="control-group">
                            <center>
                                <div class="form-actions right">

                                    <button type="submit" name="submit" class="btn btn-success">SUBMIT</button>
                                    <button type="reset" name="reset" class="btn btn-primary">RESET</button>
                                    <a href="index.php?requestPage=view_employee"><button type="button" class="btn btn-info">VIEW</button></a>
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