<?php

$firstname = $_GET['firstname'];
$lastname = $_GET['lastname'];
echo htmlspecialchars($firstname, ENT_QUOTES, 'UTF-8').' '.
        htmlspecialchars($lastname, ENT_QUOTES, 'UTF-8').'님, 홈페이지 방문을 환영합니다!';

