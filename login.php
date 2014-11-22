<html>
<head><title>Submitting...</title></head>
<body>
<?php
$login = $_POST['login'];
$id = $_POST['id'];
$id = trim($id);
$pswd = $_POST['pswd'];
if(!$id)
{
	echo 'You have not entered details.';
	exit;
}
setcookie("user","$id",time()+3600);
/*$con = mysql_connect("localhost","root","");
mysql_select_db("test",$con);
$query = "SELECT * FROM customer WHERE ID='$id' and PASSWORD='$pswd'";
$result = mysql_query($query);
$row = mysql_num_rows($result);

if($row==0)
{
	?>
    <script>
     var pgo=0;
     function JumpUrl(){
     	location='Login.php';
	 }
	 document.write("Login failed!");
	 setTimeout('JumpUrl()',2000);
    </script>
    <?php
	exit;
}*/
if($login == 'a')
{
	?>
    <script>
     var pgo=0;
     function JumpUrl(){
     	location='establishmylist.php';
	 }
	 document.write("Successful login!");
	 setTimeout('JumpUrl()',2000);
    </script>
    <?php
	exit;
}
elseif($login == 'b')
 	echo '<p>..</p>';
else
	exit;
mysql_close($con);
?>
</body>
</html>