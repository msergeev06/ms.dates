<?php
/**
 * Описание модуля ms.dates
 *
 * @package Ms\Dates
 * @author Mikhail Sergeev <msergeev06@gmail.com>
 * @copyright 2018 Mikhail Sergeev
 */

use Ms\Core\Lib\Loc;
Loc::includeLocFile(__FILE__);

return array(
	'NAME' => Loc::getModuleMessage('ms.dates','name'),
	'DESCRIPTION' => Loc::getModuleMessage('ms.dates','description'),
	'URL' => 'https://dobrozhil.ru/modules/ms/dates/',
	'DOCS' => 'http://docs.dobrozhil.ru',
	'AUTHOR' => Loc::getModuleMessage('ms.dates','author'),
	'AUTHOR_EMAIL' => 'msergeev06@gmail.com'
);