<?php

class Member {
    var $id = 'hong';
    public $name = '홍길동';
    protected $nickname = '쾌도 홍길동';
    private $age = 28;
}

$member = new Member();
echo $member->id.'<br>';
echo $member->name.'<br>';
//echo $member->nickname; // 직접 접근 불가, protected
//echo $member->age;      // 직접 접근 불가, private

/*
var 키워드
public과 동의어, public 사용을 권장
*/
