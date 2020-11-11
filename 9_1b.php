<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>投稿記事入力画面</title>
    </head>
    <body>
        <h1> 投稿記事入力画面 </h1>
<?php
if(isset($_POST['Txt1'])){
    $name=$_POST['Txt1'];
}else {
    $name="";
}    
if(isset($_POST['Txt2'])){
    $content=$_POST['Txt2'];
}else {
    $content="";
}
?>
        <form method="post" action="9_1c.php">
            名前<input type="text" name="Txt1" value="<?php echo $name;?>">
            <br>
            本文<textarea name="Txt2" rows="5" cols="30" ><?php echo $content;?></textarea>
            <br>
          
            <button type="submit" name="Btn1" value="Btn1">投稿</button>
        </form>
        <form action="6_2a.php">
            <button type="submit" name="Btn2" value="Btn2">取り消し</button>
        </form>
    </body>
</html>
