<?php
require_once "core.inc.php";

$nome = $_POST['nome'];
$ret = array(
	"status" => is_subdomain_taken($nome)
);

header("Content-type: application/json");
print(json_encode($ret));

?>
