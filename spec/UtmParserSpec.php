<?php

namespace spec\Rhinodontypicus\Parsers;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UtmParserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Rhinodontypicus\Parsers\UtmParser');
    }

    function it_parse_invalid_string()
    {
        $string = $this->parse('invalid string');

        $string->isValid()->shouldReturn(false);
    }

    function it_parse_valid_string()
    {
        $string = $this->parse('http://test.com/test?utm_source=bing&&utm_medium=cpc&utm_campaign=rolex&utm_term=role');

        $string->isValid()->shouldReturn(true);
        $string->source->shouldEqual('bing');
        $string->medium->shouldEqual('cpc');
        $string->campaign->shouldEqual('rolex');
        $string->term->shouldEqual('role');
    }

    function it_return_null_on_non_exists_params()
    {
        $string = $this->parse('http://test.com/test?utm_source=bing&&utm_medium=cpc&utm_campaign=rolex&utm_term=role');

        $string->isValid()->shouldReturn(true);
        $string->test->shouldEqual(null);
        $string->as->shouldEqual(null);
        $string->campaign->shouldEqual('rolex');
        $string->term->shouldEqual('role');
    }
}
