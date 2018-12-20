<?php
$fzk = @mysql_connect("localhost","root","");
if (!$fzk)
  {
  echo'frndzk cms Could not connect';
  }
@mysql_query('SET CHARACTER SET utf8');
@mysql_query("SET SESSION collation_connection ='utf8_general_ci'");
if (!@mysql_select_db("masuk",$fzk)) {
echo'frndzk cms Could not connect to database error type';
}
?>