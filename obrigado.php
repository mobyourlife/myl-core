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
        <h1>Contato</h1>
        <p>Entre em contato direto com a equipe do Mob Your Life para expressar as suas dúvidas ou sugestões!</p>
      </div>
    </div>

    <div class="container">
		<div class="row">
		  <div class="col-md-8">
			<h2>Obrigado pelo contato!</h2>
			<p>A nossa equipe irá lhe responder o mais breve possível.</p>
			<p><a href="<?php printlink(); ?>" class="btn btn-lg btn-primary">Continuar 
			navegando</a></p>
		  </div>
		  <div class="col-md-4">
			<form>
			<legend><span class="glyphicon glyphicon-globe"></span> Nossa localização</legend>
			<address>
				<strong>F&gt;MOB STUDIO</strong><br/>
				Rua Luiz Dalincourt 325, Bosque<br/>
				Campinas, SP<br/>
				<abbr title="Telefone comercial">F:</abbr> (19) 3032-1279
			</address>
			<address>
				<strong>Suporte Técnico</strong><br>
				<a href="mailto:suporte@mobyourlife.com.br">suporte@mobyourlife.com.br</a>
			</address>
			</form>
		</div>
		</div>
	</div>
	
	<?php require "footer.inc.php"; ?>
  </body>
</html>
