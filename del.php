<center><br><br><br><br>
<?php
session_start();
unlink($_SESSION['username']."\\".$_POST['delbox']);
echo "<font size='5' color='#FF6600'>The File is Deleted </font><br>";
?>
<a href="filepage.php"> 
  <img src="back.gif" border="0" />
</a>