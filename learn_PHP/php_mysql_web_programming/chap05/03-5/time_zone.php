<?php

$timestamp = time();

date_default_timezone_set(timezoneId: 'UTC');
echo 'UTC 시간: ';
echo date(format: 'Y-m-d H:i:s', timestamp: $timestamp).'<br>';

date_default_timezone_set(timezoneId: 'Asia/Seoul');
echo '서울 시간: ';
echo date(format: 'Y-m-d H:i:s', timestamp: $timestamp).'<br>';

date_default_timezone_set(timezoneId: 'America/New_York');
echo '뉴욕 시간: ';
echo date(format: 'Y-m-d H:i:s', timestamp: $timestamp).'<br>';
