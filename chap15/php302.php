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
    $sum = 0;
    
    $count = 0;


    do {
        $random = mt_rand(1,10);
        

        echo $random . " ";
        $sum += $random;
        $count += 1;
        

        if($random ==10) {
            break;
        }
    }while(true);



    echo "<br>" . "合計 :" . $sum . "<br>";
    echo "平均 :" . ($sum / $count) . "<br>";
    ?>
</body>
</html>