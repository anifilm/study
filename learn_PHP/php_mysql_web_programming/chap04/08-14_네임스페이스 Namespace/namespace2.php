<?php

include 'AnswerBook/User.php';
include 'AnswerBook/PHP/User.php';
include 'AnswerBook/PYTHON/User.php';

$user1 = new \AnswerBook\User();
echo $user1->getNameSpaceName().'<br>';

$user2 = new \AnswerBook\PHP\User();
echo $user2->getNameSpaceName().'<br>';

$user3 = new \AnswerBook\PYTHON\User();
echo $user3->getNameSpaceName().'<br>';
