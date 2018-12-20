<?php
include('../database.php');
ob_start();
$ok='';
@session_start();
if(isset($_SESSION['username'])) {
header('Location: index.php');
}
else {
if(isset($_GET['action']) && $_GET['action']=='login') {
if (isset($_POST['username'])) {
if (isset($_POST['password'])) {
$usernamess=$_POST['username'];
$usernamess = stripslashes($usernamess);
$lsdr=$_POST['password'];
$lsdr = stripslashes($lsdr);
$usernames=@mysql_real_escape_string($usernamess);
$lsd=@mysql_real_escape_string($lsdr);
$passwords=md5($lsd);
$result = @mysql_query("SELECT * FROM login WHERE username = '$usernames' AND password='$passwords'");
if ( @mysql_num_rows($result) > 0 ) {
while($user = @mysql_fetch_array($result)) {
$_SESSION['username']=$user['username'];
$_SESSION['role']=$user['designation'];
$_SESSION['dept']=$user['department'];
header('Location: index.php');
}
}
else {   
$ok='USERNAME OR PASSWORD DO NOT MATCH';
echo $ok;
}
}
}
}
else {
echo'
<center>
<h1>Login</h1>
<form method="POST" action="login.php?action=login">
<p>'; echo $ok; echo'</p>
                            <p>
                                  <label>Name: <input type="text" id="name" name="username" maxlength="30" /></label></br>
							      <label>Password:<input type="password" id="pass" name="password" maxlength="20" ></label></br>
                            </p>
							<p><input type="submit" value="Login" name="submit"></p>
</form>
</center>
';
}
}
ob_flush();
?>