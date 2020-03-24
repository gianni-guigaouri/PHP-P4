<?php
$this->_t = 'Administration';	
?>	

<!-- Global container of page -->
<div class="container-fluid viewAdmin">
	
	<!-- row for blank line -->
	<div class="row row-padding">
		<div class="col-lg-12">
		</div>
	</div>
	
	<!-- div for the management tools -->
	<div class="row borderShadowBox">	
		<!-- part of 6 col for the form of news -->
	    <div class="col-lg-6">
		   	<form enctype="multipart/form-data" action="<?= URL ?>admin" method="post">
				<div class="form-group">
					<p>
						<?php if (isset($message)) : ?>
						<div class="alert alert-success" role="alert">
	             		<?= $message ?>
	           			</div>
	            		<?php endif ?>
						
						<input type="hidden" name="token" id="token" value="<?= $_SESSION['token'] ?>" />

						<input type="text" class="form-control" name="author" value="<?php if (isset($news)) echo $news->author(); ?>" placeholder="Auteur" required/><br />
						
						<input type="text" class="form-control" name="title" value="<?php if (isset($news)) echo $news->title(); ?>" placeholder="Titre" required/><br />
						
						<br/><textarea rows="8" cols="80" name="content" id="textarea" placeholder="Article..."><?php if (isset($news)) echo $news->content(); ?></textarea><br />

						<?php if(isset($news) && !$news->isNew()) : ?>
							<input type="hidden" name="id" value="<?= $news->id() ?>" />
							<button class="btn btn-lg btn-primary btn-block editBtn btn-perso" type="submit" name="Edit" value="Modifier">Modifier</button>
						<?php else: ?>
							<button class="btn btn-lg btn-primary btn-block editBtn btn-perso" type="submit" value="Ajouter" name="send">Ajouter</button>
						<?php endif ?>	
					</p>
				</div>	
			</form>

			<!-- end form -->

			<br>
			<hr class="style1">
			<div>
				<p class="text-center">Il y a actuellement <?= $commentsManager->countReported() ?> 
				<?php if($commentsManager->countReported() < 2) : ?>
		    		commentaire à modérer.</p>
	    		<?php else : ?>
	    			commentaires à modérer.</p>
	    		<?php endif ?>
	    		<hr class="style1">

	    		<!-- tools for the comments management -->

				<?php foreach ($commentsManager->getListReported() as $comments) : ?>
				<div class="card-header">
	                <h5><?= $comments->author()?></h5>
	                <p class="date-Edit"> Le <?= $comments->addDate()->format('d/m/Y à H\hi') ?></p>
		        </div>
                <div class="card-body">
                    <p class="card-text">
                    <?= nl2br($comments->content()) ;?>
                    <p>
                    <a href="<?= URL ?>admin-comments-validate-<?=$comments->id()?>-<?=$_SESSION['token']?>">Accepter</a> |
                    <a href="<?= URL ?>admin-comments-delete-<?=$comments->id()?>-<?=$_SESSION['token']?>">Refuser</a>
                    </p>
                    </p> 
                </div>
            	<?php endforeach ?>
				<br>
				<hr class="style1">
				<br>
			</div>
		</div>  <!-- end of the first part col 6 -->

		<!-- start of the second col 6 for the list of news to manage -->
		<div class="col-lg-6 col-padding">	
			<hr class="style1">
			<p class="text-center">Il y a actuellement <?= $manager->count() ?> news.</p>
			<hr class="style1">
	    	<table class="table-responsive">
	      		<tr><th>Titre</th><th>Date d'ajout</th><th>Dernière modification</th><th>Action</th></tr>
			
					<?php foreach ($manager->getList() as $news) : ?>
			  		<tr>
			  			<td><?= $news->title() ?></td>
			  			<td><?= $news->addDate()->format('d/m/Y à H\hi') ?></td>
			  			<td><?= $news->addDate() == $news->editDate() ? '-' : $news->editDate()->format('d/m/Y à H\hi')?></td> 
			  			<td>
			  				<a class="padding-link" href="<?=URL?>admin-edit-<?=$news->id()?>-<?=$_SESSION['token']?>">Modifier</a> 
			  				<button type="button" class="btn btn-link btn-perso btn-lg" data-toggle="modal" data-target="#exampleModal">Supprimer</button>
			  			</td>
			  		</tr>
			  		<?php endforeach ?>
	    	</table>					
		</div>  <!-- end of the second tools col 6 of news manage -->
	</div> <!-- end of row -->
</div> <!-- end of global container -->



<?php if($manager->count() != 0): ?> <!-- if there is no news, modal don't exist -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Attention !</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Confirmez vous la suppression de cette article ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-perso" data-dismiss="modal">Close</button>
        <a class="btn btn-perso btn-primary"href="<?= URL ?>admin-delete-<?= $news->id()?>-<?=$_SESSION['token']?>">Supprimer</a>
      </div>
    </div>
  </div>
</div>
<?php endif ?>


<script src="https://cdn.tiny.cloud/1/53wbeybdc0kp1aiq4qt5na0u3fkqfrxpr5e187qg1vcuw6vt/tinymce/5/tinymce.min.js"></script> <script>tinymce.init({ selector:'textarea' });</script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>	


