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

class bar extends foo
{
	public    $pub = 'bar';
	protected $pro = 'bar';
	private   $pri = 'bar'; // we don't see this, we'd need php 5.1 new serialization
	
	function __construct()
	{
		$this->bar = true;
	}
	
	function change()
	{
		$this->pri = 'mod';
	}
}

class baz extends bar
{
	private $pri = 'baz';

	function __construct()
	{
		parent::__construct();
		$this->baz = true;
	}
}

$baz = new baz;
var_dump($baz);
$baz->change();
var_dump($baz);
apc_store('baz', $baz);
unset($baz);
var_dump(apc_fetch('baz'));

?>
===DONE===
