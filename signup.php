<?php
$conn=odbc_connect('onlinecodingsystem','','');
error_reporting(E_ALL & ~E_NOTICE);
$sql="INSERT INTO main VALUES ('".$_POST['newusrnam']."','".$_POST['newrealname']."','".$_POST['newemail']."','".$_POST['newpass']."')";
$rs=odbc_exec($conn,$sql);
odbc_close($conn);
mkdir($_POST['newusrnam'], 0700);
echo "your registration completed successfully login with your username and password";
?>