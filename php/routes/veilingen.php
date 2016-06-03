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
            //slaat gegeven rubriek op voor aanbevolen veilingen op de homepage
            setcookie('zoekterm', $_GET['search'], PHP_INT_MAX, '/');
            setcookie('zoekrubriek', $_GET['rubriek'], PHP_INT_MAX, '/'); 
            
            set_data_view('veilingen', get_veilingen($_GET['rubriek'], $_GET['search']), 0);

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