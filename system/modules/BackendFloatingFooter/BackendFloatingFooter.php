<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2012 Leo Feyer
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
 * @copyright  Cliff Parnitzky 2012
 * @author     Cliff Parnitzky
 * @package    BackendFloatingFooter
 * @license    LGPL
 */

/**
 * Class BackendFloatingFooter
 *
 * Adds misc functions.
 * @copyright  Cliff Parnitzky 2012
 * @author     Cliff Parnitzky
 */
class BackendFloatingFooter {
	/**
	 * Adds some translated css definition.
	 */
	public function addTranslatedCss($strContent, $strTemplate) {
		if ($strTemplate == 'be_main') {
			$strContent .= '<style type="text/css">.tl_submit_container:before {content: "' . $GLOBALS['TL_LANG']['MSC']['BackendFloatingFooterTitle'] . '";}</style>';
		}
		return $strContent;
	}
}

?>