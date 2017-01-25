<?php 
error_log(0);
session_start();
include './service/MySql.php';
include './service/UtilService.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head><?php include './header.php'; ?></head>
    <script>
        $("#success-btn").click(function() {
            $("div.success").fadeIn(300).delay(1500).fadeOut(400);
        });

        $("#failure-btn").click(function() {
            $("div.failure").fadeIn(300).delay(1500).fadeOut(400);
        });

        $("#warning-btn").click(function() {
            $("div.warning").fadeIn(300).delay(1500).fadeOut(400);
        });
        function isNumberKey(evt)
        {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            if (charCode != 46 && charCode > 31
                    && (charCode < 48 || charCode > 57))
                return false;

            return true;
        }
    </script>
    <style>
        *{
            font-family: verdana;
            text-transform: capitalize;
        }
    </style>
    <body>
        <div id="header"><h1><a href="index.jsp?requestPage=">CUSTOM</a></h1></div>
        <div id="user-nav" class="navbar navbar-inverse"><?php include './topnavigation.php'; ?></div>
        <div id="sidebar"><?php include './navigation.php'; ?></div>
        <div id="content">
            <div id="content-header">
                <div id="breadcrumb"> 
                    <a href="index.jsp?requestPage=" title="Dashboard" class="tip-bottom"><i class="icon-home"></i> HOME</a> 
                    <a href="#" class="current"></a> 
                    <a href="#" class="current">APPLYLEAVE USER</a> 
                </div>
            </div>
            <?php include ''.  UtilService::getIncludePage(filter_input(INPUT_GET, "requestPage")).".php" ; ?>
            </div>
            <div class="row-fluid"></div>
    </body>
</html>