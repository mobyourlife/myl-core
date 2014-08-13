<?php

/* Página atual. */
$page = basename($_SERVER['SCRIPT_NAME'], ".php");

/* Páginas permitidas somente para usuários autenticados. */
$require_login = array();
$require_login[] = "confirmar-cadastro";

/* Páginas permitidas somente para usuários autenticados e registrados. */
$require_register = array();
$require_register[] = "pronto";
$require_register[] = "painel";

/* Páginas permitidas somente para usuários NÃO autenticados. */
$require_logout = array();
$require_logout[] = "login-social";

/* Verifica a autenticação do usuário. */
if (isset($fb_profile))
{
	save_user_info($fb_profile);
	
	/* Verifica se é uma fanpage. */
	$type = get_account_type($fb_profile->getProperty('id'));
	if ($type == "fanpage")
	{
		$fbid = get_page_fbid($fb_profile->getProperty('id'));
		$accounts = fb_get_accounts()->asArray();
		
		foreach($accounts as $acc)
		{
			if($acc->id == $fbid)
			{
				save_page_info($acc);
			}
		}
	}
	
	/* Sempre sincroniza uma vez a cada login. */
	if (!isset($_SESSION['synced']) || $_SESSION['synced'] != true)
	{
		exec(sprintf("node %s &> /dev/null &", $myl_backsync));
		$_SESSION['synced'] = true;
	}

	/* Verifica o registro do usuário. */
	if (is_user_registered($fb_profile->getProperty('id')))
	{
		/* Está logado mas a página é permitida somente para deslogados. */
		if (in_array($page, $require_logout))
		{
			header("Location: " . $website_root . "/painel");
		}
	}
	else
	{
		/* Está logado mas a página é permitida somente para registrados. */
		if (in_array($page, $require_register))
		{
			header("Location: " . $website_root . "/confirmar-cadastro");
		}
	}
}
else
{
	/* Está deslogado e a página é permitida somente para logados. */
	if (in_array($page, $require_login) || in_array($page, $require_register))
	{
		header("Location: " . $website_root . "/login-social");
	}
}

?>
