<?php

/* Conecta-se ao banco de dados. */
function db_conectar()
{
	global $mysql_hostname, $mysql_username, $mysql_password, $mysql_database;
	$db = mysqli_connect($mysql_hostname, $mysql_username, $mysql_password);
	mysqli_select_db($db, $mysql_database);
	return $db;
}

function is_user_registered($fb_uid)
{
	$db = db_conectar();
	
	$sql = sprintf("SELECT 1 FROM myl_accounts WHERE page_uid = %s;", $fb_uid);
	$res = mysqli_query($db, $sql);
	$count = mysqli_num_rows($res);
	
	mysqli_close($db);
	
	return ($count == 1) ? true : false;
}

function is_subdomain_taken($subdomain)
{
	$db = db_conectar();
	
	$sql = sprintf("SELECT 1 FROM myl_subdomains WHERE subdomain = '%s';", $subdomain);
	$res = mysqli_query($db, $sql);
	$count = mysqli_num_rows($res);
	
	mysqli_close($db);
	
	return ($count == 1) ? true : false;
}

?>
