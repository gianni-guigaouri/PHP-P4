<?php 
$this->_t = $news->title();
$this->_titleJumbo = $news->title();
?>

<!-- global container of the page -->

<div class="container-fluid viewArticle">	
    <div class="row justify-content-right">
        <div class="col-lg-12"> 
            <a href="<?= URL ?>">Page des articles</a>
        </div>    
    </div>        

    <div class="container-single-news container-fluid">        
        <div class="row justify-content-center">
            <div class="col-lg-10">   <!-- part of the single news view -->
                <div class="card-body">
                    <div class="card-text">
                        <?= nl2br($news->content()) ;?>
                        <?php if($news->addDate() != $news->editDate()) : ?>
            			<p><small><em>Modifiée le <?= $news->editDate()->format('d/m/Y à H\hi')?></em></small></p>
                        <?php endif ?>
                    </div> 
                </div>
                <div class="card-header">
                    <p class="date-Edit"> Le <?= $news->addDate()->format('d/m/Y à H\hi') ?></p>
                    <button type="button" class="btn btn-primary btn-lg">Commentaires 
                        <span class="badge badge-light"><?= $countC;?></span>
                    </button>
                </div>
    	    </div>
        </div>
    </div>  <!-- end of the single news view -->


<!-- comments Form -->   

    <?php if(isset($_SESSION['users'])) : ?>
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12">
                    <h4> un commentaire ? </h4>
                </div>
            </div>    

            <div class="text-center">      
                <form action="article-<?= $news->id()?>" method="post" class="form-signin">
                    <p>
                        <?php if (isset($message)) : ?> 
                        <div class="alert alert-success" role="alert">
                        <?= $message ?>
                        </div>
                        <?php endif ?> 
                        <input type="text" class="form-control" name="author" value="" placeholder="Pseudo" />
                        <input type="text" class="form-control" name="content" id="textarea" placeholder="Votre commentaire..." /> <br />
                        <input type="hidden" name="token" id="token" value="<?= $_SESSION['token'] ?>" />
                        <button class="btn btn-lg btn-primary btn-block editBtn btn-perso" type="submit" value="Ajouter"name="send">Ajouter</button>
                    </p> 
                </form> 
            </div>
        
        </div>

        <?php else : ?>
        <div class="container container--margintop">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card-header text-center">
                        <p class="card-header--padding-top">Pour laisser un commentaire merci de vous connecter.</p>
                        <a href="<?= URL ?>login">Se connecter</a>
                    </div>
                </div>
            </div>
        </div>        
    <?php endif ?>     

    <?php foreach($commentsManager->getList($news->id()) as $comments) : ?>
        <?php if($comments->state() == 'Ok'): ?>    
            <div class="container container--margintop">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="card-header">
                            <h5><?= $comments->author() ?></h5>
                            <p class="date-Edit"> Le <?= $comments->addDate()->format('d/m/Y à H\hi') ?></p>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                            <?= nl2br($comments->content()) ;?>
                            <a href="<?= URL ?>article-<?= $news->id()?>-<?= $comments->id()?>">Signaler</a>
                            </p> 
                        </div>
                    </div>
                </div>
            </div>  

        <?php elseif($comments->state() == 'valid') : ?> 
            <div class="container container--margintop">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="card-header">
                            <h5><?= $comments->author() ?></h5>
                            <p class="date-Edit"> Le <?= $comments->addDate()->format('d/m/Y à H\hi') ?></p>
                        </div>

                        <div class="card-body">
                            <p class="card-text">
                            <?= nl2br($comments->content()) ;?>
                            </p> 
                        </div>
                    </div>
                </div>
            </div>     

        <?php elseif($comments->state() == 'reported') : ?>
            <div class="container container--margintop">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="card-header">
                            <h5><?= $comments->author() ?></h5>
                            <p class="date-Edit"> Le <?= $comments->addDate()->format('d/m/Y à H\hi') ?></p>
                        </div>

                        <div class="card-body">
                            <div class="card-text">
                                <div class="alert alert-warning" role="alert">
                                    Votre message à été signalé !
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>          
        <?php endif ?>       
    <?php endforeach ?>    
</div>
 
   