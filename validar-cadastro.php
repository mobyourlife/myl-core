<?php
require_once "core.inc.php";
require_once "csrf.inc.php";

/* Proteção XSRF. */
$csrf = new csrf();

$token_id = $csrf->get_token_id();
$token_value = $csrf->get_token($token_id);
 
$form_names = $csrf->form_names(array('user_id', 'full_name', 'email_addr', 'account_type', 'account_id', 'subdomain'), false);

/* Verifica o retorno do formulário. */
if(isset($_POST[$form_names['full_name']], $_POST[$form_names['email_addr']], $_POST[$form_names['account_type']], $_POST[$form_names['account_id']], $_POST[$form_names['subdomain']]))
{
	/* Verifica a validade do token CSRF. */
	if($csrf->check_valid('post'))
	{
		/* Consulta os itens do formulário. */
		$user_id = $_POST[$form_names['user_id']];
		$full_name = $_POST[$form_names['full_name']];
		$email_addr = $_POST[$form_names['email_addr']];
		$account_type = $_POST[$form_names['account_type']];
		$account_id = $_POST[$form_names['account_id']];
		$subdomain = $_POST[$form_names['subdomain']];
		
		/* Verifica mais uma vez se o subdomínio está livre. */
		if (is_subdomain_taken($subdomain) === false)
		{
			/* Cadastro o usuário. */
			if (register_user($user_id, $full_name, $email_addr, $account_id, $fb_session->getAccessToken()->__toString(), $subdomain))
			{
				header("Location: " . $website_root . "/pronto");
				die();
			}
		}
	}
	
	/* Gera novos nomes de formulário. */
	$form_names = $csrf->form_names(array('user_id', ' full_name', 'email_addr', 'account_type', 'account_id', 'subdomain'), true);
	
	/* Retorna para a página de cadastro em caso de falhas. */
	header("Location: " . $website_root . "/confirmar-cadastro");
}

?>