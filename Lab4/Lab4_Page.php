<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="Lab4_Page_Style.css"/>
    <title>Lab 4</title>
</head>
<body>
    <div id="manager">
        <div id="input">
            <form id="form">
                <span id="select_info">Выберите файл</span>
                <input type="text" name="file">
                <input type="submit" value="Открыть" id="button">
            </form>
        </div>
        <article>
            <?php
            require ("Lab4.php");
            if ($_GET["file"] != "")
            {
                if (file_exists($_GET["file"]))
                {
                    echo file_get_contents($_GET["file"]);
                    echo "<br/><br/>";
                    echo change_text(file_get_contents($_GET["file"]));
                }
                else
                {
                    echo "Файл " . $_GET["file"] . " не найден";
                }
            }
            ?></article>
    </div>
</body>
</html>