<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>メイン画面</title>
    </head>
    <body>

<?php
    $hostname = '127.0.0.1';
    $username = 'root';
    $password = 'dbpass';

    $dbname = 'finaldb';
    $tablename1 = 'blog';
    $tablename2 = 'comment';
    $passlist=array( 'hoge' => 'hogepass', 'hogehoge' => 'hogehogepass', 'hogefinal' => 'finalpass');
    
    $link = mysqli_connect($hostname,$username,$password);
    if(!$link){ exit("Connect error!");}

    $result=mysqli_query($link,"use $dbname");
    if(!$result){ exit("Can't use database ($dbname)!"); }

    if(!isset($_POST['user'])&&!isset($_GET['user'])){//リンクがget
        echo_auth_page("ログイン");
        exit;
    }
    if(isset($_POST['user'])){
        $user=$_POST['user'];
        $pass=$_POST['pass'];
    }
    if(isset($_GET['user'])){
        $user=$_GET['user'];
        $pass=$_GET['pass'];
    }
    if(!isset($passlist[$user]) || $passlist[$user] != $pass){
        echo_auth_page("パスワードが違います");
        exit;
    }

    if(!isset($_POST['transition'])&&!isset($_GET['transition'])){
        top();
    }elseif(isset($_GET['transition'])){
        $number = $_GET['number'];
        indicate_page();
    }elseif(isset($_POST['transition'])){
        if($_POST['transition'] == "write")write_page();
        if($_POST['transition'] == "hensyu")hensyu_page();
        if($_POST['transition'] == "del")del_page();
        if($_POST['transition'] == "update")update_page();
    }

function echo_auth_page($msg){
echo <<<EOT
$msg
    <form method="POST" action="THE_FINAL.php">
        username <input type="text" name="user" value=""><br>
        password <input type="password" name="pass" value=""><br>
        <button type="submit" name="login" value="login">ログイン</button>
    </form>
EOT;
}
function top(){//トップページ
    global $hostname, $username, $password, $dbname, $tablename1, $link, $user, $pass;

echo <<<EOT
    <h1 align="center">うめきブログ</h1>
EOT;

if(isset($_POST['Txt1']) && isset(($_POST['Txt2']))){//入力された情報がPOSTされたらinsertする
    if($_POST['Txt1']=="" || $_POST['Txt2']==""){
        error_page();
        exit;
    }
    INSERT();
}
    $result=mysqli_query($link,"select * from $tablename1");
    if(!$result){ exit("Select error on table ($tablename1)!");}

    while($row_assoc = mysqli_fetch_assoc($result)){
        foreach($row_assoc as $key => $value){
            if($key == 'date_entered'){
                echo htmlspecialchars($value) . "&emsp;";
            }
            if($key == 'number'){
                $number = $value;
            }
            if($key == 'title'){
                echo '<a href="http://127.0.0.1:10800/~sspuser/THE_FINAL.php?number=' . $number . '&user=' . $user . '&pass=' . $pass . '&transition">' . $value . '</a><br>';
            }
        }
    }
    if($user=='hoge'){
        echo <<<EOT
        <form method="POST" action="THE_FINAL.php">
            <input type="hidden" name="user" value="$user">
            <input type="hidden" name="pass" value="$pass">
            <input type="hidden" name="transition" value="write">
            <button type="submit" name="btn1" value="btn1">ブログを書く</button>
        </form>
EOT;
    }
}
function write_page(){//ブログを作成する
    global $user, $pass;
echo <<<EOT

    <form method="post" action="THE_FINAL.php">
        <p>タイトル</p>
        <textarea name="Txt1" rows="1" cols="180" ></textarea><br>
        <p>内容</p>
        <textarea name="Txt2" rows="50" cols="180" ></textarea><br>
        <input type="hidden" name="user" value="$user">
        <input type="hidden" name="pass" value="$pass">
        <button type="submit" name="btn1" value="btn1">登録</button>
    </form>
    <form method="post" action="THE_FINAL.php">
        <input type="hidden" name="user" value="$user">
        <input type="hidden" name="pass" value="$pass">
        <button type="submit" name="btn2" value="btn2">戻る</button>
    </form>
EOT;
}
function indicate_page(){//リンクをクリックしたときにデータベースから内容を表示する
    global $hostname, $username, $password, $dbname, $tablename1, $link, $result, $user, $pass, $number;
    $i='0';
    $itemlist=array('1'=>'ブログ番号', '2'=>'記入日', '3'=>'タイトル');
    $result=mysqli_query($link,"select * from $tablename1 where number=$number");
    if(!$result){ exit("Select error on table ($tablename1)!");} 
    $ary_of_fieldinfo=mysqli_fetch_fields($result);

    while($row = mysqli_fetch_row($result)){
        foreach($row as $key => $value){       
            $i++;
            if($i<4){echo "$itemlist[$i]&emsp;";}
            echo "<pre>" . htmlspecialchars($value) . "<br></pre><hr>";
            if($ary_of_fieldinfo[$key]->name == 'title'){$title = $value;}
            if($ary_of_fieldinfo[$key]->name == 'content'){$content = $value;}
        }
    }
    mysqli_free_result($result);
    if($user == 'hoge'){
    echo <<<EOT

    <form method="POST" action="THE_FINAL.php">
        <input type="hidden" name="Txt1" value="$title">
        <input type="hidden" name="Txt2" value="$content">
        <input type="hidden" name="user" value="$user">
        <input type="hidden" name="pass" value="$pass">
        <input type="hidden" name="transition" value="hensyu">
        <input type="hidden" name="delnum" value="$number">
        <button type="submit" name="btn1" value="btn1">編集</button>
    </form>
EOT;
    }

    echo <<<EOT
    <form method="POST" action="THE_FINAL.php">
        <input type="hidden" name="user" value="$user">
        <input type="hidden" name="pass" value="$pass">
        <button type="submit" name="btn1" value="btn1">戻る</button>
    </form>
EOT;
}

