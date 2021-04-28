<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../src/autoload.php');



/**
 * @author Петухов Леонид <l.petuhov@okonti.ru>
 */
class file_Test extends TestCase {
	/** Тестируемый объект */
	private $_test_object = null;



	/** Вызывается перед каждым запуском тестового метода */
	protected function setUp() : void {
		$this->_test_object = (new RD_Obj_Disc())->file();
	}



	/** Вызывается после каждого запуска тестового метода */
	protected function tearDown() : void {}



	/** Вызывается после каждого запуска тестового метода */
	protected function _root_folder() {
		$folder = __DIR__;
		$folder = \str_replace('\\', '/', $folder);
		$arr_folder = \explode('/', $folder);
		array_pop($arr_folder);
		return $folder = implode('/', $arr_folder) . '/test_folder';
	}



	/* * * /
	public function test_new() {
		$this->assertEquals(1, 1, 'Неверное значение');
	}



	/** Проверяет контроль имени файла */
	public function test_control_name_num() {
		$result_control = "{$this->_root_folder()}/test_0.txt";
		$result = $this->_test_object->control_name_num($this->_root_folder(), 'test', 'txt');
		$this->assertEquals($result, $result_control, 'Папка не создана');
	}



	/** Проверяет перемещение файла */
	public function test_move() {
		$from   = $this->_root_folder() . '/test_from/testfile.txt';
		$to     = $this->_root_folder() . '/test_to/testfile.txt';
		$this->assertTrue(\file_exists($from), 'Файл для перемещения не найден');
		$this->assertFalse(\file_exists($to), 'Файл назначения существует: ' . $to);
		$result = $this->_test_object->move($from, $to);
		$this->assertEquals($result, $to, 'Папка не создана');
		$this->assertTrue(\file_exists($to), 'Файл не удалён: ' . $from);
		$this->assertFalse(\file_exists($from), 'Файл не перемещён: ' . $to);
	}



	/** Проверяет перемещение файла (ошибка: файла для перемещения нет) */
	public function test_move_error() {
		$from   = $this->_root_folder() . '/test_from/testfile.txt';
		$to     = $this->_root_folder() . '/test_to/testfile.txt';
		$this->assertFalse(\file_exists($from), 'Файл для перемещения уже существует: ' . $from);
		$this->assertTrue(\file_exists($to), 'Файл назначения не существует: ' . $to);
		$result = null;
		try {
			$this->_test_object->move($from, $to);
		} catch (\Exception $e) {
			$result = $e->getMessage();
		}
		$this->assertEquals($result, "Файл {$from} для перемещения не найден");
		$this->_test_object->move($to, $from);
	}



	/** Проверяет контроль существования папки */
	public function test_copy() {
		$from   = $this->_root_folder() . '/test_from/testfile.txt';
		$to     = $this->_root_folder() . '/test_to/testfile.txt';
		$this->assertTrue(\file_exists($from), 'Файл для копирования не найден: ' . $from);
		$this->assertFalse(\file_exists($to), 'Файл назначения существует: ' . $to);
		$result = $this->_test_object->copy($from, $to);
		$this->assertEquals($result, $to, 'Папка не создана');
		$this->assertTrue(\file_exists($to), 'Файл удалён: ' . $from);
		$this->assertTrue(\file_exists($from), 'Файл не скопирован: ' . $to);
	}



	/** Проверяет перемещение файла (ошибка: файл назначения существует) */
	public function test_move_error_2() {
		$from   = $this->_root_folder() . '/test_from/testfile.txt';
		$to     = $this->_root_folder() . '/test_to/testfile.txt';
		$this->assertTrue(\file_exists($from), 'Файл для перемещения не найден: ' . $from);
		$this->assertTrue(\file_exists($to), 'Файл назначения не существует: ' . $to);
		$result = null;
		try {
			$this->_test_object->move($from, $to);
		} catch (\Exception $e) {
			$result = $e->getMessage();
		}
		$this->assertEquals($result, "Файл {$to} уже существует");
	}



	/** Проверяет контроль существования папки */
	public function test_delete() {
		$file     = $this->_root_folder() . '/test_to/testfile.txt';
		$this->assertTrue(\file_exists($file), 'Файл не существует: ' . $file);
		$result = $this->_test_object->delete($file);
		$this->assertFalse(\file_exists($file), 'Файл существует: ' . $file);
		$result = $this->_test_object->delete($file);
		$this->assertFalse(\file_exists($file), 'Файл существует: ' . $file);
	}



/**/
}
