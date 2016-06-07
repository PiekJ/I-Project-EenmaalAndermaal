
<?php echo display_view('template_header'); ?>
    <?php 
    if(get_data_view('errors') !== null){
        foreach(get_data_view('errors') as $error){
            echo '<div class="alert alert-danger">' .
            $error .
            '</div>';
        }
    }
    ?>
<div class="row">
        <div class= "col-lg-4 col-md-4 col-sm-12 col-xs-12">
            
            <form method="post">

                <fieldset class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value=" <?=$_SESSION['email'] ?>" placeholder="" disabled>
                </fieldset>

                <fieldset class="form-group">
                    <label for="gebruikersnaam">Gebruikersnaam</label>
                    <input type="text" class="form-control" name="gebruikersnaam" value="<?=get_data_view('gegevens','gebruikersnaam')?>" placeholder="" required>
                </fieldset>

                <fieldset class="form-group">
                    <label for="wachtwoord">Wachtwoord</label>
                    <input type="password" class="form-control" name="wachtwoord" placeholder="" required>
                </fieldset>

                <fieldset class="form-group">
                    <label for="wachtwoordOpnieuw">Wachtwoord opnieuw</label>
                    <input type="password" class="form-control" name="wachtwoordOpnieuw" placeholder="" required>
                </fieldset>

        </div>

            <div class= "col-lg-4 col-md-4 col-sm-12 col-xs-12">
            

                <fieldset class="form-group">
                    <label for="voornaam">Voornaam</label>
                    <input type="text" class="form-control" name="voornaam" value="<?=get_data_view('gegevens','voornaam')?>" placeholder="" required>
                </fieldset>

                <fieldset class="form-group">
                    <label for="achternaam">Achternaam</label>
                    <input type="text" class="form-control" name="achternaam" value="<?=get_data_view('gegevens','achternaam')?>" placeholder="" required>
                </fieldset>

                <fieldset class="form-group">
                    <label for="geboortedatum">geboortedatum</label>
                    <input type="date" class="form-control" name="geboortedatum" value="<?=get_data_view('gegevens','geboortedatum')?>" placeholder="" required>
                </fieldset>

                <br>

                <fieldset class="form-group">
                <label class="radio-inline">
                  <input type="radio" name="geslacht" value="man" <?= (get_data_view('gegevens','geslacht') == 'man' ? 'checked' : '') ?>> Man
                </label>

                <label class="radio-inline">
                  <input type="radio" name="geslacht" value="vrouw" <?= (get_data_view('gegevens','geslacht') == 'vrouw' ? 'checked' : '') ?>> Vrouw
                </label>
                </fieldset>

                <fieldset class="form-group">
                    <label for="adres">Straat en huisnummer</label>
                    <input type="text" class="form-control" name="adresregel1" value="<?=get_data_view('gegevens','adresregel1')?>" placeholder="Straatnaam 12" required>
                </fieldset>

                <fieldset class="form-group">
                    <label for="postcode">Postcode</label>
                    <input type="text" class="form-control" name="postcode" value="<?=get_data_view('gegevens','postcode')?>" placeholder="0000AA" required>
                </fieldset>

                <fieldset class="form-group">
                    <label for="plaatsnaam">Plaatsnaam</label>
                    <input type="text" class="form-control" name="plaatsnaam" value="<?=get_data_view('gegevens','plaatsnaam')?>" placeholder="" required>
                </fieldset>

                <fieldset class="form-group">
                    <label for="landnaam">Landnaam</label>
                    <input type="text" class="form-control" name="landnaam" value="<?=get_data_view('gegevens','landnaam')?>" placeholder="" required>
                </fieldset>

                <fieldset class="form-group">
                    <label for="telefoonnummer">Telefoonnummer</label>
                    <input type="text" class="form-control" name="telefoonnummer" value="<?=get_data_view('gegevens','telefoonnummer')?>" placeholder="0699999999" required>
                </fieldset>
                
            <!-- beveiligingsvraag en antwoord moeten naast elkaar -->
                <fieldset class="form-group">
                    <label for="selectie">Uw beveiligingsvraag</label>
                <select class="form-control" name="beveilingsvraag">
                    <?php foreach (get_data_view('vragen') as $rubriek) {
                        echo '<option value="' . $rubriek['vraagnummer'] . '">' . $rubriek['tekst_vraag'] . '</option>';
                    }
                    ?>
                </select>
                    </fieldset>
                    <fieldset class="form-group">
                    <label for="beveilingsvraag">Uw antwoord</label>
                    <input type="text" class="form-control" name="antwoordTekst" placeholder="" required>
                </fieldset>

            </div>

                <hr>
                <button type="submit" class="btn btn-primary">Registreren</button>
            </form>
        </div>
<?php echo display_view('template_footer'); ?>