<?php

    add_route('GET', 'veilingen(|\/(?<rubrieknummer>[0-9]+))', function($rubrieknummer = null) {
        set_data_view('menu', 1);
        set_data_view('title', 'Veilingen');

        $pagination_current = (!empty($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 0;
        $pagination_max = 30;
        $pagination_url = get_url(true) . 'veilingen';

        if (empty($_GET['search']) && empty($_GET['rubriek']))
        {
            if (!empty($rubrieknummer))
            {
                set_data_view('veilingen', get_veilingen($rubrieknummer, null, $pagination_current, $pagination_max, 'looptijdEindDag, looptijdEindTijd', 'DESC'));
                $pagination_url .= '/' . $rubrieknummer;
            }
            else
            {
                set_data_view('veilingen', get_veilingen(null, null, $pagination_current, $pagination_max, 'looptijdEindDag, looptijdEindTijd', 'DESC'));
            }

            $pagination_url .= '?page=';
        }
        else
        {
            $rubriek = (!empty($_GET['rubriek'])) ? $_GET['rubriek'] : null;

            set_data_view('veilingen', get_veilingen($rubriek, $_GET['search'], $pagination_current, $pagination_max, 'looptijdEindDag, looptijdEindTijd', 'DESC'));
            $pagination_url .= '?search=' . $_GET['search'] . '&rubriek=' . $_GET['rubriek'] . '&page=';
        }

        if ($rubrieken_cache = fetch_cache('veilingen_rubrieken'))
        {
            set_data_view('rubrieken', $rubrieken_cache);

        }
        else
        {
            set_data_view('rubrieken', get_rubrieken());
            $rubrieken = display_view('veilingen_rubrieken');
            store_cache('veilingen_rubrieken', $rubrieken);

            set_data_view('rubrieken', $rubrieken);
        }

        set_data_view('pagination_current', $pagination_current);
        set_data_view('pagination_max', $pagination_max);
        set_data_view('pagination_url', $pagination_url);

        return display_view('veilingen');
    });

    add_route('GET', 'veiling\/(?<voorwerpnummer>[0-9]+)', function($voorwerpnummer) {
        set_data_view('menu', 1);
        set_data_view('title', 'Veiling');

        $veiling = get_veiling($voorwerpnummer);

        if (empty($veiling))
        {
            location();
            return;
        }

        set_data_view('veiling', $veiling);

        return display_view('veiling');
    });

    add_route('POST', 'veiling\/(?<voorwerpnummer>[0-9]+)\/bod', function($voorwerpnummer) {
        
    });

    add_route('POST', 'veiling\/(?<voorwerpnummer>[0-9]+)\/email', function($voorwerpnummer) {

    });

    add_route('GET','veiling\/create', function(){
        set_data_view('menu', 2);
        set_data_view('title', 'Veiling maken');


        return display_view('veiling_formulier');
    });


    add_route('POST', 'veiling\/create', function(){

        $errors=[];

        if(strlen($_POST['titel']) < 3)
        {
            $errors[] ='Titel is te kort';
        }
        
        else if(strlen($_POST['titel']) > 255)
        {
            $errors[] = 'Titel is te lang';
        }

        if(empty($_POST['land']))
        {
            $errors[] = 'U heeft geen land opgegeven';
        }
        elseif(strlen($_POST['land']) > 90)
        {
            $errors[] = 'Landnaam te lang, deze kan maximaal 90 tekens lang zijn';
        }

        if(empty($_POST['beschrijving']))
        {
            $errors[] = 'U heeft geen beschrijving opgegeven';
        }

        if (empty($_POST['plaatsnaam'])) 
        {
            $errors[] ='U heeft geen plaatsnaam opgegeven';
        }
        elseif (strlen($_POST['plaatsnaam']) > 50)  {
            $errors[] ='Plaatsnaam te lang, deze kan maximaal 50 tekens lang zijn';
        }

        if (empty($_POST['startprijs'])) 
        {
            $errors[] ='U heeft geen startprijs opgegeven';
        }

        if (empty($_POST['betalingswijze'])) 
        {
            $errors[] ='U heeft geen betalingswijze  opgegeven';
        }
        
        if (strlen($_POST['betalingsinstructie']) > 255) 
        {
            $errors[] ='betalingsinstructie te lang, deze kan maximaal 255 karakters bevatten';
        }
    
        if (empty($_POST['verzendkosten'])) 
        {
            $errors[] ='U heeft geen verzendkosten opgegeven';
        }

        if (strlen($_POST['verzendinstructies']) > 255 && strlen($_POST['verzendinstructies']) < 0) 
        {
            $errors[] ='verzendinstructies te groot, deze kan maximaal 255 karakters bevatten';
        }

        if (empty($_POST['startdatum'])) 
        {
            $errors[] ='U heeft geen startdatum opgegeven';
        }

        if (empty($_POST['starttijd'])) 
        {
            $errors[] ='U heeft geen starttijd opgegeven';
        }

        if (empty($_POST['einddatum'])) 
        {
            $errors[] ='U heeft geen einddatum opgegeven';
        }


        if(empty($errors))
        {
            $veilingstart = add_veiling($_POST['titel'], $_POST['beschrijving'], $_POST['startprijs'], $_POST['betalingswijze'], $_POST['betalingsinstructie'], $_POST['plaatsnaam'], $_POST['land'], $_POST['startdatum'], $_POST['starttijd'], $_POST['verzendkosten'], $_POST['verzendinstructies'], 'henk', $_POST['einddatum'], '1', 'filenaam' );
            echo '<h1>FOUT</h1>';
        }
        set_data_view('gegevens', $_POST);
        set_data_view('errors', $errors);
        set_data_view('title', 'Veiling maken');

        return display_view('veiling_formulier');
    });

