<?php

namespace Question;

class Question
{
    private $question;
    private $answer_true;
    private $answers = [];

    public function __construct(string $question, array $answers)
    {
        $this->question = $question;
        $this->answers = $answers;
        $this->answer_true = $this->answers[0];
    }

    public function getQuestion(): string
    {
        return $this->question;
    }

    public function getAnswerTrue()
    {
        return $this->answer_true;
    }

    public function getAnswers(): array
    {
        shuffle($this->answers);
        return $this->answers;
    }
}
