<?php
include_once "includes/ez_sql_core.php";
include_once "includes/ez_sql_mysqli.php";
include_once "includes/config.php";
$db = new ezSQL_mysqli($db_user, $db_password, $db_name, $db_host);
$db->query("SET NAMES utf8"); 
	
$newSql = "INSERT INTO contacts(sarkiadi,besteci,tarih) VALUES ('$_POST[sarkiadi]','$_POST[besteci]','$_POST[tarih]')";
$add = $db->query($newSql);
?>