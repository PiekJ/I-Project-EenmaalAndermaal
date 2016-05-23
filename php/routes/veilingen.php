<?php

    add_route('GET', 'veilingen(|\/(?<rubriek>.*+))', function($rubriek = null) {
        set_data_view('menu', 1);
        set_data_view('title', 'Veilingen');

        set_data_view('rubrieken', get_rubrieken(true));

        return display_view('veilingen');
    });