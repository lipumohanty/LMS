<?php
if (isset($_POST["submit"])) {
    unset($_POST["submit"]);
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    MysqlConnection::insert("tbl_addleave", $_POST);
}
?>


<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-user"></i></span><h5 style="color: green">LEAVE YEAR</h5></div>
                <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post" action="" name="" id="" novalidate="novalidate">
                        <div class="control-group" style="background-color: white;">
                            <div class="span11" style="clear: both "></div>
                            <div class="span11">
                                <div class="span11"  style="float: left">
                                    <label class="control-label ">LEAVE&nbsp;TYPE:&nbsp;</label>
                                    <div class="controls">
                                        <input type="text" name="leave_type" autofocus=""  value="" maxlength="30" class="span12"  required="" placeholder="" />
                                    </div>
                                </div>
                            </div>
                            <div class="span11">
                                <div class="span11"  style="float: left">
                                    <label class="control-label ">DESCRIPTION&nbsp;:&nbsp;</label>
                                    <div class="controls">
                                        <input type="text" name="description"  value=""  maxlength="255" class="span12"  required="" placeholder="" />
                                    </div>
                                </div>
                            </div>
                            <div class="span11">
                                <div class="span11"  style="float: left">
                                    <label class="control-label ">NO&nbsp;OF&nbsp;COUNT:&nbsp;</label>
                                    <div class="controls">
                                        <input type="text" name="no_count" value="" maxlength="`" class="span12" onKeyPress="return isNumberKey(event)"  placeholder="" />
                                    </div>
                                </div>
                                
                            </div>
                            <div class="span11">
                                <div class="span11"  style="float: left">
                                    <label class="control-label ">&nbsp;ADDED&nbsp;DATE:&nbsp;</label>
                                    <div class="controls">
                                        <input type="text" name="added_date" value="" maxlength="" class="span12"   placeholder="" />
                                    </div>
                                </div>
                                
                            </div>
                            <div class="span11">
                                <div class="span11"  style="float: left">
                                    <label class="control-label ">&nbsp;ADDED&nbsp;BY:&nbsp;</label>
                                    <div class="controls">
                                        <input type="text" name="added_by" value="" maxlength="30" class="span12"   placeholder="" />
                                    </div>
                                </div>
                                
                            </div>
                            <div class="span11">
                            <div class="span11"  style="float: left">
                                    <label class="control-label ">IS&nbsp;ACTIVE:&nbsp;</label>
                                    <div class="controls">
                                        <select class="span12" id="is_active" name="is_active">
                                                 
                                                <option value="y">Yes</option>
                                                <option value="n">No</option>
                                           
                                        </select>
                                    </div>
                                </div>
                            
                        </div>
                        <div class="control-group">
                            <center>
                                <div class="form-actions right">
                                   
                                    <a href=""><button type="submit" name="submit" class="btn btn-success">ADD</button>
                                    <button type="reset" class="btn btn-primary">RESET</button>
                                    <a href="index.php?requestPage=viewleave_employee"><button type="button" class="btn btn-info">VIEW</button></a>
                                     <a href="index.php?requestPage=editleave_employee"><button type="button" class="btn btn-info">EDIT</button></a>
                                </div>
                            </center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>