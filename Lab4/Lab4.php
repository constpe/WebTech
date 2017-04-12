<?php
    function change_text($text)
    {
        $eng_pattern = "/\b[a-zA-Z]+\b/u";
        $rus_pattern = "/\b[а-яёА-ЯЁ]+\b/u";
        $num_pattern = "/\b[0-9]+(\.([0-9])+)*\b/";

        function set_color_eng($matches)
        {
            return "<span class=\"eng_text\">" . $matches[0] . "</span>";
        }

        function set_color_rus($matches)
        {
            return "<span class=\"rus_text\">" . $matches[0] . "</span>";
        }

        function set_color_num($matches)
        {
            return "<span class=\"num_text\">" . $matches[0] . "</span>";
        }

        $result = preg_replace_callback($eng_pattern, 'set_color_eng', $text);
        $result = preg_replace_callback($rus_pattern, 'set_color_rus', $result);
        $result = preg_replace_callback($num_pattern, 'set_color_num', $result);

        return $result;
    }
?>