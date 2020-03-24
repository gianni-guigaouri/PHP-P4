<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="<?= URL ?>">JEAN FORTEROCHE</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?= URL ?>">ACCUEIL <span class="sr-only">(current)</span></a>
            </li>
            <?php if(!isset($_SESSION['users'])) : ?>     
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">MEMBRE
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="nav-link" href="<?= URL ?>inscription">S'INSCRIRE</a>
                    <a class="nav-link" href="<?= URL ?>login">SE CONNECTER</a>
                </div>
            </li>
           
            <?php else : ?>
               
                <?php if($_SESSION['users'] == 'admin') : ?>
            	<li class="nav-item">
            		<a class="nav-link" href="<?= URL ?>admin">ADMIN</a>
            	</li>

                <?php elseif($_SESSION['users'] == 'moderator') : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>moderator">MODERATEUR</a>
                </li>
                <?php endif ?>
            
        	<li class="nav-item">
                <a class="nav-link" href="<?= URL ?>logout"><i class="fas fa-sign-out-alt"></i></a>
        	</li>
            <?php endif ?>	
        </ul>
    </div>
</nav>

