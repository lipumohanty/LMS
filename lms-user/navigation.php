<?php
//session_start();

$empId = $_SESSION["email"]["txtId"];
$empname = $_SESSION["email"]["name"];
error_reporting(0);
MysqlConnection::connect();

?>
<ul>
    <li class=""><a href="mainpage.php?requestPage=dashboard"><i class="icon-dashboard"></i> <span>DASHBOARD</span></a> </li>
    <li class=""> <a href="mainpage.php?requestPage=userreg_apply&txtId=<?php echo $empId ?>"><i class="icon icon-sign-blank"></i> <span>PARTICULARS OF OFFICERS</span></a></li> 
    <li class=""> <a href="mainpage.php?requestPage=applystep1_apply&type=casual_leave"><i class="icon icon-sign-blank"></i> <span>APPLY CASUAL LEAVE</span></a></li>
     <li class=""> <a href="mainpage.php?requestPage=history_apply&empId=<?php echo $empId ?>"><i class="icon icon-sign-blank"></i> <span>LEAVE HISTORY</span></a></li>
    <li  class=""> <a href="mainpage.php?requestPage=session_logout"><i class="icon icon-signout"></i> <span>LOGOUT</span></a></li>
</ul>