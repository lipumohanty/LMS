<?php
$typesession = $_SESSION["typesession"];
$nextId = $_GET["nextId"];
$empId = $_SESSION["email"]["txtId"];
$sqlbalaneleave = "SELECT balanceLeave FROM `tbl_applyleavenew` WHERE `empId` = $empId";
$sqlbalresult = MysqlConnection::fetchCustom($sqlbalaneleave);
$balaneleave = $sqlbalresult[0]["balanceLeave"];

if (isset($_POST["brnCheack"])) {
    $fromDate = $_POST["fromdate"];
    $todate = $_POST["todate"];

    $listDate = createDateRangeArray($fromDate, $todate);

    $hasValidSelection = hasValidSelection($listDate);
    if ($hasValidSelection) {
        $errorleave = "<p style='color:red'>Please select proper range !!!</p>";
    }
    $mandLeave = 0;
    $mandType[] = array();
    $isWeekEnd = 0;

    foreach ($listDate as $value) {
        $sqlmandeotry = "SELECT *  FROM  `tbl_predefinedleave` where date_leave = '$value' ";
        $sqlmandetoryresult = MysqlConnection::fetchCustom($sqlmandeotry);
        foreach ($sqlmandetoryresult as $leaves) {
            if (!empty($leaves["name"])) {
                $mandType[] = $leaves;
            }
        }
        $mandLeave = $mandLeave + count($sqlmandetoryresult);
        if (isWeekend($value)) {
            $weekend = array();
            $weekend["date_leave"] = $value;
            $weekend["name"] = "Weekend";
            $weekend["description"] = "Weekend";
            $mandType[] = $weekend;
            $isWeekend++;
        }
    }
    $finalCounter = count($listDate) - ($mandLeave + $isWeekend);
}
if ($finalCounter > $balaneleave && $balaneleave != 0) {
    $errorleave = "<p style='color:red'>No of days applied exceed limit !!!</p>";
} else {
    $errorleave = "";
}

if (isset($_POST["submit"])) {
    unset($_POST["submit"]);
    $_POST["empId"] = $_SESSION["email"]["txtId"];
    $_POST["txtId"] = $nextId;
    MysqlConnection::edit("tbl_leavehistorynew", $_POST, $nextId);
    header("location:mainpage.php?requestPage=applystephq_apply&nextId=$nextId");
}

function isWeekend($date) {
    return (date('N', strtotime($date)) >= 6);
}
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function () {
        $("#fromdate").datepicker({dateFormat: 'yy-mm-dd', minDate: 0});
    });
    $(function () {
        $("#todate").datepicker({dateFormat: 'yy-mm-dd', minDate: 0});
        CalculateDiff('');
    });
