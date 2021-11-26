<?php

interface Animal { // 인터페이스 Animal 생성
    public function animal_type($type);
}

class Cat implements Animal { // 클래스 Cat에서 인터페이스 Animal을 상속
    public function animal_type($type) { // 인터페이스에 정의된 메서드를 구현
        echo $type.' 입니다.'.'<br>';
    }
}

$cat = new Cat(); // 클래스 Cat 인스넡스 생성
$cat->animal_type('고양이');
