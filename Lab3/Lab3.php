<?php
    const QUINTILLION = 1000000000000000000;

    const SIMPLE_NUMBER = array("один", "два", "три", "четыре", "пять", "шесть", "семь", "восемь", "девять", "десять", "одиннадцать", "двеннадцать", "тринадцать", "четырнадцать", "пятнадцать", "шестнадцать", "семнадцать", "восемнадцать", "девятнадцать");

    const TRIADS_DICTIONARY = array(array("", "двадцать", "тридцать", "сорок", "пятьдесят", "шестьдесят", "семьдесят", "восемьдесят", "девяносто"),
        array("сто", "двести", "триста", "четыреста", "пятьсот", "шестьсот", "семьсот", "восемьсот", "девятьсот"));

    const NUMBERS_DICTIONARY = array(array("тысяча", "тысячи", "тысяч"), array("миллион", "миллиона", "миллионов"),
        array("миллиард", "миллиарда", "миллиардов"), array("триллион", "триллиона", "триллионов"),
        array("квадраллион", "квадраллиона", "квадраллионов"), array("квантиллион", "квантиллиона", "квантиллионов"));

    function from_triads($value)
    {
        $current_divider = 100;
        $order = 1;
        $result = "";

        while ($value != 0)
        {
            if ($value < 20)
            {
                $result .= SIMPLE_NUMBER[$value - 1];
                $value = 0;
            }

            if ($value >= $current_divider)
                $result .= (TRIADS_DICTIONARY[$order][$value / $current_divider - 1]) . ($value % $current_divider == 0 ? "" : " ");

            $value %= $current_divider;
            $current_divider /= 10;
            $order -= 1;
        }

        return $result;
    }

    function get_text($amount, $order)
    {
        $last_digit = $amount % 100;
        if ($last_digit > 20)
            $last_digit = $last_digit % 10;

        $triads = from_triads($amount);

        switch ($last_digit)
        {
            case 1:
                return ($order == 0 ? substr_replace($triads, "одна ", strlen($triads) - 8) : substr_replace($triads, "один ", strlen($triads) - 8)) . NUMBERS_DICTIONARY[$order][0] . " ";
                break;
            case 2:
                return ($order == 0 ? substr_replace($triads, "две ", strlen($triads) - 6) : substr_replace($triads, "два ", strlen($triads) - 6)) . NUMBERS_DICTIONARY[$order][1] . " ";
                break;
            case 3:
            case 4:
                return $triads . " " . NUMBERS_DICTIONARY[$order][1] . " ";
                break;
            default:
                return $triads . " " . NUMBERS_DICTIONARY[$order][2] . " ";
                break;
        }
    }

    function to_text($value)
    {
        $current_divider = QUINTILLION;
        $order = 5;
        $result = "";

        if ($value == 0)
            return "ноль";

        while ($value != 0)
        {
            if ($value % $current_divider == 0)
            {
                $result = get_text($value / $current_divider, $order);
                return $result;
            }
            else if ($value > $current_divider)
            {
                $result = get_text($value / $current_divider, $order);
                $result = $result . to_text($value % $current_divider);
                return $result;
            }
            else
            {
                $value %= $current_divider;
                $current_divider /= 1000;
                $order -= 1;
            }
        }
      
        return $result;
    }
?>