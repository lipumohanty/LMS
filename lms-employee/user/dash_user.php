<?php 
//session_start();
error_reporting(0);

echo "<pre>";
print_r($_SESSION["login"]);
echo "</pre>";
?>

<h3>
    Welcome <?php echo $_SESSION["login"]["username"]?>
</h3>