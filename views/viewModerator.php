<?php

$this->_t = 'Moderateur';	
?>	

<!-- Global container of page -->
<div class="container viewAdmin">
	<!-- row for blank line -->	
	<div class="row row-padding">
		<div class="col-lg-12">
		</div>
	</div>
	<!-- div for the maderatortools -->	
	<div class="row borderShadowBox">	
		<div class="col-lg-12">	
			<div>
	    		<br>
				<br>
	    		<p class="text-center">Il y a actuellement <?= $commentsManager->countReported() ?> 
	    		<?php if($commentsManager->countReported() < 2): ?>	
	    		commentaire à modérer.</p>
	    		<?php else : ?>
	    		commentaires à modérer.</p>
	    		<?php endif ?>
				<br>
				<hr class="style1">
				<br>
				
				<?php foreach ($commentsManager->getListReported() as $comments) : ?>
			 	<div class="card-header">
                    <h5><?= $comments->author()?></h5>
                    <p class="date-Edit"> Le <?= $comments->addDate()->format('d/m/Y à H\hi') ?>
                    </p>
               	</div>
                <div class="card-body">
                    <p class="card-text">
	                    <?= nl2br($comments->content()) ;?>
	                    <p>
	                    <a href="<?= URL ?>moderator-comments-validate-<?=$comments->id()?>-<?=$_SESSION['token']?>">Accepter</a> |
	                    <a href="<?= URL ?>moderator-comments-delete-<?=$comments->id()?>-<?=$_SESSION['token']?>">
	                    Refuser</a>
	                    </p>
                    </p> 
                </div>
				<?php endforeach ?>
				<hr class="style1">
				<br>
			</div>
		</div> <!-- end of the tools of comments manage -->
	</div> <!-- end of row -->
</div> <!-- end of global container -->



<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>	


