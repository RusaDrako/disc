<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../src/autoload.php');



/**
 * @author Петухов Леонид <l.petuhov@okonti.ru>
 */
class disc_Test extends TestCase {
	/** Тестируемый объект */
	private $_test_object = null;



	/** Вызывается перед каждым запуском тестового метода */
	protected function setUp() : void {
		$this->_test_object = new RD_Obj_Disc();
	}



	/** Вызывается после каждого запуска тестового метода */
	protected function tearDown() : void {}



	/** */
	public function test_new() {
		$this->assertEquals(1, 1, 'Неверное значение');
	}



/**/
}
