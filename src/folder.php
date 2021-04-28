<?php

namespace RusaDrako\disc;

/**
 * Класс работы с директориями
 */
class folder {

	/** Объеки disc*/
	private $_obj_disc          = null;



	/** */
	public function __construct(disc $obj) {
		$this->_obj_disc = $obj;
	}



	/** Проверяет существование указанной папки и создаёт при отсутствии
	 * @param string $folder Полный путь директории
	 */
	public function exists_control(string $folder) {
		$arr_folder = \explode('/', $this->_obj_disc->clean_name($folder));
		$_folder = '';
		foreach($arr_folder as $k => $v) {
			$_folder = $_folder . $v . '/';
			if (!\file_exists($_folder) && !\is_dir($_folder)) {
				if (!\mkdir($_folder, 0777)) {
					return false;
				};
			}
		}
		return $_folder;
	}



/**/
}
