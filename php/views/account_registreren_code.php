<?php echo display_view('template_header'); ?>

<div class="row">
            <div class="well">
                <h4> De voordelen van een account zijn: </h4>
                <ul>
                    <li> Dat u kunt bieden op veilingen. </li>
                    <li> Dat u een verkoopaccount kan aanvragen voor het sarten van een veiling.</li>
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
            <form>
                <div class="input-group col-md-6">
                        <input type="text" class="form-control" placeholder="Geheime code" name="code">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Registreer</button>
            </form>
</div>

<?php echo display_view('template_footer'); ?>
