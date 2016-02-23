# Quarterly financial reporting

 * [Example](#example)
 * [Installation](#installation)
 * [How to run specs](#how-to-run-specs)

##Example:

| Company Name | Revenue | Expenses | Gross Profit | Gross Margin |
| --- | ---: | ---: | ---: | :---: |
| Company #1 | $150,000.00 | $120,000.00 | $30,000.00 | 20% |
| Company #2 | $1,800,000.00 | $1,500,000.00 | $300,000.00 | 17% |
| Company #3 | $600,000.00 | $510,000.00 | $90,000.00 | 15% |
| _**Averages**_ | _**$850,000.00**_ | _**$710,000.00**_ | _**$140,000.00**_ | _**17%**_ |
| _**Maximums**_ | _**$1,800,000.00**_ | _**$1,500,000.00**_ | _**$300,000.00**_ | _**20%**_ |

##Installation
To install this project using Composer run the commands below. You can download Composer from [http://getcomposer.org/](http://getcomposer.org/)
```
$ composer install
```
or
```
$ php composer.phar install
```

##How to run specs
This project uses Pho (BDD test framework) [https://github.com/danielstjules/pho](https://github.com/danielstjules/pho).

To run all the specs run the following command:
```
$ vendor/bin/pho -r spec src/test/unit
```
If you want to a run a particular spec:
```
$ vendor/bin/pho -r spec src/test/unit/Model/QuarterlyReportSpec.php
```
