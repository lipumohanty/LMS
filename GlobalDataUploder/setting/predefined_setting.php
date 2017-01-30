<?php
if (isset($_POST["submit"])) {
    unset($_POST["submit"]);

    MysqlConnection::insert("tbl_predefinedleave", $_POST);
    exit;
}
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function () {
        $("#date_leave").datepicker({dateFormat: 'yy-mm-dd'});
    });

</script>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-user"></i></span><h5 style="color: green">PREDEFINED LEAVE</h5></div>
                <div class="widget-content nopadding">
                    <form class="form-horizontal" method="post" action="" name="" id="" novalidate="novalidate">
                        <div class="control-group" style="background-color: white;">
                            <div class="span11" style="clear: both "></div>

                            <div class="span11">
                                <div class="span11"  style="float: left">
                                    <label class="control-label ">&nbsp;ADDED&nbsp;DATE:&nbsp;</label>
                                    <div class="controls">
                                        <input type="text" name="date_leave" id="date_leave" value="" maxlength="" class="span12"   placeholder="" />
                                    </div>
                                </div>
                            </div>
                            <div class="span11">
                                <div class="span11"  style="float: left">
                                    <label class="control-label ">NAME&nbsp;:&nbsp;</label>
                                    <div class="controls">
                                        <input type="text" name="name"  value=""  maxlength="255" class="span12"  required="" placeholder="" />
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
                            <div class="control-group">
                                <center>
                                    <div class="form-actions right">
                                        <a href=""><button type="submit" name="submit" class="btn btn-success">SUBMIT</button>
                                            <button type="reset" class="btn btn-primary">RESET</button>
                                            <a href="index.php?requestPage=viewpredefined_setting"><button type="button" class="btn btn-info">VIEW</button></a>
                                            <a href="index.php?requestPage=viewpredefined_setting"><button type="button" class="btn btn-danger">CANCEL</button></a>
                                    </div>
                                </center>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>