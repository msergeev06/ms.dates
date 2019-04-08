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
			array('DATE'=>new Date('2019-01-01'),'WEEKEND' => TRUE),
			array('DATE'=>new Date('2019-01-02'),'WEEKEND' => TRUE),
			array('DATE'=>new Date('2019-01-03'),'WEEKEND' => TRUE),
			array('DATE'=>new Date('2019-01-04'),'WEEKEND' => TRUE),
			array('DATE'=>new Date('2019-01-07'),'WEEKEND' => TRUE),
			array('DATE'=>new Date('2019-01-08'),'WEEKEND' => TRUE),
			array('DATE'=>new Date('2019-03-08'),'WEEKEND' => TRUE),
			array('DATE'=>new Date('2019-05-01'),'WEEKEND' => TRUE),
			array('DATE'=>new Date('2019-05-02'),'WEEKEND' => TRUE),
			array('DATE'=>new Date('2019-05-03'),'WEEKEND' => TRUE),
			array('DATE'=>new Date('2019-05-09'),'WEEKEND' => TRUE),
			array('DATE'=>new Date('2019-05-10'),'WEEKEND' => TRUE),
			array('DATE'=>new Date('2019-06-12'),'WEEKEND' => TRUE),
			array('DATE'=>new Date('2019-11-04'),'WEEKEND' => TRUE)
		);
	}
}