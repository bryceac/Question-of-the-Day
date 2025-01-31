<?php
    class Question {
        public $date;
        public $question;

        function __construct($array = []) {
            if (empty($array)) {
                $this->date = "";
                $this->question = "";
            } else {
                $this->date = $array["date"];
                $this->question = $array["question"];
            }
        }
    }
?>