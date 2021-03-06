<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2014 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Cliff Parnitzky 2012-2014
 * @author     Cliff Parnitzky
 * @package    BackendFloatingFooter
 * @license    LGPL
 */

/**
 * Extending paletts
 */
foreach ($GLOBALS['TL_DCA']['tl_user']['palettes'] as $key => $row)
{
	if ($key == '__selector__')
	{
		continue;
	}

	$arrPalettes = explode(";", $row);

	$backendPalletIndex = 0;
	$backendExtendedPalletFound = false;
	foreach ($arrPalettes as $index => $pallet)
	{
		if (strpos($pallet, "backend-extended_legend") !== false)
		{
			$arrPalettes[$index] = $pallet . ",useBackendFloatingFooter";
			$backendExtendedPalletFound = true;
		}
		else if (strpos($pallet, "backend_legend") !== false)
		{
			$backendPalletIndex = $index;
		}
	}
	if (!$backendExtendedPalletFound)
	{
		array_insert($arrPalettes, $backendPalletIndex + 1, '{backend-extended_legend},useBackendFloatingFooter', false);
	}

	$GLOBALS['TL_DCA']['tl_user']['palettes'][$key] = implode(";", $arrPalettes);
}

/**
 * Add field
 */
$GLOBALS['TL_DCA']['tl_user']['fields']['useBackendFloatingFooter'] = array
(
	'label'     => &$GLOBALS['TL_LANG']['tl_user']['useBackendFloatingFooter'],
	'inputType' => 'checkbox',
	'eval'      => array('tl_class'=>'w50')
);

?>