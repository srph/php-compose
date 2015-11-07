<?php

/**
 * Composing function calls.
 *
 * @usage
 * compose($callback1, $callback2)($input);
 *
 * @param Closure(s)
 * @return Closure
 */
function compose() {
	$functions = func_get_args();

	// h(g(f(x)))
	return function($arg) use($functions) {
		// reverse $functions to apply it right-to-left
		return array_reduce(array_reverse($functions), function($composed, $f) {
			return $f($composed);
		}, $arg);
	};
}