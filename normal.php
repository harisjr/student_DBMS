<?php
/*mysql_connect("localhost","root","") or die("cannnot connect");
mysql_select_db("db_student") or die("cannot connect");  
*/
?>

<?php
$dbhost="localhost";
$dbname="db_student";
$dbuser="root";
$dbpass="";

try {
 $db=new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbuser,$dbpass);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 	
  } catch (PDOException$e) {
  	echo "connection error".$e->getmessage();
  	
  }  ?>