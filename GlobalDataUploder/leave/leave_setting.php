<a href="../<%= IServletConstant.PAGE_ADD_EMPLOYEE%>" style="padding-left: 20px;">
    <button type="submit" class="btn btn-success">ADD EMPLOYEE</button>
</a>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-cloud"></i> </span>
                    <h5>SEARCH LEAVE BY EMPLOYEE ID </h5>
                </div>
                <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post" action="../OffsetuserServlet" name="basic_validate" id="basic_validate" novalidate="novalidate">
                        <div class="control-group">
                            <label class="control-label ">EMPLOYEE ID :</label>
                            <div class="controls">
                                <input type="text" name="employee_id"   autofocus="" maxlength="10" class="span11"    placeholder="EMPLOYEE ID" />
                            </div>
                            <label class="control-label ">USERNAME :</label>
                            <div class="controls">
                                <input type="text" name="username"   autofocus="" maxlength="100" class="span11"    placeholder="USERNAME" />
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
                                <div class="span11"  style="float: left">
                                    <label class="control-label ">COMMUTED LEAVE&nbsp;:&nbsp;</label>
                                    <div class="controls">
                                        <input type="text" name="" autofocus="" value="" maxlength="" class="span12"  required="" placeholder="" />
                                    </div>
                                </div>
                                <div class="span11"  style="float: left">
                                    <label class="control-label ">HALF PAY LEAVE&nbsp;:&nbsp;</label>
                                    <div class="controls">
                                        <input type="text" name=""  value=""  maxlength="" class="span12"  required="" placeholder="" />
                                    </div>
                                </div>
                            </div>
                            <div class="span11">
                                <div class="span11"  style="float: left">
                                    <label class="control-label ">&nbsp;SPECIAL&nbsp;LEAVE:&nbsp;</label>
                                    <div class="controls">
                                        <input type="text" name="" value="" maxlength="" class="span12"   placeholder="" />
                                    </div>
                                </div>
                                
                            </div>
                             <div class="span11">
                                <div class="span11"  style="float: left">
                                    <label class="control-label ">&nbsp;LEAVING&nbsp;OF:&nbsp HEADQUARTER;</label>
                                    <div class="controls">
                                        <input type="text" name="" value="" maxlength="" class="span12"   placeholder="" />
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="control-group">
                            <center>
                                <div class="form-actions right">
                                   
                                    <a href="add_employee.php"><button type="submit" class="btn btn-success">OK</button>
                                    <button type="reset" class="btn btn-primary">RESET</button>
                                     <a href="index.php?requestPage=view_leave"><button type="button" class="btn btn-info">VIEW</button></a>
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