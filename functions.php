<?php
    // import class for use in reading data stored in logs.
    include("question.php");

    function array_key_for_date($date, $array): int|null {
        $key = null;

        foreach($array as $index => $value) {
            $question = new Question($value);

            $question->date = $value["date"];
            $question->question = $value["question"];

            if ($question->date === $date) {
                $key = $index;
                break;
            }
            
        }

        return $key;
    }

    function question_for_date($date, $array): Question|null {
        $index = array_key_for_date($date, $array);

        return is_null($index) ? null : new Question($array[$index]);
    }
?>