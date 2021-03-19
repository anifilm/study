<?php
/* 13
다음은 공원 입력료를 계산하는 프로그램이다. 빈칸을 채워 프로그램을 완성하시오.
(예제 코드 생략...)
 */

$child_free = 5000; // 청소년 입장료 5,000원
$adult_free = 8000; // 성인 입장료 8,000원
$num_child = 3; // 청소년 3매
$num_adult = 2; // 성인 2매

$total_free = $child_free * $num_child + $adult_free * $num_adult;

echo "전체 입장료: {$total_free}원";
