<html>
<center>
<?php
session_start();

$name=$_SESSION['realname'];
echo "<font size='8'color='#FF6600' face='Segoe UI'>welcome </font><font face='Segoe UI' size='8' color='#0099FF'>$name </font><br>";
$filename = $_POST['filetoedit'];
 $part= explode(".",$filename);
$withoutExt = $part[0];
?><font size='5'color='#FF6600' face='Segoe UI'>CODE</font>
<form name="code" action="process.php" method="post" id="code">
<textarea rows="18" cols="70" name = "codepad" id="codepad">
<?php 
$myFile=$_SESSION['username']."\\".$_POST['filetoedit'];
$fh = fopen($myFile, 'r');
$theData = fread($fh, 10000);
fclose($fh);
echo $theData;

?>
</textarea>
<br>
<font size='5'color='#FF6600' face='Segoe UI'>
Enter Inputs<br></font><textarea rows="3" cols="20" name = "inputs" id="inputs">
<?php 
if(isset($_POST['inputs']))
echo $_POST['inputs'];
?>
</textarea><br><br>
<font size='4' color='#FF6600'>
Select Language:</font><input type = "hidden" name = "filename" value ="<?php echo $withoutExt ?>"/>
<select name="lang">
  <option value="c">c</option>
  <option value="cpp">cpp</option>
  <option value="java">java</option>
</select>
<input type="submit" value="compile and run"/>
</form>
</center>
<a href="filepage.php"> 
  <img src="back.gif" border="0" />
</a>
</html>
<style>
#codepad,#inputs
{
background-color:white;
border-style:solid;
border-width:1px;
border-color:#CC3366;
}
</style>
