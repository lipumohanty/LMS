
<?php
//session_start();
$empId = $_SESSION["email"]["txtId"];
error_reporting(E_ALL);
MysqlConnection::connect();
$resource = MysqlConnection::fetchAll("tbl_predefinedleave");
 $earnedcounter  = calculateEarnedleave($empId, "earned_leave");
 $casualcounter = calculateCasualeave($empId, "casual_leave");
?>

<!--<h3>
    Welcome <?php echo $_SESSION["email"]["fname"] ?>
</h3>-->
<div class="container-fluid">
    <div class="row-fluid">
        <ul class="quick-actions">
            <li class="bg_lb">  <a href="index.php"> <i class="icon-dashboard"></i> My Dashboard </a> </li>
            <li class="bg_lg"> <a href="mainpage.php?requestPage=leave_apply&type=casual_leave"  > <i class="icon-th-large"></i> <span class="label label-important"><?php echo $casualcounter ?></span>Casual Leave</a></li>
            <li class="bg_ly"> <a href="mainpage.php?requestPage=leave_apply&type=earned_leave" > <i class=" icon-th-large"></i> <span class="label label-important"><?php echo $earnedcounter ?></span> Earned Leave </a> </li>
            <li class="bg_lo"> <a href="#"> <i class="icon-group"></i> Users Manager</a> </li>
            <li class="bg_ls"> <a href="#"> <i class="icon-ok"></i>Account Manager</a> </li>
            <li class="bg_ls"> <a href="#"> <i class="icon-signal"></i>Reports Manager</a> </li>
        </ul>
    </div>
    <div class="row-fluid">
        <div class="span6">
            <div class="widget-box">
                <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i class="icon-chevron-down"></i></span>
                    <h5>LAST 5 REQUEST</h5>
                </div>
                <div class="widget-content nopadding collapse in" id="collapseG2">
                    <ul class="recent-posts">
                        <c:forEach var="order" items="${pageScope.tblOrder}"> 
                            <li>
                                <div class="article-post">
                                    <span class="user-info"><c:out value="${order.requestdate}"/></span>
                                    <p></p>
                                </div>
                            </li>
                        </c:forEach>    
                        <li>
                            <button class="btn btn-warning btn-mini"><a href="../<%=IServletConstant.PAGE_VIEW_ORDER %>">VIEW ALL</a> </button>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="span6">
            <div class="widget-box">
                <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG1"><span class="icon"><i class="icon-chevron-down"></i></span>
                    <h5>LAST 5 UPDATES </h5>
                </div>
                <div class="widget-content nopadding collapse in" id="collapseG1">
                    <table class="table table-bordered data-table" style="font-size: 11px;">
                        <thead>
                           
                        </thead>
                        <tbody>

                           
                        </tbody>
                    </table>  
                    <div class="new-update clearfix">
                        <button class="btn btn-warning btn-mini">
                            <a href="index.jsp?requestPage=view_quotation">VIEW ALL</a> 
                        </button>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>

<?php

function calculateEarnedleave($empId,$type) {
    $sql = "SELECT SUM( `approved_leave` ) AS balance FROM `tbl_applyleave` WHERE `empId` = $empId AND `leave_type` = '$type'";
    $fectch = MysqlConnection::fetchCustom($sql);
    return $fectch[0]["balance"];
}

function calculateCasualeave($empId,$type) {
    $sql = "SELECT SUM( `approved_leave` ) AS balance FROM `tbl_applyleave` WHERE `empId` = $empId AND `leave_type` = '$type'";
    $fectch = MysqlConnection::fetchCustom($sql);
    return $fectch[0]["balance"];
}

?>