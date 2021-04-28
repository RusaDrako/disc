<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../src/autoload.php');



/**
 * @author Петухов Леонид <l.petuhov@okonti.ru>
 */
class disc_Test extends TestCase {
	private $class_name_folder = 'RusaDrako\\disc\\folder';
	private $class_name_file = 'RusaDrako\\disc\\file';
	/** Тестируемый объект */
	private $_test_object = null;



	/** Вызывается перед каждым запуском тестового метода */
	protected function setUp() : void {
		$this->_test_object = new RD_Obj_Disc();
	}



	/** Вызывается после каждого запуска тестового метода */
	protected function tearDown() : void {}



	/** Проверяет формирования объекта папки */
	public function test_get_folder_object() {
		$result = $this->_test_object->folder();
		$this->assertIsObject($result, 'Проверка на объект');
		$this->assertTrue(\is_a($result, $this->class_name_folder), 'Класс папки не найден');
	}



	/** Проверяет формирования объекта файла */
	public function test_get_file_object() {
		$result = $this->_test_object->file();
		$this->assertIsObject($result, 'Проверка на объект');
		$this->assertTrue(\is_a($result, $this->class_name_file), 'Класс файла не найден');
	}



/**/
}
