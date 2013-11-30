<?PHP
include 'lib/Twig/Autoloader.php';
Twig_Autoloader::register();

$host="localhost";
$user="root";
$password="";
$link=@mysql_connect($host, $user, $password);

mysql_select_db("studlist") or die(mysql_error());

$dbh=new PDO('mysql:dbname=studlist;host=localhost', 'root', '');
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sort=$_GET["sort"];

try{
$sql="select students.StudName1 as name1, students.StudName2 as name2, students.Course as course, students.Rating as rating FROM students
ORDER by $sort";

$sth=$dbh->query($sql);
  while($row=$sth->fetchObject()){
    $data[]=$row;
}
  
  unset($dbh);
  
$loader=new Twig_Loader_Filesystem('templates');
$twig=new Twig_Environment($loader);
  
 
if($_POST['mode2'])
$template=$twig->loadTemplate('design2.tmpl');
else
if($_POST['mode1'])
$template=$twig->loadTemplate('design1.tmpl');
else
$template=$twig->loadTemplate('design0.tmpl');
  
	echo $template->render(array('data'=>$data));
} 
catch(Exception $e){die('ERROR: '.$e->getMessage());}
?>
