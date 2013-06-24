<?php
$conn=odbc_connect('onlinecodingsystem','','');
$val1=$_POST['userid'];
$val2=$_POST['pass'];
$sql="SELECT * FROM main where username='$val1' and password='$val2'";
$rs=odbc_exec($conn,$sql);
$name="";
$name=odbc_result($rs,"realname");
if($name=="")
{
echo "wrong passowrd";
}
else
{
$name=odbc_result($rs,realname);
odbc_close($conn);
session_start();
$_SESSION['username']=$_POST['userid'];
$_SESSION['password']=$_POST['pass'];
$_SESSION['realname']=$name;
header('Location:filepage.php');
}
?>