<?php
namespace Reporting\Test\Unit\Model;

use Reporting\Model\QuarterlyEntry;

describe('QuarterlyEntry', function() {

    beforeEach(function() {
        // Given
        $this->entry = new QuarterlyEntry(130000, 90000);
    });

    it('should return revenue', function() {
        // When
        $revenue = $this->entry->getRevenue();

        // Then
        expect($revenue)->toEqual(130000);
    });

    it('should return expenses', function() {
        // When
        $expenses = $this->entry->getExpenses();

        // Then
        expect($expenses)->toEqual(90000);
    });

    it('should return gross profit', function() {
        // When
        $grossProfit = $this->entry->getGrossProfit();

        // Then
        expect($grossProfit)->toEqual(40000);
    });

    it('should return gross margin', function() {
        // When
        $grossMargin = $this->entry->getGrossMargin();

        // Then
        expect($grossMargin)->toEqual(31);
    });

    it('should return 0 gross margin if revenue is 0', function() {
        // Given
        $entry = new QuarterlyEntry(0, 0);

        // When
        $grossMargin = $entry->getGrossMargin();

        // Then
        expect($grossMargin)->toEqual(0);
    });
});