<?php

function palindrome($number, $x)
{
	if (strlen($number) === 0) {
		return 1;
	}

	if (!is_numeric(substr($number, 0, $x))) {
		return -1;
	} else {
		if (substr($number, 0, 1) === substr($number, strlen($number)-1, 1)) {
			return palindrome(substr($number, $x, strlen($number)-2), $x+1);
		}

		return -1;
	}
}

function getHighestPelindrome($str, $k, $n, $m, $result)
{
	if ($k > strlen($str)) {
		return $result;
	}

	if ($result !== 0 && $n === 9 && $m === strlen($str)-1) {
		return $result;
	}

	$x = str_split($str);
	if ($k > 1) {
		$x = replace($x, $k, $n, 0);
	} else {
		$x[$m] = $n;
	}
	$z = implode('', $x);
	
	// var_dump($z); // Check result...
	
	$palindrome = palindrome($z, 1);

	if ($palindrome === 1) {
		if ((int) $z > $result) {
			$result = $z;
		}
	}

	if ($n < 9) {
		return getHighestPelindrome($str, $k, $n+1, $m, $result);
	} elseif ($n === 9 && $m < strlen($str)-1) {
		$m = $m + 1;

		return getHighestPelindrome($str, $k, 1, $m, $result);
	}
}

function replace($arr, $b, $g, $f)
{
	if ($b === $f) {
		return $arr;
	}

	$arr[$f] = $g;

	return replace($arr, $b, $g, $f+1);
}

$str = "3943";
$k = 1;

// $str = "3444";
// $k = 2;

echo getHighestPelindrome($str, $k, 1, 0, -1);
