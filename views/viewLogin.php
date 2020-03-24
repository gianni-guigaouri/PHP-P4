<?php
$this->_t = 'Login';

?>
<div class="text-center viewLogin">
    <form enctype="multipart/form-data" class="form-signin" action="<?= URL ?>login" method="post">
        <h1 class="h3 mb-3 font-weight-normal">Connectez vous</h1>
        <?php if(isset($errorMsg)) :?>
            <div class="alert alert-warning" role="alert">
             <?= $errorMsg ?>
            </div>
            <?php endif ?>
        <label for="inputEmail" class="sr-only">Adresse Email</label>
        <input type="email" id="inputEmail" class="form-control" name="email" placeholder="pseudo" required autofocus> 
        <br>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" name="pwd" placeholder="Password" required>
        <br>
        <br>
        <button class="btn btn-lg btn-primary btn-block btn-perso" type="submit" name="send">Se connecter</button>
        <p class="mt-5 mb-3 text-muted"></p>
    </form>
</div> 



