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
 * Class BackendFloatingFooter
 *
 * Adds misc functions and initializes the footer.
 * @copyright  Cliff Parnitzky 2012-2014
 * @author     Cliff Parnitzky
 */
class BackendFloatingFooter extends Backend
{
	/**
	 * Initialize the object, import the user class file
	 */
	public function __construct()
	{
		parent::__construct();
		$this->import('BackendUser', 'User');
	}

	/**
	 * Adds translated css and javascript for the footer
	 */
	public function addStaticConfiguration($strName, $strLanguage)
	{
		if ($this->User->useBackendFloatingFooter)
		{
			$GLOBALS['TL_CSS'][] = 'system/modules/BackendFloatingFooter/html/footer.css';
			$GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/BackendFloatingFooter/html/footer.js';

			// make sure the hook is only executed once
			unset($GLOBALS['TL_HOOKS']['loadLanguageFile']['BackendFloatingFooterHook']);
		}
	}

	/**
	 * Adds translated css and javascript for the footer
	 */
	public function addTranslatedConfiguration($strContent, $strTemplate)
	{
		if ($strTemplate == 'be_main' && $this->User->useBackendFloatingFooter)
		{
			return preg_replace('/<\/head>/', "<style type=\"text/css\">.tl_submit_container:before {content: \"" . $GLOBALS['TL_LANG']['MSC']['BackendFloatingFooterTitle'] . "\";}</style>\n$0", $strContent, 1);
		}
		return $strContent;
	}
}

?>