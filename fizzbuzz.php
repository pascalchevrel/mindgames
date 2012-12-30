<?php

echo '<a href="http://codingdojo.org/cgi-bin/wiki.pl?KataFizzBuzz">fizzbuzz test</a> <br>';

function fizzBuzz($number) {
    if (($number % 15) == 0) {
        $result = 'fizzbuzz';
    } elseif (($number % 5) == 0) {
        $result = 'buzz';
    } elseif (($number % 3) == 0) {
        $result = 'fizz';
    } else {
        $result = $number;
    }
    return $number . ' &rArr; ' . $result . '<br>';
}

for ($i=1; $i<100; $i++) {
    echo fizzBuzz($i);
}
