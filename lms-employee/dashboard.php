
<?php 
//session_start();
error_reporting(0);

?>

<h4>
    <i class="icon-user"></i> Welcome  <?php echo $_SESSION["login"]["name_user"]?>
</h4>
<div class="container-fluid">
    <div class="row-fluid">
        <ul class="quick-actions">
            <li class="bg_lb"> <a href="mainpage.php?requestPage=leave_apply"> <i class="icon-globe"></i>CASUAL LEAVES</a></li>
            <li class="bg_lg"> <a href="mainpage.php?requestPage=leave_apply"> <i class="icon-globe"></i>EARNED LEAVES</a> </li>
            <li class="bg_ly"> <a href="mainpage.php?requestPage=leave_apply"> <i class="icon-globe"></i>LEAVE1</a></li>
            <li class="bg_lo"> <a href="mainpage.php?requestPage=leave_apply"> <i class="icon-globe"></i>LEAVE2</a></li>
            <li class="bg_lb"> <a href="mainpage.php?requestPage=leave_apply"> <i class="icon-globe"></i>LEAVE3</a></li>
            <li class="bg_lg"> <a href="mainpage.php?requestPage=leave_apply"> <i class="icon-globe"></i>COMMUTED LEAVES</a></li>
            <li class="bg_ly"> <a href="mainpage.php?requestPage=leave_apply"> <i class="icon-globe"></i>HALFPAY LEAVES</a></li>
            <li class="bg_lo"> <a href="mainpage.php?requestPage=leave_apply"> <i class="icon-globe"></i>SPECIAL LEAVES</a></li>
            <li class="bg_lb"> <a href="mainpage.php?requestPage=leave_apply"> <i class="icon-globe"></i>LEAVING HEADQUARTER</a></li>
            <li class="bg_lg"> <a href="mainpage.php?requestPage=view_apply"> <i class="icon-globe"></i>MANDATORY LEAVES</a></li>
        </ul>
    </div>
    <div class="row-fluid">
        <div class="span6">
            <div class="widget-box">
                <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i class="icon-chevron-down"></i></span>
                    <h5>LAST 5 ORDERS</h5>
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
                            <button class="btn btn-warning btn-mini"><a href="">VIEW ALL</a> </button>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="span6">
            <div class="widget-box">
                <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG1"><span class="icon"><i class="icon-chevron-down"></i></span>
                    <h5>LAST 5 QUOTATION</h5>
                </div>
                <div class="widget-content nopadding collapse in" id="collapseG1">
                    <c:forEach var="quotation" items="${pageScope.tblOrder}"> 
                        <div class="new-update clearfix"> 
                            <i class="icon-gift"></i> 
                            <span class="update-notice"> 
                                <a title="" href="#">
                                     
                                </a> 
                            </span> 
                        </div>
                    </c:forEach>    
                    <div class="new-update clearfix">
                        <button class="btn btn-warning btn-mini">
                            <a href="">VIEW ALL</a> 
                        </button>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>