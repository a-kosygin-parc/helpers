<?php
class StringHelper
{
	/**
	 * Вернёт транскрипцию
	 *
	 * @param string $plainText
	 * @return string
	 */
	public function translit($plainText)
	{
		static $map = array(
			'а' => 'a', 'б' => 'b',  'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'e',
			'ж' => 'j', 'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm',
			'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u',
			'ф' => 'f', 'х' => 'h', 'ц' => 'ts', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch', 'ъ' => 'y',
			'ы' => 'yi', 'ь' => '', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya',
		);

		return strtr(
			mb_strtolower(
				iconv(
					'WINDOWS-1251',
					'UTF-8',
					iconv(
						'UTF-8',
						'WINDOWS-1251//TRANSLIT',
						$plainText
					)
				),
				'UTF-8'
			),
			$map);
	}

	/**
	 * Вернёт ЧПУ по заданному URL
	 *
	 * @param string $plainText
	 * @return string
	 */
	public static function uri($plainText, $separator = '_')
	{
		return trim(preg_replace('#[^a-zA-Z0-9\-]+#', $separator, self::transcript($plainText)), $separator);
	}

}