<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

// metaseo hook
// $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['metaseo']['hooks']['metatagSetup'][] = 'EXT:metaseo/examples/hooks.php:user_metaseo_hook->hook_metatagSetup';

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'C1.' . $_EXTKEY,
	'List',
	array(
		'Portfolio' => 'list, show',
		
	),
	// non-cacheable actions
	array(
		'Portfolio' => '',
		
	)
);
