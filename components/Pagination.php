<?php

class Pagination
{
    private $limitLinksPerPage = 10;
    private $GETKey = 'page=';
    private $currentPageId;
    private $totalCountElements;
    private $limitElementsPerPage;

    public function __construct($totalCountElements, $currentPageId, $limitElementsPerPage, $GETKey)
    {
        $this->totalCountElements = $totalCountElements;
        $this->limitElementsPerPage = $limitElementsPerPage;
        $this->GETKey = $GETKey;
        $this->amountPages = $this->getAmountPages();
        $this->setCurrentPage($currentPageId);
    }

    /**
     * @return string
     */
    public function get()
    {
        $links = null;
        $intervalLinksForPage = $this->getIntervalLinksForPage();
        $html = '<ul class="pagination">';
        for ($page = $intervalLinksForPage[0]; $page <= $intervalLinksForPage[1]; $page++) {
            if ($page == $this->currentPageId) {
                $links .= '<li class="active"><a href="#">' . $page . '</a></li>';
            } else {
                $links .= $this->generateHtml($page);
            }
        }
        if (!is_null($links)) {
            if ($this->currentPageId > 1)
                $links = $this->generateHtml(1, '&lt;') . $links;
            if ($this->currentPageId < $this->amountPages)
                $links .= $this->generateHtml($this->amountPages, '&gt;');
        }
        $html .= $links . '</ul>';
        return $html;
    }

    /**
     * @param integer $page
     * @param string null $text
     * @return string
     */
    private function generateHtml($page, $text = null)
    {
        if (!$text)
            $text = $page;
        $currentURI = rtrim($_SERVER['REQUEST_URI'], '/') . '/';
        $currentURI = preg_replace('~/page=[0-9]+~', '', $currentURI);
        return '<li><a href="' . $currentURI . $this->GETKey . $page . '">' . $text . '</a></li>';
    }

    /**
     * @return array
     */
    private function getIntervalLinksForPage()
    {
        $leftLinkId = $this->currentPageId - round($this->limitLinksPerPage / 2);   
        $startLinkId = $leftLinkId > 0 ? $leftLinkId : 1;
        if ($startLinkId + $this->limitLinksPerPage <= $this->amountPages) {
            $endLinkId = $startLinkId > 1 ? $startLinkId + $this->limitLinksPerPage : $this->limitLinksPerPage;
        } else {
            $endLinkId = $this->amountPages;
            $startLinkId = $this->amountPages - $this->limitLinksPerPage > 0 ? $this->amountPages - $this->limitLinksPerPage : 1;
        }
        return array($startLinkId, $endLinkId);
    }

    /**
     * @param integer $currentPageId
     */
    private function setCurrentPage($currentPageId)
    {
        $this->currentPageId = $currentPageId;
        if ($this->currentPageId > 0) {
            if ($this->currentPageId > $this->amountPages)
                $this->currentPageId = $this->amountPages;
        } else
            $this->currentPageId = 1;
    }

    /**
     * @return int
     */
    private function getAmountPages()
    {
        return intval(ceil($this->totalCountElements / $this->limitElementsPerPage));
    }
}