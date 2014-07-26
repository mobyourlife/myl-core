<?php
require_once "core.inc.php";
require_once "csrf.inc.php";

/* Proteção XSRF. */
$csrf = new csrf();
$token_id = $csrf->get_token_id();
$token_value = $csrf->get_token($token_id);
$form_names = $csrf->form_names(array('user_id', 'full_name', 'email_addr', 'account_type', 'account_id', 'subdomain'), false);

/* Consulta as páginas do usuário logado. */
$fb_accounts = fb_get_accounts();

?>
<!DOCTYPE html>
<html lang="pt-br">
  <?php include("header.inc.php"); ?>
  <body>

    <?php require "navbar.inc.php"; ?>

    <div class="jumbotron">
      <div class="container">
        <h1>Confirmar cadastro</h1>
        <p>Por favor verifique os seus dados antes de continuar.</p>
      </div>
    </div>

    <div class="container">
		<div class="process">
			<div class="process-row">
				<div class="process-step">
					<button type="button" class="btn btn-success btn-circle" disabled="disabled"><i class="fa fa-facebook fa-3x"></i></button>
					<p>Login social</p>
				</div>
				<div class="process-step">
					<button type="button" class="btn btn-info btn-circle" disabled="disabled"><i class="fa fa-pencil fa-3x"></i></button>
					<p>Confirmar cadastro</p>
				</div>
				 <div class="process-step">
					<button type="button" class="btn btn-default btn-circle" disabled="disabled"><i class="fa fa-thumbs-up fa-3x"></i></button>
					<p>Pronto!</p>
				</div> 
			</div>
		</div>
		
		<div class="col-md-8 col-md-offset-2">
			<form id="register-form" class="form-horizontal" action="<?php printlink("validar-cadastro"); ?>" method="post">
			  <input type="hidden" name="<?php print($token_id); ?>" value="<?php print($token_value); ?>" />
			  <input type="hidden" name="<?php print($form_names['user_id']); ?>" value="<?php print($fb_profile->getProperty('id')); ?>"/>
			  <fieldset>
			  
				<!-- Confirmação de nome -->
				<div class="form-group">
				  <label class="col-md-3 control-label" for="name">Nome</label>
				  <div class="col-md-9">
					<input id="full_name" name="<?php print($form_names['full_name']); ?>" type="text" placeholder="Seu nome" class="form-control" value="<?php print($fb_profile->getProperty('name')); ?>" readonly="readonly">
				  </div>
				</div>
			  
				<!-- Endereço de email -->
				<div class="form-group">
				  <label class="col-md-3 control-label" for="name">Email</label>
				  <div class="col-md-9">
					<input id="email_addr" name="<?php print($form_names['email_addr']); ?>" type="text" placeholder="Seu email" class="form-control" value="<?php print($fb_profile->getProperty('email')); ?>" readonly="readonly">
				  </div>
				</div>
		
				<!-- Tipo de conta -->
				<div class="form-group">
				  <label class="col-md-3 control-label" for="<?php print($form_names['account_type']); ?>">Tipo de conta</label>
				  <div class="col-md-9">
					<div class="input-group">
						<div id="radioBtn" class="btn-group">
							<input type="hidden" name="<?php print($form_names['account_type']); ?>" id="account_type" value="profile">
							<a class="btn btn-primary" data-toggle="account_type" data-value="profile">Pessoal</a>
							<a class="btn btn-default" data-toggle="account_type" data-value="fanpage">Página</a>
						</div>
					</div>
				  </div>
				</div>
		
				<!-- Nome da conta -->
				<div id="select_account_id" class="form-group" style="display: none">
				  <label class="col-md-3 control-label" for="email">Nome da conta</label>
				  <div class="col-md-9">
					<div class="input-group">
						<div id="radioBtn" class="btn-group">
							<?php
							$first = true;
                            $first_page_id = 0;
							
							if ($fb_accounts != null)
							{
								if (count($fb_accounts) > 0 && count($fb_accounts->asArray()) > 0)
								{
									foreach ($fb_accounts->asArray() as $page)
									{
                                            if ($first == true)
                                            {
                                                $first_page_id = $page->id;
                                            }
									?>
									<a class="btn btn-<?php print(($first == true) ? "primary" : "default"); $first = false; ?>" data-toggle="account_id" data-value="<?php print($page->id); ?>"><?php print($page->name); ?></a><br/>
									<?php
									}
								}
								else
								{
								?>
									Você não é administrador de nenhuma página!
								<?php
								}
							}
							else
							{
								?>
									Não foi possível consultar as suas páginas!
								<?php
							}
							?>
							<input type="hidden" name="<?php print($form_names['account_id']); ?>" id="account_id" value="<?php print($first_page_id); ?>">
						</div>
					</div>
				  </div>
				</div>
			  
				<!-- Subdomínio desejado -->
				<div class="form-group">
				  <label class="col-md-3 control-label" for="name">Subdomínio desejado</label>
				  <div class="col-md-5">
					<div class="input-group">
						<input id="subdomain" name="<?php print($form_names['subdomain']); ?>" type="text" class="form-control">
						<span class="input-group-addon">.mobyourlife.com.br</span>
					</div>
				  </div>
				  <div class="col-md-4">
					<span id="subdomain-status" class="btn text-danger" style="display:none"><strong></strong></span>
				  </div>
				</div>
		
				<!-- Envio do formulário -->
				<div class="form-group">
				  <div class="col-md-12 text-right">
					<button type="submit" class="btn btn-info btn-lg">Continuar</button>
				  </div>
				</div>
			  </fieldset>
			</form>
		</div>
	</div>
	
	<?php require "footer.inc.php"; ?>
  </body>
</html>
