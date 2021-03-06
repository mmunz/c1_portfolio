<?php

namespace C1\C1Portfolio\Controller;

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
 * PortfolioController
 */


use C1\C1Portfolio\Utility\MetaTags;

class PortfolioController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

    /**
     * portfolioRepository
     *
     * @var \C1\C1Portfolio\Domain\Repository\PortfolioRepository
     * @inject
     */
    protected $portfolioRepository = NULL;

    /**
     * action list
     *
     * @return void
     */
    public function listAction() {
        $args = $this->request->getArguments();
        if (intval($args['portfolio']) > 0) {
            $this->forward('show');
        }
        $limit = intval($this->settings['list']['maxItems']);
        if ($limit > 0) {
            $portfolios = $this->portfolioRepository->findAllLimit($limit);
        } else {
            $portfolios = $this->portfolioRepository->findAll();
        }

        if (!intval($this->settings['list']['detailPid'] > 0)) {
            $this->settings['list']['detailPid'] = $GLOBALS['TSFE']->id;
        }

        foreach ($portfolios as $portfolio) {
            $images = $this->portfolioRepository->getFileReferences($portfolio->getUid());
            $portfolio->setMedia($images);
        }
        $this->view->assign('settings', $this->settings);
        $this->view->assign('portfolios', $portfolios);
    }


    /**
     * action show
     *
     * @param \C1\C1Portfolio\Domain\Model\Portfolio $portfolio
     * @return void
     */
    public function showAction(\C1\C1Portfolio\Domain\Model\Portfolio $portfolio) {
        if ($this->settings['show']['setPageTitle'] === '1') {
            MetaTags::setPageTitle(
                $portfolio,
                $this->settings['show']['pageTitlePosition'],
                $this->settings['show']['pageTitleDivider']);
        }
        if ($this->settings['show']['setDescription'] === '1') {
            MetaTags::setDescription($portfolio);
        }
        $this->view->assign('portfolio', $portfolio);
        $images = $this->portfolioRepository->getFileReferences($portfolio->getUid());
        $this->view->assign('images', $images);
    }
}
