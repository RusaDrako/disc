<?php

namespace RusaDrako\disc;

/**
 * Класс работы с директориями
 */
class disc {

	private $_obj_folder          = null;
	private $_obj_file            = null;



	/** */
	public function __construct() {}



	/** Чистит путь к элементу
	 * @param string $item Полный путь директории/файла
	 */
	public function clean_name(string $item) {
		# Разворачиваем все обратные слэши
		$item = \str_replace('\\', '/', $item);
		# Чистим сдвоенные слэши
		$item = preg_replace('/(\/)+/ui', '/', $item);
		# Если есть закрывающий слэш - удаляем
		if ($item[-1] === '/') {
			$item = \function_exists('mb_substr')
					? \mb_substr($item, 0, -1)
					: \substr($item, 0, -1);
		}
		return $item;
	}



	/** Возвращает информацию об элементе
	 * @param string $folder Полный путь к директории/файлу
	 */
	public function info(string $item) {
		return pathinfo($this->clean_name($item));
	}



	/** Возвращает объект директории */
	public function folder() {
		if ($this->_obj_folder === null) {
			$this->_obj_folder = new folder($this);
		}
		return $this->_obj_folder;
	}



	/** Возвращает объект файла */
	public function file() {
		if ($this->_obj_file === null) {
			$this->_obj_file = new file($this);
		}
		return $this->_obj_file;
	}



/**/
}
