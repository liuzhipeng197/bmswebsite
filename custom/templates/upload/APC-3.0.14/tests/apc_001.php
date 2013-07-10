<?php

$foo = 'hello world';
var_dump($foo);
apc_store('foo',$foo);
$bar = apc_fetch('foo');
var_dump($bar);
$bar = 'nice';
var_dump($bar);

?>
===DONE===
