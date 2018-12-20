<?php

$ok='';
include('../database.php');
@session_start();
if(isset($_SESSION['username'])) {


if(isset($_SESSION['role']) && $_SESSION['role']==1) {

if(isset($_GET['action']) && $_GET['action']=='viewnotice') {
echo '
<center>
<h1>Notice</h1>';
$username=$_SESSION['username'];
$dept=$_SESSION['dept'];
$result = @mysql_query("SELECT * FROM notice WHERE username = '$username' AND department='$dept' ORDER by id DESC LIMIT 0,30");
if ( @mysql_num_rows($result) > 0 ) {
echo '<style>
.edit-table
{
border:1px solid black;
margin-left:10px;
}
</style>
';
echo'<table class="edit-table" style="width:600px;">';
while($notice = @mysql_fetch_array($result)) {
echo '<tr class="edit-table"><td class="edit-table">'.$notice['title'].'</td>';
echo '<td class="edit-table">'.$notice['notice'].'</td>';
echo '<td class="edit-table"><a href="?action=delete&id='.$notice['id'].'">Delete</a></td></tr>';
}
echo'</table>';
}
}


elseif(isset($_GET['action']) && $_GET['action']=='delete') {
$id=$_GET['id'];
$result1 = @mysql_query("SELECT * FROM notice Where id='$id'");
if ( @mysql_num_rows($result1) > 0 ) {
mysql_query("DELETE FROM notice Where id='$id'");
echo'Deleted Successfully';
}
else {
echo'Not Found';
}
}


//chat start
else if(isset($_GET['action']) && $_GET['action']=='chat') {
$username=$_SESSION['username'];
$dept=$_SESSION['dept'];
$role=$_SESSION['role'];
$currenttime=strtotime("now");
$endtime=$currenttime+300;
$resultss = @mysql_query("SELECT * FROM online
WHERE username = '$username'");
if ( @mysql_num_rows($resultss) > 0 ) {

}
else {
$query="INSERT INTO online VALUES ('','$username','$currenttime','$endtime','$dept','$role')";     
@mysql_query($query);
}
echo'
<html>
<head>
<script>
function loadonline()
{
var xmlhttp;
var txt,str,x,i;
if (window.XMLHttpRequest)						
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	if(xmlhttp.responseText=="noone") {
		document.getElementById("online").innerHTML=\'Noone Online\';
	}
	else {
		document.getElementById("online").innerHTML=xmlhttp.responseText;
	}
	}
   }
xmlhttp.open("GET","online.php",true);
xmlhttp.send();
}



var ifff=1;
function sendText()
{
var xmlhttp;
var txt,str,x,i;
str=document.getElementById("msgs").value;
if (window.XMLHttpRequest)						
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	xmlDoc=xmlhttp.responseXML;
    txt="";
    x=xmlDoc.getElementsByTagName("success");
    for (i=0;i<x.length;i++)
      {
      txt=txt + x[i].childNodes[0].nodeValue + "<br>";
      }
    document.getElementById("result").innerHTML=txt;
    }
   }
xmlhttp.open("POST","send.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("msg="+str);
xmlhttp.send();
}


function loadChat()
{
loadonline();
var xmlhttp;
var txt,id,un,msg,str,x,i;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	if(xmlhttp.responseText=="empty") {
		document.getElementById("showchat").innerHTML=\'Nothing Found\';
	}
	else 
	{
	xmlDoc=xmlhttp.responseXML;
    txt="";
    x=xmlDoc.getElementsByTagName("id");
	un=xmlDoc.getElementsByTagName("un");
	msg=xmlDoc.getElementsByTagName("msg");
	ifff=x.length;
    for (i=0;i<x.length;i++)
      {
      txt=txt + ifff + ". <font color=\"red\">"+un[i].childNodes[0].nodeValue + "</font> : "+msg[i].childNodes[0].nodeValue+"<br>";
	  ifff--;
      }
    document.getElementById("showchat").innerHTML=txt;
    }
   }
   }
xmlhttp.open("GET","chat.php",true);
xmlhttp.send();
}

function chatinit() {
		myVar = setInterval(function(){loadChat()},1000);
}
</script>
</head>
<body>
<center>
<h1>Chat, Department: '.$_SESSION['dept'].' only</h1>
<p><a href="index.php">Home</a> | <a href="?action=chat">Chat</a> | <a href="?action=viewnotice">View Notice</a> | <a href="logout.php">LogOut?</a></p>
<form action="#" method="POST">
MESSEGE: <input type="text" name="msg" id="msgs"/>
<input type="button" value="Send Messege" onclick="sendText()"/>
</form>
<div id="result"></div>
<br>
<script>
chatinit();
</script>
<div style="border: solid 3px; border-color:black; margin:0 auto; width:800px; overflow:hidden; height:300px;">
<div id="showchat" style="float:left; border: solid 3px; border-color:black; margin:0 auto; width:480px; height:100%; overflow:scroll;">
</div>
<div id="online" style="float:left; border: solid 3px; border-color:black; margin:0 auto; width:288px; height:100%; overflow:scroll;">
</div>
</div>
</body>
</html>
';
}
//chat finish


