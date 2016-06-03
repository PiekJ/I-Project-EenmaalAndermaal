<?php

    $cronjob_jobs = [];

    function add_cronjob($name, $cb, $timeout)
    {
        global $cronjob_jobs;

        $cronjob_jobs[] = [
            'name' => $name,
            'callback' => $cb,
            'timeout' => $timeout
        ];

        return true;
    }

    function execute_cronjobs()
    {
        global $cronjob_jobs;

        if (!($timeouts = fetch_cache('cronjob_timeouts')))
        {
            $timeouts = [];
        }

        $has_update = false;
        $current_time = time();

        foreach ($cronjob_jobs as $cronjob)
        {
            $previous_time = 0;
            if (isset($timeouts[$cronjob['name']]))
            {
                $previous_time = $timeouts[$cronjob['name']];
            }

            if ($previous_time + $cronjob['timeout'] < $current_time)
            {
                call_user_func($cronjob['callback']);

                $timeouts[$cronjob['name']] = $current_time;
                $has_update = true;
            }
        }

        if ($has_update)
        {
            store_cache('cronjob_timeouts', $timeouts);
        }
    }