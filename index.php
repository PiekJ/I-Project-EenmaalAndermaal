<?php

    require_once './php/global.php';

    set_data_view('sitename', $_CONFIG['sitename']);

    set_data_view('title', 'Pagina niet gevonden');
    set_data_view('menu', -1);

    // verify cookie login
    if (isset($_COOKIE['username'], $_COOKIE['password']))
    {
        if (!try_login_user($_COOKIE['username'], $_COOKIE['password'], true))
        {
            clear_rememberme_cookies();
        }
    }

    require_once CRONJOBS_FOLDER . 'veilingen.php';

    require_once ROUTES_FOLDER . 'account.php';
    require_once ROUTES_FOLDER . 'veilingen.php';

    add_route('GET', '', function() {
        set_data_view('menu', 0);
        set_data_view('title', 'Home');
        
        set_data_view('aflopende_veilingen', get_veilingen(null, null, 0, 4, 'looptijdEind'));
                
        if(isset($_COOKIE['zoekterm']) && !isset($_COOKIE['zoekrubriek'])){
            set_data_view('aanbevolen_veilingen', get_veilingen(null, $_COOKIE['zoekterm'], 0, 4, 'NEWID()'));
        } 
        else if(isset($_COOKIE['zoekrubriek']) && !isset($_COOKIE['zoekterm'])){
            $zoekrubriek = (!empty($_COOKIE['zoekrubriek'])) ? $_COOKIE['zoekrubriek'] : null;

            set_data_view('aanbevolen_veilingen', get_veilingen($zoekrubriek, null, 0, 4, 'NEWID()'));
        } 
        else if(isset($_COOKIE['zoekrubriek'], $_COOKIE['zoekterm'])){
            $zoekrubriek = (!empty($_COOKIE['zoekrubriek'])) ? $_COOKIE['zoekrubriek'] : null;

            set_data_view('aanbevolen_veilingen', get_veilingen($zoekrubriek, $_COOKIE['zoekterm'], 0, 4, 'NEWID()'));
        }

        if ($rubrieken_cache = fetch_cache('home_rubrieken'))
        {
            set_data_view('rubrieken', $rubrieken_cache);
        }
        else
        {
            set_data_view('rubrieken', get_rubrieken());
            $rubrieken = display_view('home_rubrieken');
            store_cache('home_rubrieken', $rubrieken, time() + 3600 * 12);

            set_data_view('rubrieken', $rubrieken);
        }

        return display_view('home');
    });

    execute_cronjobs();

    exit(execute_route(get_request_method(), get_request_uri()));