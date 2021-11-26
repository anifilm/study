<?php

declare(strict_types=1); // strict 모드 지정, 자료형 검사를 엄격하게 수행

class Parents {
    public string $txt = '부모 클래스의 프로퍼티입니다.'.'<br>';

    public function name(): string {
        return $this->txt.'부모 메서드입니다.'.'<br>';
    }
}

class Child extends Parents {
    public string $txt = '자식 클래스의 프로퍼티입니다.'.'<br>';

    public function name(): string { // 메서드 오버라이딩
        return $this->txt.'자식 메서드입니다.'.'<br>';
    }
}

$parents = new Parents();
$child = new Child();

echo $parents->name();
echo $child->name();
