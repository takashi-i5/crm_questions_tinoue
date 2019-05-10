<?php

    $num_questions = 10;
    $num_selections = 4;

    $result_sorted = array_values($result);

    $count = 1;
    for ($i = 0; $i < $num_questions * $num_selections; $i++) {
        if ($result_sorted[$i] == 1) {
            $usrs_ans[] = $count;
        } else {
        }

        if ($count < 4) {
            $count += 1;
        } else {
            $count = 1;
        }
    }

    for ($i = 0; $i < count($rand_keys); $i++) {
        $selected_questions = $questions[$rand_keys[$i]];
        $correct_ans = $numberquestionsanswers[$rand_keys[$i]];
        $num_question = $i + 1;
        echo "<h2>問題 $num_question</h2>";
        $question_name = $selected_questions['Question']['question_sentence'];
        echo "<h3>$question_name</h3>";
        echo '<br />';
        echo "<h4>あなたの答え</h4>";
        echo "<h4>$usrs_ans[$i]</h4>";
        echo "<h4>解答</h4>";
        $correct_num = $correct_ans['NumberQuestionsAnswer']['number_answer'];
        $correct_nums[] = $correct_num;
        echo "<h4>$correct_num</h4>";
        echo "<h4>解説</h4>";
        for ($j = 4 * $rand_keys[$i]; $j < 4 + 4 * $rand_keys[$i]; $j++) {
            $tmp = $questionschoicesreasons[$j];
            $qcr = $tmp['QuestionsChoicesReason']['reason'];
            echo "<h4>$qcr</h4>";
        }
        echo '<br />';
    }

    $score = count(array_intersect_assoc($usrs_ans, $correct_nums));

    echo "<b><font size='5' color='#ff0000'><p style='text-align: center'>あなたの正答数は $score でした！</p></font></b>";
    echo '<br />';
?>

<?php

    if ($score > 0) {
        echo $this->Form->create();
        echo "<font size='4' color='#000000'><p style='text-align: center'>おめでとうございます！殿堂入りです！氏名を入力してください！</p></font>";
        $inputted_name = $this->Form->input('name', array(
            'type' => 'text',
            'placeholder' => '氏名を入力する',
            'label' => '',
            'style' => array(
                'width:100px'
            )
        ));
        echo "<h1>$inputted_name</h1>";
        $register_name = $this->Form->submit('登録');
        echo "<h1>$register_name</h1>";
        echo $this->Form->end();
    }
?>

<?php
    if ($score == 10) {
        echo $this->Form->create();
        echo "<font size='4' color='#000000'><p style='text-align: center'>よろしければさらに難しいCRM関連の問題をお教え願えますでしょうか？</p></font>";
        $inputted_name = $this->Form->input('question', array(
            'type' => 'textarea',
            'placeholder' => '問題を入力する',
            'label' => '',
            'style' => array(
                'width:600px'
            )
        ));
        echo "<h1>$inputted_name</h1>";
        $register_name = $this->Form->submit('登録');
        echo "<h1>$register_name</h1>";
        echo $this->Form->end();
    }
        
    $crown = $this->Html->image('crown.png', array('alt' => 'crown', 'width' => '50', 'height' => '50'));
    echo "<b><font size='5' color='#000000'><p style='text-align: center'>$crown 高得点者一覧 $crown</p></font></b>";

    for ($k = 0; $k < count($names); $k++) {
        $rankers = $names[$k];
        $name_ranker = $rankers['Name']['name'];
        echo "<font size='4' color='#000000'><p style='text-align: center'>$name_ranker</p></font>";
    }

?>




<!-- <!DOCTYPE html> 
<html> 
    <head> 
        <title>第一問解答解説</title>
    </head>
    <body>
        <a href="./questions/index2">次の問題に進む</a>
    </body>
</html> -->