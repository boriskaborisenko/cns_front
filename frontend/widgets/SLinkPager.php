<?php

namespace frontend\widgets;

use yii\helpers\Html;
use yii\widgets\LinkPager;

class SLinkPager extends LinkPager{	
    protected function renderPageButtons()
    {
        $pageCount = $this->pagination->getPageCount();
        if ($pageCount < 2 && $this->hideOnSinglePage) {
            return '';
        }

        $buttons = [];
        $currentPage = $this->pagination->getPage();

        // prev page
        if ($this->prevPageLabel !== false && $currentPage > 0) {
            if (($page = $currentPage - 1) < 0) {
                $page = 0;
            }
            $buttons[] = $this->renderPageButton($this->prevPageLabel, $page, $this->prevPageCssClass, $currentPage <= 0, false);
        }

        // first page
        $firstPageLabel = $this->firstPageLabel === true ? '1' : $this->firstPageLabel;
        if ($firstPageLabel !== false  && $currentPage > 0) {
            $buttons[] = $this->renderPageButton($firstPageLabel, 0, $this->firstPageCssClass, $currentPage <= 0, false);
        }

        // internal pages
        list($beginPage, $endPage) = $this->getPageRange();
        
        // internal pages prev ...
        if ($beginPage != 0) {
            $buttons[] = $this->renderPageButton('...', null, null, true, false);
        }
        
        if($currentPage > 0) {
            $beginPageCycle=$beginPage+1;
        } else {
            $beginPageCycle=$beginPage;
        }
        
        if ($currentPage < $pageCount - 1) {
            $endPageCycle=$endPage-1;
        } else {
            $endPageCycle=$endPage;
        }
        
        for ($i = $beginPageCycle; $i <= $endPageCycle; ++$i) {
            $buttons[] = $this->renderPageButton($i + 1, $i, null, false, $i == $currentPage);
        }

		// internal pages next ...
        if ($endPage != $pageCount-1) {
            $buttons[] = $this->renderPageButton('...', null, null, true, false);
        }

        // last page
        $lastPageLabel = $this->lastPageLabel === true ? $pageCount : $this->lastPageLabel;
        if ($lastPageLabel !== false && $currentPage < $pageCount - 1) {
            $buttons[] = $this->renderPageButton($lastPageLabel, $pageCount - 1, $this->lastPageCssClass, $currentPage >= $pageCount - 1, false);
        }

        // next page
        if ($this->nextPageLabel !== false && $currentPage < $pageCount - 1) {
            if (($page = $currentPage + 1) >= $pageCount - 1) {
                $page = $pageCount - 1;
            }
            $buttons[] = $this->renderPageButton($this->nextPageLabel, $page, $this->nextPageCssClass, $currentPage >= $pageCount - 1, false);
        }

        return Html::tag('ul', implode("\n", $buttons), $this->options);
    }
    
    protected function renderPageButton($label, $page, $class, $disabled, $active)
    {
        $options = ['class' => $class === '' ? null : $class];
        if ($active) {
            Html::addCssClass($options, $this->activePageCssClass);
            
            return Html::tag('li', Html::a($label,$this->pagination->createUrl($page)),$options);
        }
        if ($disabled) {
            Html::addCssClass($options, $this->disabledPageCssClass);

            return Html::tag('li', Html::a($label,$this->pagination->createUrl($page)),$options);
        }
        $linkOptions = $this->linkOptions;
        $linkOptions['data-page'] = $page;

        return Html::tag('li', Html::a($label, $this->pagination->createUrl($page)),$linkOptions);
    }
}
