--TEST--
Test class defaults
--DESCRIPTION--
Class defaults should now initialize defaults properly
--FILE--
<?php
class Test extends Thread {

	public function run(){
		var_dump($this);
	}
	
	protected $string = "hello world";
	protected $array  = array(1, 2, 3);
	private $pstring  = "world hello";
	private $parray   = array(3, 2, 1);
	protected static $nocopy = true;
}

$test =new Test();
$test->string = strrev($test->string);
$test->start();
$test->join();
?>
--EXPECT--
object(Test)#1 (4) {
  ["string"]=>
  string(11) "dlrow olleh"
  ["array"]=>
  array(3) {
    [0]=>
    int(1)
    [1]=>
    int(2)
    [2]=>
    int(3)
  }
  ["pstring"]=>
  string(11) "world hello"
  ["parray"]=>
  array(3) {
    [0]=>
    int(3)
    [1]=>
    int(2)
    [2]=>
    int(1)
  }
}

