<?php

include 'AnswerBook/User.php';
include 'AnswerBook/PHP/User.php';
include 'AnswerBook/PYTHON/User.php';

use AnswerBook\User as User;
use AnswerBook\PHP\User as PhpUser;
use AnswerBook\PYTHON\User as PythonUser;

$user1 = new User();
echo $user1->getNameSpaceName().'<br>';

$user2 = new PhpUser();
echo $user2->getNameSpaceName().'<br>';

$user3 = new PythonUser();
echo $user3->getNameSpaceName().'<br>';
