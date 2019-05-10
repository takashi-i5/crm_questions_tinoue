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

<h2>あなたの答え</h2>

<ul>
<?php
if (array_search(1, $result) % 4 > 0) {
    echo array_search(1, $result) % 4;
} else {
    echo 4;
}
?>
</ul>

<h2>解答</h2>

<ul>
<?php foreach ($numberquestionsanswers as $nqa) : ?>
<?php
if ($nqa['NumberQuestionsAnswer']['question_id'] == 1) {
    echo $nqa['NumberQuestionsAnswer']['number_answer'];
    break;
}
?> 
<?php endforeach; ?>



</ul>

<h2>解説</h2>

<ul>
<?php foreach ($questionschoicesreasons as $qcr) : ?>
<li type="1">
<?php
if ($qcr['QuestionsChoicesReason']['question_id'] == 1) {
    echo $qcr['QuestionsChoicesReason']['reason'];
}
?> 
</li>
<?php endforeach; ?>
</ul>


<!DOCTYPE html> 
<html> 
    <head> 
        <title>第一問解答解説</title>
    </head>
    <body>
        <a href="./questions/index2">次の問題に進む</a>
    </body>
</html>