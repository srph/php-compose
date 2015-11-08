## compose [![Build Status](https://img.shields.io/travis/srph/compose.svg?style=flat-square)](https://travis-ci.org/srph/compose?branch=master) [![Latest Stable Version](https://poser.pugx.org/srph/compose/v/stable)](https://packagist.org/packages/srph/compose) [![Total Downloads](https://poser.pugx.org/srph/compose/downloads)](https://packagist.org/packages/srph/compose) [![Latest Unstable Version](https://poser.pugx.org/srph/compose/v/unstable)](https://packagist.org/packages/srph/compose) [![License](https://poser.pugx.org/srph/compose/license)](https://packagist.org/packages/srph/compose)
Composing function calls in PHP

## Huh?
`compose` is a simple utility to do this:
```php
// then
$h($g($f($x)))
// now
compose($h, $g, $f)(x);
```

More on [Functional composition - Wikipedia](https://en.wikipedia.org/wiki/Function_composition_(computer_science)).

## Installing
```bash
composer require srph/compose
```

## Usage
```php
$square = function($n) {
	return $n * $n;
}

$pow = function($exponent) {
	return function($n) use ($exponent) {
		for (;$exponent--;) {
			$n .= $n;
		}
		
		return $n;
	}
}

$input = 2;
$f = compose($square, $pow(3), $square);
$f($input); // 4096
```
You may pass an infinite number of functions to `compose(...fn): Closure`.
