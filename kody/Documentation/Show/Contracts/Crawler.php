<?php

namespace Kody\Documentation\Show\Contracts;

interface Crawler
{
    /**
     * Parse the given source to Markdown, using your Markdown parser of choice.
     *
     * @param string $xpath
     * @return $this
     */
    public function filterXPath(string $xpath);
}