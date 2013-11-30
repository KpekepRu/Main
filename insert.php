<?PHP
$host="localhost";
$user="root";
$password="";
$link=@mysql_connect($host, $user, $password);

	$n1=$_POST["f1"];
	$n2=$_POST["f2"];
	$n3=$_POST["f3"];
	$n4=$_POST["f4"];

mysql_select_db("studlist") or die(mysql_error());
$result=mysql_query("SELECT * FROM students WHERE StudName1='$n1' and StudName2='$n2'");

if($n1!='' and $n2!='' and $n3!='' and $n4!=''){
  if(!($row=mysql_fetch_assoc($result)))
    {
	$strSQL="INSERT INTO students(StudName1,StudName2,Course,Rating) VALUES('$n1','$n2','$n3','$n4')";
	mysql_query($strSQL) or die(mysql_error());
	echo '<script type="text/javascript">window.location="main.php?sort=name1"</script>';
	}
	else
	{
	echo $n1.' '.$n2.' is already in the table';
	echo '</br>';
	echo '<a href="http://localhost/main.php?sort=name1">Main page</a>';
	}
}
else{
	echo 'One or more fields were empty';
	echo '</br>';
	echo '<a href="http://localhost/main.php?sort=name1">Main page</a>';
}
?>
