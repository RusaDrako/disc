<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../src/autoload.php');



/**
 * @author Петухов Леонид <l.petuhov@okonti.ru>
 */
class folder_Test extends TestCase {
	/** Тестируемый объект */
	private $_test_object = null;



	/** Вызывается перед каждым запуском тестового метода */
	protected function setUp() : void {
		$this->_test_object = (new RD_Obj_Disc())->folder();
	}



	/** Вызывается после каждого запуска тестового метода */
	protected function tearDown() : void {}



	/** Вызывается после каждого запуска тестового метода */
	protected function _root_folder() {
		$folder = __DIR__;
		$folder = \str_replace('\\', '/', $folder);
		$arr_folder = \explode('/', $folder);
		array_pop($arr_folder);
		return $folder = implode('/', $arr_folder) . '/___test_folder/';
	}



	/** Проверяет чистку пути */
	public function test_clean() {
		$control_result = $this->_root_folder() . 'test';
		$result = $this->_test_object->clean($control_result);
		$this->assertEquals($result, $control_result, 'Чистка пути 1 выполнена неверно');
		$result = $this->_test_object->clean($control_result . '/');
		$this->assertEquals($result, $control_result, 'Чистка пути 2 выполнена неверно');
		$result = $this->_test_object->clean($control_result . '//');
		$this->assertEquals($result, $control_result, 'Чистка пути 3 выполнена неверно');
	}



	/** Проверяет контроль существования папки */
	public function test_exists_control() {
		$result = $this->_test_object->exists_control($this->_root_folder() . 'test');
		$this->assertTrue($result, 'Папка не создана');
	}



/**/
}
