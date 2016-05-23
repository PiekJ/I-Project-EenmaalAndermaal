<?php

    add_route('GET', 'veilingen(|\/(?<rubriek>.*+))', function($rubriek = null) {
        set_data_view('menu', 1);
        set_data_view('title', 'Veilingen');

        if (!isset($_GET['search'], $_GET['rubriek']))
        {
            if (!empty($rubriek))
            {
                $rubriek = urldecode($rubriek);
                $rubriek_id = get_rubriek_id($rubriek);

                set_data_view('veilingen', get_veilingen($rubriek_id));
            }
            else
            {
                set_data_view('veilingen', get_veilingen());
            }
        }
        else
        {
            set_data_view('veilingen', get_veilingen($_GET['rubriek'], $_GET['search']));
        }

        set_data_view('rubrieken', get_rubrieken(true));

        return display_view('veilingen');
    });

    add_route('GET', 'veiling\/(?<voorwerpnummer>[0-9]+)', function($voorwerpnummer) {
        set_data_view('menu', 1);
        set_data_view('title', 'Veiling');

        $veiling = get_veiling($voorwerpnummer);

        if (empty($veiling))
        {
            location('');
            return;
        }

        set_data_view('veiling', $veiling);

        return display_view('veiling');
    });