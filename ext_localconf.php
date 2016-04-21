<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

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
