
<?php echo display_view('template_header'); ?>

<div class="row">
                <div class= "col-lg-3 col-md-3 col-sm-6 col-xs-6">
            <form>

                <fieldset class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Uw emailadres" required>
                </fieldset>

                <fieldset class="form-group">
                    <label for="gebruikersnaam">Gebruikersnaam</label>
                    <input type="text" class="form-control" name="gebruikersnaam" placeholder="Gebruikersnaam" required>
                </fieldset>

                <fieldset class="form-group">
                    <label for="wachtwoord">Wachtwoord</label>
                    <input type="password" class="form-control" name="wachtwoord" placeholder="Wachtwoord" required>
                </fieldset>

                <fieldset class="form-group">
                    <label for="wachtwoordOpnieuw">Wachtwoord opnieuw</label>
                    <input type="password" class="form-control" name="wachtwoordOpnieuw" placeholder="Wachtwoord" required>
                </fieldset>

            </form>
        </div>

            <div class= "col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <form class="col-lg-6">

                <fieldset class="form-group">
                    <label for="voornaam">Voornaam</label>
                    <input type="text" class="form-control" name="voornaam" placeholder="Uw naam" required>
                </fieldset>

                <fieldset class="form-group">
                    <label for="achternaam">Achternaam</label>
                    <input type="text" class="form-control" name="achternaam" placeholder="Uw Achternaam" required>
                </fieldset>

                <fieldset class="form-group">
                    <label for="geboortedatum">geboortedatum</label>
                    <input type="date" class="form-control" name="geboortedatum" placeholder="Uw geboortedatum" required>
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
                    <input type="text" class="form-control" name="adresregel1" placeholder="Straat en huisnummer" required>
                </fieldset>

                <fieldset class="form-group">
                    <label for="postcode">Postcode</label>
                    <input type="text" class="form-control" name="postcode" placeholder="1234AA" required>
                </fieldset>

                <fieldset class="form-group">
                    <label for="plaatsnaam">Plaatsnaam</label>
                    <input type="text" class="form-control" name="plaatsnaam" placeholder="Plaatsnaam" required>
                </fieldset>

                <fieldset class="form-group">
                    <label for="landnaam">Landnaam</label>
                    <input type="text" class="form-control" name="landnaam" placeholder="Landnaam" required>
                </fieldset>

                <fieldset class="form-group">
                    <label for="telefoonnummer">Telefoonnummer</label>
                    <input type="text" class="form-control" name="telefoonnummer" placeholder="06-54322345" required>
                </fieldset>
                
            <!-- beveiligingsvraag en antwoord moeten naast elkaar -->
                <fieldset class="form-group">
                    <label for="selectie">Uw beveiligingsvraag</label>
                    <select class="form-control" name="geselecteerdBeveilingsvraag">
                        <option value="1">Wat is de meisjesnaam van uw moeder?</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                    </fieldset>
                    <fieldset class="form-group">
                    <label for="beveilingsvraag">Uw antwoord</label>
                    <input type="text" class="form-control" name="antwoordTekst" placeholder="Antwoord" required>
                </fieldset>

            </div>

                <hr>
                <button type="submit" class="btn btn-primary">Registreren</button>
        </div>
<?php echo display_view('template_footer'); ?>