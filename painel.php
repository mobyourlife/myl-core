<?php
require_once "core.inc.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
  <?php include("header.inc.php"); ?>
  <body>

    <?php require "navbar.inc.php"; ?>

    <div class="jumbotron">
      <div class="container">
        <h1>Painel do usuário</h1>
        <p>Administre a sua conta no Mob Your Life.</p>
      </div>
    </div>
	
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Painel do usuário</h3>
						<span class="pull-right">
							<ul class="nav panel-tabs">
								<li class="active"><a href="#perfil" data-toggle="tab">Perfil</a></li>
							</ul>
						</span>
					</div>
					<div class="panel-body">
						<div class="tab-content">
						<div class="tab-pane active" id="perfil">
							<div class="row">
								<div class="col-md-12 col-lg-12"> 
									<table class="table table-user-information">
										<tbody>
											<tr>
												<td>Seu nome:</td>
												<td><?php print($fb_profile->getProperty('name')); ?></td>
											</tr>
										<tbody>
											<tr>
												<td>Tipo de conta:</td>
												<td><?php print(get_account_type($fb_profile->getProperty('id')) == "profile" ? "Pessoal" : "Página"); ?></td>
											</tr>
											<tr>
												<td>Data de cadastro:</td>
												<td><?php print(get_register_date($fb_profile->getProperty('id'))); ?></td>
											</tr>
											<tr>
												<td>Estado da conta</td>
												<td>Ativa</td>
											</tr>
											<tr>
												<td>Seu endereço</td>
												<td><a href="<?php print(get_user_fqdn($fb_profile->getProperty('id'))); ?>:81" target="_blank"><?php print(get_user_domain($fb_profile->getProperty('id'))); ?></a></td>
											</tr>
										</tbody>
									</table>

									<div class="center">
										<a href="<?php print(get_user_fqdn($fb_profile->getProperty('id'))); ?>:81" target="_blank" class="btn btn-lg btn-info"><span class="fa fa-globe jump-5"></span> Acessar meu site</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<?php require "footer.inc.php"; ?>
  </body>
</html>
