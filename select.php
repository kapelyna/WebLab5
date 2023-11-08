<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP table</title>
        <link rel="stylesheet" href="Lr_5.css">
    </head>
    <body>
        <form class="choice" method="post">
        <?php
            $file = file('oblinfo.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $select = trim($_POST['selected_item']); // Видалено зайві пробіли
                
                header("Location: table.php?select=" . $select);
                exit;
            }
            
            echo '<select name="selected_item">';
            for ($i = 0; $i < count($file); $i+=3) 
            {
                $item = trim($file[$i]);
                echo '<option value="' . htmlspecialchars($item) . '">' . htmlspecialchars($item) . '</option>';
                
            }
            echo '</select><br>';
        ?>
        <input class="button" type="submit" value="Відправити запит">
        </form>
    </body>
</html>
