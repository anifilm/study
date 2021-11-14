<?php

function myFunc($name, $age) {
    echo '저의 이름은 '.$name.'입니다. 나이는 '.$age.'살 입니다.'.'<br>';
}

myfunc('홍길동', 28);

function myFunc2($name, $age) {
    echo '저의 이름은 '.$name.'입니다. 나이는 '.$age.'살 입니다.'.'<br>';
}
// 명명된 매개변수를 사용하여 함수 호출
myFunc2(name: '홍길동', age: 20);
