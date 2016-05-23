
<?php echo display_view('template_header'); ?>

<div class="row">
        <div class= "col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <form>

                <fieldset class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="" required>
                </fieldset>

                <fieldset class="form-group">
                    <label for="gebruikersnaam">Gebruikersnaam</label>
                    <input type="text" class="form-control" name="gebruikersnaam" placeholder="" required>
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
                    <input type="text" class="form-control" name="voornaam" placeholder="" required>
                </fieldset>

                <fieldset class="form-group">
                    <label for="achternaam">Achternaam</label>
                    <input type="text" class="form-control" name="achternaam" placeholder="" required>
                </fieldset>

                <fieldset class="form-group">
                    <label for="geboortedatum">geboortedatum</label>
                    <input type="date" class="form-control" name="geboortedatum" placeholder="" required>
                </fieldset>

                <br>

                <fieldset class="form-group">
                <label class="radio-inline">
                  <input type="radio" name="geslacht" value="man"> Man
                </label>

                <label class="radio-inline">
                  <input type="radio" name="geslacht" value="vrouw"> Vrouw
                </label>
                </fieldset>

                <fieldset class="form-group">
                    <label for="adres">Straat en huisnummer</label>
                    <input type="text" class="form-control" name="adresregel1" placeholder="" required>
                </fieldset>

                <fieldset class="form-group">
                    <label for="postcode">Postcode</label>
                    <input type="text" class="form-control" name="postcode" placeholder="" required>
                </fieldset>

                <fieldset class="form-group">
                    <label for="plaatsnaam">Plaatsnaam</label>
                    <input type="text" class="form-control" name="plaatsnaam" placeholder="" required>
                </fieldset>

                <fieldset class="form-group">
                    <label for="landnaam">Landnaam</label>
                    <input type="text" class="form-control" name="landnaam" placeholder="" required>
                </fieldset>

                <fieldset class="form-group">
                    <label for="telefoonnummer">Telefoonnummer</label>
                    <input type="text" class="form-control" name="telefoonnummer" placeholder="" required>
                </fieldset>
                
            <!-- beveiligingsvraag en antwoord moeten naast elkaar -->
                <fieldset class="form-group">
                    <label for="selectie">Uw beveiligingsvraag</label>
                    <select class="form-control" name="geselecteerdBeveilingsvraag">
                        <?php foreach (get_data_view('vragen') as $nummer => $rubriek) {
                            echo '<option value="' . $nummer . '">' . $rubriek . '</option>';
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