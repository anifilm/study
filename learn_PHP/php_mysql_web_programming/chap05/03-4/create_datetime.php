<?php

echo time().'<br>';

$time = mktime(hour: 14, minute: 20, second: 29, month: 1, day:8, year: 2022);
echo $time.'<br>';

echo microtime().'<br>';
echo microtime(as_float: true).'<br>';

echo date(format: 'Y-m-d H:i:s', timestamp: $time).'<br>';
echo '<br>';

$datetime = new DateTime();
echo '현재 시각: ';
echo $datetime->format(format: 'Y-m-d H:i:s').'<br>';
echo '<br>';

$datetime2 = new DateTime(datetime: '2021-01-01 00:00:00');
$date_diff = $datetime->diff($datetime2);
echo '올해 지난 날짜: ';
echo $date_diff->format(format: '%a').'<br>';
echo '올해 지난 날짜: ';
echo $date_diff->days.'<br>';
echo '<br>';

$datetime3 = new DateTime(datetime: '2022-01-01 00:00:00');
$date_diff = $datetime->diff($datetime3);
echo '올해 남은 날짜: ';
echo $date_diff->format(format: '%a').'<br>';
echo '올해 남은 날짜: ';
echo $date_diff->days.'<br>';
