<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width = device-width, initial-scale = 1">
        <title>EenmaalAndermaal</title>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="page-header">
                <h2>Inloggen</h2>
            </div>
            <form>
                <div class="form-group">
                    <div class="input-group col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        <span class="input-group-addon"><span class="glyphicon-user"></span></span>
                        <input type="text" class="form-control" id="gebruikersnaam" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        <span class="input-group-addon"><span class="glyphicon-lock"></span></span>    
                        <input type="email" class="form-control" id="wachtwoord" placeholder="">
                    </div>
                </div>
                <input type="checkbox">
                <p>Gebruikersnaam onthouden</p>
                <input type="checkbox">
                <p>Ingelogd blijven</p>
                <button type="submit" class="btn btn-primary">Inloggen</button>
            </form>
        </div>
    </body>
</html>