<?php

namespace C1\C1Portfolio\Domain\Repository;

/* * *************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016 Manuel Munz <t3dev@comuno.net>, comuno.net
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 * ************************************************************* */

/**
 * The repository for Portfolios
 */
class PortfolioRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
    public function findAllLimit($limit=9999) {
        return $this->createQuery()->setLimit($limit)->execute();
    }

    // Order by BE sorting
    protected $defaultOrderings = array(
        'date' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING
    );

    /**
     * get file references
     *
     * @param integer $record_id
     * @return TYPO3\CMS\Core\Resource\FileReference
     */
    public function getFileReferences($record_id) {
        $fileRepository = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Resource\\FileRepository');
        $fileObjects = $fileRepository->findByRelation('tx_c1portfolio_domain_model_portfolio', 'images', $record_id);
        return $fileObjects;
    }

}
