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
        <h1>Pronto!</h1>
        <p>Seja bem-vindo ao Mob Your Life. Aproveite a revolução da web.</p>
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
					<button type="button" class="btn btn-success btn-circle" disabled="disabled"><i class="fa fa-pencil fa-3x"></i></button>
					<p>Confirmar cadastro</p>
				</div>
				 <div class="process-step">
					<button type="button" class="btn btn-info btn-circle" disabled="disabled"><i class="fa fa-thumbs-up fa-3x"></i></button>
					<p>Pronto!</p>
				</div> 
			</div>
		</div>
		<div class="center">
			<p>
				Clique no botão abaixo para ir ao seu novo site.
			</p>
			<p>
				<a href="<?php print(get_user_fqdn($fb_profile->getProperty('id'))); ?>:81" target="_blank" class="btn btn-lg btn-info"><span class="fa fa-globe jump-5"></span> Acessar meu site</a>
			</p>
		</div>
	</div>
	
	<?php require "footer.inc.php"; ?>
  </body>
</html>
