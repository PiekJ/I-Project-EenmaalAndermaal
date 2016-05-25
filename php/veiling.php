<?php

    function get_rubrieken()
    {
        $db = get_db();

        $sql = 'SELECT * FROM Rubriek';

        //$startTime = microtime(true);
        $result = sqlsrv_query($db, $sql);
        if($result === false)
        {
            die(var_export(sqlsrv_errors(), true));
        }
        //$fetchTime = microtime(true);
        //echo ($fetchTime - $startTime) . '<br>';

        $results = [];
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
        {
            $results[] = $row;
        }

        //echo (microtime(true) - $fetchTime) . '<br>';

        return $results;
    }

    /*function get_rubrieken_old($sorted = null)
    {
        $sorted = (is_bool($sorted)) ? $sorted : false;

        $db = get_db();

        $sql = 'SELECT * FROM Rubriek';
        if ($sorted)
        {
            $sql = 'WITH CTE AS
            (
                SELECT f.rubrieknummer, CAST(f.rubrieknaam AS varchar(max)) AS rubrieknaam, f.heeftSubrubriek, CAST(f.rubrieknummer AS varbinary(max)) AS order_level, 0 AS depth_level
                FROM Rubriek f
                WHERE f.hoofdrubriek IS NULL
                UNION ALL
                SELECT n.rubrieknummer, CAST(REPLICATE(\'  \', depth_level + 1) + n.rubrieknaam AS varchar(max)) AS rubrieknaam, n.heeftSubrubriek, order_level + CAST(n.rubrieknummer AS varbinary(max)) as order_level, depth_level + 1 AS depth_level
                FROM Rubriek n
                INNER JOIN CTE p ON p.rubrieknummer = n.hoofdrubriek
            )
            SELECT * FROM CTE ORDER BY order_level';
        }

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
    }*/

    function get_veilingen($rubrieknummer = null, $search_text = null, $pagination = null, $pagination_max = null, $order_by = null, $order_by_asc = null)
    {
        $db = get_db();

        $args = null;
        $sql = 'SELECT v.voorwerpnummer, v.titel, v.startprijs, CAST(v.looptijdBeginDag AS DATETIME) + CAST(v.looptijdBeginTijd AS DATETIME) AS looptijdBegin, CAST(v.looptijdEindDag AS DATETIME) + CAST(v.looptijdEindTijd AS DATETIME) AS looptijdEind, b.filenaam FROM Voorwerp v LEFT JOIN Bestand b ON b.voorwerpnummer = v.voorwerpnummer';

        if (is_numeric($rubrieknummer))
        {
            $sql = 'SELECT v.voorwerpnummer, v.titel, v.startprijs, CAST(v.looptijdBeginDag AS DATETIME) + CAST(v.looptijdBeginTijd AS DATETIME) AS looptijdBegin, CAST(v.looptijdEindDag AS DATETIME) + CAST(v.looptijdEindTijd AS DATETIME) AS looptijdEind, b.filenaam FROM VoorwerpRubriek r INNER JOIN Voorwerp v ON v.voorwerpnummer = r.voorwerpnummer LEFT JOIN Bestand b ON b.voorwerpnummer = v.voorwerpnummer WHERE r.rubrieknummer = ?';
            $args = [$rubrieknummer];
        }

        if (!empty($search_text))
        {
            if (empty($args))
            {
                $args = [];
                $sql .= ' WHERE 1=1';
            }

            $sql .= ' AND (v.titel LIKE ? OR v.beschrijving LIKE ?)';
            $args[] = '%' . $search_text . '%';
            $args[] = '%' . $search_text . '%';
        }

        if (!empty($order_by))
        {
            $sql .= ' ORDER BY ' . $order_by . ' ' . ((empty($order_by_asc) || $order_by_asc) ? 'ASC' : 'DESC');
        }

        if (is_numeric($pagination))
        {
            if (empty($order_by))
            {
                $sql .= ' ORDER BY voorwerpnummer ASC';
            }

            $pagination_max = (!empty($pagination_max)) ? $pagination_max : 30;

            $sql .= ' OFFSET ? ROWS FETCH NEXT ? ROWS ONLY';
            $args[] = $pagination * $pagination_max;
            $args[] = $pagination_max;
        }

        $result = sqlsrv_query($db, $sql, $args);
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

    function count_down_veiling($veiling)
    {
        $begin_datetime = new DateTime('now');
        $eind_datetime = $veiling['looptijdEind'];
        $diff_timestamp = $eind_datetime->getTimestamp() - $begin_datetime->getTimestamp();

        /*$h = floor($diff_timestamp / 3600);
        $diff_timestamp %= 3600;
        $m = floor($diff_timestamp / 60);
        $diff_timestamp %= 60;
        $s = $diff_timestamp;*/

        return $diff_timestamp;
    }

    function add_veiling()
    {

    }

    function get_veiling($veilingnummer)
    {
        $db = get_db();

        $sql = 'SELECT v.*, CAST(v.looptijdBeginDag AS DATETIME) + CAST(v.looptijdBeginTijd AS DATETIME) AS looptijdBegin, CAST(v.looptijdEindDag AS DATETIME) + CAST(v.looptijdEindTijd AS DATETIME) AS looptijdEind FROM Voorwerp v WHERE v.voorwerpnummer = ?';

        $result = sqlsrv_query($db, $sql, [$veilingnummer]);
        if($result === false)
        {
            die(var_export(sqlsrv_errors(), true));
        }

        $result = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
        
        if (empty($result))
        {
            return null;
        }

        return $result;
    }