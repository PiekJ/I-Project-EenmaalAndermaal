<?php

    add_route('GET', 'account\/login', function() {
        if (is_user_logged_in())
        {
            location();
            return;
        }

        set_data_view('menu', 4);
        set_data_view('title', 'Login');

        return display_view('account_login');
    });

    add_route('POST', 'account\/login', function() {
        if (is_user_logged_in())
        {
            location();
            return;
        }

        if (!isset($_POST['username'], $_POST['password']))
        {
            location();
            return;
        }

        if (try_login_user($_POST['username'], $_POST['password'], false))
        {
            if (isset($_POST['rememberusername']))
            {
                set_rememberusername_cookie($_POST['username']);
            }

            if (isset($_POST['rememberme']))
            {
                set_rememberme_cookies($_POST['username'], $_POST['password']);
            }

            location();
            return;
        }
        
        location('account/login?username=' . $_POST['username']);
        return;
    });

    add_route('GET', 'account\/logout', function() {
        logout_user();
        location();
        return;
    });

    add_route('GET', 'account\/registreren', function() {

    });

    add_route('GET', 'account\/verkoper\/registreren', function() {

    });