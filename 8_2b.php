<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>ページタイトル</title>
    </head>
    <body>

<?php
$hostname = '127.0.0.1';
$username = 'root';
$password = 'dbpass';

$dbname = 'kadai7_1';
$tablename = 'pocketmoney';

$link = mysqli_connect($hostname,$username,$password);
if(! $link){ exit("Connect error!"); }

// 
// データベースの処理をここに記述する。
// 
$date = $_POST['date'];
$content = $_POST['content'];
$income = $_POST['income'];
$cost = $_POST['cost'];

$escaped_date = ($date);
$escaped_content = mysqli_real_escape_string($link, $content);
$casted_income = (int)$income;
$casted_cost = (int)$cost;

$result = mysqli_query($link,"USE $dbname");
if(!$result) { exit("USE failed!"); }

$result = mysqli_query($link,"INSERT INTO $tablename SET date='$escaped_date', content='$escaped_content',"
   . "income=$casted_income, cost=$casted_cost");
if(! $result){ exit("INSERT error(1)!"); }
mysqli_close($link);
?>
        <br>
    </body>