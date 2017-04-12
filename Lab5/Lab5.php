<?php

    error_reporting(0);

    function get_efficiency($query, $iterations)
    {
        define('HOST', 'localhost');
        define('USER', 'root');
        define('PASSWORD', 'q1w2e3r4');
        define('DATABASE', 'article');

        $link = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
        if ($link == FALSE)
        {
            die("<span id='error'>Ошибка соединения с БД</span>");
        }

        $result = '';
        $start_time = microtime(TRUE);

        for ($i = 0; $i < $iterations; $i++)
        {
            $query_start_time = microtime(TRUE);
            if (mysqli_query($link, $query))
            {
                $query_end_time = microtime(TRUE);
                $query_total_time = $query_end_time - $query_start_time;
                $result .= 'Запрос ' . ($i + 1) . ': ' . number_format($query_total_time, 8) . ' cек.<br/>';
            } 
            else
            {
                $result = '<span id="error">' . 'Ошибка работы с БД: ' . mysqli_error($link) . '</span>';
                mysqli_close($link);
                return $result;
            }
        }

        mysqli_close($link);

        $end_time = microtime(TRUE);
        $total_time = $end_time - $start_time;

        if ($total_time >= 1)
        {
            $average_amount_of_queries = $iterations / $total_time;
        }
        else
        {
            $average_amount_of_queries = $iterations;
        }

        $result .= 'Средняя производительность БД: ' . number_format($average_amount_of_queries) .
            ' запроса/cек. (Всего ' . number_format($total_time, 8) . ' сек.)';

        return $result;
    }
?>