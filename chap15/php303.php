<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Document</title>
</head>
<body>
<?php

$money = 500;
$kazu = 5;

function tax($tanka,$ryo):int{

  $tax = ($tanka * $ryo) * 0.08;
  return $tax;


}
echo "単価：" . $money . "円" . "<br>";
echo "数量：" . $kazu . "個" . "<br>";
echo "--------------------------------------<br>";
echo "税抜金額：" . ($money * $kazu) . "円" . "<br>";
echo "消費税：" . tax($money,$kazu) . "円" . "<br>";
echo "税込金額：" .  (($money * $kazu) + tax($money,$kazu)) . "円";
?>

</body>
</html>