<?php

class Example {
    public function __construct(
        public string $id,
        public string $name,
        public mixed $nickname,
    ) {}
}

//$example = new Example('hong', '홍길동', '쾌도 홍길동');
$example = new Example(id: 'hong', name: '홍길동', nickname: '쾌도 홍길동');

echo $example->id.'<br>';
echo $example->name.'<br>';
echo $example->nickname;
