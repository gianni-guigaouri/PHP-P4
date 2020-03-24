<?php 

$this->_t = 'Accueil';
$this->_titleJumbo = 'BILLET SIMPLE POUR L\' <span>ALASKA</span>';

?>


<div class="container-fluid viewAccueil" id="pageTwo">
    
  <div class="row justify-content-center">

    <?php	foreach($manager->getList(0, 5) as $news) : ?>
    	<?php	if(strlen($news->content()) <= 200) : ?>
    	  <?php		$content = $news->content(); ?>
      <?php	else : ?>
        	<?php	$debut = substr($news->content(), 0, 250);
        		$debut = substr($debut, 0, strrpos($debut, ' ')) . '...';
        		$content = $debut; ?>
      <?php endif ?>      
		

    <?php $countC = $commentsManager->count($news->id()); ?>

    <div class="col-lg-4 col-md-6 col-sm-8 col-10">
      <div class="card">
        <div class="card-image">
          <span class="card-title text-center"><?= $news->title() ?></span>
          <img src="public/images/image-card.jpg" alt="image of Alaska montain">
        </div>
        <div class="card-content">
          <h5 class="text-center"><?= $news->title() ?></h5>
          <div> <?= nl2br($content) ;?></span></div>
        </div>
        <div class="card-action">
          <p class="date-Edit"> Le <?= $news->addDate()->format('d/m/Y') ?></p>
          <p><?= $countC;?> <i class="glyph-edit far fa-comment"></i></p>
          <a href="article-<?= $news->id()?>">Lire la suite</a>
        </div>
      </div>
    </div>
    <?php endforeach ?>
  </div>
</div>
<script src="public/js/scroll.js"></script>

  