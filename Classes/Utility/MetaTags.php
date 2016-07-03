<?php

namespace C1\C1Portfolio\Utility;

/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

/**
 * Meta tags Utility class
 *
 */
use TYPO3\CMS\Core\Utility\GeneralUtility;

class MetaTags {

    /**
     * set page title for show views
     *
     * @param \C1\C1Portfolio\Domain\Model\Portfolio $portfolio
     * @param string $position
     * @param string $divider
     * @return void
     */
    public function setPageTitle($portfolio, $position, $divider) {
        $title = $portfolio->getTitle();

        if ($position === 'before') {
            $title = $portfolio->getTitle() . \html_entity_decode($divider) . $GLOBALS['TSFE']->page['title'];
        } else { 
           $title = $GLOBALS['TSFE']->page['title'] . \html_entity_decode($divider) . $portfolio->getTitle();
        }

        if ($title) {
            $GLOBALS['TSFE']->page['title'] = $title;
            // if metaseo is loaded then use the connector to set the description meta tag
            if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('metaseo')) {
                $objectManager = GeneralUtility::makeInstance(
                                'TYPO3\\CMS\\Extbase\\Object\\ObjectManager'
                );
                $connector = $objectManager->get(\Metaseo\Metaseo\Connector::class);
                $connector->setMetaTag('title', $title);
                // setting the og:title does not work with current metaseo, see
                // https://github.com/mblaschke/TYPO3-metaseo/issues/214
                $connector->setOpenGraphTag('title', $title);
            }
        }
    }

    /**
     * set description meta tag for show views
     *
     * @param \C1\C1Portfolio\Domain\Model\Portfolio $portfolio
     * @return void
     */
    public function setDescription($portfolio) {
        $description = $portfolio->getDescshort();

        if ($description) {
            $GLOBALS['TSFE']->page['description'] = $description;
        }
        // if metaseo is loaded then use the connector to set the description meta tag
        if (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('metaseo')) {
            $objectManager = GeneralUtility::makeInstance(
                            'TYPO3\\CMS\\Extbase\\Object\\ObjectManager'
            );
            $connector = $objectManager->get(\Metaseo\Metaseo\Connector::class);
            $connector->setMetaTag('description', $GLOBALS['TSFE']->page['description']);
        }
    }

}
