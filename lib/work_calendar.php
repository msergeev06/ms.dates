<?php
/**
 * Работа с производственным календарем
 *
 * @package Ms\Dates
 * @subpackage Lib
 * @author Mikhail Sergeev <msergeev06@gmail.com>
 * @copyright 2018 Mikhail Sergeev
 */

namespace Ms\Dates\Lib;

use Ms\Core\Entity\Type\Date;
use Ms\Dates\Tables\WorkCalendarTable;

/**
 * Class WorkCalendar
 *
 * @package Ms\Dates
 * @ubpackage Lib
 */
class WorkCalendar
{
	/**
	 * Возвращает true, если заданный или сегодняшний день выходной по рабочему календарю
	 *
	 * @param Date|NULL $date Требуемая дата, либо NULL - сегодня
	 *
	 * @return bool Если выходной - true, иначе false
	 */
	public static function isWeekEnd (Date $date=null)
	{
		if (is_null($date))
		{
			$date = new Date();
		}

		$dayOfWeek = (int)$date->format('w');
		$res = WorkCalendarTable::getOne(array(
			'filter' => array(
				'DATE' => $date
			)
		));
		if (!$res)
		{
			//Если дата не найдена - смотрим день недели и отвечаем выходной он или нет
			if ($dayOfWeek>=1 && $dayOfWeek<=5)
			{
				return false;
			}
			else
			{
				return true;
			}
		}
		else
		{
			//Если дата найдена - смотрим выходной день или нет по флагу
			if ($res["WEEKEND"] == "Y" || $res["WEEKEND"]===true)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}

	/**
	 * Возвращает заданное количество значений выходных/будней, начиная с переданной даты
	 *
	 * Если искали выходные и найдены рабочие, которые стали выходными - возвращает 'Y'
	 * Также возвращает 'Y', если искали рабочие и найдены выходные, которые стали рабочими
	 * Если искали выходные но найдены выходные, которые стали рабочими, возвращает 'N'
	 * Также возвращает 'N', если искали рабочие и найдены рабочие, которые стали выходными
	 * Возвращает 'X', когда о том, выходной день или нетб нужно судить обычным образомб т.е.
	 * выходные дни это суббота и воскресение, а остальные рабочие
	 *
	 * @param array|Date $mDate   Массив полей day, month, year, либо объект класса Date
	 * @param bool       $weekend Флаг выходного дня
	 * @param int        $count   Количество дней в результате
	 *
	 * @return array|bool
	 */
	public static function getNearestDatesList ($mDate,$weekend=true,$count=15)
	{
		if (is_array($mDate)
			&& (!isset($mDate['day']) || !isset($mDate['month']) || !isset($mDate['year']))
		)
		{
			return false;
		}
		elseif (is_array($mDate))
		{
			$mk = new Date($mDate['year'].'-'.$mDate['month'].'-'.$mDate['day']);
		}
		elseif ($mDate instanceof Date)
		{
			$mk = $mDate;
		}
		else
		{
			return false;
		}

		$arReturn = array();
		$arDates = array ();
		for ($i=0; $i<$count; $i++)
		{
			if ($i > 0)
			{
				$mk->modify('+1 day');
			}
			$arDates[] = clone($mk);
		}
		$res = WorkCalendarTable::getList(array(
			'filter' => array(
				"DATE" => $arDates
			)
		));
		if ($res)
		{
			$ar_dates = array ();
			/** @var Date[] $ar_date */
			foreach ($res as $ar_date)
			{
				$ar_dates[$ar_date['DATE']->getDateDB()] = $ar_date['WEEKEND'];
			}
			foreach ($arDates as $_date)
			{
				if (isset($ar_dates[$_date->getDateDB()]))
				{
					if ($ar_dates[$_date->getDateDB()]===$weekend)
					{
						$arReturn[$_date->getDateDB()] = 'Y';
					}
					else
					{
						$arReturn[$_date->getDateDB()] = 'N';
					}
				}
				else
				{
					$arReturn[$_date->getDateDB()] = 'X';
				}
			}
		}

		return (!empty($arReturn)) ? $arReturn : false;
	}
}