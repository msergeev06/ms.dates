<?php
/**
 * Файл обновления версии 1.1.0 модуля ms.dates
 *
 * @package Ms\Dates
 * @author Mikhail Sergeev <msergeev06@gmail.com>
 * @copyright 2019 Mikhail Sergeev
 */

use Ms\Core\Entity\Type\Date;

$arAdd = array (
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

$res = Ms\Dates\Tables\WorkCalendarTable::add($arAdd);

\Ms\Core\Lib\Installer::copyFiles(dirname(__FILE__).'/tables',dirname(__FILE__).'/../../tables');
\Ms\Core\Lib\Installer::copyFiles(dirname(__FILE__).'/version.php',dirname(__FILE__).'/../../version.php');