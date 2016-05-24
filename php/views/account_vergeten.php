
<?php echo display_view('template_header'); ?>
<div class="row">
    <div class="col-md-12">
    <!-- Alerts wordt niet standaard getoond -->
    <?php 
    if(get_data_view('sent') && get_data_view('correct')){
        echo '<div class="alert alert-success">
        Uw nieuwe wachtwoord is verstuurd naar uw e-mailadres.
        </div>';
    }
    else if (get_data_view('sent') === false && get_data_view('correct')){
        echo '<div class="alert alert-warning">
        Het is niet gelukt om een email te verzenden.
        </div>';
    }
    
    if(get_data_view('correct') === false){
        echo '<div class="alert alert-danger">
        De ingevulgde gegevens zijn onjuist.
        </div>';
    }
    ?>
            <div class="col-lg-4 col-md-5 col-sm-8- col-xs-12">
                

            <form method="post">

              <fieldset class="form-group">
                <label for="emailadres">Uw emailadres</label>
                <input type="email" class="form-control" name="email" placeholder="" required>
              </fieldset>

              <fieldset class="form-group">
                <label for="selectie">Uw beveiligingsvraag</label>
                <select class="form-control" name="beveiligingsvraag">
                    <?php foreach (get_data_view('vragen') as $rubriek) {
                  echo '<option value="' . $rubriek['vraagnummer'] . '">' . $rubriek['tekst_vraag'] . '</option>';
                    }
                    ?>
                </select>
              </fieldset>

              <fieldset class="form-group">
                <label for="antwoord">Antwoord</label>
                <input type="text" class="form-control" name="antwoord" placeholder="" required>
                <!--    optioneel mededeling
                <small class="text-muted">Let op! Uw antwoord is hoofdlettergevoelig</small>
            -->
              </fieldset>
            
            <button type="submit" class="btn btn-primary">Vraag aan</button>

            </form>

        </div>
</div>
<?php echo display_view('template_footer'); ?>