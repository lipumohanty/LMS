<?php
error_reporting(0);
$type = str_replace("_", " ", $_GET["type"]);
$_SESSION["typesession"] = $_GET["type"];
if (isset($_POST["submit"])) {

    if ($_POST["fromdate"] == "" || $_POST["todate"]==""||$_POST["purpose"]==""||$_POST["place"]==""||$_POST["contact"]=="") {
        $error = "Enter All fields";
    } else {
        unset($_POST["submit"]);
        $_POST["empId"] = $_SESSION["email"]["txtId"];

        $_POST["entrydate"] = date("Y-m-d");

        if ($type == "casual leave" || $type == "earned leave") {
            $_POST["leave_type"] = $type;
        } else {
            $_POST["leave_type"] = $type;
        }
        $nextId = MysqlConnection::insert("tbl_leavehistory", $_POST);
        header("location:mainpage.php?requestPage=step2_apply&nextId=$nextId");
    }
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
        CalculateDiff('');
    });

</script>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-user"></i></span><h5 style="color: green">APPLY LEAVE -(<?php echo $type ?>)</h5></div>
                <form class="form-horizontal" method="post" action="" name="" id="" novalidate="novalidate">
                    <div class="control-group" style="background-color: white;">
                        <div class="span11" style="clear: both "></div>
                        
                        <div class="span11">
                            <div class="span11"  style="float: left">
                              
                                <label class="control-group "><p style="color: red"><?php echo $error ?></p></label>
                            </div>
                        </div>
                        <div class="span11">
                            <div class="span6"  style="float: left">
                                <label class="control-label ">FROM:</label>
                                <div class="controls">
                                    <div  data-date="12-02-2012" class="input-append date datepicker">
                                        <input type="text" name="fromdate" id="fromdate"  maxlength="10" minlength="1" class="span12"   placeholder="yyyy-mm-dd" required="true"><span class="add-on"><i class="icon-th"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="span6"  style="float: left">
                                <label class="control-label ">TO:</label>
                                <div class="controls">
                                    <div  data-date="12-02-2012" class="input-append date datepicker">
                                        <input type="text" name="todate" id="todate"  onkeyup="" maxlength="10" minlength="1" class="span12"   placeholder="yyyy-mm-dd" required="true"><span class="add-on"><i class="icon-th"></i></span>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="span11">
                            <div class="span6"  style="float: left">
                                <label class="control-label ">NO OF DAYS:</label>
                                <div class="controls">
                                    <input type="text" name="no_days" id="no_days"  maxlength="10" minlength="1" class="span12" onfocus="CalculateDiff()" placeholder="" required="true">
                                </div>
                            </div>
                            <div class="span6"  style="float: left">
                                <label class="control-label ">PURPOSE OF LEAVE:</label>
                                <div class="controls">
                                    <textarea type="text" name="purpose"  maxlength="10" minlength="1" class="span12"   placeholder="" required="true"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="span11">
                            <div class="span6"  style="float: left">
                                <label class="control-label ">PLACE OF VISIT:</label>
                                <div class="controls">
                                    <input type="text" name="place"  maxlength="10" minlength="1" class="span12"   placeholder="" required="true">
                                </div>
                            </div>
                            <div class="span6"  style="float: left">
                                <label class="control-label ">MOBILE NO:</label>
                                <div class="controls">
                                    <input type="text" name="contact"  maxlength="10" minlength="10" class="span12" onKeyPress="return isNumberKey(event)"  placeholder="" required="true">
                                </div>
                            </div>
                        </div>

                        <div class="control-group">
                            <center>
                                <div class="form-actions right">
                                    <input type="submit" name="submit" class="btn btn-success" value="NEXT" >
                                    <button type="reset" class="btn btn-primary">RESET</button>
                                    <a href="mainpage.php?requestPage=view_apply"><button type="button" class="btn btn-info">VIEW</button></a>
                                    <a href="mainpage.php?requestPage=view_apply"> <button type="button" class="btn btn-danger">CANCEL</button></a>

                                </div>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script language="JavaScript" type="text/javascript">
// To calulate difference b/w two dates
    function CalculateDiff(oriNo) {
        var From_date = new Date($("#fromdate").val());
        var To_date = new Date($("#todate").val());
        var diff_date = To_date - From_date;
        var days = Math.floor(((diff_date % 31536000000) % 2628000000) / 86400000);
        
        if(parseInt(oriNo) < parseInt(days)){
            alert("restrict fields");
        }else{
            document.getElementById("no_days").value = days;
        }
        
    }
</script>