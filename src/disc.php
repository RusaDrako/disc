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
