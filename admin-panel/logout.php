<?php
@include('../database.php');
session_start();
if(isset($_SESSION['username'])) {
$un=$_SESSION['username'];
$resultss = @mysql_query("SELECT * FROM online WHERE username='$un'");
if ( @mysql_num_rows($resultss) > 0 ) {
while($admins = @mysql_fetch_array($resultss)) {
$id=$admins['id'];
@mysql_query("DELETE FROM online WHERE id='$id'");
}
}
session_destroy();
header("Location: index.php");
} else {
header("Location: index.php");
}
?>