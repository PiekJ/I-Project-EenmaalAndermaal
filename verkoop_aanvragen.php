<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width = device-width, initial-scale = 1">
        <title>EenmaalAndermaal</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/template.css">
    </head>
    <body>
        <div class="container">
            <div class="page-header">
                <h2>Aanvragen verkoopaccount</h2>
            </div>
            
            <!-- Alert wordt niet standaard getoond -->
            <div class="alert alert-warning hidden">
              U heeft al een verkoopaccount.
            </div>
            <!-- -->
            
            <div class="textfield col-lg-10 col-md-10 col-sm-12 col-xs-12">
                <p>
                    Voordat u in aanmerking komt voor een verkoopaacount, moeten wij u kunnen identificeren.<br>
                    U biedt ons die mogelijkheid door een code aan te vragen die uw account bevordert.<br>
                    Dit kan door die code aan te vragen per post of door bevestiging via een bankrekening of creditcard.
                </p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <h3>Accountinformatie</h3>
                <div class="textfield">
                    <p> 
                        <?php
                        echo "Email<br>";
                        echo "Gebruikersnaam";
                        //Hier accountinformatie
                        ?>
                    </p>

                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <h3>Persoonlijke informatie</h3>
                <div class="textfield">
                    <p>
                        <?php
                        echo "Voornaam<br>";
                        echo "Achternaam<br>";
                        echo "Geboortedatum<br>";
                        echo "Straatnaam en nummer<br>";
                        echo "Postcode<br>";
                        echo "Plaatsnaam<br>";
                        echo "Land<br>";
                        echo "Telefoonnummer<br>";   
                        //Hier persoonlijke informatie
                        ?>
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <p>Heeft u al een code ontvangen?</p>
                <button type="submit" class="btn btn-primary">Activeer verkoopaccount</button>
            </div>
            <form class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="form-group">
                    <div class="input-group">
                        <label for="identificatiemethode">Identificatiemethode</label><br>   
                        <select class="form-control" id="identificatiemethode">
                            <option value="creditcard">Creditcard</option>
                            <option value="post">Post</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <label for="betaalmethode">Betaalmethode</label><br>  
                        <select class="form-control" id="betaalmethode">
                            <option value="creditcard2">Creditcard</option>
                            <option value="bankrekening">Bankrekening</option>
                        </select>
                    </div>
                    
                    <div class="input-group">
                        <label for="banknaam">Banknaam</label>   
                        <input type="text" class="form-control" id="banknaam">
                    </div>
                    
                    <div class="input-group">
                        <labe for="rekeningnummer">Rekeningnummer</label>   
                        <input type="text" class="form-control" id="rekeningnummer">
                    </div>
                    
                    <div class="input-group">
                        <label for="creditcardnummer">Creditcardnummer</label>   
                        <input type="text" class="form-control" id="creditcardnummer">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Bevestig</button>
            </form>
        </div>
    </body>
</html>