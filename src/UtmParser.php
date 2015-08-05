<?php

namespace Rhinodontypicus\Parsers;

class UtmParser
{
    /**
     * @param string $string
     * @return UtmString
     */
    public function parse($string = "")
    {
        if (!$this->contains($string, 'utm_') || !$this->isUrl($string)) {
            return UtmString::createInvalid();
        }

        $url = parse_url($string);
        parse_str($url['query'], $urlParameters);

        return UtmString::createValid($string, $urlParameters);
    }


    /**
     * @param $string
     * @return bool
     */
    private function isUrl($string)
    {
        return filter_var($string, FILTER_VALIDATE_URL) !== false;
    }

    /**
     * @param $haystack
     * @param $needle
     * @param bool $caseSensitive
     * @return bool
     */
    private function contains($haystack, $needle, $caseSensitive = true)
    {
        if ($caseSensitive) {
            return mb_strpos($haystack, $needle, 0, mb_internal_encoding()) !== false;
        }

        return mb_stripos($haystack, $needle, 0, mb_internal_encoding()) !== false;
    }
}
