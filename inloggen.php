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
                <h2>Inloggen</h2>
            </div>
            
            <!-- Alert wordt niet standaard getoond -->
            <div class="alert alert-warning hidden">
              U moet ingelogd zijn om deze pagina te kunnen zien.
            </div>
            <!-- -->
            
            <div class="row">
            <form class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="text" class="form-control" id="gebruikersnaam" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>    
                        <input type="password" class="form-control" id="wachtwoord" placeholder="">
                    </div>
                </div>
                <div class="checkbox">
                    <label value="onthouden"><input type="checkbox">Gebruikersnaam onthouden</label>
                </div>
                <div class="checkbox">
                    <label value="blijven"><input type="checkbox">Ingelogd blijven</label>
                </div>
                
                <button type="submit" class="btn btn-primary">Inloggen</button>
            </form>
            <p>Nog geen account? Maak er <a href="#">hier</a> één aan.</p>
            <p>Wachtwoord vergeten? Klik <a href="#">hier</a>.</p>
        </div>
    </body>
</html>