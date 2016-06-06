<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>EenmaalAndermaal</title>

        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <link rel="stylesheet" href="./css/template.css">
    </head>


<?php
INCLUDE('php/global.php');
$_CONFIG = [
        'db' => [
            'server_name' => 'CAS-PC\SQLEXPRESS',
            'options' => [
                'Database' => 'iproject16',
                'UID' => 'sa',
                'PWD' => 'lubbers12'
            ]
        ],

        'sitename' => 'EenmaalAndermaal',
        'url' => [
            'domain' => 'localhost:8080', // domain only
            'folder' => '/', // begint en eindigt op 
            'withIndex' => true
        ]
    ]; 



        function generateRubriekenTreeList($rubrieken, $hoofdrubriek)
        {
            $filterRubrieken = array_filter($rubrieken, function($rubriek) use ($hoofdrubriek){
                return $rubriek['hoofdrubriek'] == $hoofdrubriek;
            });

            usort($filterRubrieken, function($a, $b) {
                return $a['volgnr'] - $b['volgnr'];
            });

            foreach ($filterRubrieken as $rubriek)
            {
                $rubrieknaam = str_replace('  ', '', $rubriek['rubrieknaam']);

                if ($rubriek['heeftSubrubriek'])
                {
                    $id = 'rubriek-collapse-' . $rubriek['rubrieknummer'];

                    printf('<li><a href="#%s" data-toggle="collapse">%s</a><ul class="collapse" id="%s">', $id, $rubrieknaam, $id);

                    generateRubriekenTreeList($rubrieken, $rubriek['rubrieknummer']);

                    echo '</ul></li>';
                }
            
            }
        };

        $rubrieken = get_data_view('rubrieken');
        generateRubriekenTreeList($rubrieken, -1);
    ?>

        

    
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
                            <li class="active"><a href="#">Registreren</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="row">
                <div class="col-md-12">
                    <h2 class="header-pagetitle">Registratie veiling</h2>

                    <ul class="breadcrumb">
                        <li><a href="#">EenmaalAndermaal</a></li>
                        <li class="active">Registratie veiling</li>
                    </ul>
                </div>
            </div>


            <div class="row">
            </div>
        </div>

        <div class="container">
            <div class="col-lg-4 col-md-4 col-x-3 col-xs-3">
                <h3>Groep</h3>
                <div >
                    <ul >
                
                                                              
               <?php echo get_data_view('rubrieken'); ?>
                
                      
                        
                    </ul>

                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-x-3 col-xs-3">
                 <h3>Rubriek</h3>

                    </ul>
                </div>
            </div>
        </div>

        <div class="container">
            <div>
                <h4>Gekozen rubriek</h4>
                <p>Fietsen > Mountainbike</p>
                <p>
                    <a href="#" class="btn btn-warning btn-md" role="button">Verder </a>  
                </p>
            </div>

        </div>


        <script src="./js/jquery-1.12.3.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
    </body>
</html>