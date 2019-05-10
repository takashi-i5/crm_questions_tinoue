<?php
    $num_questions = 10;
    $num_selections = 4;

    $questions_keys = array_keys($questions);

    if ($num_questions == 1) {
        $rand_keys = [array_rand($questions_keys, $num_questions)];
    } else {
        $rand_keys = array_rand($questions_keys, $num_questions);
    }

    echo $this->Form->create('Question', ['url' => ['action' => 'index2'], 'type' => 'get']);

    echo $this->Form->hidden('rand_keys', ['value'=>$rand_keys]) ;

    for ($i = 0; $i < count($rand_keys); $i++) {
        $selected_questions = $questions[$rand_keys[$i]];
        $num_question = $i + 1;
        echo "<h2>問題 $num_question</h2>";
        $question_name = $selected_questions['Question']['question_sentence'];
        echo "<h3>$question_name</h3>";
        echo "<h4>正解と思う選択肢にチェックしてください</h4>";
        echo "<br />";

        $k = 1;
        if ($rand_keys[$i] > 0) {
            for ($j = ($rand_keys[$i] + 1) * $num_selections - $num_selections; $j < ($rand_keys[$i] + 1) * $num_selections; $j++) {
                $selected_choices = $questionschoicesreasons[$j];
                $checkbox = $this->Form->checkbox($selected_choices['QuestionsChoicesReason']['id']);
                $selected_choice = $selected_choices['QuestionsChoicesReason']['choice'];
                echo "<h4>$checkbox $k . ". " $selected_choice</h4>";
                echo "<br />";
                $k += 1;
            }
        } else {
            for ($j = 0; $j < $num_selections; $j++) {
                $selected_choices = $questionschoicesreasons[$j];
                $checkbox = $this->Form->checkbox($selected_choices['QuestionsChoicesReason']['id']);
                $selected_choice = $selected_choices['QuestionsChoicesReason']['choice'];
                echo "<h4>$checkbox $k . ". " $selected_choice</h4>";
                echo "<br />";
                $k += 1;
            }
        }

        echo '<br />';
    }

    $next_page = $this->Form->submit('答え合わせをする');
    echo "<h1>$next_page</h1>";

    echo $this->Form->end();


?>

<!-- <!DOCTYPE html> 
<html> 
    <head> 
        <title>第一問</title>
    </head>
    <body>
        <a href="./questions/index2">次へ</a>
    </body>
</html> -->