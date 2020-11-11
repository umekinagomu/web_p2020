<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <!-- vim: set sts sw=4 expandtab : -->
        <title>ページタイトル</title>
    </head>
    <body>
      
<?php

    $dbname='kadai8_1';
    $tablename='pocketmoney';

    $link = mysqli_connect('127.0.0.1','root','dbpass');
    if(! $link){ exit("Connect error!"); }

    $result=mysqli_query($link,"use $dbname");
    if(!$result){ exit("Can't use database ($dbname)!"); } 


    echo "<pre>";
    // echo Env

    $result=mysqli_query($link,"show columns from $tablename");
    if(!$result){ exit("Error on table ($tablename)!"); } 

    $ary_of_fieldinfo=mysqli_fetch_fields($result);

    echo "<h2>カラム</h2>";
    echo '<table border="1">';
    while($row = mysqli_fetch_row($result))
    {
        echo "<tr>";
        foreach($row as $key => $value)
        {
            echo "<td>" . htmlspecialchars($ary_of_fieldinfo[$key]->name) . "  : ";
            echo htmlspecialchars($value) . "</td>";
        }
        echo "</tr>";
    }
    echo '</table>';
    mysqli_free_result($result);


    $result=mysqli_query($link,"select * from $tablename");
    if(!$result){ exit("Select error on table ($tablename)!"); } 

    $ary_of_fieldinfo=mysqli_fetch_fields($result);

    echo "<h2>レコード</h2>";
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

?>
</table>
    </body>
</html>

