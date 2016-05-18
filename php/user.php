<?php

    // logt user in
    function try_login_user($username, $password, $password_hashed = null)
    {
        $password_hashed = (is_bool($password_hashed)) ? $password_hashed : false;

        $db = get_db();

        $sql = 'SELECT * FROM Gebruiker WHERE gebruikersnaam = ?';

        $result = sqlsrv_query($db, $sql, [$username]);
        if($result === false)
        {
            die(var_export(sqlsrv_errors(), true));
        }

        if ($user_data = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
        {
            if ($password_hashed === false && password_verify($password, $user_data['wachtwoord']) ||
                $password_hashed === true && $password == $user_data['wachtwoord'])
            {
                $_SESSION['user_data'] = $user_data;
                $_SESSION['user_logged_in'] = true;

                return true;
            }
        }

        return false;
    }

    // set de rememberme cookies
    function set_rememberme_cookies($username, $password_hash)
    {
        setcookie('username', $username, PHP_INT_MAX, '/');
        setcookie('password', $password_hash, PHP_INT_MAX, '/');
    }

    function set_rememberusername_cookie($username)
    {
        setcookie('username', $username, PHP_INT_MAX, '/');
    }

    // clear de rememberme cookies
    function clear_rememberme_cookies()
    {
        setcookie('username', '', 0, '/');
        setcookie('password', '', 0, '/');
    }

    // controleert of username bestaat
    function check_username_exists($username)
    {
        $db = get_db();

        $sql = 'SELECT COUNT(*) AS AANTAL FROM Gebruiker WHERE gebruikersnaam = ?';

        $result = sqlsrv_query($db, $sql, [$username]);
        if($result === false)
        {
            die(var_export(sqlsrv_errors(), true));
        }

        if ($count_data = sqlsrv_fetch_array($result, SQLSRV_FETCH_NUMERIC))
        {
            return $count_data[0] > 0;
        }
        else
        {
            return false;
        }
    }

    function send_activation_code_user($email)
    {
        // generates a actication code XXxx
        // sets a cookie with the value XXxx
        // sends the XXxx to the $email
        // returns true/false if mail send succesfully (when false, delete the cookie)
    }

    // registreert gebruiker
    function registrer_user($username, $firstname, $lastname, $address1, $address2, $zipcode, $town, $country, $birthday, $sexe, $email, $password, $question, $question_awnser)
    {
        return false;

        $db = get_db();

        $sql = 'INSERT INTO Gebruiker (gebruikersnaam, voornaam, achternaam, adresregel1, adresregel2, postcode, plaatsnaam, landnaam, geboortedag, geslacht, emailadres, wachtwoord, vraag, antwoordTekst) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';

        $result = sqlsrv_query($db, $sql, func_get_args()); // func_get_args, luiheid..... x]
        if($result === false)
        {
            die(var_export(sqlsrv_errors(), true));
        }

        return true;
    }

    // haalt user data op uit session
    function get_user_data($field)
    {
        if (is_user_logged_in() && isset($_SESSION['user_data'][$field]))
        {
            return $_SESSION['user_data'][$field];
        }

        return null;
    }

    // log user uit
    function logout_user()
    {
        clear_rememberme_cookies();

        return session_destroy();
    }

    // checkt of user is ingelogd
    function is_user_logged_in()
    {
        return !empty($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'];
    }