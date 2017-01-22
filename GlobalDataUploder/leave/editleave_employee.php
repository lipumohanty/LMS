<?php
if (isset($_POST["submit"])) {
    unset($_POST["submit"]);
    MysqlConnection::insert("tbl_leave_type", $_POST);
}
?>



<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-cloud"></i> </span>
                    <h5>EDIT LEAVE </h5>
                </div>
                <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post" action="../OffsetuserServlet" name="basic_validate" id="basic_validate" novalidate="novalidate">
                        <div class="control-group">
                            <label class="control-label ">LEAVE ID :</label>
                            <div class="controls">
                                <input type="text" name=";leave_id"   autofocus="" maxlength="10" class="span11"    placeholder="LEAVE ID" />
                            </div>
                            <label class="control-label ">LEAVE TYPE :</label>
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
                <div class="widget-title"> <span class="icon"> <i class="icon-user"></i></span><h5 style="color: green">LEAVE YEAR</h5></div>
                <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post" action="" name="" id="" novalidate="novalidate">
                        <div class="control-group" style="background-color: white;">
                            <div class="span11" style="clear: both "></div>
                           
                           
                            <div class="span11">
                                <div class="span11"  style="float: left">
                                    <label class="control-label ">NO&nbsp;OF&nbsp;COUNT:&nbsp;</label>
                                    <div class="controls">
                                        <input type="text" name="counter" value="" maxlength="" class="span12" onKeyPress="return isNumberKey(event)"  placeholder="" />
                                    </div>
                                </div>
                                
                            </div>
                            <div class="span11">
                                <div class="span11"  style="float: left">
                                    <label class="control-label ">&nbsp;ADDED&nbsp;DATE:&nbsp;</label>
                                    <div class="controls">
                                        <input type="text" name="add_date" value="" maxlength="" class="span12"   placeholder="" />
                                    </div>
                                </div>
                                
                            </div>
                            <div class="span11">
                                <div class="span11"  style="float: left">
                                    <label class="control-label ">&nbsp;ADDED&nbsp;BY:&nbsp;</label>
                                    <div class="controls">
                                        <input type="text" name="add_by" value="" maxlength="" class="span12"   placeholder="" />
                                    </div>
                                </div>
                                
                            </div>
                            <div class="span11">
                            <div class="span11"  style="float: left">
                                    <label class="control-label ">IS&nbsp;ACTIVE:&nbsp;</label>
                                    <div class="controls">
                                        <select class="span12" id="is_active" name="is_active">
                                                 
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                           
                                        </select>
                                    </div>
                                </div>
                            
                        </div>
                        <div class="control-group">
                            <center>
                                <div class="form-actions right">
                                   
                                    <a href=""><button type="submit" name="submit" class="btn btn-success">SAVE</button>
                                 
                                    <a href="index.php?requestPage=view_employee"><button type="button" class="btn btn-info">VIEW</button></a>
                                </div>
                            </center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>