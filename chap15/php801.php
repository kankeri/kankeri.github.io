<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>オープンキャンパス申し込み</title>
</head>
<body>
<?php
  require_once("util.php");


  if (!cken($_POST)){
    $encoding = mb_internal_encoding();
    $err = "Encoding Error! The expected encoding is " . $encoding ;
  

    exit($err);
  }


  $_POST = es($_POST);
  ?>


  <?php


  $error = [];
 

  if(isSet($_POST["gakka"])) {
  

  $gakkaValues = ["-------","情報ビジネス科","会計ビジネス科"];
 

  $isgakka = in_array($_POST["gakka"],$gakkaValues);
 

  if ($isgakka) {
    

      $gakka = $_POST["gakka"];
  } else {
      $gakka = "error";
      $error[] = "「希望学科」にエラーがでました。";
  }
} else {
  
    $isgakka = false;
    $gakka = " ";
}
?>
<?php
function selected($value,$question) {
    if ($is_array($question)) {
      

        $isSelected = in_array($value,$question);
    } else {
     

        $isSelected = ($value===$question);
    }
    if ($isSelected) {
     

        echo "selected";
    } else {
        echo "";
    }
}
?>
<?php
$error1 = [];
if (!empty($_POST["theDate"])) {


    $postDate = trim($_POST["theDate"]);
 

    $postDate = mb_convert_kana($postDate,"as");


    $pattern1 = preg_match("/^[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}$/",$postDate);
    $pattern2 = preg_match("#^[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}$#",$postDate);
 

    if ($pattern1){
        $dateArray = explode("-", $postDate);
    }
    if ($pattern2){
        $dateArray = explode("/", $postDate);
    }
    if ($pattern1||$pattern2){
 
        $theYear = $dateArray[0];
        $theMonth = $dateArray[1];
        $theDay = $dateArray[2];


        $isDate = checkdate($theMonth,$theDay,$theYear);
        if ($isDate){
 

            $dateObj = new DateTime($postDate);
    } else {
        $error1[] =  "日付として正しくないです。";
    }
} else {


    $today = new DateTime();
    $today1 = $today->format("Y-n-j");
    $today2 = $today->format("Y/n/j");
    $error1[] = "日付は次のどちらかの形式で入力してください。<br>{$today1}または{$today2}";
    $isDate = false;
}
} else {
    $isDate = false;
    $postDate = "";
}
?>


<?php


if (isSet($_POST["simei"])){
    $simei = $_POST["simei"];
 
    $simei = strip_tags($simei);
 
    $simei = mb_substr($simei,0,150);

    $simei = es($simei);
} else {
 
    $simei = "";
}
?>


<?php
$error3 = [];


if (isSet($_POST["adress"])){
    $adress = $_POST["adress"];

    if (preg_match("/^[a-zA-Z0-9_.+-]+[@][a-zA-Z0-9.-]+$/", $adress)) {
        $adress = $adress;
        }else{
        $error3 = "メールアドレスが正しくありません。";
        }

    $adress = strip_tags($adress);

    $adress = mb_substr($adress,0,150);
 
    $adress = es($adress);
} else {
 
    $adress = "";
}
?>
<?php
$error2 = [];

if (isSet($_POST["number"])){
    $number = $_POST["number"];
 
    if (preg_match("/^[0-9]{2,4}-[0-9]{2,4}-[0-9]{3,4}$/", $number)) {
        $number = $number;
        }else{
        $error2 = "電話番号が正しくありません。";
        }

    $number = strip_tags($number);

    $number = mb_substr($number,0,150);
 
    $number = es($number);
} else {
 
    $number = "";
}
?>


<?php
 $error = [];


 if(isSet($_POST["nen"])) {


 $nenValues = ["高校1年","高校2年","高校3年"];


 $isnen = in_array($_POST["nen"],$nenValues);


 if ($isnen) {


     $nen = $_POST["nen"];
 } else {
     $nen = "error";
     $error[] = "「現在の状況」にエラーがありました。";
 }
} else {

   $isnen = false;
   $nen = " ";
}
?>
<?php
if (isSet($_POST["note"])){
    $note = $_POST["note"];

    $note = strip_tags($note);

    $note = mb_substr($note,0,150);

    $note = es($note);
} else {

    $note = "";
}
?>


<form method="POST" action="">
    
    <h1>オープンキャンパス申し込み</h1>

    <ul>
    <li><span>参加希望学科　　　:　</span>
    <select name="gakka">
    <option value="-------" >-----------------------------------------------------</option>
    <option value="情報ビジネス科情報ビジネスコース" >情報ビジネス科情報ビジネスコース</option>
    <option value="情報ビジネス科公共ビジネスコース" >情報ビジネス科公共ビジネスコース</option>
    <option value="会計ビジネス科会計ビジネスコース" >会計ビジネス科会計ビジネスコース</option>
    <option value="会計ビジネス科会計エキスパートコース" >会計ビジネス科会計エキスパートコース</option>
    </select>
    </li>
    </ul>
    <ul>
    <li><span>参加日　　　　　　:　</span>
    <input type="date" name="theDate" value=<?php echo "{$postDate}" ?>>
    </li>
    </ul>
    <ul>
    <li><label>氏名　　　　　　　:　<input type="name" name="simei" required></label></li>
    </ul>
    <ul>
    <li><label>メールアドレス　　:　<input type="email" name="adress" required></label></li>
    </ul>
    <ul>
    <li><label>電話番号　　　　　:　<input type="tel" name="number" required></label></li>
    </ul>
    <ul>
    <li><span>現在の状況　　　　:　</span>
    <input type="radio" name="nen" value="高校1年">高校1年</label>
    <input type="radio" name="nen" value="高校2年">高校2年</label>
    <input type="radio" name="nen" value="高校3年">高校3年</label></li>
    </ul>
    <ul>
    <li><span>そのほか　　　　　　:　</span>
    <textarea name="note" cols="40" rows="10" maxlength="150" placeholder="ご意見ご質問があったらお書きください"></textarea></li>
    </ul>
    
    <input type="submit" value="送信" >
    
    <?php


$isSubmited = $isgakka;
if ($isSubmited) {
    echo "<HR>";
    echo "参加希望学科　　　:　{$gakka}";
}
?>
<?php


if (count($error1)>0) {
    echo "<HR>";

    
    echo $error1;
}
?>

<?php


if ($isDate) {


    $date = $dateObj->format("Y年m月d日");


    $w = (int)$dateObj->format("w");
    
    echo "<HR>";
    echo "参加日　　　　　　:　{$date}";
}
?>

<?php


if (count($error)>0){
    echo "<HR>";


    echo $error1;
}
?>

<?php


$length = mb_strlen($simei);
if ($length>0) {
    echo "<HR>";
 

    echo "氏名　　　　　　　:　{$simei}";
}
?>

<?php


$length = mb_strlen($adress);
if ($length>0) {
    echo "<HR>";
 

    echo "メールアドレス　　:　{$adress}";
}
?>

<?php


$length = mb_strlen($number);
if ($length>0) {
    echo "<HR>";


    echo "電話番号　　　　　:　{$number}";
}
?>
<?php



if (count($error2)>0){
    echo "<HR>";


    echo $error2;
}
?>

<?php


$isSubmited = $isnen;
if ($isSubmited) {
    echo "<HR>";
    echo "現在の状況　　　　:　{$nen}";
}
?>


<?php


$length = mb_strlen($note);
if ($length>0) {
    echo "<HR>";

    echo "その他　　　　　　:　{$note}";
}
?>


    </form>
</body>
</html>