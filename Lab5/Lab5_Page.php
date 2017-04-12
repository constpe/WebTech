<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="Lab5_Page_Style.css"/>
    <title>Lab 5</title>
</head>
<body>
    <b>SQL-запрос</b>
    <form>
        <textarea rows=10 name="query" id="query_area"><?php error_reporting(0); echo $_GET["query"]?></textarea><br/>
        <b>Число запросов</b>
        <input type="number" min="1" max="10000" value="<?php
        echo ((int)$_GET["iterations"] != 0 ? (int)$_GET["iterations"] : "")?>" id="iterations_input" name="iterations">
        <input type="submit" value="Выполнить запросы"><br/><br/>
    </form>
    <?php
        require ('Lab5.php');
        if ($_GET["query"] != "" && $_GET["iterations"] != "")
        {
            echo get_efficiency($_GET["query"], $_GET["iterations"]);
        }
        else if (sizeof($_GET) != 0 && isset($_GET))
        {
            echo "<span id='error'>Введите все необходимые данные</span>";
        }
    ?>
</body>
</html>