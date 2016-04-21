<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'C1.' . $_EXTKEY,
	'List',
	'List portfolio entries'
);

// enable pi_flexform
//$TCA['tt_content']['types']['list']['subtypes_addlist'][$_EXTKEY]='pi_flexform';
//\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($_EXTKEY, 'EXT:c1_portfolio/Configuration/FlexForms/flexform_list.xml'); 

$extensionName = strtolower(\TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($_EXTKEY));
$pluginName = strtolower('list');
$pluginSignature = $extensionName.'_'.$pluginName;
//$TCA['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,pages,recursive';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:'.$_EXTKEY . '/Configuration/FlexForms/flexform_list.xml');


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'portfolio');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_c1portfolio_domain_model_portfolio', 'EXT:c1_portfolio/Resources/Private/Language/locallang_csh_tx_c1portfolio_domain_model_portfolio.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_c1portfolio_domain_model_portfolio');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_c1portfolio_domain_model_customer', 'EXT:c1_portfolio/Resources/Private/Language/locallang_csh_tx_c1portfolio_domain_model_customer.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_c1portfolio_domain_model_customer');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_c1portfolio_domain_model_tag', 'EXT:c1_portfolio/Resources/Private/Language/locallang_csh_tx_c1portfolio_domain_model_tag.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_c1portfolio_domain_model_tag');
