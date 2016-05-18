<?php

    require_once './php/global.php';

    set_data_view('sitename', $_CONFIG['sitename']);

    set_data_view('title', 'Pagina niet gevonden');
    set_data_view('menu', -1);

    add_route('GET', '', function() {
        set_data_view('menu', 0);
        set_data_view('title', 'Home');

        return display_view('home');
    });

        set_data_view('menu', 1);
        set_data_view('title', 'Veilingen');

        return display_view('veilingen');
    });

    exit(execute_route(get_request_method(), get_request_uri()));