<?php
ob_start();
?>
    <!DOCTYPE>
    <html lang="ru">
    <head>
        <title>Задание7</title>
        <meta charset="utf-8">
    </head>
    <?php
    $aa = $_GET;
    $k = key($aa);
    if (file_exists(__DIR__ . '/DownloadedTests/' . $_GET[$k])) {
        $file = file_get_contents(__DIR__ . '/DownloadedTests/' . $_GET[$k]);
        $file1 = json_decode($file, true);
    } else {
        header("HTTP/1.0 404 Not Found");
        //http_response_code(404);
        die('такого файла не найдено!');

    }
    ?>
    <body>
    <h3>
        <a href="admin.php" style="color: black">Загрузить тест</a><br>
        <a href="list.php" style="color: black">К списку тестов</a>
    </h3>
    <form action="" method="POST">
        <?php foreach ($file1 as $k => $v) { ?>
            <fieldset>
                <legend><?= "$k." . $file1[$k]["q$k"] ?></legend>
                <label><input name="q<?= $k ?>" value="0" type="radio"> <?= $file1[$k]['answer']['a0'] ?></label>
                <label><input name="q<?= $k ?>" value="1" type="radio"> <?= $file1[$k]['answer']['a1'] ?></label>
                <label><input name="q<?= $k ?>" value="2" type="radio"> <?= $file1[$k]['answer']['a2'] ?></label>
            </fieldset>
        <?php } ?>
        <input value="Отправить" type="submit">
    </form>
    </body>
    </html>
<?php
//include_once 'GD.php';
$priem = $_POST;
$i = 0;
if (!empty($priem)) {
    foreach ($file1 as $key => $value) {
        if ($file1[$key]['correct'] == $priem["q$key"]) {
            $i++;
            echo "$key -- Верно<br>";
            file_put_contents('numb.txt',$i);
        } else echo "$key -- Неверно<br>";
    }
    echo $i;
    //file_put_contents('numb.txt',$i);
    echo '
<form method="post">
<input type="text" name="name">введите имя
<input type="submit" value="отправить">
</form>
';
    if (isset($_POST['name']) and !empty($_POST['name'])) {
        $name = $_POST['name'];
        file_put_contents('name.txt', $name);
        header('Location: GD.php ');
    }
}

ob_end_flush();
?>