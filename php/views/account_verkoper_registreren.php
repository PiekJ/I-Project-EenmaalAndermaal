<?php echo display_view('template_header'); ?>

<?php
    if(get_data_view('sent')){
        echo '<div class="alert alert-success">
        Er is een e-mail met code verstuurd naar uw e-mailadres.
        </div>';
    } 

    if(check_verkoopaccount($_SESSION['user_data']['gebruikersnaam'])){
        echo '<div class="alert alert-warning">
        U heeft al een verkoopaccount.
        </div>'; 
    }

    if(get_data_view('errors') !== null){
        foreach(get_data_view('errors') as $error){
            echo '<div class="alert alert-danger">' .
            $error .
            '</div>';
        }
    }
?>
            <!-- Alert wordt niet standaard getoond -->
            <div class="alert alert-warning hidden">
              U heeft al een verkoopaccount.
            </div>
            
            <div class="well col-lg-10 col-md-10 col-sm-12 col-xs-12" <?=(check_verkoopaccount($_SESSION['user_data']['gebruikersnaam']) ? "style = 'display : none'" : " ")?>>
                <p>
                    Voordat u in aanmerking komt voor een verkoopaccount, moeten wij u kunnen identificeren.<br>
                    U biedt ons die mogelijkheid door een code aan te vragen die uw account bevordert.
                </p>
            </div>
            <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                <h3>Accountinformatie</h3>
                <div class="well clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <p> 
                            <?php
                            echo "<strong>Email<br>
                            Gebruikersnaam</strong>";
                            ?>
                        </p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <p> 
                            <?php
                            echo $_SESSION['user_data']['emailadres'] . "<br>" 
                            . $_SESSION['user_data']['gebruikersnaam'];
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                <h3>Persoonlijke informatie</h3>
                <div class="well clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <p>
                        <?php
                        $date = $_SESSION['user_data']['geboortedag']->format('d/m/Y');
                        
                        echo "<strong>Voornaam<br>
                        Achternaam<br>
                        Geboortedatum<br>
                        Straatnaam en nummer<br>
                        Postcode<br>
                        Plaatsnaam<br>
                        Land<br>
                        Telefoonnummer</strong>";
                        ?>
                    </p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <p>
                        <?php
                        echo $_SESSION['user_data']['voornaam'] . "<br>"
                        . $_SESSION['user_data']['achternaam'] . "<br>"
                        . $date . "<br>"
                        . $_SESSION['user_data']['adresregel1'] . "<br>"
                        . $_SESSION['user_data']['postcode'] . "<br>"
                        . $_SESSION['user_data']['plaatsnaam'] . "<br>"
                        . $_SESSION['user_data']['landnaam'] . "<br>"
                        . get_telefoon($_SESSION['user_data']['gebruikersnaam'])['telefoon'] . "<br>";   
                        ?>
                        </p>
                </div>
            </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12" <?=(check_verkoopaccount($_SESSION['user_data']['gebruikersnaam']) ? "style = 'display : none'" : " ")?>>
                <form action="<?php echo get_url(true); ?>account/verkoper/registreren/activeren">
                    <p>Heeft u al een code?</p>
                    <button type="submit" class="btn btn-primary">Activeer verkoopaccount</button>
                </form>
            </div>
            <form method="post" class="col-lg-3 col-md-3 col-sm-6 col-xs-12" <?=(check_verkoopaccount($_SESSION['user_data']['gebruikersnaam']) ? "style = 'display : none'" : " ")?>>
                <div class="form-group">
                    <div class="input-group">
                        <label for="identificatiemethode">Identificatiemethode</label><br>   
                        <select class="form-control" name="optie" id="optie" onchange="identificatieKeus(this)">
                            <option value="creditcard">Creditcard</option>
                            <option value="post">Post</option>
                        </select>
                    </div>
                </div>
                    
                <script>
                    function identificatieKeus(identificatie){
                        if(identificatie.value == 'creditcard'){
                           document.getElementById("creditcardnummer").disabled = false;
                           }
                        else{
                           document.getElementById("creditcardnummer").disabled = "disabled"; 
                        }
                    }
                </script>
                 
                <!-- 
                <div class="form-group">
                    <div class="input-group">
                        <label for="betaalmethode">Betaalmethode</label><br>  
                        <select class="form-control" id="betaalmethode">
                            <option value="creditcard2">Creditcard</option>
                            <option value="bankrekening">Bankrekening</option>
                        </select>
                    </div>
                </div>
                -->
                
                <div class="form-group">
                        <div class="input-group">
                            <label for="banknaam">Banknaam</label>   
                            <input type="text" class="form-control" name="banknaam" id="banknaam" value="<?=get_data_view('gegevens','banknaam')?>" required>
                        </div>
                </div>
                <div class="form-group">
                        <div class="input-group">
                            <label for="rekeningnummer">Rekeningnummer</label>   
                            <input type="text" class="form-control" name="rekeningnummer" id="rekeningnummer" value="<?=get_data_view('gegevens','rekeningnummer')?>"  required>
                        </div>
                </div>
            <!-- Inline CSS. Alhoewel dezelfde code toegepast is als bij de andere elementen, wordt er geen ruimte gecreëerd tussen het textveld van 'banknaam' en de label 'creditcardnummer'. -->
                    <div class="form-group">   
                        <div class="input-group">
                            <label for="creditcardnummer">Creditcardnummer</label>   
                            <input type="text" class="form-control" name="creditcardnummer" id="creditcardnummer" value="<?=get_data_view('gegevens','creditcardnummer')?>"  required >
                        </div>
                    </div>
                <button type="submit" class="btn btn-primary" id="bevestig">Bevestig</button>
            </form>
</div>
            
<?php echo display_view('template_footer'); ?>