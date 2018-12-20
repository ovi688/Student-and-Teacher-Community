<?php
//install 
function xenon_install()
{
ob_start();
require('database.php');
$result = @mysql_query("SELECT * FROM option_cms");
ob_clean();
if(!$result) {

if (isset($_GET['install']) && $_GET['install'] == "frndzk" )
{


if (isset($_REQUEST['server']) && isset($_REQUEST['dbname']) && isset($_REQUEST['dbuname']) && isset($_REQUEST['pass']))
{

$server=$_REQUEST['server'];
$dbname=$_REQUEST['dbname'];
$dbuname=$_REQUEST['dbuname'];
$dbpass=$_REQUEST['pass'];


$l="fzk";
$lol="<?php
$$l = @mysql_connect(\"$server\",\"$dbuname\",\"$dbpass\");
if (!$$l)
  {
  echo'frndzk cms Could not connect';
  }
@mysql_query('SET CHARACTER SET utf8');
@mysql_query(\"SET SESSION collation_connection ='utf8_general_ci'\");
if (!@mysql_select_db(\"$dbname\",$$l)) {
echo'frndzk cms Could not connect to database error type';
}
?>";
$bitto = "database.php";
$fh = fopen($bitto, 'w') or die("can't open file");
$stringData = "$lol";
fwrite($fh, $stringData);
fclose($fh);



require('database.php');





ob_start();
$result = @mysql_query("SELECT * FROM option_cms");
ob_clean();
if(!$result) {


// creat table


$query="CREATE TABLE option_cms (id int(255) NOT NULL auto_increment,name varchar(1000),PRIMARY KEY (id),UNIQUE id (id),KEY id_2 (id))";
@mysql_query($query);
$query="CREATE TABLE login (id int(255) NOT NULL auto_increment,username varchar(10000),password varchar(10000),email varchar(10000),department varchar(10000),designation varchar(10000),name varchar(10000),PRIMARY KEY (id),UNIQUE id (id),KEY id_2 (id))";
@mysql_query($query);
$query="CREATE TABLE chat (id int(255) NOT NULL auto_increment,un varchar(10000),msg varchar(10000),dept varchar(10000),role varchar(10000),PRIMARY KEY (id),UNIQUE id (id),KEY id_2 (id))";
@mysql_query($query);
$query="CREATE TABLE notice (id int(255) NOT NULL auto_increment,username varchar(10000),title varchar(10000),notice varchar(10000),department varchar(10000),PRIMARY KEY (id),UNIQUE id (id),KEY id_2 (id))";
@mysql_query($query);
$query="CREATE TABLE online (id int(255) NOT NULL auto_increment,username varchar(10000),start varchar(10000),end varchar(10000),dept varchar(10000),role varchar(10000),PRIMARY KEY (id),UNIQUE id (id),KEY id_2 (id))";
@mysql_query($query);



$query="INSERT INTO option_cms VALUES ('','BK')";
@mysql_query($query);





$result = @mysql_query("SELECT * FROM option_cms");
if($result) {
echo "<html><head><title>Installetion</title></head><body><center>Installed SuccessFully</body></html>";
}
else
{
exit;
}
}
else
{
echo "<html><head><title>Installetion</title></head><body><center><h3>Already installed on the database.</h3></body></html>";
}

}

else {
echo"<html><head><title>Installetion</title></head><body><center><h2>Please Give All Information To Run The Installetion Proccess</h2></body></html>";
}

}
else
{








echo'
<html> 
<head> 
<title>Installetion</title> 
</head><body> 
<center> 
<script type="text/javascript"> 
function validateForm() 
{ 
var y=document.forms["frndzk"]["server"].value; 
var r = y.length; 
if (r<1) 
  { 
  alert("Database Server field empty"); 
  return false; 
  } 
var x=document.forms["frndzk"]["email"].value; 
var atpos=x.indexOf("@"); 
var dotpos=x.lastIndexOf("."); 
if (atpos<3 || dotpos<atpos+3 || dotpos+2>=x.length) 
  { 
  alert("Not a valid e-mail address"); 
  return false; 
  } 
var d=document.forms["frndzk"]["pw"].value; 
var g = d.length; 
if (g<6) 
  { 
  alert("password must be more than 5 charecters"); 
  return false; 
  }
var e=document.forms["frndzk"]["un"].value; 
var f = e.length; 
if (f<5) 
  { 
  alert("username must be more than 4 charecters"); 
  return false; 
  } 
} 
</script> 
<h3>Installetion</h3> 
<h3>Database Information</h3> 
<form name="frndzk" action="install.php?install=frndzk" onsubmit="return validateForm()"  method="post"> 
Database Server: <input type="text" name="server" /></br> 
Database Username: <input type="text" name="dbuname" /></br> 
&nbsp Database name: <input type="text" name="dbname" /></br> 
&nbsp Database password: <input type="password" name="pass" /></br>
<input type="submit" value="Install"/></form> 
</center></body></html>';
}

}
else
{
echo"<html><head><title>Installer</title></head><body><center><h2>No hunky punky baby. The installetion process is locked.</h2></body></html>";
}
}
xenon_install();
?>