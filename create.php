<center><br><br><br><br>
<?php
session_start();

$fname = $_SESSION['username']."\\".$_POST['file'];

echo "<font size='5' color='#FF6600'>$fname </font><br>";
$fhandle = fopen($fname, 'w');

fclose($fhandle);

?>
<a href="filepage.php"> 
  <img src="back.gif" border="0" />
</a>