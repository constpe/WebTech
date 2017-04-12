<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lab 3</title>
    <link rel="stylesheet" type="text/css" href="Lab3_page_style.css"/>
</head>
<body>
    <div id="view">
    <form>
        <p>
            <b>Введите число (до 20 разрядов включительно):</b><br>
            <input type="text" pattern="^[0-9]+$" maxlength="20" name="number"/><br>
        <p/>
        <input type="submit" value="Выполнить">
        <br>
        <p><output>
            <?php
                if ($_GET["number"] != "")
                {
                    require("Lab3.php");
                    $value = $_GET["number"];
                    if (strlen($value) == 20)
                    {
                        $temp_digit = $value[19];
                        $temp_value = "";
                        for ($i = 0; $i < 20; $i++)
                            $temp_digit .= $value[$i];
                        $value = $temp_value;
                        $value = (int)$value * 10 + $temp_digit;
                    }
                    echo "<b>Результат для " . $value . ":</b> <span id='res'>" . to_text($value) . "</span>";
                }
            ?>
        </p><output/>
    </form>
</body>
</html>