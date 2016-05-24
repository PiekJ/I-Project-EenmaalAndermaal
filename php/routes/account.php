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
        if (is_user_logged_in())
        {
            location();
            return;
        }
        
        set_data_view('menu', 5);
        set_data_view('title', 'Account aanvragen');
        

        return display_view('account_registreren_code');
    });

    add_route('POST', 'account\/registreren', function(){
        if (is_user_logged_in())
        {
            location();
            return;
        }
        
        if(check_email_exists($_POST['email'])){
            set_data_view('email_exists', true);
        }
        else{    
            set_data_view('email_exists', false);
            
            if(isset($_POST['email'])){
                $sent = send_activation_code_user($_POST['email']);

                set_data_view('sent', $sent);

            }

            if(isset($_POST['code'])){
                if(isset($_COOKIE['registratie_code']) && md5($_POST['code']) == $_COOKIE['registratie_code']){
                    $_SESSION['code_aangevraagd'] = true;
                    location('account/registreren/formulier');
                }
            }
        }
        set_data_view('menu', 5);
        set_data_view('title', 'Account aanvragen');
        

        return display_view('account_registreren_code');
    });

    add_route('GET', 'account\/registreren\/formulier', function() {
        if(is_user_logged_in())
        {
            location();
            return;
        }
        if(!isset($_SESSION['code_aangevraagd'])){
            location('account/registreren');
        }
        
        set_data_view('title', 'Registratie formulier');
        set_data_view('vragen', get_vragen());

        return display_view('account_registreren_formulier');
        
    });

    add_route('POST', 'account\/registreren\/formulier', function() {
        
        if (is_user_logged_in())
        {
            location();
            return;
        }
    if($_POST['wachtwoord'] == $_POST['wachtwoordOpnieuw']){
        
        set_data_view('wachtwoorden_overeen', true);
        
        $geregistreerd = register_user($_POST['gebruikersnaam'], $_POST['voornaam'], $_POST['achternaam'], $_POST['adresregel1'], '', $_POST['postcode'], $_POST['plaatsnaam'], $_POST['landnaam'], $_POST['geboortedatum'], $_POST['geslacht'],  $_SESSION['email'], password_hash($_POST['wachtwoord']), $_POST['telefoonnummer'], $_POST['beveilingsvraag'], $_POST['antwoordTekst']);         

        if($geregistreerd){
            try_login_user($_POST['gebruikersnaam'], $_POST['wachtwoord'], false);

             location('account/login?username=' . $_POST['gebruikersnaam']);
            return;
        }
    }
    else{
        set_data_view('wachtwoorden_overeen', false);
    }
        set_data_view('title', 'Registratie formulier');
        return display_view('account_registreren_formulier');
        
    });
    
    add_route('GET', 'account\/verkoper\/registreren', function() {

    });
    
    add_route('GET', 'account\/vergeten', function(){
        if (is_user_logged_in())
        {
            location();
            return;
        }
                
        set_data_view('title', 'Wachtwoord vergeten');
        set_data_view('vragen', get_vragen());
        
        return display_view('account_vergeten');
    });

    add_route('POST', 'account\/vergeten', function(){
        if (is_user_logged_in())
        {
            location();
            return;
        }
                
        set_data_view('title', 'Wachtwoord vergeten');
        set_data_view('vragen', get_vragen());
        
        if(wachtwoord_vergeten_bevestigen($_POST['email'])){
            
            set_data_view('correct', true);
            
            $sent = send_password_user($_POST['email']);
            set_data_view('sent', $sent);
        }
        else{
            set_data_view('correct', false);
        }
        
        return display_view('account_vergeten');
    
     });