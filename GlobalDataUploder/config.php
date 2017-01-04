<?php
  $conn=mysql_connect('localhost','root','');
  if($conn)
{
  mysql_select_db('db_leave',$conn);
  //echo "connected successfully";
}else
{
  die("database not connected".mysql_error());
}

?>