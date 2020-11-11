<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>ページタイトル</title>
    </head>
    <body>
<?php
if(isset($_GET['n']))
{
   $n=$_GET['n'];
}
else
{
   $n=3;
}

if(isset($_GET['name']))
{
   $name=$_GET['name'];
}
else
{
   $name='Yamada';
}

for($i=0;$i<$n;$i++)
{
    echo "<p> Hello $name san !</p>";
}

echo '<a href="http://127.0.0.1:10800/~sspuser/5_3 sample.php?n='
    . ($n+1) . '&name=' . $name . '">一行増やす</a>';
?>

        <a href="http://127.0.0.1:10800/~sspuser/5_3 sample.php">戻る</a>
    </body>
</html>