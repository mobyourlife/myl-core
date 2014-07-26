<div class="navbar navbar-muf navbar-fixed-top" role="navigation">
  <div class="container">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand" href="<?php printlink(); ?>"><img src="<?php printlink("img/logo.png"); ?>" alt="Mob Your Life"/></a>
	  <ul class="nav navbar-nav">
		<li<?php activelink("como-funciona"); ?>><a href="<?php printlink("como-funciona"); ?>">Como Funciona</a></li>
		<li<?php activelink("duvidas-frequentes"); ?>><a href="<?php printlink("duvidas-frequentes"); ?>">Dúvidas Frequentes</a></li>
		<li<?php activelink("contato"); ?>><a href="<?php printlink("contato"); ?>">Contato</a></li>
      </ul>
	</div>
	
	<div class="navbar-collapse collapse">
	  <div class="navbar-form navbar-right">
		<?php if (!isset($fb_profile)) { ?>
		<button class="btn btn-jumbo" id="fb-login"><span class="fa fa-facebook jump-5"></span> Entrar com Facebook</button>
		<?php } else { ?>
		<div class="btn-group">
		  <button type="button" class="btn btn-jumbo dropdown-toggle" data-toggle="dropdown">
			<span class="glyphicon glyphicon-user"></span> <?php print($fb_profile->getProperty('name')); ?> <span class="caret"></span>
		  </button>
		  <ul class="dropdown-menu" role="menu">
			<li><a href="<?php printlink("painel"); ?>">Painel do usuário</a></li>
			<li class="divider"></li>
			<li><a href="<?php printlink("sair"); ?>" id="fb-logout">Sair</a></li>
		  </ul>
		</div>
		<?php } ?>
	  </div>
	</div>
  </div>
</div>