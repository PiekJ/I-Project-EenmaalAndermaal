<?php

    function get_rubrieken($sorted = null)
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
    }