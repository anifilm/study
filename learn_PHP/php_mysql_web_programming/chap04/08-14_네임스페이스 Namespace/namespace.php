<?php

namespace AnswerBook\PHP; // 네임스페이스 선언

class Student {
    public function __construct(
        protected $name
    ) {}

    public function name() {
        return $this->name;
    }
}

namespace AnswerBook\PYTHON; // 네임스페이스 선언

class Student {
    public function __construct(
        protected $name
    ) {}

    public function name() {
        return $this->name;
    }
}

$php = new \AnswerBook\PHP\Student('PHP');
echo $php->name().'<br>';

$python = new \AnswerBook\PYTHON\Student('PYTHON');
echo $python->name().'<br>';
