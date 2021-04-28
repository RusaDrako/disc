<?php

namespace RusaDrako\disc;

/**
 * Класс работы с файлами
 */
class file {

	/** Объеки disc*/
	private $_obj_disc          = null;



	/** */
	public function __construct(disc $obj) {
		$this->_obj_disc = $obj;
	}



	/** Проверяет существование указанной папки и создаёт при отсутствии
	 * @param string $folder Полный путь директории
	 * @param string $basename Имя файла
	 * @param string $extension Расширение файла
	 */
	public function control_name_num(string $folder, string $basename, string $extension) {
		$folder = $this->_obj_disc->folder()->exists_control($folder);
		$i = 0;
		$file = "{$folder}{$basename}_$i.{$extension}";
		while (\file_exists($file)) {
			$i = $i + 1;
			$file = "{$folder}{$basename}_$i.{$extension}";
		}
		return $file;
	}



	/** Проверка файлов to
	 * @param string $file_to Полный путь к новому файлу
	 */
	protected function _control_to(string $file_to) {
		if (file_exists($file_to)) {
			throw new \Exception("Файл {$file_to} уже существует", 1);
		}

		$arr_file_to = $this->_obj_disc->info($file_to);
		$folder = $this->_obj_disc->folder()->exists_control($arr_file_to['dirname']);
		if (!$folder) {
			throw new \Exception("Не удалось создать папку назначения для: {$file_to}", 1);
		}

		$file = $folder . $arr_file_to['basename'];
		return $file;
	}



	/** Проверка файлов from
	 * @param string $file_from Полный путь к исходному файлу
	 */
	protected function _control_from(string $file_from) {
		if (!file_exists($file_from)) {
			throw new \Exception("Файл {$file_from} для перемещения не найден", 1);
		}

		return $file_from;
	}



	/** Перемещает файл из одной папки в другую
	 * @param string $file_from Полный путь к исходному файлу
	 * @param string $file_to Полный путь к новому файлу
	 */
	public function move(string $file_from, string $file_to) {
		$file_from = $this->_control_from($file_from);
		$file_new = $this->_control_to($file_to);

		# Перемещаем файл в новое место
		if (!\rename($file_from, $file_new)) {
			throw new \Exception("Не удалось переместить файл: {$file_from} => {$file_to}", 1);
		}

		return $file_new;
	}



	/** Копирует файл из одной папки в другую
	 * @param string $file_from Полный путь к исходному файлу
	 * @param string $file_to Полный путь к новому файлу
	 */
	public function copy(string $file_from, string $file_to) {
		$file_from = $this->_control_from($file_from);
		$file_new = $this->_control_to($file_to);

		# Копируем файл в новое место
		if (!\copy($file_from, $file_new)) {
			throw new \Exception("Не удалось скопировать файл: {$file_from} => {$file_to}", 1);
		}

		return $file_new;
	}



	/** Удаляет файл из одной папки в другую
	 * @param string $file Полный путь к файлу
	 */
	public function delete(string $file) {
		if (\file_exists($file)) {
			if (!@\unlink($file)) {
				throw new \Exception("Не удалось удалить файл: {$file}", 1);
			}
		}
		# Удаляем файл в новое место
		return true;
	}



/**/
}
