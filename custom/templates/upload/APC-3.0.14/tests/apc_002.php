<?php

class foo { }
$foo = new foo;
var_dump($foo);
apc_store('foo',$foo);
unset($foo);
$bar = apc_fetch('foo');
var_dump($bar);
$bar->a = true;
var_dump($bar);

?>
===DONE===
