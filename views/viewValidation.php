<?php
$this->_t = 'Validation';

?>   
    	
<div class="container container-subscribe-success">
    <div class="row justify-content-center">
        <div class="col-10 align-self-center text-center">   
            <h2 class="text-center h3 mb-3 font-weight-normal">Votre inscription est maintenant terminée, vous allez être redirigé vers la page d'accueil.</h2>
            <?php header('refresh:5;url='.URL);?>
            <div class="spinner-border text-primary" role="status">
				  <span class="sr-only">Loading...</span>
			</div>
        </div>
    </div>
</div> 