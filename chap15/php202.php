<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
    $pasokon= 100000;
    echo"パソコン{$pasokon}円<br>";
    $purinta= 20000;
    echo"プリンタ {$purinta}円";
    echo"<br>","------------------------------";
    const tax= 0.08;
    $goukei= 0;
    $goukei= $pasokon + $purinta;
    $syouhizei= 0;
    $syouhizei= $goukei * tax;
    echo"<br>";
    echo"消費税{$syouhizei}円";
    echo"<br>";
    $goukei= $goukei + $syouhizei;
    echo"合計{$goukei}円";
    ?>
</body>
</html>