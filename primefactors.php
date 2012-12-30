<?php

function hasModulo($val, $i)
{
    if ($val > PHP_INT_MAX) {
        if ( $i == 2  &&  in_array(substr($val, -1), ['0','2','4','6','8'])) {
            return false;
        }
        return (bcmod($val, $i) == 0) ? false : true;
    } else {
        return ($val % $i == 0) ? false : true;
    }
}

function isPrime($num)
{
    if ($num == 1) {
        return false;
    }

    if ($num == 2) {
        return true;
    }

    /**
     * if the number is divisible by two, then it's not prime and it's no longer
     * needed to check other even numbers
     */
    if (!hasModulo($num, 2)) {
        return false;
    }

    /**
     * Checks the odd numbers. If any of them is a factor, then it returns false.
     * The sqrt can be an aproximation, hence just for the sake of
     * security, one rounds it to the next highest integer value.
     */
    $ceiling = ceil(sqrt($num));

    for ($i = 3; $i <= $ceiling; $i = $i + 2) {
        if (!hasModulo($num, $i)) {
            return false;
        }
    }

    return true;
}

function primeFactors($nb)
{
    if ($nb < 2) {
        die('Error, number should be > 2');
    }

    $factors = [];

    // We test 2 separately because it is the only even prime number
    while (!hasModulo($nb, 2)) {
        $factors[] = 2;
        $nb = $nb / 2;
    }

    // Now we only have to test odd numbers, better for performance
    for ($i = 3; $i <= $nb; $i = $i+2) {
        while (!hasModulo($nb, $i)) {
            $factors[] = $i;
            $nb = $nb / $i;
        }
    }

    return $factors;
}

$val = isset($_GET['val']) ? $_GET['val'] : 100;
$factors = primeFactors($val);

echo '<a href="http://projecteuler.net/problem=3">Prime factors test <br></a>';
echo implode(' x ', $factors) . "= $val <br>";
echo "The largest factor of $val is " . end($factors);