else {



if(isset($_POST['submit'])){
if (isset($_POST['title']) && isset($_POST['notice']) && $_POST['title']!='' && $_POST['notice']!='') {
$title = trim($_POST['title']);
$notice = trim($_POST['notice']);
$username=$_SESSION['username'];
$dept=$_SESSION['dept'];
$query="INSERT INTO notice VALUES ('','$username','$title','$notice','$dept')";
@mysql_query($query);
$ok='Notice Added SuccessFull<br>';
}
else {
$ok='Fill title and notice.<br>';
}
}
else { 

}


echo'<center><h1>Teacher Panel</h1>
<h3>Welcome Back, '.$_SESSION['username'].' , Department: '.$_SESSION['dept'].'</h3>
<p><a href="index.php">Home</a> | <a href="?action=chat">Chat</a> | <a href="?action=viewnotice">View Notice</a> | <a href="logout.php">LogOut?</a></p>

<br>
<form method="POST" action="index.php">
<p>'; echo $ok; echo'</p>
                            <p>
                                  <label>Title: <br><input type="text" id="name" name="title" maxlength="30" /></label></br>
							      <label>Notice:</label></br>
								  <textarea name="notice" rows="10" cols="80"></textarea><br>
                            </p>
							<p><input type="submit" value="Post Notice" name="submit"></p>
</form>
</center>
';

}
}


else if(isset($_SESSION['role']) && $_SESSION['role']==0) {








if(isset($_GET['action']) && $_GET['action']=='viewnotice') {
echo '
<center>
<h1>Notice</h1>
';
$username=$_SESSION['username'];
$dept=$_SESSION['dept'];
$result = @mysql_query("SELECT * FROM notice WHERE department='$dept' ORDER by id DESC LIMIT 0,30");
if ( @mysql_num_rows($result) > 0 ) {
echo '<style>
.edit-table
{
border:1px solid black;
margin-left:10px;
}
</style>
';
echo'<table class="edit-table" style="width:600px;">';
while($notice = @mysql_fetch_array($result)) {
echo '<tr class="edit-table"><td class="edit-table">'.$notice['title'].'</td>';
echo '<td class="edit-table">'.$notice['notice'].'</td></tr>';
}
echo'</table>';
}
}





//chat start
else if(isset($_GET['action']) && $_GET['action']=='chat') {
$username=$_SESSION['username'];
$dept=$_SESSION['dept'];
$role=$_SESSION['role'];
$currenttime=strtotime("now");
$endtime=$currenttime+300;
$resultss = @mysql_query("SELECT * FROM online
WHERE username = '$username'");
if ( @mysql_num_rows($resultss) > 0 ) {

}
else {
$query="INSERT INTO online VALUES ('','$username','$currenttime','$endtime','$dept','$role')";     
@mysql_query($query);
}
echo'
<html>
<head>
<script>
function loadonline()
{
var xmlhttp;
var txt,str,x,i;
if (window.XMLHttpRequest)						
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	if(xmlhttp.responseText=="noone") {
		document.getElementById("online").innerHTML=\'Noone Online\';
	}
	else {
		document.getElementById("online").innerHTML=xmlhttp.responseText;
	}
	}
   }
xmlhttp.open("GET","online.php",true);
xmlhttp.send();
}



var ifff=1;
function sendText()
{
var xmlhttp;
var txt,str,x,i;
str=document.getElementById("msgs").value;
if (window.XMLHttpRequest)						
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	xmlDoc=xmlhttp.responseXML;
    txt="";
    x=xmlDoc.getElementsByTagName("success");
    for (i=0;i<x.length;i++)
      {
      txt=txt + x[i].childNodes[0].nodeValue + "<br>";
      }
    document.getElementById("result").innerHTML=txt;
    }
   }
xmlhttp.open("POST","send.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("msg="+str);
xmlhttp.send();
}


function loadChat()
{
loadonline();
var xmlhttp;
var txt,id,un,msg,str,x,i;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	if(xmlhttp.responseText=="empty") {
		document.getElementById("showchat").innerHTML=\'Nothing Found\';
	}
	else 
	{
	xmlDoc=xmlhttp.responseXML;
    txt="";
    x=xmlDoc.getElementsByTagName("id");
	un=xmlDoc.getElementsByTagName("un");
	msg=xmlDoc.getElementsByTagName("msg");
	ifff=x.length;
    for (i=0;i<x.length;i++)
      {
      txt=txt + ifff + ". <font color=\"red\">"+un[i].childNodes[0].nodeValue + "</font> : "+msg[i].childNodes[0].nodeValue+"<br>";
	  ifff--;
      }
    document.getElementById("showchat").innerHTML=txt;
    }
   }
   }
xmlhttp.open("GET","chat.php",true);
xmlhttp.send();
}

function chatinit() {
		myVar = setInterval(function(){loadChat()},1000);
}
</script>
</head>
<body>
<center>
<h1>Chat, Department: '.$_SESSION['dept'].' only</h1>
<p><a href="index.php">Home</a> | <a href="?action=chat">Chat</a> | <a href="?action=viewnotice">View Notice</a> | <a href="logout.php">LogOut?</a></p>
<br>

MESSEGE: <input type="text" name="msg" id="msgs"/>
<input type="button" value="Send Messege" onclick="sendText()"/>

<div id="result"></div>
<br>
<script>
chatinit();
</script>
<div style="border: solid 3px; border-color:black; margin:0 auto; width:800px; overflow:hidden; height:300px;">
<div id="showchat" style="float:left; border: solid 3px; border-color:black; margin:0 auto; width:480px; height:100%; overflow:scroll;">
</div>
<div id="online" style="float:left; border: solid 3px; border-color:black; margin:0 auto; width:288px; height:100%; overflow:scroll;">
</div>
</div>
</body>
</html>
';
}
//chat finish







else {


echo'<center><h1>Student Panel</h1>
<h3>Welcome Back, '.$_SESSION['username'].' , Department: '.$_SESSION['dept'].'</h3>
<p><a href="index.php">Home</a> | <a href="?action=chat">Chat</a> | <a href="?action=viewnotice">View Notice</a> | <a href="logout.php">LogOut?</a></p>
<br>
</center>
';

}


}



}
else {
header('Location: login.php');
}
?>