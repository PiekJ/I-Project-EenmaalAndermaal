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
    <?php include "/php/mail.php"; ?>
        <div class="container">
            <div class="page-header">
                <h2 class="text-primary">Account aanmaken</h2>
            </div>
            <div class="well">
                <h4> De voordelen van een account zijn: </h4>
                <ul>
                    <li> Dat u kunt bieden op veilingen. </li>
                    <li> Dat u een verkoopaccount kan aanvragen voor het sarten van een veiling.</li>
                </ul>
            </div>
            <h4> Uw e-mailadres </h4>
            <form method="post" action="<?=$_SERVER["SCRIPT_FILENAME"]?>">
                <div class="input-group col-md-6">
                    <input type="text" class="form-control " placeholder="e-mailadres" name="email">
                </div>
                <br>
                <p> <button type="submit" class="btn btn-warning btn-xs">Vraag aan</button>
                </p>
            </form>
            <hr/>
            <h4> Uw ontvangen code </h4>
            <div class="input-group col-md-6">
                <input type="text" class="form-control" placeholder="Geheime code">
            </div>
            <br>
            <p> <button type="submit" class="btn btn-warning btn-xs">Registreer</button>
        </div>
    </body>
</html>