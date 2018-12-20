<?php
session_start();
Header('Content-type: text/xml');
@include('../database.php');
if(isset($_SESSION['username'])) {
if(isset($_POST['msg']) && $_POST['msg']!='') {
$un=$_SESSION['username'];
$msg=$_POST['msg'];
$dept=$_SESSION['dept'];
$role=$_SESSION['role'];
$query="INSERT INTO chat VALUES ('','$un','$msg','$dept','$role')";
mysql_query($query);
echo'<?xml version="1.0" encoding="ISO-8859-1"?>
<success>Messege Sent</success>
';
}
else {
echo'<?xml version="1.0" encoding="ISO-8859-1"?>
<success>Blank Messege cannot be sent</success>
';
}
}
else {
echo'<?xml version="1.0" encoding="ISO-8859-1"?>
<success>you must login</success>
';
}
?>