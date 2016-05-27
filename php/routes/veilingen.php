<?php

    add_route('GET', 'veilingen(|\/(?<rubrieknummer>[0-9]+))', function($rubrieknummer = null) {
        set_data_view('menu', 1);
        set_data_view('title', 'Veilingen');
        
        

        if (!isset($_GET['search'], $_GET['rubriek']))
        { 
            if (!empty($rubrieknummer))
            {
                set_data_view('veilingen', get_veilingen($rubrieknummer, null, 0));
            }
            else
            {
                set_data_view('veilingen', get_veilingen(null, null, 0));
            }
        }
        else
        {
            //slaat gegeven rubriek op voor aanbevolen veilingen op de homepage
            setcookie('zoekopdracht', $_GET['rubriek'], PHP_INT_MAX, '/'); 
            
            set_data_view('veilingen', get_veilingen($_GET['rubriek'], $_GET['search']), 0);
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