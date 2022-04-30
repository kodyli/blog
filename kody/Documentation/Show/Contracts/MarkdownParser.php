<?php

namespace Kody\Documentation\Show\Contracts;

interface MarkdownParser
{
    /**
     * Parse the given source to Markdown, using your Markdown parser of choice.
     *
     * @param string $source
     * @return null|string|string[]
     */
    public function parse($source);
}