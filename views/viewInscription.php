<?php
$this->_t = 'Inscription';

if(!isset($success)) : ?>
    <div class="text-center">
        <form enctype="multipart/form-data" class="form-signin" action="<?= URL ?>inscription" method="post">
            <h1 class="h3 mb-3 font-weight-normal">Inscrivez vous</h1>
            <?php if(isset($errorMsg)): ?>
            <div class="alert alert-warning" role="alert">
            <?= $errorMsg ?>
            </div>
            <?php endif ?>

            <label for="inputText" class="sr-only">Peudo</label>
            <input type="text" id="inputText" class="form-control" name="pseudo" placeholder="pseudo" required autofocus>
            <label for="inputEmail" class="sr-only">Adresse Email</label>
            <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Veuillez saisir votre email" required> 
            <label for="inputEmail" class="sr-only">Adresse Email</label>
            <input type="email" id="inputEmail2" class="form-control" name="email2" placeholder="Veuillez confirmer votre email" required>          
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" name="pwd" placeholder="Choisissez un mot de passe" required>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword2" class="form-control" name="pwd2" placeholder="Confirmez votre mot de passe" required>
            <button class="btn btn-lg btn-primary btn-block btn-perso" type="submit" name="send">Valider</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2020-2021</p>
        </form>
    </div> 
<?php else : ?>  
    <div class="container container-subscribe-success">
        <div class="row justify-content-center">
            <div class="col-10 align-self-center">   
                <h2 class="text-center h3 mb-3 font-weight-normal">Inscription validée ! Veuillez consulter vos mail pour confirmer votre inscription.</h2>
            </div>
        </div>
    </div>    
<?php endif ?>