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
		$this->_test_object = new RD_Disc();
	}



	/** Вызывается после каждого запуска тестового метода */
	protected function tearDown() : void {}



	/** Вызывается после каждого запуска тестового метода */
	protected function _root_folder() {
		$folder          = __DIR__;
		$folder          = \str_replace('\\', '/', $folder);
		$arr_folder      = \explode('/', $folder);
		\array_pop($arr_folder);
		return $folder   = implode('/', $arr_folder) . '/test_folder';
	}



	/** Проверяет чистку пути */
	public function test_clean_name() {
		$control_result   = $this->_root_folder() . '/test';
		$result           = $this->_test_object->clean_name($control_result);
		$this->assertEquals($result, $control_result, 'Чистка пути 1 выполнена неверно');
		$result           = $this->_test_object->clean_name($control_result . '/');
		$this->assertEquals($result, $control_result, 'Чистка пути 2 выполнена неверно');
		$result           = $this->_test_object->clean_name($control_result . '//');
		$this->assertEquals($result, $control_result, 'Чистка пути 3 выполнена неверно');
	}



	/** Проверяет информацию о папке */
	public function test_info_folder() {
		$result_control   = [
			'dirname' => $this->_root_folder(),
			'basename' => 'test',
			'filename' => 'test',
		];
		$result           = $this->_test_object->info($this->_root_folder() . '/test');
		$this->assertEquals($result, $result_control, 'Папка не создана');
	}



	/** Проверяет контроль существования папки */
	public function test_info_file() {
		$result_control   = [
			'dirname' => $this->_root_folder(),
			'basename' => 'test.txt',
			'extension' => 'txt',
			'filename' => 'test',
		];
		$result           = $this->_test_object->info($this->_root_folder() . '/test.txt');
		$this->assertEquals($result, $result_control, 'Папка не создана');
	}



	/** Проверяет формирования объекта папки */
	public function test_get_folder_object() {
		$result   = $this->_test_object->folder();
		$this->assertIsObject($result, 'Проверка на объект');
		$this->assertTrue(\is_a($result, $this->class_name_folder), 'Класс папки не найден');
	}



	/** Проверяет формирования объекта файла */
	public function test_get_file_object() {
		$result   = $this->_test_object->file();
		$this->assertIsObject($result, 'Проверка на объект');
		$this->assertTrue(\is_a($result, $this->class_name_file), 'Класс файла не найден');
	}



/**/
}
