<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>ページタイトル</title>
    </head>
    <body>
<?php 
$a = 'red';            // シングルクオートの文字定数 
$b = 'I\'ll be back';  // ' は\ でクオートする
$b2 = 'バックスラッシュ(円記号) \\ ';  // \ は \ を重ねる
$cd = "def";            // ダブルクオートの文字定数 
$e = "<p>$cd ghi</p>";  // ダブルクオート内では変数が展開される
$f = "<p>{$cd}ghi</p>";  // 展開する変数名の後に英字などが続く場合 {} を使う
$g = "<p style=\"color:$a\">赤色</p>";  // " のクオートは属性の記述に便利

// 複数行の文字列を表現するヒアドキュメントは次のように書く。
// ヒアドキュメント内でも変数が展開される。
$here = <<< EOT
<p> hogehoge </p>
<p> $cd ghi </p>
EOT;
?>

        <p> $a は <?php echo $a ?> </p>
        <p> $b は <?php echo $b ?> </p>
        <p> $b2 は <?php echo $b2 ?> </p>
        <p> $cd は <?php echo $cd ?> </p>
        <p> $e は <?php echo $e ?> </p>
        <p> $f は <?php echo $f ?> </p>
        <p> $g は <?php echo $g ?> </p>
        <p> $here は <?php echo $here ?> </p>

    </body>
</html>