<?php
error_reporting(0);
$type = str_replace("_", " ", $_GET["type"]);
$_SESSION["typesession"] = $_GET["type"];
if (isset($_POST["submit"])) {
    if (strtolower($_POST["proposal"]) == "yes") {
        $boolen = "invalid";
    } else {
        $boolen = "";
        unset($_POST["submit"]);
        unset($_POST["proposal"]);
        $_POST["empId"] = $_SESSION["email"]["txtId"];
        $_POST["applieddate"] = date("Y-m-d");
        if ($type == "casual leave") {
            $_POST["leave_type"] = $type;
        } else {
            $_POST["leave_type"] = $type;
        }
        $_POST["isActive"] = "N";
        $_POST["hasApprove"] = "N";
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
                <div class="widget-title"> <span class="icon"> <i class="icon-user"></i></span><h5 style="color: green">APPLY LEAVE- STEP 1</h5></div>
                <form class="form-horizontal" method="post" action="" name="frmNext" id="" novalidate="novalidate">
                    <div class="control-group" style="background-color: white;">
                        <br/>
                        <div >
                            <div class="controls" style="text-transform: capitalize">
                                whether there is any proposal to avail ltc during the period of leave :&nbsp;&nbsp;
                                <select name="proposal" id="proposal"  >
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>

                            <div class="control-group">
                                <center>
                                    <?php
                                    if ($boolen != "") {
                                        echo "<br/>";
                                        echo "<p style='color:red'>Online application cannot be made....kindly submit Your application Manual</p>";
                                        echo "<br/>";
                                    }
                                    ?>
                                    <div class="form-actions right">
                                        <input type="submit" name="submit" class="btn btn-success" value="NEXT" >
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
