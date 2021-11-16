<?php

class Example {
    public string $id;
    public string $name;
    public mixed $nickname;

    public function __construct(string $id, string $name, mixed $nickname) {
        $this->id = $id;
        $this->name = $name;
        $this->nickname = $nickname;
    }
}

//$example = new Example('hong', '홍길동', '쾌도 홍길동');
$example = new Example(id: 'hong', name: '홍길동', nickname: '쾌도 홍길동');

echo $example->id.'<br>';
echo $example->name.'<br>';
echo $example->nickname;
