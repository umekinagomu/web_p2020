<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>ページタイトル</title> 
    </head>
    <body>
        <ul>
<table border="1">
<?php 
    for($i = 1; $i <= 9; $i++)  //aa
    {  
        echo"<tr>";
        for($j = 1; $j <=9; $j++)
        {  
            $a  = $i*$j;
            echo"<td> $a</td>";
        }
        echo"</tr>";
    }
?>
</table> 
        </ul>
    </body>
</html>