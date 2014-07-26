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
		<div class="fb-login">
			<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
			</fb:login-button>
		</div>
	  </div>
	</div>
  </div>
</div>