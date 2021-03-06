<?php

/***************************************************************
 * Extension Manager/Repository config file for ext: "c1_portfolio"
 *
 * Auto generated by Extension Builder 2016-04-07
 *
 * Manual updates:
 * Only the data in the array - anything else is removed by next write.
 * "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
	'title' => 'portfolio',
	'description' => 'A portfolio for web sites.',
	'category' => 'plugin',
	'author' => 'Manuel Munz',
	'author_email' => 't3dev@comuno.net',
	'state' => 'alpha',
	'internal' => '',
	'uploadfolder' => '1',
	'createDirs' => '',
	'clearCacheOnLoad' => 0,
	'version' => '0.0.1',
	'constraints' => array(
		'depends' => array(
			'typo3' => '7.6.0-8.9.99',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'autoload' => [
        	'psr-4' => [
	            'C1\\C1Portfolio\\' => 'Classes',
	        ]
	]

);
