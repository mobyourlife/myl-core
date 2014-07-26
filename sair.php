<?php
require_once "core.inc.php";

foreach ($_SESSION as $key => $value)
{
	unset($_SESSION[$key]);
}

session_destroy();

header("Location: " . $website_root . "/");

?>