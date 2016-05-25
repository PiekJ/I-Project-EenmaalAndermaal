<?php

    function get_file_cache($key)
    {
        return CACHE_FOLDER . md5($key);
    }

    function store_cache($key, $data, $ttl = null)
    {
        $ttl = (!empty($ttl)) ? $ttl : time() + 3600;

        $file = get_file_cache($key);
        $fp = fopen($file, 'wb');
        if (!$fp)
        {
            return false;
        }

        flock($fp, LOCK_EX);

        $data = serialize([
            $ttl,
            $data
        ]);

        $bytes = fwrite($fp, $data, strlen($data));
        fclose($fp);

        return $bytes !== false;
    }

    function fetch_cache($key)
    {
        $file = get_file_cache($key);
        if (!file_exists($file))
        {
            return false;
        }

        $fp = fopen($file, 'rb');
        if (!$fp)
        {
            return false;
        }

        flock($fp, LOCK_SH);

        $data = fread($fp, filesize($file));
        fclose($fp);

        $data = @unserialize($data);
        if (is_bool($data) && $data === false)
        {
            unlink($file);
            return false;
        }

        if (time() > $data[0])
        {
            unlink($file);
            return false;
        }

        return $data[1];
    }

    function exists_cache($key)
    {
        $file = get_file_cache($key);
        return file_exists($file);
    }

    function delete_cache($key)
    {
        $file = get_file_cache($key);
        if (file_exists($file))
        {
            unlink($file);
            return true;
        }

        return false;
    }