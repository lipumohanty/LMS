<?php
error_reporting(0);
$type = str_replace("_", " ", $_GET["type"]);
$_SESSION["typesession"] = $_GET["type"];
if (isset($_POST["submit"])) {

    if ($_POST["avail_ltc"] == "") {
        $error = "Enter All fields";
    } else {
        unset($_POST["submit"]);
        $_POST["empId"] = $_SESSION["email"]["txtId"];

        $_POST["applieddate"] = date("Y-m-d");

        if ($type == "casual leave") {
            $_POST["leave_type"] = $type;
        } else {
            $_POST["leave_type"] = $type;
        }
        $nextId = MysqlConnection::insert("tbl_leavehistorynew", $_POST);
        header("location:mainpage.php?requestPage=applystep2_apply&nextId=$nextId");
    }
}
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-user"></i></span><h5 style="color: green">APLLY LEAVE- STEP 1</h5></div>
                <form class="form-horizontal" method="post" action="" name="" id="" novalidate="novalidate">
                    <div class="control-group" style="background-color: white;">
                        <div class="span11" style="clear: both "></div>

                        <div class="span11">
                            <div class="span11"  style="float: left">
                                <label class="control-group ">WHETHER THERE IS ANY PROPOSAL TO AVAIL LTC DURING THE PERIOD OF LEAVE:</label>
                                <div class="controls">
                                    <select class="span8" id="avail_ltc" name="avail_ltc"  >
                                        <option value="">Select</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="control-group">
                            <center>
                                <div class="form-actions right">
                                    <input type="submit" name="submit" id="submit" class="btn btn-success" value="NEXT">

                                </div>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#submit").button({icons: {secondary: "ui-icon-info"}});
        $("#avail_ltc").addClass("ui-state-default ui-corner-all");
        var demoSelectValue = $("#avail_ltc").val();
        if (demoSelectValue == "") {
            $("#submit").button("disable")
        }
        $("#avail_ltc").change(function () {
            if ($(this).val() == "yes") {
                alert("online application cannot be made");
                $("#submit").button("disable")
            }
            else {
                $("#submit").button("enable")
            }
        });
    });
</script>