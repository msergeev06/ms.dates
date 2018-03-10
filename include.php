<?php
/**
 * Основной подключаемый файл модуля
 *
 * @package Ms\Dates
 * @author Mikhail Sergeev <msergeev06@gmail.com>
 * @copyright 2018 Mikhail Sergeev
 */

use Ms\Core\Lib\Loader;
use Ms\Core\Entity\Application;

$app = Application::getInstance();

$moduleName = 'ms.dates';
$moduleRoot = $app->getSettings()->getModulesRoot().'/'.$moduleName;
$namespaceRoot = 'Ms\Dates';

Loader::AddAutoLoadClasses(
	array(
		/** Lib */
		$namespaceRoot.'\Lib\WorkCalendar' => $moduleRoot.'/lib/work_calendar.php',
		/** Tables */
		$namespaceRoot.'\Tables\WorkCalendarTable' => $moduleRoot.'/tables/work_calendar.php'
	)
);

