<?php

namespace denis909\yii;

class ListView extends \yii\widgets\ListView
{

    public $filter;

    public $filterLayout = '{filter}';

    public $caption;

    public $captionLayout = '{caption}';

    public $pager = ['class' => LinkPager::class];

    public $layout = "{caption}\n{filter}\n{summary}\n{items}\n{pager}";

    public $itemsLayout = '{items}';

    public $summaryLayout = '{summary}';

    public $sorterLayout = '{sorter}';

    public $pagerLayout = '{pager}';

    public $enableSummary = true;

    public $enablePager = true;

    public $enableSorter = false;

    public $enableCaption = true;

    public $enableFilter = true;

    public function renderSummary()
    {
        if (!$this->enableSummary)
        {
            return '';
        }

        $return = parent::renderSummary();

        $return = strtr($this->summaryLayout, ['{summary}' => $return]);

        return $return;
    }

    public function renderPager()
    {
        if (!$this->enablePager)
        {
            return '';
        }

        $return = parent::renderPager();

        $return = strtr($this->pagerLayout, ['{pager}' => $return]);

        return $return;
    }

    public function renderSorter()
    {
        if (!$this->enableSorter)
        {
            return '';
        }

        $return = parent::renderSorter();

        $return = strtr($this->sorterLayout, ['{sorter}' => $return]);

        return $return;
    }

    public function renderItems()
    {
        $return = parent::renderItems();

        $return = strtr($this->itemsLayout, ['{items}' => $return]);

        return $return;
    }

    public function renderCaption()
    {
        if (!$this->enableCaption)
        {
            return '';
        }

        if ($this->caption)
        {
            return strtr($this->captionLayout, ['{caption}' => $this->caption]);
        }

        return '';
    }

    public function renderFilter()
    {
        if (!$this->enableFilter)
        {
            return '';
        }

        if ($this->filter)
        {
            return strtr($this->filterLayout, ['{filter}' => $this->filter]);
        }

        return '';
    }

    public function renderSection($name)
    {
        switch ($name) {
            case '{caption}':
                return $this->renderCaption();
            break;
            case '{filter}':
                return $this->renderFilter();
            break;            
        }

        return parent::renderSection($name);
    }

}