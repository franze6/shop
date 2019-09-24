<?php

$re = '/^[а-яА-ЯёЁa-zA-Z0-9]+$/';
$str = 'Кирилл';

preg_match($re, $str, $matches, PREG_OFFSET_CAPTURE, 0);

// Print the entire match result
var_dump($matches);