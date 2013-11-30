<?PHP
$host="localhost";
$user="root";
$password="";
$link=@mysql_connect($host, $user, $password);

mysql_select_db("studlist") or die(mysql_error());

	$strSQL="DELETE FROM students";
	mysql_query($strSQL) or die(mysql_error());
	echo '<script type="text/javascript">window.location="main.php?sort=name1"</script>';

?>