</script>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-user"></i></span><h5 style="color: green">APPLY LEAVE - STEP 2</h5></div>
                <form class="form-horizontal" method="post" action="" name="" id="" novalidate="novalidate">
                    <div class="control-group" style="background-color: white;">
                        <div class="span11">
                            <div class="span11"  style="float: left">
                                <label class="control-group "><p style="color: red"><?php echo $error ?></p></label>
                            </div>
                        </div>
                        <div class="span11">
                            <div class="span12"  >
                                <label class="control-label ">FROM:</label>
                                <div class="controls">
                                    <div  data-date="12-02-2012" class="input-append date datepicker">
                                        <input type="text" name="fromdate" id="fromdate" value="<?php echo $fromDate ?>" maxlength="10" minlength="1" class="span12"   placeholder="yyyy-mm-dd" required="true"><span class="add-on"><i class="icon-th"></i></span>
                                    </div>
                                </div>
                                <label class="control-label ">TO:</label>
                                <div class="controls">
                                    <div  data-date="12-02-2012" class="input-append date datepicker">
                                        <input type="text" name="todate" id="todate" value="<?php echo $todate ?>"  onkeyup="" maxlength="10" minlength="1" class="span12"   placeholder="yyyy-mm-dd" required="true"><span class="add-on"><i class="icon-th"></i></span>
                                    </div>
                                </div>
                                <div class="span11"  style="float: left">

                                    <label class="control-group "><p style="color: red"><?php echo $error ?></p></label>
                                </div>
                                <div class="controls">
                                    <input type="submit" name="brnCheack" class="btn btn-success" value="Check For Availability" >
                                </div>
                                <?php
                                if (isset($_POST["brnCheack"])) {
                                    ?>
                                    <label class="control-label ">TOTAL DAYS:</label>
                                    <div class="controls">
                                        <input type="text" value="<?php echo count($listDate) ?>" readonly="true">
                                    </div>
                                    <label class="control-label ">NO OF HOLIDAY:</label>
                                    <div class="controls">
                                        <input type="text" value="<?php echo $mandLeave ?>" readonly="true"> 
                                    </div>
                                    <label class="control-label ">NO OF WEEK END:</label>
                                    <div class="controls">
                                        <input type="text"  value="<?php echo $isWeekend ?>" readonly="true">
                                    </div>


                                    <div class="container-fluid">
                                        <hr>
                                        <div class="row-fluid">
                                            <div class="span12">
                                                <div class="widget-box">
                                                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                                                        <h5> LEAVE LIST</h5>
                                                    </div>
                                                    <div class="widget-content nopadding">
                                                        <table class="table table-bordered data-table"  style="font-size: 11px;">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 2%;">#</th>
                                                                    <th>Date</th>
                                                                    <th>Type</th>
                                                                    <th>Description</th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $srno = 1;
                                                                $restricted = 0;
                                                                foreach ($mandType as $result) {
                                                                    if ($result["date_leave"] != "") {
                                                                        if (strtolower($result["name"]) == "restricted holiday") {
                                                                            $restricted++;
                                                                        }
                                                                        ?>
                                                                        <tr class="gradeX" style="background-color: white">
                                                                            <td style="color:MediumBlue "><?php echo $srno ?></td>
                                                                            <td style="color:MediumBlue "><?php echo $result["date_leave"] ?></td>
                                                                            <td style="color:DarkCyan "><?php echo $result["name"] ?></td>
                                                                            <td style="color:MediumBlue">
                                                                                <?php
                                                                                if ($result["leaveType"] == 1) {
                                                                                    echo $result["description"];
                                                                                } else {
                                                                                    echo findSaturdayOrSunday($result["date_leave"]);
                                                                                }
                                                                                ?>
                                                                            </td>

                                                                        </tr>  
                                                                        <?php
                                                                        $srno++;
                                                                    }
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <label class="control-label ">NO OF DAYS:</label>
                                    <div class="controls">
                                        <input type="text" name="no_days" id="no_days"  maxlength="10" minlength="1" class="span12" value="<?php echo $finalCounter ?>"  placeholder="" required="true" readonly="true">
                                    </div>

                                    <label class="control-label ">PURPOSE OF LEAVE:</label>
                                    <div class="controls">
                                        <textarea type="text" name="purpose"  maxlength="255" minlength="1" class="span12"   placeholder="" required="true"></textarea>
                                    </div>

                                    <center>
                                        <div class="form-actions right">

                                            <?php
                                            if ($errorleave != "") {
                                                echo $errorleave;
                                            } else {
                                                ?>
                                                <input type="hidden" name="restricted" class="btn btn-success" value="<?php echo $restricted ?>" >
                                                <input type="submit" name="submit" class="btn btn-success" value="NEXT" >
                                                <button type="reset" class="btn btn-primary">RESET</button>
                                                <a href="mainpage.php?requestPage=view_apply"><button type="button" class="btn btn-info">VIEW</button></a>
                                                <a href="mainpage.php?requestPage=view_apply"> <button type="button" class="btn btn-danger">CANCEL</button></a>
                                                <?php
                                            }
                                            ?>

                                        </div>
                                    </center>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php

function getCalculate() {
    $begin = new DateTime('2013-02-01');
    $end = new DateTime('2013-02-13');
    $daterange = new DatePeriod($begin, new DateInterval('P1D'), $end);
    foreach ($daterange as $date) {
        echo $date->format("Y-m-d") . "<br>";
    }
}

function findSaturdayOrSunday($date) {
    $weekDay = date('w', strtotime($date));
    if ($weekDay == 0) {
        return "Sunday";
    } else {
        return "Saturday";
    }
}

function createDateRangeArray($strDateFrom, $strDateTo) {
    $aryRange = array();
    $iDateFrom = mktime(1, 0, 0, substr($strDateFrom, 5, 2), substr($strDateFrom, 8, 2), substr($strDateFrom, 0, 4));
    $iDateTo = mktime(1, 0, 0, substr($strDateTo, 5, 2), substr($strDateTo, 8, 2), substr($strDateTo, 0, 4));
    if ($iDateTo >= $iDateFrom) {
        array_push($aryRange, date('Y-m-d', $iDateFrom)); // first entry
        while ($iDateFrom < $iDateTo) {
            $iDateFrom += 86400; // add 24 hours
            array_push($aryRange, date('Y-m-d', $iDateFrom));
        }
    }
    return $aryRange;
}

function hasValidSelection($listDate) {
    $userprimary = $_SESSION["email"]["txtId"];
    $inbetween = array();
    foreach ($listDate as $value) {
        array_push($inbetween, "'" . $value . "'");
    }
    $implod = implode(",", $inbetween);
    $sqlcustomfromdate = "SELECT `txtId` FROM `tbl_leavehistorynew` WHERE `fromdate` IN($implod) AND hasApprove = 'Y' AND empId = '$userprimary' ";
    $resultfromdate = MysqlConnection::fetchCustom($sqlcustomfromdate);
    $sqlcustomtodate = "SELECT `txtId` FROM `tbl_leavehistorynew` WHERE `todate` IN($implod)  AND hasApprove = 'Y'  AND empId = '$userprimary'";
    $resulttodate = MysqlConnection::fetchCustom($sqlcustomtodate);

    if (count($resultfromdate) == 0 && count($resulttodate)) {
        return FALSE;
    }
    return TRUE;
}

function getPreRestrictedLeaves() {
    $userprimary = $_SESSION["email"]["txtId"];
    $sqlrestricted = "SELECT SUM(`restricted`) `restricted` FROM `tbl_leavehistorynew` WHERE `empId` = $userprimary ";
    MysqlConnection::fetchCustom($sqlrestricted);
}
?>