<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>ページタイトル</title>
    </head>
    <body>
<?php
if(isset($_GET['a']) && $_GET['a']>=0)
{
    $a=$_GET['a'];
}
else
{
   $a=0;
}

if(isset($_GET['b'])&& $_GET['b']>=0)
{
    $b=$_GET['b'];
}
else
{
    $b=0;
}

if(isset($_GET['c'])&& $_GET['c']>=0)
{
    $c=$_GET['c'];
}
else
{
    $c=0;
}

if(isset($_GET['value1'])&& $_GET['a']>=0)
{
   $value1=$_GET['value1'];
}
else
{
   $value1 = 0;
}

if(isset($_GET['value2'])&& $_GET['b']>=0)
{
   $value2=$_GET['value2'];
}
else
{
   $value2 = 0;
}

if(isset($_GET['value3'])&& $_GET['c']>=0)
{
   $value3=$_GET['value3'];
}
else
{
   $value3 = 0;
}
if($a>0){
    echo "<p> リンゴの個数が $a 個、価格 $value1 円</p>";
}
if($b>0){
    echo "<p> バナナの個数が $b 個、価格 $value2 円</p>";
}
if($c>0){
    echo "<p> パイナップルの個数が $c 個、価格 $value3 円</p>";
}

echo '<a href="http://127.0.0.1:10800/~sspuser/5_3.php?a='
    . ($a+1) . '&b=' . $b . '&c=' . $c . '&value1=' . ($value1+1000) . '&value2=' . $value2 . '&value3=' . $value3 . '">リンゴを1個追加</a> ';
echo '<a href="http://127.0.0.1:10800/~sspuser/5_3.php?a='
    . $a . '&b=' . ($b+1) . '&c=' . $c . '&value1=' . $value1 . '&value2=' . ($value2+800) . '&value3=' . $value3 . '">バナナを1個追加</a> ';
echo '<a href="http://127.0.0.1:10800/~sspuser/5_3.php?a='
    . $a . '&b=' . $b . '&c=' . ($c+1) . '&value1=' . $value1 . '&value2=' . $value2 . '&value3=' . ($value3+200) . '">パイナップルを1個追加</a> ';

echo '<a href="http://127.0.0.1:10800/~sspuser/5_3.php?a='
    . ($a-1) . '&b=' . $b . '&c=' . $c . '&value1=' . ($value1-1000) . '&value2=' . $value2 . '&value3=' . $value3 . '">リンゴを1個減らす</a> ';
echo '<a href="http://127.0.0.1:10800/~sspuser/5_3.php?a='
    . $a . '&b=' . ($b-1) . '&c=' . $c . '&value1=' . $value1 . '&value2=' . ($value2-800) . '&value3=' . $value3 . '">バナナを1個減らす</a> ';
echo '<a href="http://127.0.0.1:10800/~sspuser/5_3.php?a='
    . $a . '&b=' . $b . '&c=' . ($c-1) . '&value1=' . $value1 . '&value2=' . $value2 . '&value3=' . ($value3-200) . '">パイナップルを1個減らす</a> '  ;

?>
        <a href="http://127.0.0.1:10800/~sspuser/5_3.php">リセット</a>
    </body>
</html>