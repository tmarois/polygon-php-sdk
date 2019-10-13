# Polygon Stock Market PHP SDK

This package acts as the PHP SDK for the [Polygon RESTful API](https://polygon.io/docs/#getting-started).

## Installation

Use [Composer](http://getcomposer.org/) to install package.

Run `composer require tmarois/polygon-php-sdk:^1.0`

If you do not want to use composer, download the files, and include it within your application, it does not have any dependencies, you will just need to keep it updated with any future releases.

## Getting Started

First you need to instantiate the polygon object.

```php
use Polygon\Polygon;

$polygon = new Polygon("YOUR_API_KEY");
```

## Example Usage

**[Stock Snapshot](https://polygon.io/docs/#!/Stocks--Equities/get_v2_snapshot_locale_us_markets_stocks_tickers_ticker)**: Get the snapshot of a stock for the given day.

This includes the last trade, last quote, previous day and current day of data.

```php
$response = $polygon->stocks()->getSnapshot('AAPL');
```

**[Stock Details](https://polygon.io/docs/#!/Reference/get_v1_meta_symbols_symbol_company)**: Get the details of the symbol company/entity.

```php
$response = $polygon->stocks()->getDetails('AAPL');
```

**[Stock News](https://polygon.io/docs/#!/Reference/get_v1_meta_symbols_symbol_company)**: Get the details of the symbol company/entity.

```php
$response = $polygon->stocks()->getNews('AAPL', 1, 20);
```

**[Last Trade](https://polygon.io/docs/#!/Stocks--Equities/get_v1_last_stocks_symbol)**: Get the last trade for a given stock.

```php
$response = $polygon->stocks()->getLastTrade('AAPL');
```

**[Last Quote](https://polygon.io/docs/#!/Stocks--Equities/get_v1_last_quote_stocks_symbol)**: Get the last quote for a given stock.

```php
$response = $polygon->stocks()->getLastQuote('AAPL');
```

**[Trade History](https://polygon.io/docs/#!/Stocks--Equities/get_v2_ticks_stocks_trades_ticker_date)**: Get historic trades for a ticker.

```php
$response = $polygon->stocks()->getTradeHistory('AAPL','2019-09-25',100);
```

**[Quote History](https://polygon.io/docs/#!/Stocks--Equities/get_v2_ticks_stocks_nbbo_ticker_date)**: Get historic NBBO quotes for a ticker.

```php
$response = $polygon->stocks()->getQuoteHistory('AAPL','2019-09-25',100);
```

There are more in the [Polygon Documentation](https://polygon.io/docs/#getting-started) than what is presented above, if you want to extend this, please send in a pull request or request a specific feature be added. Thanks.

## Contributions

Anyone can contribute to **polygon-php-sdk**. Please do so by posting issues when you've found something that is unexpected or sending a pull request for improvements.

## License

**polygon-php-sdk** (This Repository) is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

This SDK has no affiliation with Polygon.io, Inc and acts as an unofficial SDK designed to be a simple solution with using PHP applications. Use at your own risk. If you have any issues with the SDK please submit an issue or pull request.
