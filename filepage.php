<br><br><br><br>


<center>

<table>
<?php
session_start();

$name=$_SESSION['realname'];
echo "<font size='8'color='#FF6600' face='Segoe UI'>Welcome </font><font face='Segoe UI' size='8' color='#0099FF'>$name </font><br><br>";
$path=$_SESSION['username'];
 
?>

</table>
<center>

<br><br>
<font size='4'color='#CC3366' face='Segoe UI'>
Create a New File</font>
<form name="del" action ="del.php" method="post">
<input type="hidden" name="delbox" id="delbox"/>
</form>
<form name="createform" action ="create.php" method="post">
<input type="text" name="file" id="file" />
<input type="submit" name="createfile" value="Create File" id="create" />
</form>
<form name="list" action = "home.php" method="post">
<br>
<input type="hidden" name="filetoedit" id="filetoedit"/>
<font size='4'color='#CC3366' face='Segoe UI'>
Use Already Exist Files</font><br><br>
<?php
if ($handle = opendir($path)) {
   while (false !== ($file = readdir($handle)))
      {
	  $f=$file;
	
$length = strlen($f);
$characters = 3;
$start = $length - $characters;
$f = substr($f , $start ,$characters);
	  if($f != "exe")
          if ($file != "." && $file != "..")
	  {
          	echo '<tr><td><input type="button" value="Load '.$file.'" onclick="document.list.filetoedit.value=this.value.substr(5);document.list.submit();"><input type="button" value="Delete '.$file.'" onclick="document.del.delbox.value=this.value.substr(7);document.del.submit();"><br></input>';
          }
       }
  closedir($handle);
  }
?>



</form>
</div>
<style>
#file
{
background-color:white;
border-style:solid;
border-width:1px;
border-color:#CC3366;
}
</style>