
<?php if ($t == 'Accueil') : ?>
	<div class="justify-content-between jumbotron jumbotron-fluid jumbotron--home">
		<h1 class="text-center colorTitle"><?= $titleJumbo ?></h1>	
	  	<p class="text-center lead-Padding">Je le plaisir de partager avec vous, les différents chapitre de mon livre.</p>
	  	<p class="text-center"><a class="btn btn-primary btn-lg" href="#" id="buttonslider" role="button">Découvrir</a></p>
	</div>
<?php elseif($t == 'Inscription' OR $t == 'Login' OR $t == 'Administration' OR $t == 'Validation' OR $t == 'Moderateur') : ?>	
	<div class="justify-content-between jumbotron jumbotron-fluid">
		<div class="jumbotron--div--padding"></div>
	</div>
<?php else : ?>
	<div class="justify-content-between jumbotron jumbotron-fluid">
		<h1 class="text-center colorTitle"><?= $t ?></h1>	
	</div>
<?php endif ?>	