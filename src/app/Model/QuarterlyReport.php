<?php
namespace Reporting\Model;

class QuarterlyReport {
    private $entries;

    public function __construct(array $entries = []) {
        $this->entries = $entries;
    }

    public function getAverages() {
        return [
            'revenue' => $this->getAvg($this->getRevenues()),
            'expenses' => $this->getAvg($this->getExpenses()),
            'grossProfit' => $this->getAvg($this->getGrossProfits()),
            'grossMargin' => (int) $this->getAvg($this->getGrossMargins())
        ];
    }

    public function getMaximums() {
        return [
            'revenue' => $this->getMax($this->getRevenues()),
            'expenses' => $this->getMax($this->getExpenses()),
            'grossProfit' => $this->getMax($this->getGrossProfits()),
            'grossMargin' => $this->getMax($this->getGrossMargins())
        ];
    }

    private function getRevenues() {
        return $this->mapEntries(function($entry) {
            return $entry->getRevenue();
        });
    }

    private function getExpenses() {
        return $this->mapEntries(function($entry) {
            return $entry->getExpenses();
        });
    }

    private function getGrossProfits() {
        return $this->mapEntries(function($entry) {
            return $entry->getGrossProfit();
        });
    }

    private function getGrossMargins() {
        return $this->mapEntries(function($entry) {
            return $entry->getGrossMargin();
        });
    }

    private function mapEntries($cb) {
        return array_map($cb, $this->entries);
    }

    private function getAvg($values) {
        return array_sum($values)/(count($values) ?: 1);
    }

    private function getMax($values) {
        return max($values ?: [0]);
    }
}