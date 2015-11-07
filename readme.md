## compose
Composing function calls in PHP

## Huh?
Check [Functiona composition in Wikipedia](https://en.wikipedia.org/wiki/Function_composition_(computer_science)).

**TL;DR**:
`compose` is a simple utility to transform this code:
```php
$h($g($f($x)))
```
to this code:
```php
compose($h, $g, $f)(x);
```

## Installing
```bash
composer require srph/php-compose@latest
```

## Usage
```php
$square = function(n) {
	return n * N;
}

$pow = function($exponent) {
	return function($n) use ($exponent) {
		for (;$exponent--;) {
			$n .= $n;
		}
	}
}

$input = 2;
$f = compose($square, $pow(3), $square);
$f($input); // 4096
```
You may pass an infinite number of functions to `compose(...fn): Closure`.