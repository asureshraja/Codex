<?php
$conn=odbc_connect('onlinecodingsystem','','');
$val1=$_GET['userid'];
$sql="SELECT * FROM main where username='$val1'";
$rs=odbc_exec($conn,$sql);
$name="";
$name=odbc_result($rs,"realname");
if($name=="")
{
echo "available";
}
else
echo "not available";
?>