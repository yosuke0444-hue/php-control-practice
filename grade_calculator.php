<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>成績判定システム</h1>
<h2>[個別成績]</h2>
<?php
$students = [
    ["name" => "田中太郎", "score" => 85],
    ["name" => "佐藤花子", "score" => 92],
    ["name" => "鈴木一郎", "score" => 78],
    ["name" => "高橋美咲", "score" => 65],
    ["name" => "伊藤健太", "score" => 58],
];
foreach ($students as $student) {
$score = $student["score"];//これを入れないとphpは$studentsの中身丸ごと持ってくる，だから細かく指示した．
                            //phpは自動的に定義したものの中身のものを持ってきてくれるわけじゃない．最後に表示したいから＄の変数の形にした
if ($score >= 90) {
    $grade = "A";
    $status = "優秀";
} elseif ($score >= 80) {
    $grade = "B";
    $status = "良好";
}elseif($score >=70){
    $grade = "c";
    $status = "普通";
}elseif($score >=60){
    $grade = "D";
    $status = "要努力";
}else {
    $grade = "F";
    $status = "不合格";//foreachは要素をひとつずつ取り出していくから，if文を中に入れる，一つ取り出して判定して最後に表示．この流れを繰り返す．
}
    echo $student["name"].":". $student["score"]."点 - 評価 ".$grade."(".$status.")<br>";
}
?>
<h2>[統計情報]</h2>
<?php
$pass_count = 0;
$fail_count = 0;
$total_score = 0;
foreach ($students as $student) {
    if ($student["score"] >= 60) {
        $pass_count++;
    } else {
        $fail_count++;
    }
}
foreach ($students as $student) {
    $total_score += $student["score"];
}
$average = $total_score / count($students);

echo "合格者数:".$pass_count."人<br>";
echo "不合格者数:" .$fail_count. "人<br>";
echo "平均点:" .$average. "点<br>";
?>
</body>
</html>
