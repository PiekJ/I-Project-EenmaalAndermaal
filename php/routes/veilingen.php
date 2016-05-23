<?php

    add_route('GET', 'veilingen(|\/(?<rubriek>.*+))', function($rubriek = null) {
        set_data_view('menu', 1);
        set_data_view('title', 'Veilingen');

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

        set_data_view('rubrieken', get_rubrieken(true));

        return display_view('veilingen');
    });