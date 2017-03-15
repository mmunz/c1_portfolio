<?php
return array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:c1_portfolio/Resources/Private/Language/locallang_db.xlf:tx_c1portfolio_domain_model_portfolio',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'title,descshort,description,date,url,images,featured,customer,tags,',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('c1_portfolio') . 'Resources/Public/Icons/tx_c1portfolio_domain_model_portfolio.gif'
	),
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, descshort, description, date, url, images, featured, customer, tags',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, title, descshort;;;richtext:rte_transform[mode=ts_links], description;;;richtext:rte_transform[mode=ts_links], date, url, images, featured, customer, tags, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
	
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_c1portfolio_domain_model_portfolio',
				'foreign_table_where' => 'AND tx_c1portfolio_domain_model_portfolio.pid=###CURRENT_PID### AND tx_c1portfolio_domain_model_portfolio.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),

		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),

		'title' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:c1_portfolio/Resources/Private/Language/locallang_db.xlf:tx_c1portfolio_domain_model_portfolio.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
			
		),
		'descshort' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:c1_portfolio/Resources/Private/Language/locallang_db.xlf:tx_c1portfolio_domain_model_portfolio.descshort',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim',
			),
			'defaultExtras' => 'rte[]'
		),
		'description' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:c1_portfolio/Resources/Private/Language/locallang_db.xlf:tx_c1portfolio_domain_model_portfolio.description',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim',
			),
			'defaultExtras' => 'rte[]'
		),
		'date' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:c1_portfolio/Resources/Private/Language/locallang_db.xlf:tx_c1portfolio_domain_model_portfolio.date',
			'config' => array(
				'dbType' => 'datetime',
				'type' => 'input',
				'size' => 12,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => '0000-00-00 00:00:00'
			),
			
		),
		'url' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:c1_portfolio/Resources/Private/Language/locallang_db.xlf:tx_c1portfolio_domain_model_portfolio.url',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
			
		),
		'images' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:c1_portfolio/Resources/Private/Language/locallang_db.xlf:tx_c1portfolio_domain_model_portfolio.images',
			'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
				'images',
				array(
					'appearance' => array(
						'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference'
					),
					'foreign_types' => array(
						'0' => array(
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						),
						\TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => array(
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						),
						\TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => array(
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						),
						\TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => array(
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						),
						\TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => array(
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						),
						\TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => array(
							'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
						)
					),
					'maxitems' => 10
				),
				$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
			
		),
		'featured' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:c1_portfolio/Resources/Private/Language/locallang_db.xlf:tx_c1portfolio_domain_model_portfolio.featured',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
			
		),
		'customer' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:c1_portfolio/Resources/Private/Language/locallang_db.xlf:tx_c1portfolio_domain_model_portfolio.customer',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'tx_c1portfolio_domain_model_customer',
				'minitems' => 0,
				'maxitems' => 1,
			),
			
		),
		'tags' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:c1_portfolio/Resources/Private/Language/locallang_db.xlf:tx_c1portfolio_domain_model_portfolio.tags',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectMultipleSideBySide',
				'foreign_table' => 'tx_c1portfolio_domain_model_tag',
				'MM' => 'tx_c1portfolio_portfolio_tag_mm',
				'size' => 10,
				'autoSizeMax' => 30,
				'maxitems' => 9999,
				'multiple' => 0,
				'wizards' => array(
					'_PADDING' => 1,
					'_VERTICAL' => 1,
					'edit' => array(
						'module' => array(
							'name' => 'wizard_edit',
						),
						'type' => 'popup',
						'title' => 'Edit',
						'icon' => 'edit2.gif',
						'popup_onlyOpenIfSelected' => 1,
						'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
						),
					'add' => Array(
						'module' => array(
							'name' => 'wizard_add',
						),
						'type' => 'script',
						'title' => 'Create new',
						'icon' => 'add.gif',
						'params' => array(
							'table' => 'tx_c1portfolio_domain_model_tag',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
						),
					),
				),
			),
			
		),
		
	),
);