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
                set_rememberme_cookies($_POST['username'], get_user_data('password'));
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
        if(isset($_POST['email'])){
            if(check_email_exists($_POST['email'])){
                set_data_view('email_exists', true);
            }
            else{    
                set_data_view('email_exists', false);

                    $sent = send_activation_code_user($_POST['email']);

                    set_data_view('sent', $sent);
            }
        }

            if(!empty($_POST['code']) && !empty($_COOKIE['registratie_code'])){
                if(md5($_POST['code']) == $_COOKIE['registratie_code']){
                    $_SESSION['code_aangevraagd'] = true;
                    location('account/registreren/formulier');
                    set_data_view('code_correct', true);
                }
                else{
                    set_data_view('code_correct', false);
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
        //VOOR TESTEN
        //$_SESSION['code_aangevraagd'] = true;
        //$_SESSION['email'] = 'henk@hotmail.com';
        
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
    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //ERRORS
    
        $errors = [];
		if (strlen($_POST['gebruikersnaam']) < 5)
		{
			$errors[] = 'Gebruikersnaam is te kort, deze moet minimaal 5 tekens lang zijn';
		}
		else if (strlen($_POST['gebruikersnaam']) > 25)
		{
			$errors[] = 'Gebruikersnaam is te lang, deze kan maximaal 25 tekens lang zijn';
		}
		else if (check_username_exists($_POST['gebruikersnaam']))
		{
			$errors[] = 'Gebruikersnaam bestaad al, kies een andere';
		}

		if (strlen($_POST['wachtwoord']) < 6)
		{
			$errors[] = 'Wachtwoord is te kort, deze moet minimaal 6 tekens lang zijn';
		}

		else if ($_POST['wachtwoord'] != $_POST['wachtwoordOpnieuw'])
		{
			$errors[] = 'Wachtwoord en het herhaalde wachtwoord zijn ongelijk aan elkaar';
		}

		if (!isset($_POST['geslacht']) || !in_array(@$_POST['geslacht'], ['man', 'vrouw']))
		{
			$errors[] = 'U heeft geen geslacht opgegeven.';
		}

		if (empty($_POST['voornaam']))
		{
			$errors[] = 'U heeft geen voornaam opgegeven.';
		}

		if (empty($_POST['achternaam']))
		{
			$errors[] = 'U heeft geen achternaam opgegeven.';
		}

		if (!preg_match('/^[0-9]{4}[A-Z]{2}$/i', $_POST['postcode']))
		{
			$errors[] = 'U heeft geen geldig postcode opgegeven';
		}
        if (!preg_match('/06[0-9]{8}/', $_POST['telefoonnummer']) || !preg_match('/0[0-9]{3}[0-9]{6}/', $_POST['telefoonnummer']))
        {
            $errors[] = 'U heeft geen geldig telefoonnummer opgegeven';
        }
          
    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        
    if (empty($errors)){
                
        $geregistreerd = register_user($_POST['gebruikersnaam'], $_POST['voornaam'], $_POST['achternaam'], $_POST['adresregel1'], '', $_POST['postcode'], $_POST['plaatsnaam'], $_POST['landnaam'], $_POST['geboortedatum'], $_POST['geslacht'],  $_SESSION['email'], md5($_POST['wachtwoord']), $_POST['telefoonnummer'], $_POST['beveilingsvraag'], $_POST['antwoordTekst']);         

        if($geregistreerd){
            try_login_user($_POST['gebruikersnaam'], $_POST['wachtwoord'], false);

            location();
            return;
        }
    }
        
		set_data_view('gegevens', $_POST);
		set_data_view('errors', $errors);
        set_data_view('vragen', get_vragen());
        
        set_data_view('title', 'Registratie formulier');
        return display_view('account_registreren_formulier');
        
    });
    
    add_route('GET', 'account\/verkoper\/registreren', function() {
        if(!is_user_logged_in())
        {
            location();
            return;
        }
        
        set_data_view('title', 'Aanvragen verkoopaccount');
        set_data_view('menu', 3);

        return display_view('account_verkoper_registreren');

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

    add_route('GET', 'account\/verkoper\/registreren\/activeren', function(){
        if (!is_user_logged_in())
        {
            location();
            return;
        }
        
        set_data_view('title', 'Verkoopaccount activeren');
        return display_view('account_verkoper_registreren_code');
        
    });