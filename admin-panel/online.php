<?php
include('../database.php');
@session_start();
if(isset($_SESSION['username'])) {

$un=$_SESSION['username'];
$dept=$_SESSION['dept'];
$role=$_SESSION['role'];



$resultss = @mysql_query("SELECT * FROM online
WHERE username = '$un'");
if ( @mysql_num_rows($resultss) > 0 ) {
$currenttime=strtotime("now");
$endtime=$currenttime+300;
$query="UPDATE online SET start = '$currenttime'  
WHERE username = '$un'";
@mysql_query($query);
$query="UPDATE online SET end = '$endtime'  
WHERE username = '$un'";
@mysql_query($query);
}
else {
$username=$_SESSION['username'];
$dept=$_SESSION['dept'];
$role=$_SESSION['role'];
$currenttime=strtotime("now");
$endtime=$currenttime+300;
$query="INSERT INTO online VALUES ('','$username','$currenttime','$endtime','$dept','$role')";     
@mysql_query($query);
}

$resultss = @mysql_query("SELECT * FROM online");
if ( @mysql_num_rows($resultss) > 0 ) {
while($admins = @mysql_fetch_array($resultss)) {
if($admins['end']<strtotime("now")) {
$id=$admins['id'];
@mysql_query("DELETE FROM online WHERE id='$id'");
}
}
}


$idd=1;
$resultss = @mysql_query("SELECT * FROM online WHERE dept='$dept'");
if ( @mysql_num_rows($resultss) > 0 ) {
echo'<h4>User online</h4>';
while($admins = @mysql_fetch_array($resultss)) {
if ($admins['role']==1) { $r="TEACHER"; }
else if($admins['role']==0) { $r="STUDENT"; }
$name=$admins['username'];
$resultw = @mysql_query("SELECT * FROM login WHERE username = '$name'");
if ( @mysql_num_rows($resultw) > 0 ) {
while($userw = @mysql_fetch_array($resultw)) {
$name=$userw['name'];
}
}
echo $idd.' [ '.$r.' ][<font color="orange">'.$admins['username'].'</font>] <font color="green">'.$name.'</font><br>';
$idd++;
}
$idd=1;
}
else {
echo'noone';
}













}
else {

}
?>