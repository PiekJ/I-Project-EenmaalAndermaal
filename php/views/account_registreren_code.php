<?php echo display_view('template_header'); ?>

<div class="row">
     <div class="col-md-12">
    <!-- Alerts wordt niet standaard getoond -->
    <?php 
    if(get_data_view('sent')){
        echo '<div class="alert alert-success">
        Er is een e-mail met code verstuurd naar uw e-mailadres.
        </div>';
    }
    else{
        echo '<div class="alert alert-warning">
        Het is niet gelukt om een email te verzenden.
        </div>';
    }
    ?>
    

    
            <div class="well">
                <h4> De voordelen van het hebben van een account zijn: </h4>
                <ul>
                    <li> dat u kunt bieden op veilingen; </li>
                    <li> dat u een verkoopaccount kan aanvragen voor het starten van een veiling.</li>
                </ul>
            </div>
            <h4> Uw e-mailadres </h4>
            <form method="post">
                <div class="input-group col-md-6">
                    <input type="text" class="form-control " placeholder="e-mailadres" name="email">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Vraag aan</button>
            </form>
            <hr>
            <h4> Uw ontvangen code </h4>
            <form method="post">
                <div class="input-group col-md-6">
                        <input type="text" class="form-control" placeholder="Geheime code" name="code">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Registreer</button>
            </form>
         </div>
</div>

<?php echo display_view('template_footer'); ?>
