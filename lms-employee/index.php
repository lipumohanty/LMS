<?php
session_start();
ob_start();
error_reporting(0);
include './service/MySql.php';
include './service/UtilService.php';
if (isset($_POST["submit"])) {
    unset($_POST["submit"]);

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sqlSelect = "SELECT * FROM tbl_employee WHERE username='" . $username . "' and password= '" . $password . "' ";
    $result = MysqlConnection::fetchCustom($sqlSelect);

    if (count($result) != 0) {
        $login = $result[0];
        $_SESSION["loginuser"] = $login;
        $user_type = $login["type"];
        if ($user_type == 2) {
            header("location:mainpage.php?requestPage=");
        } 
    } else {
        $message = "error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>National Highways Authority of India</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/matrix-login.css" />
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    </head>
    <body>
        <div id="loginbox"> 
            <p style="color: red"><?php echo $message ?></p>
            <form id="loginform" class="form-vertical" method="post"  name="frmLogin">
                <div class="control-group normal_text"> <h3><img style="width:500px" src="img/logo_dash.jpg" alt="Logo" /></h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"></i></span><input type="text" name="username" autofocus="" maxlength="30px;" placeholder="Username" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="password" placeholder="Password" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span>
                    <span class="pull-right">
                        <input type="submit" value="Login" name="submit" class="flip-link btn btn-info">

                    </span>
                </div>
            </form>
        </div>
        <script src="js/jquery.min.js"></script>  
        <script src="js/matrix.login.js"></script> 
    </body>

</html>
