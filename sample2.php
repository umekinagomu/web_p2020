<?php
date_default_timezone_set('Asia/Tokyo');//時間帯(タイムゾーン)
$time_now = date('H:i:s');    // 現在の時分秒H:i:s
$Subject =[
    [0,'9:30:00'],//1限開始
    [1,'11:00:00'],//1限終了
    [2,'11:10:00'],//2限開始
    [3,'12:40:00'],//2限終了
    [4,'13:30:00'],//3限開始
    [5,'15:00:00'],//3限終了
    [6,'15:10:00'],//4限開始
    [7,'16:40:00'],//4限終了
    [8,'16:50:00'],//4限開始
    [9,'18:20:00'],//5限終了
];
echo "現在時刻:".$time_now;
print "<hr>";

for($i = 0; $i<=9; $i+=2){//5限分の繰り返し(5回)
    echo (($i/2)+1)."限開始時刻:".$Subject[$i][1];
    echo "<br>";
    echo (($i/2)+1)."限終了時刻:".$Subject[$i+1][1];
    echo "<br>";
    print "<hr>";
}
for($i = 0; $i<=9; $i+=2){//5限分の繰り返し(5回)
    if((($time_now) <= ($Subject[$i][1])) && (($time_now) >= ($Subject[[$i+1][1]]))){
        echo "現在".$i."限目授業時間内です";
        exit;
    }else{
        echo "現在".$i."限目ではありません";
    }
}
?>