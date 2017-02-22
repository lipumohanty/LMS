<?php
if (isset($_POST["submit"])) {
    
     
    unset($_POST["submit"]);

    MysqlConnection::insert("tbl_leavesetting", $_POST);
     header("location:mainpage.php?requestPage=viewaddleave_setting");
    exit;
}
?>

<div class="container-fluid">
    <hr>
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                    <h5>LEAVE SETTINGS: </h5>
                </div>
                <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post" action="" name="" id="" novalidate="novalidate">
                        <div class="control-group" style="background-color: white;">
                            <div class="span11" style="clear: both "></div>
                            <div class="span11">
                                <div class="span6"  style="float: left">
                                    <label class="control-label ">EMPLOYEE ID:</label>
                                    <div class="controls">
                                        <input type="text" name="emp_id" value="" maxlength="" class="span12"   placeholder="" />
                                    </div>
                                </div>
                                <div class="span6"  style="float: left">
                                    <label class="control-label ">EARNED LEAVE :</label>
                                    <div class="controls">
                                        <input type="text" name="earned_leave" autofocus="" value="" maxlength="" class="span12"  required="" placeholder="" />
                                    </div>
                                </div>

                            </div>
                            

                            
                        </div>
                        <div class="control-group">
                            <center>
                                <div class="form-actions right">

                                    <a href=""><button type="submit" name="submit" class="btn btn-success">SUBMIT</button>
                                        <button type="reset" class="btn btn-primary">RESET</button>
                                        <a href="mainpage.php?requestPage=viewaddleave_setting"><button type="button" class="btn btn-info">VIEW</button></a>
                                        <a href="mainpage.php?requestPage=viewaddleave_setting"><button type="button" class="btn btn-danger">CANCEL</button></a>
                                </div>
                            </center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>