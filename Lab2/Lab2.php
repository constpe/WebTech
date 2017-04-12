<?php
    $int_var_1 = 10;
    $int_var_2 = 17;

    $float_var_1 = 10.56;
    $float_var_2 = 17.438;

    $bool_var_t = TRUE;
    $bool_var_f = FALSE;

    $string_var_1 = "Привет ";
    $string_var_2 = "мир";

    function double($a)
    {
        $a *= 2;
        return $a;
    }

    echo "Арифметические операции:\n";
    echo "\tЦелочисленный тип (a = 10, b = 17):\n";
    $result = -$int_var_1;
    echo "\t\t -a: $result\n";
    $result = $int_var_1 + $int_var_2;
    echo "\t\t a + b: $result\n";
    $result = $int_var_1 - $int_var_2;
    echo "\t\t a - b: $result\n";
    $result = $int_var_1 * $int_var_2;
    echo "\t\t a * b: $result\n";
    $result = $int_var_2 / $int_var_1;
    echo "\t\t b / a: $result\n";
    $result = $int_var_2 % $int_var_1;
    echo "\t\t b mod a: $result\n";

    echo "\tВещественный тип (a = 10.56, b = 17.438):\n";
    $result = -$float_var_1;
    echo "\t\t -a: $result\n";
    $result = $float_var_1 + $float_var_2;
    echo "\t\t a + b: $result\n";
    $result = $float_var_1 - $float_var_2;
    echo "\t\t a - b: $result\n";
    $result = $float_var_1 * $float_var_2;
    echo "\t\t a * b: $result\n";
    $result = $float_var_2 / $float_var_1;
    echo "\t\t b / a: $result\n";
    $result = $float_var_2 % $float_var_1;
    echo "\t\t b mod a: $result\n";

    echo "\tЛогический тип (a = true, b = false):\n";
    $result = -$bool_var_t;
    echo "\t\t -a: $result\n";
    $result = $bool_var_t + $bool_var_f;
    echo "\t\t a + b: $result\n";
    $result = $bool_var_t - $bool_var_f;
    echo "\t\t a - b: $result\n";
    $result = $bool_var_t * $bool_var_f;
    echo "\t\t a * b: $result\n";
    $result = $bool_var_f / $bool_var_t;
    echo "\t\t b / a: $result\n";
    $result = $bool_var_f % $bool_var_t;
    echo "\t\t b mod a: $result\n";

    echo "\tСтроковый тип (a = 'Привет ', b = 'мир'):\n";
    $result = -$string_var_1;
    echo "\t\t -a: $result\n";
    $result = $string_var_1 . $string_var_2;
    echo "\t\t a + b: $result\n";
    $result = $string_var_1 - $string_var_2;
    echo "\t\t a - b: $result\n";
    $result = $string_var_1 * $string_var_2;
    echo "\t\t a * b: $result\n";

?>