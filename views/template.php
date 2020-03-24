<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title><?= $t ?></title>
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="public/css/materialize.css">
		<script src="https://kit.fontawesome.com/ced864b441.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" type="text/css" href="public/css/style.css">		
	</head>

	<body>
		<?php include("navBar.php");?>
		<?php include("jumbotron.php"); ?>

		<div class="transition">
			<?= $content ?>
		</div>

		<footer class="footer mt-auto py-3">
		  	<div class="container push">
		    <span>PHP - Projet 4 / Blog Jean Forteroche &copy; 2020-2021</span>
		  	</div>
		</footer>


		<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

		<script>
			
			$(document).ready(function(){
			/*! Fades in page on load */
			$('.transition').css('display', 'none');
			$('.transition').fadeIn(900);
			});
		
		</script>
	</body>
</html>
