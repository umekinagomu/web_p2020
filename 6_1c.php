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
    <form action="6_1a.php">
            <button type="submit" name="Btn1" value="Btn1">投稿</button>
    </form>
    </body>
</html>