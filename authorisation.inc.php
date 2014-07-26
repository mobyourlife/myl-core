<?php

/* Página atual. */
$page = basename($_SERVER['SCRIPT_NAME'], ".php");

/* Páginas permitidas somente para usuários autenticados. */
$require_login = array();
$require_login[] = "confirmar-cadastro";

/* Páginas permitidas somente para usuários NÃO autenticados. */
$require_logout = array();
$require_logout[] = "login-social";

/* Verifica a autenticação do usuário. */
if (isset($fb_profile))
{
	/* Está logado mas a página é permitida somente para deslogados. */
	if (in_array($page, $require_logout))
	{
		header("Location: " . $website_root . "/painel");
	}
}
else
{
	/* Está deslogado e a página é permitida somente para logados. */
	if (in_array($page, $require_login))
	{
		header("Location: " . $website_root . "/login-social");
	}
}

?>
