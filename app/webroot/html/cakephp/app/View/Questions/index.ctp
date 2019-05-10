<h3>氏名を登録してください</h3>
<form action="" method="POST">
    <input type="text" name="name" placeholder="input your name">
    <input type="submit" value="登録">
</form>


<h2>問題 1</h2>

<ul>
<?php foreach ($questions as $question) : ?>
<li>
<?php
if ($question['Question']['id'] == 1) {
    echo $question['Question']['question_sentence'];
    break;
}
?> 
</li>
<?php endforeach; ?>

</ul>

<h2>正解だと思う選択肢にチェックしてください</h2>

<ul>

<?php
echo $this->Form->create('Question', ['url' => ['action' => 'index2'], 'type' => 'get']);

$i = 1;

foreach ($questionschoicesreasons as $qcr) {
    echo $this->Form->checkbox($qcr['QuestionsChoicesReason']['id']);
    echo $i . ". " ;
    echo $qcr['QuestionsChoicesReason']['choice'];
    echo "<br />";
    $i += 1;
}

echo $this->Form->submit('答え合わせをする');

echo $this->Form->end();
?>



</ul>

<!-- <!DOCTYPE html> 
<html> 
    <head> 
        <title>第一問</title>
    </head>
    <body>
        <a href="./questions/index2">次へ</a>
    </body>
</html> -->