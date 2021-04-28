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



	/** Чистит путь к папке
	 * @param string $folder Полный путь директории
	 */
	public function clean($folder) {
		# Разворачиваем все обратные слэши
		$folder = \str_replace('\\', '/', $folder);
		# Чистим сдвоенные слэши
		$folder = preg_replace('/(\/)+/ui', '/', $folder);
		# Если есть закрывающий слэш - удаляем
		if ($folder[-1] === '/') {
			$folder = \function_exists('mb_substr')
					? \mb_substr($folder, 0, -1)
					: \substr($folder, 0, -1);
		}
		return $folder;
	}



	/** Проверяет существование указанной папки и создаёт при отсутствии
	 * @param string $folder Полный путь директории
	 */
	public function exists_control($folder) {
		$arr_folder = \explode('/', $this->clean($folder));
		$_folder = '';
		foreach($arr_folder as $k => $v) {
			$_folder = $_folder . $v . '/';
			if (!\file_exists($_folder)) {
				if (!\mkdir($_folder, 0777)) {
					return false;
				};
			}
		}
		return true;
	}



/**/
}
