<?php
if (isset($_POST["submit"])) {
    unset($_POST["submit"]);
   echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    MysqlConnection::insert(" tbl_employee", $_POST);
}
?>

<script>
  $( function() {
    $( "#join_date" ).datepicker();
  } );
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
                                        <input type="text" name="email"  value="" maxlength="10" minlength="10" class="span12"   placeholder="" />
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
                                        <input type="text" name="pay_scale"  onKeyPress="return isNumberKey(event)" value="" maxlength="20" minlength="8"  class="span12"   placeholder="" />
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
                                        <input type="text" name="password"   value="" maxlength="30" class="span12"   placeholder="" />
                                    </div>
                                </div>
                                <div class="span11"  style="float: left">
                                    <label class="control-label ">RE-TYPE PASSWORD:&nbsp;</label>
                                    <div class="controls">
                                        <input type="text" name=""   value="" maxlength="20" minlength="8"  class="span12"   placeholder="" />
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
  
  
  
  
  