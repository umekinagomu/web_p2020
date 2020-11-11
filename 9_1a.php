<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>メイン画面</title>
    </head>
    <body>
<?php
if(isset($_POST['Txt1'])){
    $name=$_POST['Txt1'];
}else {
    $escaped_name="";
}   
if(isset($_POST['Txt2'])){
    $content=$_POST['Txt2'];
}else {
    $escaped_content="";
} 


if(isset($_POST['Txt1']) && isset($_POST['Txt2'])){
    $hostname = '127.0.0.1';
    $username = 'root';
    $password = 'dbpass';
                    
    $dbname = 'kadai9_1';
    $tablename = 'touko';

    $link = mysqli_connect($hostname,$username,$password);
    $escaped_name = mysqli_real_escape_string($link, $name);
    $escaped_content = mysqli_real_escape_string($link, $content);
    if(! $link){ exit("Connect error!"); }

    $result = mysqli_query($link,"USE $dbname");
    if(!$result) { exit("USE failed!"); }

    $result = mysqli_query($link,"INSERT INTO $tablename SET name='$escaped_name', content='$escaped_content'");
    if(! $result){ exit("INSERT error(1)!"); }

    $result=mysqli_query($link,"select * from $tablename");
    if(!$result){ exit("Select error on table ($tablename)!"); } 

    $ary_of_fieldinfo=mysqli_fetch_fields($result);

    echo '<table border="1">';
    while($row = mysqli_fetch_row($result))
    {
        echo "<tr>";
        foreach($row as $key => $value)
        {
            echo "<td>" .htmlspecialchars($ary_of_fieldinfo[$key]->name)."  : ";
            echo htmlspecialchars($value) . "</td>";
        }
         echo "</tr>";
    }

mysqli_free_result($result);

mysqli_close($link);

echo "</pre>";

}
?>
        <h1> メイン画面 </h1>
        <form action="9_1b.php">
            <button type="submit" name="Btn1" value="Btn1">新規投稿</button>
        </form>
    </body>
</html>
