<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>ページタイトル</title>
    </head>
    <body>
    <h1> 確認画面 </h1>
<?php
$a=$_POST['Txt1'];
$b=$_POST['Txt2'];
echo '名前' . htmlspecialchars($a) . '<br>';
echo  htmlspecialchars($b) . '</pre><br>';
?>
    <form action="6_2a.php">
            <button type="submit" name="Btn1" value="Btn1">投稿</button>
    </form>
    <form method="post" action="6_2b.php">          
            <input type="hidden" name="Txt1" value="<?php echo $a; ?>">
            <input type="hidden" name="Txt2" value="<?php echo $b; ?>">
            <button type="submit" name="Btn2" value="Btn2">修正</button>
    </form>
    </body>
</html>