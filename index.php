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
                            <li><a href="#">Start nieuwe vieling</a></li>
                            <li><a href="#">Aanmaken verkoopaccount</a></li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#">Login</a></li>
                            <li><a href="#">Registreren</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="row">
                <div class="col-md-12">
                    <h2 class="header-pagetitle">Home</h2>

                    <ul class="breadcrumb">
                        <li><a href="#">EenmaalAndermaal</a></li>
                        <li class="active">Home</li>
                    </ul>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <form action="#" method="post">
                        <div class="input-group input-group-lg search-group">
                            <input type="text" name="search" class="form-control search-form-control" placeholder="Zoeken...">
                            <select name="rubriek" class="form-control rubriek-form-control">
                                <option value="0" selected>Alle rubrieken</option>
                            </select>
                            <span class="input-group-btn">
                                <input type="submit" class="btn btn-primary" value="Zoeken">
                            </span>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h3>Aanbevolen veilingen</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h3>Aflopende veilingen</h3>
                </div>
            </div>
        </div>


        <script src="./js/jquery-1.12.3.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
    </body>
</html>