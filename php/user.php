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
            if ($password_hashed === false && crypt($password, $user_data['wachtwoord']) ||
                $password_hashed === true && $password == $user_data['wachtwoord'])
            {
                $_SESSION['user_data'] = $user_data;
                $_SESSION['user_logged_in'] = true;

                return true;
            }
        }

        return false;
    }

    function wachtwoord_vergeten_bevestigen($email){
        $db = get_db();

        $sql = 'SELECT * FROM Gebruiker WHERE emailadres = ?';

        $result = sqlsrv_query($db, $sql, [$email]);
        if($result === false)
        {
            die(var_export(sqlsrv_errors(), true));
        }

        if ($user_data = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
        {
            if ($_POST['email'] == $user_data['emailadres'] &&
                $_POST['beveiligingsvraag'] == $user_data['vraag'] &&
                $_POST['antwoord'] == $user_data['antwoordTekst']){
                
                return true;
            }
            else{
                return false;
            }
        }
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

    function check_email_exists($email)
    {
        $db = get_db();

        $sql = 'SELECT COUNT(*) AS AANTAL FROM Gebruiker WHERE emailadres = ?';

        $result = sqlsrv_query($db, $sql, [$email]);
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
    function check_verkoopaccount($gebruikersnaam)
    {
        $db = get_db();

        $sql = 'SELECT Verkoper 
        FROM Gebruiker 
        WHERE gebruikersnaam = ?';

        $result = sqlsrv_query($db, $sql, [$gebruikersnaam]);
        if($result === false)
        {
            die(var_export(sqlsrv_errors(), true));
        }
        
        $heeft_verkoopaccount = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
        
        if ($heeft_verkoopaccount['Verkoper'] == '1')
        {
                return true;
        }
        else
        {   
                //echo "false";
                return false;
        }
        
    }

    function send_activation_code_user($email)
    {
        $char = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxz";
        $code = substr(str_shuffle($char), 0, 6);
        $hashcode = md5($code);

        $message = 'Bedankt voor het bezoeken van de veilingwebsite EenmaalAndermaal!<br>
                Vul de volgende code <a href="' . get_url(true) . 'account/registreren">hier</a> in: ' . $code;
        
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        if($sent = mail($email, "EenmaalAndermaal registratiecode", $message, $headers)){
            setcookie("registratie_code", $hashcode, time() + 7200, "/");
            $_SESSION['email'] = $email;
        }
        else{
            setcookie("registratie_code", "",  0 , "/");
        }
        return $sent;
    }
    
    function send_password_user($email)
    {
        
        $char = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxz";
        $code = substr(str_shuffle($char), 0, 6);
        $hashcode = crypt($code);
        
        $db = get_db();
 
        $sql = "UPDATE Gebruiker
                SET wachtwoord = '" . $hashcode . "'
                WHERE emailadres = ?";
 
        $result = sqlsrv_query($db, $sql, [$email]);
        
        if($result === false)
        {
            die(var_export(sqlsrv_errors(), true));
        }

        $message = 'Uw nieuwe wachtwoord is "' . $code . '".';
        
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        
        $sent = mail($email, "EenmaalAndermaal vergeten wachtwoord", $message, $headers);

        return $sent;
    }

    function register_user($username, $firstname, $lastname, $address1, $address2, $zipcode, $town, $country, $birthday, $sexe, $email, $password, $telefoon, $question, $question_awnser)
    {

        $db = get_db();

        $sql = 'INSERT INTO Gebruiker (gebruikersnaam, voornaam, achternaam, adresregel1, adresregel2, postcode, plaatsnaam, landnaam, geboortedag, geslacht, emailadres, wachtwoord, vraag, antwoordTekst) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';

        $result = sqlsrv_query($db, $sql, [$username, $firstname, $lastname, $address1, $address2, $zipcode, $town, $country, $birthday, $sexe, $email, $password, $question, $question_awnser]);
        if($result === false)
        {
            die(var_export(sqlsrv_errors(), true));
        }
        
        //TELEFOON        
        $telefoonsql = 'INSERT INTO Gebruikerstelefoon (volgnr, gebruiker, telefoon)
        VALUES (?, ?, ?)';

        $telefoonresult = sqlsrv_query($db, $telefoonsql, [0, $username, $telefoon]);
        if($telefoonresult === false)
        {
            die(var_export(sqlsrv_errors(), true));
        }

        $message = 'Bedankt voor het succesvol registreren op de veilingwebsite EenmaalAndermaal!<br>';
        
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        @mail($email, "EenmaalAndermaal registratie afgerond", $message, $headers);
        
        return true;
    }

    
    function register_verkoper($banknaam, $rekening, $optie, $creditcard)
    {
        $db = get_db();

        $sql = "INSERT INTO Verkoper (gebruiker, bank, bankRekening, controleOptie, creditcard)
        VALUES ('" . $_SESSION['user_data']['gebruikersnaam'] . "', ?, ?, ?, ?)";

        $result = sqlsrv_query($db, $sql, [$banknaam, $rekening, $optie, $creditcard]);
        if($result === false)
        {
            die(var_export(sqlsrv_errors(), true));
        }

        return true;
    }

    function get_vragen()
     {
         $db = get_db();
 
         $sql = 'SELECT vraagnummer, tekst_vraag FROM Vraag';
 
         $result = sqlsrv_query($db, $sql);
         if($result === false)
         {
             die(var_export(sqlsrv_errors(), true));
         }
 
         $results = [];
         while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
         {
             $results[] = $row;
         }
 
         return $results;
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

    function get_telefoon($gebruiker){
        $db = get_db();

        $sql = 'SELECT DISTINCT telefoon
                FROM Gebruikerstelefoon
                WHERE gebruiker = ?';

        $result = sqlsrv_query($db, $sql, [$gebruiker]);
        
        if($result === false)
        {
            die(var_export(sqlsrv_errors(), true));
        }
        
        return sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
    }

    function send_activation_code_verkoop($email)
    {
        $char = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxz";
        $code = substr(str_shuffle($char), 0, 6);
        $hashcode = md5($code);

        $message = 'Bedankt voor meehelpen aan het groeien van EenmaalAndermaal!<br>
                Met de volgende code kunt u <a href="' . get_url(true) . 'account/verkoper/registreren/activeren">hier</a> uw verkoopaccount activeren: ' . $code;
        
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        if($sent = mail($email, "EenmaalAndermaal registratiecode", $message, $headers)){
            setcookie("activering_code_verkoper", $hashcode, time() + (1 * 365 * 24 * 60 * 60), "/"); //verloopt na 1 jaar
        }
        else{
            setcookie("activering_code_verkoper", "",  0 , "/");
        }
        return $sent;
    }

    function activate_verkoper($gebruikersnaam){
        $db = get_db();
 
        $sql = "UPDATE Gebruiker
                SET Verkoper = '1'
                WHERE gebruikersnaam = ?";
 
        $result = sqlsrv_query($db, $sql, [$gebruikersnaam]);
        
        if($result === false)
        {
            die(var_export(sqlsrv_errors(), true));
        }
    }