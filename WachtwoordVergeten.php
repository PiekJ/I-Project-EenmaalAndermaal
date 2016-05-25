<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>EenmaalAndermaal</title>

        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/template.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <img class="header-logo" src="./images/logo.png" alt="EenmaalAndermaal">

                    <h1 class="header-title">EenmaalAndermaal</h1>
                </div>
            </div>

            <nav class="navbar navbar-default navbar-template">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <div class="collapse navbar-collapse" id="navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#">Home</a></li>
                            <li><a href="#">Veilingen</a></li>
                            <li><a href="#">Start nieuwe veiling</a></li>
                            <li><a href="#">Aanmaken verkoopaccount</a></li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#">Login</a></li>
                            <li class="active"><a href="#">Registreren</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="row">
                <div class="col-md-12">
                    <h2 class="header-pagetitle">Wachtwoord vergeten</h2>

                    <ul class="breadcrumb">
                        <li><a href="#">EenmaalAndermaal</a></li>
                        <li class="active">Wachtwoord vergeten</li>
                    </ul>
                </div>
            </div>


            <div class="row">
            </div>
        </div>

        <div class="container">
            <div class="col-lg-4 col-md-5 col-sm-8- col-xs-12">

            <form>

              <fieldset class="form-group">
                <label for="emailadres">Uw emailadres</label>
                <input type="email" class="form-control" name="emailadres" placeholder="Uw emailadres">
              </fieldset>

              <fieldset class="form-group">
                <label for="selectie">Uw beveiligingsvraag</label>
                <select class="form-control" name="geselecteerdBeveilingsvraag">
                  <option>Wat is de meisjesnaam van uw moeder?</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
              </fieldset>

              <fieldset class="form-group">
                <label for="antwoord">Antwoord</label>
                <input type="text" class="form-control" name="antwoord" placeholder="Uw antwoord">
                <!--    optioneel mededeling
                <small class="text-muted">Let op! Uw antwoord is hoofdlettergevoelig</small>
            -->
              </fieldset>
            
            <button type="submit" class="btn btn-warning">Vraag aan</button>

            </form>

        </div>


        <script src="./js/jquery-1.12.3.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
    </body>
</html>