<?php

namespace Kody\Documentation\Show;

use ParsedownExtra;
use Kody\Documentation\Show\Contracts\MarkdownParser as MarkdownParserContract;

class MarkdownParser implements MarkdownParserContract
{
    /**
     * Parse the given source to Markdown, using your Markdown parser of choice.
     *
     * @param string $source Markdown source contents
     * @return null|string|string[] HTML output
     */
    public function parse($source)
    {
        return (new ParsedownExtra)->text($source);
    }
}
