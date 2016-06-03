<?php

    add_cronjob('veiling gesloten', function() {

        $db = get_db();

        $sql = 'SELECT v.*, g.emailadres, g.voornaam, g.achternaam FROM Voorwerp v LEFT JOIN Gebruiker g ON g.gebruikersnaam = v.koper WHERE v.veilingGesloten = 1 AND v.veilingAfgehandeld = 0';

        $result = sqlsrv_query($db, $sql);
        if($result === false)
        {
            die(var_export(sqlsrv_errors(), true));
        }

        $voorwerpnummers = [];
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
        {
            $voorwerpnummers[] = $row['voorwerpnummer'];

            if (!empty($row['koper']))
            {
                $message = 'Bedankt voor het bieden op de vieling '.$row['titel'].'.<br>Hierbij delen wij mee dat u de veiling heeft gewonnen, gefeliciteerd!<br>Klik <a href="' . get_url(true) . 'veiling/'.$row['voorwerpnummer'].'">hier</a> om naar de veiling pagina te gaan.';
            
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                @mail($row['email'], "EenmaalAndermaal veiling gesloten", $message, $headers);
            }
        }

        // update veilingAfgehandeld
        if (!empty($voorwerpnummers)) {
            $sql_ids = array_fill(0, count($voorwerpnummers), '?');
            $sql_ids = implode(',', $sql_ids);

            $sql = 'UPDATE Voorwerp SET veilingAfgehandeld = 1 WHERE voorwerpnummer IN ('.$sql_ids.')';
            @sqlsrv_query($db, $sql, $voorwerpnummers);
        }

    }, 60);