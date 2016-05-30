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

    require_once ROUTES_FOLDER . 'account.php';
    require_once ROUTES_FOLDER . 'veilingen.php';

    add_route('GET', '', function() {
        set_data_view('menu', 0);
        set_data_view('title', 'Home');
        
        set_data_view('aflopende_veilingen', get_aflopende_veilingen());
        
        if(isset($_COOKIE['zoekopdracht'])){
            set_data_view('aanbevolen_veilingen', get_aanbevolen_veilingen($_COOKIE['zoekopdracht']));
        }
        else{
            set_data_view('aanbevolen_veilingen', get_veilingen());
        }
        set_data_view('rubrieken', get_rubrieken());
        $rubrieken = display_view('veilingen_rubrieken');
        store_cache('veilingen_rubrieken', $rubrieken);

        set_data_view('rubrieken', $rubrieken);

        if ($rubrieken_cache = fetch_cache('home_rubrieken'))
        {
            set_data_view('rubrieken', $rubrieken_cache);

        }
        else
        {
            set_data_view('rubrieken', get_rubrieken());
            $rubrieken = display_view('home_rubrieken');
            store_cache('home_rubrieken', $rubrieken);

            set_data_view('rubrieken', $rubrieken);
        }

        return display_view('home');
    });

    exit(execute_route(get_request_method(), get_request_uri()));