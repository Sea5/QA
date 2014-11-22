<html>
<head></head>
<body>
<meta charset="UTF-8" />
<?php
$text=$_POST["type"];
$con = mysql_connect("localhost","root","");
mysql_select_db("ques",$con);
echo $text;
if($text=="a")
{
	$x=1;
	$query = "SELECT * FROM ques WHERE author='$_COOKIE[user]' and qname='$_POST[Cho_nam]'";
	$result = mysql_query($query);
	$row = mysql_num_rows($result);
	if($row==0)
	{
		mysql_query("INSERT INTO ques (author, qname, qtype, Ades, Bdes, Cdes, Ddes, cho_ans)
		VALUES ('$_COOKIE[user]','$_POST[Cho_nam]','$x','$_POST[Ades]','$_POST[Bdes]','$_POST[Cdes]','$_POST[Ddes]','$_POST[choice]')");
		?>
		<script>
		function JumpUrl(){
			location='mylist.php';
		}
		document.write("Successful submit!");
		setTimeout('JumpUrl()',2000);
		</script>
		<?php
		exit;
	}
	
	
}
elseif($text=="b")
{
//	mysql_query("INSERT INTO $Listname (
}
elseif($text=="c")
{

}
else
{
}
?>
</body>
</html>