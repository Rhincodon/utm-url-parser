# UTM URL String Parser

[![Build Status](https://travis-ci.org/Rhincodon/utm-url-parser.svg?branch=master)](https://travis-ci.org/Rhincodon/utm-url-parser)

## Install

Via Composer

``` bash
$ composer require rhincodon/utm-url-parser
```

## Usage

``` php
    $utmUrl = 'http://test.com/test?utm_source=bing&&utm_medium=cpc&utm_campaign=rolex&utm_term=rolex+two';
    $parser = new \Rhinodontypicus\Parsers\UtmParser();
    $utmString = $parser->parse($utmUrl);
    if ($utmString->isValid()) { // true
        echo $utmString->source; // bing
        echo $utmString->medium; // cpc
        echo $utmString->campaign; // rolex
        echo $utmString->term; // rolex two
    }
```

## Credits

- [rhinodontypicus](https://github.com/rhincodon)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.