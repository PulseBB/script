<?php
header('Acess-Control-Allow-Origin: *');

$mysql_host = "www.db4free.net";
$mysql_database = "ucoinhelp";
$mysql_user = "ucoinhelp";
$mysql_password = "Nana12345";

$link = mysql_connect($mysql_host,$mysql_user, $mysql_password) or die("error connect");
mysql_select_db($mysql_database,$link) or die("error db");

if(isset($link)) echo("good");

if(isset($_POST["name"])) $name = $_POST("name");
if(isset($_POST["score"])) $score = $_POST("score");

if(isset($name)&&isset($score)){
	//Запрос к БД на получение нужной строки
	$ql = mysql_query("SELECT * FROM result_table WHERE name='".$name."'");
	if(mysql_num_rows($ql)==1){
		$array = mysql_fetch_array($ql);
		if($score!=$array['score']) $q2 = mysql_query("UPDATE result_table SET `score`=`$score` WHERE `name`='$name'");
	}else{
		$q3 = mysql_query("INSERT INTO result_table (`name`,`score`) VALUES ('".$name"','".$score"') ");
	}
}
?>