function hensyu_page(){//編集ボタンを押したときのページ
    global $user, $pass;
    $title = $_POST['Txt1'];
    $content = $_POST['Txt2'];
    $number = $_POST['delnum'];
    echo <<<EOT
    <table>
    <tr>
    <form method="post" action="THE_FINAL.php">
        <p>タイトル</p>
        <textarea name="Txt1" rows="1" cols="180" >$title</textarea><br>
        <p>内容</p>
        <textarea name="Txt2" rows="50" cols="180" >$content</textarea><br>
        <input type="hidden" name="user" value="$user">
        <input type="hidden" name="pass" value="$pass">
        <input type="hidden" name="upnum" value="$number">
        <td><button type="submit" name="btn1" value="btn1">更新</button></td>
        <input type="hidden" name="transition" value="update">
    </form>

    <form method="post" action="THE_FINAL.php">
        <input type="hidden" name="user" value="$user">
        <input type="hidden" name="pass" value="$pass">
        <input type="hidden" name="delnum" value="$number">
        <td><button type="submit" name="btn2" value="btn2">削除</button></td>
        <input type="hidden" name="transition" value="del">
    </form>

    <form method="post" action="THE_FINAL.php">
        <input type="hidden" name="user" value="$user">
        <input type="hidden" name="pass" value="$pass">
        <td><button type="submit" name="btn3" value="btn3">戻る</button></td>
    </form>
    </tr>
    </table>
EOT;
}

function INSERT(){//レコードに追加
    global $hostname, $username, $password, $dbname, $tablename1, $link, $result, $user, $pass;
    $title = $_POST['Txt1'];
    $content = $_POST['Txt2'];

    $result = mysqli_query($link,"INSERT INTO $tablename1 SET title='$title', content='$content';");
    if(! $result){ exit("INSERT error(1)!"); }
}
function del_page(){//レコードを削除
    global $hostname, $username, $password, $dbname, $tablename1, $link, $result, $user, $pass;
    $number = $_POST['delnum'];

    $result = mysqli_query($link,"DELETE FROM $tablename1 WHERE number=$number");
    if(! $result){
        exit("DELETE error(1)!");
    }else{
        echo"<p>削除できました</p>"; 
    }
    $result = mysqli_query($link,"ALTER TABLE $tablename1 AUTO_INCREMENT = 1");//番号の初期化
    
 echo <<<EOT
    <form method="post" action="THE_FINAL.php">
        <input type="hidden" name="user" value="$user">
        <input type="hidden" name="pass" value="$pass">
        <td><button type="submit" name="btn1" value="btn1">戻る</button></td>
    </form>
EOT;
}
function update_page(){
    global $hostname, $username, $password, $dbname, $tablename1, $link, $result, $user, $pass;
    $title = $_POST['Txt1'];
    $content = $_POST['Txt2'];
    if(isset($_POST['Txt1']) && isset(($_POST['Txt2']))){
        if($_POST['Txt1']=="" || $_POST['Txt2']==""){
            error_page();
        }
    }
    $number = $_POST['upnum'];
    $result = mysqli_query($link,"UPDATE $tablename1 SET title='$title', content='$content' WHERE number=$number");
    if(! $result){
        exit("UPDATE error(1)!");
    }else{
        echo "<p>更新しました。</p>";
    }

    echo <<<EOT
    <form method="post" action="THE_FINAL.php">
        <input type="hidden" name="user" value="$user">
        <input type="hidden" name="pass" value="$pass">
        <td><button type="submit" name="btn1" value="btn1">戻る</button></td>
    </form>
EOT;
}
function error_page(){
    global $user, $pass;
    echo <<<EOT
    <p>タイトルと内容の両方を入力してください</p>
    <form method="post" action="THE_FINAL.php">
        <input type="hidden" name="user" value="$user">
        <input type="hidden" name="pass" value="$pass">
        <td><button type="submit" name="btn1" value="btn1">戻る</button></td>
    </form>
EOT;
    exit;
}
mysqli_close($link);

?>

    </body>
</html>