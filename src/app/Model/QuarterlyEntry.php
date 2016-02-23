<?php
namespace Reporting\Model;

class QuarterlyEntry {
    private $revenue;
    private $expenses;

    public function __construct($revenue, $expenses) {
        $this->revenue = $revenue;
        $this->expenses = $expenses;
    }

    public function getRevenue() {
        return $this->revenue;
    }

    public function getExpenses() {
        return $this->expenses;
    }

    public function getGrossProfit() {
        return $this->revenue - $this->expenses;
    }

    public function getGrossMargin() {
        return empty($this->revenue) ? 0 :
            (int) round(($this->getGrossProfit()/$this->revenue)*100);
    }
}