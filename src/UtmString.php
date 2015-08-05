<?php

namespace Rhinodontypicus\Parsers;

/**
 * @property $content string
 * @property $medium string
 * @property $term string
 * @property $campaign string
 * @property $source string
 */
class UtmString
{
    /**
     * @var
     */
    private $valid;
    /**
     * @var
     */
    private $text;
    /**
     * @var array
     */
    private $parameters = [];

    /**
     * @return UtmString
     */
    public static function createInvalid()
    {
        $string = new self();
        $string->valid = false;

        return $string;
    }

    /**
     * @param $text
     * @param $parameters
     * @return UtmString
     */
    public static function createValid($text, $parameters)
    {
        $string = new self();
        $string->valid = true;
        $string->text = $text;
        $string->parameters = $parameters;

        return $string;
    }

    /**
     * @return mixed
     */
    public function isValid()
    {
        return $this->valid;
    }

    /**
     * @param $name
     * @return string
     */
    public function __get($name)
    {
        if (isset($this->parameters["utm_" . $name])) {
            return $this->parameters["utm_" . $name];
        }

        return null;
    }
}
