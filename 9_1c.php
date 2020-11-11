<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>ページタイトル</title>
    </head>
    <body>
    <h1> 確認画面 </h1>
<?php
$name=$_POST['Txt1'];
$content=$_POST['Txt2'];

echo '名前' . htmlspecialchars($name) . '<br>';
echo  htmlspecialchars($content) . '</pre><br>';
?>
    <form method="post" action="9_1a.php">
            <input type="hidden" name="Txt1" value="<?php echo $name; ?>">
            <input type="hidden" name="Txt2" value="<?php echo $content; ?>">
            <button type="submit" name="Btn1" value="Btn1">投稿</button>
    </form>
    <form method="post" action="9_1b.php">          
            <input type="hidden" name="Txt1" value="<?php echo $name; ?>">
            <input type="hidden" name="Txt2" value="<?php echo $content; ?>">
            <button type="submit" name="Btn2" value="Btn2">修正</button>
    </form>
    </body>
</html>