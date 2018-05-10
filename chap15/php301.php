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
    $num = mt_rand(1,10); 
    if( ($num % 2) == 0){
        echo "<h3>" . $num . "は偶数です。</h3>";
    }else {
        echo "<h1>" . $num . "は奇数です。</h1>";
    }
    ?>
</body>
</html>