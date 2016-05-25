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

    add_route('GET', '', function() {
        set_data_view('menu', 0);
        set_data_view('title', 'Home');

        return display_view('home');
    });

    add_route('GET', 'veilingen(|\/(?<rubriek>.*+))', function($rubriek = null) {
        set_data_view('menu', 1);
        set_data_view('title', 'Veilingen');

        return display_view('veilingen');
    });

    exit(execute_route(get_request_method(), get_request_uri()));