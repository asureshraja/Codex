<html>
<center><br><br>
<font size='5'color='#FF6600' face='Segoe UI'>OUTPUT</font><br><br>
<?php 
session_start();


$input=$_SESSION['username']."\\"."input.txt";
$fp = fopen($input, 'w+');
fwrite($fp,$_POST['inputs']);
fclose($fp);



if($_POST['lang']=="c")
{
$filename=$_SESSION['username']."\\".$_POST['filename'].".".$_POST['lang'];
$exename=$_SESSION['username']."\\".$_POST['filename'].".exe";

//file writing ////////////////////////////////////////////////////////////////////
$fhw = fopen($filename,"w+");
fwrite($fhw,$_POST["codepad"]);
fclose($fhw);
//file writing completed //////////////////////////////////////////////////////////

//file compilation started /////////////////////////////////////////////////////

$compilationstring="MinGW\bin\gcc.exe ".$filename." -o ". $exename ." 2>&1";
echo('<textarea rows="10" cols="40"  disabled="disabled">');
$result=exec($compilationstring); 
if($result=="")
{

$pgmcmd = $exename." < ".$input;
echo exec($pgmcmd);
}
else
{
echo $result;
}
echo('</textarea>');
//file compilation and running finished//////////////////////////////////////////////
}
else if ($_POST['lang']=="cpp")
{
$filename=$_SESSION['username']."\\".$_POST['filename'].".".$_POST['lang'];
$exename=$_SESSION['username']."\\".$_POST['filename'].".exe";


//file writing ////////////////////////////////////////////////////////////////////
$fhw = fopen($filename,"w+");
fwrite($fhw,$_POST["codepad"]);
fclose($fhw);
//file writing completed //////////////////////////////////////////////////////////

//file compilation started /////////////////////////////////////////////////////

$compilationstring="MinGW\bin\g++.exe ".$filename." -o ". $exename ." 2>&1";
echo('<textarea rows="10" cols="40"   disabled="disabled">');
$result=exec($compilationstring); 
if($result=="")
{

$pgmcmd = $exename." < ".$input;
echo exec($pgmcmd);
}
else
{
echo $result;
}
echo('</textarea>');
//file compilation and running finished//////////////////////////////////////////////
}
///////////////////////////////////////////////////////////////////////////////////////
else if($_POST['lang']=="java")
{
$filename=$_SESSION['username']."\\".$_POST['filename'].".".$_POST['lang'];
$exename="jdk1.7.0\bin\java -cp ".$_SESSION['username']."\\ ".$_POST['filename'];

//file writing ////////////////////////////////////////////////////////////////////
$fhw = fopen($filename,"w+");
fwrite($fhw,$_POST["codepad"]);
fclose($fhw);
//file writing completed //////////////////////////////////////////////////////////

//file compilation started /////////////////////////////////////////////////////

$compilationstring="jdk1.7.0\bin\javac ".$filename." 2>&1";
//echo $compilationstring;
 $nooferrors="";
echo('<textarea rows="10" cols="40"  disabled="disabled">');
$phc = popen($compilationstring,'r');
do
{
 $nooferrors = $nooferrors + 1;
 $err = fgets($phc);
 echo $err;
 echo "\n";
}while($err!="");
pclose($phc);
if($nooferrors-1 == 0)
{

$pgmcmd = $exename." < ".$input;
echo exec($pgmcmd);
}



echo('</textarea>');
//file compilation and running finished//////////////////////////////////////////////
}

?>
<?php
$parts = explode("\\",$filename);
$fn = end($parts);
?>
<form name="backform" action="home.php" id="backform" method="post">
<input type="hidden" name="filetoedit" id="filetoedit" value="<?php echo $fn; ?>"/>
<textarea cols="20" rows="20" style="display:none;" name="inputs">
<?php  
if(isset($_POST['inputs']))
echo $_POST['inputs'];
?>
</textarea>
<br>
<br>
</form>
<a href="javascript:document.backform.submit()" target="_blank"> 
  <img src="back.gif" border="0" />
</a>
<a href="filepage.php"> 
  <img src="file.png" border="0" />
</a>

</html>