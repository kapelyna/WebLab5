<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Таблиця з інформацією</title>
    <link rel="stylesheet" href="Lr_5.css">
</head>
<body>
    <form>
    <?php
        $file = file("C:\Users\Katia\OneDrive\Робочий стіл\Study Kate\ВебПрограмування\Lr5\oblinfo.txt", FILE_IGNORE_NEW_LINES);
        $input_data = trim(htmlspecialchars($_GET['select']));
        $found = false;
        
        echo "<h1>" . htmlspecialchars(urldecode($input_data)) . "</h1>";
        echo '<table class="table_data">';
        echo "<tr>";
        echo "<th width='200'>Область</th>";
        echo "<th width='100'>Населення, тис.</th>";
        echo "<th width='100'>Число ВНЗ</th>";
        echo "<th width='100'>Число ВНЗ на 100 тис. осіб</th>";
        echo "</tr>";
        
        for ($i = 0; $i < count($file); $i++) {
            $value = trim($file[$i]);
        
            // Перевіряємо, чи підстрока є в значенні з файлу
            if (strpos($value, $input_data) !== false) {
                $found = true;
        
                $obl = $value;
                $people = $file[$i + 1];
                $numVNZ = $file[$i + 2];
                $numVNZna100 = round(($numVNZ / $people)*100, 2);
        
                echo '<tr>';
                echo "<td>" . htmlspecialchars($obl) . "</td>";
                echo "<td>" . htmlspecialchars($people) . "</td>";
                echo "<td>" . htmlspecialchars($numVNZ) . "</td>";
                echo "<td>" . htmlspecialchars($numVNZna100) . "</td>";
                echo '</tr>';
            }
        }
        
        echo '</table>';
        
        if (!$found) {
            echo 'Запис не знайдено';
        }
    ?>
    </form>
</body>
</html>
