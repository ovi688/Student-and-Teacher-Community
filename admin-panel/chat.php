<?php
session_start();
@include('../database.php');
if(isset($_SESSION['username'])) {
$un=$_SESSION['username'];
$dept=$_SESSION['dept'];
$result = @mysql_query("SELECT * FROM chat WHERE dept='$dept' ORDER by id DESC LIMIT 0,20");
if ( @mysql_num_rows($result) > 0 ) {
Header('Content-type: text/xml');
echo'<?xml version="1.0" encoding="ISO-8859-1"?>
<channel>';
while($pages = @mysql_fetch_array($result)) {
if ($pages['role']==1) { $r="TEACHER"; }
else if($pages['role']==0) { $r="STUDENT"; }
$name=$pages['un'];
$resultw = @mysql_query("SELECT * FROM login WHERE username = '$name'");
if ( @mysql_num_rows($resultw) > 0 ) {
while($userw = @mysql_fetch_array($resultw)) {
$name=$userw['name'];
}
}
echo'<item>
<id>'.$pages['id'].'</id>
<un>[ '.$r.' ]['.$pages['un'].'] '.$name.'</un>
<msg>'.$pages['msg'].'</msg>
</item>';
}
echo '</channel>';
}
else {
echo'empty';
}
mysql_free_result($result);
}
else {

}
?>