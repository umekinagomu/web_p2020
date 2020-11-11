<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>ページタイトル</title>
    </head>
    <body>
<?php
$passlist=array( 'hogehoge' => 'hogepass', 'hoge2' => 'hoge2pass');


if(!isset($_POST['user']))
{
    echo_auth_page("ログイン");
    exit;
}
$user=$_POST['user'];
$pass=$_POST['pass'];

if( (!isset($passlist[$user])) || $passlist[$user] != $pass)
{
    echo_auth_page("パスワードが違います");
    exit;
}
if(isset($_POST['transition']))
{
    echo_hoge_page();
    exit;
}
echo_hello_page($user);



////////////////////////////////////////////////////////////////////////
function echo_auth_page($msg)
{
echo <<<EOT

$msg
    <form method="POST" action="11_1.php">
        username <input type="text" name="user" value=""><br>
        password <input type="password" name="pass" value=""><br>
        <button type="submit" name="login" value="login">Login</button>
    </form>
EOT;
}
////////////////////////////////////////////////////////////////////////
function echo_hello_page($who)
{
    global $user, $pass;
echo <<<EOT

こんにちは $who さん
<form method="POST" action="11_1.php">
        <button type="submit" name="Btn1" value="Btn1">遷移ボタン</button>
        <input type="hidden" name="transition" value="">
        <input type="hidden" name="user" value="$user">
        <input type="hidden" name="pass" value="$pass">
    </form>
EOT;

}

function echo_hoge_page()
{
    global $user, $pass;
    echo <<<EOT
    <p>hogehogehoge</p>
    <form method="POST" action="11_1.php">
    <button type="submit" name="Btn1" value="Btn1">戻るボタン</button>
    <input type="hidden" name="user" value="$user">
    <input type="hidden" name="pass" value="$pass">
    </form>
EOT;
}

?>
    </body>
</html>