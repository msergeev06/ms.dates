<?php
/**
 * Класс описания таблицы ms_dates_work_calendar
 *
 * @package Ms\Dates
 * @subpackage Tables
 * @author Mikhail Sergeev <msergeev06@gmail.com>
 * @copyright 2018 Mikhail Sergeev
 */

namespace Ms\Dates\Tables;

use Ms\Core\Entity\Db\Fields;
use Ms\Core\Entity\Type\Date;
use Ms\Core\Lib\DataManager;
use Ms\Core\Lib\Loc;

Loc::includeLocFile(__FILE__);

/**
 * Class WorkCalendarTable
 *
 * @package Ms\Dates
 * @subpackage Tables
 * @extends DataManager
 */
class WorkCalendarTable extends DataManager
{
    public static function getTableTitle ()
    {
        return Loc::getModuleMessage('ms.dates','table_title');
    }

    protected static function getMap ()
    {
        return array(
        	new Fields\DateField('DATE',array (
        		'primary' => true,
		        'title' => Loc::getModuleMessage('ms.dates','field_date')
	        )),
            new Fields\BooleanField("WEEKEND",array(
                "required" => true,
                "title" => Loc::getModuleMessage('ms.dates','field_weekend')
            ))
        );
    }

	public static function getValues ()
	{
		return array (
			array('DATE'=>new Date('2018-01-01'),'WEEKEND' => TRUE),
			array('DATE'=>new Date('2018-01-02'),'WEEKEND' => TRUE),
			array('DATE'=>new Date('2018-01-03'),'WEEKEND' => TRUE),
			array('DATE'=>new Date('2018-01-04'),'WEEKEND' => TRUE),
			array('DATE'=>new Date('2018-01-05'),'WEEKEND' => TRUE),
			array('DATE'=>new Date('2018-01-08'),'WEEKEND' => TRUE),
			array('DATE'=>new Date('2018-02-23'),'WEEKEND' => TRUE),
			array('DATE'=>new Date('2018-03-08'),'WEEKEND' => TRUE),
			array('DATE'=>new Date('2018-03-09'),'WEEKEND' => TRUE),
			array('DATE'=>new Date('2018-04-28'),'WEEKEND' => FALSE),
			array('DATE'=>new Date('2018-04-30'),'WEEKEND' => TRUE),
			array('DATE'=>new Date('2018-05-01'),'WEEKEND' => TRUE),
			array('DATE'=>new Date('2018-05-02'),'WEEKEND' => TRUE),
			array('DATE'=>new Date('2018-05-09'),'WEEKEND' => TRUE),
			array('DATE'=>new Date('2018-06-09'),'WEEKEND' => FALSE),
			array('DATE'=>new Date('2018-06-11'),'WEEKEND' => TRUE),
			array('DATE'=>new Date('2018-06-12'),'WEEKEND' => TRUE),
			array('DATE'=>new Date('2018-11-05'),'WEEKEND' => TRUE),
			array('DATE'=>new Date('2018-12-29'),'WEEKEND' => FALSE),
			array('DATE'=>new Date('2018-12-31'),'WEEKEND' => TRUE)
		);
	}
}