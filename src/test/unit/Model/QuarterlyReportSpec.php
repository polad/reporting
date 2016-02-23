<?php
namespace Reporting\Test\Unit\Model;

use Reporting\Model\QuarterlyReport;
use \Mockery;

describe('QuarterlyReport', function() {
    context('with some entries loaded', function() {

        $this->setupQuarterlyEntry = function($revenue, $expenses, $grossProfit, $grossMargin) {
            $entry = Mockery::mock('QuarterlyEntry');
            $entry->shouldReceive('getRevenue')->once()->andReturn($revenue);
            $entry->shouldReceive('getExpenses')->once()->andReturn($expenses);
            $entry->shouldReceive('getGrossProfit')->once()->andReturn($grossProfit);
            $entry->shouldReceive('getGrossMargin')->once()->andReturn($grossMargin);
            return $entry;
        };

        beforeEach(function() {
            $entries = [
                $this->setupQuarterlyEntry(150000, 120000, 30000, 20),
                $this->setupQuarterlyEntry(1800000, 1500000, 300000, 17),
                $this->setupQuarterlyEntry(600000, 510000, 90000, 15)
            ];

            $this->report = new QuarterlyReport($entries);
        });

        it('should return quarterly averages', function() {
            // When
            $result = $this->report->getAverages();

            // Then
            expect($result['revenue'])->toEqual(850000);
            expect($result['expenses'])->toEqual(710000);
            expect($result['grossProfit'])->toEqual(140000);
            expect($result['grossMargin'])->toEqual(17);

            Mockery::close();
        });

        it('should return quarterly maximums', function() {
            // When
            $result = $this->report->getMaximums();

            // Then
            expect($result['revenue'])->toEqual(1800000);
            expect($result['expenses'])->toEqual(1500000);
            expect($result['grossProfit'])->toEqual(300000);
            expect($result['grossMargin'])->toEqual(20);

            Mockery::close();
        });

    });

    context('with no entries loaded', function() {
        beforeEach(function() {
            $this->report = new QuarterlyReport();
        });

        it('should return quarterly averages equal to 0', function() {
            // When
            $result = $this->report->getAverages();

            // Then
            expect($result['revenue'])->toEqual(0);
            expect($result['expenses'])->toEqual(0);
            expect($result['grossProfit'])->toEqual(0);
            expect($result['grossMargin'])->toEqual(0);

            Mockery::close();
        });

        it('should return quarterly maximums equal to 0', function() {
            // When
            $result = $this->report->getMaximums();

            // Then
            expect($result['revenue'])->toEqual(0);
            expect($result['expenses'])->toEqual(0);
            expect($result['grossProfit'])->toEqual(0);
            expect($result['grossMargin'])->toEqual(0);

            Mockery::close();
        });
    });
});