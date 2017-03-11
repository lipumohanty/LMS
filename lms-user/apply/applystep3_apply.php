<?php
$typesession = $_SESSION["typesession"];
$nextId= $_GET["nextId"];
if (isset($_POST["submit"])) {
   
    unset($_POST["submit"]);
    $_POST["empId"] = $_SESSION["email"]["txtId"];
    
    $_POST["txtId"]=$nextId;
    $_POST["isActive"] = "Y";
     MysqlConnection::edit("tbl_leavehistorynew", $_POST,$nextId);
     header("location:mainpage.php?requestPage=dashboard");
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
                <div class="widget-title"> <span class="icon"> <i class="icon-user"></i></span><h5 style="color: green">APPLY LEAVE -STEP 3</h5></div>
                <form class="form-horizontal" method="post" action="" name="" id="" novalidate="novalidate">
                    <div class="control-group" style="background-color: white;">
                        <div class="span11" style="clear: both "></div>
                        
                        <div class="span11">
                            <div class="span11"  style="float: left">
                              
                                <label class="control-group "><p style="color: red"><?php echo $error ?></p></label>
                            </div>
                        </div>
                       
                        <div class="span11">
                            
                            <div class="span11"  style="float: left">
                                <label class="control-label ">ADDRESS DURING LEAVE:</label>
                                <div class="controls">
                                    <textarea type="text" name="address"  maxlength="255" minlength="1" class="span12"   placeholder="" required="true"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="span11">
                            <div class="span6"  style="float: left">
                                <label class="control-label ">CITY:</label>
                                <div class="controls">
                                    <input type="text" name="city"  maxlength="10" minlength="1" class="span12"   placeholder="" required="true">
                                </div>
                            </div>
                            <div class="span6"  style="float: left">
                                <label class="control-label ">MOBILE NO:</label>
                                <div class="controls">
                                    <input type="text" name="mobile"  maxlength="10" minlength="10" class="span12" onKeyPress="return isNumberKey(event)"  placeholder="" required="true">
                                </div>
                            </div>
                        </div>

                        <div class="control-group">
                            <center>
                                <div class="form-actions right">
                                    <input type="submit" name="submit" class="btn btn-success" value="SUBMIT" >
                                    <button type="reset" class="btn btn-primary">RESET</button>
                                    
                                    <a href=""> <button type="button" class="btn btn-danger">CANCEL</button></a>

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