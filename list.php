<!DOCTYPE>
<html lang="ru">
<head>
    <title>Задание6</title>
    <meta charset="utf-8">
</head>
<?php
$dir = 'DownloadedTests';
$tests = scandir($dir);
$tests = array_reverse($tests);
$kol = count($tests);
unset($tests[$kol - 1], $tests[$kol - 2]);
$tests = array_reverse($tests);
//echo '<pre>';
//print_r($tests);
?>
<body>
<h3>
    <a href="admin.php" style="color: black">Загрузить тест</a>
</h3>
<div>
    <form action="test.php" method="get">
        <?php foreach ($tests as $k => $v) { ?>
            <h3><input type="submit" name="<?= "$k" ?>" value="<?= $v ?>" style="font-size: 25px"> <br></h3>
        <?php } ?>
    </form>
</div>
</body>
</html>